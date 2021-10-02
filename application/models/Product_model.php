<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {
        
    public function get_list_data($per_page=15,$page=0,$clause='')
	{
        return $this->db->query("SELECT a.ID,a.Name,a.ID_Category,b.Name AS NameCategory,a.ID_Subcategory,c.Name AS NameSubcategory,a.ID_Unit,d.Unit,a.Price,a.FlagReady,a.Image FROM master_product a, master_category b, master_subcategory c, master_unit d WHERE a.ID_Category=b.ID AND a.ID_Subcategory=c.ID AND a.ID_Unit=d.ID AND a.Status='1' AND a.Name LIKE '%$clause%' GROUP BY a.ID ORDER BY a.ID_Category,a.ID_Subcategory,a.ID ASC LIMIT $page,$per_page")->result();
	}

    public function get_total_data($clause='')
    {
        return $this->db->query("SELECT * FROM master_product WHERE Status='1' AND Name LIKE '%$clause%'")->num_rows();
    }

    public function get_all_data_search($Keyword)
    {
        return $this->db->query("SELECT a.ID,a.Name,a.ID_Category,b.Name AS NameCategory,a.ID_Subcategory,c.Name AS NameSubcategory,a.ID_Unit,d.Unit,a.Price,a.FlagReady,a.Image FROM master_product a, master_category b, master_subcategory c, master_unit d WHERE a.ID_Category=b.ID AND a.ID_Subcategory=c.ID AND a.ID_Unit=d.ID AND a.Status='1' AND a.Name LIKE '%$Keyword%' GROUP BY a.ID ORDER BY a.ID_Category,a.ID_Subcategory,a.ID ASC")->result();
    }

    public function get_category()
    {
        return $this->db->query("SELECT * FROM master_category WHERE Status='1' ORDER BY ID ASC")->result();
    }

    public function get_subcategory($ID_Category)
    {
        return $this->db->query("SELECT * FROM master_subcategory WHERE Status='1' AND ID_Category='$ID_Category' ORDER BY ID ASC")->result();
    }

    public function get_unit()
    {
        return $this->db->query("SELECT * FROM master_unit WHERE Status='1' ORDER BY ID ASC")->result();
    }

    public function saveData($Name,$ID_Category,$ID_Subcategory,$ID_Unit,$Price,$FlagReady,$Image,$ID_User,$Activity,$IPAddress,$UserAgent)
    {
        $DateTime = date('Y-m-d H:i:s');
        $dataInsert = array(
            'Name'=>$Name,
            'ID_Category'=>$ID_Category,
            'ID_Subcategory'=>$ID_Subcategory,
            'ID_Unit'=>$ID_Unit,
            'Price'=>$Price,
            'FlagReady'=>$FlagReady,
            'Image'=>$Image,
            'Status'=>'1',
            'AddDate'=>$DateTime,
            'AddUser'=>$ID_User
        );
        if($this->db->insert('master_product',$dataInsert))
        {
            return $this->db->insert('log_activity',array('ID_User'=>$ID_User,'Activity'=>$Activity,'DateTime'=>$DateTime,'IPAddress'=>$IPAddress,'UserAgent'=>$UserAgent));
        }
        else
        {
            return false;
        }
    }

    public function editData($ID,$Name,$ID_Category,$ID_Subcategory,$ID_Unit,$Price,$FlagReady,$Image,$ID_User,$Activity,$IPAddress,$UserAgent)
    {
        $DateTime = date('Y-m-d H:i:s');
        $dataInsert = array(
            'Name'=>$Name,
            'ID_Category'=>$ID_Category,
            'ID_Subcategory'=>$ID_Subcategory,
            'ID_Unit'=>$ID_Unit,
            'Price'=>$Price,
            'FlagReady'=>$FlagReady,
            'Image'=>$Image,
            'Status'=>'1',
            'AddDate'=>$DateTime,
            'AddUser'=>$ID_User
        );
        if($this->db->update('master_product',$dataInsert,array('ID'=>$ID)))
        {
            return $this->db->insert('log_activity',array('ID_User'=>$ID_User,'Activity'=>$Activity,'DateTime'=>$DateTime,'IPAddress'=>$IPAddress,'UserAgent'=>$UserAgent));
        }
        else
        {
            return false;
        }
    }

    public function get_detail($ID)
    {
        return $this->db->query("SELECT a.ID,a.Name,a.ID_Category,b.Name AS NameCategory,a.ID_Subcategory,c.Name AS NameSubcategory,a.ID_Unit,d.Unit,a.Price,a.FlagReady,a.Image FROM master_product a, master_category b, master_subcategory c, master_unit d WHERE a.ID_Category=b.ID AND a.ID_Subcategory=c.ID AND a.ID_Unit=d.ID AND a.Status='1' AND a.ID='$ID' GROUP BY a.ID")->row();
    }

    public function check_used($ID)
    {
        return $this->db->query("SELECT * FROM trans_order_detail WHERE ID_Product='$ID'")->num_rows();
    }

    public function delete_data($ID,$ID_User,$Activity,$IPAddress,$UserAgent)
    {
        $DateTime = date('Y-m-d H:i:s');
        if($this->db->update('master_product', array('DeleteDate'=>$DateTime,'DeleteUser'=>$ID_User,'Status'=>'0'), array('ID'=>$ID)))
        {
            return $this->db->insert('log_activity',array('ID_User'=>$ID_User,'Activity'=>$Activity,'DateTime'=>$DateTime,'IPAddress'=>$IPAddress,'UserAgent'=>$UserAgent));
        }
        else
        {
            return false;
        }
    }
}
