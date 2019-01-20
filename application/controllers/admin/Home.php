<?php if(!defined('BASEPATH')) exit('No direct access script allowed');
class Home extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url','file'));
        $this->load->library('form_validation');
        $this->load->model('Home_model');
        $this->load->library('session');
        $user_detail = $this->session->userdata('user_data_session');
        //to protect the controller to be accessed only by registered users
        if (!$this->session->userdata('logged_in')) {
            redirect('admin/login', 'refresh');
        }elseif($this->session->userdata('logged_in') && $user_detail['user_type'] !=='admin' ) {
            // redirect('user/category/index');
            redirect('user/Product_filter', 'refresh');
        }
    }
    public function index()
    {

        $data['revenue'] = $this->Home_model->getList();
        $total = 0;
        foreach ($data['revenue'] as $item){
            $id = $item['product_id'];
            $total += $item['sub_total'];
            }

        /*$data['product_name'] = $this->Home_model->getNameProduct($id);
        foreach ($data['product_name'] as $item){

        }*/
        $data['total'] = $total;
        $data['content'] = 'dashboard';
        $this->load->view('admin/base_view', $data);
    }
}