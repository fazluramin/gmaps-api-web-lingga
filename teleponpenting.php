<?php
include "config/Koneksi.php";
?>
<body  style="background:url(admin/img/bgprofil.png); background-attachment:fixed">
<center>
<table border="1" width="95%">
                	<thead>
					<tr>
					 </tr>
                    	<tr class="success"  bgcolor="white" align="center">
                        </tr>
                    </thead>
					<?php
	$mySql = "SELECT * FROM tbl_nomor ORDER BY nama ASC";
	$myQry = mysql_query($mySql)  or die ("Query salah : ".mysql_error());
	$nomor  = 0; 
	while ($kolomData = mysql_fetch_array($myQry)) {
		
	?>
                    <tbody>
                    	<tr>
                    		<td width="20%"><img src='admin/img/npenting/<?php echo $kolomData['foto']; ?>' width='70' height='50'></td>
                            <td width="65%"><font color="white" style="font-family: arial" size="2">
                            <b><?php echo $kolomData['nama']; ?></b>
                            <br><?php echo $kolomData['nomor']; ?>
                            <br><?php echo $kolomData['alamat']; ?>
                            </td>
						</tr>						
						<tr><td colspan="2"><hr color="grey">
						</td>
						</tr>
							</font>
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