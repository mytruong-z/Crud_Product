<?php
Class Order extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Lấy thông tin của khách hàng
     */
    function checkout()
    {
        //thong gio hang
        $carts = $this->cart->contents();
        //tong so san pham co trong gio hang
        $total_items = $this->cart->total_items();
       
        if($total_items <= 0)
        {
            redirect();
        }
        //tong so tien can thanh toan
        $total_amount = 0;
        foreach ($carts as $row)
        {
            $total_amount = $total_amount + $row['subtotal'];  
        }
        $this->data['total_amount'] = $total_amount;
        
        //neu thanh vien da dang nhap thì lay thong tin cua thanh vien
        $user_id = 0;
        $user = '';
        if($this->session->userdata('user_id_login'))
        {
            //lay thong tin cua thanh vien
            $user_id = $this->session->userdata('user_id_login');
            $user = $this->user_model->get_info($user_id);
        }
        $this->data['user']  = $user;
        

        $this->load->library('form_validation');
        $this->load->helper('form');
        
        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('email', 'Email nhận hàng', 'required|valid_email');
            $this->form_validation->set_rules('name', 'Tên', 'required|min_length[8]');
            $this->form_validation->set_rules('phone', 'Số điện thoại', 'required');
            $this->form_validation->set_rules('message', 'Ghi chú', 'required');
            $this->form_validation->set_rules('payment', 'Cổng thanh toán', 'required');
            
            //nhập liệu chính xác
            if($this->form_validation->run())
            {
                $payment = $this->input->post('payment');
                //them vao csdl
                 $data = array(
                    'status'   => 0, //trang thai chua thanh toan
                    'user_id'  => $user_id, //id thanh vien mua hang neu da dang nhap
                    'user_email'    => $this->input->post('email'),
                    'user_name'     => $this->input->post('name'),
                    'user_phone'    => $this->input->post('phone'),
                    'message'       => $this->input->post('message'), //ghi chú khi mua hàng
                    'amount'        => $total_amount,//tong so tien can thanh toan
                    'payment'       => $payment, //cổng thanh toán,
                    'created'       => now(),
                );
                 //them du lieu vao bang transaction
                $this->load->model('transaction_model');
                $this->transaction_model->create($data);
                $transaction_id = $this->db->insert_id();  //lấy ra id của giao dịch vừa thêm vào
                
                //them vao bảng order (chi tiết đơn hàng)
                $this->load->model('order_model');
                foreach ($carts as $row)
                {
                    $data = array(
                        'transaction_id' => $transaction_id,
                        'product_id'     => $row['id'],
                        'qty'            => $row['qty'],
                        'amount'         => $row['subtotal'],
                        'status'         => '0',
                    );
                    $this->order_model->create($data);
                }
                //xóa toàn bô giỏ hang
                $this->cart->destroy();
                //tạo ra nội dung thông báo
                $this->session->set_flashdata('message', 'Bạn đã đặt hàng thành công, chúng tôi sẽ kiểm tra và gửi hàng cho bạn');
                
                //chuyen tới trang danh sách quản trị viên
                redirect(site_url());
            }
        }
        
        
        //hiển thị ra view
        $this->data['temp'] = 'site/order/checkout';
        $this->load->view('site/layout', $this->data);
    }
}