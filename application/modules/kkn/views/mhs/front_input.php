<div id="content">
	<div id="content-space">
					<div class="post-desc" >
						Pastikan Anda mengisi formulir registrasi online ini sampai
						selesai. Anda Hanya bisa mengisi field yang berwarna putih.

					</div>
					<br>
<?php
	foreach($data as $isi=>$mahasiswa)
	{
			$nim		= $mahasiswa['NIM'];
			$nama		= $mahasiswa['NAMA'];
			$angkatan	= $mahasiswa['ANGKATAN'];
			$tmp_lahir	= $mahasiswa['TMP_LAHIR'];
			$tgl_lahir	= $mahasiswa['TGL_LAHIR'];
			$nm_kec		= $mahasiswa['NM_KEC'];
			$telp_mhs	= $mahasiswa['TELP_MHS'];
			$gol_darah	= $mahasiswa['GOL_DARAH'];
			$berat		= $mahasiswa['BERAT'];
			$tinggi		= $mahasiswa['TINGGI'];
			$pekerjaan	= $mahasiswa['PEKERJAAN'];
			$kawin		= $mahasiswa['STATUS_KAWIN'];
			$almt_mhs	= $mahasiswa['ALAMAT_MHS'];
			$rt			= $mahasiswa['RT'];
			$desa		= $mahasiswa['DESA'];
			$hp_mhs		= $mahasiswa['HP_MHS'];
			$nm_prodi	= $mahasiswa['NM_PRODI'];
			$nm_jur		= $mahasiswa['NM_JURUSAN'];
			$fak		= $mahasiswa['NM_FAK'];
			$j_kelamin	= $mahasiswa['J_KELAMIN'];
			$nm_kab		= $mahasiswa['NM_KAB'];
			$nm_prop	= $mahasiswa['NM_PROP'];
			
	}
?>
						<div >
							<h3>Data Mahasiswa Peserta KKN</h3>
							<!-- You are login as <span id="typenya"><strong><?=$h1;?></strong></span>-->

							<form action="<?php echo base_url(); ?>kkn/kkn_mhs/insertdata" method="POST">
								<table class="table table-hover mid">
										<font color="red">
											<?php echo validation_errors(); ?>
										</font>

										<tr>
											<td valign="top" >Nama</td>
											<td ><input type="text" readonly="true"
												name="nama" 
												value="<?php echo set_value('NAMA',$nama); ?>" />


											</td>
										</tr>

										<tr>
											<td valign="top" >NIM</td>
											<td ><input type="text" readonly="true"
												name="nim" 
												value="<?php echo set_value('NIM',$nim); ?>" />
											</td>
										</tr>
										
										
										<tr>
											<td valign="top" >Tempat,Tgl Lahir</td>
											<td ><input type="text" readonly="true"
												name="ttl" 
												value="<?php echo set_value('TTL',$tmp_lahir.','.$tgl_lahir); ?>" />
											</td>
										</tr>

										<tr>
											<td valign="top" >Fakultas</td>
											<td ><input type="text" readonly="true"
												name="fak" 
												value="<?php echo set_value('NM_FAK',$fak); ?>" />
											</td>
										</tr>
									

										<tr>
											<td valign="top" >Prodi</td>
											<td ><input type="text" readonly="true"
												name="prodi" 
												value="<?php echo set_value('NM_PRODI',$nm_prodi); ?>" />
											</td>
										</tr>

										<tr>
											<td valign="top" >Angkatan</td>
											<td ><input type="text" readonly="true"
												name="angkatan" 
												value="<?php echo set_value('ANGKATAN',$angkatan); ?>" />
											</td>
										</tr>
									
										
										<tr>
											<td valign="top" >Jenis Kelamin</td>
											<td ><input type="text" readonly="true"
												name="j_kelamin" 
												value="<?php echo set_value('J_KELAMIN',$j_kelamin); ?>" />
											</td>
										</tr>

										<tr>
											<td valign="top" >No HP (Pribadi)*</td>
											<td ><input type="text" name="hp_mhs"
												
												value="<?php echo set_value('HP_MHS',$hp_mhs); ?>">
											
											</td>
										</tr>
										

										
										<tr>
											<td valign="top" >Tinggi Badan*</td>
											<td ><input type="text" name="tinggi"
												
												value="<?php echo set_value('TINGGI',$tinggi); ?>" />
											</td>
										</tr>
										<tr>
											<td valign="top" >Berat Badan*</td>
											<td ><input type="text" name="berat"
												
												value="<?php echo set_value('BERAT',$berat); ?>" />
											</td>
										</tr>
										<tr>
											<td valign="top" >Pekerjaan*</td>
											<td ><input type="text" name="pekerjaan"
												
												value="<?php echo set_value('PEKERJAAN',$pekerjaan); ?>" />


											</td>
										</tr>

										<tr>
											<td valign="top" >Status Perkawinan</td>
											<td><?php echo ($kawin == 'B')?form_radio('STATUS_KAWIN','B',true):form_radio('STATUS_KAWIN','B',false); ?>Belum
												Menikah &nbsp; <?php echo ($kawin == 'K')?form_radio('STATUS_KAWIN','K',true):form_radio('STATUS_KAWIN','K',false); ?>Menikah
												&nbsp;</td>
										</tr>

										</tr>
										<tr>
											<td valign="top" >Transportasi*</td>
											<td ><input type="text" name="transportasi"
												
												value="" />
											</td>
										</tr>
										<tr>
											<td valign="top" >Prestasi/Keahlian*</td>
											<td ><input type="text" name="prestasi"
												
												value="" />
											</td>
										</tr>

								</table>

