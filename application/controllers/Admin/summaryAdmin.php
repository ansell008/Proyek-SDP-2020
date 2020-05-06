<?php

class SummaryAdmin extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model("admin/SummaryModel", 'sm');
    }

    public function getSummary(){
        $data['countUser'] = $this->sm->countUser();
        $data['countPerusahaan'] = $this->sm->countCompany();
        $data['countProject'] = $this->sm->countProject();
        $data['countFinishedProject'] = $this->sm->countFinishedProject();
        echo json_encode($data);
    }

    public function getDataPerMonth(){
        $arr = array("January", "February", "March", "April", "May", "June", "July");
        $data = array();
        foreach($arr as $value){
            $data['company'][] = $this->sm->getCompanyPerMonth($value);
            $data['user'][] = $this->sm->getUserPerMonth($value);
            $data['project'][] = $this->sm->getProjectPerMonth($value);
        }
        echo json_encode($data);
    }
}

?>