<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class User_Controller extends CLCMS_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->required_login('/login/', 'Da biste koristili ovaj dio morate biti prijasvljeni!', 'danger');

        //load users helper
        $this->load->helper('form_rules/user_rules_helper');

        //load models
        $this->load->model("User");
    }

    public function index()
    {
        $data['user']   = $this->get_current_user_data();
        $data['users']  = $this->User->get_all_users();
        $data['header'] = array(
            'title'     => 'Korisnici',
            'css'       => array( 'custom.css' ), //assets/css/custom.css
            'js'        =>
                array(
                    'plugins/tables/datatables/datatables.min.js',
                    'plugins/forms/selects/select2.min.js',
//                    'core/app.js',
                    'pages/datatables_basic.js'
                )
        );

        $data['load_view'] = 'layouts/users/user_list';

        $this->loadTemplate('dashboard', $data);
    }

    public function profile($id = ''){

        if(!is_numeric($id)){
            die('Unknown user id!');
        }

        //get user profile
        $data['profil']= $this->User->get_user_by_id($id);
        $data['user']   = $this->get_current_user_data();

        //check does user exists
        $data['profil'] == false ? exit('No user with that id!') : null;

        $data['header'] = array(
            'title'     => 'Korisnički profil: ' . $data['profil']->name,
            'js'        => array('plugins/forms/styling/uniform.min.js','pages/form_inputs.js')
        );

        $data['load_view'] = 'layouts/users/user_profile';

        $this->loadTemplate('dashboard', $data);
    }

    public function edit($id = ''){
        if(!is_numeric($id)){
            die('Unknown user id!');
        }

        $rules = user_edit_rules();
        $this->form_validation->set_rules($rules);

        //if validation isnt OK, load view!
        if( $this->form_validation->run() != true ){
            //get user profile
            $data['profil']= $this->User->get_user_by_id($id);
            $data['user']   = $this->get_current_user_data();

            //check does user exists
            $data['profil'] == false ? exit('No user with that id!') : null;



            $data['header'] = array(
                'title'     => 'Uredi korisnika / ' . $data['profil']->username,
                'js'        => array('plugins/forms/styling/uniform.min.js','pages/form_inputs.js')
            );

            $data['load_view'] = 'layouts/users/user_edit';

            $this->loadTemplate('dashboard', $data);


        }else{
            //provjeri pristupne podatke
            $postData = $this->input->post();

            //unset password confirmation field
            unset($postData["password_conf"]);
            $user = $this->User->edit($id, $postData);

            if(!$user){
                $this->redirect_with_message('/users/edit/'.$id, 'Promjene nisu snimljen!', 'danger');
            }else{
                $this->redirect_with_message('/users/edit/'.$id, 'Promjene su uspjesno snimljene!', 'success');
            }
        }

    }

    public function create(){
        //load rules
        $rules = user_register_rules();
        $this->form_validation->set_rules($rules);

        //if validation isnt OK, load view!
        if( $this->form_validation->run() != true ){
            //get user profile
            $data['user']   = $this->get_current_user_data();

            $data['header'] = array(
                'title'     => 'Dodaj korisnika',
                'js'        => array('plugins/forms/styling/uniform.min.js','pages/form_inputs.js')
            );

            $data['load_view'] = 'layouts/users/user_create';

            $this->loadTemplate('dashboard', $data);


        }else{
            //provjeri pristupne podatke
            $postData = $this->input->post();

            //unset password confirmation field
            unset($postData["password_conf"]);
            $user = $this->User->create($postData);

            if(!$user){
                $this->redirect_with_message('/users/', 'Novi korisnik nije kreiran!!', 'danger');
            }else{
                $this->redirect_with_message('/users/', 'Novi korisnik je uspjesno kreiran!', 'success');
            }
        }

    }

    public function delete($id = ''){
        if(!is_numeric($id)){
            die('Unknown user id!');
        }

        $delete = $this->User->delete($id);

        if($delete){
            $this->redirect_with_message('/users', 'Korisnik (id ' . $id . ') je uspjesno izbrisan', 'success');
        }

    }

    public function switch_user($id = ''){
        var_dump($id);
    }

    /***************************
     * Call backs
     */
    public function username_exist($input){

        $this->load->model('User');
        $result = $this->User->user_exist($input, '');

        if($result == false){
            return true;
        }else{
            $this->form_validation->set_message('username_exist','Username is taken!');
            return false;
        }
    }

    public function email_exist($input){

        $this->load->model('User');
        $result = $this->User->user_exist('', $input);

        if($result == false){
            return true;
        }else{
            $this->form_validation->set_message('email_exist','Email is taken!');
            return false;
        }
    }
}