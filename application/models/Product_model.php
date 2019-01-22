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
    public function getSearch($data){
        $this->db->select('*');
        $this->db->from('Product');
        $this->db->like('name',$data);
        $query = $this->db->get();
        $result = $query->result();
        return $result;

    }
    public function getListSearch($info){
        $this->db->select('*');
        $this->db->from('Product');
        $this->db->like('name',$info);
        $query = $this->db->get();
        $result = $query->result();
        $result1 = json_decode(json_encode($result), True);
        return $result1;
    }
    public function getPrice($data1,$data2){
        $this->db->select('*');
        $this->db->from('Product');
        $array = array( 'price <' => $data2, 'price >' => $data1);
        $this->db->where($array);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    public function getPriceUp(){
        $this->db->select('*');
        $this->db->from('Product');
        $this->db->order_by('price','ASC');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    public function getPriceDown(){
        $this->db->select('*');
        $this->db->from('Product');
        $this->db->order_by('price','DESC');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    public function getBrandPrice($data3){
        $this->db->select('*');
        $this->db->from('Product');
        $like_statements = array();
        foreach($data3 as $value) {
            $like_statements[] = "name LIKE '%" . $value . "%'";
        }
        $like_string = "(" . implode(' OR ', $like_statements) . ")";
     //   $array = array('price <' => $data2, 'price >' => $data1,$like_string);
        $this->db->where($like_string);
        $query = $this->db->get();
        $result = $query->result();
        $result2 = json_decode(json_encode($result), True);
        return $result2;



    }
}