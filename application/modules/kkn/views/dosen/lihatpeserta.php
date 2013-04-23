<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Detail Peserta KKN | LPM UIN Sunan Kalijaga Yogyakarta</title>

<link href="<?php echo base_url(); ?>res/css/dosen-style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/angkatan.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/js/jquery-ui.css" type="text/css" media="all" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/js/ui.theme.css" type="text/	css" media="all" />
		<script src="<?php echo base_url();?>assets/js/jquery.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/jquery-ui.min.js" type="text/javascript"></script></head>

</head>
<div id="rightContent">
		<h3>Silahkan Pilih Nama Kelompok kemudian Tekan Tombol Lihat Anggota Kelompok</h3>
   <center>
    <form method="post" action="<?php echo base_url(); ?>dosen/lihatanggota">
	
      
      
      
	  
	
		<table border='0'>
                                <tr>
                                                <td>
												
												<span class="label">TA</span>
												<div id="ta">
												   <?php
													echo form_dropdown("id_ta",$option_ta,"","id='id_ta'");?>
													<?php echo form_error('id_ta'); ?>
											  </div>
      
												
												</td>
												
												
												
                                                <td>
												
													<span >Periode</span>
													<div id="periode">
														
															<?php
														echo form_dropdown("id_periode",array('Pilih Periode '=>'Pilih TA Dahulu'),'','disabled');
															?>
														<?php echo form_error('id_periode'); ?>
													</div>
																							
												</td>
												
												<td>
													<span >Angkatan: </span>
													<div id="angkatan">
														
															<?php
														echo form_dropdown("id_angkatan",array('Pilih Angkatan '=>'Pilih TA Dahulu'),'','disabled');
															?>
														<?php echo form_error('id_angkatan'); ?>
													</div>
												
												
												</td>
												
												<td>
													<span >Kelompok: </span>
													<div id="kelompok">
														
															<?php
														echo form_dropdown("id_kelompok",array('Pilih Kelompok '=>'Pilih Angkatan Dahulu'),'','disabled');
															?>
														<?php echo form_error('id_kelompok'); ?>
													</div>
												
												
												</td>
                                </tr>

         
                </table>
					<br/>
	
		
		 
		 
		
		
      
	  
	  
	  
	  
        <div id="field">
            <span class="label">&nbsp;</span>
            <?php echo form_submit(array('name'=>'submit','id'=>'submit','value'=>'Lihat Kelompok KKN yang dibina'));?>
		
            
        </div>
		<br/>
        <?php echo form_close(); ?>
			</center>
    </div>
   
<script type="text/javascript">
	  	$("#id_ta").change(function(){
	    		var selectValues = $("#id_ta").val();
	    		if (selectValues == 0){
	    			var msg = "<br><select name=\"id_periode\" disabled><option value=\"Pilih periode\">Pilih TA Dahulu</option></select>";
	    			$('#periode').html(msg);
	    		}else{
	    			var id_ta = {id_ta:$("#id_ta").val()};
	    			$('#id_periode').attr("disabled",true);
	    			$.ajax({
							type: "POST",
							url : "<?php echo site_url('dosen/select_periode_d')?>",
							data: id_ta,
							success: function(msg){
								$('#periode').html(msg);
							}
				  	});
	    		}
	    });
	   </script>
	   
	   
<script type="text/javascript">
	  	$("#id_ta").change(function(){
	    		var selectValues = $("#id_ta").val();
	    		if (selectValues == 0){
	    			var msg = "<br><select name=\"id_angkatan\" disabled><option value=\"Pilih Angkatan\">Pilih TA Dahulu</option></select>";
	    			$('#angkatan').html(msg);
	    		}else{
	    			var id_ta = {id_ta:$("#id_ta").val()};
	    			$('#id_angkatan').attr("disabled",true);
	    			$.ajax({
							type: "POST",
							url : "<?php echo site_url('dosen/select_angkatan_d')?>",
							data: id_ta,
							success: function(msg){
								$('#angkatan').html(msg);
							}
				  	});
	    		}
	    });
	   </script>
	   
	   
	   <script type="text/javascript">
	  	$("#id_angkatan").change(function(){
	    		var selectValues = $("#id_angkatan").val();
	    		if (selectValues == 0){
	    			var msg = "<br><select name=\"id_kelompok\" disabled><option value=\"Pilih Kelompok\">Pilih Angkatan Dahulu</option></select>";
	    			$('#kelompok').html(msg);
	    		}else{
	    			var id_angkatan = {id_angkatan:$("#id_angkatan").val()};
	    			$('#id_kelompok').attr("disabled",true);
	    			$.ajax({
							type: "POST",
							url : "<?php echo site_url('dosen/select_kelompok_d')?>",
							data: id_ta,
							success: function(msg){
								$('#kelompok').html(msg);
							}
				  	});
	    		}
	    });
	   </script>
	   
