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
    public function loadSummary(){
       

        $this->load->model("user/userReport");
        $jumlahproyek=[];
        for ($i=1; $i <13 ; $i++) { 
            $res = $this->userReport->getCountProject($_SESSION['userAktif'][0]['user_id'],$i);
            array_push($jumlahproyek,$res);
        }
        $this->load->view('tpl/headerComp');
        $this->load->view('user/summaryUser', array("data"=>$jumlahproyek));
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

    public function detailProject($idProject){
        $this->load->model("user/projectModel");
        $res = $this->projectModel->searchProjectById(urldecode($idProject));
        $pekerja = $this->projectModel->searchUserByProject($idProject);
        
        $this->load->view('tpl/headerComp');
        $this->load->view('user/projectDetail', array("data" => $res, "user" => $pekerja));
        $this->load->view('tpl/footerComp');
    }

    public function searchProject(){
        $this->load->model("user/projectModel");
        $query = $this->input->post('query');
        $res = $this->projectModel->searchProject($query);

        foreach($res as $key => &$value){
            $bidder = $this->projectModel->getCount($value["perusahaan_id"]);
            $value["bidder"] = $bidder[0]["bid"];
        }

        echo json_encode($res);
    }

    public function takeProject(){
        $this->load->model("user/projectModel");
        $idProject = $this->input->post("idProject");
        $idUser = $_SESSION['userAktif'][0]['user_id'];

        $res = $this->projectModel->takeProjectUser($idProject, $idUser);

        if($res) echo "SUCCESS";
        else echo "FAILED";
    }

    public function loadProjects(){
        $this->load->model("user/projectModel");
        $res = $this->projectModel->loadAllProjects();
        
        foreach($res as $key => &$value){
            $bidder = $this->projectModel->getCount($value["perusahaan_id"]);
            $value["bidder"] = $bidder[0]["bid"];
        }

        echo json_encode($res);
    }

    public function searchCat(){
        $this->load->model("user/projectModel");
        $res = $this->projectModel->searchCategory();

        echo json_encode($res);
    }

    public function searchByCat(){
        $id = $this->input->post("id");
        $this->load->model("user/projectModel");

        $res = $this->projectModel->searchCategory($id);

        foreach($res as $key => &$value){
            $bidder = $this->projectModel->getCount($value["perusahaan_id"]);
            $value["bidder"] = $bidder[0]["bid"];
        }

        echo json_encode($res);
    }

    public function uploadCV(){
        $id= $this->input->post("idUser");
        $cvInput = $_FILES['cv'];
        if($cvInput==''){
        }else{
            $path_parts = pathinfo($_FILES["cv"]["name"]);
            $filen = $_FILES['cv']['name'];
            $extension = $path_parts['extension'];
            $foto = md5($filen).'.'.$extension;
            $config['file_name']        = $foto;
            $config['upload_path']      = './asset/upload/cv-user/';
            $config['allowed_types']    = 'jpg|png';
            $config['max_size']         = 2048;
            $this->load->library('upload',$config);

            if($this->upload->do_upload('cv')){
                $foto = $this->upload->data('file_name');
            }else{
                var_dump($_FILES['cv']);
                var_dump($this->upload->display_errors());
                redirect('user/profile');
            }
            $cv = 'asset/upload/cv-user/'.$foto;
            $_SESSION['userAktif'][0]['user_cv'] = $cv;
        }
        $time = date("Y-m-d H:i:s");
        $this->db->update('auth_user', array('user_cv' => $cv, 'updated_at' => $time), array('user_id' => $id));
        redirect('user/profile');
    }
    public function updatePP(){
        $id= $this->input->post("idUser");
        $cvInput = $_FILES['profile_pic'];
        if($cvInput==''){
        }else{
            $path_parts = pathinfo($_FILES["profile_pic"]["name"]);
            $filen = $_FILES['profile_pic']['name'];
            $extension = $path_parts['extension'];
            $foto = md5($filen).'.'.$extension;
            $config['file_name']        = $foto;
            $config['upload_path']      = './asset/upload/pp-user/';
            $config['allowed_types']    = 'jpg|png';
            $config['max_size']         = 2048;
            $this->load->library('upload',$config);

            if($this->upload->do_upload('profile_pic')){
                $foto = $this->upload->data('file_name');
            }else{
                var_dump($_FILES['profile_pic']);
                var_dump($this->upload->display_errors());
                redirect('user/profile');
            }
            $cv = 'asset/upload/pp-user/'.$foto;
            $_SESSION['userAktif'][0]['user_profile'] = $cv;
        }
        $time = date("Y-m-d H:i:s");
        $this->db->update('auth_user', array('user_profile' => $cv, 'updated_at' => $time), array('user_id' => $id));
        redirect('user/profile');
    }
    public function myProject(){
        $this->load->view('tpl/headerComp');
        $this->load->view('user/myproject');
        $this->load->view('tpl/footerComp');
    }
    public function getMyProjectsById(){
        $this->load->model("user/projectModel");
        echo json_encode($this->projectModel->getMyProjects($_SESSION['userAktif'][0]['user_id']));
    }
    public function myProjectDetail(){
        $this->load->model("user/projectModel");
        $id = $this->input->post('btnView');
        $res = $this->projectModel->getProject($id);
        $data['projectDetail'] = $res;
        $this->load->view('tpl/headerComp');
        $this->load->view('user/myprojectDetail',$data);
        $this->load->view('tpl/footerComp');
    }
    public function showMySubProject($id){
        $this->load->model("user/projectModel");
        echo json_encode($this->projectModel->getSubById($id));
    }
    public function updateSub(){
        $id = $this->input->post('id');
        $this->db->update('sub_project', array('sub_project_status' => 1), array('sub_project_id' => $id));
    }

    // 7c4a8d09ca3762af61e59520943dc26494f8941b
}

?>