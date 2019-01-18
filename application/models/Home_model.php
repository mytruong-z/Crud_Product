<?php
class Home_model extends CI_Model{
    protected $tbl_order = 'order_items';
    protected $tbl_category = 'product';
    public function getList(){
        return $this->db->select('*')->from($this->tbl_order)->get()->result_array();
    }
   /* public function getNameProduct($data){
        return $this->db->select('*')->from($this->tbl_category)->where('id',$data)->get('')->result_array();
    }*/
}