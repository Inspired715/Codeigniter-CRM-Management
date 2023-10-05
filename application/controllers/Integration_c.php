<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Integration_c extends MY_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model("Integration_m");
		$this->load->model("Common_m");
	}

   public function index(){
		$campaign = $this->Common_m->getCampaign();
	   	$this->load_view('Integration_v.php', $campaign, "Integration");
   }

   public function refreshIntegrationTable(){
		$leads = $this->Integration_m->getTableData();

		echo json_encode(array('status' => 200, 'data' => $leads));
   }

   public function exportToCampaign(){
		$lead_id = isset($_POST['lead_id'])?$_POST['lead_id']:'';
		$campaign = isset($_POST['campaign'])?$_POST['campaign']:'';
		if($campaign == -1 || $lead_id == '' || $campaign == ''){
			echo json_encode(array('status' => 400, 'message' => "Please select campaigns correctly."));
			return;
		}
	
		$lead = $this->Integration_m->getLeadById($lead_id);

		if(count($lead) == 0){
			echo json_encode(array('status' => 400, 'message' => "Error."));
			return;
		}

		$url = ""; $header = []; $data = "";
		switch($campaign){
			case 1:
				$url = "http://pruebas.mercurysystem.com.co/ext_api/guardar_lead_api_magic.php";
				$headers = ['Content-Type: application/x-www-form-urlencoded'];
				$data = "token=".urlencode('*#=+UIOYUqwe_23q')."&Name_lead=".$lead[0]->first_name.' '.$lead[0]->last_name."&email=".$lead[0]->email."&phone=".$lead[0]->prefix.$lead[0]->phone_number."&seamotech_id=".$lead[0]->id;
				break;
			default:
				
		}

		$result = $this->exec_curl($url, $header, $data);
		$msg = json_decode($result)[0]->mensaje;

		if($msg == "success"){
			$this->db->set('modifyed_by', $campaign);
			$this->db->where('id', $lead_id);
			$this->db->update('leads');
			echo json_encode(array('status' => 200, 'message' => "Success"));
		}else{
			echo json_encode(array('status' => 500, 'message' => $msg));
		}
   }

   public function exportAllToCampaign(){
		$campaign = isset($_POST['campaign'])?$_POST['campaign']:'';

		if($campaign == -1 || $campaign == ''){
			echo json_encode(array('status' => 400, 'message' => "Please select campaigns correctly."));
			return;
		}
		
		$url = ""; $header = []; $data = "";
		switch($campaign){
			case 1:
				$url = "http://pruebas.mercurysystem.com.co/ext_api/guardar_lead_api_magic.php";
				$headers = ['Content-Type: application/x-www-form-urlencoded'];				
				break;
			default:
				
		}

		$exportedCount = 0;
		$totalCount = 0;
		$offset = 0;

		while(1){
			$leads = $this->Integration_m->getNotExportedLeads($offset);
			
			if(count($leads) == 0)
				break;

			foreach ($leads as $lead) {
				$data = "token=".urlencode('*#=+UIOYUqwe_23q')."&Name_lead=".$lead->first_name.' '.$lead->last_name."&email=".$lead->email."&phone=".$lead->prefix.$lead->phone_number."&seamotech_id=".$lead->id;				
				$result = $this->exec_curl($url, $header, $data);
				$msg = json_decode($result)[0]->mensaje;

				if($msg == "success"){
					$this->db->set('modifyed_by', $campaign);
					$this->db->where('id', $lead->id);
					$this->db->update('leads');
					$exportedCount++;
				}

				$totalCount++;
			}

			$offset = count($leads);
		}

		echo json_encode(array('status' => 200, 'message' => "Available total:".$totalCount.", Sent successfully:".$exportedCount));
   }


   public function updateFrom(){
		$campaign = isset($_POST['campaign'])?$_POST['campaign']:'';

		if($campaign == ''){
			echo json_encode(array('status' => 400, 'message' => "Please select campaigns correctly."));
			return;
		}
		$url = ""; $header = []; $data = "";
		switch($campaign){
			case 1:
				$url = "http://pruebas.mercurysystem.com.co/ext_api/leads_magic_status_full.php";
				$headers = ['Content-Type: application/x-www-form-urlencoded'];
				$data = "token=".urlencode('*#=+UIOYUqwe_23q');
				break;
			default:
				
		}
		
		$result = $this->exec_curl($url, $header, $data);
		$result = json_decode($result);

		forEach($result as $item){
			if($item->seamotech_id != ""){
				$this->db->set('status', $item->status);
				if($item->status == LEAD_STATUS_FTD)
					$this->db->set('ftd_date', isset($item->ftd_date)?$item->ftd_date:'');
				$this->db->where('id', $item->seamotech_id);
				$this->db->update('leads');	
			}
		}

		echo json_encode(array('status' => 200, 'message' => "Success"));
   }
}