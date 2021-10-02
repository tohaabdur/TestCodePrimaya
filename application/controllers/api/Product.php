<?PHP
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
header('Content-Type: application/json');
defined('BASEPATH') OR exit('No direct script access allowed');
Class Product extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    
    function get()
    {
        $jsonStr = file_get_contents("php://input");
        $json = json_decode($jsonStr);
        if($json)
        {
            $Keyword = addslashes(trim($json->Keyword));
        }
        else
        {
            $Keyword = addslashes(trim($this->input->post('Keyword')));
        }

        if($Keyword)
        {
            $this->load->model('product_model');
            $data = $this->product_model->get_all_data_search($Keyword);
            if($data)
            {
                echo json_encode(array('Success'=>true,'Message'=>'Berhasil mengambil data','Data'=>$data));
                die();
            }
            else
            {
                echo json_encode(array("Status"=>array("Success"=>false, "Message"=>"Data yang anda cari tidak ditemukan.")));
                die();
            }
        }
        else
        {
            echo json_encode(array("Status"=>array("Success"=>false, "Message"=>"Kata kunci pencarian tidak boleh kosong.")));
            die();
        }
    }
}
?>
