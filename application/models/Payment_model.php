<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_model extends CI_Model {
        
    public function get_open_order()
	{
        return $this->db->query("SELECT a.*,b.Name AS TableName,c.Name AS NameUser FROM trans_order_header a, master_table b, master_user c WHERE a.ID_Table=b.ID AND a.ID_User=c.ID AND a.Status='1' AND a.FlagPayment='0' GROUP BY a.ID ORDER BY a.ID_Table ASC,ID DESC")->result();
	}

    public function get_header_order($ID)
    {
        return $this->db->query("SELECT a.*,b.Name AS TableName,c.Name AS NameUser FROM trans_order_header a, master_table b, master_user c WHERE a.ID_Table=b.ID AND a.ID_User=c.ID AND a.Status='1' AND a.ID = '$ID' GROUP BY a.ID")->row();
    }

    public function get_detail_order($ID)
    {
        return $this->db->query("SELECT a.*,b.Name FROM trans_order_detail a, master_product b WHERE a.ID='$ID' AND a.ID_Product=b.ID GROUP BY a.Counter ORDER BY a.Counter ASC")->result();
    }

    public function get_payment_method()
	{
        $sql = "SELECT * FROM master_payment_method WHERE Status='1' ORDER BY ID ASC";
        return $this->db->query($sql)->result();
	}

    public function get_ppn_sc()
	{
        $sql = "SELECT * FROM setup";
        return $this->db->query($sql)->row();
	}

    public function get_id_payment()
    {
        $Date = date('Y-m-d');
        $this->db->simple_query("UPDATE counter_trans SET ID_Payment = ID_Payment+1 WHERE Date='$Date'");
        $data_id = $this->db->get_where('counter_trans',array('Date'=>$Date))->row();
        if(isset($data_id))
        {
            $ID_Payment = 'BYR'.date('Ymd').'-'.str_pad($data_id->ID_Payment, 3, '0', STR_PAD_LEFT);
        }
        else
        {
            $ID_Payment = 'BYR'.date('Ymd').'-'.'001';
        }

        return $ID_Payment;
    }

    public function saveData($ID_Payment,$ID_User,$ID_PaymentMethod,$TotalOrder,$Disc,$DiscRupiah,$PPN,$PPNRupiah,$ServiceCharge,$ServiceChargeRupiah,$GrandTotal,$Voucher,$TotalPayment,$TotalChange,$DetailArray,$Activity,$IPAddress,$UserAgent)
    {
        $DateTime = date('Y-m-d H:i:s');
        $dataInsertHeader = array(
            'DateTime'=>$DateTime,
            'ID'=>$ID_Payment,
            'ID_User'=>$ID_User,
            'ID_PaymentMethod'=>$ID_PaymentMethod,
            'TotalOrder'=>$TotalOrder,
            'Disc'=>$Disc,
            'DiscRupiah'=>$DiscRupiah,
            'PPN'=>$PPN,
            'PPNRupiah'=>$PPNRupiah,
            'ServiceCharge'=>$ServiceCharge,
            'ServiceChargeRupiah'=>$ServiceChargeRupiah,
            'GrandTotal'=>$GrandTotal,
            'Voucher'=>$Voucher,
            'TotalPayment'=>$TotalPayment,
            'TotalChange'=>$TotalChange,
            'Status'=>'1',
            'AddDate'=>$DateTime,
            'AddUser'=>$ID_User
        );
        if($this->db->insert('trans_payment_header',$dataInsertHeader))
        {
            if($this->db->insert_batch('trans_payment_detail',$DetailArray))
            {
                if($this->db->simple_query("UPDATE trans_order_header SET FlagPayment='1' WHERE ID IN (SELECT ID_Order FROM trans_payment_detail WHERE ID='$ID_Payment')"))
                {
                    if($this->db->query("UPDATE master_table AS t LEFT JOIN (SELECT ID_Table,COUNT(*) AS CounterTrans FROM trans_order_header WHERE Status='1' AND FlagPayment='0' GROUP BY ID_Table) AS m ON m.ID_Table = t.ID SET t.CounterTrans = COALESCE(m.CounterTrans,0)"))
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
        else
        {
            return false;
        }
    }

    public function get_list_trans($per_page=15,$page=0,$clause='')
    {
        return $this->db->query("SELECT a.*,b.PaymentMethod AS PaymentMethod,c.Name AS NameUser FROM trans_payment_header a, master_payment_method b, master_user c WHERE a.ID_PaymentMethod=b.ID AND a.ID_User=c.ID AND a.Status='1' AND a.ID LIKE '%$clause%' GROUP BY a.ID ORDER BY a.ID DESC LIMIT $page,$per_page")->result();
    }

    public function get_total_data($clause='')
    {
        return $this->db->query("SELECT * FROM trans_payment_header WHERE Status='1' AND ID LIKE '%$clause%'")->num_rows();
    }

    public function get_header_trans($ID)
    {
        return $this->db->query("SELECT a.*,b.PaymentMethod AS PaymentMethod,c.Name AS NameUser FROM trans_payment_header a, master_payment_method b, master_user c WHERE a.ID_PaymentMethod=b.ID AND a.ID_User=c.ID AND a.Status='1' AND a.ID = '$ID' GROUP BY a.ID")->row();
    }

    public function get_detail_trans($ID)
    {
        return $this->db->query("SELECT a.*,b.ID_Table,c.Name AS TableName FROM trans_payment_detail a, trans_order_header b, master_table c WHERE a.ID='$ID' AND a.ID_Order=b.ID AND b.ID_Table=c.ID GROUP BY a.ID_Order ORDER BY a.ID_Order ASC")->result();
    }

    public function delete_trans($ID,$ID_User,$Activity,$IPAddress,$UserAgent)
    {
        $DateTime = date('Y-m-d H:i:s');
        if($this->db->update('trans_payment_header', array('DeleteDate'=>$DateTime,'DeleteUser'=>$ID_User,'Status'=>'0'), array('ID'=>$ID)))
        {
            if($this->db->query("UPDATE trans_order_header SET FlagPayment='0' WHERE ID IN (SELECT ID_Order FROM trans_payment_detail WHERE ID='$ID')"))
            {
                if($this->db->query("UPDATE master_table AS t LEFT JOIN (SELECT ID_Table,COUNT(*) AS CounterTrans FROM trans_order_header WHERE Status='1' AND FlagPayment='0' GROUP BY ID_Table) AS m ON m.ID_Table = t.ID SET t.CounterTrans = COALESCE(m.CounterTrans,0)"))
                {
                    return $this->db->insert('log_activity',array('ID_User'=>$ID_User,'Activity'=>$Activity,'DateTime'=>$DateTime,'IPAddress'=>$IPAddress,'UserAgent'=>$UserAgent));
                }
                else
                {
                    return false;
                }
            }
        }
        else
        {
            return false;
        }
    }
}
