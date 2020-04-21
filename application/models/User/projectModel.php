<?php

class ProjectModel extends Ci_Model{
    public function loadAllProjects(){
        $query = "
        ";
        return $this->db->get("project")->result_array();
    }
}

?>