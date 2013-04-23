<?php

if ($this->session->userdata('status') != 'mhs')
{

	redirect('http://sia.uin-suka.ac.id');
}
else
			{ 
		
			?>
<div id="content">
	<div id="content-space">
		<h2 >Surat Pernyataan KKN LPM UIN Sunan Kalijaga
				Yogyakarta</h2>
		<div class="scroll" id="content_scroll">
			<div class="status-value" ><center>
			Pastikan Anda membaca dengan seksama isi dari surat pernyataan ini,
			Anda harus menyetujui Surat Pernyataan ini jika anda ingin mendaftar
			KKN. </br>by LPM UIN Sunan Kalijaga
			</center></br></div>
		
			
		<div class="post-desc" >
			<form action="<?php echo "".base_url()."kkn/kkn_mhs/inputdata" ?>"
				method="POST">
						<?php 
						$nim 	= $this->session->userdata('nim');
						$prodi	= "TEKNIK INFORMATIKA";
						if ($nim=='09650007'){
							$nama = "Rischan Mafrur";
						}else if($nim=='09650006'){
							$nama = "Rizki Tunjung Sari";
						}else {
							echo "Nim belum terdeteksi";
						}
							?>
				
						<h3 >
							Saya	
							<?php echo $this->session->userdata('nama'); ?>
							<?php echo $nama; ?>
							dari Prodi
							<?php echo $this->session->userdata('prodi'); ?>
							<?php echo $prodi; ?>
							menyatakan bahwa :
						</h3>
						<p class="post-desc" >
						Bersedia ditempatkan di lokasi manapun yang ditetapkan oleh Panitia Pelaksana KKN
						</p>
						<p class="post-desc" >		
								Saya berjanji akan menjalankan
								kewajiban-kewajiban yang telah digariskan serta peraturan dan
								ketentuan yang dikeluarkan oleh Lembaga Pengabdian kepada
								Masyarakat (LPM) UIN Sunan Kalijaga, Panitia Pelaksana dengan
								sebaik-baiknya dengan penuh rasa tanggung jawab serta dedikasi
								tinggi sesuai dengan Buku Pedoman dan Peraturan Tata Tertib KKN
								UIN Sunan Kalijaga Yogyakarta yang berlaku
						</p>
						<p class="post-desc" >
						Saya berjanji tidak akan
								melakukan kegiatan: berbicara, mempengaruhi, bertindak dalam
								politik praktis dan tidak akan melakukan tindakan yang dapat
								mencemarkan nama baik UIN Sunan Kalijaga
						</p>
						<p class="post-desc" >
						Apabila saya terbukti tidak
								menjalankan kewajiban-kewajiban KKN dan atau melakukan kegiatan
								politik praktis selama KKN, saya sanggup menerima sangsi dari
								UIN Sunan Kalijaga dan atau yang berwajib sesuai dengan
								peraturan yang berlaku.
						</p>


					
				<h3>
				<?php

							$agreeCheck = array( 'name' => 'agreeCheck', 'id' => 'agreeCheck', 'value' => 'agree', 'checked' => set_checkbox('agreeCheck', 'agree', FALSE));
							echo form_checkbox($agreeCheck);

							?> Saya Setuju dengan pernyataan Ini.</h3></td>

	
							<input type="submit" name="subloginx" class="btn"
								value="Lanjut">
			</form>
			</div>
		</div>
	</div>
</div>
</div>
<?php


	} 
	
		?>