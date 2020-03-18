<?php
class CategoryAdmin extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('admin/categoryModel');
    }
    public function index(){
        $this->load->view('tpl/header');
        $this->load->view('admin/categoryAdminView');
        $this->load->view('tpl/footer');
    }
    public function getAll(){
        echo json_encode($this->categoryModel->getAll()->result_array());
    }
    public function insertNewCategory(){
        $newData = $this->input->post();
        $newCategory = array(
            "category_id" => uniqid($newData['nameNewCategory']),
            "category_name" => $newData['nameNewCategory'],
            "created_at" => date("now"),
            "updated_at" => date("now")
        );
        $this->categoryModel->insertCategory($newCategory);
    }

    public function deleteCategory(){
        $id = $this->input->post('id');
        $this->categoryModel->deleteCategory($id);
    }

    public function updateCategory(){
        $updateData = $this->input->post();
        $id = $updateData['idCategoryUpdate'];
        $updateName = $updateData['nameCategoryUpdate'];
        $this->categoryModel->updateCategory($id,$updateName);
    }

}
?>