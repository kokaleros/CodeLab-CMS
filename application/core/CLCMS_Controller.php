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
    protected function required_login($redirect_url = '', $message = '', $message_flag = 'primary'){
        if($this->is_logged_in() == false){

            if( $message != '') {
                $this->session->set_flashdata('message', $message);
                $this->session->set_flashdata('message-flag', 'alert-' . $message_flag);
            }

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
            'is_admin'  => $used_data->group_id == 0 ? true : false
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

    public function is_user_admin(){
        $is_admin  = $this->session->userdata("is_admin");

        if(!empty($is_admin) && $is_admin == true){
            return true;
        }else{
            return false;
        }
    }

    //Messages handler
    public function redirect_with_message($url='', $text = '', $messageFlag = ''){

        $messageFlag == '' ? $messageFlag = 'primary' : '';

        $this->session->set_flashdata('message', $text);
        $this->session->set_flashdata('message-flag', 'alert-'.$messageFlag);

        redirect($url);
    }

    //print messages after redirect if any exist
    public function show_messages(){

        $html = '';
        $alert_message  = $this->session->flashdata('message');
        $alert_class    = $this->session->flashdata('message-flag');

        if( !empty($alert_message) ):

        $html = ' <div class="alert ' . $alert_class .' no-border">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold">'. $alert_message .'</span>
                </div>';
        endif;

        return $html;
    }

    //Template engine
    public function loadTemplate($type = '', $data){
        $default_type   = "dashboard";
        $default_view   = 'layouts/dashboard';

        empty($type) ? $type = $default_type : null;
        empty($data['load_view']) ? $data['load_view'] = $default_view : null;

        //get flash messages if there is any
        $data['messages'] = $this->show_messages();

        if($type == 'dashboard')
        {
            //if doesnt exist, generate it :)
            empty($data['header']) ? $data['header'] = '' : null;

            $data['is_admin'] = $this->is_user_admin();

            //load views
            $this->load->view('parts/header.php', $data['header']);
            $this->load->view('layouts/templates/template.php',array('data' => $data));
        }
        elseif ($type == 'blank'){
            //Show data without header, footer and menus

            //if doesnt exist, generate it :)
            empty($data['header']) ? $data['header'] = '' : null;

            //if doesnt exist, generate container settings,
            //its load int container element, can pass class and style attribute
            empty($data['content_attrs']) ? $data['content_attrs'] = '' : null;

            //load views
            $this->load->view('parts/header.php', $data['header']);
            $this->load->view('layouts/templates/template_blank.php',array('data' => $data));
        }


    }


}