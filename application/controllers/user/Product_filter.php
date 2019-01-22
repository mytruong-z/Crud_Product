<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Product_filter extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_filter_model');
        $this->load->model('Product_cart');
        $this->load->model('Product_model');
        $this->load->library('cart');
        if (!$this->session->userdata('logged_in')) {
            redirect('user/login', 'refresh');
        }
    }
    /*public function index(){

        $brandbtn = $this->input->get('brand');
        $searchbtn = $this->input->get('btnSearch');
        $btnSubmit = $this->input->get('btnSubmit');
        $priceUp = $this->input->get('btnPriceUp');
        $priceDown = $this->input->get('btnPriceDown');
        $rating =$this->input->get('input_rate');
        if(isset($rating)){
            die('123');
        }
        if(isset($brandbtn)){
            $info = $this->input->get('brand');
            $data['brand'] = $this->Product_model->getSearch($info);
           $data['product'] = json_decode(json_encode($data['brand']), True);//chuyen doi stdClass sang array

        }elseif(isset($searchbtn)){
            $infoSearch = $this->input->get('search');
            $data['search'] = $this->Product_model->getSearch($infoSearch);
            $data['product'] = json_decode(json_encode($data['search']), True);
        }elseif(isset($btnSubmit)){
            $PriceMin = $this->input->get('priceMin');
            $PriceMax = $this->input->get('priceMax');
            $info = $this->input->get('brand');
            $dataS = array(
                  "PriceMin" => $PriceMin,
                  "PriceMax" => $PriceMax,
                  "info" => $info,
            );
            echo "<pre>";
            print_r($data['search']);
            echo "<pre>";
            die;
            $data['price']=$this->Product_model->getPrice($PriceMin,$PriceMax);
            $data['product'] = json_decode(json_encode($data['price']), True);
        }elseif (isset($priceUp)){
            $data['priceUp']=$this->Product_model->getPriceUp();
            $data['product'] = json_decode(json_encode($data['priceUp']), True);
        }elseif (isset($priceDown)){
            $data['priceDown']=$this->Product_model->getPriceDown();
            $data['product'] = json_decode(json_encode($data['priceDown']), True);
        }
        else{
            $data['product'] = $this->Product_model->getList();
        }
        $data['brand_data'] = $this->product_filter_model->fetch_filter_type_Ca('name');
        $data['product_price'] = $this->product_filter_model->fetch_filter_type('price');
        $this->load->view('user/product_filter',$data);
    }*/
    public function index(){
        $searchbtn = $this->input->get('btnSearch');
        $btnSubmit = $this->input->get('btnSubmit');
        $priceUp = $this->input->get('btnPriceUp');
        $priceDown = $this->input->get('btnPriceDown');
        if(isset($searchbtn)){
            $infoSearch = $this->input->get('search');
            $data['search'] = $this->Product_model->getSearch($infoSearch);
            $data['product'] = json_decode(json_encode($data['search']), True);
        }
        elseif(isset($priceUp)){
            $data['priceUp']=$this->Product_model->getPriceUp();
            $data['product'] = json_decode(json_encode($data['priceUp']), True);
        }elseif(isset($priceDown)){
            $data['priceDown']=$this->Product_model->getPriceDown();
            $data['product'] = json_decode(json_encode($data['priceDown']), True);
        }elseif(isset($btnSubmit)){
            $PriceMin = $this->input->get('priceMin');
            $PriceMax = $this->input->get('priceMax');
            $brand = $this->input->get('brand');
            $data['info'] = $this->Product_model->getBrandPrice($brand);
            /*echo "<pre>";
            print_r($data['info']);
            echo "<pre>";
            die;*/
            $all = array();
            if(isset($PriceMin)&&isset($PriceMax)){
                foreach ($data['info'] as $n){
                    if($n['price'] < $PriceMax && $n['price'] > $PriceMin){
                        $all[]=$n;
                    }
                }
                $data['product'] = $all;
            }elseif(!empty($PriceMin)&&!empty($PriceMax)) {
                $data['product'] = $data['info'];
            }
        }
        else{
            $data['product'] = $this->Product_model->getList();
        }
        $data['brand_data'] = $this->product_filter_model->fetch_filter_type_Ca('name');
        $data['product_price'] = $this->product_filter_model->fetch_filter_type('price');
        $this->load->view('user/product_filter',$data);
    }
   public function addToCart($proID){
       $product = $this->Product_cart->getRows($proID);
       $data = array(
           'id' => $product['id'],
           'qty' => 1,
           'price'=>$product['price'],
           'name'=>$product['name'],
           'image'=>$product['image']
       );
       $this->cart->insert($data);
      redirect('user/cart/');
   }


}