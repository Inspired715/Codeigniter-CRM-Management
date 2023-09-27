<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Token_m extends CI_Model {
		
    public function getTableData(){
        $sql = "SELECT * FROM publisher";

        $query = $this->db->query($sql);

        $tokens = $query->result();

        return $tokens;
    }

    public function insertToken($fullName, $email, $pNumber, $key){
        $data['full_name'] = $fullName;
		$data['email'] = $email;
        $data['token'] = $key;
        $data['phone_number'] = $pNumber;

        $this->db->insert('publisher', $data);

        return true;
    }

    public function checkToken($key){
        $sql = "SELECT * FROM publisher where token= ?";

        $query = $this->db->query($sql, array($key));

        $tokens = $query->result();

        if(count($tokens) == 1)
            return $tokens[0]->id;
        else
            return 0;
    }
}