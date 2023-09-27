<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Token_c extends MY_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model("Token_m");
	}

   	public function index(){

		$tokens = $this->Token_m->getTableData();

	   	$this->load_view('Token_v.php', $tokens, "Token");
   	}   	

	public function createToken(){
		$fullName = isset($_POST['full_name']) ? $_POST['full_name'] : NULL;
		$pNumber = isset($_POST['phone_number']) ? $_POST['phone_number'] : NULL;
		$email = isset($_POST['email']) ? $_POST['email'] : NULL;
		$pNumber = str_replace(array("+", " "), "", $pNumber);
		if(empty($fullName) || empty($pNumber) || empty($email) || $fullName == NULL || $pNumber == NULL || $email == NULL){
			echo json_encode(array('status' => 400, 'message' => "Please input all fields."));
			return;
		}else{
			$enable = $this->Token_m->checkToken($pNumber);
			if($enable == 0){
				$plain = $email.PRIMARY_KEY.$fullName.$pNumber;
				$key = hash('sha256', $plain);
				$this->Token_m->insertToken($fullName, $email, $pNumber, $key);
				echo json_encode(array('status' => 200, 'message' => "Generated successfully."));
			}else{
				echo json_encode(array('status' => 405, 'message' => "Duplicated phone number."));
			}
		}
	}
}