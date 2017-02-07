<?php
class HeatMapModel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function expressionData($genes,$table)
    {
        $query = $this->db->select('*')->from("ngene$table")->where("symbol in $genes")->get()->result_array();
         $geneArray =  str_replace('\'',"",explode(",",substr($genes,1,strlen($genes)-2)));
         $queryName = array();  //store all tha gene name which had expression value
         $noValueGene ="";         
         $head = "";
         if(count($query) !=0){
             $allKeys = array_keys($query[0]);
             array_splice($allKeys,array_search('geneKey',$allKeys),1);
             array_splice($allKeys,array_search('means',$allKeys),1);
             array_splice($allKeys,array_search('sds',$allKeys),1);
             array_splice($allKeys,array_search('symbol',$allKeys),1);
             $head = implode("\t",$allKeys);
         }
         $result = "symbol"."\t".$head."\n";
        for($j=0;$j<count($query);$j++)   //计算z-score
        {
            $item = $query[$j];
            $geneName = $item['symbol'];
            $queryName[strtoupper($geneName)] = $geneName;
             $geneMean = $item['means'];
             $genesd = $item['sds'];
             $temp = $geneName;
             foreach($allKeys as $i){
                $value = $item[$i];
                $nValue = ((float)$value - (float)$geneMean)/(float)$genesd;
                $temp = $temp."\t"."$nValue";
             }
             $result = $result.$temp."\n";
        }
        foreach($geneArray as $gene){
               if(!array_key_exists(strtoupper($gene),$queryName)&&$gene!=""){
                 $noValueGene  = $noValueGene."\t".$gene;
               }
        }     
        return $noValueGene."FF&FF".$result;
    }
    
    public function cnvData($genes,$table)
    {
        $query = $this->db->select('*')->from("cnv$table")->where("symbol in $genes")->get()->result_array();
        return $query;
    }
    
    public function mutationData($mutationGene,$table)
    {
        $query = $this->db->select('*')->from("mutation$table")->where("symbol in $mutationGene")->get()->result_array();
      
        $result = array();
         for($j=0;$j<count($query);$j++)
         {
            $item = $query[$j];
            $func = $item['exonFunc'];
            $ID = $item['ID'];
            $symbol = $item['symbol'];
            if($func == "frameshift insertion"||$func =="frameshift deletion")
            {
                $result[$j] = ["ID"=>$ID,"symbol"=>$symbol,"type"=>'0'];
            }else if($func == 'nonsynonymous SNV'){
                $result[$j] = ["ID"=>$ID,"symbol"=>$symbol,"type"=>'1'];
            }else if($func == 'stopgain SNV'){
                $result[$j] = ["ID"=>$ID,"symbol"=>$symbol,"type"=>'2'];
            }else{
                $result[$j] = ["ID"=>$ID,"symbol"=>$symbol,"type"=>'-'];
            }
         }
         return $result;
    }
}