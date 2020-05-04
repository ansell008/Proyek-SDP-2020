<?php

class UserReport extends CI_Model{
    public function getCountProject($idUser,$bulan){
        $query = "SELECT COUNT(*) AS bid FROM project_pekerja pp 
        WHERE pp.user_id = '$idUser' and date_format(pp.created_at,'%m')=$bulan and date_format(pp.created_at,'%Y')=date_format(NOW(),'%Y')";
        return $this->db->query($query)->result_array();
    }
}

?>