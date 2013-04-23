
   	<?php
    	echo form_dropdown("id_angkatan",$option_angkatan,'',"id='id_angkatan'");
    ?>

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
							url : "<?php echo site_url('dosen/select_kelompok')?>",
							data: id_angkatan,
							success: function(msg){
								$('#kelompok').html(msg);
							}
				  	});
	    		}
	    });
	   </script>