<h3 >Alamat Asal</h3>
								<table class="table table-hover mid">
										<tr>
											<td valign="top" >Alamat Mahasiswa</td>
											<td ><input type="text"
												name="alamat_mhs" 
												value="<?php echo set_value('ALAMAT_MHS',$almt_mhs); ?>" />
											</td>
										</tr>
										<tr>
											<td valign="top" >RT</td>
											<td ><input type="text"
												name="rt" 
												value="<?php echo set_value('RT',$rt); ?>" />
											</td>
										</tr>
										<tr>
											<td valign="top" >Desa/Kelurahan</td>
											<td ><input type="text" 
												name="desa" 
												value="<?php echo set_value('DESA',$desa); ?>" />
											</td>
										</tr>
										<tr>
											<td valign="top" >Kecamatan</td>
											<td ><input type="text"
												name="nm_kec" 
												value="<?php echo set_value('NM_KEC',$nm_kec); ?>" />
											</td>
										</tr>
										<tr>
											<td valign="top" >Kabupaten</td>
											<td ><input type="text"
												name="nm_kab" 
												value="<?php echo set_value('NM_KAB',$nm_kab); ?>" />
											</td>
										</tr>
										<tr>
											<td valign="top" >Propinsi</td>
											<td ><input type="text"
												name="nm_prop" 
												value="<?php echo set_value('NM_PROP',$nm_prop); ?>" />
											</td>
										</tr>
										<tr>
											<td valign="top" >Telp *</td>
											<td ><input type="text" name="telp_mhs"
												
												value="<?php echo set_value('TELP_MHS',$telp_mhs); ?>" /><br />
												Nomor Telp Rumah yang bisa dihubungi (Telp, Bpk, Ibu).</td>
										</tr>
								</table>


								

								<h3 >Alamat Jogja</h3>
								<table class="table  table-hover mid">
										<tr>
											<td valign="top" >Alamat Jogja*</td>
											<td ><input type="text" name="alamat_jogja"
												
												value="" />
											</td>
										</tr>
										<tr>
											<td valign="top" >RT/RW</td>
											<td ><input type="text" name="rt_jogja"
												
												value="" />
											</td>
										</tr>
										<tr>
											<td valign="top" >Desa/Kelurahan*</td>
											<td ><input type="text" name="desa_jogja"
												
												value="" />
											</td>
										</tr>
										<tr>
											<td valign="top" >Kecamatan*</td>
											<td ><input type="text" name="nm_kec_jogja"
												
												value="" />
											</td>
										</tr>
										<tr>
											<td valign="top" >Kabupaten*</td>
											<td ><input type="text" name="nm_kab_jogja"
												
												value="" />
											</td>

											<tr>
												<td></td>
												<td><input type="submit" name="subloginx"
													class="btn" value="Simpan">
												
												</td>
											</tr>
								</table>


							</form>
	</div>
</div>
</div>