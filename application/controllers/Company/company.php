<?php

Class Company extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('company/companyModel', 'cm');
    }
    public function index(){
        // $data = $this->cm->getCompanyById($_SESSION['compAktif'][0]['perusahaan_id']);
        $this->load->view('tpl/headerComp');
        $this->load->view('company/landingCompany');
        $this->load->view('tpl/footerComp');
    }
}



?>