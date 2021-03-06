<?php
Class companyListing extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/CompanyModel', 'companyModel');
    }

    public function index(){
        $this->load->view('tpl/header');
        $this->load->view('admin/companyListingView');
        $this->load->view('tpl/footer');
    }

    public function getAllCompany(){
        echo json_encode($this->companyModel->getAll());
    }
    public function getCompanyDetail(){
        $id = $this->input->post('btnDetail');

        $res = $this->companyModel->getCompany($id);
        $comData = $res->result_array();
        $this->session->set_userdata(array('comView' => $comData));
        $this->load->view('tpl/header');
        $this->load->view('admin/companyDetailView');
        $this->load->view('tpl/footer');
    }

    public function updateStatus(){
        $id = $this->input->post('status');
        $this->companyModel->updateStatus($id);
        $this->load->view('tpl/header');
        $this->load->view('admin/companyDetailView');
        $this->load->view('tpl/footer');
    }

    public function getAllProjectById(){
        $id = $this->input->post('perusahaan_id');
        echo json_encode($this->companyModel->getProjectById($id));
    }
}
?>