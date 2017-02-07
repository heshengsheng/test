<?php
class PdxModel extends CI_Model
{
     public function __construct()
    {
        parent::__construct();
        
        $this->load->database();
    }
    
    public function hasDrug($name)
    {
        return $this->db->select('*')->from('drug')->where("pdxKey='$name'")->get()->result_array();
    }
    
    public function pdxSql($name)
    {
        $conditions = 'pdxmouse.pdxKey,pdxmouse.ID,pdxmouse.resource,pdxmouse.freezing,
        pdxmouse.method,pdxmouse.expression,pdxmouse.mutation,pdxmouse.cnv,
        tumor.tissue,tumor.differentiation,tumor.subtype,tumor.TNMstage,tumor.HBV,tumor.HCV,
        patient.gender,patient.age';
        $table = 'patient,pdxmouse,tumor';
        $where = "patient.patientKey=pdxmouse.patientKey and pdxmouse.patientKey=tumor.patientKey and pdxmouse.pdxKey='$name'";
        $query = $this->db->select($conditions)->from($table)->where($where)->get()->result_array();
        return $query;
    }
}