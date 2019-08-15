<!DOCTYPE html>
<html lang="en">
<?php
error_reporting(0);
include "../config/Koneksi.php";
session_start();

?>	
<style>
<meta name="viewport" content="width=device-width; initial-scale=1, maximum-scale=1, user-scalable=0">
</meta>
</style>


<head>
	<meta charset="utf-8">

	<link rel="shortcut icon" href="img/logo/logo_LT.png">
	<title>Visit Kampar</title>
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
        background-image:url(img/load/web.gif); /* path to your loading animation */
        background-repeat:no-repeat;
        background-position:center;
        margin:-10px 0 0 -100px; /* is width and height divided by two */
       }
     </style>
     


  <!-- data table -->

  
    
</head>

<body>
		<!-- bagian top bar-->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<!--Logo disini-->
				<a class="lingga" href="index.php?module="> <span><font style="font-family: arial"></span></a></font>
				
				
				<!-- tema - pemilihan tema -->
				<div class="btn-group pull-right theme-container" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-tint"></i>
					
					</a>
					<ul class="dropdown-menu" id="themes"><font style="font-family: arial">
						<li><a data-value="redy" href="#"><i class="icon-blank"></i> Merah</a></li>
						<li><a data-value="cerulean" href="#"><i class="icon-blank"></i> Hijau (Default)</a></li>
						<li><a data-value="classic" href="#"><i class="icon-blank"></i> Hitam</a></li>
						<li><a data-value="blue" href="#"><i class="icon-blank"></i> Biru</a></li>
						<li><a data-value="simplex" href="#"><i class="icon-blank"></i> Putih</a></li></font>
						<li><a data-value="slate" href="#"><i class="icon-blank"></i> Slate</a></li>
						<li><a data-value="cyborg" href="#"><i class="icon-blank"></i> Hitam</a></li>
						<li><a data-value="journal" href="#"><i class="icon-blank"></i> Putih</a></li>
						<li><a data-value="spacelab" href="#"><i class="icon-blank"></i> Spacelab</a></li>
						<li><a data-value="united" href="#"><i class="icon-blank"></i> Orange</a></li>
					</ul>
				</div>
				
				<!-- tema - penutop -->
				
				
<li class="divider"></li>
<!--<center><a href="#" class="btn btn-setting btn-round btn-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-off"></i> Log out&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li></center>-->
					</ul>
				</div>
				</div><!--span disini-->
  
            <div class='clearfix'></div>
          </div>
        </div>
      </div>
          
      </div><!--content.span10-->
        </div><!--fluid-row-->
				<!--<div class='modal hide fade' id='myModal'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal'>×</button>
        <h3><b><font size="2"><i class="icon-warning-sign"></i> Logout ?</font></b></h3>
      </div>
      <div class='modal-body'>
        <p>Apakah anda yakin ingin keluar?</p>
      </div>
      <div class='modal-footer'>
       <a href='logout.php' class='btn btn-success'>                     <i class="icon-ok icon-white"></i> Ya</a>
        <a href='logout.php' class='btn btn-danger' data-dismiss='modal'><i class='icon-remove icon-white'></i> Tidak</a>
				-->
			</div>
		</div>
	</div>

	<!-- penutop top bar -->
		<div class="container-fluid">
		<div class="row-fluid">
				
			<!-- left menu --><font style="font-family: arial">
			<div class="span2 main-menu-span">
				<div class="well nav-collapse sidebar-nav">
				<ul class="nav nav-tabs nav-stacked main-menu">
				<li class="nav-header hidden-tablet"><center>
						<a href='index.php?module='><img src='img/logo/logo_LT.png'></a> </img><center><br></li>
					
					
<li><a class="ajax-link" href="index.php?module="><i class="icon-home"></i><span class="hidden-tablet"> Home</span></a></li>

<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-list-alt"></i><span class="hidden-tablet"> Kelola Informasi<font color="white"><b class="caret"></b></font></a>
              <ul class="dropdown-menu">
