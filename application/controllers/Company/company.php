<?php

Class Company extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('company/CompanyModel', 'cm');
        $this->load->helper(array('form', 'url'));
    }
    public function index(){
        $data['profil'] = $this->cm->getCompanyById($_SESSION['compAktif']['data'][0]['perusahaan_id']);
        $idPerusahaan = $_SESSION['compAktif']['data'][0]['perusahaan_id'];
        $projectCount = $this->db->query("SELECT COUNT(*) as jumProj FROM PROJECT P WHERE P.PERUSAHAAN_ID = '$idPerusahaan'")->result_array();
        $data['newParticipant'] = $this->cm->notifNewParticipant($_SESSION['compAktif']['data'][0]['perusahaan_id']);
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
        $this->load->model('admin/SubCategoryModel', 'subCategoryModel');
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
        $subKatId = $newData['subCategoryName'];
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
        $new = array(
            "project_subkategori_id" => uniqid($subKatId),
            "sub_kategori_id" => $subKatId,
            "project_id" => uniqid($nama),
            "created_at" => date("now"),
            "updated_at" => date("now")
        );
        $projSub = $this->db->insert('project_subkategori', $new);
        $res = $this->cm->insertProject($newProject);
        redirect('company/myprojects');
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
        redirect('company/detailproject');
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

    public function giveRatingUser(){
        $dataUser = $this->input->post();
        $idUser = $dataUser['nameParti'];
        $rate = $dataUser['ratingUser'];
        $desc = $dataUser['descUser'];
        $newRatingUser = array(
            "review_user_id" => uniqid('RT'.$idUser),
            "user_id" => $idUser,
            "review_user_deskripsi" => $desc,
            "review_user_rating" => $rate,
            "review_user_by" => $_SESSION['compAktif']['data'][0]['perusahaan_id'],
            "created_at" => date("now"),
            "updated_at" => date("now")
        );
        $this->cm->rateUser($newRatingUser);
        $query = "SELECT SUM(review_user_rating)/COUNT(review_user_rating) as AVGR FROM review_user WHERE user_id = '$idUser'";
        $count = $this->db->query($query)->result_array();
        $res = $this->db->update('auth_user', array('user_rate' => $count[0]['AVGR']), array('user_id' => $idUser));   
        //echo ;
        redirect('company/detailproject');
    }
    public function getAllSubProject(){
        $id = $this->input->post('idProject');
        $query = "SELECT * FROM sub_project SP LEFT JOIN auth_user A ON A.user_id = SP.sub_project_finished_by WHERE SP.project_id = '$id' ";
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
    public function ignoreParticipant(){
        $id = $this->input->post('id');
        $res = $this->db->update('project_pekerja', array('project_pekerja_status' => -1), array('project_pekerja_id' => $id));   
    }
    public function updateProjectFinish(){
        $id = $this->input->post('id');
        $this->db->update('project', array('project_status' => 2), array('project_id' => $id));
    }
    public function updateProjectOnGoing(){
        $id = $this->input->post('id');
        $this->db->update('project', array('project_status' => 1), array('project_id' => $id));
    }
    public function getSubKategoriById(){
        $id = $this->input->post('idKat');
        $query = "SELECT * FROM sub_kategori WHERE kategori_id = '$id'";
        echo json_encode($this->db->query($query)->result_array());
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
                    $path_parts = pathinfo($_FILES["profile_pic"]["name"]);
                    $filen = $_FILES['profile_pic']['name'];
                    $extension = $path_parts['extension'];
                    $foto = md5($h.$filen).'.'.$extension;
                    $config['upload_path']      = './asset/img/profile/';
                    $config['allowed_types']    = 'jpg|png';
                    $config['max_size']         = 2048;
                    $config['file_name']        = $foto;
                    $this->load->library('upload',$config);
        
                    if($this->upload->do_upload('profile_pic')){
                        $foto = $this->upload->data('file_name');
                        
                    }else{
                        var_dump($_FILES['profile_pic']);
                        var_dump($this->upload->display_errors()); 
                        redirect('company/myprofile');
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
        redirect('company/myprofile');
    }

    public function loadTransaction(){
        $this->load->view("tpl/headerComp.php");
        $this->load->view("company/companyTransaction");
        $this->load->view("tpl/footerComp.php");
    }

    public function proceedTransaction($idProject){
        $id = urldecode($idProject);

        $this->cm->updateStatusToTransaction($id);
        $this->cm->insertTransaction($id);

        redirect('company/transaction');
    }

    public function getAllTransaction(){
        $idP = $this->input->post("id");
        $res = $this->cm->getAllProjectTrans($idP);

        echo json_encode($res);
    }

    public function getTransactionDetail($idProject){
        $data['project'] = $this->cm->getDetailTransaction(urldecode($idProject));
        $data['count'] = $this->cm->getParticipantCount($idProject);
        $data['pekerja'] = $this->cm->getPekerjaByProject($idProject);
        $this->load->view("tpl/headerComp.php");
        $this->load->view("company/companyTransactionDetail", $data);
        $this->load->view("tpl/footerComp.php");
    }
    
    public function showSummary(){
        $this->load->view("tpl/headerComp");
        $this->load->view("company/summaryCompany");
        $this->load->view("tpl/footerComp");
    }

    public function getSummary(){
        $this->load->model("company/CompanyModel", 'companyModel');
        $idPerusahaan = $this->input->post("id");
        $projects = $this->companyModel->getAllProjects($idPerusahaan);
        $projectDone = $this->companyModel->getProjectsDone($idPerusahaan);
        $projectOnGoing = $this->companyModel->getProjectsOnGoing($idPerusahaan);
        $transactionNotPayed = $this->companyModel->getProjectNotPayed($idPerusahaan);
        $transactionPending = $this->companyModel->getProjectTransactionPending($idPerusahaan);
        $transactionDone = $this->companyModel->getProjectTransactionDone($idPerusahaan);

        $data = array(
            'all' => $projects,
            'done' => $projectDone,
            'ongoing' => $projectOnGoing,
            'notPayed' => $transactionNotPayed,
            'pending' => $transactionPending,
            'transDone' => $transactionDone
        );
        echo json_encode($data);
    }

    public function getReport(){
        $date = date_create($this->input->post("tanggal"));
        $idPerusahaan = $_SESSION['compAktif']['data'][0]['perusahaan_id'];
        $query = "SELECT project_id, created_at FROM project WHERE perusahaan_id = '$idPerusahaan'";
        $res = $this->db->query($query)->result_array();
        
        $reps = array();

        foreach($res as $key => $value){
            $tgl = date_create($value['created_at']);

            if($tgl == $date){
                $query = "SELECT * FROM project JOIN htrans on htrans.project_id = project.project_id WHERE perusahaan_id = '$idPerusahaan' AND project.project_id = '$value[project_id]'";
                $arr = $this->db->query($query)->result_array();
                $arr[0]['pekerja'] = $this->db->query("SELECT auth_user.user_firstname, auth_user.user_lastname FROM auth_user JOIN project_pekerja ON project_pekerja.user_id = auth_user.user_id WHERE project_pekerja.project_id = '$value[project_id]'")->result_array();
                $reps[] = $arr;
            }
        }

        echo json_encode($reps);
    }

}



?>