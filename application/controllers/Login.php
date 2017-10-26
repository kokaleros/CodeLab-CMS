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

        //load rules helper
        $this->load->helper('form_rules/user_rules_helper');

        //rules for fields
        $rules = user_login_rules();

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

        //load rules helper
        $this->load->helper('form_rules/user_rules_helper');

        $rules = user_register_rules();

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
                $this->redirect_with_message('login', 'Nalog nije kreiran! Kontaktirajte administratora.', 'danger');
            }else{
                $this->redirect_with_message('login', 'Nalog je uspješno kreiran! Provjerite vaš email i potvrdite nalog da biste se prijavili.', 'success');
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

        $this->redirect_with_message('login', 'Uspjesno ste aktivirali nalog. Prijavite se.', 'success');
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
