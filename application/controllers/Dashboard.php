<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CLCMS_Controller {

	public function index()
	{
        $this->required_login();
        $this->load->view('layouts/welcome_message');
	}


}
