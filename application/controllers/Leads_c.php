<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leads_c extends MY_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model("Leads_m");
	}

   public function index(){

		$leads = $this->Leads_m->getTableData();

	   	$this->load_view('Leads_v.php', $leads, "Leads");
   }

   public function getLeadDetail(){

		$lead_id = isset($_POST['lead_id']) ? $_POST['lead_id'] : NULL;

		$res = $this->Leads_m->getLeadDetail($lead_id);

	   	echo json_encode(array('status' => 200, 'data' => $res));
   }

   public function refreshLeadTable(){
		$status = isset($_POST['status']) ? $_POST['status'] : 0;

		$createdBy = isset($_POST['createdBy']) ? $_POST['createdBy'] : 0;

		$leads = $this->Leads_m->getTableData($status, $createdBy);

		echo json_encode(array('status' => 200, 'data' => $leads));
   }
}