<?php
class GeneModel extends CI_Model
{
     public function __construct()
    {
        parent::__construct();
        
        $this->load->database();
    }
    

    public function geneSql($name)
    {
        //$query = $this->db->query("select * from ngenezs where symbol='$name' UNION select * from ngenewx where symbol='$name'");
        $query1 = $this->db->select('*')->from('ngene1')->where("symbol='$name'")->get()->result_array();
        $query2 = $this->db->select('*')->from('ngene2')->where("symbol='$name'")->get()->result_array();
        $query = array_merge($query1,$query2);
        $result = self::toJsonResult($query);
        return $result;
    }
    private function toJsonResult($query)
    {
        global $result;
        $result  = array(["Model","Expression"]);
        foreach($query as $enters)
        {
            $geneMean = $enters['means'];
            $genesd = $enters['sds'];
            $allKeys = array_keys($enters);
            $num = count($allKeys);
            for($i=4;$i<$num;$i++)
            {
                $keys = $allKeys[$i];
                $value = $enters[$keys];
                $nValue = ((float)$value - (float)$geneMean)/(float)$genesd;
                $result[] = [$keys,$nValue];       
            }           
        }
      return $result;
    }
    
}