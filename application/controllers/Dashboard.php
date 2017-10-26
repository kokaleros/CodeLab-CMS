<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CLCMS_Controller {

	public function index()
	{
        $this->required_login();

        $data['user'] = $this->get_current_user_data();
        $data['header'] = array(
            'title'     => 'Dashboard',
            'css'       => array( 'custom.css' ) //assets/css/custom.css
        );

        $data['load_view'] = 'layouts/dashboard';

        $this->loadTemplate('dashboard', $data);
	}
}
