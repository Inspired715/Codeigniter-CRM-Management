<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Common_m extends CI_Model {
		
	// Login User
    public function getPublisher()
    {
        $sql = "SELECT * FROM publisher";

        $query = $this->db->query($sql);

        return $query->result();
    }
}