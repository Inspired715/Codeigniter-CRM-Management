<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing_c extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

   	public function index(){
        $this->load->view('Landing_v');
	}

	public function publishers($uuid){
		$this->load->view('Publishers_v', array('title' => 'Landing'));	
	}
}