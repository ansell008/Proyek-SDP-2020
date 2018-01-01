<?php
class UserListing extends Ci_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('admin/UserModel', 'um');
    }

    public function loadFreelance(){
        $this->load->view("tpl/header");
        $this->load->view("admin/userListingView");
        $this->load->view("tpl/footer");
    }

    public function loadCompany(){
        $this->load->view("tpl/header");
        $this->load->view("admin/companyListingView");
        $this->load->view("tpl/footer");
    }

    public function getAllUser(){
        echo json_encode($this->um->getAll());
    }

    public function getById(){
        $id = $this->input->post('btnViewDetail');
        // echo $id;
        $data['dataUser'] = $this->um->findUser($id);
        $data['userSkill'] = $this->getSkills($id);
        // print_r($data);

        $this->load->view('tpl/header');
        $this->load->view('admin/userDetailView', $data);
        $this->load->view('tpl/footer');
        // echo '<pre>';
        // print_r($dataUser);
        // echo '</pre>';

    }

    public function banUser(){
        $id = $this->input->post('idUser');
        $res = $this->um->banUserById($id);

        if($res) echo 'success';
        else echo 'failed';
    }

    public function getSkills($id){
        return $this->um->getUserSkills($id);
    }
}

?>