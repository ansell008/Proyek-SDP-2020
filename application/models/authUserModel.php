<?php

class AuthUserModel extends CI_Model{
    public function insertNewUser($table, $data){
        $this->db->insert($table, $data);
    }

    public function findUser($table, $user, $pass){
        $query = '';
        $pass = sha1($pass);
        if($table == 'auth_perusahaan'){
            $query = "SELECT * FROM auth_perusahaan WHERE perusahaan_email = '$user' AND perusahaan_password = '$pass'";
        }else{
            $query = "SELECT * FROM auth_user WHERE (user_email = '$user' OR user_username = '$user') AND user_password = '$pass'";
        }
        return $this->db->query($query);
    }
    public function checkEmail($table, $email){
        $query = '';
        if($table == 'auth_perusahaan'){
            $query = "SELECT * FROM auth_perusahaan WHERE perusahaan_email = '$email'";
        }else{
            $query = "SELECT * FROM auth_user WHERE user_email = '$email'";
        }
        $num =  $this->db->query($query)->num_rows();
        return $num;
    }
    public function verifyEmail($hash){
        $query = "UPDATE auth_user SET user_status = 0 WHERE user_email_confirmation_hash = '$hash' AND user_status = -1";
        $res = $this->db->query($query);
        if($res) return true;
        else return false;
    }
    public function verifyEmailCompany($hash){
        $query = "UPDATE auth_perusahaan SET perusahaan_status = 0 WHERE perusahaan_email_confirmation_hash = '$hash' AND perusahaan_status = -1";
        $res = $this->db->query($query);
        if($res) return true;
        else return false;
    }

}

?>