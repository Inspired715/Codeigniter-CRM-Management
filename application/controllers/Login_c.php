<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_c extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Login_m");
	}

   public function index(){
	   $this->load->view('Login_v');
   }

   public function checkAuth() {
	   $uname = isset($_POST['username']) ? $_POST['username'] : NULL;
	   $password = isset($_POST['password']) ? $_POST['password'] : NULL;

	   $res = $this->Login_m->checkAuth($uname, $password);
			
	   echo $res;
   }

   public function logout(){
		$_SESSION['uname'] = NULL;
		echo 'OK';
   }
}