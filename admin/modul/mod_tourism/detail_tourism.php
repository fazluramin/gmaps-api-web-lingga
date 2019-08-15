<?php
$aksi="modul/mod_tourism/aksi_tourism.php";
switch($_GET[act]){
  // Tampil User
  default:
      $tampil = mysql_query("SELECT * FROM tbl_owisata ORDER BY id_wisata DESC");

  
  case "lihat":
       $tampil = mysql_query("SELECT * FROM tbl_owisata WHERE id_wisata='$_GET[id]'");
    $t=mysql_fetch_array($tampil);

    echo "
   <div>
        <ul class='breadcrumb'>
          <li>
            <a href='index.php?module=' style='text-decoration:none'><i class='icon-home'></i> <font color='black'> Home</font></a> <span class='divider'>/</span>
          </li>
             <a href='index.php?module=tourism' style='text-decoration:none'><li class='active'><i class='icon-map-marker'></i> Objek Wisata</font></a> 
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
            <a href='index.php?module=tourism' type=button class='btn btn btn-danger'><i class='icon icon-white icon-arrowreturn-se'></i></a> 
            <a href='?module=tourism&act=update&id=$t[id_wisata]' type=button class='btn btn-warning'><i class='icon-edit icon-white'></i></a> | <i class='icon-eye-open'></i><font color='green'> Objek Wisata : $t[nama_owisata]</font></h2>            
            <div class='box-icon'>
              <a href='#' class='btn btn-minimize btn-round'><i class='icon-chevron-up'></i></a>
              <a href='#' class='btn btn-close btn-round'><i class='icon-remove'></i></a>
            </div>
          </div>
          <div class='box-content'>

    <table class='table table-striped table-bordered bootstrap-datatable datatable' width='100%' border='0' align='center' cellpadding='10' cellspacing='10'>
  <tr>
    <td width='10%'>Objek Wisata</td>
    <td width='23%'><span class='input-xlarge uneditable-input' style='width: 220px;'>$t[nama_owisata]</span></td>
    <td colspan='2' rowspan='7'>
     


    ";?>
  
    <?php
    include "modul/mod_tourism/map.php";
    ?>
     
<?php echo"
    </form>
    </td>
  </tr>
  <tr>
    <td height=''>Fasilitas</td>
    <td><textarea readonly style='width: 215px; height: 100px;'>";?>
<?php
function is_fasilitas_selected($id_fasilitas,$id_wisata){
$jml=mysql_num_rows(mysql_query("select * from tbl_owisata where id_wisata='$id_wisata' and fasilitas like '%$id_fasilitas%'"));
return $jml;}
//menyiapkan jenis hobi kedalam aray
$fasilitas= array('Tempat Makan','Gazebo','Taman Bermain','Kamar Kecil','Penginapan','Perlengkapan Renang','Free Wifi','Mushola','Parkir','Khusus Anak');
echo "";
  $fasilitas_tmp=explode(',',$t['fasilitas']);
  for ($c=0;$c<count($fasilitas_tmp);$c++){
  $satu_fasilitas=$fasilitas_tmp[$c];
  echo $fasilitas[$satu_fasilitas].", ";
};
?><?php echo"</textarea>
    </td>
    
  </tr>
  <tr>

    <td height=''>Alamat</td>
    <td><textarea readonly style='width: 215px;'>$t[alamat]</textarea></td>
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
    <a title='$t[foto]' href='img/gallery/wisata/$t[foto]'><img src='img/gallery/wisata/$t[foto]' style='width: 600px; height: 230px;'></a></td>
    <td colspan='2'>$t[pengantar]</td>
  </tr>
</table>



              <div class='panel-body'>

  </div></div>";
  break; 
}
?>
</div></div></div></div></div></div></div></div></div></div>
