<?PHP
defined('BASEPATH') OR exit('No direct script access allowed');
Class Template
{
    public $jsfile = NULL;
    public $pagination_perpage = NULL;
    public $pagination_url = NULL;
    public $pagination_totalrow = NULL;
    public $pagination_uri = NULL;
    
    public function __construct()
    {
        $this->CI =& get_instance();
    }
    
    public function view($pages = 'home',$dataview = NULL)
    {
        if(!$this->CI->session->userdata("ID_User"))
        {
            redirect("signin");
        }
        else
        {
            if(! file_exists(APPPATH.'/views/pages/'.$pages.'.php'))
            {
                show_404();
            }
            $data['title'] = ucfirst($pages);
            $data['jsfile'] = $this->jsfile;
            $this->CI->load->view('templates/header',$data);
            $this->CI->load->view('pages/'.$pages,$dataview);
            $this->CI->load->view('templates/footer');
        }
    }

    public function page_style($perpage,$url,$uri,$totalrows)
    {
        $config = array(
        'first_link' => 'First',
        'last_link' => 'Last',
        'next_link' => 'Next',
        'prev_link' => 'Prev',
        'full_tag_open' => '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">',
        'full_tag_close' => '</ul></nav></div>',
        'num_tag_open' => '<li class="page-item"><span class="page-link">',
        'num_tag_close' => '</span></li>',
        'cur_tag_open' => '<li class="page-item active"><span class="page-link">',
        'cur_tag_close' => '<span class="sr-only"></span></span></li>',
        'next_tag_open' => '<li class="page-item"><span class="page-link">',
        'next_tagl_close' => '<span aria-hidden="true">&raquo;</span></span></li>',
        'prev_tag_open' => '<li class="page-item"><span class="page-link">',
        'prev_tagl_close' => '</span>Next</li>',
        'first_tag_open' => '<li class="page-item"><span class="page-link">',
        'first_tagl_close' => '</span></li>',
        'last_tag_open' => '<li class="page-item"><span class="page-link">',
        'last_tagl_close' => '</span></li>',
        'per_page' => $perpage,
        'base_url' => $url,
        'uri_segment' => $uri,
        'total_rows' => $totalrows);
        
        return $config;
    }
}
?>