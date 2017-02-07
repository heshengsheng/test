<?php
class SnpModel extends CI_Model
{
     public function __construct()
    {
        parent::__construct();
        
        $this->load->database();
    }
    
    public function basicSql($name)
    {
        $temp= $this->db->select('*')->from('mutationzs')->where("ID='$name'")->get()->result_array();
        $query = $temp[0];
        $titleInfo = array();
        $titleInfo["symbol"] = $query['symbol'];
        $titleInfo["func"] = $query['func'];
        $titleInfo["chrom"] = $query['chrom'];
        $titleInfo["pos"] = $query['pos'];
        $titleInfo["ref"] = $query['ref'];
        $titleInfo["alt"] = $query['alt'];
        $keys = array_keys($query);
        $nums = count($keys);
        $w = '';
        for($i=9;$i<$nums;$i++)
        {
            $model = $keys[$i];
            $value = $query[$model];
            $modelKey = explode('_F',$model)[0];
            if($value == '0/1')
            {
                $titleInfo[$modelKey] = $titleInfo["ref"].$titleInfo["alt"];
                $w = "$w,'$modelKey'";
            }
            else if($value == '1/1')
            {
                $titleInfo[$modelKey] = $titleInfo["alt"].$titleInfo["alt"];
                $w = "$w,'$modelKey'";
            }else if($value == '0/0'){
                $titleInfo[$modelKey] = $titleInfo["ref"].$titleInfo["ref"];
                $w = "$w,'$modelKey'";
            }
        }
        $w = "(".substr($w,1).")";
        //以上为获得查询rs号突变的模型及其基本信息
        $clickInfo = self::snpSql($w);
        $result = array();
        foreach($clickInfo as $entery)
        {
            $ID = $entery['ID'];
            $entery["geneType"]= $titleInfo[$ID];
            $passage = explode('F',$entery['mutation']);
            for($i=1;$i<count($passage);$i++)
            {
                $temp = $entery;
                $temp["passage"] = "F$passage[$i]";
                unset($temp['mutation']);
                $result[] = $temp;
            }       
        }
        $allResult = array();
        $allResult[] = $titleInfo;
        $allResult[] = json_encode($result);
        return $allResult;
    }
    
    private function snpSql($model)
    {
        $conditions  = "pdxmouse.pdxKey,pdxmouse.ID,pdxmouse.mutation,pdxmouse.method,
        tumor.tissue,tumor.TNMstage,tumor.differentiation,tumor.HBV,tumor.HCV,pdxmouse.resource,tumor.subtype";
        $table = 'pdxmouse,tumor';
        $w = "pdxmouse.patientKey=tumor.patientKey and pdxmouse.ID in $model";
        return $this->db->select($conditions)->from($table)->where($w)->get()->result_array();
    }
}