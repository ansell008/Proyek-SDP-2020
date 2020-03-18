<?php

class subCategoryModel extends CI_Model{
    public function getAll(){
        return $this->db->get('sub_category_admin');
    }

    public function insertSubCategory($data){
        $this->db->insert('sub_category_admin', $data);
    }
    public function getCategory(){
        $res = $this->db->query('SELECT * FROM category_admin');
        return $res->result();
    }

    public function deleteSubCategory($id){
        $this->db->where('sub_id', $id);
        $this->db->delete('sub_category_admin');
    }
    public function updateSubCategory($id, $name){
        $updateData = array(
            "sub_id" => uniqid($name),
            "sub_name" => $name
        );
        $this->db->where('sub_id',$id);
        $this->db->update('sub_category_admin',$updateData);
    }
}
?>