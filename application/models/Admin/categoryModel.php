<?php

class CategoryModel extends CI_Model{
    public function getAll(){
        return $this->db->get('category_admin');
    }

    public function insertCategory($data){
        $this->db->insert('category_admin', $data);
    }

    public function deleteCategory($id){
        $this->db->where('category_id', $id);
        $this->db->delete('category_admin');
    }
    public function updateCategory($id, $name){
        $updateData = array(
            "category_id" => uniqid($name),
            "category_name" => $name
        );
        $this->db->where('category_id',$id);
        $this->db->update('category_admin',$updateData);
    }
}
?>