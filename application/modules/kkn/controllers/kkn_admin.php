<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kkn_admin extends CI_Controller {


	function index()
	{	
 		$this->load->view('kkn/admin/header');
		$this->load->view('kkn/admin/content');
		$this->load->view('kkn/admin/v_pendaftaran');
		$this->load->view('kkn/admin/footer');
	}


	function pendaftaran()
	{
 		$this->load->view('kkn/admin/header');
		$this->load->view('kkn/admin/content');
		$this->load->view('kkn/admin/v_pendaftaran');
		$this->load->view('kkn/admin/footer');
	}

	function pembayaran()
	{
 		$this->load->view('kkn/admin/header');
 		$this->load->view('kkn/admin/content');
		$this->load->view('kkn/admin/v_pembayaran');
		$this->load->view('kkn/admin/footer');
	}

	function peserta_baru()
	{
		$this->load->view('kkn/admin/header');
 		$this->load->view('kkn/admin/content');
		$this->load->view('kkn/admin/v_peserta_baru');
		$this->load->view('kkn/admin/footer');
	}

	function peserta_all()
	{
		$this->load->view('kkn/admin/header');
 		$this->load->view('kkn/admin/content');
		$this->load->view('kkn/admin/v_peserta_all');
		$this->load->view('kkn/admin/footer');
	}
	function dpl()
	{
		$this->load->view('kkn/admin/header');
 		$this->load->view('kkn/admin/content');
		$this->load->view('kkn/admin/v_dpl');
		$this->load->view('kkn/admin/footer');
	}
	function atur_ta()
	{
		$this->load->view('kkn/admin/header');
 		$this->load->view('kkn/admin/content');
		$this->load->view('kkn/admin/v_atur_ta');
		$this->load->view('kkn/admin/footer');
	}
	function atur_periode()
	{
		$this->load->view('kkn/admin/header');
 		$this->load->view('kkn/admin/content');
		$this->load->view('kkn/admin/v_atur_periode');
		$this->load->view('kkn/admin/footer');
	}
	function atur_angkatan()
	{
		$this->load->view('kkn/admin/header');
 		$this->load->view('kkn/admin/content');
		$this->load->view('kkn/admin/v_atur_angkatan');
		$this->load->view('kkn/admin/footer');
	}
	function atur_kelompok()
	{
		$this->load->view('kkn/admin/header');
 		$this->load->view('kkn/admin/content');
		$this->load->view('kkn/admin/v_atur_kelompok');
		$this->load->view('kkn/admin/footer');
	}
	function atur_anggota()
	{
		$this->load->view('kkn/admin/header');
 		$this->load->view('kkn/admin/content');
		$this->load->view('kkn/admin/v_atur_anggota');
		$this->load->view('kkn/admin/footer');
	}
	function cetak_kartu()
	{
		$this->load->view('kkn/admin/header');
 		$this->load->view('kkn/admin/content');
		$this->load->view('kkn/admin/v_cetak_kartu');
		$this->load->view('kkn/admin/footer');
	}
	function nilai()
	{
		$this->load->view('kkn/admin/header');
 		$this->load->view('kkn/admin/content');
		$this->load->view('kkn/admin/v_nilai');
		$this->load->view('kkn/admin/footer');
	}
	function sertifikat()
	{
		$this->load->view('kkn/admin/header');
 		$this->load->view('kkn/admin/content');
		$this->load->view('kkn/admin/v_sertifikat');
		$this->load->view('kkn/admin/footer');
	}
	function download_peserta()
	{
		$this->load->view('kkn/admin/header');
 		$this->load->view('kkn/admin/content');
		$this->load->view('kkn/admin/v_download_peserta');
		$this->load->view('kkn/admin/footer');
	}

}
