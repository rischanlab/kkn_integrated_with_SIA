<div id="content">	
	<ul class="navigation">				
		<a href="<?php echo base_url(); ?>skripsi/getuploadproposal"><li id="tab">Upload Proposal</li></a>
		<a href="<?php echo base_url(); ?>skripsi/getbimbingan"><li id="tab" class="current">Proses Bimbingan</li></a>
		<li id="end-tab">Upload Draft</li>
	</ul>
	
	<div id="content-space">
		<form class="form-horizontal">
		
			<div id="separate" ></div>
			
			<div class="control-group">
				<label class="control-label" for="inputEmail">Masukkan Laporan Skripsi</label>
				<div class="controls">
					<div id="input-file">
						<input type="file"/>
					</div>
				</div>
			</div>							
			
			<div id="separate" ></div>
			
			<div class="control-group">
						<label class="control-label">Tema Bimbingan</label>
						<div class="controls">
							<input type="text" style="width:400px;" id="uploadproposal" placeholder="Tema ...">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">NIM - Bimbingan ke</label>  
						<div class="controls controls-row">
							<span class="input-medium uneditable-input" width="10px">09650017</span> -
							<span class="input-mini uneditable-input" width="10px"><center>2</center></span>
						</div>								
					</div>
					<div class="control-group">
						<label class="control-label">Program Studi</label>
						<div class="controls">
							<span class="input-large uneditable-input" width="10px">Pendidikan Matematika</span>
						</div>
					</div>							
					<div class="control-group">
						<label class="control-label"></label>
						<div class="controls">
							<input class="btn" type="submit" value="Kirim Laporan">
						</div>
					</div>
				</form>
				<table class="table table-bordered table-hover">
					<tr>
						<th width="10px">No</th>
						<th width="300px"><center>Tema Bimbingan</center></th>
						<th><center>Tanggal Upload</center></th>
						<th width="125px"><center>Status Proposal</center></th>
					</tr>
					
					<tr class="success">
						<td>1</td>
						<td>BAB II Tujuan Penelitian</td>
						<td><center>21 Mei 2013</center></td>
						<td><center>Sudah Diproses</center></td>
					</tr>
				</table>
			</div>					
		</div>
	</div>