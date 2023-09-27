<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Login_m extends CI_Model {
		
	// Login User
    public function checkAuth($uname, $password)
    {
        $sql = "SELECT * FROM users WHERE user_name = ? AND status = 1 AND role = 1 and password= ? limit 1";

        $query = $this->db->query($sql, array($uname, md5($password)));

        $user = $query->result();

        if(count($user) != 1)
            return 403;

        return 200;
    }
}