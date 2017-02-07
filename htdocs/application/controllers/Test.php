<?php
class Test extends CI_Controller
{  
    public function index()
    {
        date_default_timezone_set('prc');
        $forIndex = "D:/xampp/htdocs/html/static/images/heatmap/";
        $date =  "20".date('y-m-d');
        if (!file_exists("$forIndex$date")){
            mkdir("$forIndex$date");    
         }
       $fileName = "$date-".mt_rand(1000000,9999999).".txt";
       $filePath = "$forIndex$date/";
      //$fileName = "d:\\2016-0630\\2016-06-30-5677895.txt";
      $file = fopen("$forIndex/$date/$fileName","w");
        $profile = $this->input->get('profile',true);
        if($profile == "Mutations in driver genes"){
            $profile = "Mutation";
        }else if($profile == "Copy-number alterations"){
            $profile = "CNV";
        }
        $result = self::profileData();
        $data["profile"] = $profile;
        $data["dataSet"] = $this->input->get('dataset',true);
        if($profile == 'Expression'){
             $data["gene"] = explode("FF&FF",$result)[0];
             fwrite($file,explode("FF&FF",$result)[1]);
        }else{
            $data["gene"] = "";
             fwrite($file,$result);
        }
       fclose($file);
      // System("Rscript d:\\$profile.R $fileName $filePath");
      exec("Rscript d:\\$profile.R $fileName $filePath",$log,$status);
       if($status == 0){
            $path = "/static/images/heatmap/$date/".str_replace(".txt",".png",$fileName);
            $data["path"] = $path;
            $this->load->view("TestView",$data);
       }else{
            echo "The input gene symbols list ERROR! Enter again!";
       }
    }
    public function fileUpload()
    {
      $file_info = $_FILES['file1'];
      $contents = file_get_contents($file_info['tmp_name']);
      $data['genes'] = $contents;
      //$this->load->model("HeatMap",$data);
      echo json_encode(['file_infor'=>$contents]);
    }  
    public function profileData()
    {
        $dataset = $this->input->get('dataset',true);
        $table = '';
        if($dataset == 'DataSet1')
        {
            $table = '1';
        }else if($dataset == 'DataSet2'){
            $table = '2';
        }else if($dataset == 'DataSet3'){
            $table = '3';
        }
        $profile = array();
        $profile = $this->input->get('profile',true);
        $mutationGene = "('".join("','",explode(',',$this->input->get('mutationGene',true)))."')";
        $genes = str_replace(",", " ", $this->input->get('genes',true));
        $genes = substr($genes,0,strlen($genes)); 
        $genes = "('".join("','",explode(' ',$genes))."')";  
        $this->load->model("HeatMapModel");
        $tempResult = array();     //store the query result
        if($profile == 'Expression')
        {
            $tempResult['Expression'] = $this->HeatMapModel->expressionData($genes,$table);
            return $tempResult['Expression'];
        }else if($profile == 'Copy-number alterations'){
            $tempResult['CNV'] = $this->HeatMapModel->cnvData($genes,$table);
        }else{
            if($dataset == 'DataSet1')
            {
                $table = $table.'_2';
            }
            $tempResult['Mutation'] = $this->HeatMapModel->mutationData($mutationGene,$table);
        }
        $result = self::conbinationData($tempResult,$dataset);
      //header("Content-Type: application/vnd.ms-excel; charset=GB2312");
       //return json_encode([$tempResult['Expression']]);
      //return mb_convert_encoding($result,"UTF-8");
      return $result;
    }
     
