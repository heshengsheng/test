<?php
class Tools extends CI_Controller
{
    public function index()
    {
        $this->load->view("ToolsView.php");
        
    }
    public function fileUpload()
    {
      date_default_timezone_set('prc');
        $forIndex = "D:/xampp/htdocs/html/static/images/prediction/";
        $date =  "20".date('y-m-d');
        if (!file_exists("$forIndex$date")){
            mkdir("$forIndex$date");    
         }
      $fileName = "$date-".mt_rand(1000000,9999999).".txt";
      $filePath = "$forIndex$date/";
      $file = fopen("$forIndex$date/$fileName","w");    //create a new file
      fclose($file);
      exec("Rscript d:\\prediction.R $fileName $filePath",$log,$status);
     return "$date/$fileName";
      
    }
    
    public function PredictResult(){
         $data["filePath"] = self::fileUpload();
         $this->load->view("TRview.php",$data);
    }
}