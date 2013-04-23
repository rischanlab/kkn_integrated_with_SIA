<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/enhance.js"></script>			
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
<div id="content">
	<ul class="navigation">	
		<a href="<?php echo base_url(); ?>kkn/kkn_mhs/home"><li id="tab">Home</li></a>	
		<a href="<?php echo base_url(); ?>kkn/kkn_mhs/profil"><li id="tab" >Profil</li></a>
		<a href="<?php echo base_url(); ?>kkn/kkn_mhs/dokumen"><li id="tab" class="current">Dokumen</li></a>
		<a href="<?php echo base_url(); ?>kkn/kkn_mhs/kelompok"><li id="tab" >Info Kelompok</li></a>
		<a href="<?php echo base_url(); ?>kkn/kkn_mhs/sertifikat"target=_blank><li id="end-tab">Sertifikat</li></a>
	</ul>	
<div id="content-space">
		<h2>Dokumen Peserta KKN</h2>
			<div class="scroll">
			
			<?php
			foreach($data as $isi=>$mahasiswa)
			{
			
			?>
			<table class="table table-bordered table-hover mid">
			<tr>
				<th class="data">Dokumen</th>
				<th class="data">File</strong></th>
				<th class="data">Edit</strong></th>
			</tr>
			
			<tr>
			<td class="data">Foto</td>
			<?php echo $msg;?>
			<td class="data"><img src="<?php echo base_url();?>uploads/foto/<?php echo $mahasiswa['PATH_FOTO']; ?>" height="120" width="90" align="center">
		
			</td>
			<td>
				<?php echo form_open_multipart('kkn/kkn_mhs/do_upload_foto');?>
				<input type="file" name="userfile" id="foto" class="txt_login">
				<input type="submit" name="subloginx" value="Simpan"  class="btn"/>
				</form>
				</td>
			</tr>
			<tr>
				<td class="data">SK Tidak Hamil</td>
				<td class="data"><a
					href="<?php echo base_url();?>uploads/sk_tidak_hamil/<?php echo $mahasiswa['PATH_SK_TIDAK_HAMIL']; ?> " target=_blank><?php echo $mahasiswa['PATH_SK_TIDAK_HAMIL']; ?>
				</a></td>
				<td>
				<?php echo form_open_multipart('kkn/kkn_mhs/do_upload_hamil');?>
				<input type="file" name="userfile" id="sk_tidak_hamil" class="txt_login">
				<input type="submit" name="subloginx" value="Simpan" class="btn"/>
				</form>
				</td>

			</tr>
		
			<tr>
				<td class="data">SK Cuti Bekerja</td>
				<td class="data"><a
					href="<?php echo base_url();?>uploads/sk_cuti_kerja/<?php echo $mahasiswa['PATH_SK_CUTI']; ?>" target=_blank><?php echo $mahasiswa['PATH_SK_CUTI']; ?>
				</a></td>
				<td>
				<?php echo form_open_multipart('kkn/kkn_mhs/do_upload_kerja');?>
				<input type="file" name="userfile" id="sk_cuti_kerja" class="txt_login">
				<input type="submit" name="subloginx" value="Simpan"  class="btn"/>
				</form>
				</td>

			</tr>

			
			</table>
			
			<?php
			}
			?>
		</div>
		</div>
	</div>