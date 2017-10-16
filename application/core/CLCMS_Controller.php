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

    public function get_current_user_data(){
        if($this->is_logged_in == false){
            return false;
        }

        return $this->session->get_userdata();
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
            'full_name' => $used_data->name,
            'location_info' =>
                array(
                    'address'   => $used_data->address,
                    'city'      => $used_data->city,
                    'country'   => $used_data->country
                ),
            'logged_in' => true,
            'is_admin'  => 1
        );

        $this->session->set_userdata($session_data);
    }

    // User logout and delete session
    public function user_logout(){
        $unset_data = array("user_id","user_name","is_admin","full_name","location_info");

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




    //Template engine
    public function loadTemplate($type = '', $data){
        $default_type   = "dashboard";
        empty($type) ? $type = $default_type : null;

        if($type == 'dashboard')
        {
            //if doesnt exist, generate it :)
            empty($data['header']) ? $data['header'] = '' : null;

            //load views
            $this->load->view('parts/header.php', $data['header']);
            $this->load->view('layouts/template.php',$data);
        }


    }


}