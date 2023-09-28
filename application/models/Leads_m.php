<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Leads_m extends CI_Model {
		
    public function getTableData(){
        $sql = ""; $query = NULL;
        if($_SESSION['publisher'] != 0){
            $sql = "SELECT l.id, l.first_name, l.last_name, l.status, l.phone_number, l.email, p.full_name as created_by, l.created_date FROM leads l left join publisher p on l.created_by=p.id where l.created_by=?";
            $query = $this->db->query($sql, array($_SESSION['publisher']));
        }else{
            $sql = "SELECT l.id, l.first_name, l.last_name, l.status, l.phone_number, l.email, p.full_name as created_by, l.created_date FROM leads l left join publisher p on l.created_by=p.id";
            $query = $this->db->query($sql);
        }

        $leads = $query->result();

        return $leads;
    }

    public function getLeadDetail($lid){
        $sql = "SELECT l.first_name, l.last_name, l.title, l.web_site, l.address, l.city, l.state, l.email, l.country, s.* FROM sub_leads s Left Join leads l on s.lead_id=l.id WHERE s.lead_id=?";

        $query = $this->db->query($sql, array($lid));

        $leads = $query->result();

        return $leads;
    }

    public function insertLeads($leads){
        $this->db->insert('leads', $leads);
        
        return $this->db->insert_id();
    }

    public function insertSubLeads($subLeads){
        $this->db->insert_batch('sub_leads', $subLeads);

        if ($this->db->affected_rows() > 0)
        {
            return true;
        }

        return false;
    }

    public function checkLead($phone){
        $sql = "SELECT * FROM leads where phone_number= ?";

        $query = $this->db->query($sql, array($phone));

        $leads = $query->result();

        if(count($leads) > 0)
            return false;
        else
            return true;
    }

    public function getLeadWithSub($from='', $to=''){
        $query = null;
        if($from != ''){
            $sql = "select l.*, sl.sub_name, sl.sub_value from leads l left join sub_leads sl on l.id=sl.lead_id where l.created_date >= ? and l.created_date <= ?";
            $query = $this->db->query($sql, array($from, $to));
        }else{
            $sql = "select l.*, sl.sub_name, sl.sub_value from leads l left join sub_leads sl on l.id=sl.lead_id";
            $query = $this->db->query($sql);
        }

        $leads = $query->result();

        return $leads;
    }
}