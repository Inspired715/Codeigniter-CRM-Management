<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leads_c extends MY_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model("Integration_m");
	}

   public function index(){

	   	$this->load_view('Integration_v.php', null, "Integration");
   }

}