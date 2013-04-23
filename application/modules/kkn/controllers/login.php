<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        session_start();
	       
    }
	function index(){
		$this->load->view('kkn/mhs/login');
	
	
	}
	
	function masuk(){
		$nim 	= $this->input->post('nim',TRUE);
		$status = "mhs";				
		$data	= array('nim' => $nim,
					  'status'=> $status);
									
		$this->session->set_userdata($data);
		redirect('kkn/kkn_mhs/setuju');
	
	}
	
	function keluar(){
		$this->session->sess_destroy();
		redirect('kkn/login');
	
	}
 
}