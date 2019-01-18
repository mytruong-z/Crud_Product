<?php
defined('BASEPATH') OR exit();
class Checkout extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation','cart'));
        $this->load->helper('form');
        $this->load->model('Product_cart');
        $this->controller = 'checkout';
    }
    function index(){
        if($this->cart->total_items() <=0){
            redirect('user/Product_filter');
        }
        $custData = $data = array();
        $submit = $this->input->post('placeOrder');
        if(isset($submit)){
            $this->form_validation->set_rules('name','Name','required');
            $this->form_validation->set_rules('email','Email','required|valid_email');
            $this->form_validation->set_rules('phone','Phone','required|numeric');
            $this->form_validation->set_rules('address','Address','required');
            $custData = array(
                'name'=>strip_tags($this->input->post('name')),
                'email'=>strip_tags($this->input->post('email')),
                'phone'=>strip_tags($this->input->post('phone')),
                'address'=>strip_tags($this->input->post('address'))
            );
            if($this->form_validation->run()==true){
                $insert = $this->Product_cart->insertCustomer($custData);
                if($insert){
                    $order = $this->placeOrder($insert);
                    if($order){
                        $this->session->set_userdata('success_msg','Order placed successfully.');
                        redirect('user/checkout/orderSuccess/'.$order);
                    }else{
                        $data['error_msg'] = 'Order submission failed,please try again.';
                    }
                }else{
                    $data['error_msg'] = 'Some problem occured, please try again.';
                }
            }

        }
        $data['custData'] = $custData;
        $data['cartItems'] = $this->cart->contents();
        $this->load->view($this->controller.'/index',$data);
    }
    function placeOrder($custID){
        $ordData = array(
            'customer_id'=>$custID,
            'grand_total'=>$this->cart->total()
        );
        $insertOrder = $this->Product_cart->insertOrder($ordData);
        if($insertOrder){
            $cartItems = $this->cart->contents();
            $ordItemData = array();
            $i = 0;
            foreach ($cartItems as $item){
                $ordItemData[$i]['order_id'] = $insertOrder;
                $ordItemData[$i]['product_id'] = $item['id'];
                $ordItemData[$i]['quantity'] = $item['qty'];
                $ordItemData[$i]['name'] = $item['name'];
                $ordItemData[$i]['sub_total'] = $item['subtotal'];
                $i++;
            }
            if(!empty($ordItemData)){
                $insertOrderItems = $this->Product_cart->inserOrderItems($ordItemData);
                if($insertOrderItems){
                    $this->cart->destroy();
                    return $insertOrder;
                }
            }
        }
        return false;
    }
    function orderSuccess($ordID){
        $data['order'] = $this->Product_cart->getOrder($ordID);
        $this->load->view($this->controller.'/order-success',$data);
    }
}