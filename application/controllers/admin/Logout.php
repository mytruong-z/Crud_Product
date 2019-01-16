<?php if(!defined('BASEPATH')) exit('No direct access script allowed');

class Logout extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }
    public function index(){
        $this->session->unset_userdata('user_data_session');
        $this->session->set_userdata('logged_in',false);
        redirect(base_url("admin/Login"));
    }

}