<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Coldleads_m extends CI_Model {
	
		public function getTableData(){
			$sql = "select count(*) as cnt, country from leads where status != ".LEAD_STATUS_FTD." and !isnull(modifyed_by) GROUP BY country";
			$query = $this->db->query($sql);

        	return $query->result();
		}

		public function getLeadsByCode($code){
			$sql = "select * from leads where status != ".LEAD_STATUS_FTD." and !isnull(modifyed_by) and country=?";
			$query = $this->db->query($sql, array($code));

        	return $query->result();
		}
}