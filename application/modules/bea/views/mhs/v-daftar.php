<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/enhance.js"></script>		
<script type="text/javascript">
	// Run capabilities test
	enhance({
		loadScripts: [
			'<?php echo base_url(); ?>asset/js/jquery-1.9.1.min.js',
			'<?php echo base_url(); ?>asset/js/jQuery.fileinput.js',
			'<?php echo base_url(); ?>asset/js/file-upload.js'
		],
		loadStyles: ['<?php echo base_url(); ?>asset/css/enhanced.css']	
	});   
</script>
<div id="content">
	<div id="content-space">
		<h2>Form Pendaftaran Beasiswa</h2>
		<div class="scroll">
			<div class="post no-border">
				<h3>Beasiswa Supersemar 2013</h3>
				<p class="post-desc">Silakan mengunggah file kelengkapan administrasi beasiswa dengan form di bawah ini:</p>
				<div id="upload">
					<table>
						<tr><td>Scan Surat Keterangan Tidak Mampu</td><td><input type="file" name="file" id="sktm" /><div class="lfloat lmargin-15"><img src="<?php echo base_url(); ?>asset/img/centang.png" /></div></td></tr>
						<tr><td>Scan Surat Keterangan Masih Kuliah</td><td><input type="file" name="file" id="skmk" /><div class="lfloat lmargin-15"><img src="<?php echo base_url(); ?>asset/img/centang.png" /></div></td></tr>
						<tr><td>Scan Surat Keterangan</td><td><input type="file" name="file" id="sk" /></td></tr>
					</table>
				</div>
				<div class="rfloat rpadding-15">
					<a href="#" class="btn-uin btn-inverse btn btn-small" > Daftar >></a>
				</div>
			</div>
		</div>
	</div>
</div>