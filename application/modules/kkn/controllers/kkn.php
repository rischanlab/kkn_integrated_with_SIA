<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kkn extends CI_Controller {


	function index()
	{
		
		redirect('kkn/login');
		/**
		$x ="mhs";
		//$x ="dosen";
		//$x ="admin";
		if ($x=="mhs"){
			redirect('kkn/kkn_mhs/');
		}else if($x=="dosen"){
			redirect('kkn/kkn_dosen/');
		}else{
			redirect('kkn/kkn_admin/');
		
		}
 		**/
	}
	


}
