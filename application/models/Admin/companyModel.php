<?php

class CompanyModel extends CI_Model{
    public function getAll(){
        return $this->db->get('auth_company')->result_array();
    }

    public function getCompany($id){
        $res = $this->db->get_where('auth_company', array('company_id' => $id));
        return $res;
    }
}

?>