 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class MY_Controller extends CI_Controller{

    public function __construct(){
       parent::__construct();
       $this->isLogined();
       $this->load->model("Common_m");
    }

    public function load_view($page_name, $params, $title){

        $publishers = $this->Common_m->getPublisher();
        
        $this->data = array(
           "page" => APPPATH.'views/'.$page_name,
           "params" => $params,
           "title" => $title,
           "publishers" => $publishers
        );

        $this->load->view('main_layout', $this->data);
    }

    public function isLogined(){
      if ($_SESSION['uname']) {

      }else{
        redirect(base_url('/login'));
      }
    }
  }