<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bea extends CI_Controller {


	function index()
	{
 		$this->load->view('bea/mhs/header');
		$this->load->view('bea/mhs/content'); //ngko genti menu
		$this->load->view('bea/mhs/v-pengumuman');
		$this->load->view('bea/mhs/footer');
	}


	function pengumuman()
	{
 		$this->load->view('bea/mhs/header');
		$this->load->view('bea/mhs/content');
		$this->load->view('bea/mhs/v-pengumuman');
		$this->load->view('bea/mhs/footer');
	}

	function detail()
	{
 		$this->load->view('bea/mhs/header');
		$this->load->view('bea/mhs/content');
		$this->load->view('bea/mhs/v-detail');
		$this->load->view('bea/mhs/footer');
	}

	function daftar()
	{
 		$this->load->view('bea/mhs/header');
		$this->load->view('bea/mhs/content');
		$this->load->view('bea/mhs/v-daftar');
		$this->load->view('bea/mhs/footer');
	}
}
