<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends CI_Model {

    public function rekap_order($ID_User,$Tgl1,$Tgl2)
    {
        return $this->db->query("SELECT
                                    a.ID,
                                    a.DateTime,
                                    a.Total AS Total,
                                    SUM(b.Qty) AS Qty,
                                    g.Name AS TableName,
                                    h.Name AS NameUser,
                                    a.FlagPayment
                                FROM
                                    trans_order_header a,
                                    trans_order_detail b,
                                    master_product c,
                                    master_category d,
                                    master_subcategory e,
                                    master_unit f,
                                    master_table g,
                                    master_user h
                                WHERE 
                                    a.Status='1'
                                    AND a.ID=b.ID
                                    AND a.ID_Table=g.ID
                                    AND a.ID_User=h.ID
                                    AND b.ID_Product=c.ID
                                    AND c.ID_Category=d.ID
                                    AND c.ID_Subcategory=e.ID
                                    AND c.ID_Unit=f.ID
                                    AND a.ID_User='$ID_User'
                                    AND DATE_FORMAT(a.DateTime,'%Y-%m-%d')>='$Tgl1'
                                    AND DATE_FORMAT(a.DateTime,'%Y-%m-%d')<='$Tgl2'
                                GROUP BY a.ID
                                ORDER BY a.ID ASC")->result();

                                echo $sql;die();
    }

    public function detail_order($ID_User,$Tgl1,$Tgl2)
    {
        return $this->db->query("SELECT
                                    a.ID,
                                    a.DateTime,
                                    g.Name AS TableName,
                                    h.Name AS NameUser,
                                    c.Name AS ProductName,
                                    d.Name AS CategoryName,
                                    e.Name AS SubcategoryName,
                                    b.Counter,
                                    b.Price,
                                    b.Qty,
                                    b.Total,
                                    f.Unit,
                                    a.FlagPayment
                                FROM
                                    trans_order_header a,
                                    trans_order_detail b,
                                    master_product c,
                                    master_category d,
                                    master_subcategory e,
                                    master_unit f,
                                    master_table g,
                                    master_user h
                                WHERE 
                                    a.Status='1'
                                    AND a.ID=b.ID
                                    AND a.ID_Table=g.ID
                                    AND a.ID_User=h.ID
                                    AND b.ID_Product=c.ID
                                    AND c.ID_Category=d.ID
                                    AND c.ID_Subcategory=e.ID
                                    AND c.ID_Unit=f.ID
                                    AND a.ID_User='$ID_User'
                                    AND DATE_FORMAT(a.DateTime,'%Y-%m-%d')>='$Tgl1'
                                    AND DATE_FORMAT(a.DateTime,'%Y-%m-%d')<='$Tgl2'
                                GROUP BY a.ID,b.Counter
                                ORDER BY a.ID,b.Counter ASC")->result();
    }

    public function rekap_payment($ID_User,$Tgl1,$Tgl2)
    {
        return $this->db->query("SELECT
                                    a.ID,
                                    a.DateTime,
                                    d.`Name` AS NameUser,
                                    c.PaymentMethod,
                                    COUNT(b.ID_Order) AS CountOrder,
                                    a.TotalOrder,
                                    a.Disc,
                                    a.DiscRupiah,
                                    a.PPN,
                                    a.PPNRupiah,
                                    a.ServiceCharge,
                                    a.ServiceChargeRupiah,
                                    a.GrandTotal AS TotalTagihan,
                                    a.Voucher,
                                    a.TotalPayment,
                                    a.TotalChange
                                FROM
                                    trans_payment_header a,
                                    trans_payment_detail b,
                                    master_payment_method c,
                                    master_user d
                                WHERE 
                                    a.Status='1'
                                    AND a.ID=b.ID
                                    AND a.ID_PaymentMethod=c.ID
                                    AND a.ID_User=d.ID
                                    AND a.ID_User='$ID_User'
                                    AND DATE_FORMAT(a.DateTime,'%Y-%m-%d')>='$Tgl1'
                                    AND DATE_FORMAT(a.DateTime,'%Y-%m-%d')<='$Tgl2'
                                GROUP BY a.ID
                                ORDER BY a.ID ASC")->result();
    }

    public function detail_payment($ID_User,$Tgl1,$Tgl2)
    {
        return $this->db->query("SELECT
                                    a.ID,
                                    a.DateTime,
                                    d.`Name` AS NameUser,
                                    c.PaymentMethod,
                                    b.ID_Order,
                                    b.TotalOrder
                                FROM
                                    trans_payment_header a,
                                    trans_payment_detail b,
                                    master_payment_method c,
                                    master_user d
                                WHERE 
                                    a.Status='1'
                                    AND a.ID=b.ID
                                    AND a.ID_PaymentMethod=c.ID
                                    AND a.ID_User=d.ID
                                    AND a.ID_User='$ID_User'
                                    AND DATE_FORMAT(a.DateTime,'%Y-%m-%d')>='$Tgl1'
                                    AND DATE_FORMAT(a.DateTime,'%Y-%m-%d')<='$Tgl2'
                                GROUP BY a.ID,b.ID_Order
                                ORDER BY a.ID,b.ID_Order ASC")->result();
    }
}
