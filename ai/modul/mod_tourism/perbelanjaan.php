<center>
  <meta name="viewport" content="width=device-width; initial-scale=1, maximum-scale=1, user-scalable=0">
</meta>

<?php

switch($_GET[act]){
  // Tampil User
  default:
      $tampil = mysql_query("SELECT * FROM tbl_perbelanjaan ORDER BY id_perbelanjaan DESC");
      
      echo "<font color='white' style='font-family: arial' size='2'>
            <font color='black'>
            
              <thead>
                <tr height='0'>
          <td colspan='3' height='35'><form method='POST' action=?module=perbelanjaan&act=caridata>
     
     <div class='input-append'>
     
     <input style='width: 81%;' type=text name='cari' placeholder='Cari Perbelanjaan' list='auto'>
     <button type='submit' name='Submit' class='btn'><i class='icon-search'></i></button>
     
     ";
    echo"<datalist id_perbelanjaan='auto'>";
     $qry=mysql_query("SELECT * FROM tbl_perbelanjaan");
     while ($t=mysql_fetch_array($qry)) {
      echo "<option value='$t[nama_perbelanjaan]'></option>";
     }
  echo"</form>
  </td></div></tr>
              </thead>"; 
       $no+=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<a href='?module=perbelanjaan&act=info&id=$r[id_perbelanjaan]' type='button' style='width: 92%;' class='btn'>
            <table border='0' style='width: 100%;'>
            <tr>
            <td style='width: 30%;'>
            <img src='../admin/img/gallery/belanja/$r[foto]' width:'100' height='50'></td>
            <td style='vertical-align: center ; width: 1%;'>
            </a></td>
            <td style='vertical-align: center ; width: 65%; text-align: left'>

            <a style='text-decoration:none' href='?module=perbelanjaan&act=info&id=$r[id_perbelanjaan]'>
            <!--href='http://maps.google.com/?q=$r[latitude],$r[longitude]'-->
            <font size='2' color='black'>

            <b>$r[nama_perbelanjaan]</b></font>
            <br><font size='1' color='grey'></i>$r[kategori]&nbsp;</font></i></a>
            


            </td>

            <td style='vertical-align: center ; width: 5%;'>
            <a style='text-decoration:none'  href='?module=perbelanjaan&act=info&id=$r[id_perbelanjaan]'>
            
            <i class='icon32 icon-carat-1-e'></i>

            </a></td>
            </tr>           
            
              </font>
                        </tr>
</table></a>
            ";
      
        
        echo"</tr>
        ";
      $no++;
    }
    echo "</table></font>
    ";



    break;


case "caridata":
      $tampil = mysql_query("SELECT * FROM tbl_perbelanjaan");
      //Form Pencarian Beasiswa

  
  //Tampil Data  Beasiswa
  

  //Tampil Data  Beasiswa
     echo "<font color='white' style='font-family: arial' size='2'>
            <font color='black'>
            
              <thead>
                <tr height='0'>
          <td colspan='3' height='35'><form method='POST' action=?module=perbelanjaan&act=caridata>
     
     <div class='input-append'>
     
     <input style='width: 81%;' type=text name='cari' placeholder='Cari Perbelanjaan' list='auto'>
     <button type='submit' name='Submit' class='btn'><i class='icon-search'></i></button>
     
     ";
    echo"<datalist id_perbelanjaan='auto'>";
     $qry=mysql_query("SELECT * FROM tbl_perbelanjaan");
     while ($t=mysql_fetch_array($qry)) {
      echo "<option value='$t[nama_perbelanjaan]'></option>";
     }
  echo"</form>
  </td></div></tr>
              </thead>"; 
    
   $tampil=mysql_query("SELECT * FROM tbl_perbelanjaan WHERE nama_perbelanjaan LIKE '%$_POST[cari]%'");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
    $user=substr($r[user],0,78);
       echo "<a href='?module=perbelanjaan&act=info&id=$r[id_perbelanjaan]' type='button' style='width: 92%;' class='btn'>
            <table border='0' style='width: 100%;'>
            <tr>
            <td style='width: 30%;'>
            <img src='../admin/img/gallery/belanja/$r[foto]' width:'100' height='50'></td>
            <td style='vertical-align: center ; width: 1%;'>
            </a></td>
            <td style='vertical-align: center ; width: 65%; text-align: left'>

            <a style='text-decoration:none' href='?module=perbelanjaan&act=info&id=$r[id_perbelanjaan]'>
            <!--href='http://maps.google.com/?q=$r[latitude],$r[longitude]'-->
            <font size='2' color='black'>

            <b>$r[nama_perbelanjaan]</b></font>
            <br><font size='1' color='grey'></i>$r[kategori]&nbsp;</font></i></a>
            


            </td>

            <td style='vertical-align: center ; width: 5%;'>
            <a style='text-decoration:none'  href='?module=perbelanjaan&act=info&id=$r[id_perbelanjaan]'>
            
            <i class='icon32 icon-carat-1-e'></i>

            </a></td>
            </tr>           
            
              </font>
                        </tr>
