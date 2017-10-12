<?php
Class CLCMS_Controller extends CI_Controller{
    public function __construct()
    {
        parent::__construct();

        // Your own constructor code

        //provjeri da li je korisnik ulogovan!
        $this->is_logged_in();
    }

    public $is_logged_in = false;

    //check is current page requoire login
    protected function required_login($redirect_url = ''){
        if( $this->is_logged_in() == false ){
            redirect('/login/');
        }
    }

    // login user and set session
    public function user_login($used_data){

        $session_user_id = $this->session->userdata('user_id');

        if( !empty($session_user_id) && $session_user_id == $used_data->id ){
            echo 'Redirect: User is already logged in!';
            return true;
        }

        $session_data = array(
            'user_id'   => $used_data->id,
            'username'  => $used_data->username,
            'logged_in' => true,
            'is_admin'  => 1
        );

        $this->session->set_userdata($session_data);
    }

    // User logout and delete session
    public function user_logout(){
        $unset_data = array("user_id","user_name","is_admin");

        $this->session->unset_userdata($unset_data);
        $this->session->set_userdata(array("logged_in" => false));

        $this->is_logged_in = false;
    }

    /* Check is user logged in */
    private function is_logged_in(){
        $logged_in = $this->session->userdata("logged_in");

        if(empty($logged_in))
        {
            $this->session->set_userdata(array("logged_in" => false));
            $this->is_logged_in = false;
        }else{
            $this->is_logged_in = true;
        }

        return $this->is_logged_in;
    }

}