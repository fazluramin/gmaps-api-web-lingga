<?php
$aksi="modul/mod_hotel/aksi_hotel.php";
switch($_GET[act]){
  // Tampil User
  default:
      $tampil = mysql_query("SELECT * FROM tbl_hotel ORDER BY id_hotel DESC");

  
  case "lihat":
       $tampil = mysql_query("SELECT * FROM tbl_hotel WHERE id_hotel='$_GET[id]'");
    $t=mysql_fetch_array($tampil);

    echo "
   <div>
        <ul class='breadcrumb'>
          <li>
            <a href='index.php?module=' style='text-decoration:none'><i class='icon-home'></i> <font color='black'> Home</font></a> <span class='divider'>/</span>
          </li>
             <a href='index.php?module=hotel' style='text-decoration:none'><li class='active'><i class='icon-map-marker'></i> Hotel & Penginapan</font></a> <span class='divider'>/</span>
          </li>
          <li>
            <a style='text-decoration:none'><i class='icon-eye-open'></i><font color='grey'> Detail Hotel & Penginapan</font></a> <span class='divider'></span>
          </li>
        </ul>
      </div>

      <div class='row-fluid sortable'>    
        <div class='box span12'>
          <div class='box-header well' data-original-title>
            <h2>
            <a href='index.php?module=hotel' type=button class='btn btn btn-danger'><i class='icon icon-white icon-arrowreturn-se'></i></a> 
            <a href='?module=hotel&act=update&id=$t[id_hotel]' type=button class='btn btn-warning'><i class='icon-edit icon-white'></i></a> | <i class='icon-eye-open'></i><font color='green'> Data Penginapan : $t[nama_hotel]</font></h2>            
            <div class='box-icon'>
              <a href='#' class='btn btn-minimize btn-round'><i class='icon-chevron-up'></i></a>
              <a href='#' class='btn btn-close btn-round'><i class='icon-remove'></i></a>
            </div>
          </div>
          <div class='box-content'>

    <table class='table table-striped table-bordered bootstrap-datatable datatable' width='100%' border='0' align='center' cellpadding='10' cellspacing='10'>
  <tr>
    <td width='10%'>Penginapan</td>
    <td width='23%'><span class='input-xlarge uneditable-input' style='width: 220px;'>$t[nama_hotel]</span></td>
    <td colspan='2' rowspan='9'>
    ";?>
    <?php
    include "modul/mod_hotel/map.php";
    ?>
    <br><textarea readonly style='width: 98.7%; height: 98.7%;'>Fasilitas : 
<?php
function is_fasilitas_selected($id_fasilitas,$id_hotel){
$jml=mysql_num_rows(mysql_query("select * from tbl_hotel where id_hotel='$id_hotel' and fasilitas like '%$id_fasilitas%'"));
return $jml;}
//menyiapkan jenis hobi kedalam aray
$fasilitas= array('Tempat Makan','Gazebo','Taman Bermain','Kamar Kecil','Penginapan','Perlengkapan Renang','Free Wifi','Mushola','Parkir','Khusus Anak');
echo "";
  $fasilitas_tmp=explode(',',$t['fasilitas']);
  for ($c=0;$c<count($fasilitas_tmp);$c++){
  $satu_fasilitas=$fasilitas_tmp[$c];
  echo $fasilitas[$satu_fasilitas].", ";
};
?></textarea>
    

     
<?php echo"
    </form>
    </td>
  </tr>
 
  <tr>

    <td height=''>Alamat</td>
    <td><textarea readonly style='width: 96%; height: 98.7%;'>$t[alamat]</textarea></td>
  </tr>
  <tr>
    <td height=''>Telepon</td>
    <td><span class='input-xlarge uneditable-input' style='width: 220px;'>$t[telepon]</span></td>    
  </tr>
  <tr>
    <td height=''>Jumlah Kamar</td>
    <td><span class='input-xlarge uneditable-input' style='width: 220px;'>$t[jml_kamar] Kamar</span></td>    
  </tr>
  <tr>
    <td height=''>Max Penginap</td>
    <td><span class='input-xlarge uneditable-input' style='width: 220px;'>$t[jml_penginap] Orang</span></td>    
  </tr>
  <tr>
    <td height=''>Harga</td>
    <td><span class='input-xlarge uneditable-input' style='width: 220px;'>Rp. $t[harga]</span></td>    
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
    <a title='$t[foto]' href='img/gallery/hotel/$t[foto]'><img src='img/gallery/hotel/$t[foto]'style='width: 600px; height: 230px;'></a></td>
    <td colspan='2'><textarea readonly  style='width: 98.7%; height: 220px;'>$t[pengantar]</textarea></td>
  </tr>
</table>



              <div class='panel-body'>

  </div></div>";
  break; 
}
?>
</div></div></div></div></div></div></div></div></div></div>
