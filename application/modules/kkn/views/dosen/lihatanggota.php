<html>
<head>


<base href="<?php echo base_url() ?>" />

<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/flick/jquery-ui-1.8.21.custom.css" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/styles.css" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/fb-1.css" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/fb-3.css" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/source/fb-buttons.css" />
</head>
<body>
<div id="rightContent">
<div id="ajaxLoadAni">
    <img src="<?php echo base_url() ?>assets/images/ajax-loader.gif" alt="Ajax Loading Animation" />
</div>
<table class='data'>
<tr><th class='data'>Data Mahasiswa KKN</th></tr>
</table>
<div id="tabs">
    

    <div id="read">
        <table id="records">
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
		    <th>Fakultas</th>
		    <th>Hp</th>
		    <th>Nilai</th>
                    <th>Input Nilai</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
  

</div> <!-- end tabs -->

<!-- update form in dialog box -->
<div id="updateDialog" title="Update">
    <div>
        <form action="" method="post">
	  <p>
               <label for="name">NIM:</label>
               <input type="text" id="nim" name="nim" class="inputtext" readonly="true" />
            </p>
            
            <p>
               <label for="email">Nama:</label>
               <input type="text" id="nama" name="nama" class="inputtext" readonly="true"/>
            </p>
	    <p>
               <label for="email">Fakultas:</label>
               <input type="text" id="fak" name="fak" class="inputtext" readonly="true"/>
            </p>
	    <p>
               <label for="email">HP:</label>
               <input type="text" id="hp" name="hp" class="inputtext" readonly="true"/>
            </p>
            <p>
               <label for="name">Nilai:</label>
               <input type="text" id="nilai" name="nilai" class="inputtext" />
            </p>
            
            <input type="hidden" id="userId" name="id" />
        </form>
    </div>
</div>



<!-- message dialog box -->
<div id="msgDialog"><p></p></div>


<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui-1.8.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-templ.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.dataTables.min.js"></script>

 <script type="text/template" id="readTemplate"/>
       <tr id="${NO}">
     
        <td>${NIM}</td>
        <td>${NAMA}</td>
	<td>${FAK}</td>
	<td>${HP_MHS}</td>
	<td>${NILAI}</td>
        <td style="text-align:center;">
        <a class="updateBtn" href="${updateLink}">
            <img src="<?php echo base_url();?>assets/images/edit.png" width="19" height="19"></a>
        </a>
       
        </td>
    </tr>
 </script>

<script type="text/javascript" src="<?php echo base_url() ?>assets/js/all.js"></script>
</div>
</body>

</html>