<?php
class Product extends CI_Model{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->proTable = 'product';
        $this->custTable = 'customers';
        $this->ordTable = 'orders';
        $this->ordItemsTable = 'order_items';
    }

    public function getRows($id =''){
        $this->db->select('*');
        $this->db->from($this->proTable);
        if($id){
            $this->db->where('id',$id);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            $this->db->order_by('name','asc');
            $query = $this->db->get();
            $result = $query->result_array();
        }
        return !empty($result)?$result:false;
    }
}