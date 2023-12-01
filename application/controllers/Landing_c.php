<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing_c extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('curlclass');
	}

   	public function index(){
        $this->load->view('Landing_v');
	}

	public function publishers(){
		$token = isset($_GET['token'])?$_GET['token']:'';

		$this->load->view('Publishers_v', array('title' => 'Landing', 'token' => $token));	
	}

	public function sendMail(){
		$name = isset($_POST['name'])?$_POST['name']:'';
		$email = isset($_POST['email'])?$_POST['email']:'';
		$message = isset($_POST['message'])?$_POST['message']:'';

		$to = "dev@seamotech.com";
	
		$template = "This message from ".$email."(".$name.")";
		$template .= "
		Message:".$message;

		$this->email->subject('Request from seamotech');

		$this->email->message($template);  
		$this->email->from($email);
		$this->email->to($to);
		try {
			$this->email->send();
			echo json_encode(array('status' => 'success'));
		} catch (\Throwable $th) {
			echo json_encode(array('status' => 'error')); 
		}
	}

	public function sendLead(){
		$recaptcha = isset($_POST['g-recaptcha-response'])?$_POST['g-recaptcha-response']:'';
		$url = 'https://www.google.com/recaptcha/api/siteverify?secret='. SECURITY_KEY . '&response=' . $recaptcha;

		$response = file_get_contents($url);
		$response = json_decode($response);

		if ($response) { 
			$token = isset($_POST['token'])?$_POST['token']:'';
			$first = isset($_POST['first'])?$_POST['first']:'';
			$last = isset($_POST['last'])?$_POST['last']:'';
			$email = isset($_POST['email'])?$_POST['email']:'';
			$phoneNumber = isset($_POST['phoneNumber'])?$_POST['phoneNumber']:'';
			$carrierCode = isset($_POST['carrierCode'])?$_POST['carrierCode']:'';
			$defaultCountry = isset($_POST['defaultCountry'])?$_POST['defaultCountry']:'';

			if($token == '' || $first == '' || $last == '' || $email == '' || $phoneNumber == '' || $carrierCode == ''){
				echo json_encode(array('status' => '301', 'message' => "Invalid parameters"));
				return;
			}

			$url = "https://seamotech.com/api/publisher";
            $data = "token=".$token."&first=".$first."&last=".$last."&phone=".$phoneNumber."&perfix=".$carrierCode."&email=".$email."&country=".$defaultCountry;
            $result = $this->curlclass->exec_curl($url, [], $data);

			echo json_encode(array('status' => '200', 'data'=> $result));
		} else { 
			echo json_encode(array('status' => '204', 'message' => "Captcha error"));
		} 
	}
}