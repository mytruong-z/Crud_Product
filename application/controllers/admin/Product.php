<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('upload','form_validation','session'));
        $this->load->model("product_model");
        $user_detail = $this->session->userdata('user_data_session');
        $this->load->helper(array('file','url','form'));
        if(!$this->session->userdata('logged_in')){
            redirect('admin/login','refresh');
        } elseif($this->session->userdata('logged_in') &&$user_detail['user_type'] ==='user' ) {
            // redirect('user/category/index');
            redirect('user/Client', 'refresh');
        }
    }
    public function show_product_id(){
        $id = $this->uri->segment(4);
        $data['product'] = $this->product_model->getList();
        $data['single_product'] = $this->product_model->show_product_id($id);
        $data['content'] = 'modules';
        $this->load->view('product/index',$data);
    }
    public function add(){
        $data2['category'] = $this->product_model->getCategory();
        if($this->input->post("btnaddP")){
            $data['name'] = $this->input->post('name');
            $data['category_id'] = $this->input->post('category_id');
            $data['price']=$this->input->post('price');
            $this->form_validation->set_rules('name','Name ProductCart','required|min_length[3]');
            $this->form_validation->set_rules('price','Price','required|numeric');
            $this->form_validation->set_rules('category_id','Category_id','required|numeric');
            if($this->form_validation->run()==true){
                $info = pathinfo($_FILES['image']['name']);
                $ext = $info['extension'];
                $img_path = '/Applications/XAMPP/htdocs/Category_Product/images/products/'.time().'.'.$ext;
                $data['image'] = basename($img_path);
                if(move_uploaded_file($_FILES['image']['tmp_name'],$img_path)){
                    if($this->db->insert('product',$data)){
                        redirect('admin/product/show_product_id');
                    }
                    print_r($img_path);
                    die;
                }else{
                    print_r('false upload');
                    die;
                }
            }
        }
        $this->load->view('product/add',$data2);
    }
    public function update_product_id(){
        $id = $this->input->post('id');
        $image_now = $this->input->post('name_image');
        if($this->input->post('dsubmit')){
            $data['name'] = $this->input->post('name');
            $data['category_id'] = $this->input->post('category_id');
            $data['price'] = $this->input->post('price');
            if(isset($_FILES['image']['tmp_name'])&& !empty($_FILES['image']['tmp_name'])){
                $info = pathinfo($_FILES['image']['name']);
                $ext = $info['extension'];
                $image_save1 = 'images/products/'.time().'.'.$ext;
                unlink('images/products/'.$image_now);
                move_uploaded_file($_FILES['image']['tmp_name'],$image_save1);
                $image_save  = basename($image_save1);
                $data['image'] = $image_save;
            }
            $this->product_model->update_product_id($id,$data);
            redirect('admin/product/show_product_id');
        }
    }
    public function delete_product($id){
        $image = $this->db->get_where('product',array('id'=> $id))->row()->image;
       /* print_r($image);
        die; */
        $this->db->where("id",$id);
        $this->db->delete('product');
        unlink('images/products/'.$image);
        redirect('admin/product/show_product_id');
    }
}