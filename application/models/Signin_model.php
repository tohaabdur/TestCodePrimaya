<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signin_model extends CI_Model {
    
	public function check_data($Username,$Password)
	{
        return $this->db->get_where('master_user', array('Username' => $Username,'Password'=>$Password,'Status'=>'1'))->num_rows();
	}

	public function get_data($Username,$Password)
	{
        return $this->db->get_where('master_user', array('Username' => $Username,'Password'=>$Password,'Status'=>'1'))->row();
	}

	public function insert_log($ID_User,$Activity,$DateTime,$IPAddress,$UserAgent)
	{
        return $this->db->insert('log_activity', array('ID_User' => $ID_User,'Activity'=>$Activity, 'DateTime'=>$DateTime, 'IPAddress'=>$IPAddress, 'UserAgent'=>$UserAgent));
	}
}
