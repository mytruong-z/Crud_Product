<?php
class Client_model extends CI_Model{
    protected $tbl_user = 'users';
    public function getList(){
        return $this->db->select('*')->from($this->tbl_user)->get()->result_array();
    }
    public function show_user_id($data){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id',$data);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    public function update_user_id($id,$data){
        $this->db->where('id',$id);
        $this->db->update('users',$data);
    }
    public function getListSearch($info){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->like('username',$info);
        $query = $this->db->get();
        $result1 = $query->result();
        $result = json_decode(json_encode($result1), True);
        return $result;
    }
}