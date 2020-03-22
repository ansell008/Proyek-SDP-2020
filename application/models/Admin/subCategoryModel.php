<?php

class subCategoryModel extends CI_Model{
    public function getAll(){
        return $this->db->get('sub_kategori');
    }

    public function insertSubCategory($data){
        $this->db->insert('sub_kategori', $data);
    }
    public function getCategory(){
        $res = $this->db->query('SELECT * FROM category_admin');
        return $res->result();
    }

    public function deleteSubCategory($id){
        $this->db->where('sub_kategori_id', $id);
        $this->db->delete('sub_kategori');
    }
    public function updateSubCategory($id, $name){
        $updateData = array(
            "sub_kategori_id" => uniqid($name),
            "sub_kategori_nama" => $name
        );
        $this->db->where('sub_kategori_id',$id);
        $this->db->update('sub_kategori',$updateData);
    }
}
?>