<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Detail Peserta KKN | LPM UIN Sunan Kalijaga Yogyakarta</title>

	<div id="rightContent">
							

							<?php echo form_open_multipart('mahasiswa/do_upload_foto');?>
							<table class="form form_login">
								<tbody>


									<div class="harus_diisi">
										<?php echo validation_errors(); ?>
									</div>


									<table class="form form_login">
										<tbody>
											
											
											<tr>
												
												<td class="txt_login"><input type="file" name="foto"
													id="foto" class="txt_login">
												
												</td>
												<td><input type="submit" name="subloginx"
													 value="Simpan"/>
												
												</td>
											</tr>

										</tbody>
									</table>

									</form>
									
									<table border="0">
									<tr>
											<td ><img
									src="<?php echo base_url();?>uploads/foto/<?php echo $mahasiswa->PATH_FOTO; ?>" width="300" align="center">
								
										</td>
									</tr>
										
										
										
									</table>
</div>
