
<div id="content">
	<div id="content-space">
					<div class="post-desc" >
						Upload Dokumen persyaratan KKN dibawah ini, filed yang wajib diisi
						adalah field foto, SK Sehat dari dokter, SK Golongan darah (sudah di input PoliKlinik). Untuk
						SK Cuti Kerja harus di upload jika mahasiswa sudah bekerja, dan
						untuk SK Tidak hamil harus di upload bagi mahasiswi yang sudah
						menikah.

					</div>
					<br>

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
				<?php echo form_open_multipart('kkn/kkn_mhs/do_upload_foto_front');?>
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
				<?php echo form_open_multipart('kkn/kkn_mhs/do_upload_hamil_front');?>
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
				<?php echo form_open_multipart('kkn/kkn_mhs/do_upload_kerja_front');?>
				<input type="file" name="userfile" id="sk_cuti_kerja" class="txt_login">
				<input type="submit" name="subloginx" value="Simpan"  class="btn"/>
				</form>
				</td>

			</tr>
			<tr>
			<td>
			</td>
			<td>
			
			<a href="<?php echo base_url(); ?>kkn/kkn_mhs/from_uploaddoc" class="btn-uin btn-inverse btn btn-large">Lanjut </a>
			</td>
			</tr>
			
			</table>
			
			<?php
			}
			?>
		</div>
</div>
</div>