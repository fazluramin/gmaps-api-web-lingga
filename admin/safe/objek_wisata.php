<center>
<?php

$host="localhost";
$user="root";
$pass="";
$db="lingga";
$conn=mysql_connect($host,$user,$pass,$db);
if ($conn){
	$buka=mysql_select_db($db);
	if(!$buka){
		die("Database tidak ditemukan");
	}}
else
	{
	die("Server mySQL tidak terkoneksi");
	}

session_start();
?>

<html lang="en">

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
<head>
</head>
<body>
    <div class="page">
        <div class="header">                        




    <head>
		<style>	
			@import url(http://fonts.googleapis.com/css?family=Raleway:400,700);
			body {
				background: #ffffff url(backgroundlog) repeat center top;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				background-size: cover;
			}
			.container > header h1,
			.container > header h2 {
				color: #000;
				text-shadow: 0 1px 1px rgba(0,0,0,0.7);
			}
		</style>
    </head>

    <body>
        <div class="container">
		
			<!-- Codrops top bar --><!--/ Codrops top bar -->
			
	 
<?php

$row = 20;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql = "SELECT * FROM tbl_owisata";
$pageQry = mysql_query($pageSql) or die ("error paging: ".mysql_error());
$jml	 = mysql_num_rows($pageQry);
$max	 = ceil($jml/$row);
?>

<table class='table table-striped table-bordered bootstrap-datatable datatable' >
                
				
                	<thead>
					<tr>
						
					 </tr>
                    	<tr class="success"  bgcolor="white" align="center"> 
                        </tr>
                    </thead>
					<?php
	$mySql = "SELECT * FROM tbl_owisata ORDER BY id_wisata ASC LIMIT $hal, $row";
	$myQry = mysql_query($mySql)  or die ("Query salah : ".mysql_error());
	$nomor  = 0; 
	while ($kolomData = mysql_fetch_array($myQry)) {
		$nomor++;
		$Kode = $kolomData['id_wisata'];
	?>
                    <tbody>
                    	<tr>
                            <td><center>
                            	<a href="http://maps.google.com/?q=<?php echo $kolomData['latitude']; ?>,<?php echo $kolomData['longitude']; ?>">
                            	<img src="../admin/img/gallery/wisata/<?php echo $kolomData['foto']; ?>" width="60" height="40"></td></a>
                            <td><b><a style="text-decoration:none" href="http://maps.google.com/?q=<?php echo $kolomData['latitude']; ?>,<?php echo $kolomData['longitude']; ?>">
                            	<font size="3" color="black">
                            	<?php echo $kolomData['nama_owisata']; ?></b></font>
                            	<br><font size="1" color="black"></i><?php echo $kolomData['kategori']; ?></font></i></a>
							</td>
							
                        </tr>
                    </tbody>
					 <?php } ?>
                </table>
                
                <table class=" table table-condensed">
                
                           <tr align="center"> 
                           <td>
						   <div class="pagination">
                                	<ul>
                         
                             </ul>
                                </div>   	
                           </td>
                           
                           
                           
                           </tr>
                   </table>     

		</table>	
			
        </div>
</center>
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
    