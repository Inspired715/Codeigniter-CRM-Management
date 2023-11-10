<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model("Token_m");
        $this->load->model("Leads_m");
	}
    public function api_lead(){
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
            if($_POST["country"] == '' || strlen($_POST["country"]) != 2){
                echo json_encode(array('status' => 400, 'message' => "country(Alpha-2 code) is required field. For example: US, MX, AR..."));
                return;
            }
            
            $code = strtoupper($_POST["country"]);
            if( !$GLOBALS['countryList'][$code] ){
                echo json_encode(array('status' => 400, 'message' => "Please check the country(Alpha-2 code) code. For example: US, MX, AR..."));
                return;
            }

            if(!isset($_POST["email"])){
                echo json_encode(array('status' => 400, 'message' => "email field is not existed on body. This is the required field even if the value is empty."));
                return;
            }
            if($_POST["email"] == ''){
                echo json_encode(array('status' => 400, 'message' => "email is required field."));
                return;
            }

            $res = $this->Leads_m->checkLead($_POST["phone_number"]);
			if(!$res){
                echo json_encode(array('status' => 405, 'message' => "Duplicated lead."));
                return;
            }

            $leads['first_name']        = $_POST["first_name"];
            $leads['last_name']         = $_POST["last_name"];
            $leads['status']            = LEAD_STATUS_NEW;
            $leads['title']             = $_POST["title"];
            $leads['web_site']          = $_POST["web_site"];
            $leads['phone_number']      = $_POST["phone_number"];
            $leads['created_by']        = $publisher_id;
            $leads['modifyed_by']       = NULL;
            $leads['address']           = $_POST["address"];
            $leads['city']              = $_POST["city"];
            $leads['state']             = $_POST["state"];
            $leads['country']           = $code;
            $leads['email']             = $_POST["email"];
            $leads['ftd_date']          = NULL;
        
            $lead_id = $this->Leads_m->insertLeads($leads);

            $keys = ['first_name', 'last_name', 'title', 'web_site','phone_number', 'status', 'created_by', 'modifyed_by', 'address', 'city', 'state', 'country', 'email'];
            $perfix = '';
            $sub_leads = [];
            foreach(array_keys($_POST) as $key){
                if(!in_array($key, $keys)){
                    if($key == "Perfix")
                        $perfix = $_POST[$key];
                    $sub_leads[] = array('sub_name' => $key, 'sub_value' => $_POST[$key], 'lead_id' => $lead_id);
                }
            }

            if(count($sub_leads) > 0)
                $this->Leads_m->insertSubLeads($sub_leads);
            //Send to Rodrigo
            $url = "http://pruebas.mercurysystem.com.co/ext_api/guardar_lead_api_magic.php";
            $data = "token=".urlencode('*#=+UIOYUqwe_23q')."&Name_lead=".$leads['first_name'].' '.$leads['last_name']."&email=".$leads['email']."&phone=".$perfix.$leads['phone_number']."&seamotech_id=".$lead_id;
            $result = $this->api_exec_curl($url, [], $data);
            $msg = json_decode($result)[0]->mensaje;
            
            switch($msg){
                case "success":
                    $this->db->set('modifyed_by', 1);
                    $this->db->where('id', $lead_id);
                    $this->db->update('leads');
                    echo json_encode(array('status' => 200, 'message' => "Successfully imported.", 'lead_id' => $lead_id));
                    break;
                case "duplicate":
                    $this->db->set('modifyed_by', 1);
                    $this->db->set('status', LEAD_STATUS_DUPLICATE);
                    $this->db->where('id', $lead_id);
                    $this->db->update('leads');
                    echo json_encode(array('status' => 405, 'message' => "Duplicated lead."));
                    break;
                case "Incomplete":
                    $this->db->set('modifyed_by', 1);
                    $this->db->set('status', LEAD_STATUS_INCOMPLETE);
                    $this->db->where('id', $lead_id);
                    $this->db->update('leads');
                    echo json_encode(array('status' => 405, 'message' => "Incomplete lead."));
                    break;
                default:
                    $this->db->set('modifyed_by', 1);
                    $this->db->set('status', LEAD_STATUS_INCOMPLETE);
                    $this->db->where('id', $lead_id);
                    $this->db->update('leads');
                    echo json_encode(array('status' => 405, 'message' => "Incomplete lead."));
            }
	   	}else {
            echo json_encode(array('status' => 405, 'message' => "GET method is available"));
		}
   }

   public function GetLeads(){

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

        if($method === 'POST'){
            $offset = 0;
            $from = isset($_POST["from"])?$_POST["from"]:'';
            $to = isset($_POST["to"])?$_POST["to"]:'';
            
            if(isset($_POST['offset'])){
                if(is_numeric($_POST['offset'])){
                    $offset = (int)$_POST['offset'];
                }
            }

            $result = $this->Leads_m->getLeadWithSub($publisher_id, $from, $to);
            $temp = [];
            foreach($result as $item){
                $temp[$item->id][] = $item;
            }

            $finalLeads = [];
            foreach(array_slice($temp, $offset, LIMIT) as $leads){
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
                    case LEAD_STATUS_UNQUALIFIED:
                            $sub['status'] = "UNQUALIFIED";
                            break;
                    case LEAD_STATUS_NEW:
                        $sub['status'] = "NEW";
                        break;
                    case LEAD_STATUS_MONEY:
                            $sub['status'] = "CALL_LATER";
                            break;
                    case LEAD_STATUS_INCOMPLETE:
                            $sub['status'] = "INCOMPLETE";
                            break;
                    case LEAD_STATUS_DUPLICATE:
                            $sub['status'] = "DUPLICATE";
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

    public function api_exec_curl($url, $headers, $data){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);  //Post Fields
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
        $server_output = curl_exec($ch);
        
        curl_close ($ch);
        
        return $server_output;
      }
    
      public function api_from_publisher(){
        $token = isset($_POST['token'])?$_POST['token']:'';
        $first = isset($_POST['first'])?$_POST['first']:'';
        $last = isset($_POST['last'])?$_POST['last']:'';
        $email = isset($_POST['email'])?$_POST['email']:'';
        $phoneNumber = isset($_POST['phone'])?$_POST['phone']:'';
        $perfix = isset($_POST['perfix'])?$_POST['perfix']:'';
        $country = isset($_POST['country'])?$_POST['country']:'';

        $publisher_id = $this->Token_m->checkToken($token);

        if($publisher_id == 0){
            echo json_encode(array('message' => "Authentification error."));
            return;
        }
        if($phoneNumber == ''){
            echo json_encode(array('message' => "Phonenumber is missed"));
            return;
        }
        if($first == ''){
            echo json_encode(array('message' => "First name is missed"));
            return;
        }
        if($last == ''){
            echo json_encode(array('message' => "Last name is missed"));
            return;
        }
        if($email == ''){
            echo json_encode(array('message' => "Email is missed"));
            return;
        }
        $code = strtoupper($country);
        if( !$GLOBALS['countryList'][$code] ){
            echo json_encode(array('message' => "Country code is missed"));
            return;
        }
        
        $leads['first_name']        = $first;
        $leads['last_name']         = $last;
        $leads['status']            = LEAD_STATUS_NEW;
        $leads['title']             = '';
        $leads['web_site']          = '';
        $leads['phone_number']      = $phoneNumber;
        $leads['created_by']        = $publisher_id;
        $leads['modifyed_by']       = NULL;
        $leads['address']           = '';
        $leads['city']              = '';
        $leads['state']             = '';
        $leads['country']           = $code;
        $leads['email']             = $email;
        $leads['ftd_date']          = NULL;
    
        $lead_id = $this->Leads_m->insertLeads($leads);
        echo json_encode(array('message' => "success"));
      }
}