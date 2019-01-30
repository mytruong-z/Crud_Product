<?php
Class Slide extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        //load ra file model
        $this->load->model('slide_model');
    }
    
    /*
     * Hien thi danh sach slide
     */
    function index()
    {
        //lay tong so luong ta ca cac slide trong websit
        $total_rows = $this->slide_model->get_total();
        $this->data['total_rows'] = $total_rows;

        $input = array();
       
        //lay danh sach slide
        $list = $this->slide_model->get_list($input);
        $this->data['list'] = $list;
       
        //lay nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        
        //load view
        $this->data['temp'] = 'admin/slide/index';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * Them slide moi
     */
    function add()
    {
        
        //load thư viện validate dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('name', 'Tên slide', 'required');
            
            //nhập liệu chính xác
            if($this->form_validation->run())
            {
               
                //lay ten file anh minh hoa duoc update len
                $this->load->library('upload_library');
                $upload_path = './upload/slide';
                $upload_data = $this->upload_library->upload($upload_path, 'image');  
                $image_link = '';
                if(isset($upload_data['file_name']))
                {
                    $image_link = $upload_data['file_name'];
                }
               
                //luu du lieu can them
                $data = array(
                    'name'       => $this->input->post('name'),
                    'image_link' => $image_link,
                    'link'       => $this->input->post('link'),
                    'info'       => $this->input->post('info'),
                    'sort_order' => $this->input->post('sort_order'),
                ); 
                //them moi vao csdl
                if($this->slide_model->create($data))
                {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                }else{
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                //chuyen tới trang danh sách
                redirect(admin_url('slide'));
            }
        }
        
        
        //load view
        $this->data['temp'] = 'admin/slide/add';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * Chinh sua slide
     */
    function edit()
    {
        $id = $this->uri->rsegment('3');
        $slide = $this->slide_model->get_info($id);
        if(!$slide)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'Không tồn tại slide này');
            redirect(admin_url('slide'));
        }
        $this->data['slide'] = $slide;
       
       
        //load thư viện validate dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('name', 'Tên slide', 'required');
            
            //nhập liệu chính xác
            if($this->form_validation->run())
            {
               
                //lay ten file anh minh hoa duoc update len
                $this->load->library('upload_library');
                $upload_path = './upload/slide';
                $upload_data = $this->upload_library->upload($upload_path, 'image');
                $image_link = '';
                if(isset($upload_data['file_name']))
                {
                    $image_link = $upload_data['file_name'];
                }
            
                //luu du lieu can them
                $data = array(
                    'name'       => $this->input->post('name'),
                    'link'       => $this->input->post('link'),
                    'info'       => $this->input->post('info'),
                    'sort_order' => $this->input->post('sort_order'),
                ); 
                if($image_link != '')
                {
                    $data['image_link'] = $image_link;
                }
               
                //them moi vao csdl
                if($this->slide_model->update($slide->id, $data))
                {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
                }else{
                    $this->session->set_flashdata('message', 'Không cập nhật được');
                }
                //chuyen tới trang danh sách
                redirect(admin_url('slide'));
            }
        }
        
        
        //load view
        $this->data['temp'] = 'admin/slide/edit';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * Xoa du lieu
     */
    function del()
    {
        $id = $this->uri->rsegment(3);
        $this->_del($id);
        
        //tạo ra nội dung thông báo
        $this->session->set_flashdata('message', 'Xóa slide thành công');
        redirect(admin_url('slide'));
    }
    
    /*
     * Xóa nhiều slide
     */
    function delete_all()
    {
        //lay tat ca id slide muon xoa
        $ids = $this->input->post('ids');
        foreach ($ids as $id)
        {
            $this->_del($id);
        }
    }
    
    /*
     *Xoa slide
     */
    private function _del($id)
    {
        $slide = $this->slide_model->get_info($id);
        if(!$slide)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'không tồn tại slide này');
            redirect(admin_url('slide'));
        }
        //thuc hien xoa slide
        $this->slide_model->delete($id);
        //xoa cac anh cua slide
        $image_link = './upload/slide/'.$slide->image_link;
        if(file_exists($image_link))
        {
            unlink($image_link);
        }
        
    }
}



