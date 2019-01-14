<?php
 class Category_model extends CI_Model{
     protected $tbl_category = 'category';
     public function getList(){
         return $this->db->select('*')->from($this->tbl_category)->get()->result_array();
     }
     public function show_category_id($data){
         $this->db->select('*');
         $this->db->from('category');
         $this->db->where('id',$data);
         $query = $this->db->get();
         $result = $query->result();
         return $result;
     }
     public function update_category_id($id,$data){
         $this->db->where('id',$id);
         $this->db->update('category',$data);
     }
 }