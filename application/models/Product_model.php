<?php
class Product_model extends CI_Model{
    protected $tbl_product = 'Product';
    protected $tbl_category = 'category';
    public function getList(){
        return $this->db->select('*')->from($this->tbl_product)->get()->result_array();
    }
    public function show_product_id($data){
        $this->db->select('*');
        $this->db->from('Product');
        $this->db->where('id',$data);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    public function update_product_id($id,$data){
        $this->db->where('id',$id);
        $this->db->update('Product',$data);
    }
    public function getCategory(){
        return $this->db->select('*')->from($this->tbl_category)->get()->result_array();
    }
}