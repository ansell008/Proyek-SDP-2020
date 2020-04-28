<?php

class PaymentModel extends Ci_Model{

    public function updateDataHTrans($data, $id){
        $this->db->update("htrans", $data, array("transaksi_id" => $id));
    }

    public function getTransaksiId($idProject, $field = 'project_id'){
        $query = "SELECT transaksi_id FROM htrans WHERE $field = '$idProject'";
        return $this->db->query($query)->result_array();
    }

    public function getDataTrans($idTrans){
        return $this->db->get_where('htrans', array("transaksi_id" => $idTrans))->result_array();
    }

    public function getDataTransObj($idTrans){
        return $this->db->get_where('htrans', array("transaksi_id" => $idTrans))->result();
    }

}

?>