<li><a class="ajax-link" href="index.php?module=tourism"><i class="icon-globe"></i><span class="hidden-tablet"> Objek Wisata</span></a></li>
<!--<li class="divider"></li>
<li><a class="ajax-link" href="index.php?module=event"><i class="icon-star"></i><span class="hidden-tablet"> Rumah Sakit</span></a></li>-->				
<li class="divider"></li>
<li><a class="ajax-link" href="index.php?module=tibadah"><i class="icon-flag"></i><span class="hidden-tablet"> Tempat Ibadah</span></a></li>
<li class="divider"></li>
<li><a class="ajax-link" href="index.php?module=hotel"><i class="icon-glass"></i><span class="hidden-tablet"> Hotel & Penginapan</span></a></li>
<li class="divider"></li>
<li><a class="ajax-link" href="index.php?module=transportasi"><i class="icon-plane"></i><span class="hidden-tablet"> SPBU & Pertamina</span></a></li>
<li class="divider"></li>
<li><a class="ajax-link" href="index.php?module=perbelanjaan"><i class="icon-shopping-cart"></i><span class="hidden-tablet"> Perbelanjaan</span></a></li>
<li class="divider"></li>
<li><a class="ajax-link" href="index.php?module=pemerintahan"><i class="icon-bell"></i><span class="hidden-tablet"> Puskesmas & Rumah Sakit</span></a></li>
<li class="divider"></li>
                
              </ul>
            </li>        
<li><a class="ajax-link" href="index.php?module=profil"><i class="icon-thumbs-up"></i><span class="hidden-tablet"> Profil Kab.Kampar</span></a></li>
<!--<li><a class="ajax-link" href="index.php?module=file-manager"><i class="icon-folder-open"></i><span class="hidden-tablet"> File Manager</span></a></li>-->
<!--<li><a class="ajax-link" href="index.php?module=gallery"><i class="icon-picture"></i><span class="hidden-tablet"> Gallery</span></a></li>-->
<li><a  href="index.php?module=admin"><i class="icon-cog"></i><span class="hidden-tablet"> Data Admin</span></a></li>
<li><a  href="logout.php"><i class="icon-off"></i><span class="hidden-tablet"> Logout</span></a></li>
						<!--<li class="nav-header hidden-tablet">Sample Section</li>
						<li><a class="ajax-link" href="table.html"><i class="icon-align-justify"></i><span class="hidden-tablet"> Tables</span></a></li>
						<li><a class="ajax-link" href="calendar.html"><i class="icon-calendar"></i><span class="hidden-tablet"> Calendar</span></a></li>
						<li><a class="ajax-link" href="grid.html"><i class="icon-th"></i><span class="hidden-tablet"> Grid</span></a></li>
						
						<li><a href="tour.html"><i class="icon-globe"></i><span class="hidden-tablet"> Tour</span></a></li>
						<li><a class="ajax-link" href="icon.html"><i class="icon-star"></i><span class="hidden-tablet"> Icons</span></a></li>
						<li><a href="error.html"><i class="icon-ban-circle"></i><span class="hidden-tablet"> Error Page</span></a></li>
						<li><a href="login.html"><i class="icon-lock"></i><span class="hidden-tablet"> Login Page</span></a></li>-->
					</ul>
					
				</div><!--/.well -->
			</div><!--/span-->
			<!-- left menu penutop -->
			
			
			
			<div id="content" class="span10">
			<!-- content kotak start -->
			 <?php
session_start();

