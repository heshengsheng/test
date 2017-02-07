<?php
class Search extends CI_Controller
{
    public function index()
    {
        $this->load->view("SearchView.php");
    }
    
    public function drug()
    {
         $para = $this->input->get("para",true);
         $this->load->view("DrugView");
    }
    
    public function model()
    {
        $para = $this->input->get("para",true);
        $this->load->model("PdxModel");
        $result1= $this->PdxModel->hasDrug($para);
        $result2 = $this->PdxModel->pdxSql($para);
        //print_r($result2);
        $data['result1'] = $result1;
        $data['result2'] = $result2;
        $this->load->view("PdxView",$data);
    }
    
    public function gene()
    {
        $gene = $this->input->get("para",true);
        $para['gene'] = $gene;
        $this->load->view("GeneView.php",$para);   
    }
    
    public function snp()
    {
        
        $name = $this->input->get("para",true);
        $para['name'] = $name;
        $this->load->view("SnpView.php",$para);   
    }
}