<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Notification_m extends CI_Model {
		
    public function insertNotification($data){
        $this->db->insert('notification', $data);
        
        return $this->db->insert_id();
    }

    public function getNotification(){
        $sql = "SELECT l.first_name, l.last_name, n.status, n.updated, n.ftd_date from notification n left join leads l on n.lead_id=l.id";
        
        $query = $this->db->query($sql);

        return $query->result();
    }
}