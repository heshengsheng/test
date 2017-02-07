<?php
class HeatMap extends CI_Controller
{
    public function index()
    {
        $this->load->view("HeatMapView2.php");   //data were sperated into three part
    }
    
    public function twoDataSet(){
         $this->load->view("HeatMapView2.php"); 
    }
    
    public function profile()
    {
      //$dataset = $this->input->get('dataset',true);
      //echo $dataset;
      $this->load->view("HRview.php");
    }
}