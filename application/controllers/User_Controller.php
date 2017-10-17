<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class User_Controller extends CLCMS_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->required_login('/login/', 'Da biste koristili ovaj dio morate biti prijavljeni!');

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

        $rules = array(
            "name" =>
                array(
                    "field" => "name",
                    "label" => "ime",
                    "rules" => "required|min_length[3]|max_length[100]"
                ),
            "email" =>
                array(
                    "field" => "email",
                    "label" => "email",
                    "rules" => "required|min_length[7]|max_length[100]|valid_email"
                ),
            "password" =>
                array(
                    "field" => "password",
                    "label" => "lozinka",
                    "rules" => "required|min_length[6]|max_length[32]"
                ),
            "password_conf" =>
                array(
                    "field" => "password_conf",
                    "label" => "ponovi lozinku",
                    "rules" => "required|min_length[6]|max_length[32]|matches[password]"
                ),

            //additional fields that are not required

            "telephone" =>
                array(
                    "field" => "telephone",
                    "label" => "Telefon",
                    "rules" => "max_length[25]"
                ),
            "address" =>
                array(
                    "field" => "address",
                    "label" => "Adresa",
                    "rules" => "max_length[100]"
                ),
            "city" =>
                array(
                    "field" => "telephone",
                    "label" => "Telefon",
                    "rules" => "max_length[100]"
                ),
            "country" =>
                array(
                    "field" => "country",
                    "label" => "Drzava",
                    "rules" => "max_length[100]"
                ),
            "zip_code" =>
                array(
                    "field" => "zip_code",
                    "label" => "Postanski broj",
                    "rules" => "max_length[10]"
                )
        );

        $this->form_validation->set_rules($rules);

        //if validation isnt OK, load view!
        if( $this->form_validation->run() != true ){
            //get user profile
            $data['profil']= $this->User->get_user_by_id($id);
            $data['user']   = $this->get_current_user_data();

            //check does user exists
            $data['profil'] == false ? exit('No user with that id!') : null;



            $data['header'] = array(
                'title'     => 'Uredi korisnika: ' . $data['profil']->username,
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
                die('User isnt edited!');
            }else{
                die("User with id is edited: " . $id);
            }
        }

    }

    public function delete($id = ''){
        if(!is_numeric($id)){
            die('Unknown user id!');
        }

        $delete = $this->User->delete($id);

        if($delete){
            $this->do_redirection('users', 'Korisnik (id ' . $id . ') je uspjesno ukonjen');
        }

    }

    public function switch_user($id = ''){
        var_dump($id);
    }
}