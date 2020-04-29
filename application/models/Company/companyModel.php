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
        $query = "INSERT INTO htrans (transaksi_id, project_id, status_code) VALUES('$id', '$idProject', '-1')";
        return $this->db->query($query);
    }

    public function getAllProjectTrans($idPerusahaan){
        $query = "SELECT * FROM project p WHERE p.perusahaan_id = '$idPerusahaan'";
        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function getDetailTransaction($idProject){
        $this->db->select('*');
        $this->db->from('project');
        $this->db->join('auth_perusahaan', 'project.perusahaan_id = auth_perusahaan.perusahaan_id');
        $this->db->where('project.project_id', $idProject);
        return $this->db->get()->result_array();
        // $query = "SELECT * FROM project WHERE perusahaan_id = '$idPerusahaan'";
        // $res = $this->db->query($query);
        // return $res->result_array();
    }

    public function getParticipantCount($idProject){
        $query = "SELECT COUNT(*) as jumlah FROM project_pekerja WHERE project_id = '$idProject'";
        return $this->db->query($query)->result_array();
    }

    public function getPekerjaByProject($idProject){
        $query = "SELECT * FROM project_pekerja pp JOIN auth_user au ON au.user_id = pp.user_id WHERE pp.project_id = '$idProject'";
        return $this->db->query($query)->result_array();
    }
    public function notifNewParticipant($idPerusahaan){
        $query = "SELECT count(ap.user_firstname) as jumlah
        FROM auth_user ap, project_pekerja pp, project p, auth_perusahaan au 
        where ap.user_id = pp.user_id and pp.project_id = p.project_id and p.perusahaan_id = au.perusahaan_id and 
        au.perusahaan_id = '$idPerusahaan' and pp.project_pekerja_status = 0";
        return $this->db->query($query)->result_array();
    }
}
?>