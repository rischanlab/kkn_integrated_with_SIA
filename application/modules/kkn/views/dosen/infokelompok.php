<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Detail Peserta KKN | LPM UIN Sunan Kalijaga Yogyakarta</title>
</head>
<div id="rightContent">
		<?php

		foreach($q->result() as $row)
		{
			
			echo "<table class='data'>";
			echo "<tr><th class='data'>Keterangan</th><th class='data'></th></tr>";
			echo "<tr><td class='data'>Nama Kelompok</td><td class='data'>".$row->NAMA_KELOMPOK."</td></tr>";
			
			echo "<tr ><th class='data'>Lokasi KKN</th><th class='data'></th></tr >";
			echo "<tr ><td class='data'>RW</td><td class='data'>".$row->RW."</td></tr>";
			echo "<tr ><td class='data'>Desa</td><td class='data'>".$row->DESA."</td></tr>";
			echo "<tr ><td class='data'>Kecamatan</td><td class='data'>".$row->NM_KEC."</td></tr>";
			echo "<tr ><td class='data'>Kabupaten</td><td class='data'>".$row->NM_KAB."</td></tr>";

			echo "</table>";

} ?>

	</div>

