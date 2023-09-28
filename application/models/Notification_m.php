<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Notification_m extends CI_Model {
		
    public function insertNotification($data){
        $this->db->insert('notification', $data);
        
        return $this->db->insert_id();
    }
}