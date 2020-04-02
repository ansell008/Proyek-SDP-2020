<?php

class AuthUser extends CI_Controller{
    public function register(){
        $this->load->view('tpl/_header');
        $this->load->view('registerPage');
        $this->load->view('tpl/_footer');
    }
}

?>