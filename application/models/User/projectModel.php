<?php

class ProjectModel extends Ci_Model{
    public function loadAllProjects(){
        $query = "SELECT p.perusahaan_id, p.project_id, p.project_nama, p.project_deskripsi, p.project_status, p.project_mulai, p.project_deadline, p.created_at, ap.perusahaan_nama
                  FROM project p
                  JOIN auth_perusahaan ap ON ap.perusahaan_id = p.perusahaan_id
                  ";
        return $this->db->query($query)->result_array();
    }

    public function getCount($idPerusahaan){
        $query = "SELECT COUNT(*) AS bid
                  FROM project_pekerja pp
                  JOIN project p ON p.project_id = pp.project_id
                  WHERE p.perusahaan_id = '$idPerusahaan'
                 ";
        return $this->db->query($query)->result_array();
    }

    public function searchProject($name){
        $srcquery = "%$name%";
        $query = "SELECT p.perusahaan_id, p.project_id, p.project_nama, p.project_deskripsi, p.project_status, p.project_mulai, p.project_deadline, p.created_at, ap.perusahaan_nama
                 FROM project p
                 JOIN auth_perusahaan ap ON ap.perusahaan_id = p.perusahaan_id
                 WHERE p.project_nama LIKE '$srcquery'
                 ";
        return $this->db->query($query)->result_array();
    }

    public function searchProjectById($idProject){
        $query = "SELECT * 
                  FROM project p
                  JOIN auth_perusahaan ap ON ap.perusahaan_id = p.perusahaan_id
                  JOIN category_admin ca ON ca.category_id = p.kategori_id
                  WHERE p.project_id = '$idProject'";
        return $this->db->query($query)->result_array();
    }

    public function searchCategory($id = null){
        if($id == null){
            $query = "SELECT * FROM category_admin";
            return $this->db->query($query)->result_array();
        }

        $query = "SELECT p.perusahaan_id, p.project_id, p.project_nama, p.project_deskripsi, p.project_status, p.project_mulai, p.project_deadline, p.created_at, ap.perusahaan_nama
                  FROM project p
                  JOIN auth_perusahaan ap ON ap.perusahaan_id = p.perusahaan_id
                  WHERE kategori_id = '$id'";
        return $this->db->query($query)->result_array();
    }

    public function takeProjectUser($idProject, $idUser){
        $id = uniqid("PP_");
        $date = date_format(date_create('now'), "Y:m:d H:i:s");

        $query = "INSERT INTO project_pekerja VALUES ('$id', '$idUser', '$idProject', 0, '$date', '$date')";
        $res = $this->db->query($query);
        if($res) return true;
        else return false;
    }

    public function searchUserByProject($idProject){
        $query = "SELECT au.user_firstname, au.user_lastname, au.user_profile, au.user_email, au.user_alamat, pp.created_at
                  FROM project_pekerja pp
                  JOIN auth_user au ON au.user_id = pp.user_id
                  ";
        return $this->db->query($query)->result_array();
    }
}

?>