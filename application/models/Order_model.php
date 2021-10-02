<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {
        
        public function get_table()
	{
                $sql = "SELECT * FROM master_table WHERE Status='1' ORDER BY ID ASC";
                return $this->db->query($sql)->result();
	}
        public function get_subcategory()
	{
                $sql = "SELECT * FROM master_subcategory WHERE Status='1' ORDER BY ID ASC";
                return $this->db->query($sql)->result();
	}

        public function get_product($ID_Subcategory)
	{
                $sql = "SELECT * FROM master_product WHERE Status='1' AND ID_Subcategory='$ID_Subcategory' ORDER BY ID ASC";
                return $this->db->query($sql)->result();
	}

        public function get_id_order()
        {
                $Date = date('Y-m-d');
                $this->db->simple_query("UPDATE counter_trans SET ID_Order = ID_Order+1 WHERE Date='$Date'");
                $data_id = $this->db->get_where('counter_trans',array('Date'=>$Date))->row();
                if(isset($data_id))
                {
                        $ID_Order = 'PSN'.date('Ymd').'-'.str_pad($data_id->ID_Order, 3, '0', STR_PAD_LEFT);
                }
                else
                {
                        $ID_Order = 'PSN'.date('Ymd').'-'.'001';
                }

                return $ID_Order;
        }

        public function saveData($ID_Order,$ID_User,$ID_Table,$Total,$DetailArray,$Activity,$IPAddress,$UserAgent)
        {
                $DateTime = date('Y-m-d H:i:s');
                $dataInsertHeader = array(
                        'ID'=>$ID_Order,
                        'DateTime'=>$DateTime,
                        'ID_User'=>$ID_User,
                        'ID_Table'=>$ID_Table,
                        'Total'=>$Total,
                        'FlagPayment'=>'0',
                        'Status'=>'1',
                        'AddDate'=>$DateTime,
                        'AddUser'=>$ID_User
                );
                if($this->db->insert('trans_order_header',$dataInsertHeader))
                {
                        if($this->db->insert_batch('trans_order_detail',$DetailArray))
                        {
                                if($this->db->simple_query("UPDATE master_table SET CounterTrans=CounterTrans+1 WHERE ID='$ID_Table'"))
                                {
                                        return $this->db->insert('log_activity',array('ID_User'=>$ID_User,'Activity'=>$Activity,'DateTime'=>$DateTime,'IPAddress'=>$IPAddress,'UserAgent'=>$UserAgent));
                                }
                                else
                                {
                                        return false;
                                }
                        }
                        else
                        {
                                return false;
                        }
                }
                else
                {
                        return false;
                }
        }

        public function get_list_trans($per_page=15,$page=0,$clause='')
        {
                return $this->db->query("SELECT a.*,b.Name AS TableName,c.Name AS NameUser FROM trans_order_header a, master_table b, master_user c WHERE a.ID_Table=b.ID AND a.ID_User=c.ID AND a.Status='1' AND a.FlagPayment='0' AND a.ID LIKE '%$clause%' GROUP BY a.ID ORDER BY a.ID DESC LIMIT $page,$per_page")->result();
        }

        public function get_total_data($clause='')
        {
                return $this->db->query("SELECT * FROM trans_order_header WHERE Status='1' AND FlagPayment='0' AND ID LIKE '%$clause%'")->num_rows();
        }

        public function get_header_trans($ID)
        {
                return $this->db->query("SELECT a.*,b.Name AS TableName,c.Name AS NameUser FROM trans_order_header a, master_table b, master_user c WHERE a.ID_Table=b.ID AND a.ID_User=c.ID AND a.Status='1' AND a.ID = '$ID' GROUP BY a.ID")->row();
        }

        public function get_detail_trans($ID)
        {
                return $this->db->query("SELECT a.*,b.Name FROM trans_order_detail a, master_product b WHERE a.ID='$ID' AND a.ID_Product=b.ID GROUP BY a.Counter ORDER BY a.Counter ASC")->result();
        }

        public function update_data($ID,$Counter,$ID_Product,$Price,$Qty,$Notes,$Total,$ID_User,$Activity,$IPAddress,$UserAgent)
        {
                $DateTime = date('Y-m-d H:i:s');
                if($this->db->update('trans_order_detail', array('Price'=>$Price,'Qty'=>$Qty,'Notes'=>$Notes,'Total'=>$Total), array('ID'=>$ID,'Counter'=>$Counter,'ID_Product'=>$ID_Product)))
                {
                        if($this->db->simple_query("UPDATE trans_order_header SET Total=(SELECT SUM(Total) FROM trans_order_detail WHERE Status='1' AND ID='$ID'),EditDate='$DateTime',EditUser='$ID_User' WHERE ID='$ID'"))
                        {
                                return $this->db->insert('log_activity',array('ID_User'=>$ID_User,'Activity'=>$Activity,'DateTime'=>$DateTime,'IPAddress'=>$IPAddress,'UserAgent'=>$UserAgent));
                        }
                        else
                        {
                                return false;
                        }
                }
                else
                {
                        return false;
                }
        }

        public function delete_data($ID,$Counter,$ID_Product,$ID_User,$Activity,$IPAddress,$UserAgent)
        {
                $DateTime = date('Y-m-d H:i:s');
                if($this->db->delete('trans_order_detail', array('ID'=>$ID,'Counter'=>$Counter,'ID_Product'=>$ID_Product)))
                {
                        if($this->db->simple_query("UPDATE trans_order_header SET Total=(SELECT SUM(Total) FROM trans_order_detail WHERE Status='1' AND ID='$ID'),EditDate='$DateTime',EditUser='$ID_User' WHERE ID='$ID'"))
                        {
                                return $this->db->insert('log_activity',array('ID_User'=>$ID_User,'Activity'=>$Activity,'DateTime'=>$DateTime,'IPAddress'=>$IPAddress,'UserAgent'=>$UserAgent));
                        }
                        else
                        {
                                return false;
                        }
                }
                else
                {
                        return false;
                }
        }

        public function delete_trans($ID,$ID_Table,$ID_User,$Activity,$IPAddress,$UserAgent)
        {
                $DateTime = date('Y-m-d H:i:s');
                if($this->db->update('trans_order_header', array('DeleteDate'=>$DateTime,'DeleteUser'=>$ID_User,'Status'=>'0'), array('ID'=>$ID)))
                {
                        if($this->db->query("UPDATE master_table SET CounterTrans=(SELECT COUNT(*) FROM trans_order_header WHERE ID_Table='$ID_Table' AND Status='1' AND FlagPayment='0') WHERE ID = '$ID_Table'"))
                        {
                                return $this->db->insert('log_activity',array('ID_User'=>$ID_User,'Activity'=>$Activity,'DateTime'=>$DateTime,'IPAddress'=>$IPAddress,'UserAgent'=>$UserAgent));
                        }
                        else
                        {
                                return false;
                        }
                }
                else
                {
                        return false;
                }
        }
}
