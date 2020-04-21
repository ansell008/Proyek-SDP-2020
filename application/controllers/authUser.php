<?php

class AuthUser extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->model('EmailModel');
        mail("rommycy00@gmail.com","Success","Great, Localhost Mail works");
    }

    public function register(){
        $this->load->view('tpl/_header');
        $this->load->view('registerPage');
        $this->load->view('tpl/_footer');
    }

    public function validate1(){
        $this->load->library('form_validation');

        $this->form_validation->set_rules('firstname', 'First Name', 'required',
            array(
                "required" => "First Name field cannot empty",
            )
        );
        $this->form_validation->set_rules('lastname', 'Last Name', 'required',
            array(
                "required" => "Last Name field cannot empty",
            )
        );

        if($this->form_validation->run() == FALSE){
            $this->register();
        }else{
            $userData['data'] = array(
                "user_firstname" => $this->input->post('firstname'),
                "user_lastname" => $this->input->post('lastname')
            );
            $this->load->view('tpl/_header');
            $this->load->view('registerPage2', $userData);
            $this->load->view('tpl/_footer');
        }
    }

    public function validate2(){
        $data['user'] = json_decode($this->input->post('data'), true);
        $data['table'] = ($this->input->post('type') == 'js' ? 'auth_user' : 'auth_perusahaan');

        $this->load->view('tpl/_header');
        if($data['table'] == 'auth_user'){
            $this->load->view('registerPage3', $data);
        }else{
            $this->load->view('registerPage4', $data);
        }
        $this->load->view('tpl/_footer');
    }

    public function validate3(){
        $this->load->model('authUserModel');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'required',
            array(
                "required" => "Username field cannot empty"
            )
        );
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email',
            array(
                "required" => "Email field cannot empty",
                "valid_email" => "Must provide a valid email address"
            )
        );
        $this->form_validation->set_rules('pass', 'Password', 'required|min_length[6]',
            array(
                "required" => "Password field cannot empty",
                "min_length" => "Password must contain at least 6 charaters"
            )
        );
        $this->form_validation->set_rules('confPass', 'Confirm Password', 'required|matches[pass]',
            array(
                "required" => "Confirm Password field cannot empty",
                "matches" => "Password must match with Confirm Password"
            )
        );
        $this->form_validation->set_rules('add', 'Address', 'required',
            array(
                "required" => "Address field cannot empty"
            )
        );
        $this->form_validation->set_rules('city', 'City', 'required',
            array(
                "required" => "City field cannot empty"
            )
        );
        $this->form_validation->set_rules('code', 'Post Code', 'required|exact_length[5]',
            array(
                "required" => "Postcode field cannot empty",
                "exact_length" => "Enter a valid postcode"
            )
        );

        if($this->form_validation->run() == FALSE){
            $data['table'] = json_decode($this->input->post('table'), true);
            $data['user'] = json_decode($this->input->post('data'), true);

            $this->load->view('tpl/_header');
            $this->load->view('registerPage3', $data);
            $this->load->view('tpl/_footer');
        }else{
            $data['table'] = json_decode($this->input->post('table'), true);
            $data['user'] = json_decode($this->input->post('data'), true);
            $data['user']['user_email'] = $this->input->post('email');
            $data['user']['user_username'] = $this->input->post('username');
            $data['user']['user_password'] = sha1($this->input->post('pass'));
            $data['user']['user_alamat'] = $this->input->post('add');
            $data['user']['user_kota'] = $this->input->post('city');
            $data['user']['user_ktp'] = $this->input->post('ktp');
            $data['user']['user_kodepos'] = $this->input->post('code');
            $data['user']['created_at'] = date_format(date_create('now'), 'Y:m:d H:i:s');
            $data['user']['updated_at'] = date_format(date_create('now'), 'Y:m:d H:i:s');
            $data['user']['user_id'] = uniqid('US_');

            $f = $_FILES['ktp'];
                if($f==''){
                }else{
                    $config['upload_path']      = './asset/upload/ktp-user/';
                    $config['allowed_types']    = 'jpg|png';
                    $config['max_size']         = 2048;
                    $this->load->library('upload',$config);
        
                    if($this->upload->do_upload('ktp')){
                        $foto = $this->upload->data('file_name');
                    }else{
                        var_dump($_FILES['ktp']);
                        var_dump($this->upload->display_errors()); die();
                    }
                    $finalF = 'asset/upload/ktp-user/'.$foto;
                    $data['user']['user_ktp'] = $finalF;
                }

            $res = $this->authUserModel->insertNewUser($data['table'], $data['user']);
            if($res){
                $this->load->view('tpl/_header');
                $this->load->view('success', $data);
                $this->load->view('tpl/_footer');
            }
        }
    }

    public function validate4(){
        $this->load->library('form_validation');
        $this->load->model('authUserModel');
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email',
            array(
                "required" => "Email field cannot empty",
                "valid_email" => "Must provide a valid email address"
            )
        );
        $this->form_validation->set_rules('pass', 'Password', 'required|min_length[6]',
            array(
                "required" => "Password field cannot empty",
                "min_length" => "Password must contain at least 6 charaters"
            )
        );
        $this->form_validation->set_rules('confPass', 'Confirm Password', 'required|matches[pass]',
            array(
                "required" => "Confirm Password field cannot empty",
                "matches" => "Password must match with Confirm Password"
            )
        );
        $this->form_validation->set_rules('code', 'Post Code', 'required|min_length[5]',
            array(
                "required" => "Post Code field cannot empty",
                "min_length" => "Post Code must 5 numbers"
            )
        );
        $this->form_validation->set_rules('type', 'Type', 'required',
            array(
                "required" => "Type field cannot empty"
            )
        );
        $this->form_validation->set_rules('telp', 'Phone Number', 'required',
            array(
                "required" => "Phone Number field cannot empty"
            )
        );

        if($this->form_validation->run() == FALSE){
            $data['table'] = json_decode($this->input->post('table'), true);
            $data['user'] = json_decode($this->input->post('data'), true);

            $this->load->view('tpl/_header');
            $this->load->view('registerPage4', $data);
            $this->load->view('tpl/_footer');
        }else{
            $data['table'] = json_decode($this->input->post('table'), true);
            $email = $this->input->post('email');
            if($this->authUserModel->checkEmail($data['table'],$email) == '0'){
                $data['user'] = json_decode($this->input->post('data'), true);
                $data['user']['perusahaan_nama'] = $data['user']['user_firstname'] . ' ' . $data['user']['user_lastname'];
                $data['user']['perusahaan_email'] = $this->input->post('email');
                $data['user']['perusahaan_password'] = sha1($this->input->post('pass'));
                $data['user']['perusahaan_alamat'] = $this->input->post('add');
                $data['user']['perusahaan_kodepos'] = $this->input->post('code');
                $data['user']['perusahaan_telp'] = $this->input->post('telp');
                $data['user']['perusahaan_tipe'] = $this->input->post('type');
                $f = $_FILES['npwp'];
                if($f==''){
                }else{
                    $config['upload_path']      = './asset/upload/npwp-company/';
                    $config['allowed_types']    = 'jpg|png';
                    $config['max_size']         = 2048;
                    $this->load->library('upload',$config);
        
                    if($this->upload->do_upload('npwp')){
                        $foto = $this->upload->data('file_name');
                    }else{
                        var_dump($_FILES['npwp']);
                        var_dump($this->upload->display_errors()); die();
                    }
                    $finalF = 'asset/upload/npwp-company/'.$foto;
                    $data['user']['perusahaan_npwp'] = $finalF;
                }
                $data['user']['perusahaan_status'] = '0';
                $data['user']['created_at'] = date_format(date_create('now'), 'Y:m:d H:i:s');
                $data['user']['updated_at'] = date_format(date_create('now'), 'Y:m:d H:i:s');
                $data['user']['perusahaan_id'] = uniqid('PE_');

                unset($data['user']['user_firstname']);
                unset($data['user']['user_lastname']);

                $res = $this->authUserModel->insertNewUser($data['table'], $data['user']);
                if($res){
                    $this->load->view('tpl/_header');
                    $this->load->view('success', $data);
                    $this->load->view('tpl/_footer');
                    //redirect('sendEmail');
                }
            }else {
                $this->load->view('tpl/_header');
                $this->load->view('registerPage4', $data);
                $this->load->view('tpl/_footer');
            }
            
        }
    }

    public function login(){
        $this->load->view('tpl/_header');
        $this->load->view('loginPage');
        $this->load->view('tpl/_footer');
    }
    public function logout(){
        $this->session->unset_userdata('compAktif');
        $this->login();
    }

    public function logoutUser(){
        $this->session->unset_userdata('userAktif');
        $this->login();
    }

    public function loginproses(){
        $this->load->model('authUserModel');
        $a = $this->input->post('em');
        $b = $this->input->post('pass');

        $res = $this->authUserModel->findUser($this->input->post('sbm'), $a, $b);

        if($res->num_rows() > 0){
            if($res->result_array()["user_status"] == -1){
                if($this->input->post('sbm') == 'auth_perusahaan'){
                    $this->session->set_userdata(array('compAktif' => array("data" => $res->result_array())));
                    $this->load->view('tpl/headerComp');
                    $this->load->view('company/landingCompany', array("data" => $res->result_array()));
                    $this->load->view('tpl/footerComp');
                }else if($this->input->post('sbm') == 'auth_user'){
                    $this->session->set_userdata(array('userAktif' => $res->result_array()));
                    $this->load->view('tpl/headerComp');
                    $this->load->view('user/landingUser');
                    $this->load->view('tpl/footerComp');
                }
            }else{
                $this->session->set_flashdata('err', 'Your account has not been verified yet, go check your email for verification.');
                redirect('login');
            }
        }else {
            $this->session->set_flashdata('err', 'Wrong Username / Password');
            redirect('login');
        }
    }

    public function verify($code){
        echo $code;
    }
}

?>