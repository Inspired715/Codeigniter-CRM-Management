<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leads_c extends MY_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model("Leads_m");
	}

   public function index(){
	   	$this->load_view('Leads_v.php', null, "Leads");
   }

   public function getLeadDetail(){

		$lead_id = isset($_POST['lead_id']) ? $_POST['lead_id'] : NULL;

		$res = $this->Leads_m->getLeadDetail($lead_id);

	   	echo json_encode(array('status' => 200, 'data' => $res));
   }

   public function refreshLeadTable(){
		$status = isset($_POST['status']) ? $_POST['status'] : 0;

		$createdBy = isset($_POST['createdBy']) ? $_POST['createdBy'] : 0;

		$from = isset($_POST['from_date']) ? $_POST['from_date'] : '';
		$to = isset($_POST['to_date']) ? $_POST['to_date'] : '';

		$leads = $this->Leads_m->getTableData($from, $to, $status, $createdBy);

		echo json_encode(array('status' => 200, 'data' => $leads));
   }
}