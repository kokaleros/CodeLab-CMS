<?php
Class Shipment_Controller extends CLCMS_Controller{

    function __construct()
    {
        parent::__construct();
        $this->required_login('login', 'Morate biti ulogovani da biste koristili modul za posiljke.');

        $this->load->helper('form_rules/shipment_rules');
        $this->load->helper('field_settings/shipment_settings');

        $this->load->model('Shipment');
    }

    public function index(){
        $data['user']       = $this->get_current_user_data();

        if($this->is_user_admin()){
            $data['shipments']  = $this->Shipment->get_all_shipments();
        }else{
            $data['shipments']  = $this->Shipment->get_all_shipments_from_user($data['user']['user_id']);
        }

        $data['header'] = array(
            'title'     => 'Posiljke',
            'css'       => array( 'custom.css' ), //assets/css/custom.css
            'js'        =>
                array(
                    'plugins/tables/datatables/datatables.min.js',
                    'plugins/forms/selects/select2.min.js',
//                    'core/app.js',
                    'pages/datatables_basic.js'
                )
        );

        $data['load_view'] = 'layouts/shipment/package_list';

        $this->loadTemplate('dashboard', $data);
    }

    public function view($id = ''){
        if(!is_numeric($id)){
            die('Unknown shipment identificator!');
        }

        $data['user']           = $this->get_current_user_data();
        $data['shipment']       = $this->Shipment->get_shipment_by_id($id);
        $data['shipment_notes'] = $this->Shipment->get_all_notes($id);
        $data['header'] = array(
            'title'     => 'Pregled posiljke',
            'css'       => array( 'custom.css' ), //assets/css/custom.css
            'js'        =>
                array(
                    'plugins/tables/datatables/datatables.min.js',
                    'plugins/forms/selects/select2.min.js',
                    'pages/datatables_basic.js'
                )
        );

        $data['load_view'] = 'layouts/shipment/package_single';

        $this->loadTemplate('dashboard', $data);
    }

    public function create(){

        $rules = add_shipment_rules();

        $this->form_validation->set_rules($rules);

        //if validation isnt OK, load view!
        if( $this->form_validation->run() != true ) {

            $postData = $this->input->post();
//            var_dump($postData);


            $greske = $this->form_validation->error_array();
//            var_dump($greske);


            $data['user'] = $this->get_current_user_data();
            $data['header'] = array(
                'title' => 'Korisnici',
                'css' => array('custom.css'), //assets/css/custom.css
                'js' =>
                    array(
                        'plugins/tables/datatables/datatables.min.js',
                        'plugins/forms/selects/select2.min.js',
                    )
            );

            $data['load_view'] = 'layouts/shipment/package_add';

            $this->loadTemplate('dashboard', $data);
        }else{
            $postData = $this->input->post();

            unset($postData['submit']);
            unset($postData['stacked-radio-left']);

            //set time
            $postData['vrijeme']    = time();
            $postData['user_id']    = $this->get_current_user_data()["user_id"];
            $postData['status']     = 'na čekanju';
            $postData['tracking_number'] = $this->generateRandomString(64);


            $shipment = $this->Shipment->create($postData);

            if($shipment){
                $this->redirect_with_message('shipments', 'Pošiljka je uspješno snimljena!', 'success');
            }else{
                $this->redirect_with_message('shipments', 'Pošiljka nije uspjesno snimljena!', 'danger');
            }
        }
    }

    public function edit($id = ''){
        if(!is_numeric($id)){
            die('Unknown user id!');
        }

        $rules = edit_shipment_rules();
        $this->form_validation->set_rules($rules);

        //if validation isnt OK, load view!
        if( $this->form_validation->run() != true ){
            //get user profile
            $data['shipment']   = $this->Shipment->get_shipment_by_id($id);
            $data['user']       = $this->get_current_user_data();

            //check does user exists
            $data['shipment'] == false ? exit('No user with that id!') : null;

            $data['header'] = array(
                'title'     => 'Uredi posiljku / ID:' . $data['shipment']->shipment_id,
                'js'        => array('plugins/forms/styling/uniform.min.js','pages/form_inputs.js')
            );

            $data['load_view'] = 'layouts/shipment/package_edit';

            $this->loadTemplate('dashboard', $data);


        }else{
            //provjeri pristupne podatke
            $postData = $this->input->post();

            unset($postData['submit']);
            unset($postData['stacked-radio-left']);

            $shipment = $this->Shipment->edit($id, $postData);

            if(!$shipment){
                $this->redirect_with_message('/shipments/edit/'.$id, 'Promjene nisu snimljene!', 'danger');
            }else{
                $this->redirect_with_message('/shipments/edit/'.$id, 'Promjene su uspjesno snimljene!', 'success');
            }
        }

    }

    public function delete($id = ''){
        if(!is_numeric($id)){
            die('Unknown user id!');
        }

        $delete = $this->Shipment->delete($id);

        if($delete){
            $this->redirect_with_message('/shipments', 'Posiljka (id ' . $id . ') je uspjesno izbrisana', 'success');
        }else{
            $this->redirect_with_message('/shipments', 'Posiljka (id ' . $id . ') nije uspjesno izbrisana', 'danger');
        }

    }

    public function form(){

        $data['user']   = $this->get_current_user_data();
        $data['header'] = array(
            'title'     => 'Korisnici',
            'css'       => array( 'custom.css' ), //assets/css/custom.css
            'js'        =>
                array(
                    'plugins/tables/datatables/datatables.min.js',
                    'plugins/forms/selects/select2.min.js',
                )
        );

        $data['content_attrs'] = array(
            'style'     => "max-width:900px !important; margin:0 auto; padding:0px !important;",
            'class'       => "template_blank"
        );

        $data['load_view'] = 'layouts/shipment/package_add_form';

        $this->loadTemplate('blank', $data);


    }

    public function track_package($tracking_number = ''){
        //provjeri da li je dobar format
        if(preg_match("/^[a-zA-Z0-9]{64}$/", $tracking_number) == false){
            die("Invalid tracking number format!");
        }

        $shipment = $this->Shipment->get_shipment_by_tracking_number($tracking_number);
        $shipment == false ? exit('Shipment with this id doesnt exist!') : '';

        var_dump($shipment);


    }

    //package and shipment notes
    public function notes_create($id = ''){

        if(!is_numeric($id)){
            die('Unknown shipment id!');
        }

        $rules = add_shipment_note_rules();

        $this->form_validation->set_rules($rules);

        //if validation isnt OK, load view!
        if( $this->form_validation->run() != true ) {

            $greske = $this->form_validation->error_array();
//            var_dump($greske);

            $data['user'] = $this->get_current_user_data();
            $data['shipment_id'] = $id;
            $data['header'] = array(
                'title' => 'Detalji o posiljci',
                'css' => array('custom.css'), //assets/css/custom.css
                'js' =>
                    array(
                        'plugins/tables/datatables/datatables.min.js',
                        'plugins/forms/selects/select2.min.js',
                    )
            );

            $data['load_view'] = 'layouts/shipment/note_add';

            $this->loadTemplate('dashboard', $data);
        }else{
            $postData = $this->input->post();

            unset($postData['submit']);

            //set time
            $postData['time']           = time();
            $postData['created_by']     = $this->get_current_user_data()["user_id"];
            $postData['shipment_id']    = $id;
            $shipment_note = $this->Shipment->create_note($postData);

            if($shipment_note){
                $this->redirect_with_message('shipments/view/' . $id, 'Informacije o posiljci su uspješno snimljene!', 'success');
            }else{
                $this->redirect_with_message('shipments/view/' . $id, 'Informacije o posliljci nisu uspjesno snimljene!', 'danger');
            }
        }
    }


    //Create shippment callbacks
    public function predavanje_posiljke(){
        $allFields = $this->input->post();

        if($allFields['predavanje_posiljke'] == 'Kuriru na svojim vratima'){
            return TRUE;
        }
        else if($allFields['predavanje_posiljke'] == 'U VINTAX express poslovnici' && isset($allFields['predavanje_u_poslovnicu'])){
            return TRUE;
        }else{
            $this->form_validation->set_message('predavanje_posiljke', "Izaberite poslovnicu u koju zelite predati paket.");
            return FALSE;
        }
    }

    public function dostava_posiljke(){
        $allFields = $this->input->post();

        if($allFields['dostava_posiljke'] == 'Na vrata primatelja'){
            return TRUE;
        }else if($allFields['dostava_posiljke'] == 'U VINTAX express poslovnicu' && isset($allFields['dostava_u_poslovnicu'])){
            return TRUE;
        }else{
            $this->form_validation->set_message('dostava_posiljke', "Izaberite poslovnicu u koju zelite da se paket dostavi!");
            return FALSE;
        }
    }

    public function cijena_odkupnine(){
        $allFields = $this->input->post();

        if($allFields['cijena_odkupnine'] == 'Paket sa otkupninom (pouzećem)' && isset($allFields['dostava_u_poslovnicu'])){
            return TRUE;
        }else{
            $this->form_validation->set_message('cijena_odkupnine', "Unesite cijenu odkupnine!");
            return FALSE;
        }
    }

    function generateRandomString($length = 64) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }


}