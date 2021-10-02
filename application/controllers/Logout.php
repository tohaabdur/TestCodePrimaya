<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
        $this->load->model("signin_model");

        $this->load->library('user_agent');
        $ID_User = $this->session->userdata('ID_User');
        $Activity = 'Loged out';
        $DateTime = date('Y-m-d H:i:s');
        $IPAddress = $this->input->ip_address();
        $UserAgent = $this->agent->agent_string();
        $this->signin_model->insert_log($ID_User,$Activity,$DateTime,$IPAddress,$UserAgent);

        $this->session->sess_destroy();

		redirect('signin');
	}
}
