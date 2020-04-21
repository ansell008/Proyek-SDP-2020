<?php

class UserController extends Ci_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user/userModel');
    }

    public function showDash(){
        $this->load->view('tpl/headerComp');
        $this->load->view('user/landingUser');
        $this->load->view('tpl/footerComp');
    }

    public function loadProfile(){
        $this->load->view('tpl/headerComp');
        $this->load->view('user/profileUser');
        $this->load->view('tpl/footerComp');
    }

    public function changePass(){
        if($_SESSION['userAktif'][0]['user_password'] == sha1($this->input->post('oldPassword'))){
            if($this->input->post('newPassword') == $this->input->post('confPassword')){
                $this->userModel->updateUser($_SESSION['userAktif'][0]['user_id'], array('user_password' => sha1($this->input->post('newPassword'))));
                $this->session->set_userdata(array('userAktif' => $this->userModel->getUserById($_SESSION['userAktif'][0]['user_id'])));
                redirect('user/profile');
            }else{
                $this->session->set_flashdata('err', 'Confirm Password Not Matching');
                redirect('user/profile');
            }
        }else{
            $this->session->set_flashdata('err', 'Old Password Not Matching');
            redirect('user/profile');
        }
    }

    public function updateProfile(){
        $idAktif = $_SESSION['userAktif'][0]['user_id'];

        $dataBaru = array(
            'user_username' => $this->input->post('username'),
            'user_firstname' => $this->input->post('firstname'),
            'user_lastname' => $this->input->post('lastname'),
            'user_ktp' => $this->input->post('ktp'),
            'user_email' => $this->input->post('email')
        );

        $res = $this->userModel->updateUser($idAktif, $dataBaru);
        
        if(!$res){
            $this->session->set_flashdata('err', 'Update Gagal');
        }

        $this->session->set_userdata(array('userAktif' => $this->userModel->getUserById($idAktif)));
        redirect('user/profile');
    }
    
    public function showProject(){
        $this->load->view('tpl/headerComp');
        $this->load->view('user/projectUser');
        $this->load->view('tpl/footerComp');
    }

    public function loadProjects(){
        $this->load->model("user/projectModel");
        $res = $this->projectModel->loadAllProjects();
        echo json_encode($res);
    }

    // 7c4a8d09ca3762af61e59520943dc26494f8941b
}

?>