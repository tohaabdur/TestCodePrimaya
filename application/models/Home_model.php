<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {
    
	public function get_menu($ID_UserLevel)
	{
        $sql = "SELECT a.ID_Menu,b.URL,b.Icon,b.Color,b.Title,a.FlagView,a.FlagAdd,a.FlagEdit,a.FlagDelete FROM master_user_permission a, master_menu b WHERE a.ID_Menu=b.ID AND a.ID_UserLevel='$ID_UserLevel' AND a.FlagView='1' AND b.Status='1' GROUP BY a.ID_Menu ORDER BY a.ID_Menu";
        return $this->db->query($sql)->result();
	}
}
