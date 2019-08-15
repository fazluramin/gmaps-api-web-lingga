<?php
$aksi="modul/mod_perbelanjaan/aksi_perbelanjaan.php";
switch($_GET[act]){
  // Tampil User
  default:
      $tampil = mysql_query("SELECT * FROM tbl_perbelanjaan ORDER BY id_perbelanjaan DESC");

  
  case "lihat":
       $tampil = mysql_query("SELECT * FROM tbl_perbelanjaan WHERE id_perbelanjaan='$_GET[id]'");
    $t=mysql_fetch_array($tampil);

    echo "
   <div>
        <ul class='breadcrumb'>
          <li>
            <a href='index.php?module=' style='text-decoration:none'><i class='icon-home'></i> <font color='black'> Home</font></a> <span class='divider'>/</span>
          </li>
             <a href='index.php?module=perbelanjaan' style='text-decoration:none'><li class='active'><i class='icon-map-marker'></i> Perbelanjaan</font></a> 
          <span class='divider'>/</span>
          </li>
          <li>
            <a style='text-decoration:none'><i class='icon-eye-open'></i><font color='grey'> Detail</font></a> 
          </li>
        </ul>
      </div>

      <div class='row-fluid sortable'>    
        <div class='box span12'>
          <div class='box-header well' data-original-title>
            <h2>
            <a href='index.php?module=perbelanjaan' type=button class='btn btn btn-danger'><i class='icon icon-white icon-arrowreturn-se'></i></a> 
            <a href='?module=perbelanjaan&act=update&id=$t[id_perbelanjaan]' type=button class='btn btn-warning'><i class='icon-edit icon-white'></i></a> | <i class='icon-eye-open'></i><font color='green'> Perbelanjaan : $t[nama_perbelanjaan]</font></h2>            
            <div class='box-icon'>
              <a href='#' class='btn btn-minimize btn-round'><i class='icon-chevron-up'></i></a>
              <a href='#' class='btn btn-close btn-round'><i class='icon-remove'></i></a>
            </div>
          </div>
          <div class='box-content'>

    <table class='table table-striped table-bordered bootstrap-datatable datatable' width='100%' border='0' align='center' cellpadding='10' cellspacing='10'>
  <tr>
    <td width='10%'>Perbelanjaan</td>
    <td width='23%'><span class='input-xlarge uneditable-input' style='width: 220px;'>$t[nama_perbelanjaan]</span></td>
    <td colspan='2' rowspan='7'>
     


    ";?>
  
    <?php
    include "modul/mod_perbelanjaan/map.php";
    ?>
     
<?php echo"
    </form>
    </td>
  </tr>

  <tr>
    <td height=''>Alamat</td>
    <td><textarea readonly style='width: 215px;'>$t[alamat]</textarea></td>
  </tr>
  <tr>
    <td height=''>Telepon</td>
    <td><span class='input-xlarge uneditable-input' style='width: 220px;'>$t[telepon]</span></td>    
  </tr>
  <tr>
    <td height=''>Kategori</td>
    <td><span class='input-xlarge uneditable-input' style='width: 220px;'>$t[kategori]</span></td>    
  </tr>
  <tr>
    <td height=''>Latitude</td>
    <td><span class='input-xlarge uneditable-input' style='width: 220px;'><i class='icon-screenshot'></i> $t[latitude]</span></td>    
  </tr>
  <tr>
    <td height=''>Longitude</td>
    <td><span class='input-xlarge uneditable-input' style='width: 220px;'><i class='icon-screenshot'></i> $t[longitude]</span></td>    
  </tr>
   <tr>
    <td height=''>Foto</td>
    <td><span class='input-xlarge uneditable-input' style='width: 220px;'>$t[foto]</span></td>    
  </tr>
  <tr>
    <td height='165' colspan='2'>
    <center>
    <a title='$t[foto]' href='img/gallery/wisata/$t[foto]'><img src='img/gallery/belanja/$t[foto]' style='width: 600px; height: 230px;'></a></td>
    <td colspan='2'><textarea readonly  style='width: 685px; height: 220px;'>$t[pengantar]</textarea></td>
  </tr>
</table>



              <div class='panel-body'>

  </div></div>";
  break; 
}
?>
</div></div></div></div></div></div></div></div></div></div>
