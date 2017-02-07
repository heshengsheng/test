<?php
class BR extends CI_Controller
{
    public function index()
    {
        $this->load->database();       
        $subtype = $this->input->get('subtype',true);
        $virus = $this->input->get('virus',true);
        $resource = $this->input->get('resource',true);
        $TNMstage = $this->input->get('TNMstage',true);
         $grade = $this->input->get('grade',true);
        //$test = array("name"=>$subtype);
        $this->load->model("BrowseModel");
        $w = $this->BrowseModel->setConditions($subtype,$resource,$TNMstage,$virus,$grade);
        $result = $this->BrowseModel->getResult($w);
        echo json_encode($result);
    }
}


        
        //$this->load->model("BrowseModel");
        //$w = $this->BrowseModel->setConditions($subtype,$resource,$TNMstage,$virus);
        //$result = $this->BrowseModel->getResult($w);
        //echo count($result);