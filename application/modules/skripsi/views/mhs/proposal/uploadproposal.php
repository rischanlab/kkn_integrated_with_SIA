<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/enhance.js"></script>		
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery.js"></script>		
<script type="text/javascript">
	// Run capabilities test
	enhance({
		loadScripts: [
			'<?php echo base_url(); ?>asset/js/jquery.js',
			'<?php echo base_url(); ?>asset/js/jQuery.fileinput.js',
			'<?php echo base_url(); ?>asset/js/file-upload.js'
		],
		loadStyles: ['<?php echo base_url(); ?>asset/css/enhanced.css']	
	});   
</script>
<script type="text/javascript">			
	function viewdocu(url_proposal){ 
		//console.log('http://docs.google.com/viewer?url=<?php echo base_url();?>'+url_proposal+'&embedded=true');
		$.ajax({
			success: function(html){
				$("#viewdoc").html('<iframe src="http://docs.google.com/viewer?url=<?php echo base_url();?>'+url_proposal+'&embedded=true"  width="665" height="400" style="border: none;"></iframe>');				
				$("#viewdoc").show();
				$("#btnClose").show();
			}
		});
		
	}
	
	function keluar(){		
		$.ajax({
			success: function(html){				
				$("#viewdoc").hide();
				$("#btnClose").hide();
			}
		});
		
	}
