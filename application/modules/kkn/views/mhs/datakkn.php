<div >
<?php
foreach($datakkn as $gembus=>$row)
	{?>
	
<table class="table table-bordered table-hover mid">
	<tr ><th ><b>Peserta KKN UIN Sunan Kalijaga</b></th></tr>
	<tr ><td > Angkatan <?php echo $row['ANGKATAN']; ?>, Periode <?php echo $row['PERIODE']; ?>, Tahun Akademik <?php echo $row['TA']; ?></td></tr>
	<tr ><td >Mulai <?php echo $row['TANGGAL_MULAI']; ?> sampai dengan <?php echo $row['TANGGAL_SELESAI']; ?></td></tr>
	<tr ><td >download Buku Panduan KKN <a href="<?php echo base_url(); ?>/assets/uploads/files/<?php echo $row['UPLOAD_BUKU']; ?>" target="_blank"><b><font color="red"> disini</font></b></a>
	</td></tr>
</table>
<?php
	} 
?>
	</div>