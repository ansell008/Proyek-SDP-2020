<?php

Class Company extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('company/companyModel', 'cm');
        $this->load->helper(array('form', 'url'));
    }
    public function index(){
        $data['profil'] = $this->cm->getCompanyById($_SESSION['compAktif']['data'][0]['perusahaan_id']);
        $this->load->view('tpl/headerComp');
        $this->load->view('company/landingCompany',$data);
        $this->load->view('tpl/footerComp');
    }
    public function profileCompany(){
            $data['profil'] = $this->cm->getCompanyById($_SESSION['compAktif']['data'][0]['perusahaan_id']);
            $this->load->view('tpl/headerComp');
            $this->load->view('company/profileCompany',$data);
            $this->load->view('tpl/footerComp');
    }

    public function updateProfile(){
        $updateData = $this->input->post();
        $id = $updateData['idBtn'];
        $a = $updateData['name'];
        $b = $updateData['email'];
        $c = $updateData['address'];
        $d = $updateData['telephone'];
        $e = $updateData['type'];
        $f = $_FILES['profile_pic'];
        if($f==''){
        }else{
            $config['upload_path']      = './asset/img/profile/';
            $config['allowed_types']    = 'jpg|png';
            $this->load->library('upload',$config);

            if($this->upload->do_upload('profile_pic')){
                $foto = $this->upload->data('file_name');
            }else{
                var_dump($this->upload->display_errors()); die();
            }
        }
        $finalF = 'asset/img/profile/'.$foto;
        $res = $this->cm->updateProfile($id, $a,$b,$c,$d,$e,$finalF);
        $_SESSION['compAktif']['data'][0]['perusahaan_nama']= $a;
        $_SESSION['compAktif']['data'][0]['perusahaan_email']= $b;
        $_SESSION['compAktif']['data'][0]['perusahaan_alamat']= $c;
        $_SESSION['compAktif']['data'][0]['perusahaan_telp']= $d;
        $_SESSION['compAktif']['data'][0]['perusahaan_tipe']= $e;
        $_SESSION['compAktif']['data'][0]['perusahaan_profPic']= $finalF;
        $data['profil'] = $this->cm->getCompanyById($_SESSION['compAktif']['data'][0]['perusahaan_id']);
        $this->load->view('tpl/headerComp');
        $this->load->view('company/profileCompany',$data);
        $this->load->view('tpl/footerComp');
    }

}



?>