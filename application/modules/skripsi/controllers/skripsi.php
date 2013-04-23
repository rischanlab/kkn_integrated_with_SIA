<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Skripsi extends CI_Controller {
	
	function __construct(){
        parent::__construct();        
        //session_start();
		$this->load->helper(array('form','url', 'text_helper','date'));
		$this->load->model('mdl_skripsi');
		$this->load->library(array('Pagination','image_lib'));
    }

	function index(){
	$this->load->view('skripsi/mhs/page/header');
			$this->load->view('skripsi/mhs/page/content');
				if($this->cek_matkul_akhir()){
					$dt['cek_menu'] = '1';
					$this->load->view('skripsi/mhs/homeskripsi/contentspace',$dt);
				}else{
					$dt['cek_menu'] = '0';
					$this->load->view('skripsi/mhs/homeskripsi/contentspace',$dt);
				}
			$this->load->view('skripsi/mhs/page/footer');		
	}	
	
	function getuploadproposal(){
		$sta = '';
			$dt['divsts']	= '';
			$dt['msg'] 		= '';			
			$this->load->view('skripsi/mhs/page/header');
			$this->load->view('skripsi/mhs/page/content');
			if($this->cek_matkul_akhir()){
				$dt['proposal'] = $this->get_data_proposal();
				$dt['cek_menu'] = '1';
				$dt['sts']		= $this->get_status_proposal();
				$dt['cek_last'] = $this->cek_last_proposal();
				$this->load->view('skripsi/mhs/proposal/uploadproposal',$dt);				
			}else{
				$dt['cek_menu'] = '0';
				$this->load->view('skripsi/mhs/homeskripsi/contentspace',$dt);
			}			
			$this->load->view('skripsi/mhs/page/footer');
			//print_r ($dt['sts']);
	}	
	
	function datauploadproposal(){
		if ($this->session->userdata('id_user')) {
			if($this->cek_matkul_akhir()){
				$tgl 	= "%m-%d-%Y";
				$jam 	= "%h:%i:%a";
				$time 	= time();							
				
				$no = 1;
				if ($this->cek_upload_proposal()){
					$no = $no + $this->cek_upload_proposal();
				}
				$dt['ID_DOSEN_PA']		= $this->cek_dosen_pa();
				$dt['ID_KAPRODI']		= $this->cek_kaprodi();
				$dt['NIM']				= $this->session->userdata('id_user');
				$dt['DATE_PROPOSAL']	= mdate($tgl,$time);
				$dt['JAM'] 				= mdate($jam,$time);
				$dt['STATUS_DOSEN_PA']	= 'p';
				$dt['STATUS_KAPRODI']	= 'p';
				$dt['URL_MASUK']		= substr(($_FILES['userfile']['name']), -3);
				
				if(($this->cek_last_proposal())=='d' OR ($this->cek_last_proposal())==''){
					$config['upload_path'] 		= './media/file';
					$config['file_name'] 		= $this->session->userdata('nim').'_PROPOSAL_'.$no;
					$config['allowed_types'] 	= 'doc|pdf';				
					$this->load->library('upload', $config);					
					if(!$this->upload->do_upload()){
						$dt['divsts']	= 'a';
						$dt['msg'] 		= $this->upload->display_errors();					
						$dt['proposal'] = $this->get_data_proposal();
						$dt['sts']		= $this->get_status_proposal();
						if($this->cek_matkul_akhir()){
							$dt['cek_menu'] = '1';
							$dt['cek_last'] = $this->cek_last_proposal();
							$this->load->view('skripsi/mhs/page/header');
							$this->load->view('skripsi/mhs/page/content');
							$this->load->view('skripsi/mhs/proposal/uploadproposal',$dt);
							$this->load->view('skripsi/mhs/page/footer');
						}
					}
					else {
						
							if($dt['URL_MASUK']=='doc'){
								$dt['URL_PROPOSAL']= "media/file/".$config['file_name'].".doc";
							}elseif($dt['URL_MASUK']=='pdf'){
								$dt['URL_PROPOSAL']= "media/file/".$config['file_name'].".pdf";
							}
							$data = $this->mdl_skripsi->get_api(
								'sia_skripsi_proposal/data_uploadproposal',
								'json',
								'POST',
								array(	'api_kode' => 1000,
										'api_subkode' => 1,
										'api_search' => array(
											$dt['ID_DOSEN_PA'],$dt['ID_KAPRODI'],$dt['NIM'],
											$dt['URL_PROPOSAL'],$dt['DATE_PROPOSAL'],$dt['JAM'],
											$dt['STATUS_DOSEN_PA'],$dt['STATUS_KAPRODI']))
								);					
							redirect('skripsi/getuploadproposal');											
							//echo "<meta http-equiv='refresh' content='0; url=".base_url()."skripsi/getuploadproposal'>";
					
					}
				}
				else{
					$dt['divsts']	= 'a';
					$dt['msg'] 		= "<i>Upload gagal</i>. Untuk mengupload file proposal baru, hapus <i>file proposal terakhir</i> terlebih dahulu";
					$dt['proposal'] = $this->get_data_proposal();
					$dt['sts']		= $this->get_status_proposal();
					$dt['cek_menu'] = '1';
					$dt['cek_last'] = $this->cek_last_proposal();
					$this->load->view('skripsi/mhs/page/header');
					$this->load->view('skripsi/mhs/page/content');
					$this->load->view('skripsi/mhs/proposal/uploadproposal',$dt);
					$this->load->view('skripsi/mhs/page/footer');
				}
			}
		}
	}
	

	function deleteproposal(){
		$id_proposal	= "";
		if($this->uri->segment(3) === FALSE){
			$id_proposal	= $id_proposal;
		}
		else{
			$id_proposal 	= $this->uri->segment(3);
		}
		$data = $this->mdl_skripsi->get_api(
					'sia_skripsi_proposal/geturlproposal',
					'json',
					'POST',
					array(	'api_kode' => 1000,
							'api_subkode' => 1,
							'api_search' => array(($this->session->userdata('id_user')),$id_proposal))
		);
		//print_r($data);
		if($data){
			foreach ($data as $isi=>$qry){
				if(($qry['STATUS_DOSEN_PA'] == 'p' AND $qry['STATUS_KAPRODI'] == 'p') OR ($qry['STATUS_DOSEN_PA'] == 'a' AND $qry['STATUS_KAPRODI'] == 'p') OR ($qry['STATUS_DOSEN_PA'] == 'p' AND $qry['STATUS_KAPRODI'] == 'a')){
					$id_proposal 	= $qry['ID_PROPOSAL'];
					$url 			= $qry['URL_PROPOSAL'];			
					if(file_exists($url)){
						if(@unlink($url)){
							@unlink(str_replace($url));
						}
					}
					$data_d = $this->mdl_skripsi->get_api(
								'sia_skripsi_proposal/deletedataproposal',
								'json',
								'POST',
								array(	'api_kode' => 1000,
										'api_subkode' => 1,
										'api_search' => array($id_proposal))
					);
					redirect('skripsi/getuploadproposal');
				}else{
					$dt['divsts']	= 'a';
					$dt['msg'] 		= "<i>Hapus gagal</i>. Hanya bisa menghapus file <i> file proposal terkahir</i>";						
					$dt['proposal'] = $this->get_data_proposal();
					$dt['cek_menu'] = '1';
					$dt['sts']		= $this->get_status_proposal();
					$dt['cek_last'] = $this->cek_last_proposal();
					$this->load->view('skripsi/mhs/page/header');
					$this->load->view('skripsi/mhs/page/content');
					$this->load->view('skripsi/mhs/proposal/uploadproposal',$dt);
					$this->load->view('skripsi/mhs/page/footer');
				}
			}
			
		}else{
			$sta = '';
			$dt['divsts']	= 'a';
			$dt['msg'] 		= "<i>Hapus gagal</i>. Anda tidak memiliki akses untuk menghapus <i> file proposal ini</i>";			
			$this->load->view('skripsi/mhs/page/header');
			$this->load->view('skripsi/mhs/page/content');			
			$dt['proposal'] = $this->get_data_proposal();
			$dt['cek_menu'] = '1';
			$dt['sts']		= $this->get_status_proposal();
			$dt['cek_last'] = $this->cek_last_proposal();
			$this->load->view('skripsi/mhs/proposal/uploadproposal',$dt);
			$this->load->view('skripsi/mhs/page/footer');
		}		
	}
	
	function getskripsi(){
		$this->load->view('skripsi/mhs/page/header');
		$this->load->view('skripsi/mhs/page/content');		
		$this->load->view('skripsi/mhs/homeskripsi/contentspace');		
		$this->load->view('skripsi/mhs/page/footer');	
	}
	
	
	
	function getbimbingan(){
		$this->load->view('skripsi/mhs/page/header');
		$this->load->view('skripsi/mhs/page/content');
		$this->load->view('skripsi/mhs/bimbingan/proses');
		$this->load->view('skripsi/mhs/page/footer');
	}

	
	private function cek_matkul_akhir(){
		$data = $this->mdl_skripsi->get_api(
					'sia_skripsi_mhs/data_matkul_akhir',
					'json',
					'POST',
					array(	'api_kode' => 1000,
							'api_subkode' => 1,
							'api_search' => array($this->session->userdata('id_user')))
		);			
		if (count($data) > 0){
			foreach ($data as $isi=>$qry) {
				$nm_status = $qry['NM_STATUS'];
				if ($nm_status == 'Aktif'){
					return TRUE;
				}
				else{
					return FALSE;
				}
			}
		}else{
			return FALSE;
		}			
	}
	
	private function cek_upload_proposal(){
		$data = $this->mdl_skripsi->get_api(
					'sia_skripsi_mhs/cek_upload_proposal',
					'json',
					'POST',
					array(	'api_kode' 		=> 1000,
							'api_subkode' 	=> 1,
							'api_search' 	=> array($this->session->userdata('id_user')))
		);		
		return (count($data));
	}
	
	private function cek_dosen_pa(){
		$data = $this->mdl_skripsi->get_api(
					'sia_skripsi_mhs/cek_dosen_pa',
					'json',
					'POST',
					array(	'api_kode' => 1000,
							'api_subkode' => 1,
							'api_search' => array($this->session->userdata('id_user')))
		);			
		
		foreach ($data as $isi=>$qry) {
			$kd_dosen = $qry['KD_DOSEN_WALI'];								
		}
		return $kd_dosen;
	}
	
	private function cek_kaprodi(){
		$data = $this->mdl_skripsi->get_api(
					'sia_skripsi_mhs/cek_kaprodi',
					'json',
					'POST',
					array(	'api_kode' => 1000,
							'api_subkode' => 1,
							'api_search' => array($this->session->userdata('id_user')))
		);			
		//print_r($data);		
		foreach ($data as $isi=>$qry) {
			$kd_dosen = $qry['KD_DOSEN'];								
		}
		return $kd_dosen;
	}
	
	private function cek_last_proposal(){
		$data = $this->mdl_skripsi->get_api(
					'sia_skripsi_proposal/ceklastproposal',
					'json',
					'POST',
					array(	'api_kode' => 1000,
							'api_subkode' => 1,
							'api_search' => array($this->session->userdata('id_user')))
		);			
		//return $data;
		foreach ($data as $isi=>$qry) {
			$sts_pending 	= 'p';
			$sts_decline 	= 'd';
			$sts_accept 	= 'a';
			$status_pa = $qry['STATUS_DOSEN_PA'];
			$status_kap = $qry['STATUS_KAPRODI'];
			if (($status_pa == 'p' AND $status_kap == 'p') OR ($status_pa == 'a' AND $status_kap == 'p') OR ($status_pa == 'p' AND $status_kap == 'a')){
				return $sts_pending;
				//echo "belum";
			}
			elseif (($status_pa == 'a' AND $status_kap == 'd') OR ($status_pa == 'd' AND $status_kap == 'p')){
				return $sts_decline;
			}
			elseif (($status_pa == 'a' AND $status_kap == 'a')){
				return $sts_accept;
				//echo "sudah";
			}
		}		
	}
	
	private function get_status_proposal(){			
		if ($this->cek_upload_proposal() > 0){
			foreach (($this->get_data_proposal()) as $isi=>$qry) {						
				if (($qry['STATUS_DOSEN_PA'] == 'p' AND $qry['STATUS_KAPRODI'] == 'p') OR ($qry['STATUS_DOSEN_PA'] == 'a' AND $qry['STATUS_KAPRODI'] == 'p') OR ($qry['STATUS_DOSEN_PA'] == 'p' AND $qry['STATUS_KAPRODI'] == 'a')){
					$dt['status'] = 'p';
				}
				elseif(($qry['STATUS_DOSEN_PA'] == 'a' AND $qry['STATUS_KAPRODI'] == 'd') OR ($qry['STATUS_DOSEN_PA'] == 'd' AND $qry['STATUS_KAPRODI'] == 'p')){
					$dt['status'] = 'd';
				}
				elseif (($qry['STATUS_DOSEN_PA'] == 'a' AND $qry['STATUS_KAPRODI'] == 'a')){
					$dt['status'] = 'a';			
				}			
			}
		} else{
			$dt['status'] = 'k';
		}
		//print_r ($dt['status']);
		return $dt['status'];
	}
	
	private function get_data_proposal(){
		$data = $this->mdl_skripsi->get_api(
					'sia_skripsi_proposal/gettabelproposal',
					'json',
					'POST',
					array(	'api_kode' => 1000,
							'api_subkode' => 1,
							'api_search' => array($this->session->userdata('id_user')))
		);			
		return $data;				
	}	
	
	function coba(){		
		echo $this->cek_last_proposal();
	}

	function logout() {
        $this->session->unset_userdata('id_user');
		redirect('skripsi/login', 'refresh');		
    } 	
}
