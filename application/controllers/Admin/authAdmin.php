<?php

class AuthAdmin extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('admin/adminModel');
    }

    public function index(){
        $this->load->view('tpl/header');
        $this->load->view('admin/login');
        $this->load->view('tpl/footer');
    }

    public function cekLogin(){
        $username = $this->input->post('username');
        $pass = $this->input->post('password');

        $res = $this->adminModel->getAdmin($username);

        if($res->num_rows() > 0){
            $adminData = $res->result_array();
            if($adminData[0]['admin_password'] == $pass){
                $this->session->set_userdata(array('aktif' => $adminData));
                $this->load->view('tpl/header');
                $this->load->view('admin/landing');
                $this->load->view('tpl/footer');
            }else{
                $this->index();
            }
        }else{
            $this->index();
        }
    }

    public function adminView(){
        $res['data'] = $this->adminModel->getAll()->result_array();
        $this->load->view('tpl/header');
        $this->load->view('admin/authAdminView', $res);
        $this->load->view('tpl/footer');
    }

    public function loadViewAdmin($name){
        $this->load->view('tpl/header');
        $this->load->view('admin/'.$name);
        $this->load->view('tpl/footer');
    }

    public function logout(){
        $this->session->unset_userdata('aktif');
        $this->index();
    }
}

?>