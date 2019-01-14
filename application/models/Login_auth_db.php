<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Login_auth_db extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function login($email,$password){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email',$email);
        $this->db->where('password',$password);
        $query = $this->db->get()->row();
        if(!empty($query)){
            return true;
        }
        return false;
    }
    function get_user_data($email){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email',$email);
        $query = $this->db->get();
        $user_data = array(
            'username'	=> $query->row('username'),
            'email'	=> $query->row('email'),
            'user_type'=>$query->row('user_type')

        );
        return $user_data;
    }
}