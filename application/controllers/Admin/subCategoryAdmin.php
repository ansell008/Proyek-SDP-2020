<?php
class SubCategoryAdmin extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('admin/subCategoryModel');
    }
    public function index(){
        $data['category'] = $this->subCategoryModel->getCategory();
        $this->load->view('tpl/header',$data);
        $this->load->view('admin/subCategoryAdminView',$data);
        $this->load->view('tpl/footer',$data);
    }
    public function getAll(){
        echo json_encode($this->subCategoryModel->getAll()->result_array());
    }
    public function insertNewSubCategory(){
        $newData = $this->input->post();
        $newCategory = array(
            "sub_id" => uniqid($newData['nameNewCategory']),
            "sub_name" => $newData['nameNewCategory'],
            "fk_category_id" => $newData['categoryName'],
            "created_at" => date("now"),
            "updated_at" => date("now")
        );
        $this->subCategoryModel->insertSubCategory($newCategory);
    }

    public function deleteSubCategory(){
        $id = $this->input->post('id');
        $this->subCategoryModel->deleteSubCategory($id);
    }

    public function updateSubCategory(){
        $updateData = $this->input->post();
        $id = $updateData['idCategoryUpdate'];
        $updateName = $updateData['nameCategoryUpdate'];
        $this->subCategoryModel->updateSubCategory($id,$updateName);
    }

}




?>