</table></a>
            ";
      
        
        echo"</tr>
        ";
      $no++;
    }
    echo "</table></font>
    ";


    break;


    case "info":
//ketika link hapus di klik
       $tampil = mysql_query("SELECT * FROM tbl_perbelanjaan WHERE id_perbelanjaan='$_GET[id]'");
    $t=mysql_fetch_array($tampil);

    echo "
    <table width='100%' border='0' style='font-family: arial;'>
  <tr>
    <!--<td width='50%'></td>

    <td width='75%' style='text-align: right'><a href='http://maps.google.com/?q=$t[latitude],$t[longitude]' type=button class='btn btn-default'>Lihat Peta <i class='icon icon-black icon-sent'></i></a></td>
    <!-- https://www.google.com/maps/dir/-0.5334607,104.5043386/$t[latitude],$t[longitude]/@-0.5693326,104.4931961,13z 
  </tr>-->

  <tr>
    <td colspan='2'>
    <table border='0' width='100%' height='150' background='../admin/img/gallery/belanja/$t[foto]' style='background-size: 100%'>
    <tr>
    <td width='50%' height='5'>
    <a href='index.php?module=perbelanjaan'><img src='../admin/img/btbacktrans.png' width='35%'></a>
    </td>
     <td>
    </td>
    </tr>
     <tr>
     <td>
    </td>
    <td>
    </td>
     </tr>
  </table>
  </td>
  </tr>
  <tr><td></td></tr>
 <tr>
    <td colspan='2' >
    <table border='0' width='100%'>
    <tr>
    <td width='15%' style='vertical-align: top'>
    <center>
    <img src='img/iconperbelanjaan.png' width='90%' height='90%'>
    </td>
    <td>
    <b><font size='4' >$t[nama_perbelanjaan]</b></font>
    <br>
    <font size='2' color='grey'>$t[kategori]</font>
    </td></tr>
    </table>
    </td>
  <tr>
  <td colspan='2' >    
    
    </td>
    </tr>
  </tr>
  <tr>
  <td style='text-align:right' colspan='2'>
  <a href='http://maps.google.com/?q=$t[latitude],$t[longitude]'><img src='img/btnseemap.png' width='35%'>
  </td>
  </tr>
   <tr>
    <td colspan='2'  style='text-align: justify; font-family: arial'>
    <hr style='margin: 5px;'>
    $t[pengantar]    
    <hr style='margin: 5px'>
    </td></font>

  </tr>

  <tr>
    <td>
    </td>
  </tr>
  <tr>
    <td>
    </td>
  </tr>

     <tr>
    <td><b>Telepon</b></td>
    <td>$t[telepon]</td>
  </tr>
    <tr>
    <td width='25%' style='font-family: arial;'><b>Alamat</b><hr style='margin: 5px'></td></font>
    <td width='75%' rowspan='2'  style='font-family: arial;'>
   $t[alamat]<hr style='margin: 5px'>
</td>
  </tr>
  


  <tr>
    <td width='25%' height='100%'>
  </tr>

   <tr>
    <td><b>Latitude</b></td>
    <td> $t[latitude]</td>
  </tr>
  <tr>
    <td><b>Longitude</b></td>
    <td> $t[longitude]</td>
  </tr>

    
  </div></div>


  ";
   break;
}
?>
</div></div>
</table>