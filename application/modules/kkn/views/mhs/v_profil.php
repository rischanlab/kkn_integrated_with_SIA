<div id="content">
	<ul class="navigation">			
		<a href="<?php echo base_url(); ?>kkn/kkn_mhs/home"><li id="tab">Home</li></a>	
		<a href="<?php echo base_url(); ?>kkn/kkn_mhs/profil"><li id="tab" class="current">Profil</li></a>
		<a href="<?php echo base_url(); ?>kkn/kkn_mhs/dokumen"><li id="tab">Dokumen</li></a>
		<a href="<?php echo base_url(); ?>kkn/kkn_mhs/kelompok"><li id="tab" >Info Kelompok</li></a>
		<a href="<?php echo base_url(); ?>kkn/kkn_mhs/sertifikat"target=_blank><li id="end-tab">Sertifikat</li></a>
	</ul>

<div id="content-space">
		<h2>Profil Peserta KKN UIN Sunan Kalijaga Yogyakarta</h2>
			<div class="scroll">
			<?php
			foreach($data as $isi=>$mahasiswa)
			{
			
			?>
			
				<table class="table table-bordered table-hover ">
				<tr>
				<th class="data">Data Diri</th>
				<th class="data">Keterangan</th>
			</tr>
			
			<tr>
				<td class="data">Nama</td>
				<td class="data"><?php echo $mahasiswa['NAMA']; ?></td>
			</tr>
			<tr>
				<td class="data">NIM</td>
				<td class="data"><?php echo $mahasiswa['NIM']; ?></td>
			</tr>
			<tr>
				<td class="data">TTL</td>
				<td class="data"><?php echo $mahasiswa['TTL']; ?></td>
			</tr>
			<tr>
				<td class="data">Prodi</td>
				<td class="data"><?php echo $mahasiswa['PRODI']; ?></td>
			</tr>
			<tr>
				<td class="data">Fakultas</td>
				<td class="data"><?php echo $mahasiswa['FAK']; ?></td>
			</tr>
			<tr>
				<td class="data">Jenis Kelamin</td>
				<td class="data"><?php echo $mahasiswa['JK']; ?></td>
			</tr>
			<tr>
				<td class="data">No HP</td>
				<td class="data"><?php echo $mahasiswa['HP_MHS']; ?></td>
			</tr>
			<tr>
				<td class="data">No Telp Rumah</td>
				<td class="data"><?php echo $mahasiswa['TELP_MHS']; ?></td>
			</tr>
			<tr>
				<td class="data">Status Sehat</td>
				<td class="data"><?php echo $mahasiswa['PATH_SK_DOKTER']; ?></td>
			</tr>
			<tr>
				<td class="data">Golongan Darah</td>
				<td class="data"><?php echo $mahasiswa['GOL_DARAH']; ?></td>
			</tr>
			<tr>
				<td class="data">Tinggi Badan</td>
				<td class="data"><?php echo $mahasiswa['TINGGI']; ?></td>
			</tr>
			<tr>
				<td class="data">Berat Badan</td>
				<td class="data"><?php echo $mahasiswa['BERAT']; ?></td>
			</tr>
			<tr>
				<td class="data">Pekerjaan</td>
				<td class="data"><?php echo $mahasiswa['PEKERJAAN']; ?></td>
			</tr>
			<tr>
				<td valign="top">Status Pernikahan</td>
				<td><?php echo $mahasiswa['STATUS_KAWIN']; ?></td>
			</tr>


			<tr>
				<td class="data">Transportasi</td>
				<td class="data"><?php echo $mahasiswa['TRANSPORTASI']; ?></td>
			</tr>
			<tr>
				<td class="data">Keahlian</td>
				<td class="data"><?php echo $mahasiswa['PRESTASI']; ?></td>
			</tr>
			<tr>
				<td class="data">Alamat Asal</td>
				<td class="data"><?php echo $mahasiswa['ALAMAT_RUMAH']; ?></td>
			</tr>
			<tr>
				<td class="data">RT/RW</td>
				<td class="data"><?php echo $mahasiswa['RT_RUMAH']; ?></td>
			</tr>
			
			<tr>
				<td class="data">Desa</td>
				<td class="data"><?php echo $mahasiswa['DESA_RUMAH']; ?></td>
			</tr>
			
			<tr>
				<td class="data">Kabupaten</td>
				<td class="data"><?php echo $mahasiswa['NM_KAB_RUMAH']; ?></td>
			</tr>
			<tr>
				<td class="data">Propinsi</td>
				<td class="data"><?php echo $mahasiswa['NM_PROP_RUMAH']; ?></td>
			</tr>
			<tr>
				<td class="data">Alamat Jogja</td>
				<td class="data"><?php echo $mahasiswa['ALAMAT_JOGJA']; ?></td>
			</tr>
			<tr>
				<td class="data">RT/RW</td>
				<td class="data"><?php echo $mahasiswa['RT_JOGJA']; ?></td>
			</tr>
			<tr>
				<td class="data">Kecamatan</td>
				<td class="data"><?php echo $mahasiswa['NM_KEC_JOGJA']; ?></td>
			</tr>
			<tr>
				<td class="data">Kabupaten</td>
				<td class="data"><?php echo $mahasiswa['NM_KAB_JOGJA']; ?></td>
			</tr>
		
			</table>
			<?php
			}
			?>
		
			</div>
		</div>
	</div>