</script>
<div id="content">
	<?php 	if($cek_menu == '1') {
				echo "<ul class='navigation'>";
				echo"	<a href='".base_url()."skripsi/getuploadproposal'><li id='tab' class='current'>Upload Proposal</li></a>
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
	<div id="data">	
	<div id="notif" style="display:none"></div>	
	<div id="content-space">		
		<!--form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>skripsi/datauploadproposal"-->		
		<form accept-charset="utf-8" method="POST" action="<?php echo base_url(); ?>skripsi/datauploadproposal" class="form-horizontal" enctype="multipart/form-data" name="filUpload">		
			<div id="separate"></div>
			<div class="control-group">
				<label class="control-label" for="inputEmail">Masukkan Proposal Skripsi</label>
				<div class="controls">
					<div id="input-file">
						<input type='file' name='userfile' id='userfile'/>						
					</div>
				</div>
			</div>							
			<div class="control-group">
				<label class="control-label" for="inputEmail"></label>
				<div class="controls">
					<i>Tipe file yang diperbolehkan adalah <font color='red'><b>.doc</b> atau <b>.pdf</b></font></i>
				</div>
			</div>	
			<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<input class="btn" id="btnSimpan" type="submit" value="Kirim Proposal">
					</div>
			</div>
		</form>
		
			<form class="form-horizontal">
				<div class="control-group">
					<label class="control-label">Status Proposal Terakhir</label>
						<div class="controls">
							<?php	
								if($cek_last=='p'){
									echo "<div class='statuspending'>Menunggu Konfirmasi dosen PA dan Kaprodi</div>";
								}
								elseif($cek_last=='a'){
									echo "<div class='statussudah'>Proposal diterima</div>";
								}
								elseif($cek_last=='d'){
									echo "<div class='statusbelum'>Proposal ditolak</div>";
								}
								else{
									echo "";
								}
							?>
						</div>
				</div>
			</form>					
		<div id="notifikasi" style="display:<?php if($divsts=="a"){echo '';}else{echo 'none';}?>"><?php echo $msg;?></div>		
		<a href='#' onclick='keluar()' type="button" class="btn btn-small" id="btnClose" style="display:none; float:right"><i class='icon-off'></i> Close</a>
		<div id="viewdoc" style="display:none"></div>
		<div id="separate" ></div>		
		<table class="table table-bordered table-hover">
				<tr>
					<th width="10px"><center>No</center></th>
					<th><center>File Proposal</center></th>
					<th><center>Tanggal Upload</center></th>
					<th width="125px"><center>Status</center></th>
					<th width="125px"><center>Aksi</center></th>
				</tr>							
			<?php 								
			$no=1;
			foreach ($proposal as $isi=>$qry) {																	
				if (($qry['STATUS_DOSEN_PA'] == 'p' AND $qry['STATUS_KAPRODI'] == 'p') OR ($qry['STATUS_DOSEN_PA'] == 'a' AND $qry['STATUS_KAPRODI'] == 'p') OR ($qry['STATUS_DOSEN_PA'] == 'p' AND $qry['STATUS_KAPRODI'] == 'a')){
					echo "<tr class='info'>";
					echo"   <td align='center'>".$no."</td>
							<td align='center'>".$qry['NM_FILE']."</td>
							<td align='center'>".$qry['TANGGAL']."</td>
							<td align='center'>Sedang diproses</td>												
							<td align='center'>";?>
								<a class='btn btn-mini' href='#' onclick="viewdocu('<?php echo $qry['URL_PROPOSAL']; ?>')"><i class='icon-file'></i> View</a>
								<a class='btn btn-mini' href="<?php echo base_url()."skripsi/deleteproposal/".$qry['ID_PROPOSAL']; ?>" onclick="return confirm('Are you sure want to delete..???')"><i class='icon-trash'></i> Delete</a>
					<?php
					echo"	</td>												
						</tr>";
				} 
				elseif (($qry['STATUS_DOSEN_PA'] == 'a' AND $qry['STATUS_KAPRODI'] == 'a')){
					echo"<tr class='success'>";
					echo"   <td align='center'>".$no."</td>
							<td align='center'>".$qry['NM_FILE']."</td>
							<td align='center'>".$qry['TANGGAL']."</td>
							<td align='center'>Proposal diterima</td>
							<td align='center'>";?>
								<a class='btn btn-mini' href='#' onclick="viewdocu('<?php echo $qry['URL_PROPOSAL']; ?>')"><i class='icon-file'></i> View</a>
					<?php
					echo"	</td>
						</tr>";
				}
				elseif (($qry['STATUS_DOSEN_PA'] == 'a' AND $qry['STATUS_KAPRODI'] == 'd') OR ($qry['STATUS_DOSEN_PA'] == 'd' AND $qry['STATUS_KAPRODI'] == 'p')){
					echo"<tr class='error'>";
					echo"   <td align='center'>".$no."</td>
							<td align='center'>".$qry['NM_FILE']."</td>
							<td align='center'>".$qry['TANGGAL']."</td>
							<td align='center'>Proposal ditolak</td>
							<td align='center'>";?>
								<a class='btn btn-mini' href='#' onclick="viewdocu('<?php echo $qry['URL_PROPOSAL']; ?>')"><i class='icon-file'></i> View</a>
					<?php
					echo"	</td>
						</tr>";
				}
				$no++;
			}
			if ($sts == 'k'){
				echo"<tr>";
				echo"	<td colspan='5' align='center'>BELUM ADA DATA PROPOSAL</td>												
					</tr>";
			}
			//echo $sts;
			?>
		</table>
		
		<?php	if($cek_last=='p'){
					echo "<font color='#00AFEF'><i>* Untuk saat ini tidak bisa melakukan upload proposal dikarenakan masih menunggu konfirmasi dari <u>Dosen PA</u> dan <u>Kaprodi</u></i></font>";
				}
				elseif($cek_last=='a'){
					echo "<font color='#81B20B'><i>* Selamat atas diterimanya proposal Anda, Tunggu sampai jadwal seminar anda keluar di bawah ini</i></font>";
				}
				elseif($cek_last=='d'){
					echo "<font color='#FF0000'><i>* Mohon maaf proposal Anda belum di setujui, silahkan upload Proposal Anda yang baru.</i></font>";
				}
				else{
					echo "";
				}
		?>
	
	
	</div>
	</div>
	<div id='history'>
		<div id="separate" ></div>
		<h2>Jadwal Seminar Proposal</h2>
		<table class="table table-bordered table-hover">
				<tr>					
					<th><center>Tanggal Seminar</center></th>
					<th><center>Jam</center></th>
					<th width="125px"><center>Ruang Seminar</center></th>
					<th width="125px"><center>Pembimbing</center></th>
				</tr>							
				<tr>					
					<td align='center' width="90px">10 APRIL 2013</td>
					<td align='center' width="50px">10.00 AM</td>
					<td align='center'>R. Munaqosyah Barat</td>												
					<td align='center' width="300px">1. Agus Mulyanto 2. Agung Fatwanto</td>												
				</tr>				 	
		</table>	
	</div>
</div>					