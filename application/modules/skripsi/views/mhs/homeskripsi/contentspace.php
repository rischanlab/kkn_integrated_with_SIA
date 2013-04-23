<div id="content">	
	<?php 	if($cek_menu == '1') {
				echo "<ul class='navigation'>";
				echo"	<a href='".base_url()."skripsi/getuploadproposal'><li id='tab'>Upload Proposal</li></a>
						<a href='".base_url()."skripsi/getbimbingan'><li id='tab'>Proses Bimbingan</li></a>
						<a href='".base_url()."skripsi/getdfraft'><li id='end-tab'>Upload Draft</li></a>";
			}
			if($cek_menu == '0') {
				echo "<ul class='disable'>";
				echo"	<a href='".base_url()."skripsi/#'><li id='tab'>Upload Proposal</li></a>
						<a href='".base_url()."skripsi/#'><li id='tab'>Proses Bimbingan</li></a>
						<a href='".base_url()."skripsi/#'><li id='end-tab'>Upload Draft</li></a>";
			};?>
		
	</ul>
			<div id="content-space">
				<font color="#000000" style="font-family:'candara';margin-left:20px;"><h1>Selamat datang</h1></font>
				<div class="detailcontent">
					<?php if($cek_menu == '1'){
						echo"<div class='content-value'>
								<p>Silahkan mengklik menu <b>Upload Proposal</b> untuk mengupload file proposal
								yang nantinya akan ditindak lanjuti oleh Dosen Pembimbing Akademik dan Kepala Prodi. Harap menunggu sampai proposal disetujui
								maka menu <b>Proses Bimbingan bisa dibuka</b></p>
							</div>";
					}else{
						echo"<div class='content-value'>
								<p>Mohon Maaf Anda <font color='red'>belum mengambil matakuliah terkait <b>(Tugas Akhir / Skripsi)</b></font> . Untuk Bisa mengakses
								halaman ini pastikan Anda sudah mengambil matakuliah tersebut.</p>
							</div>";
					};?>
				</div>				
			</div>
		</div>
	</div>