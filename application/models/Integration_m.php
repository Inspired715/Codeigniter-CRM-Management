<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Integration_m extends CI_Model {
		
	public function getTableData(){
        $sql = "select l.*, p.full_name from leads l left join publisher p on l.created_by=p.id where ISNULL(l.modifyed_by)";
        $query = $this->db->query($sql);
        $leads = $query->result();

        return $leads;
    }

    public function getLeadById($id){
        $sql = "select l.*, sl.sub_value as prefix from leads l left join sub_leads sl on l.id=sl.lead_id where l.id=? and sl.sub_name='Perfix'";
        $query = $this->db->query($sql, array($id));
        $lead = $query->result();

        return $lead;
    }

    public function getNotExportedLeads($offset){
        $sql = "select l.*, sl.sub_value as prefix from leads l left join sub_leads sl on l.id=sl.lead_id where ISNULL(l.modifyed_by) and sl.sub_name='Perfix' limit ?, 100";
        $query = $this->db->query($sql, array($offset));
        $lead = $query->result();

        return $lead;
    }
}