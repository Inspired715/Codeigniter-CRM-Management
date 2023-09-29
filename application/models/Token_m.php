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
        
        return $this->db->insert_id();
    }

    public function checkToken($key){
        $sql = "select p.*, ifnull(l.offset, 0) as offet from publisher p left join limits l on p.id=l.publisher_id  where p.token= ?";

        $query = $this->db->query($sql, array($key));

        $tokens = $query->result();

        if(count($tokens) == 1)
            return array('publisher_id' => $tokens[0]->id, 'offset' => $tokens[0]->id);
        else
            return 0;
    }

    public function validToken($phone){
        $sql = "select * from publisher where phone_number= ?";

        $query = $this->db->query($sql, array($phone));

        $tokens = $query->result();

        return count($tokens);
    }

    public function insertOffset($pid){
        $data['publisher_id'] = $pid;
        $data['offset'] = 0;
        
        $this->db->insert('limits', $data);
    }
}