if (empty($_SESSION[username]) AND empty($_SESSION[passuser])){
  echo "
 <center> <div class='col-lg-12'>
 <div class='col-lg-12'><div class='col-lg-12'><div class='col-lg-12'><div class='col-lg-12'>
 <div class='col-lg-12'><div class='col-lg-12'><div class='col-lg-12'><div class='col-lg-12'>
 <div class='col-lg-12'><div class='col-lg-12'><div class='col-lg-12'><div class='col-lg-12'>
 <div class='col-lg-12'><div class='col-lg-12'><div class='col-lg-12'><div class='col-lg-12'>
 <div class='col-lg-12'><div class='col-lg-12'><div class='col-lg-12'><div class='col-lg-12'>
 <div class='col-lg-12'><div class='col-lg-12'><div class='col-lg-12'> <div class='alert alert-danger alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <b>Mohon Maaf !</b>
              <br>Anda tidak memiliki izin untuk mengakses sistem ini.
              <br>Silahkan Login kembali dengan hak akses yang telah terdaftar. <a class='alert-link'><br><br><a href='logout.php' class='btn btn-danger'>&nbsp;&nbsp;&nbsp;Logout&nbsp;&nbsp;&nbsp;</a></a>
            </div><br>";
  echo "



  ";
}
else{
?>



<?php include "content.php"; ?>
	 <div id="preloader">
      <div id="status"></div>
     </div>		
<br><br><br>
<!-- footer start disini -->				
		<footer>
			<p class="pull-left">&copy;&nbsp;<font color="black">Dinas Kebudayaan dan Pariwisata Kabupaten Kampar</font></a><font color="green"> 2018</font></p>
			<p class="pull-right"><font color="black">Kabupaten Kampar | Provinsi Riau</font></a></p>
		</footer>
		
	</div>
	 <script type="text/javascript">
      $(window).load(function() { // makes sure the whole site is loaded
      $("#status").fadeOut(); // will first fade out the loading animation
      $("#preloader").delay(350).fadeOut("slow"); // will fade out the white DIV that covers the website.
      })
     </script>
	<!-- end style -->				
	<script src="js/jquery-1.7.2.min.js"></script>
	<!-- jQuery UI -->
	<script src="js/jquery-ui-1.8.21.custom.min.js"></script>
	<!-- transition / effect library -->
	<script src="js/bootstrap-transition.js"></script>
	<!-- alert enhancer library -->
	<script src="js/bootstrap-alert.js"></script>
	<!-- modal / dialog library -->
	<script src="js/bootstrap-modal.js"></script>
	<!-- custom dropdown library -->
	<script src="js/bootstrap-dropdown.js"></script>
	<!-- scrolspy library -->
	<script src="js/bootstrap-scrollspy.js"></script>
	<!-- library for creating tabs -->
	<script src="js/bootstrap-tab.js"></script>
	<!-- library for advanced tooltip -->
	<script src="js/bootstrap-tooltip.js"></script>
	<!-- popover effect library -->
	<script src="js/bootstrap-popover.js"></script>
	<!-- button enhancer library -->
	<script src="js/bootstrap-button.js"></script>
	<!-- accordion library (optional, not used in demo) -->
	<script src="js/bootstrap-collapse.js"></script>
	<!-- carousel slideshow library (optional, not used in demo) -->
	<script src="js/bootstrap-carousel.js"></script>
	<!-- autocomplete library -->
	<script src="js/bootstrap-typeahead.js"></script>
	<!-- tour library -->
	<script src="js/bootstrap-tour.js"></script>
	<!-- library for cookie management -->
	<script src="js/jquery.cookie.js"></script>
	<!-- calander plugin -->
	<script src='js/fullcalendar.min.js'></script>
	<!-- data table plugin -->
	<script src='js/jquery.dataTables.min.js'></script>

	<!-- chart libraries start -->
	<script src="js/excanvas.js"></script>
	<script src="js/jquery.flot.min.js"></script>
	<script src="js/jquery.flot.pie.min.js"></script>
	<script src="js/jquery.flot.stack.js"></script>
	<script src="js/jquery.flot.resize.min.js"></script>
	<!-- chart libraries end -->

	<!-- select or dropdown enhancer -->
	<script src="js/jquery.chosen.min.js"></script>
	<!-- checkbox, radio, and file input styler -->
	<script src="js/jquery.uniform.min.js"></script>
	<!-- plugin for gallery image view -->
	<script src="js/jquery.colorbox.min.js"></script>
	<!-- rich text editor library -->
	<script src="js/jquery.cleditor.min.js"></script>
	<!-- notification plugin -->
	<script src="js/jquery.noty.js"></script>
	<!-- file manager library -->
	<script src="js/jquery.elfinder.min.js"></script>
	<!-- star rating plugin -->
	<script src="js/jquery.raty.min.js"></script>
	<!-- for iOS style toggle switch -->
	<script src="js/jquery.iphone.toggle.js"></script>
	<!-- autogrowing textarea plugin -->
	<script src="js/jquery.autogrow-textarea.js"></script>
	<!-- multiple file upload plugin -->
	<script src="js/jquery.uploadify-3.1.min.js"></script>
	<!-- history.js for cross-browser state change on ajax -->
	<script src="js/jquery.history.js"></script>
	<!-- application script for Charisma demo -->
	<script src="js/charisma.js"></script>

	<script src='libs/jquery.min.js'></script>
    <script src='libs/jquery.multiple.select.js'></script>
    <link rel='stylesheet' href='libs/multiple-select.css'/>
	
		
</body>
</html>
<?php } ?>