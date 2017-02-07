<?php
class Pdx extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        $data = [
            "title" => [
                "title" => [
                    "title" => 'Welcome!',
                ],
            ],
            "title2" => "welcome",
        ];
        $this->_test();
        $this->load->view("test", $data);
    }
    
    private function _test()
    {
        echo "it works!";
    }
    
    public function test()
    {
        //$this->load->database();
        //$id = $this->input->get("id", true);
        //$where = [
        //    'drugKey' => $id,
        //];
        //
        //$query = $this->db->select('*')
        //                  ->from('drug')
        //                  ->where($where)
        //                  ->order_by('drugKey', 'desc')
        //                  ->limit(10)
        //                  ->get()
        //                  ->result_array();
        //print_r($query);
        //echo $query;
        //foreach ($query as $item) {
        //    var_dump($item);
        //    echo '<br />';
        //}
        
        
        $this->load->model("drug_model");
        
        print_r($this->drug_model->set_select("drugKey")->from("drug")->get()->result_array());
        
        //print_r($this->drug_model->get_results());
        
    }
    
    public function about_us()
    {
        echo "about us!";
    }
    
    
    public function search()
    {
        $id = trim($this->input->get("id", true));
        header("Content-Type: application/xml");
        echo "<root>", $id, "</root>";
    }
}