<?php

class PaymentController extends Ci_Controller{
    public function __construct(){
        parent::__construct();
        $params = array('server_key' => 'SB-Mid-server-ltnIlVBaRuwFM3-JJSUCo7MP', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
    }

    public function token(){
        $this->load->model('company/companyModel');
        $idProject = $this->input->post('idProject');

        $res = $this->companyModel->getProject($idProject);
        $pekerja = $this->companyModel->getPekerjaByProject($idProject);
        $count = $this->companyaModel->getParticipantCount($idProject)

        $transaction_details = array(
            'order_id' => rand(),
            'gross_amount' => $res[0]['project_anggaran'] * $count[0]['jumlah'] *
        );

        $item_details = array();

        foreach($pekerja as $key => $value){
            $detail = array(
                "id" => $value['user_id'],
                'price' => 20000,
                'quantity' => 2,
                'name' => "Orange"
            );
        }

        $customer_detail = array(
            'first_name'    => $value['user_firstname'],
            'last_name'     => $value['user_lastname'],
            'email'         => $value['user_email'],
            'address'         => $value['user_address']
        );


    }
}

?>