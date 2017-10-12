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
                    "rules" => "required|min_length[5]|max_length[100]"
                ),
            "username" =>
                array(
                    "field" => "username",
                    "rules" => "required|max_length[20]|min_length[5]|callback_username_exist"
                ),
            "password" =>
                array(
                    "field" => "password",
                    "label" => "lozinka",
                    "rules" => "required|max_length[20]|min_length[5]"
                ),
            "password_conf" =>
                array(
                    "field" => "password_conf",
                    "label" => "potvrdi lozinku",
                    "rules" => "required|max_length[20]|min_length[5]|matches[password]"
                ),
            "email" =>
                array(
                    "field" => "email",
                    "rules" => "required|max_length[100]|min_length[8]|valid_email|callback_email_exist"
                )
        );

        $this->form_validation->set_rules($rules);

        //messages
        $this->form_validation->set_message('required','Ovo polje je obavezno!');
        $this->form_validation->set_message('min_lenght','Premalo karaktera!');
        $this->form_validation->set_message('max_length','Previse karaktera!');



        if($this->form_validation->run() != true){
            $this->load->view("layouts/register");
        }else{
            echo "valja";
        }

//        $userData = array(
//            "name"          => "Igor Karanovic",
//            "username"      => "kokaleros",
//            "password"      => "admin",
//            "email"         => "igor@newmoment.ba",
//            "telephone"     => "065224000",
//            "address"       => "Vojvode Momcila 14",
//            "city"          => "Banja Luka",
//            "country"       => "BiH",
//            "zip_code"      => 78000
//        );

        //load login model
        $this->load->model("User");





    }

    public function logout(){
        if($this->is_logged_in){
            $this->user_logout();
            redirect("/login");
        }
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
