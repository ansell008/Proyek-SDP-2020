<?php

class AuthUserModel extends CI_Model{
    public function insertNewUser($table, $data){
        return $this->db->insert($table, $data);
    }

    public function findUser($table, $user, $pass){
        $query = '';
        if($table == 'auth_perusahaan'){
            $query = "SELECT * FROM auth_perusahaan WHERE perusahaan_email = '$user' AND perusahaan_password = '$pass'";
        }else{
            $query = "SELECT * FROM auth_user WHERE (user_email = '$user' OR user_username = '$user') AND user_password = '$pass'";
        }
        return $this->db->query($query);
    }
}

?>