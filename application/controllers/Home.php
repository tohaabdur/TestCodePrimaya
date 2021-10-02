<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->template->jsfile = 'home';
        $this->load->model("home_model");
        $ID_UserLevel = $this->session->userdata('ID_UserLevel');
		$data['menu_list'] = $this->home_model->get_menu($ID_UserLevel);
		$this->template->view('home',$data);
	}
}
