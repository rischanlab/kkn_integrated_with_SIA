<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        session_start();
		$this->load->model('mdl_skripsi');        
    }

    public function index() {
        $data['warning'] = "";
        $this->load->view('v_login', $data);       
    }

    public function ceklogin() {        
            $userid 	= $this->input->post('username');            
            $password 	= $this->input->post('password');			
            if ($this->cekmhs($userid,$password)){
                $login['id_user'] = $this->cekmhs($userid,$password);
				//echo $login['id_user'];			                
                $this->session->set_userdata($login);
				redirect('skripsi', 'refresh');		
            }
			elseif ($this->cekdosen_pa($userid,$password)){
				$login['id_user'] = $this->cekdosen_pa($userid,$password);
				//echo $login['id_user'];		
				$this->session->set_userdata($login);				
				redirect('skripsi/skripsidosen', 'refresh');
			}
			else{
                $data['warning'] = "Username atau Password salah!";
				//echo $data['warning'];
				$this->load->view('v_login', $data);  
			}
       
    }
	
	private function cekmhs($user='',$pass_user=''){
		$data = $this->mdl_skripsi->get_api(
				'sia_skripsi_ceklogin/cekdatamhs',
				'json',
				'POST',
					array(	'api_kode' => 1000,
							'api_subkode' => 1,
							'api_search' => array($user,$pass_user))
				);
		//print_r($data);
		if($data){
			foreach ($data as $isi=>$qry) {
				$id_user = $qry['ID_USER'];
				return $id_user;
			}				
		}
		else{
			return FALSE;
		}
	}
	
	private function cekdosen_pa($user='',$pass_user=''){
		$data = $this->mdl_skripsi->get_api(
				'sia_skripsi_ceklogin/cekdatadosen_pa',
				'json',
				'POST',
					array(	'api_kode' => 1000,
							'api_subkode' => 1,
							'api_search' => array($user,$pass_user))
				);
		//print_r($data);
		if($data){
			foreach ($data as $isi=>$qry) {
				$id_user = $qry['REF_INDEX'];
				return $id_user;
			}				
		}
		else{
			return FALSE;
		}
	}

}