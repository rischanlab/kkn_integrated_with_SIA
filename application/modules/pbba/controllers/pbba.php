<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pbba extends CI_Controller {


	function index()
	{
 		$this->load->view('pbba/mhs/header');
		$this->load->view('pbba/mhs/content');
		$this->load->view('pbba/mhs/v-pendaftaran');
		$this->load->view('pbba/mhs/footer');
	}


	function pendaftaran()
	{
 		$this->load->view('pbba/mhs/header');
		$this->load->view('pbba/mhs/content');
		$this->load->view('pbba/mhs/v-pendaftaran');
		$this->load->view('pbba/mhs/footer');
	}

	function pilihjadwal()
	{
 		$this->load->view('pbba/mhs/header');
 		$this->load->view('pbba/mhs/content');
		$this->load->view('pbba/mhs/v-pilihjadwal');
		$this->load->view('pbba/mhs/footer');
	}

	function infojadwal()
	{
		$this->load->view('pbba/mhs/header');
 		$this->load->view('pbba/mhs/content');
		$this->load->view('pbba/mhs/v-infojadwal');
		$this->load->view('pbba/mhs/footer');
	}

	function infonilai()
	{
		$this->load->view('pbba/mhs/header');
 		$this->load->view('pbba/mhs/content');
		$this->load->view('pbba/mhs/v-infonilai');
		$this->load->view('pbba/mhs/footer');
	}

}
