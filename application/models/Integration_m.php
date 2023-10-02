<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Integration_m extends CI_Model {
		
	public function getTableData(){
        $sql = "select l.*, p.full_name from leads l left join publisher p on l.created_by=p.id where ISNULL(l.modifyed_by)";
        $query = $this->db->query($sql);
        $leads = $query->result();

        return $leads;
    }

    public function getCampaign(){
        $sql = "select * from campaign";
        $query = $this->db->query($sql);
        $leads = $query->result();

        return $leads;
    }

    public function getLeadById($id){
        $sql = "select * from leads where id=?";
        $query = $this->db->query($sql, array($id));
        $lead = $query->result();

        return $lead;
    }
}