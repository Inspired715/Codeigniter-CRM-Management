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

    public function exec_curl($url, $headers, $data){
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data);  //Post Fields
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      
      // $headers = [
      //     'X-Apple-Tz: 0',
      //     'X-Apple-Store-Front: 143444,12',
      //     'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
      //     'Accept-Encoding: gzip, deflate',
      //     'Accept-Language: en-US,en;q=0.5',
      //     'Cache-Control: no-cache',
      //     'Content-Type: application/x-www-form-urlencoded; charset=utf-8',
      //     'Host: www.example.com',
      //     'Referer: http://www.example.com/index.php', //Your referrer address
      //     'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:28.0) Gecko/20100101 Firefox/28.0',
      //     'X-MicrosoftAjax: Delta=true'
      // ];
      
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      
      $server_output = curl_exec($ch);
      
      curl_close ($ch);
      
      return $server_output;
    }
  }