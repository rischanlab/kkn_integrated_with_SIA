
	<div >
		<table class="table table-bordered table-hover mid">
			<tr><b>Anggota Kelompok:</b></tr>
			<tr>
				<th >NIM</th>
				<th >Nama</th>
				<th >Fakultas</th>
				<th >HP</th>
			</tr>



			<?php

			foreach($data_isi as $gembus=>$row)
			{
			?>
			
				<tr ><td ><?php echo $row['NIM']; ?></td>
				<td ><?php echo $row['NAMA']; ?></td>
				<td ><?php echo $row['FAK']; ?></td>
				<td ><?php echo $row['HP_MHS']; ?></td>
				</tr>
<?php

					
} ?>

		</table>
	
	</div>
</div>
</div>
