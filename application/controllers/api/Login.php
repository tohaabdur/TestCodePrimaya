<?PHP
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
header('Content-Type: application/json');
defined('BASEPATH') OR exit('No direct script access allowed');
Class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    
    function post()
    {
        $jsonStr = file_get_contents("php://input");
        $json = json_decode($jsonStr);
        if($json)
        {
            $Username = addslashes(trim($json->Username));
            $Password = addslashes(trim($json->Password));
        }
        else
        {
            $Username = addslashes(trim($this->input->post('Username')));
            $Password = addslashes(trim($this->input->post('Password')));
        }

        if($Username != '' && $Password != '')
        {
            $this->load->model("signin_model");
            if($this->signin_model->check_data($Username,md5($Password)) > 0)
            {
                $data_user = $this->signin_model->get_data($Username,md5($Password));
                if(isset($data_user))
                {
                    $this->load->library('user_agent');
                    $ID_User = $data_user->ID;
                    $ID_UserLevel = $data_user->ID_UserLevel;
                    $Name = $data_user->Name;
                    $Activity = 'Success Login';
                    $DateTime = date('Y-m-d H:i:s');
                    $IPAddress = $this->input->ip_address();
                    $UserAgent = $this->agent->agent_string();
                    $this->signin_model->insert_log($ID_User,$Activity,$DateTime,$IPAddress,$UserAgent);

                    $data_session = array("ID_User" => $ID_User, "ID_UserLevel" => $ID_UserLevel, "Name" => $Name);
                    $this->session->set_userdata($data_session);
                    
                    echo json_encode(array('Success'=>true,'Message'=>'Berhasil masuk','Data'=>array('ID_User'=>$ID_User,'ID_UserLevel'=>$ID_UserLevel,'Name'=>$Name)));
                    die();
                }
                else
                {
                    echo json_encode(array('Success'=>false,'Message'=>'Akun anda tidak ditemukan!'));
                    die();
                }
            }
            else
            {
                echo json_encode(array('Success'=>false,'Message'=>'Nama Pengguna dan Kata Sandi salah!'));
                die();
            }  
        }
        else
        {
            echo json_encode(array("Status"=>array("Success"=>false, "Message"=>"Username dan Password tidak boleh kosong.")));
            die();
        }
    }
}
?>
