<?php

class RatingModel extends CI_Model{
    public function getUserReview(){
        $query = "SELECT * 
                  FROM review_user ru
                  JOIN auth_user au ON au.user_id = ru.user_id
                  JOIN auth_perusahaan ap ON ap.perusahaan_id = ru.review_user_by";
        $res = $this->db->query($query)->result_array();
        return $res;
    }
    public function getCompanyReview(){
        $query = "SELECT * 
                  FROM review_perusahaan rp
                  JOIN auth_user au ON au.user_id = rp.review_perusahaan_by
                  JOIN auth_perusahaan ap ON ap.perusahaan_id = rp.perusahaan_id";
        $res = $this->db->query($query)->result_array();
        return $res;
    }
}

?>