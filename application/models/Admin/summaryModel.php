<?php

class SummaryModel extends CI_Model{
    public function countUser(){
        $query = "SELECT COUNT(*) as jumlahUser
                  FROM auth_user au
                  WHERE DATE_FORMAT(au.created_at, '%M') = DATE_FORMAT(CURRENT_DATE(), '%M')";
        $res = $this->db->query($query)->result_array();
        return $res;
    }

    public function countCompany(){
        $query = "SELECT COUNT(*) as jumlahPerusahaan
                  FROM auth_perusahaan au
                  WHERE DATE_FORMAT(au.created_at, '%M') = DATE_FORMAT(CURRENT_DATE(), '%M')";
        $res = $this->db->query($query)->result_array();
        return $res;
    }

    public function countProject(){
        $query = "SELECT COUNT(*) as jumlahProject
                  FROM project p
                  WHERE DATE_FORMAT(p.created_at, '%M') = DATE_FORMAT(CURRENT_DATE(), '%M')";
        $res = $this->db->query($query)->result_array();
        return $res;
    }

    public function countFinishedProject(){
        $query = "SELECT COUNT(*) as jumlahProjectFinish
                  FROM project p
                  WHERE DATE_FORMAT(p.created_at, '%M') = DATE_FORMAT(CURRENT_DATE(), '%M') AND p.project_status = '2'";
        $res = $this->db->query($query)->result_array();
        return $res;
    }

    public function getCompanyPerMonth($month){
        $query = "SELECT COUNT(*) as count
                  FROM auth_perusahaan p
                  WHERE DATE_FORMAT(p.created_at, '%M') = '$month'";
        $res = $this->db->query($query)->result_array();
        return $res;
    }

    public function getUserPerMonth($month){
        $query = "SELECT COUNT(*) as count
                  FROM auth_user au
                  WHERE DATE_FORMAT(au.created_at, '%M') = '$month'";
        $res = $this->db->query($query)->result_array();
        return $res;
    }

    public function getProjectPerMonth($month){
        $query = "SELECT COUNT(*) as count
                  FROM project p
                  WHERE DATE_FORMAT(p.created_at, '%M') = '$month'";
        $res = $this->db->query($query)->result_array();
        return $res;
    }
}

?>