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
        $idPerusahaan = $_SESSION['compAktif']['data'][0]['perusahaan_id'];
        $projectCount = $this->db->query("SELECT COUNT(*) as jumProj FROM PROJECT P WHERE P.PERUSAHAAN_ID = '$idPerusahaan'")->result_array();
        $data['jumlahProject'] = $projectCount;
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
    public function getSubProjectById(){
        $id = $this->input->post('id');
        $res = $this->db->get_where('sub_project', array('sub_project_id' => $id));
        echo json_encode($res->result_array());
    }

    public function insertProject(){
        $newData = $this->input->post();
        $nama = $newData['name'];
        if(strstr($nama,' ')){
            $newProject = array(
                "project_id" => uniqid(substr($newData['name'],0,strpos($newData['name'],' '))),
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
        }else {
            $newProject = array(
                "project_id" => uniqid($nama),
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
        }
        
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
    public function updateSubProjectById(){
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $deadline = $this->input->post('deadline');
        $time = date("Y-m-d H:i:s");
        $res = $this->db->update('sub_project', array('sub_project_name' => $name,'sub_project_deadline' => $deadline, 'updated_at' => $time), array('sub_project_id' => $id));
        if($res) echo "success";
        else echo "fail";
    }

    public function insertSubProject(){
        $newData = $this->input->post();
        $nama = $newData['nameNewSub'];
        if(strstr($nama,' ')){
            $newSubProject = array(
                "sub_project_id" => uniqid(substr($newData['nameNewSub'],0,strpos($newData['nameNewSub'],' '))),
                "project_id" => $newData['btnProjectID'],
                "sub_project_name" => $newData['nameNewSub'],
                "sub_project_deadline" => $newData['deadlineSub'],
                "created_at" => date("now"),
                "updated_at" => date("now")
            );
        }else {
            $newSubProject = array(
                "sub_project_id" => uniqid($nama),
                "project_id" => $newData['btnProjectID'],
                "sub_project_name" => $newData['nameNewSub'],
                "sub_project_deadline" => $newData['deadlineSub'],
                "created_at" => date("now"),
                "updated_at" => date("now")
            );
        }
        $res = $this->db->insert('sub_project',$newSubProject);
        redirect('company/company/projectsDetail');
    }
    public function deleteSubProject(){
        $id = $this->input->post('id');
        $this->cm->deleteSubProject($id);
    }
    public function projectsDetail()
    {
        $id = $this->input->post('btnView');
        $res = $this->cm->getProject($id);
        $data['projectDetail'] = $res;
        $data['profil'] = $this->cm->getCompanyById($_SESSION['compAktif']['data'][0]['perusahaan_id']);
        $data['participant'] = $this->cm->getUserByProjectId($_SESSION['compAktif']['data'][0]['perusahaan_id'],$id);
        $this->load->view('tpl/headerComp',$data);
        $this->load->view('company/projectsDetail',$data);
        $this->load->view('tpl/footerComp',$data);
    }
    public function getAllSubProject(){
        $id = $this->input->post('idProject');
        $query = "SELECT * FROM SUB_PROJECT WHERE PROJECT_ID = '$id'";
        echo json_encode($this->db->query($query)->result_array());
    }
    public function getAllUserByProject(){
        $id = $this->input->post('id');
        echo json_encode($this->cm->getUserByProjectId($_SESSION['compAktif']['data'][0]['perusahaan_id'],$id));
    }
    public function acceptParticipant(){
        $id = $this->input->post('id');
        $res = $this->db->update('project_pekerja', array('project_pekerja_status' => 1), array('project_pekerja_id' => $id));   
    }
    public function updateProjectFinish(){
        $id = $this->input->post('id');
        $this->db->update('project', array('project_status' => 2), array('project_id' => $id));
    }

    public function updateProfile(){
        $updateData = $this->input->post();
        $id = $updateData['idBtn'];
        $a = $updateData['name'];
        $b = $updateData['email'];
        $c = $updateData['address'];
        $d = $updateData['telephone'];
        $e = $updateData['type'];
        $g = $updateData['city'];
        $h = $updateData['code'];
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
                    $res = $this->cm->updateProfile($id, $a,$b,$c,$d,$e,$finalF,$g,$h);
                    $_SESSION['compAktif']['data'][0]['perusahaan_nama']= $a;
                    $_SESSION['compAktif']['data'][0]['perusahaan_email']= $b;
                    $_SESSION['compAktif']['data'][0]['perusahaan_alamat']= $c;
                    $_SESSION['compAktif']['data'][0]['perusahaan_telp']= $d;
                    $_SESSION['compAktif']['data'][0]['perusahaan_tipe']= $e;
                    $_SESSION['compAktif']['data'][0]['perusahaan_kota']= $g;
                    $_SESSION['compAktif']['data'][0]['perusahaan_kodepos']= $h;
                    $_SESSION['compAktif']['data'][0]['perusahaan_profPic']= $finalF;
                }
            }else{
                $finalF = $_SESSION['compAktif']['data'][0]['perusahaan_profPic'];
                $res = $this->cm->updateProfile($id, $a,$b,$c,$d,$e,$finalF,$g,$h);
                $_SESSION['compAktif']['data'][0]['perusahaan_nama']= $a;
                $_SESSION['compAktif']['data'][0]['perusahaan_email']= $b;
                $_SESSION['compAktif']['data'][0]['perusahaan_alamat']= $c;
                $_SESSION['compAktif']['data'][0]['perusahaan_telp']= $d;
                $_SESSION['compAktif']['data'][0]['perusahaan_tipe']= $e;
                $_SESSION['compAktif']['data'][0]['perusahaan_kota']= $g;
                $_SESSION['compAktif']['data'][0]['perusahaan_kodepos']= $h;
            }
        }
        $data['profil'] = $this->cm->getCompanyById($_SESSION['compAktif']['data'][0]['perusahaan_id']);
        $this->load->view('tpl/headerComp');
        $this->load->view('company/profileCompany',$data);
        $this->load->view('tpl/footerComp');
    }
    

}



?>