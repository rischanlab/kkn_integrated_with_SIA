<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kkn_mhs extends CI_Controller {
	function __construct(){
        parent::__construct();        
        //session_start();
		$this->load->helper(array('form','url', 'text_helper','date'));
		$this->load->model('mdl_kkn');
		$this->load->library(array('Pagination','image_lib','FPDF','form_validation'));
    }
	
	
	function cek_masa_kkn(){
		$this->db = $this->load->database('kkn', TRUE);
		$this->load->model('Form_Model','',TRUE);
		$cek_aktif_kkn	= $this->Form_Model->cek_waktu_kkn();
			if (count($cek_aktif_kkn->result_array())>0)
			{
				foreach($cek_aktif_kkn->result() as $wktu)
				{
					$date1	= $wktu->FIRST_DATE;
					$date2	= $wktu->LAST_DATE;
				}
			
			}else {
				return 0;
			}

		$date_now				= date('m/d/Y');
		$sekarang 				= DateTime::createFromFormat('m/d/Y', $date_now);
		$mulai_daftar		 	= DateTime::createFromFormat('m/d/Y', $date1);
		$selesai_daftar		 	= DateTime::createFromFormat('m/d/Y', $date2);
		
			if ($sekarang >= $mulai_daftar && $sekarang <= $selesai_daftar){
				return 1;
			}else {
				return 0;			
			}
	
	}
	
	function cek_sudah_ke_poli($nim){
		$this->db = $this->load->database('poli', TRUE);
		$this->load->model('Form_Model','',TRUE);
		$hasil=$this->Form_Model->cek_sudah_poli($nim);
		if (count($hasil->result_array())>0){
			return 1;
		}else {
			return 0;
		}
	
	}
	
	function cek_sudah2($nim){
		// return 1 jika sudah sudah pernah input data kkn
		$this->db = $this->load->database('kkn', TRUE);
		$this->load->model('Form_Model');
		$hasil=$this->Form_Model->cek_sudah($nim);
			if (count($hasil->result_array())>0){
				foreach($hasil->result() as $items){
					$sudah=$items->SUDAH;
				}
				if(($sudah=='2') || ($sudah=='3')){
					return 2;
				}
				else {
					return 0;
				}
			}else {
				return 0;
			}
	}
	
	function index()
	{
 		redirect('kkn/kkn_mhs/home');
	}
	
	function setuju(){
		$this->load->view('kkn/mhs/header');
 		$this->load->view('kkn/mhs/content');
		$this->load->view('kkn/mhs/front_agree');
		$this->load->view('kkn/mhs/footer');
	
	}
	function inputdata(){
		$nim	= $this->session->userdata('nim');
		$this->form_validation->set_rules('agreeCheck', 'Agree to the Terms and Conditions', 'required|isset');
		if (!isset($_POST['agreeCheck'])) {
			?>
<script type="text/javascript">
			alert("Anda Tidak Setuju dengan Pernyataan ini, anda tidak berhak menuju ke halaman selanjutnya..!!!");	
			window.location ="<?php echo base_url(); ?>kkn/kkn_mhs/setuju"
			</script>

<?php
		}else {
		
				$data = $this->mdl_kkn->get_api(
					'sia_kkn_mhs/get_by_nim',
					'json',
					'POST',
					array(	'api_kode' => 1000,
							'api_subkode' => 1,
							'api_search' => array($this->session->userdata('nim')))
					);	
					
					
					if (count($data) > 0){
						foreach ($data as $isi=>$qry) {
							$sudah = $qry['SUDAH'];
							if ($sudah == '1'){
								redirect('kkn/kkn_mhs/uploaddoc');	
							}
							else{	
										$datasia = $this->mdl_kkn->get_api(
										'sia_kkn_mhs/get_data_from_db_sia',
										'json',
										'POST',
										array(	'api_kode' => 1000,
												'api_subkode' => 1,
												'api_search' => array($this->session->userdata('nim')))
										);	
										
										if (count($datasia) > 0){
											$dt['data']=$datasia;
											$this->load->view('kkn/mhs/header');
											$this->load->view('kkn/mhs/content');
											$this->load->view('kkn/mhs/front_input',$dt);
											$this->load->view('kkn/mhs/footer');

										}else{
											return false;
										}	
								}
						}
					}else{
										$datasia = $this->mdl_kkn->get_api(
										'sia_kkn_mhs/get_data_from_db_sia',
										'json',
										'POST',
										array(	'api_kode' => 1000,
												'api_subkode' => 1,
												'api_search' => array($this->session->userdata('nim')))
										);	
										
										if (count($datasia) > 0){
											$dt['data']=$datasia;
											$this->load->view('kkn/mhs/header');
											$this->load->view('kkn/mhs/content');
											$this->load->view('kkn/mhs/front_input',$dt);
											$this->load->view('kkn/mhs/footer');

										}else{
											return false;
										}	
					}			

					
		
		
		
		}
		
		
		
	}
	
	function insertdata(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('transportasi', 'Transportasi', 'required');
		$this->form_validation->set_rules('prestasi', 'Keahlian', 'required');
		$this->form_validation->set_rules('alamat_jogja', 'Alamat Jogja', 'required');
		//$this->form_validation->set_rules('rt_jogja', 'RT Jogja', 'required');

		$this->form_validation->set_rules('desa_jogja', 'Desa Jogja', 'required');
		$this->form_validation->set_rules('nm_kec_jogja', 'Kecamatan Jogja', 'required');
		$this->form_validation->set_rules('nm_kab_jogja', 'Kabupaten Jogja', 'required');

		$this->form_validation->set_rules('hp_mhs', 'No HP Mahasiswa', 'required');
		$this->form_validation->set_rules('telp_mhs', 'Telp Ibu/Bpk dari Mahasiswa', 'required');
		//$this->form_validation->set_rules('gol_darah', 'Golongan Darah', 'required');
		$this->form_validation->set_rules('tinggi', 'Tinggi', 'required');

		$this->form_validation->set_rules('berat', 'Berat', 'required');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
		$this->form_validation->set_rules('STATUS_KAWIN', 'Status Pernikahan', 'required');
		$this->form_validation->set_message('required', 'Field %s tidak boleh kosong!!!');


		if ($this->form_validation->run() == FALSE)
		{
			$data = $this->mdl_kkn->get_api(
					'sia_kkn_mhs/get_data_from_db_sia',
					'json',
					'POST',
					array(	'api_kode' => 1000,
							'api_subkode' => 1,
							'api_search' => array($this->session->userdata('nim')))
				);	
				
				if (count($data) > 0){
					$dt['data']=$data;
					$this->load->view('kkn/mhs/header');
					$this->load->view('kkn/mhs/content');
					$this->load->view('kkn/mhs/front_input',$dt);
					$this->load->view('kkn/mhs/footer');

				}else{
					redirect('kkn/kkn_mhs/home');
					//echo "sdas";
				}	
		
			
		}
		else
		{	
			$mhs = array( 	'NAMA' => str_replace("'","''",$this->input->post('nama',TRUE)),
								'NIM' => $this->input->post('nim',TRUE),
								'FAK' => $this->input->post('fak'),
								'PRODI' => $this->input->post('prodi'),
								'JK' => $this->input->post('j_kelamin',TRUE),
								'HP_MHS' => $this->input->post('hp_mhs'),
								'TTL' => $this->input->post('ttl'),
								'TINGGI' => $this->input->post('tinggi'),
								'BERAT' => $this->input->post('berat'),
								'PEKERJAAN' => $this->input->post('pekerjaan'),
								'STATUS_KAWIN' => $this->input->post('STATUS_KAWIN',TRUE),
								'TRANSPORTASI' => $this->input->post('transportasi',TRUE),
								'ALAMAT_RUMAH' => $this->input->post('alamat_mhs'),
								'RT_RUMAH' => $this->input->post('rt'),
								'DESA_RUMAH' => $this->input->post('desa'),
								'NM_KEC_RUMAH' => $this->input->post('nm_kec'),
								'NM_KAB_RUMAH' => $this->input->post('nm_kab'),
								'NM_PROP_RUMAH' => $this->input->post('nm_prop'),
								'TELP_MHS' => $this->input->post('telp_mhs'),
								'ALAMAT_JOGJA' => $this->input->post('alamat_jogja',TRUE),
								'RT_JOGJA' => $this->input->post('rt_jogja'),
								'DESA_JOGJA' => $this->input->post('desa_jogja'),
								'NM_KEC_JOGJA' => $this->input->post('nm_kec_jogja'),
								'NM_KAB_JOGJA' => $this->input->post('nm_kab_jogja'),
								'PRESTASI'	=> $this->input->post('prestasi')
								
								
			);
				

			$datainsert = $this->mdl_kkn->get_api(
					'sia_kkn_mhs/insert_data_to_kkn_mhs',
					'json',
					'POST',
					array(	'api_kode' => 1000,
							'api_subkode' => 1,
							'api_search' => array($mhs))
					);	
			
				$data = $this->mdl_kkn->get_api(
					'sia_kkn_mhs/get_by_nim',
					'json',
					'POST',
					array(	'api_kode' => 1000,
							'api_subkode' => 1,
							'api_search' => array($this->session->userdata('nim')))
					);	
					
					
					if (count($data) > 0){
						foreach ($data as $isi=>$qry) {
							$sudah = $qry['SUDAH'];
							if ($sudah == '1'){
									redirect('kkn/kkn_mhs/uploaddoc');	
							}
							else{
								$dataganti = $this->mdl_kkn->get_api(
								'sia_kkn_mhs/ganti_sudah_jadi_1',
								'json',
								'POST',
								array(	'api_kode' => 1000,
										'api_subkode' => 1,
										'api_search' => array($this->session->userdata('nim')))
								);
								
								redirect('kkn/kkn_mhs/uploaddoc');	
							}
						}
					}else{
						return FALSE;
					}
				
		}
			
	
	
	}
	
	function ubah_jadi_1(){
	
		$data = $this->mdl_kkn->get_api(
					'sia_kkn_mhs/get_by_nim',
					'json',
					'POST',
					array(	'api_kode' => 1000,
							'api_subkode' => 1,
							'api_search' => array($this->session->userdata('nim')))
		);	
		
		
		if (count($data) > 0){
			foreach ($data as $isi=>$qry) {
				$sudah = $qry['SUDAH'];
				if ($sudah == '1'){
						return TRUE;
						//echo $sudah;
				}
				else{
					$dataganti = $this->mdl_kkn->get_api(
					'sia_kkn_mhs/ganti_sudah_jadi_1',
					'json',
					'POST',
					array(	'api_kode' => 1000,
							'api_subkode' => 1,
							'api_search' => array($this->session->userdata('nim')))
					);	
		
					return TRUE;
				}
			}
		}else{
			return FALSE;
		}			
	
		
	
	}
	
	function ubah_jadi_2(){
	
		$data = $this->mdl_kkn->get_api(
					'sia_kkn_mhs/get_by_nim',
					'json',
					'POST',
					array(	'api_kode' => 1000,
							'api_subkode' => 1,
							'api_search' => array($this->session->userdata('nim')))
		);	
		
		
		if (count($data) > 0){
			foreach ($data as $isi=>$qry) {
				$sudah = $qry['SUDAH'];
				if ($sudah == '2'){
						return TRUE;
						//echo $sudah;
				}
				else{
					$dataganti = $this->mdl_kkn->get_api(
					'sia_kkn_mhs/ganti_sudah_jadi_2',
					'json',
					'POST',
					array(	'api_kode' => 1000,
							'api_subkode' => 1,
							'api_search' => array($this->session->userdata('nim')))
					);	
		
					return TRUE;
				}
			}
		}else{
			return FALSE;
		}			
	
		
	
	}
	
	function uploaddoc(){
	
	$data = $this->mdl_kkn->get_api(
					'sia_kkn_mhs/get_by_nim',
					'json',
					'POST',
					array(	'api_kode' => 1000,
							'api_subkode' => 1,
							'api_search' => array($this->session->userdata('nim')))
		);	
		
		
		if (count($data) > 0){
			foreach ($data as $isi=>$qry) {
				$sudah = $qry['SUDAH'];
				if ($sudah == '2'){
					redirect('kkn/kkn_mhs/home');	
				}
				else{
					$dt['data']	=$data;
					$dt['msg']	="";
					$this->load->view('kkn/mhs/header');
					$this->load->view('kkn/mhs/content');
					$this->load->view('kkn/mhs/front_doc_upload', $dt);
					$this->load->view('kkn/mhs/footer');
				}
			}
		}else{
			return FALSE;
		}			

	}
	
	function from_uploaddoc(){
	
		$data = $this->mdl_kkn->get_api(
					'sia_kkn_mhs/get_by_nim',
					'json',
					'POST',
					array(	'api_kode' => 1000,
							'api_subkode' => 1,
							'api_search' => array($this->session->userdata('nim')))
		);	
		
		
		if (count($data) > 0){
			foreach ($data as $isi=>$qry) {
				$sudah = $qry['SUDAH'];
				if ($sudah == '2'){
					redirect('kkn/kkn_mhs/home');				}
				else{
					$this->ubah_jadi_2();
					redirect('kkn/kkn_mhs/home');
				}
			}
		}else{
			redirect('kkn/kkn_mhs/uploaddoc');
		}			
		
	
	}
	
	function home(){
		$this->load->view('kkn/mhs/header');
 		$this->load->view('kkn/mhs/content');
		$this->load->view('kkn/mhs/v_home');
		$this->load->view('kkn/mhs/footer');
	
	}

	function profil()
	{
 			$data = $this->mdl_kkn->get_api(
					'sia_kkn_mhs/get_by_nim',
					'json',
					'POST',
					array(	'api_kode' => 1000,
							'api_subkode' => 1,
							'api_search' => array($this->session->userdata('nim')))
		);	
		if (count($data) > 0){
			$dt['data']=$data;
			$this->load->view('kkn/mhs/header');
			$this->load->view('kkn/mhs/content');
			$this->load->view('kkn/mhs/v_profil',$dt);
			$this->load->view('kkn/mhs/footer');

		}else{
			redirect('kkn/kkn_mhs/home');
		}	
	
	}

	function dokumen()
	{
 		$data = $this->mdl_kkn->get_api(
					'sia_kkn_mhs/get_by_nim',
					'json',
					'POST',
					array(	'api_kode' => 1000,
							'api_subkode' => 1,
							'api_search' => array($this->session->userdata('nim')))
		);	
		
		
		if (count($data) > 0){
			$dt['data']	=$data;
			$dt['msg']	="";
			$this->load->view('kkn/mhs/header');
			$this->load->view('kkn/mhs/content');
			$this->load->view('kkn/mhs/v_dokumen',$dt);
			$this->load->view('kkn/mhs/footer');
		}else{
			redirect('kkn/kkn_mhs/home');
		}	
	}
	
	function do_upload(){
	
	
	}
	
	function do_upload_foto(){
		if (isset($_FILES['userfile']['name']) && $_FILES['userfile']['name'] != '') 
		{

			//$nim =$this->session->userdata('nim');
			$nim =$this->session->userdata('nim');
			$pemilik=$nim;
			$bersih=$_FILES['userfile']['name'];
			$nm=str_replace(" ","_","$bersih");
			$pisah=explode(".",$nm);
			$nama_murni=$pisah[0];
			$ekstensi=$pisah[1];
			$sp="_";
			//$ubah=$pemilik.$sp.$nama_murni; //tanpa ekstensi
			$ubah=$pemilik;
			//path where to save the image
			$config['upload_path'] = './uploads/foto';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|JPEG|GIF';
			$config['max_size'] = '20048';
			$config['overwrite'] = TRUE;
			$config['max_width'] = '10024';
			$config['max_height'] = '7068';
			$config['remove_spaces'] = TRUE;
			$config["file_name"]=$ubah; //dengan ekstensi
			$foto=$ubah.".".$ekstensi;

			$this->load->library('upload', $config);
			if(!$this->upload->do_upload()){
					$dt['msg'] 		= $this->upload->display_errors();		
					$data = $this->mdl_kkn->get_api(
					'sia_kkn_mhs/get_by_nim',
					'json',
					'POST',
					array(	'api_kode' => 1000,
							'api_subkode' => 1,
							'api_search' => array($this->session->userdata('nim')))
					);	
					$dt['data']=$data;
					$this->load->view('kkn/mhs/header');
					$this->load->view('kkn/mhs/content');
					$this->load->view('kkn/mhs/v_dokumen',$dt);
					$this->load->view('kkn/mhs/footer');
			}
			else {
				
					$data = $this->mdl_kkn->get_api(
						'sia_kkn_mhs/insert_foto',
						'json',
						'POST',
						array(	'api_kode' => 1000,
								'api_subkode' => 1,
								'api_search' => array($nim,$foto))
						);					
					redirect('kkn/kkn_mhs/dokumen','refresh');
					}
	
		}else {
				
				redirect('kkn/kkn_mhs/dokumen');
			}
	}
	
	function do_upload_foto_front(){
		if (isset($_FILES['userfile']['name']) && $_FILES['userfile']['name'] != '') 
		{

			//$nim =$this->session->userdata('nim');
			$nim =$this->session->userdata('nim');
			$pemilik=$nim;
			$bersih=$_FILES['userfile']['name'];
			$nm=str_replace(" ","_","$bersih");
			$pisah=explode(".",$nm);
			$nama_murni=$pisah[0];
			$ekstensi=$pisah[1];
			$sp="_";
			//$ubah=$pemilik.$sp.$nama_murni; //tanpa ekstensi
			$ubah=$pemilik;
			//path where to save the image
			$config['upload_path'] = './uploads/foto';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|JPEG|GIF';
			$config['max_size'] = '20048';
			$config['overwrite'] = TRUE;
			$config['max_width'] = '10024';
			$config['max_height'] = '7068';
			$config['remove_spaces'] = TRUE;
			$config["file_name"]=$ubah; //dengan ekstensi
			$foto=$ubah.".".$ekstensi;

			$this->load->library('upload', $config);
			if(!$this->upload->do_upload()){
					$dt['msg'] 		= $this->upload->display_errors();		
					$data = $this->mdl_kkn->get_api(
					'sia_kkn_mhs/get_by_nim',
					'json',
					'POST',
					array(	'api_kode' => 1000,
							'api_subkode' => 1,
							'api_search' => array($this->session->userdata('nim')))
					);	
					$dt['data']=$data;
					$this->load->view('kkn/mhs/header');
					$this->load->view('kkn/mhs/content');
					$this->load->view('kkn/mhs/front_doc_upload',$dt);
					$this->load->view('kkn/mhs/footer');
			}
			else {
				
					$data = $this->mdl_kkn->get_api(
						'sia_kkn_mhs/insert_foto',
						'json',
						'POST',
						array(	'api_kode' => 1000,
								'api_subkode' => 1,
								'api_search' => array($nim,$foto))
						);					
					redirect('kkn/kkn_mhs/uploaddoc','refresh');
					}
	
		}else {
				
				redirect('kkn/kkn_mhs/uploaddoc');
			}
	}
	
	function do_upload_hamil(){
		if (isset($_FILES['userfile']['name']) && $_FILES['userfile']['name'] != '') 
		{

			//$nim =$this->session->userdata('nim');
			$nim =$this->session->userdata('nim');
			$pemilik=$nim;
			$bersih=$_FILES['userfile']['name'];
			$nm=str_replace(" ","_","$bersih");
			$pisah=explode(".",$nm);
			$nama_murni=$pisah[0];
			$ekstensi=$pisah[1];
			$sp="_";
			//$ubah=$pemilik.$sp.$nama_murni; //tanpa ekstensi
			$ubah=$pemilik;
			//path where to save the image
			$config['upload_path'] = './uploads/sk_tidak_hamil';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|JPEG|pdf|doc|docx';
			$config['max_size'] = '20048';
			$config['overwrite'] = TRUE;
			$config['max_width'] = '10024';
			$config['max_height'] = '7068';
			$config['remove_spaces'] = TRUE;
			$config["file_name"]=$ubah; //dengan ekstensi
			$sk_tidak_hamil=$ubah.".".$ekstensi;

			$this->load->library('upload', $config);
			if(!$this->upload->do_upload()){
					$dt['msg'] 		= $this->upload->display_errors();		
					$data = $this->mdl_kkn->get_api(
					'sia_kkn_mhs/get_by_nim',
					'json',
					'POST',
					array(	'api_kode' => 1000,
							'api_subkode' => 1,
							'api_search' => array($this->session->userdata('nim')))
					);	
					$dt['data']=$data;
					$this->load->view('kkn/mhs/header');
					$this->load->view('kkn/mhs/content');
					$this->load->view('kkn/mhs/v_dokumen',$dt);
					$this->load->view('kkn/mhs/footer');
			}
			else {
				
					$data = $this->mdl_kkn->get_api(
						'sia_kkn_mhs/insert_sk_tidak_hamil',
						'json',
						'POST',
						array(	'api_kode' => 1000,
								'api_subkode' => 1,
								'api_search' => array($nim,$sk_tidak_hamil))
						);					
					redirect('kkn/kkn_mhs/dokumen','refresh');
					}
	
		}else {
				
				redirect('kkn/kkn_mhs/dokumen');
			}
	}
	
	
	function do_upload_hamil_front(){
		if (isset($_FILES['userfile']['name']) && $_FILES['userfile']['name'] != '') 
		{

			//$nim =$this->session->userdata('nim');
			$nim =$this->session->userdata('nim');
			$pemilik=$nim;
			$bersih=$_FILES['userfile']['name'];
			$nm=str_replace(" ","_","$bersih");
			$pisah=explode(".",$nm);
			$nama_murni=$pisah[0];
			$ekstensi=$pisah[1];
			$sp="_";
			//$ubah=$pemilik.$sp.$nama_murni; //tanpa ekstensi
			$ubah=$pemilik;
			//path where to save the image
			$config['upload_path'] = './uploads/sk_tidak_hamil';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|JPEG|pdf|doc|docx';
			$config['max_size'] = '20048';
			$config['overwrite'] = TRUE;
			$config['max_width'] = '10024';
			$config['max_height'] = '7068';
			$config['remove_spaces'] = TRUE;
			$config["file_name"]=$ubah; //dengan ekstensi
			$sk_tidak_hamil=$ubah.".".$ekstensi;

			$this->load->library('upload', $config);
			if(!$this->upload->do_upload()){
					$dt['msg'] 		= $this->upload->display_errors();		
					$data = $this->mdl_kkn->get_api(
					'sia_kkn_mhs/get_by_nim',
					'json',
					'POST',
					array(	'api_kode' => 1000,
							'api_subkode' => 1,
							'api_search' => array($this->session->userdata('nim')))
					);	
					$dt['data']=$data;
					$this->load->view('kkn/mhs/header');
					$this->load->view('kkn/mhs/content');
					$this->load->view('kkn/mhs/front_doc_upload',$dt);
					$this->load->view('kkn/mhs/footer');
			}
			else {
				
					$data = $this->mdl_kkn->get_api(
						'sia_kkn_mhs/insert_sk_tidak_hamil',
						'json',
						'POST',
						array(	'api_kode' => 1000,
								'api_subkode' => 1,
								'api_search' => array($nim,$sk_tidak_hamil))
						);					
					redirect('kkn/kkn_mhs/uploaddoc','refresh');
					}
	
		}else {
				
				redirect('kkn/kkn_mhs/uploaddoc');
			}
	}
	
	function do_upload_kerja(){
		if (isset($_FILES['userfile']['name']) && $_FILES['userfile']['name'] != '') 
		{

			//$nim =$this->session->userdata('nim');
			$nim =$this->session->userdata('nim');
			$pemilik=$nim;
			$bersih=$_FILES['userfile']['name'];
			$nm=str_replace(" ","_","$bersih");
			$pisah=explode(".",$nm);
			$nama_murni=$pisah[0];
			$ekstensi=$pisah[1];
			$sp="_";
			//$ubah=$pemilik.$sp.$nama_murni; //tanpa ekstensi
			$ubah=$pemilik;
			//path where to save the image
			$config['upload_path'] = './uploads/sk_cuti_kerja';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|JPEG|pdf|doc|docx';
			$config['max_size'] = '20048';
			$config['overwrite'] = TRUE;
			$config['max_width'] = '10024';
			$config['max_height'] = '7068';
			$config['remove_spaces'] = TRUE;
			$config["file_name"]=$ubah; //dengan ekstensi
			$sk_cuti_kerja=$ubah.".".$ekstensi;

			$this->load->library('upload', $config);
			if(!$this->upload->do_upload()){
					$dt['msg'] 		= $this->upload->display_errors();		
					$data = $this->mdl_kkn->get_api(
					'sia_kkn_mhs/get_by_nim',
					'json',
					'POST',
					array(	'api_kode' => 1000,
							'api_subkode' => 1,
							'api_search' => array($this->session->userdata('nim')))
					);	
					$dt['data']=$data;
					$this->load->view('kkn/mhs/header');
					$this->load->view('kkn/mhs/content');
					$this->load->view('kkn/mhs/v_dokumen',$dt);
					$this->load->view('kkn/mhs/footer');
			}
			else {
				
					$data = $this->mdl_kkn->get_api(
						'sia_kkn_mhs/insert_sk_cuti_kerja',
						'json',
						'POST',
						array(	'api_kode' => 1000,
								'api_subkode' => 1,
								'api_search' => array($nim,$sk_cuti_kerja))
						);					
					redirect('kkn/kkn_mhs/dokumen','refresh');
					}
	
		}else {
				
				redirect('kkn/kkn_mhs/dokumen');
			}
	}
	
function do_upload_kerja_front(){
		if (isset($_FILES['userfile']['name']) && $_FILES['userfile']['name'] != '') 
		{

			//$nim =$this->session->userdata('nim');
			$nim =$this->session->userdata('nim');
			$pemilik=$nim;
			$bersih=$_FILES['userfile']['name'];
			$nm=str_replace(" ","_","$bersih");
			$pisah=explode(".",$nm);
			$nama_murni=$pisah[0];
			$ekstensi=$pisah[1];
			$sp="_";
			//$ubah=$pemilik.$sp.$nama_murni; //tanpa ekstensi
			$ubah=$pemilik;
			//path where to save the image
			$config['upload_path'] = './uploads/sk_cuti_kerja';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|JPEG|pdf|doc|docx';
			$config['max_size'] = '20048';
			$config['overwrite'] = TRUE;
			$config['max_width'] = '10024';
			$config['max_height'] = '7068';
			$config['remove_spaces'] = TRUE;
			$config["file_name"]=$ubah; //dengan ekstensi
			$sk_cuti_kerja=$ubah.".".$ekstensi;

			$this->load->library('upload', $config);
			if(!$this->upload->do_upload()){
					$dt['msg'] 		= $this->upload->display_errors();		
					$data = $this->mdl_kkn->get_api(
					'sia_kkn_mhs/get_by_nim',
					'json',
					'POST',
					array(	'api_kode' => 1000,
							'api_subkode' => 1,
							'api_search' => array($this->session->userdata('nim')))
					);	
					$dt['data']=$data;
					$this->load->view('kkn/mhs/header');
					$this->load->view('kkn/mhs/content');
					$this->load->view('kkn/mhs/front_doc_upload',$dt);
					$this->load->view('kkn/mhs/footer');
			}
			else {
				
					$data = $this->mdl_kkn->get_api(
						'sia_kkn_mhs/insert_sk_cuti_kerja',
						'json',
						'POST',
						array(	'api_kode' => 1000,
								'api_subkode' => 1,
								'api_search' => array($nim,$sk_cuti_kerja))
						);					
					redirect('kkn/kkn_mhs/uploaddoc','refresh');
					}
	
		}else {
				
				redirect('kkn/kkn_mhs/uploaddoc');
			}
	}
	
	
	function kelompok()
	{
		$data1 = $this->mdl_kkn->get_api(
					'sia_kkn_mhs/get_angkatan_kkn',
					'json',
					'POST',
					array(	'api_kode' => 1000,
							'api_subkode' => 1,
							'api_search' => array($this->session->userdata('nim')))
		);	
		$data2 = $this->mdl_kkn->get_api(
					'sia_kkn_mhs/get_info_kelompok',
					'json',
					'POST',
					array(	'api_kode' => 1000,
							'api_subkode' => 1,
							'api_search' => array($this->session->userdata('nim')))
		);	
		$data3 = $this->mdl_kkn->get_api(
					'sia_kkn_mhs/get_member_kelompok_by_nim',
					'json',
					'POST',
					array(	'api_kode' => 1000,
							'api_subkode' => 1,
							'api_search' => array($this->session->userdata('nim')))
		);	
		
		
		if ((count($data1) > 0) && (count($data2) > 0) && (count($data3) >0)){
			$dt1['datakkn']=$data1;
			$dt2['datainfo']=$data2;
			$dt3['data_isi']=$data3;
			$this->load->view('kkn/mhs/header');
			$this->load->view('kkn/mhs/content');
			$this->load->view('kkn/mhs/v_kelompok');
			$this->load->view('kkn/mhs/datakkn',$dt1);
			$this->load->view('kkn/mhs/infokelompok',$dt2);
			$this->load->view('kkn/mhs/lihatkelompok',$dt3);
			$this->load->view('kkn/mhs/footer');
		}else{
			redirect('kkn/kkn_mhs/home');
		}	
		
		
	}
	
	function expbuktidaftar()
	{
		
		
	}
	
	

	function sertifikat()
	{
		$data = $this->mdl_kkn->get_api(
					'sia_kkn_mhs/get_sertifikat',
					'json',
					'POST',
					array(	'api_kode' => 1000,
							'api_subkode' => 1,
							'api_search' => array($this->session->userdata('nim')))
		);
		
		if (count($data) > 0){
			$dt['data']		=$data;
			$this->load->view('kkn/mhs/sertifikat', $dt);
		}else{
			redirect('kkn/kkn_mhs/home');
		}	
	
	}
	
	function cek_sudah(){
		$sudah = $this->mdl_kkn->get_api(
					'sia_kkn_mhs/cek_sudah',
					'json',
					'POST',
					array(	'api_kode' => 1000,
							'api_subkode' => 1,
							'api_search' => array($this->session->userdata('nim')))
		);
		
		if (count($sudah) > 0)
		{
				foreach($sudah as $isi=>$qry)
				{
					$status_sudah=$qry['SUDAH'];
				}
					if ($status_sudah=="3") 
					{
						return 3;
					}else if($status_sudah=="2"){
						return 2;
					}else if($status_sudah=="1"){
						return 1;
					}else {
						return FALSE;	
					}
		}else {
			return FALSE;
				
		}
	}

}