<?php defined('BASEPATH') OR exit('No direct script access allowed');
 class Crud_user extends CI_Controller{
     public function __construct()
     {
         parent::__construct();
         $this->load->database();
         $this->load->library('form_validation');
         $this->load->library('session');
         $this->load->model('client_model');
         $this->load->helper(array('form','file','url'));
         $user_detail = $this->session->userdata('user_data_session');
         if (!$this->session->userdata('logged_in')) {
             redirect('admin/login', 'refresh');
         }elseif($this->session->userdata('logged_in') && $user_detail['user_type'] ==='user' ) {
             // redirect('user/category/index');
             redirect('user/Client', 'refresh');
         }
         /*  if(!$this->session->userdata('logged_in')){
               redirect('admin/login','refresh');
          }elseif($this->session->userdata('logged_in') && $user_detail['user_type'] !='admin' ) {
               // redirect('user/category/index');
               redirect('user/Client', 'refresh');
           } */
     }

     public function add(){
         if($this->input->post("btnadd")){
             $data['username'] = $this->input->post("username");
             $data['email'] = $this->input->post("username");
             $data['last_name'] = $this->input->post("last_name");
             $data['first_name'] = $this->input->post("first_name");
             $data['user_type'] = $this->input->post("user_type");
             $data['password'] = $this->input->post("password");
             $this->form_validation->set_rules("username",'Username','required|min_length[3]');
             $this->form_validation->set_rules("email",'Email','required|valid_email');
             $this->form_validation->set_rules("last_name",'Last Name','required');
             $this->form_validation->set_rules("first_name",'First Name','required');
             if($this->form_validation->run()==true){
                 if($this->db->insert("users",$data)){
                     redirect('admin/Crud_user/show_user_id');
                 }
             }
         }
         $this->load->view('client/add');
     }
     public function show_user_id(){
         $this->load->helper(array('form','file','url'));
          $id = $this->uri->segment(4);
         $data['client'] = $this->client_model->getList();
         $data['single_client'] = $this->client_model->show_user_id($id);
         $data['content'] = 'user';
         $this->load->view('client/index',$data);
     }
     public function update_user_id(){
         $id = $this->input->post('id');
         if($this->input->post('dsubmit')){
             $data['username'] = $this->input->post("username");
             $data['email'] = $this->input->post("email");
             $data['last_name'] = $this->input->post("last_name");
             $data['first_name'] = $this->input->post("first_name");
             $data['user_type'] = $this->input->post("user_type");
             $data['password'] = $this->input->post("password");
         }
         $this->client_model->update_user_id($id,$data);
         redirect('admin/Crud_user/show_user_id');
     }
     public function delete($id){
         $this->db->where("id",$id);
         $this->db->delete('users');
         redirect('admin/Crud_user/show_user_id');
     }
 }