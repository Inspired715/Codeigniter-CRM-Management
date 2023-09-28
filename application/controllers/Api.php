<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model("Token_m");
        $this->load->model("Leads_m");
	}
    public function api_lead($dates=''){
		$method = $_SERVER['REQUEST_METHOD'];

        if(!isset($_SERVER["HTTP_X_API_KEY"])){
            echo json_encode(array('status' => 400, 'message' => "x-api-key field is not existed on header."));
            return;
        }

        $publisher_id = $this->Token_m->checkToken($_SERVER["HTTP_X_API_KEY"]);
        if($publisher_id == 0){
            echo json_encode(array('status' => 401, 'message' => "Authentification error."));
            return;
        }

		if ($method === 'POST') {
            if(!isset($_POST["phone_number"])){
                echo json_encode(array('status' => 400, 'message' => "phone_number field is not existed on body and this is required field."));
                return;
            }
            if($_POST["phone_number"] == ''){
                echo json_encode(array('status' => 400, 'message' => "phone_number is required field."));
                return;
            }
            if(!isset($_POST["first_name"])){
                echo json_encode(array('status' => 400, 'message' => "first_name field is not existed on body and this is required field."));
                return;
            }
            if($_POST["first_name"] == ''){
                echo json_encode(array('status' => 400, 'message' => "first_name is required field"));
                return;
            }
            if(!isset($_POST["last_name"])){
                echo json_encode(array('status' => 400, 'message' => "last_name field is not existed on body and this is required field."));
                return;
            }
            if($_POST["last_name"] == ''){
                echo json_encode(array('status' => 400, 'message' => "last_name is required field"));
                return;
            }
            if(!isset($_POST["title"])){
                echo json_encode(array('status' => 400, 'message' => "title field is not existed on body. This is the required field even if the value is empty."));
                return;
            }
            if(!isset($_POST["web_site"])){
                echo json_encode(array('status' => 400, 'message' => "web_site field is not existed on body. This is the required field even if the value is empty."));
                return;
            }
            if(!isset($_POST["address"])){
                echo json_encode(array('status' => 400, 'message' => "address field is not existed on body. This is the required field even if the value is empty."));
                return;
            }
            if(!isset($_POST["city"])){
                echo json_encode(array('status' => 400, 'message' => "city field is not existed on body. This is the required field even if the value is empty."));
                return;
            }
            if(!isset($_POST["state"])){
                echo json_encode(array('status' => 400, 'message' => "state field is not existed on body. This is the required field even if the value is empty."));
                return;
            }
            if(!isset($_POST["country"])){
                echo json_encode(array('status' => 400, 'message' => "country field is not existed on body. This is the required field even if the value is empty."));
                return;
            }
            if(!isset($_POST["email"])){
                echo json_encode(array('status' => 400, 'message' => "email field is not existed on body. This is the required field even if the value is empty."));
                return;
            }

            $res = $this->Leads_m->checkLead($_POST["phone_number"]);
			if(!$res){
                echo json_encode(array('status' => 405, 'message' => "Duplicated lead."));
                return;
            }

            $leads['first_name']        = $_POST["first_name"];
            $leads['last_name']         = $_POST["last_name"];
            $leads['status']            = LEAD_STATUS_NOT_INTERESTED;
            $leads['title']             = $_POST["title"];
            $leads['web_site']          = $_POST["web_site"];
            $leads['phone_number']      = $_POST["phone_number"];
            $leads['created_by']        = $publisher_id;
            $leads['modifyed_by']       = NULL;
            $leads['address']           = $_POST["address"];
            $leads['city']              = $_POST["city"];
            $leads['state']             = $_POST["state"];
            $leads['country']           = $_POST["country"];
            $leads['email']             = $_POST["email"];
            $leads['ftd_date']          = NULL;
            $lead_id = $this->Leads_m->insertLeads($leads);

            $keys = ['first_name', 'last_name', 'title', 'web_site','phone_number', 'status', 'created_by', 'modifyed_by', 'address', 'city', 'state', 'country', 'email'];
            
            $sub_leads = [];
            foreach(array_keys($_POST) as $key){
                if(!in_array($key, $keys)){
                    $sub_leads[] = array('sub_name' => $key, 'sub_value' => $_POST[$key], 'lead_id' => $lead_id);
                }
            }

            if(count($sub_leads) > 0)
                $this->Leads_m->insertSubLeads($sub_leads);

            echo json_encode(array('status' => 200, 'message' => "Successfully imported.", 'lead_id' => $lead_id));
	   	}else if($method === 'GET'){
            $result = $this->Leads_m->getLeadWithSub();
            $temp = [];
            foreach($result as $item){
                $temp[$item->id][] = $item;
            }

            $finalLeads = [];
            foreach($temp as $leads){
                $sub['id'] = $leads[0]->id;
                $sub['first_name'] = $leads[0]->first_name;
                $sub['last_name'] = $leads[0]->last_name;
                $sub['status_id'] = $leads[0]->status;
                $sub['ftd_date'] = $leads[0]->ftd_date;
                switch($leads[0]->status){
                    case LEAD_STATUS_NOT_INTERESTED:
                        $sub['status'] = "NOT INTERESTED";
                        break;
                    case LEAD_STATUS_FOLLOW_UP:
                        $sub['status'] = "FOLLOW UP";
                        break;
                    case LEAD_STATUS_FTD:
                        $sub['status'] = "FTD";
                        break;
                    case LEAD_STATUS_WRONG_NUMBER:
                        $sub['status'] = "WRONG NUMBER";
                        break;
                    default:
                        $sub['status'] = "NOT INTERESTED";
                }
                
                $sub['title'] = $leads[0]->title;
                $sub['web_site'] = $leads[0]->web_site;
                $sub['phone_number'] = $leads[0]->phone_number;
                $sub['created_by'] = $leads[0]->created_by;
                $sub['modifyed_by'] = $leads[0]->modifyed_by;
                $sub['address'] = $leads[0]->address;
                $sub['city'] = $leads[0]->city;
                $sub['state'] = $leads[0]->state;
                $sub['country'] = $leads[0]->country;
                $sub['email'] = $leads[0]->email;
                $sub['created_date'] = $leads[0]->created_date;

                foreach($leads as $lead){
                    $sub[$lead->sub_name] = $lead->sub_value;
                }

                $finalLeads[] = $sub;
            }

            echo json_encode(array('status' => 200, 'data' => $finalLeads));
		}
   }

   public function filter_by_date($dates){
        $method = $_SERVER['REQUEST_METHOD'];

        if(!isset($_SERVER["HTTP_X_API_KEY"])){
            echo json_encode(array('status' => 400, 'message' => "x-api-key field is not existed on header."));
            return;
        }

        $publisher_id = $this->Token_m->checkToken($_SERVER["HTTP_X_API_KEY"]);
        if($publisher_id == 0){
            echo json_encode(array('status' => 401, 'message' => "Authentification error."));
            return;
        }

        if($method === 'GET'){
            $filter = preg_split("/-/", $dates);
            if(count($filter) != 2){
                echo json_encode(array('status' => 400, 'message' => 'Please follow this from-to style as the parameters(y.m.d). ex:2023.08.31-2023.09.28'));
                return;
            }

            $from = $filter[0]; $to = $filter[1];

            $result = $this->Leads_m->getLeadWithSub($from, $to);
            $temp = [];
            foreach($result as $item){
                $temp[$item->id][] = $item;
            }

            $finalLeads = [];
            foreach($temp as $leads){
                $sub['id'] = $leads[0]->id;
                $sub['first_name'] = $leads[0]->first_name;
                $sub['last_name'] = $leads[0]->last_name;
                $sub['status'] = $leads[0]->status;
                $sub['title'] = $leads[0]->title;
                $sub['web_site'] = $leads[0]->web_site;
                $sub['phone_number'] = $leads[0]->phone_number;
                $sub['created_by'] = $leads[0]->created_by;
                $sub['modifyed_by'] = $leads[0]->modifyed_by;
                $sub['address'] = $leads[0]->address;
                $sub['city'] = $leads[0]->city;
                $sub['state'] = $leads[0]->state;
                $sub['country'] = $leads[0]->country;
                $sub['email'] = $leads[0]->email;
                $sub['created_date'] = $leads[0]->created_date;
                $sub['ftd_date'] = $leads[0]->ftd_date;
                switch($leads[0]->status){
                    case LEAD_STATUS_NOT_INTERESTED:
                        $sub['status'] = "NOT INTERESTED";
                        break;
                    case LEAD_STATUS_FOLLOW_UP:
                        $sub['status'] = "FOLLOW UP";
                        break;
                    case LEAD_STATUS_FTD:
                        $sub['status'] = "FTD";
                        break;
                    case LEAD_STATUS_WRONG_NUMBER:
                        $sub['status'] = "WRONG NUMBER";
                        break;
                    default:
                        $sub['status'] = "NOT INTERESTED";
                }
                foreach($leads as $lead){
                    $sub[$lead->sub_name] = $lead->sub_value;
                }

                $finalLeads[] = $sub;
            }

            echo json_encode(array('status' => 200, 'data' => $finalLeads));
        }else{
            echo json_encode(array('status' => 405, 'message' => "GET method is available"));
        }
    }
}