<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->template->jsfile = 'order';
		$this->template->view('order');
	}

	public function get_table()
	{
		$this->load->model("order_model");
		$data_table = $this->order_model->get_table();
		if($data_table)
		{			
			echo json_encode(array('Success'=>true,'Message'=>'Berhasil mengambil data meja','Data'=>$data_table));
		}
		else
		{
			echo json_encode(array('Success'=>false,'Message'=>'Data meja tidak ditemukan!'));
		}
	}

	public function get_subcategory()
	{
		$this->load->model("order_model");
		$data_subcategory = $this->order_model->get_subcategory();
		if($data_subcategory)
		{			
			echo json_encode(array('Success'=>true,'Message'=>'Berhasil mengambil data subcategory','Data'=>$data_subcategory));
		}
		else
		{
			echo json_encode(array('Success'=>false,'Message'=>'Data subcategory tidak ditemukan!'));
		}
	}

	public function get_product()
	{
		$this->load->model("order_model");
		$ID_Subcategory = $this->input->post('ID_Subcategory');
		if(!isset($ID_Subcategory) || $ID_Subcategory=='')
		{
			$ID_Subcategory = '1';
		}

		$data_result = $this->order_model->get_product($ID_Subcategory);
		if($data_result)
		{			
			echo json_encode(array('Success'=>true,'Message'=>'Berhasil mengambil data','Data'=>$data_result));
		}
		else
		{
			echo json_encode(array('Success'=>false,'Message'=>'Data tidak ditemukan!'));
		}
	}

	public function post()
	{
		$this->load->model("order_model");
		$ID_User = $this->input->post('ID_User');
		$ID_Table = $this->input->post('ID_Table');
		$GrandTotal = $this->input->post('Total');
		$OrderDetail = $this->input->post('Detail');


		if(isset($ID_User) && isset($ID_Table) && isset($GrandTotal) && isset($OrderDetail))
		{
			$ID_Order = $this->order_model->get_id_order();

			$DetailArray = array();

			$Counter = 0;

			$this->load->library('user_agent');
			$Activity = 'Create Order '.$ID_Order;
			$IPAddress = $this->input->ip_address();
			$UserAgent = $this->agent->agent_string();

			$OrderDetail = json_decode($OrderDetail);
			foreach($OrderDetail as $Detail)
			{
				$ID_Product = $Detail->ID_Product;
				$Name = $Detail->Name;
				$Price = $Detail->Price;
				$Qty = $Detail->Qty;
				$Total = $Detail->Total;
				$Notes = $Detail->Notes;

				$DetailArray[] = array("ID"=>$ID_Order,
						"Counter"=>$Counter,
						"ID_Product"=>$ID_Product,
						"Price"=>$Price,
						"Qty"=>$Qty,
						"Total"=>$Total,
						"Notes"=>$Notes);
				$Counter++;
			}

			if($this->order_model->saveData($ID_Order,$ID_User,$ID_Table,$GrandTotal,$DetailArray,$Activity,$IPAddress,$UserAgent))
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
		$this->load->model("order_model");
		$this->template->jsfile = 'order_list';

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
			$url = base_url().'index.php/order/list_trans/'.$type.'/NULL/';
		}
		else
		{
			$clause = $keyword;
			$url = base_url().'index.php/order/list_trans/'.$type.'/'.$clause.'/';
		}

		$uri = 5;

		$total_row	= $this->order_model->get_total_data($clause);

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
		$data = array('list'=>$this->order_model->get_list_trans($per_page,$page,$clause), 'pagination'=>$this->pagination->create_links(), 'search'=>$search);

		$this->template->view('order_list',$data);
	}

	public function get_detail()
	{
		$this->load->model("order_model");
		$ID = $this->input->post('ID');
		if(isset($ID) || $ID!='')
		{
			$data_header = $this->order_model->get_header_trans($ID);
			$data_detail = $this->order_model->get_detail_trans($ID);
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

	public function update_data()
	{
		$this->load->model("order_model");
		$ID = $this->input->post('ID');
		$ID_User = $this->input->post('ID_User');
		$Counter = $this->input->post('Counter');
		$ID_Product = $this->input->post('ID_Product');
		$Price = $this->input->post('Price');
		$Qty = $this->input->post('Qty');
		$Notes = $this->input->post('Notes');
		$Total = $this->input->post('Total');
		if(isset($ID) && $ID!='' && isset($ID_User) && $ID_User!='' && isset($Counter) && $Counter!='' && isset($ID_Product) && $ID_Product!='' && isset($Price) && $Price!='' && isset($Qty) && $Qty!='' && isset($Notes) && isset($Total) && $Total!='')
		{
			$this->load->library('user_agent');
			$Activity = 'Update Order '.$ID.' Product '.$ID_Product;
			$IPAddress = $this->input->ip_address();
			$UserAgent = $this->agent->agent_string();

			if($this->order_model->update_data($ID,$Counter,$ID_Product,$Price,$Qty,$Notes,$Total,$ID_User,$Activity,$IPAddress,$UserAgent))
			{			
				echo json_encode(array('Success'=>true,'Message'=>'Berhasil menyimpan data'));
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

	public function delete_data()
	{
		$this->load->model("order_model");
		$ID = $this->input->post('ID');
		$ID_User = $this->input->post('ID_User');
		$Counter = $this->input->post('Counter');
		$ID_Product = $this->input->post('ID_Product');
		$Price = $this->input->post('Price');
		$Qty = $this->input->post('Qty');
		$Notes = $this->input->post('Notes');
		$Total = $this->input->post('Total');
		if(isset($ID) && $ID!='' && isset($ID_User) && $ID_User!='' && isset($Counter) && $Counter!='' && isset($ID_Product) && $ID_Product!='')
		{
			$this->load->library('user_agent');
			$Activity = 'Delete Product '.$ID_Product.' From Order '.$ID;
			$IPAddress = $this->input->ip_address();
			$UserAgent = $this->agent->agent_string();

			if($this->order_model->delete_data($ID,$Counter,$ID_Product,$ID_User,$Activity,$IPAddress,$UserAgent))
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

	public function delete_trans()
	{
		$this->load->model("order_model");
		$ID = $this->input->post('ID');
		$ID_Table = $this->input->post('ID_Table');
		$ID_User = $this->input->post('ID_User');
		if(isset($ID) && $ID!='' && isset($ID_User) && $ID_User!='')
		{
			$this->load->library('user_agent');
			$Activity = 'Delete Order '.$ID;
			$IPAddress = $this->input->ip_address();
			$UserAgent = $this->agent->agent_string();

			if($this->order_model->delete_trans($ID,$ID_Table,$ID_User,$Activity,$IPAddress,$UserAgent))
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
