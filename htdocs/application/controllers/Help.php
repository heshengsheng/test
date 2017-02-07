<?php
class Help extends CI_Controller
{
    public function index()
    {
        $this->load->view('HelpView');
    }
    
    public function introduction()
    {
       $this->load->view('IntroductionView.php');
    }
    
     public function dataSet()
    {
       $this->load->view('DataSetView.php');
    }
    
    public function webPage()
    {
       $this->load->view('WebPageView.php');
    }
}