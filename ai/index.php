<!DOCTYPE html>
<html lang="en">
<?php
error_reporting(0);
include "../config/Koneksi.php";
session_start();

?>	
<body >
<style>
<meta name="viewport" content="width=device-width; initial-scale=1, maximum-scale=1, user-scalable=0">
</meta>
</style>

</body>
</html>

	<meta charset="utf-8">
	<title>Navigasi Pariwisata Lingga</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	


	<!-- Style disini -->
	<link id="bs-css" href="css/bootstrap-lingga.css" rel="stylesheet">

	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>

	<link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href="css/charisma-app.css" rel="stylesheet">
	<link href="css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
	<link href='css/fullcalendar.css' rel='stylesheet'>
	<link href='css/fullcalendar.print.css' rel='stylesheet'  media='print'>
	<link href='css/chosen.css' rel='stylesheet'>
	<link href='css/uniform.default.css' rel='stylesheet'>
	<link href='css/colorbox.css' rel='stylesheet'>
	<link href='css/jquery.cleditor.css' rel='stylesheet'>
	<link href='css/jquery.noty.css' rel='stylesheet'>
	<link href='css/noty_theme_default.css' rel='stylesheet'>
	<link href='css/elfinder.min.css' rel='stylesheet'>
	<link href='css/elfinder.theme.css' rel='stylesheet'>
	<link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
	<link href='css/opa-icons.css' rel='stylesheet'>
	<link href='css/uploadify.css' rel='stylesheet'>
	<script type='text/javascript' src='../../js/comment-reply.min.js?ver=3.8.13'></script>
	<script type='text/javascript' src='js/jquery.min.js'></script>
	<!--<script>
     $(document).ready(function() {
      var table = $('#example').DataTable();
     } );
     </script>
                <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <script type="text/javascript" src="../nicEdit.js"></script>
        <script type="text/javascript">
          bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
        </script>-->
        </script>

	

	
	<link rel="shortcut icon" href="img/logo/logo_LT.png">
		<style>
       #preloader {
        position:fixed;
        top:0;
        left:0;
        right:0;
        bottom:0;
        background-color:#ffffff; /* change if the mask should have another color then white */
        z-index:99; /* makes sure it stays on top */
       }

       #status {
        width:200px;
        height:200px;
        position:absolute;
        left:50%; /* centers the loading animation horizontally one the screen */
        top:30%; /* centers the loading animation vertically one the screen */
        background-image:url(img/load/mob.gif); /* path to your loading animation */
        background-repeat:no-repeat;
        background-position:center;
        margin:-10px 0 0 -100px; /* is width and height divided by two */
       }
     </style>
     


  <!-- data table -->

  
    
</head>

<body>
	<center>
		<!-- bagian top bar-->
	
				
				<!-- tema - penutop -->
				
				<!-- user - dropdown -->

				
<!--			<center>			
			<div class="span4">&nbsp;
			
</div>
<div id="content" align="center"  class="span4">

	 <div id="preloader">
      <div id="status"></div>
     </div>		</div>		
<div class="span4">&nbsp;</div>-->
			
			
<div id="content" >
			<!-- content kotak start -->

<center>
<?php include "content.php"; ?>
	 <div id="preloader">
      <div id="status"></div>
     </div>		

		
	</div>
	 <script type="text/javascript">
      $(window).load(function() { // makes sure the whole site is loaded
      $("#status").fadeOut(); // will first fade out the loading animation
      $("#preloader").delay(350).fadeOut("slow"); // will fade out the white DIV that covers the website.
      })
     </script>
	<!-- end style -->				
	
	<!-- data table plugin -->
	

	<!-- chart libraries start -->
	<script src="js/excanvas.js"></script>
	<script src="js/jquery.flot.min.js"></script>
	<script src="js/jquery.flot.pie.min.js"></script>
	<script src="js/jquery.flot.stack.js"></script>
	<script src="js/jquery.flot.resize.min.js"></script>
	<!-- chart libraries end -->

	<!-- select or dropdown enhancer -->
	
	
		
</body>
</html>