<?php

class UserListing extends Ci_Controller{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->load->view("tpl/header");
        $this->load->view("admin/userListingView");
        $this->load->view("tpl/footer");
    }
}

?>