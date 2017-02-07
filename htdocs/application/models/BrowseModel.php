<?php
class BrowseModel extends CI_Model
{
    private static $conditions = 'pdxmouse.pdxKey,tumor.subtype,tumor.TNMstage,tumor.differentiation,tumor.type,
    tumor.HBV,tumor.HCV,patient.gender,patient.age,pdxmouse.resource,pdxmouse.method,tumor.tissue';
    private static $tableName = 'patient,pdxmouse,tumor';
    private static $drugName;
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    private function setSubtype($subtype)
    {
        if($subtype != '')
        {
           return ' and  tumor.subtype in(' . $subtype . ')';
        }
        else
        {
            return '';
        }
    }
    
    private function setResource($resource)
    {
        if($resource != '')
        {
            return ' and pdxmouse.resource in(' . $resource . ')';
        }
        else
        {
            return '';
        }
    }
    
    private function setTNMstage($TNMstage)
    {
        if($TNMstage != '')
        {
            return ' and tumor.TNMstage in(' . $TNMstage . ')';
        }
        else
        {
            return '';
        }
    }
    
    private function setGrade($grade)
    {
        if($grade != '')
        {
            return ' and tumor.differentiation in(' . $grade . ')';
        }
        else
        {
            return '';
        }
    }
    
    private function setVirus($virus)
    {
      if($virus != '')
      {
        $temp = explode(' ',$virus);
        $counts = 0;
       
        $result = '';
        foreach($temp as $i)
        {    
            if($i == 'HBV'||$i == 'HCV')
            { 
                $counts++;
                if($counts != 1)
                {
                    $result = $result . " or " . $i . "='positive'";
                }
                else
                {
                    $result = $result . $i . "='positive'";
                }
            }
            else
            {
                $counts++;
                $novirus = "(HBV in('negative','not available') and HCV in('negative','not available'))";
                if($counts != 1)
                {
                    $result = $result . " or " . $novirus;
                }
                else
                {
                    $result = $result . $novirus;
                }
            }
        }
        return ' and (' . $result . ')';
      }        
      else
      {
        return '';
      }
    }

    
    public function setConditions($subtype,$resource,$TNMstage,$virus,$grade)
    {
        $w = 'patient.patientKey=pdxmouse.patientKey and pdxmouse.patientKey=tumor.patientKey ';
        $w = $w.self::setSubtype($subtype).self::setResource($resource).self::setTNMstage($TNMstage).self::setVirus($virus).self::setGrade($grade);
        return $w;
    }
    public function getResult($w)
    {
        return $this->db->select(self::$conditions)->from(self::$tableName)->where($w)->get()->result_array();
    }
}