<?php
$aksi="modul/mod_event/aksi_event.php";
switch($_GET[act]){
  // Tampil User
  default:
      $tampil = mysql_query("SELECT * FROM tbl_event ORDER BY id_event DESC");

  
  case "lihat":
       $tampil = mysql_query("SELECT * FROM tbl_event WHERE id_event='$_GET[id]'");
    $t=mysql_fetch_array($tampil);

    echo "
   <div>
        <ul class='breadcrumb'>
          <li>
            <a href='index.php?module=' style='text-decoration:none'><i class='icon-home'></i> <font color='black'> Home</font></a> <span class='divider'>/</span>
          </li>
             <a href='index.php?module=event' style='text-decoration:none'><li class='active'><i class='icon-map-marker'></i> Event</font></a> <span class='divider'>/</span>
          </li>
          <li>
            <a style='text-decoration:none'><i class='icon-eye-open'></i><font color='grey'> Detail Event</font></a> <span class='divider'></span>
          </li>
        </ul>
      </div>

      <div class='row-fluid sortable'>    
        <div class='box span12'>
          <div class='box-header well' data-original-title>
            <h2>
            <a href='index.php?module=event' type=button class='btn btn btn-danger'><i class='icon icon-white icon-arrowreturn-se'></i></a> 
            <a href='?module=event&act=update&id=$t[id_event]' type=button class='btn btn-warning'><i class='icon-edit icon-white'></i></a> | <i class='icon-eye-open'></i><font color='green'> Data Event : $t[nama_event]</font></h2>            
            <div class='box-icon'>
              <a href='#' class='btn btn-minimize btn-round'><i class='icon-chevron-up'></i></a>
              <a href='#' class='btn btn-close btn-round'><i class='icon-remove'></i></a>
            </div>
          </div>
          <div class='box-content'>

    <table class='table table-striped table-bordered bootstrap-datatable datatable' width='100%' border='0' align='center' cellpadding='10' cellspacing='10'>
  <tr>
    <td width='10%'>Nama Event</td>
    <td width='23%'><span class='input-xlarge uneditable-input' style='width: 220px;'>$t[nama_event]</span></td>
    <td colspan='2' rowspan='8'>
    ";?>
    <?php
    include "modul/mod_event/map.php";
    ?>
     
<?php echo"
   
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
    <td height=''>Tanggal Event</td>
    <td>
        <input type='text' name='tanggal_mulai' class='input-xlarge datepicker' id='date01' value='$t[tanggal_mulai]' style='text-align: right; width: 88px;' placeholder='Tanggal Mulai'>
        &nbsp;s/d&nbsp;
        <input type='text' name='tanggal_selesai' class='input-xlarge datepicker' id='date02' value='$t[tanggal_selesai]' style='text-align: right; width: 88px;' placeholder='Tanggal Selesai'>
    </td>   </tr>
  <tr>
    <td height=''>Waktu Event</td>
    <td>
        <input type='text' name='waktu_mulai' value='$t[waktu_mulai]' style='text-align: right; width: 88px;' placeholder='Tanggal Mulai'>
        &nbsp;s/d&nbsp;
        <input type='text' name='waktu_selesai' value='$t[waktu_selesai]' style='text-align: right; width: 88px;' placeholder='Tanggal Selesai'>
  </td>   </tr>
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
    <a title='$t[foto]' href='img/gallery/event/$t[foto]'><img src='img/gallery/event/$t[foto]'style='width: 600px; height: 230px;'></a></td>
    <td colspan='2'><textarea readonly  style='width: 98.7%; height: 220px;'>$t[pengantar]</textarea></td>
  </tr>
</table>



              <div class='panel-body'>

  </div></div>";
  break; 
}
?>
</div></div></div></div></div></div></div></div></div></div>
