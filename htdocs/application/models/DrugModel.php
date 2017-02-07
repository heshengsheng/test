<?php
class DrugModel extends CI_Model
{
     private static $conditions = 'pdxmouse.pdxKey,drug.drug,drug.passage,drug.TGI,
               drug.unit,drug.modes,drug.unitInterval,drug.duration,tumor.tissue,tumor.differentiation,
               tumor.subtype,tumor.TNMstage,tumor.HBV,tumor.HCV,pdxmouse.resource,';
    private static $tableName = 'pdxmouse,drug,tumor';
    public function __construct()
    {
        parent::__construct();
        
        $this->load->database();
    }
    
    public function setConditions($para)
    {
        $w = "pdxmouse.patientKey=tumor.patientKey and pdxmouse.pdxKey=drug.pdxKey and drug.drug='".$para."'";
        return $w;
    }
     public function getResult($w)
    {
        return $this->db->select(self::$conditions)->from(self::$tableName)->where($w)->get()->result_array();
    }
}