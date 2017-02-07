<?php
class DR extends CI_Controller
{
    public function index()
    {
        $this->load->database();       
        $drug = $this->input->get('para',true);
        
        //$test = array("name"=>$subtype);
        $this->load->model("DrugModel");
        $w = $this->DrugModel->setConditions($drug);
        $result = $this->DrugModel->getResult($w);
        echo json_encode($result);
    }
}