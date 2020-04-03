<?php

class AuthUser extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('session');
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
        $this->form_validation->set_rules('ktp', 'KTP', 'required|exact_length[16]',
            array(
                "required" => "KTP field cannot empty",
                "exact_length" => "Must provide a valid KTP number"
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
            $data['user']['user_password'] = $this->input->post('pass');
            $data['user']['user_ktp'] = $this->input->post('ktp');
            $data['user']['created_at'] = date_format(date_create('now'), 'Y:m:d H:i:s');
            $data['user']['updated_at'] = date_format(date_create('now'), 'Y:m:d H:i:s');
            $data['user']['user_id'] = uniqid('US_');

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
        $this->form_validation->set_rules('npwp', 'NPWP', 'required',
            array(
                "required" => "NPWP field cannot empty"
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
            $data['user'] = json_decode($this->input->post('data'), true);
            $data['user']['perusahaan_nama'] = $data['user']['user_firstname'] . ' ' . $data['user']['user_lastname'];
            $data['user']['perusahaan_email'] = $this->input->post('email');
            $data['user']['perusahaan_password'] = $this->input->post('pass');
            $data['user']['perusahaan_alamat'] = $this->input->post('add');
            $data['user']['perusahaan_telp'] = $this->input->post('telp');
            $data['user']['perusahaan_tipe'] = $this->input->post('type');
            $data['user']['perusahaan_npwp'] = $this->input->post('npwp');
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
            }
        }
    }

    public function login(){
        $this->load->view('tpl/_header');
        $this->load->view('loginPage');
        $this->load->view('tpl/_footer');
    }

    public function loginproses(){
        $this->load->model('authUserModel');
        $a = $this->input->post('em');
        $b = $this->input->post('pass');

        $res = $this->authUserModel->findUser($this->input->post('sbm'), $a, $b);

        if($res->num_rows() > 0){
            if($this->input->post('sbm') == 'auth_perusahaan'){
                $this->load->view('tpl/_header');
                $this->load->view('company/landingCompany', array("data" => $res->result_array()));
                $this->load->view('tpl/_footer');
                $this->session->set_userdata(array('compAktif' => array("data" => $res->result_array())));
            }
            
        }else {
            echo "gagal";
        }
    }
}

?>