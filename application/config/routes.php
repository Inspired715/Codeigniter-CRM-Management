<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Landing_c';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['authCheck'] = 'Login_c/checkAuth';
$route['leads'] = 'Leads_c';
$route['login'] = 'Login_c';
$route['super_login'] = 'Landing_c/setPermission';
$route['logout'] = 'Login_c/logout';
$route['token'] = 'Token_c';
$route['createToken'] = 'Token_c/createToken';
$route['getLeadDetail'] = 'Leads_c/getLeadDetail';
$route['updateLeadDetail'] = 'Leads_c/updateLeadDetail';
$route['integration'] = 'Integration_c';
$route['refreshLeadTable'] = 'Leads_c/refreshLeadTable';
$route['refreshIntegrationTable'] = 'Integration_c/refreshIntegrationTable';
$route['exportToCampaign'] = 'Integration_c/exportToCampaign';
$route['updateFrom'] = 'Integration_c/updateFrom';
$route['exportAllToCampaign'] = 'Integration_c/exportAllToCampaign';
$route['coldleades'] = 'Coldleads_c';
$route['exportCSV'] = 'Coldleads_c/exportCSV';
$route['sendMail'] = 'Landing_c/sendMail';
$route['sendLead'] = 'Landing_c/sendLead';
$route['api/publisher'] = 'Api/api_from_publisher';
$route['leads/edit/(:num)'] = 'Leads_c/editLeads/$1';

$route['api/lead'] = 'Api/api_lead';
$route['api/lead/get_leads'] = 'Api/GetLeads';

$route['publishers'] = 'Landing_c/publishers';