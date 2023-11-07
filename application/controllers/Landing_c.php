<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing_c extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

   	public function index(){
        $this->load->view('Landing_v');
	}

	public function publishers($uuid){
		$this->load->view('Publishers_v', array('title' => 'Landing'));	
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

		if ($response->success == true) { 
			echo json_encode(array('status' => 'success'));
		} else { 
			echo json_encode(array('status' => 'error'));
		} 
	}
}