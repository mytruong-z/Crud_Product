<?php if(!defined('BASEPATH')) exit('No direct access script allowed');
class Client extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('upload','form_validation','session'));
        $this->load->model("product_model");
        $user_detail = $this->session->userdata('user_data_session');
        $this->load->helper(array('file','url','form'));
        if(!$this->session->userdata('logged_in')){
            redirect('user/login_Client','refresh');
        }
    }
    public function index(){
        $data['product'] = $this->product_model->getList();
        $this->load->view('user/index',$data);
    }
}