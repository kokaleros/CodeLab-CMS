<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Login extends CLCMS_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index(){
        //check is user already logged in
        if($this->is_logged_in){
            redirect("/");
        }

        //rules for fields
        $rules = array(
            "username" =>
                array(
                    "field" => "username",
                    "label" => "korisničko ime",
                    "rules" => "required|min_length[4]|max_length[20]"
                ),
            "password" =>
                array(
                    "field" => "password",
                    "label" => "lozinka",
                    "rules" => "required|min_length[6]|max_length[32]"
                )
        );


        $this->form_validation->set_rules($rules);

        if( $this->form_validation->run() != true ){
            $this->load->view('parts/login/login-header');
            $this->load->view('layouts/login-page');
        }else{
            //provjeri pristupne podatke
            $postData = $this->input->post();

            $this->load->model("User");

            $user = $this->User->autenticate($postData['username'],$postData['password']);
            if($user){

                $this->user_login($user);
                redirect('/');
            }else{
                //return to login
                $this->load->view('parts/login/login-header');
                $this->load->view('layouts/login-page', array('login_error' => 'Pristupni podaci nisu ispravni!'));
            }

        }
    }

    public function register(){
        //check is user already logged in
        if($this->is_logged_in){
            redirect("/");
        }

        $rules = array(
            "name" =>
                array(
                    "field" => "name",
                    "label" => "ime",
                    "rules" => "required|min_length[3]|max_length[100]"
                ),
            "username" =>
                array(
                    "field" => "username",
                    "label" => "korisničko ime",
                    "rules" => "required|min_length[4]|max_length[20]|callback_username_exist"
                ),
            "email" =>
                array(
                    "field" => "email",
                    "label" => "email",
                    "rules" => "required|min_length[7]|max_length[100]|valid_email|callback_email_exist"
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

        if( $this->form_validation->run() != true ){
            $this->load->view('parts/login/register-header');
            $this->load->view('layouts/register-page');
        }else{
            //provjeri pristupne podatke
            $postData = $this->input->post();

            //unset password confirmation field
            unset($postData["password_conf"]);

            //load login model
            $this->load->model("User");
            $user = $this->User->create($postData);

            if(!$user){
                die('User isnt created!');
            }else{
                die("User created with id: " . $user);
            }
        }


    }

    public function logout(){
        if($this->is_logged_in){
            $this->user_logout();
            redirect("/login");
        }
    }

    public function account_confirm($code)
    {
        //check does activation code exists!
        $this->load->model('User');
        $this->User->activate_user($code);

        $this->session->set_flashdata('message', 'Uspjesno ste aktivirali nalog. Prijavite se.');
        redirect('login');
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
