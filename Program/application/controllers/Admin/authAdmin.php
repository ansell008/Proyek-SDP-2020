<?php

class AuthAdmin extends CI_Controller{
    public function index(){
        $this->load->view('tpl/header');
        $this->load->view('admin/login');
        $this->load->view('tpl/footer');
    }
}

?>