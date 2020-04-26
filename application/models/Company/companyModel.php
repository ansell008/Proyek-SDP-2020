<?php

class CompanyModel extends CI_Model{
    public function getCompanyById($id){
        return $this->db->get_where('auth_perusahaan',array('perusahaan_id' => $id))->result_array();
    }
    public function updateProfile($id, $name, $email, $address, $telp, $tipe, $foto, $kota, $kodepos){
        $updateData = array(
            "perusahaan_nama" => $name,
            "perusahaan_email" => $email,
            "perusahaan_alamat" => $address,
            "perusahaan_telp" => $telp,
            "perusahaan_tipe" => $tipe,
            "perusahaan_profPic" => $foto,
            "perusahaan_kota" => $kota,
            "perusahaan_kodepos" => $kodepos
        );
        $this->db->where('perusahaan_id',$id);
        $this->db->update('auth_perusahaan',$updateData);
    }
    public function getProjectById($id){
        return $this->db->get_where('project',array('perusahaan_id' => $id))->result_array();
    }
    public function getProject($id){
        return $this->db->get_where('project',array('project_id' => $id))->result_array();
    }
    public function insertProject($new){
        $this->db->insert('project', $new);
    }
    public function deleteProject($id){
        $this->db->where('project_id', $id);
        $this->db->delete('project');
    }

    public function deleteSubProject($id){
        $this->db->where('sub_project_id', $id);
        $this->db->delete('sub_project');
    }

    public function getUserByProjectId($id, $idproject){
        $query = "SELECT PP.created_at as joined, A.USER_CV, A.USER_ID AS ID, concat(A.USER_FIRSTNAME,' ',A.USER_LASTNAME) AS NAMA, A.USER_EMAIL AS EMAIL, PP.PROJECT_PEKERJA_STATUS AS STATUS, PP.PROJECT_PEKERJA_ID AS ppid 
        FROM AUTH_USER A, PROJECT_PEKERJA PP, PROJECT P
        WHERE A.USER_ID = PP.USER_ID AND PP.PROJECT_ID = P.PROJECT_ID AND P.PERUSAHAAN_ID ='$id' AND P.PROJECT_ID ='$idproject'";
        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function updateStatusToTransaction($idProject){
        $query = "UPDATE project p SET project_status = 3 WHERE project_id = '$idProject'";
        $res = $this->db->query($query);
        return $res;
    }

    public function insertTransaction($idProject){
        $id = uniqid('TR_');
        $query = "INSERT INTO htrans (transaksi_id, project_id) VALUES('$id', '$idProject')";
        return $this->db->query($query);
    }

    public function getAllProjectTrans($idPerusahaan){
        $query = "SELECT * FROM project WHERE perusahaan_id = '$idPerusahaan'";
        $res = $this->db->query($query);
        return $res->result_array();
    }
}
?>