<?php

class IndexController extends CI_Controller{
    public function index(){
        $this->load->view('tpl/_header');
        $this->load->view('indexPage');
        $this->load->view('tpl/_footer');
    }
}

?>