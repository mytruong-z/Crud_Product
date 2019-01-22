<?php if(!defined('BASEPATH')) exit('No direct access script allowed');

class Logout extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }
    public function index(){
        var_dump($this->session->userdata('logged_in'));
        $this->session->unset_userdata('user_data_session');
        $this->session->unset_userdata('logged_in');
        var_dump($this->session->userdata('logged_in'));
        redirect(base_url("user/login"));
    }

}