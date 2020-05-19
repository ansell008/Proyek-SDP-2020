<?php

class PaymentController extends Ci_Controller{
    public function __construct(){
        parent::__construct();
        $params = array('server_key' => 'SB-Mid-server-ltnIlVBaRuwFM3-JJSUCo7MP', 'production' => false);
        $this->load->library('midtrans');
        $this->load->library('veritrans');
        $this->midtrans->config($params);
        $this->veritrans->config($params);
    }

    public function token(){
        $this->load->model('company/CompanyModel', 'companyModel');
        $idProject = $this->input->post('idProject');

        $res = $this->companyModel->getProject($idProject);
        $pekerja = $this->companyModel->getPekerjaByProject($idProject);
        $count = $this->companyModel->getParticipantCount($idProject);
        $hari = date_diff(date_create($res[0]['project_mulai']), date_create($res[0]['project_deadline']));
        $company = $this->companyModel->getCompanyById($res[0]['perusahaan_id']);

        $transaction_details = array(
            'order_id' => rand(),
            'gross_amount' => (int)($res[0]['project_anggaran'] * $count[0]['jumlah'] * $hari->days)
        );

        $item_details = array();

        foreach($pekerja as $key => $value){
            $detail = array(
                "id" => $value['user_id'],
                'price' => $res[0]['project_anggaran'],
                'quantity' => $hari->days,
                'name' => $value['user_firstname'] . ' ' . $value['user_lastname']
            );
            $item_details[] = $detail;
        }

        $customer_details = array(
            'first_name'    => $company[0]['perusahaan_nama'],
            'email'         => $company[0]['perusahaan_email'],
            'phone'         => $company[0]['perusahaan_telp']
        );
        // echo "<pre>";
        // print_r($customer_details);
        // print_r($item_details);
        // print_r($transaction_details);


        // Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O",$time),
            'unit' => 'day', 
            'duration'  => 3
        );

        $enable_payments = array('cstore','gopay','bank_transfer','echannel');

        $transaction_data = array(
			'enabled_payments' => $enable_payments,
            'transaction_details'=> $transaction_details,
            'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

        error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
        echo $snapToken;
    }

    public function finish()
    {
    	$result = json_decode($this->input->post('result_data'));
    	echo 'RESULT <br><pre>';
    	var_dump($result);
    	echo '</pre>' ;

    }

    public function insertDataPayment(){
        $this->load->model("payment/PaymentModel", 'paymentModel');
        $data = json_decode($this->input->post("obj"),true);

        $dataHtrans = array(
            'status_code' => $data['status_code'],
            'transaction_id' => $data['transaction_id'],
            'payment_type' => $data['payment_type'],
            'order_id' => $data['order_id'],
            'grand_total' => $data['gross_amount'],
            'transaction_time' => $data['transaction_time'],
            'transaction_status' => $data['transaction_status']
        );

        if($data['payment_type'] == 'cstore'){
            $dataHtrans['payment_code'] = $data['payment_code'];
            $dataHtrans['pdf_url'] = $data['pdf_url'];
        }else if($data['payment_type'] == 'bank_transfer'){
            $dataHtrans['bank'] = $data['va_numbers'][0]['bank'];
            $dataHtrans['bca_va_number'] = $data['bca_va_number'];
            $dataHtrans['fraud_status'] = $data['fraud_status'];
            $dataHtrans['pdf_url'] = $data['pdf_url'];
        }else if($data['payment_type'] == 'echannel'){
            $dataHtrans['bill_key'] = $data['bill_key'];
            $dataHtrans['biller_code'] = $data['biller_code'];
            $dataHtrans['fraud_status'] = $data['fraud_status'];
            $dataHtrans['pdf_url'] = $data['pdf_url'];
        }else if($data['payment_type'] == 'gopay'){
            $dataHtrans['gopay_qr_code'] = 'https://api.sandbox.veritrans.co.id/v2/gopay/'.$data['transaction_id'].'/qr-code'; 
        }

        $id_prj = $this->input->post("prj_id");
        $id_transaksi = $this->paymentModel->getTransaksiId($id_prj)[0]['transaksi_id'];
        $res = $this->paymentModel->updateDataHtrans($dataHtrans, $id_transaksi);
        echo json_encode($dataHtrans);
    }

    public function getTransDetail(){
        $this->load->model("payment/PaymentModel", 'paymentModel');
        $id_prj = $this->input->post("prj_id");
        $id_transaksi = $this->paymentModel->getTransaksiId($id_prj)[0]['transaksi_id'];
        $res = $this->paymentModel->getDataTrans($id_transaksi);
        echo json_encode($res);
    }

    public function process()
    {
        $order_id = $this->input->post('ord_id');
        $data = $this->status($order_id);
        $this->changeStatus($data);
    	// $action = $this->input->post('action');
    	// switch ($action) {
		//     case 'status':
		//         $this->status($order_id);
		//         break;
		//     case 'approve':
		//         $this->approve($order_id);
		//         break;
		//     case 'expire':
		//         $this->expire($order_id);
		//         break;
		//    	case 'cancel':
		//         $this->cancel($order_id);
		//         break;
		// }

    }

    public function changeStatus($data){
        $this->load->model("payment/PaymentModel", 'paymentModel');
        $updateData = array(
            'transaction_status' => $data->transaction_status,
            'settlement_time' => $data->settlement_time
        );
        $id_transaksi = $this->paymentModel->getTransaksiId($data->transaction_id, 'transaction_id')[0]['transaksi_id'];
        $res = $this->paymentModel->getDataTrans($id_transaksi);
        $this->paymentModel->updateDataHtrans($updateData, $id_transaksi);
        echo json_encode($res);
    }

	public function status($order_id)
	{
        $res = $this->veritrans->status($order_id);
        return $res;
	}

	public function cancel($order_id)
	{
		echo 'test cancel trx </br>';
		echo $this->veritrans->cancel($order_id);
	}

	public function approve($order_id)
	{
		echo 'test get approve </br>';
		print_r ($this->veritrans->approve($order_id) );
	}

	public function expire($order_id)
	{
		echo 'test get expire </br>';
		print_r ($this->veritrans->expire($order_id) );
	}
}

?>