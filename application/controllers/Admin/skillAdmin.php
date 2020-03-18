<?php

class SkillAdmin extends CI_Controller{
    public function index(){
        $this->load->view('tpl/header');
        $this->load->view('admin/skillAdminView');
        $this->load->view('tpl/footer');
    }

    public function getAll(){
        $res = $this->db->get('skill_admin');
        echo json_encode($res->result_array());
    }

    public function getById(){
        $id = $this->input->post('id');
        $res = $this->db->get_where('skill_admin', array('skill_id' => $id));
        echo json_encode($res->result_array());
    }

    public function updateById(){
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $time = date("Y-m-d H:i:s");

        $res = $this->db->update('skill_admin', array('skill_name' => $name, 'updated_at' => $time), array('skill_id' => $id));
        
        if($res) echo "success";
        else echo "fail";
    }

    public function addNewSkill(){
        $name = $this->input->post('name');
        $id = uniqid($name);
        $time = date("Y-m-d H:i:s");

        $data = array(
            'skill_id' => $id,
            'skill_name' => $name,
            'created_at' => $time,
            'updated_at' => $time
        );
        $res = $this->db->insert('skill_admin', $data);

        if($res) echo 'success';
        else echo 'failed';
    }

    public function deleteById(){
        $id = $this->input->post('id');
        $res = $this->db->delete('skill_admin', array('skill_id' => $id));

        if($res) echo 'success';
        else echo 'fail';
    }
}

?>