<?php

class EmailModel extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->library('email');
    }
    
}

?>