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
    public function projectsCompany(){
        $data['profil'] = $this->cm->getCompanyById($_SESSION['compAktif']['data'][0]['perusahaan_id']);
        $this->load->view('tpl/headerComp');
        $this->load->view('company/projectsCompany',$data);
        $this->load->view('tpl/footerComp');
    }
    public function createProject(){
        $this->load->model('admin/subCategoryModel');
        $data['profil'] = $this->cm->getCompanyById($_SESSION['compAktif']['data'][0]['perusahaan_id']);
        $data['category'] = $this->subCategoryModel->getCategory();
        $this->load->view('tpl/headerComp');
        $this->load->view('company/createProject',$data);
        $this->load->view('tpl/footerComp');
    }
    public function getAllProjectById(){
        echo json_encode($this->cm->getProjectById($_SESSION['compAktif']['data'][0]['perusahaan_id']));
    }
    public function getProjectById(){
        $id = $this->input->post('id');
        $res = $this->db->get_where('project', array('project_id' => $id));
        echo json_encode($res->result_array());
    }

    public function insertProject(){
        $newData = $this->input->post();
        $newProject = array(
            "project_id" => uniqid($newData['name']),
            "perusahaan_id" => $_SESSION['compAktif']['data'][0]['perusahaan_id'],
            "transaksi_id" => "1",
            "kategori_id" => $newData['categoryName'],
            "project_nama" => $newData['name'],
            "project_deskripsi" => $newData['desc'],
            "project_anggaran" => $newData['budget'],
            "project_status" => '0',
            "project_mulai" => $newData['start'],
            "project_deadline" => $newData['deadline'],
            "created_at" => date("now"),
            "updated_at" => date("now")
        );
        $res = $this->cm->insertProject($newProject);
        redirect('company/project');
    }
    public function deleteProject(){
        $id = $this->input->post('id');
        $this->cm->deleteProject($id);
    }
    public function updateProjectById(){
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $desc = $this->input->post('desc');
        $budget = $this->input->post('budget');
        $deadline = $this->input->post('deadline');
        $time = date("Y-m-d H:i:s");

        $res = $this->db->update('project', array('project_nama' => $name,'project_deskripsi'=>$desc,'project_anggaran'=>$budget, 'project_deadline' => $deadline, 'updated_at' => $time), array('project_id' => $id));
        
        if($res) echo "success";
        else echo "fail";
    }

    public function updateProfile(){
        $updateData = $this->input->post();
        $id = $updateData['idBtn'];
        $a = $updateData['name'];
        $b = $updateData['email'];
        $c = $updateData['address'];
        $d = $updateData['telephone'];
        $e = $updateData['type'];
        if(isset($_FILES['profile_pic'])){
            if($_FILES['profile_pic']['name']!=""){
                $f = $_FILES['profile_pic'];
                if($f==''){
                
                }else{
                    $config['upload_path']      = './asset/img/profile/';
                    $config['allowed_types']    = 'jpg|png';
                    $this->load->library('upload',$config);
        
                    if($this->upload->do_upload('profile_pic')){
                        $foto = $this->upload->data('file_name');
                    }else{
                        var_dump($_FILES['profile_pic']);
                        var_dump($this->upload->display_errors()); die();
                    }
                    $finalF = 'asset/img/profile/'.$foto;
                    $res = $this->cm->updateProfile($id, $a,$b,$c,$d,$e,$finalF);
                    $_SESSION['compAktif']['data'][0]['perusahaan_nama']= $a;
                    $_SESSION['compAktif']['data'][0]['perusahaan_email']= $b;
                    $_SESSION['compAktif']['data'][0]['perusahaan_alamat']= $c;
                    $_SESSION['compAktif']['data'][0]['perusahaan_telp']= $d;
                    $_SESSION['compAktif']['data'][0]['perusahaan_tipe']= $e;
                    $_SESSION['compAktif']['data'][0]['perusahaan_profPic']= $finalF;
                }
            }else{
                $finalF = $_SESSION['compAktif']['data'][0]['perusahaan_profPic'];
                $res = $this->cm->updateProfile($id, $a,$b,$c,$d,$e,$finalF);
                $_SESSION['compAktif']['data'][0]['perusahaan_nama']= $a;
                $_SESSION['compAktif']['data'][0]['perusahaan_email']= $b;
                $_SESSION['compAktif']['data'][0]['perusahaan_alamat']= $c;
                $_SESSION['compAktif']['data'][0]['perusahaan_telp']= $d;
                $_SESSION['compAktif']['data'][0]['perusahaan_tipe']= $e;
            }
        }
        $data['profil'] = $this->cm->getCompanyById($_SESSION['compAktif']['data'][0]['perusahaan_id']);
        $this->load->view('tpl/headerComp');
        $this->load->view('company/profileCompany',$data);
        $this->load->view('tpl/footerComp');
    }

}



?>