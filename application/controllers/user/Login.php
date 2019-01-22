<?php if(!defined('BASEPATH')) exit('No direct access script allowed');
class Login extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url','file'));
        $this->load->library('form_validation');
        $this->load->model('Login_auth_db');
        $this->load->library('session');
    }
    public function index(){
        if ($this->session->has_userdata['logged_in']) {
            header('Location: http://cars.com/user/Product_filter');
        }
        $this->load->view('user/login_Client');
    }
    public function login_auth(){
        $data = new stdClass();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('password','Password','required');
        if($this->form_validation->run() == false){
            $this->load->view('user/login_Client');
        }else{
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $username = $this->input->post('username');
            if($this->Login_auth_db->Login($email,$password)){
                $user_data = $this->Login_auth_db->get_user_data($email);
                $user_detail = array(
                    'username' => $user_data['username'],
                    'email' =>$user_data['email'],
                    'user_type' =>$user_data['user_type']
                );
                $this->session->set_userdata('user_data_session',$user_detail);
                $this->session->set_userdata('logged_in',true);
                redirect('user/Product_filter');
            }else{
                $data->error = 'Wrong email or password.';
                $this->load->view('user/login_Client', $data);
            }
        }
    }
}