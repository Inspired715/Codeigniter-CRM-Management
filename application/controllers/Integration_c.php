<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Integration_c extends MY_Controller {

	public function __construct(){
		parent::__construct();
	}

   public function index(){
	   	$this->load_view('Integration_v.php', null, "Integration");
	}

}