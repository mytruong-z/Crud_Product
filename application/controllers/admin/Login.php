<?php if(!defined('BASEPATH')) exit('No direct access script allowed');
class Login extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url','file'));
        $this->load->library('form_validation');
        $this->load->model('Login_auth_db');
     // print_r($this->session->userdata('user_data_session'));
       // die;
    }
    public function index(){
        $this->load->view('admin/login');
    }
    public function login_auth(){
        $data = new stdClass();
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('password','Password','required');
        if($this->form_validation->run() == false){
            $this->load->view('admin/login');
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
                $data_to_view['selected'] = 'dashboard';
                $data_to_view['content'] = 'dashboard';
            /*    var_dump($data_to_view);
                die;

                redirect('admin/home',$data_to_view);*/
                /*print_r($_SESSION);
                print_r($this->session->userdata('user_data_session'));
                die;*/
              $this->load->view('admin/base_view',$data_to_view);

            }else{
             /*  $this->session->set_flashdata('login_msg', '<div class="alert alert-danger text-center">Login Failed!! Please try again.</div>');
                $this->load->view('header');
                $this->load->view('admin/login');
                $this->load->view('footer'); */
                $data->error = 'Wrong email or password.';
                // send error to the view
                $this->load->view('admin/login', $data);

            }
        }

    }
}