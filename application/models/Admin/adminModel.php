<?php

class adminModel extends CI_Model{
    public function getAdmin($username){
        $res = $this->db->get_where('auth_admin', array('admin_username' => $username));
        return $res;
    }

    public function getAll(){
        return $this->db->get('auth_admin');
    }

    public function insertAdmin($data){
        $this->db->insert('auth_admin', $data);
    }
}

?>