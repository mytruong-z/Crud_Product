
<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('product');
        $this->load->helper(array('form','url'));
    }
    public function index(){

        $this->load->view('cart/index');
    }
}