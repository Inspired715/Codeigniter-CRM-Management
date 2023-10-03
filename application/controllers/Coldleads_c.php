<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coldleads_c extends MY_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model("Coldleads_m");
	}

   public function index(){
		$leadsCount = $this->Coldleads_m->getTableData();
		$result = [];

		foreach ($leadsCount as $item) {
			$result[] = array(
				'country' => $GLOBALS['countryList'][$item->country],
				'count' => $item->cnt,
				'code' => $item->country,
			);
		}

	   	$this->load_view('Coldleads_v.php', $result, "Cold leads");
   }

   public function exportCSV(){
	$code = isset($_POST['code'])?$_POST['code']:'';

	$leads= $this->Coldleads_m->getLeadsByCode($code);

	if(count($leads) > 0){ 
		$delimiter = ","; 

		$f = fopen('php://memory', 'w');

		$fields = array('Name', 'Phone', 'Status', 'Email', 'State', 'Country', 'Created date'); 
		
		fputcsv($f, $fields, $delimiter);
		 
		foreach($leads as $lead){ 
			$status = '';
			switch($lead->status){
				case LEAD_STATUS_NOT_INTERESTED:
					$status = "Not interested";
					break;
				case LEAD_STATUS_FOLLOW_UP:
					$status = "Follow up";
					break;
				case LEAD_STATUS_WRONG_NUMBER:
					$status = "Wrong number";
					break;
				case LEAD_STATUS_UNQUALIFIED:
					$status = "Unqualified";
					break;
				case LEAD_STATUS_NEW:
					$status = "New";
					break;
				case LEAD_STATUS_MONEY:
					$status = "Money";
					break;
				default:
					$status = "New";
			}

			$lineData = array($lead->first_name.' '.$lead->last_name, $lead->phone_number, $status, $lead->email, $lead->state, $GLOBALS['countryList'][$lead->country], $lead->created_date); 

			fputcsv($f, $lineData, $delimiter); 
		} 
		 
		fseek($f, 0);

		fpassthru($f); 
	} 
	exit;
   }
}