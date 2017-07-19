<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user');
        $this->load->helper('url');
    }

    function index(){
    	$this->load->view('login');
    }

    function login_act(){
    	$username = $this->input->post('username');
    	$password = $this->input->post('password');
    	$where  = array(
    		'username' => $username,
    		'password' => md5($password) 
    		);
    	$cek = $this->user->cek_login($where);
    	if($cek > 0){
    		$session  = array(
    		'nama' => $username,
    		'status' => 'login'
    		);

    		$this->session->set_userdata($session);
    		redirect('welcome');

    	}else{
    		echo 'email dan password salah';
    	}

    	
    }

}