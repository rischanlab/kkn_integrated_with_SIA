
	<div >
		<?php

		foreach($datainfo as $gembus=>$row)
		{
		?>
		
		<table class="table table-bordered table-hover mid">
		<tr><th >Keterangan</th><th ></th></tr>
		<tr ><td >Nama Kelompok</td><td ><?php echo $row['NAMA_KELOMPOK']; ?></td></tr>
		

		<tr ><td >Nama Dosen Pembimbing Lapangan (DPL)</td><td ><?php echo $row['NM_DOSEN']; ?></td></tr>
		<tr ><td >No HP (DPL)</td><td ><?php echo $row['MOBILE']; ?></td></tr>
		<tr><th >Lokasi KKN</th><th ></th></tr >
		<tr ><td >RW</td><td ><?php echo $row['RW']; ?></td></tr>
		<tr ><td >Desa</td><td ><?php echo $row['DESA']; ?></td></tr>
		<tr ><td >Kecamatan</td><td ><?php echo $row['NM_KEC']; ?></td></tr>
		<tr ><td >Kabupaten</td><td ><?php echo $row['NM_KAB']; ?></td></tr>

		</table>
<?php
} ?>

	</div>

