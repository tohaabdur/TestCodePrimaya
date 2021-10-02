<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
	}

    public function index()
	{
		$this->load->library("pagination");
		$this->load->model("product_model");
		$this->template->jsfile = 'product';

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
			$url = base_url().'index.php/product/index/'.$type.'/NULL/';
		}
		else
		{
			$clause = $keyword;
			$url = base_url().'index.php/product/index/'.$type.'/'.$clause.'/';
		}

		$uri = 5;

		$total_row	= $this->product_model->get_total_data($clause);

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
		$data = array('list'=>$this->product_model->get_list_data($per_page,$page,$clause), 'pagination'=>$this->pagination->create_links(), 'search'=>$search);

        $data['category'] = $this->product_model->get_category();
        $data['unit'] = $this->product_model->get_unit();

		$this->template->view('product_list',$data);
	}

	public function get_subcategory()
	{
		$this->load->model("product_model");
        $ID = $this->input->post('ID_Category');
		if(isset($ID) || $ID!='')
		{
            $data = $this->product_model->get_subcategory($ID);
            if($data)
            {			
                echo json_encode(array('Success'=>true,'Message'=>'Berhasil mengambil data','Data'=>$data));
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
		$this->load->model("product_model");
		$Name = $this->input->post('Name');
		$ID_Category = $this->input->post('ID_Category');
		$ID_Subcategory = $this->input->post('ID_Subcategory');
		$ID_Unit = $this->input->post('ID_Unit');
		$Price = $this->input->post('Price');
		$FlagReady = $this->input->post('FlagReady');
		$Image = $this->input->post('Image');
		$ID_User = $this->input->post('ID_User');


		if(isset($Name) && isset($ID_Category) 
        && isset($ID_Subcategory) && isset($ID_Unit) && isset($Price) 
        && isset($FlagReady) && isset($Image))
		{

			$this->load->library('user_agent');
			$Activity = 'Create product '.$Name;
			$IPAddress = $this->input->ip_address();
			$UserAgent = $this->agent->agent_string();

			if($this->product_model->saveData($Name,$ID_Category,$ID_Subcategory,$ID_Unit,$Price,$FlagReady,$Image,$ID_User,$Activity,$IPAddress,$UserAgent))
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

	public function get_detail()
	{
		$this->load->model("product_model");
		$ID = $this->input->post('ID');
		if(isset($ID) || $ID!='')
		{
			$data = $this->product_model->get_detail($ID);
			if($data)
			{			
				echo json_encode(array('Success'=>true,'Message'=>'Berhasil mengambil data','Data'=>$data));
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
		$this->load->model("product_model");
		$ID = $this->input->post('ID');
		$Name = $this->input->post('Name');
		$ID_Category = $this->input->post('ID_Category');
		$ID_Subcategory = $this->input->post('ID_Subcategory');
		$ID_Unit = $this->input->post('ID_Unit');
		$Price = $this->input->post('Price');
		$FlagReady = $this->input->post('FlagReady');
		$Image = $this->input->post('Image');
		$ID_User = $this->input->post('ID_User');

		if(isset($ID) && isset($Name) && isset($ID_Category) 
        && isset($ID_Subcategory) && isset($ID_Unit) && isset($Price) 
        && isset($FlagReady) && isset($Image))
		{

			$this->load->library('user_agent');
			$Activity = 'Update product '.$Name;
			$IPAddress = $this->input->ip_address();
			$UserAgent = $this->agent->agent_string();

			if($this->product_model->editData($ID,$Name,$ID_Category,$ID_Subcategory,$ID_Unit,$Price,$FlagReady,$Image,$ID_User,$Activity,$IPAddress,$UserAgent))
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

	public function delete_data()
	{
		$this->load->model("product_model");
		$ID = $this->input->post('ID');
		$ID_User = $this->input->post('ID_User');
		if(isset($ID) && $ID!='' && isset($ID_User) && $ID_User!='')
		{
            if($this->product_model->check_used($ID) > 0)
            {
                echo json_encode(array('Success'=>false,'Message'=>'Produk sudah pernah digunakan untuk transaksi, tidah dapat dihapus'));
            }
            else
            {
                $this->load->library('user_agent');
                $Activity = 'Delete product '.$ID;
                $IPAddress = $this->input->ip_address();
                $UserAgent = $this->agent->agent_string();
    
                if($this->product_model->delete_data($ID,$ID_User,$Activity,$IPAddress,$UserAgent))
                {			
                    echo json_encode(array('Success'=>true,'Message'=>'Berhasil menghapus data'));
                }
                else
                {
                    echo json_encode(array('Success'=>false,'Message'=>'Gagal menghapus data!'));
                }
            }
		}
		else
		{
			echo json_encode(array('Success'=>false,'Message'=>'Form tidak boleh kosong!'));
		}		
	}
}
