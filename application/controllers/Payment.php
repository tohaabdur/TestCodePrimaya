<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->template->jsfile = 'payment';
		$this->load->model("payment_model");
        $data['setup'] = $this->payment_model->get_ppn_sc();
        $data['payment_method'] = $this->payment_model->get_payment_method();
		$this->template->view('payment',$data);
	}

	public function get_order()
	{
		$this->load->model("payment_model");
		$data = $this->payment_model->get_open_order();
		if($data)
		{			
			echo json_encode(array('Success'=>true,'Message'=>'Berhasil mengambil data','Data'=>$data));
		}
		else
		{
			echo json_encode(array('Success'=>false,'Message'=>'Data tidak ditemukan!'));
		}
	}

	public function get_detail_order()
	{
		$this->load->model("payment_model");
		$ID = $this->input->post('ID');
		if(isset($ID) || $ID!='')
		{
			$data_header = $this->payment_model->get_header_order($ID);
			$data_detail = $this->payment_model->get_detail_order($ID);
			if($data_header && $data_detail)
			{
				echo json_encode(array('Success'=>true,'Message'=>'Berhasil mengambil data','Header'=>$data_header,'Data'=>$data_detail));
			}
			else
			{
				echo json_encode(array('Success'=>false,'Message'=>'Data tidak ditemukan!'));
			}
		}
		else
		{
			echo json_encode(array('Success'=>false,'Message'=>'ID tidak boleh kosong!'));
		}		
	}

	public function post()
	{
		$this->load->model("payment_model");
		$ID_User = $this->input->post('ID_User');
		$ID_PaymentMethod = $this->input->post('ID_PaymentMethod');
		$GrandTotalOrder = $this->input->post('TotalOrder');
		$Disc = $this->input->post('DiscPersen');
		$DiscRupiah = $this->input->post('DiscRupiah');
		$PPN = $this->input->post('PPNPersen');
		$PPNRupiah = $this->input->post('PPNRupiah');
		$ServiceCharge = $this->input->post('SCPersen');
		$ServiceChargeRupiah = $this->input->post('SCRupiah');
		$GrandTotal = $this->input->post('TotalTagihan');
		$Voucher = $this->input->post('Voucher');
		$TotalPayment = $this->input->post('TotalBayar');
		$TotalChange = $this->input->post('TotalChange');
		$OrderDetail = $this->input->post('Detail');


		if(isset($ID_User) && isset($ID_PaymentMethod) 
        && isset($GrandTotalOrder) && isset($Disc) && isset($DiscRupiah) 
        && isset($PPN) && isset($PPNRupiah) && isset($ServiceCharge) 
        && isset($ServiceChargeRupiah) && isset($GrandTotal) 
        && isset($Voucher) && isset($TotalPayment) 
        && isset($TotalChange) && isset($OrderDetail))
		{
			$ID_Payment = $this->payment_model->get_id_payment();

			$DetailArray = array();

			$this->load->library('user_agent');
			$Activity = 'Create Payment '.$ID_Payment;
			$IPAddress = $this->input->ip_address();
			$UserAgent = $this->agent->agent_string();

			$OrderDetail = json_decode($OrderDetail);
			foreach($OrderDetail as $Detail)
			{
				$ID_Order = $Detail->ID_Order;
				$TotalOrder = $Detail->TotalOrder;

				$DetailArray[] = array("ID"=>$ID_Payment,
						"ID_Order"=>$ID_Order,
						"TotalOrder"=>$TotalOrder);
			}

			if($this->payment_model->saveData($ID_Payment,$ID_User,$ID_PaymentMethod,$GrandTotalOrder,$Disc,$DiscRupiah,$PPN,$PPNRupiah,$ServiceCharge,$ServiceChargeRupiah,$GrandTotal,$Voucher,$TotalPayment,$TotalChange,$DetailArray,$Activity,$IPAddress,$UserAgent))
			{
				echo json_encode(array('Success'=>true,'Message'=>'Sukses menyimpan data'));
			}
			else
			{
				echo json_encode(array('Success'=>false,'Message'=>'Gagal menyimpan data!'));
			}
		}
		else
		{
			echo json_encode(array('Success'=>false,'Message'=>'Form tidak boleh kosong!'));
		}
	}

	public function list_trans()
	{
		$this->load->library("pagination");
		$this->load->model("payment_model");
		$this->template->jsfile = 'payment_list';

		$per_page = 10;
		$type = $this->uri->segment(3);
		$keyword = $this->uri->segment(4);
		$page = $this->uri->segment(5);

		if(!$page) //Success
		{
			$page = 0;
		}

		if(!$type)
		{
			$type = 'main';
		}

		if(!$keyword || $keyword=='NULL')
		{
			$clause = '';
			$url = base_url().'index.php/payment/list_trans/'.$type.'/NULL/';
		}
		else
		{
			$clause = $keyword;
			$url = base_url().'index.php/payment/list_trans/'.$type.'/'.$clause.'/';
		}

		$uri = 5;

		$total_row	= $this->payment_model->get_total_data($clause);

		$config = $this->template->page_style($per_page,$url,$uri,$total_row);
		$this->pagination->initialize($config);

		if($type == 'main')
		{
			$search = false;
		}
		elseif($type == 'search')
		{
			$search = true;
		}
		else
		{
			$search = false;
		}
		$data = array('list'=>$this->payment_model->get_list_trans($per_page,$page,$clause), 'pagination'=>$this->pagination->create_links(), 'search'=>$search);

		$this->template->view('payment_list',$data);
	}

	public function get_detail()
	{
		$this->load->model("payment_model");
		$ID = $this->input->post('ID');
		if(isset($ID) || $ID!='')
		{
			$data_header = $this->payment_model->get_header_trans($ID);
			$data_detail = $this->payment_model->get_detail_trans($ID);
			if($data_header && $data_detail)
			{			
				echo json_encode(array('Success'=>true,'Message'=>'Berhasil mengambil data','Header'=>$data_header,'Data'=>$data_detail));
			}
			else
			{
				echo json_encode(array('Success'=>false,'Message'=>'Data tidak ditemukan!'));
			}
		}
		else
		{
			echo json_encode(array('Success'=>false,'Message'=>'ID tidak boleh kosong!'));
		}		
	}

	public function delete_trans()
	{
		$this->load->model("payment_model");
		$ID = $this->input->post('ID');
		$ID_User = $this->input->post('ID_User');
		if(isset($ID) && $ID!='' && isset($ID_User) && $ID_User!='')
		{
			$this->load->library('user_agent');
			$Activity = 'Delete Payment '.$ID;
			$IPAddress = $this->input->ip_address();
			$UserAgent = $this->agent->agent_string();

			if($this->payment_model->delete_trans($ID,$ID_User,$Activity,$IPAddress,$UserAgent))
			{			
				echo json_encode(array('Success'=>true,'Message'=>'Berhasil menghapus data'));
			}
			else
			{
				echo json_encode(array('Success'=>false,'Message'=>'Gagal menghapus data!'));
			}
		}
		else
		{
			echo json_encode(array('Success'=>false,'Message'=>'Form tidak boleh kosong!'));
		}		
	}
}
