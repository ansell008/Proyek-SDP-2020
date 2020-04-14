<?php

class CompanyModel extends CI_Model{
    public function getCompanyById($id){
        return $this->db->get_where('auth_perusahaan',array('perusahaan_id' => $id))->result_array();
    }
    public function updateProfile($id, $name, $email, $address, $telp, $tipe, $foto){
        $updateData = array(
            "perusahaan_nama" => $name,
            "perusahaan_email" => $email,
            "perusahaan_alamat" => $address,
            "perusahaan_telp" => $telp,
            "perusahaan_tipe" => $tipe,
            "perusahaan_profPic" => $foto
        );
        $this->db->where('perusahaan_id',$id);
        $this->db->update('auth_perusahaan',$updateData);
    }
    public function getProjectById($id){
        return $this->db->get_where('project',array('perusahaan_id' => $id))->result_array();
    }
    public function insertProject($new){
        $this->db->insert('project', $new);
    }
    public function deleteProject($id){
        $this->db->where('project_id', $id);
        $this->db->delete('project');
    }
}
?>