<?php

class CompanyModel extends CI_Model{
    public function getAll(){
        return $this->db->get('auth_perusahaan')->result_array();
    }

    public function getCompany($id){
        $res = $this->db->get_where('auth_perusahaan', array('perusahaan_id' => $id));
        return $res;
    }

    public function updateStatus($id){
        return $this->db->query("UPDATE  auth_perusahaan SET perusahaan_status = CASE WHEN perusahaan_status = '0' THEN '1' ELSE '0' END WHERE   perusahaan_id = $id");
    }

    public function getProjectById($id){
        return $this->db->get_where('project',array('perusahaan_id' => $id))->result_array();
    }
}

?>