<?php
class GR extends CI_Controller
{
    public function index()
    {
        $this->load->database();       
        $gene = $this->input->get('para',true);
        
        //$test = array("name"=>$subtype);
        $this->load->model("GeneModel");
        $result= $this->GeneModel->geneSql($gene);   //database query result       
            //$result = ["name"=>"heok"];
        echo json_encode($result);
    }
}