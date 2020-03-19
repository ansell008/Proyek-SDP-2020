<?php

class UserModel extends CI_Model{
    public function getAll(){
        return $this->db->get('auth_user')->result_array();
    }
}

?>