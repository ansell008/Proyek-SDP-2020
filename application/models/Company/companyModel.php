<?php

class CompanyModel extends CI_Model{
    public function getCompanyById($id){
        return $this->db->get_where('auth_perusahaan',array('perusahaan_id' => $id))->result_array();
    }
}
?>