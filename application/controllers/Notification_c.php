<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification_c extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Notification_m");
	}

   public function index(){
	
		$res = $this->Notification_m->getNotification();

	   	$this->load_view('Notification_v.php', $res, "Notification");
	}

}