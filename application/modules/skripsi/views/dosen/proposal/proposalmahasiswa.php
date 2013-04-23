<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/enhance.js"></script>		
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery.js"></script>	
<script src="<?php echo base_url(); ?>asset/js/jquery.mCustomScrollbar.concat.min.js"></script>	
<script>
	(function($){
		$(window).load(function(){
			$("#content_scroll").mCustomScrollbar({
				scrollButtons:{
					enable:true
				},
				theme:"dark-thick"
			});
		});
	})(jQuery);
</script>
<div id="content">
	<ul class='navigation'>
		<a href='<?php echo base_url();?>skripsi/skripsidosen/getproposalmahasiswa'><li id='tab' class='current'>Proposal Mahasiswa</li></a>
		<a href='<?php echo base_url();?>skripsi/skripsidosen/getbimbingan'><li id='tab'>Bimbingan Skripsi</li></a>
		<a href='<?php echo base_url();?>skripsi/skripsidosen/getdfraft'><li id='end-tab'>Draft Skripsi</li></a>
	</ul>		
	<div id="content-space">											
		<h2>Daftar Mahasiswa</h2>
		<font color='#000000'><i>* Untuk melakukan pengecekan terhadap <b>data proposal</b> klik option <b>lihat proposal</b></i></font>
		<div id="separate" ></div>	
		<div class="scroll" id="content_scroll">
			<table class="table table-bordered table-hover">
				<tr>
					<th width="10px">No</th>
					<th width="100px">NIM</th>
					<th width="250px">Nama Mahasiswa</th>
					<th width="100px">Angkatan</th>
					<th width="100px">Option</th>		
				</tr>
				<?php 								
				$no=1;		
				foreach ($listnama as $isi=>$qry) {
					echo "<tr class=''>";
						echo"   <td align='center'>".$no."</td>
								<td align='center'>".$qry['NIM']."</td>
								<td align='left'>".$qry['NAMA']."</td>
								<td align='center'>".$qry['KD_TA']."</td>												
								<td align='center'>";?>
									<a class='btn btn-mini' href='#' onclick="viewdocu('')"><i class='icon-zoom-in'></i> Lihat Detail</a>								
						<?php
						echo"	</td>												
							</tr>";
				$no++;
				}?>
			</table>
		</div>
	</div>	
</div>					