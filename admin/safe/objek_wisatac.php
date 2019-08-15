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
    </body>
</html>