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
    public function index(){
        $brandbtn = $this->input->post('brand');
        $searchbtn = $this->input->post('btnSearch');
        $pricebtn = $this->input->post('btnPrice');
        $priceUp = $this->input->post('btnPriceUp');
        $priceDown = $this->input->post('btnPriceDown');
        if(isset($brandbtn)){
            $info = $this->input->post('brand');
            $data['brand'] = $this->Product_model->getSearch($info);
            $data['product'] = json_decode(json_encode($data['brand']), True);//chuyen doi stdClass sang array

        }elseif(isset($searchbtn)){
            $infoSearch = $this->input->post('search');
            $data['search'] = $this->Product_model->getSearch($infoSearch);
            $data['product'] = json_decode(json_encode($data['search']), True);
        }elseif (isset($pricebtn)){
            $PriceMin = $this->input->post('priceMin');
            $PriceMax = $this->input->post('priceMax');
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
    }

  /*  function fetch_data()
    {
        sleep(1);
        $minimum_price = $this->input->post('minimum_price');
        $maximum_price = $this->input->post('maximum_price');
        $brand = $this->input->post('brand');
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = '#';
        $config['total_rows'] = $this->product_filter_model->count_all($minimum_price, $maximum_price, $brand);
        $config['per_page'] = 8;
        $config['uri_segment'] = 3;
        $config['use_page_numbers'] = TRUE;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='active'><a href='#'>";
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['num_links'] = 3;
        $this->pagination->initialize($config);
        $page = $this->uri->segment(4);

        $start = ($page - 1) * $config['per_page'];
        $output = array(
            'pagination_link'  => $this->pagination->create_links(),
            'product_list'   => $this->product_filter_model->fetch_data($config["per_page"], $start, $minimum_price, $maximum_price, $brand )
        );
        echo json_encode($output);
    } */
   /* public function addToCart($proID){
        $product = $this->Product_cart->getRows($proID);
        $data = array(
            'id' =>$product['id'],
            'qty'=>1,
            'price'=>$product['price'],
            'name'=>$product['name'],
            'image'=>$product['image']
        );

       // setcookie('cartCookie',$data['name'],time()+86400,"/");
        $datas['cart'] = array($data);

            $array = serialize($datas);
            setcookie('cartCookie',$array,time()+86400,"/");

      /*  $array = serialize($data);
        setcookie('cartCookie',$array,time()+86400,"/");
       // $array1 = unserialize($_COOKIE['cartCookie']);
      /*  print_r($array1['id']);
        die;
        var_dump(unserialize($_COOKIE['cartCookie']));
        die;
       // $this->load->view('cart/index',$array1);

        redirect('user/cart/',$array);
      //  redirect('user/Product_filter/showCart',$datas);
    } */
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