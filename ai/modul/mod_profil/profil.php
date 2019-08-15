<?php
$aksi="modul/mod_profil/aksi_profil.php";
switch($_GET[act]){
  // Tampil Menuatas
  default:
    $sql  = mysql_query("SELECT * FROM tbl_informasi WHERE id_modul='1'");
    $r    = mysql_fetch_array($sql);

    echo "
<script>
     $(document).ready(function() {
      var table = $('#example').DataTable();
     } );
     </script>
                <meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
        <script type='text/javascript' src='../nicEdit.js'></script>
        <script type='text/javascript'>
          bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
        </script>    
    <div>
        <ul class='breadcrumb'>
          <li>
            <a href='index.php?module=' style='text-decoration:none'><i class='icon-home'></i><font color='black'> Home</font></a> <span class='divider'>/</span>
          </li>
          <li>
            <li class='active'><i class='icon-info-sign'></i><font color='grey'> Profil Kabupaten Lingga</font></a> <span class='divider'></span>
          </li>
        </ul></font>
      </div>
      <div class='row-fluid sortable'>    
        <div class='box span12'>
          <div class='box-header well' data-original-title>
            <h2><i class='icon-info-sign'></i><font color='green'> Informasi Profil Kabupaten Lingga</font></h2>
            <div class='box-icon'>
              <a href='#' class='btn btn-minimize btn-round'><i class='icon-chevron-up'></i></a>
              <a href='#' class='btn btn-close btn-round'><i class='icon-remove'></i></a>
            </div>
          </div>
          <div class='box-content'><center>
          <div class='panel-body'>

          <form method=POST enctype='multipart/form-data' action=$aksi?module=profil&act=update>
          <input type=hidden name=id value=$r[id_modul]>
          <table width='100%' border='0'>
         <tr><center>
         
         <td width='37%'><center>
         <b>Foto Profil Kabupaten Lingga</b>
         <br><br>
         <img src='img/profilkab/$r[gambar]' width='360' height='200'>
         <br>
         <br><center>Ganti Foto: </b><input class='btn btn-success' type=file size=30  name=fupload>
         <br><br>
         <center><button type='submit' name='Submit' class='btn btn-success'><i class='icon icon-white icon-save'></i> Update Profil</button>&nbsp;&nbsp;&nbsp;<a href='index.php?module=' class='btn btn-danger' type=button ><i class='icon icon-arrowreturn-se icon-white'></i> Back</a>
         <br><br><br><br><br>
         </td>
         <td width='1%'></td>
         <td width='63%'><textarea name='isi' style='width: 630px; height: 370px;'>$r[isi_modul]</textarea>
         </td></tr>
         </form></table>
           </div>
            </div>
            </div>";
    break;  
  
}
?>
</div></div></div>