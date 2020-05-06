<?php

class RatingController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('admin/RatingModel', 'rm');
    }

    public function index(){
        $this->load->view('tpl/header');
        $this->load->view('admin/ratingView');
        $this->load->view('tpl/footer');
    }

    public function getAllReviews(){
        $data['userReview'] = $this->rm->getUserReview();
        $data['companyReview'] = $this->rm->getCompanyReview();
        echo json_encode($data);
    }
}

?>