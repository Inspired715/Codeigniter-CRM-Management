<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Integration_c extends MY_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model("Integration_m");
	}

   public function index(){

	   	$this->load_view('Integration_v.php', null, "Integration");
   }

   public function refreshIntegrationTable(){
		$leads = $this->Integration_m->getTableData();

		echo json_encode(array('status' => 200, 'data' => $leads));
   }

}