    private function conbinationData($data,$dataset)
    {
        if(array_key_exists('Expression',$data))
        {
            $result = "";
            $expression = $data['Expression'];
            $keys = array_keys($expression[0]);
            foreach($keys as $model){
                $result = $result."\t".$model;
            }
            $result = $result."\n";
             foreach($expression as $e)
            {
                $gene = $e['symbol'];
                $result = $result."\t$gene";
                 unset($e['symbol']);
                foreach($e as $key => $val){
                    $result = $result."\t$val";
                }
                 $result = $result."\n";
            }
            return $result;
        }else if(array_key_exists('CNV',$data))
        {
            $cnv = $data['CNV'];
            $result = "Model"."\t"."Symbol"."\t"."CNV";
            foreach($cnv as $c)
            {
                $gene = $c['symbol'];
                unset($c['symbol'],$c['cnvKey']);
                foreach($c as $key => $val){
                    if($val == 0){
                        $val = '-';
                    }
                    $result = $result."\n".$key."\t".$gene."\t".$val;
                }
            }
            return $result;         
        }else if(array_key_exists('Mutation',$data))
        {
            
            $mutation = $data['Mutation'];
            
            $genes = ["ACVR2A","ADH1B","ALB","APOB","ARID1A","ARID2","AXIN1","BAP1","BRD7",
                    "CCND1","CDKN1A","CDKN2A","CDKN2B","CTNNB1","CYP2E1","EEF1A1","FCRL1",
                    "FGF19","G6PC","GALNT11","GRXCR1","HIST1H1C","HNF1A","HNRNPA2B1",
                    "IDH1","IL6ST","IRX1","KIF19","LCE1E","MAP2K3","MEN1","NCOR1","NFE2L2",
                    "PDX1","PTEN","RB1","RPS6KA3","SOCS6","SRCAP","TERT","TMEM99","TP53",
                    "TRPA1","TSC1","TSC2"];
            $models1 = ["PD0082_F1","PD0097_F2","PD0042_F3","PD0051_F3","PD0058_F3",
                        "PD0059_F3","PD0060_F3","PD0062_F3","PD0065_F3","PD0069_F3",
                        "PD0070_F3","PD0073_F3","PD0077_F3","PD0084_F3","PD0085_F3",
                        "PD0086_F3","PD0087_F3","PD0089_F3","PD0090_F3","PD0091_F3",
                        "PD0092_F3","PD0096_F3","PD0099_F3","PD0100_F3","PD0101_F3",
                        "PD0105_F3","PD0041_F4","PD0043_F4","PD0044_F4","PD0048_F4",
                        "PD0049_F4","PD0050_F4","PD0052_F4","PD0053_F4","PD0054_F4",
                        "PD0055_F4","PD0056_F4","PD0057_F4","PD0063_F4","PD0064_F4",
                        "PD0068_F4","PD0072_F4","PD0074_F4","PD0075_F4","PD0076_F4",
                        "PD0079_F4","PD0081_F4","PD0083_F4","PD0093_F4","PD0095_F4",
                        "PD0098_F4","PD0102_F4","PD0103_F4","PD0045_F5","PD0046_F5",
                        "PD0047_F5"];
            $models2 = ["PD0107_F2","PD0107_F2","PD0109_F2","PD0106_F2","PD0022_F2",
                        "PD0110_F2","PD0106_F2","PD0106_F2","PD0107_F2","PD0018_F2",
                        "PD0111_F2","PD0003_F2","PD0022_F2","PD0022_F2","PD0022_F2",
                        "PD0017_F2","PD0017_F2","PD0003_F2","PD0018_F2","PD0022_F2",
                        "PD0029_F2","PD0107_F2","PD0109_F2","PD0003_F2","PD0027_F2",
                        "PD0022_F2","PD0003_F2"];
            $models = array();
            if($dataset == 'DataSet2'){
                $models = $models1;
            }elseif($dataset == 'DataSet1'){
                $models = $models2;
            }
            $result = "Model\tSymbol\tMutation";
            $tempResult = "";
           
            foreach($models as $model){     
                foreach($genes as $gene){
                     $hasGene = false;
                    foreach($mutation as $m){
                        if(array_search($model,$m)&&array_search($gene,$m)){
                            $result = $result."\n".join("\t",array_values($m));
                            $hasGene = true;
                           
                        }
                    
                    }
                    if(!$hasGene){
                        $tempResult = $tempResult."\n".$model."\t".$gene."\t"."-";
                    }
                }
            }
            return $result.$tempResult;
            
        }
    }
}