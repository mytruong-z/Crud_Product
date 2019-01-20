
<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('cart','form_validation'));
        $this->load->model('Product_cart');
        $this->load->library('form_validation');
        $this->load->helper(array('form','url'));
        if (!$this->session->userdata('logged_in')) {
            redirect('user/login', 'refresh');
        }
    }
    /*public function index(){
      /*  var_dump($array1);
        die;
        $data = array();
        $data['single_cart'] = unserialize($_COOKIE['cartCookie']);
        $abc['cart'] = array($data['single_cart']);
        $this->load->view('cart/index',$abc);
    }  */
    function index(){
        $data = array();
        $data['cartItems'] = $this->cart->contents();
        $this->load->view('cart/index',$data);
    }
    function updateItemQty(){
        $update = 0;
        $rowid = $this->input->get('rowid');
        $qty = $this->input->get('qty');
        if(!empty($rowid)&&!empty($qty)&&($qty>0)){
            $data = array(
                'rowid'=>$rowid,
                'qty'=>$qty
            );
            $update = $this->cart->update($data);
        }
        echo $update?'ok':'err';
    }
    function removeItem($rowid){
        $remove = $this->cart->remove($rowid);
        redirect('user/cart/');
    }
}