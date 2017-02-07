<?php
class Drug_model extends CI_Model
{
    private static $table_name = 'drug';
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->database();
    }
    
    
    public function set_select($select = '*')
    {
        $this->db->select($select);
        return $this->db;
    }
    
    
    public function get_results()
    {
        return $this->db->from(self::$table_name)->get()->result_array();
    }
}