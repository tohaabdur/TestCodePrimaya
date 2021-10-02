<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->template->jsfile = 'report';
        $data['Tgl1'] = date('Y-m-d');
        $data['Tgl2'] = date('Y-m-d');
        $data['Option'] = 'rekap_order';
        $data['list'] = null;
		$this->template->view('report',$data);
	}
    
    public function get_data()
    {
		$this->template->jsfile = 'report';
		$this->load->model("report_model");
        $ID_User = $this->input->post('ID_User');
        $Option = $this->input->post('Option');
        $Tgl1 = $this->input->post('Tgl1');
        $Tgl2 = $this->input->post('Tgl2');

        if(isset($ID_User) && isset($Tgl1) && isset($Tgl2))
        {
            switch ($Option) {
                case 'rekap_order':
                    $result = $this->report_model->rekap_order($ID_User,$Tgl1,$Tgl2);
                    $view = 'report_rekap_order';
                    break;
                case 'detail_order':
                    $result = $this->report_model->detail_order($ID_User,$Tgl1,$Tgl2);
                    $view = 'report_detail_order';
                    break;
                case 'rekap_payment':
                    $result = $this->report_model->rekap_payment($ID_User,$Tgl1,$Tgl2);
                    $view = 'report_rekap_payment';
                    break;
                case 'detail_payment':
                    $result = $this->report_model->detail_payment($ID_User,$Tgl1,$Tgl2);
                    $view = 'report_detail_payment';
                    break;
                default:
                    $result = $this->report_model->rekap_order($ID_User,$Tgl1,$Tgl2);
                    $view = 'report_rekap_order';
                    break;
            }

            if($result)
            {
                $data['Tgl1'] = $Tgl1;
                $data['Tgl2'] = $Tgl2;
                $data['list'] = $result;
                $data['Option'] = $Option;
                $this->template->view($view,$data);
            }
            else
            {
                echo "<script>Data tidak ditemukan</script>";
                redirect('report');
            }
            
        }
        else
        {
            echo json_encode(array('Success'=>false,'Message'=>'Form tidak boleh kosong!'));
        }
    }
}
