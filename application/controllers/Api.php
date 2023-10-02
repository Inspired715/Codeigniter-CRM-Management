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

        $res = $this->Token_m->checkToken($_SERVER["HTTP_X_API_KEY"]);

        if($res == 0){
            echo json_encode(array('status' => 401, 'message' => "Authentification error."));
            return;
        }

        $publisher_id = $res['publisher_id'];
        $offset = $res['offset'];
        $countryList = array(
            'AF' => 'Afghanistan',
            'AX' => 'Aland Islands',
            'AL' => 'Albania',
            'DZ' => 'Algeria',
            'AS' => 'American Samoa',
            'AD' => 'Andorra',
            'AO' => 'Angola',
            'AI' => 'Anguilla',
            'AQ' => 'Antarctica',
            'AG' => 'Antigua and Barbuda',
            'AR' => 'Argentina',
            'AM' => 'Armenia',
            'AW' => 'Aruba',
            'AU' => 'Australia',
            'AT' => 'Austria',
            'AZ' => 'Azerbaijan',
            'BS' => 'Bahamas the',
            'BH' => 'Bahrain',
            'BD' => 'Bangladesh',
            'BB' => 'Barbados',
            'BY' => 'Belarus',
            'BE' => 'Belgium',
            'BZ' => 'Belize',
            'BJ' => 'Benin',
            'BM' => 'Bermuda',
            'BT' => 'Bhutan',
            'BO' => 'Bolivia',
            'BA' => 'Bosnia and Herzegovina',
            'BW' => 'Botswana',
            'BV' => 'Bouvet Island (Bouvetoya)',
            'BR' => 'Brazil',
            'IO' => 'British Indian Ocean Territory (Chagos Archipelago)',
            'VG' => 'British Virgin Islands',
            'BN' => 'Brunei Darussalam',
            'BG' => 'Bulgaria',
            'BF' => 'Burkina Faso',
            'BI' => 'Burundi',
            'KH' => 'Cambodia',
            'CM' => 'Cameroon',
            'CA' => 'Canada',
            'CV' => 'Cape Verde',
            'KY' => 'Cayman Islands',
            'CF' => 'Central African Republic',
            'TD' => 'Chad',
            'CL' => 'Chile',
            'CN' => 'China',
            'CX' => 'Christmas Island',
            'CC' => 'Cocos (Keeling) Islands',
            'CO' => 'Colombia',
            'KM' => 'Comoros the',
            'CD' => 'Congo',
            'CG' => 'Congo the',
            'CK' => 'Cook Islands',
            'CR' => 'Costa Rica',
            'CI' => 'Cote d\'Ivoire',
            'HR' => 'Croatia',
            'CU' => 'Cuba',
            'CY' => 'Cyprus',
            'CZ' => 'Czech Republic',
            'DK' => 'Denmark',
            'DJ' => 'Djibouti',
            'DM' => 'Dominica',
            'DO' => 'Dominican Republic',
            'EC' => 'Ecuador',
            'EG' => 'Egypt',
            'SV' => 'El Salvador',
            'GQ' => 'Equatorial Guinea',
            'ER' => 'Eritrea',
            'EE' => 'Estonia',
            'ET' => 'Ethiopia',
            'FO' => 'Faroe Islands',
            'FK' => 'Falkland Islands (Malvinas)',
            'FJ' => 'Fiji the Fiji Islands',
            'FI' => 'Finland',
            'FR' => 'France, French Republic',
            'GF' => 'French Guiana',
            'PF' => 'French Polynesia',
            'TF' => 'French Southern Territories',
            'GA' => 'Gabon',
            'GM' => 'Gambia the',
            'GE' => 'Georgia',
            'DE' => 'Germany',
            'GH' => 'Ghana',
            'GI' => 'Gibraltar',
            'GR' => 'Greece',
            'GL' => 'Greenland',
            'GD' => 'Grenada',
            'GP' => 'Guadeloupe',
            'GU' => 'Guam',
            'GT' => 'Guatemala',
            'GG' => 'Guernsey',
            'GN' => 'Guinea',
            'GW' => 'Guinea-Bissau',
            'GY' => 'Guyana',
            'HT' => 'Haiti',
            'HM' => 'Heard Island and McDonald Islands',
            'VA' => 'Holy See (Vatican City State)',
            'HN' => 'Honduras',
            'HK' => 'Hong Kong',
            'HU' => 'Hungary',
            'IS' => 'Iceland',
            'IN' => 'India',
            'ID' => 'Indonesia',
            'IR' => 'Iran',
            'IQ' => 'Iraq',
            'IE' => 'Ireland',
            'IM' => 'Isle of Man',
            'IL' => 'Israel',
            'IT' => 'Italy',
            'JM' => 'Jamaica',
            'JP' => 'Japan',
            'JE' => 'Jersey',
            'JO' => 'Jordan',
            'KZ' => 'Kazakhstan',
            'KE' => 'Kenya',
            'KI' => 'Kiribati',
            'KP' => 'Korea',
            'KR' => 'Korea',
            'KW' => 'Kuwait',
            'KG' => 'Kyrgyz Republic',
            'LA' => 'Lao',
            'LV' => 'Latvia',
            'LB' => 'Lebanon',
            'LS' => 'Lesotho',
            'LR' => 'Liberia',
            'LY' => 'Libyan Arab Jamahiriya',
            'LI' => 'Liechtenstein',
            'LT' => 'Lithuania',
            'LU' => 'Luxembourg',
            'MO' => 'Macao',
            'MK' => 'Macedonia',
            'MG' => 'Madagascar',
            'MW' => 'Malawi',
            'MY' => 'Malaysia',
            'MV' => 'Maldives',
            'ML' => 'Mali',
            'MT' => 'Malta',
            'MH' => 'Marshall Islands',
            'MQ' => 'Martinique',
            'MR' => 'Mauritania',
            'MU' => 'Mauritius',
            'YT' => 'Mayotte',
            'MX' => 'Mexico',
            'FM' => 'Micronesia',
            'MD' => 'Moldova',
            'MC' => 'Monaco',
            'MN' => 'Mongolia',
            'ME' => 'Montenegro',
            'MS' => 'Montserrat',
            'MA' => 'Morocco',
            'MZ' => 'Mozambique',
            'MM' => 'Myanmar',
            'NA' => 'Namibia',
            'NR' => 'Nauru',
            'NP' => 'Nepal',
            'AN' => 'Netherlands Antilles',
            'NL' => 'Netherlands the',
            'NC' => 'New Caledonia',
            'NZ' => 'New Zealand',
            'NI' => 'Nicaragua',
            'NE' => 'Niger',
            'NG' => 'Nigeria',
            'NU' => 'Niue',
            'NF' => 'Norfolk Island',
            'MP' => 'Northern Mariana Islands',
            'NO' => 'Norway',
            'OM' => 'Oman',
            'PK' => 'Pakistan',
            'PW' => 'Palau',
            'PS' => 'Palestinian Territory',
            'PA' => 'Panama',
            'PG' => 'Papua New Guinea',
            'PY' => 'Paraguay',
            'PE' => 'Peru',
            'PH' => 'Philippines',
            'PN' => 'Pitcairn Islands',
            'PL' => 'Poland',
            'PT' => 'Portugal, Portuguese Republic',
            'PR' => 'Puerto Rico',
            'QA' => 'Qatar',
            'RE' => 'Reunion',
            'RO' => 'Romania',
            'RU' => 'Russian Federation',
            'RW' => 'Rwanda',
            'BL' => 'Saint Barthelemy',
            'SH' => 'Saint Helena',
            'KN' => 'Saint Kitts and Nevis',
            'LC' => 'Saint Lucia',
            'MF' => 'Saint Martin',
            'PM' => 'Saint Pierre and Miquelon',
            'VC' => 'Saint Vincent and the Grenadines',
            'WS' => 'Samoa',
            'SM' => 'San Marino',
            'ST' => 'Sao Tome and Principe',
            'SA' => 'Saudi Arabia',
            'SN' => 'Senegal',
            'RS' => 'Serbia',
            'SC' => 'Seychelles',
            'SL' => 'Sierra Leone',
            'SG' => 'Singapore',
            'SK' => 'Slovakia (Slovak Republic)',
            'SI' => 'Slovenia',
            'SB' => 'Solomon Islands',
            'SO' => 'Somalia, Somali Republic',
            'ZA' => 'South Africa',
            'GS' => 'South Georgia and the South Sandwich Islands',
            'ES' => 'Spain',
            'LK' => 'Sri Lanka',
            'SD' => 'Sudan',
            'SR' => 'Suriname',
            'SJ' => 'Svalbard & Jan Mayen Islands',
            'SZ' => 'Swaziland',
            'SE' => 'Sweden',
            'CH' => 'Switzerland, Swiss Confederation',
            'SY' => 'Syrian Arab Republic',
            'TW' => 'Taiwan',
            'TJ' => 'Tajikistan',
            'TZ' => 'Tanzania',
            'TH' => 'Thailand',
            'TL' => 'Timor-Leste',
            'TG' => 'Togo',
            'TK' => 'Tokelau',
            'TO' => 'Tonga',
            'TT' => 'Trinidad and Tobago',
            'TN' => 'Tunisia',
            'TR' => 'Turkey',
            'TM' => 'Turkmenistan',
            'TC' => 'Turks and Caicos Islands',
            'TV' => 'Tuvalu',
            'UG' => 'Uganda',
            'UA' => 'Ukraine',
            'AE' => 'United Arab Emirates',
            'GB' => 'United Kingdom',
            'US' => 'United States of America',
            'UM' => 'United States Minor Outlying Islands',
            'VI' => 'United States Virgin Islands',
            'UY' => 'Uruguay, Eastern Republic of',
            'UZ' => 'Uzbekistan',
            'VU' => 'Vanuatu',
            'VE' => 'Venezuela',
            'VN' => 'Vietnam',
            'WF' => 'Wallis and Futuna',
            'EH' => 'Western Sahara',
            'YE' => 'Yemen',
            'ZM' => 'Zambia',
            'ZW' => 'Zimbabwe'
        );
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
            if( !$countryList[$code] ){
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
            
            $sub_leads = [];
            foreach(array_keys($_POST) as $key){
                if(!in_array($key, $keys)){
                    $sub_leads[] = array('sub_name' => $key, 'sub_value' => $_POST[$key], 'lead_id' => $lead_id);
                }
            }

            if(count($sub_leads) > 0)
                $this->Leads_m->insertSubLeads($sub_leads);

            echo json_encode(array('status' => 200, 'message' => "Successfully imported.", 'lead_id' => $lead_id));
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

        $res = $this->Token_m->checkToken($_SERVER["HTTP_X_API_KEY"]);

        if($res == 0){
            echo json_encode(array('status' => 401, 'message' => "Authentification error."));
            return;
        }

        $publisher_id = $res['publisher_id'];
        $offset = $res['offset'];

        if($method === 'POST'){
            $from = isset($_POST["from"])?$_POST["from"]:'';
            $to = isset($_POST["to"])?$_POST["to"]:'';

            $result = $this->Leads_m->getLeadWithSub($publisher_id, $from, $to);
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

    // public function update(){
    //     $method = $_SERVER['REQUEST_METHOD'];

    //     if(!isset($_SERVER["HTTP_X_API_KEY"])){
    //         echo json_encode(array('status' => 400, 'message' => "x-api-key field is not existed on header."));
    //         return;
    //     }

    //     $res = $this->Token_m->checkToken($_SERVER["HTTP_X_API_KEY"]);

    //     if($res == 0){
    //         echo json_encode(array('status' => 401, 'message' => "Authentification error."));
    //         return;
    //     }

    //     $publisher_id = $res['publisher_id'];
    //     $offset = $res['offset'];

	// 	if ($method === 'POST') {
    //         if(!isset($_POST["seamotech_id"])){
    //             echo json_encode(array('status' => 400, 'message' => "seamotech_id field is not existed on body and this is required field."));
    //             return;
    //         }
    //         if($_POST["seamotech_id"] == ''){
    //             echo json_encode(array('status' => 400, 'message' => "seamotech_id is required field."));
    //             return;
    //         }
    //         if(!isset($_POST["status"])){
    //             echo json_encode(array('status' => 400, 'message' => "status field is not existed on body and this is required field."));
    //             return;
    //         }
    //         if($_POST["status"] == ''){
    //             echo json_encode(array('status' => 400, 'message' => "status is required field."));
    //             return;
    //         }
    //         if(!isset($_POST["ftd_date"])){
    //             echo json_encode(array('status' => 400, 'message' => "ftd_date field is not existed on body and this is required field."));
    //             return;
    //         }

    //         $sub['lead_id'] = $_POST["seamotech_id"];
    //         $sub['status'] = $_POST["status"];
    //         $sub['ftd_date'] = $_POST["ftd_date"];

    //         $res = $this->Notification_m->insertNotification($sub);
	// 		if(!$res){
    //             echo json_encode(array('status' => 500, 'message' => "Server Error."));
    //             return;
    //         }

    //         echo json_encode(array('status' => 200, 'message' => "Successfully updated."));
    //     }else{
    //         echo json_encode(array('status' => 405, 'message' => "GET method is available"));
    //     }
    // }
}