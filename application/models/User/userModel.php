<?php

class UserModel extends CI_Model{
    public function updateUser($id, $data){
        $res = $this->db->update('auth_user', $data, array('user_id' => $id));
        return $res;
    }

    public function getUserById($id){
        return $this->db->get('auth_user', array('user_id' => $id))->result_array();
    }
    public function rateComp($new){
        $this->db->insert('review_perusahaan', $new);
    }
}

?>