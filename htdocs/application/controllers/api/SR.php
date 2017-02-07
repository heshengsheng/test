<?php
class SR extends CI_Controller
{
    public function index()
    {
        $this->load->database();       
        $name = $this->input->get('para',true);
        
        $this->load->model("SnpModel");
        $title = $this->SnpModel->basicSql($name);
        //print_r($title);
        echo json_encode($title);
    }
}