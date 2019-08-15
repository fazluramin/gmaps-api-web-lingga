<center>
  <meta name="viewport" content="width=device-width; initial-scale=1, maximum-scale=1, user-scalable=0">
</meta>
<?php
$aksi="modul/mod_tourism/aksi_tourism.php";
switch($_GET[act]){
  // Tampil User
  default:
      $tampil = mysql_query("SELECT * FROM tbl_tibadah ORDER BY id_tibadah DESC");
      
      echo "
      
          <div class='box-content'>
            <font color='black'>
            <center><table class='table table-striped' width='100%'>
              <thead>
                <tr height='0'>
          <td colspan='3' height='0'><form method='POST' action=?module=religi&act=caridata>
     
     <div class='input-append'>
     <input style='width: 84%;' type=text name='cari' placeholder='Cari Tempat Ibadah' list='auto'>
     <button type='submit' name='Submit' class='btn'><i class='icon-search'></i></button>
     ";
    echo"<datalist id_tibadah='auto'>";
     $qry=mysql_query("SELECT * FROM tbl_tibadah");
     while ($t=mysql_fetch_array($qry)) {
      echo "<option value='$t[nama_tibadah]'></option>";
     }
  echo"</form></td></div></tr>
              </thead>"; 
       $no+=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "
            <td width='25%'><center>
            <a style='text-decoration:none' href='http://maps.google.com/?q=$r[latitude],$r[longitude]'>
            
            <img src='../admin/img/gallery/tibadah/$r[foto]' width='100%' height='35'>

            </a></td>
            <td width='70%'>

            <a style='text-decoration:none' href='http://maps.google.com/?q=$r[latitude],$r[longitude]'>
            <font size='3' color='black'>

            <b>$r[nama_tibadah]</b></font>
            <br><font size='2' color='grey'></i>$r[kategori]&nbsp;</font></i></a>


            </td>

            <td width='5%'><center>
            <a style='text-decoration:none' href='http://maps.google.com/?q=$r[latitude],$r[longitude]'>
            
            <i class='icon32 icon-carat-1-e'></i>

            </a></td>

            ";
      
        
        echo"</tr>
        ";
      $no++;
    }
    echo "</table></font>
    ";



    break;


case "caridata":
      $tampil = mysql_query("SELECT * FROM tbl_tibadah");
      //Form Pencarian Beasiswa

  
  //Tampil Data  Beasiswa
  

  //Tampil Data  Beasiswa
     echo "
      
        <div class='box-content'>
            <font color='black'>
            <center><table class='table table-striped' width='100%'>
              <thead>
                <tr height='0'>
          <td colspan='3' height='0'><form method='POST' action=?module=religi&act=caridata>
     
     <div class='input-append'>
     <input style='width: 84%;' type=text name='cari' placeholder='Cari Tempat Ibadah' list='auto'>
     <button type='submit' name='Submit' class='btn'><i class='icon-search'></i></button>
     ";
    echo"<datalist id_tibadah='auto'>";
     $qry=mysql_query("SELECT * FROM tbl_tibadah");
     while ($t=mysql_fetch_array($qry)) {
      echo "<option value='$t[nama_tibadah]'></option>";
     }
  echo"</form></td></div></tr>
              </thead>"; 
    
   $tampil=mysql_query("SELECT * FROM tbl_tibadah WHERE nama_tibadah LIKE '%$_POST[cari]%'");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
    $user=substr($r[user],0,78);
       echo "    

          <td width='25%'><center>
            <a style='text-decoration:none' href='http://maps.google.com/?q=$r[latitude],$r[longitude]'>
            
            <img src='../admin/img/gallery/tibadah/$r[foto]' width='100%' height='35'>

            </a></td>
            <td width='70%'>

            <a style='text-decoration:none' href='http://maps.google.com/?q=$r[latitude],$r[longitude]'>
            <font size='3' color='black'>

            <b>$r[nama_tibadah]</b></font>
            <br><font size='' color='grey'></i>$r[kategori]&nbsp;</font></i></a>


            </td>

            <td width='5%'><center>
            <a style='text-decoration:none' href='http://maps.google.com/?q=$r[latitude],$r[longitude]'>
            
            <i class='icon32 icon-carat-1-e'></i>

            </a></td>

            ";
      
        
        echo"</tr>
        ";
      $no++;
    }
    echo "</table></font>
    ";
    break;
}
?>
</div></div>