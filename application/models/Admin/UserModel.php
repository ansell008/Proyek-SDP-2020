<?php

class UserModel extends CI_Model{
    public function getAll(){
        return $this->db->get('auth_user')->result_array();
    }

    public function findUser($id){
        $query = "SELECT * FROM auth_user LEFT JOIN cv_user ON cv_user.cv_user_id = auth_user.user_id WHERE auth_user.user_id = '$id'";
        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function banUserById($id){
        $res = $this->db->update('auth_user', array('user_status' => '1', 'updated_at' => date("Y-m-d H:i:s")), array('user_id' => $id));
        return $res;
    }

    public function unBanUserById($id){
        $res = $this->db->update('auth_user', array('user_status' => '0', 'updated_at' => date("Y-m-d H:i:s")), array('user_id' => $id));
        return $res;
    }

    public function getUserSkills($id){
        $query = "SELECT * FROM skill_user su JOIN skill_admin sa ON sa.skill_id = su.skill_admin_id WHERE su.skill_user_user_id = '$id'";
        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function getUserProjects($id){
        $query = "SELECT * FROM project_pekerja pp
                  LEFT JOIN project p ON p.project_id = pp.project_id
                  WHERE pp.user_id = '$id'
                ";
        $res = $this->db->query($query);
        return $res->result_array();
    }
}

?>