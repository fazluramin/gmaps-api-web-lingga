<?php
$aksi="modul/mod_admin/aksi_admin.php";
switch($_GET[act]){
  // Tampil User
  default:
      $tampil = mysql_query("SELECT * FROM tbl_admin");
      
      echo "
  <div>
        <ul class='breadcrumb'>
          <li>
            <a href='index.php?module=' style='text-decoration:none'><i class='icon-home'></i><font color='black'> Home</font></a> <span class='divider'>/</span>
          </li>
          <li>
            <li class='active'><i class='icon-user'></i><font color='grey'> Data Admin</font></a> 
          </li>
        </ul></font>
      </div>
      
<div class='row-fluid sortable'>    
        <div class='box span12'>
          <div class='box-header well' data-original-title>
            <h2><i class='icon-user'></i><font color='green'> Admin</font></h2>&nbsp;&nbsp;|&nbsp;
            <a href='index.php?module=inadmin' type=button class='btn btn-success'><i class='icon-plus-sign icon-white'></i> Add Data</br></a>
            <div class='box-icon'>
              <a href='#' class='btn btn-minimize btn-round'><i class='icon-chevron-up'></i></a>
              <a href='#' class='btn btn-close btn-round'><i class='icon-remove'></i></a>
            </div>
          </div>
          <div class='box-content'>
            <table class='table table-striped table-bordered bootstrap-datatable datatable' width='100%'>
              <thead>
                <tr>
          <th width='3%'><center>No</th>
          <th width='15%'>Nama</th>
          <th width='10%'>No Hp</th>
          <th width='10%'>Tanggal Lahir</th>
          <th width='35%'>Alamat</th>
          <th width='7%'><center>Status</th>
          <th width='25%'><center>Action</th>         
                </tr>
              </thead>   

             
"; 
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "
            <td><center>$no</td>
            <td>$r[nama]</td>
            <td>$r[telp]</td>
            <td>$r[tgl_lahir]</td>
            <td>$r[alamat]</td>";
      
        if ($r[statusaktif]=="Y") {
          echo"<td><center><input type=button class='btn btn-success btn-block' value='Aktif' onclick=\"window.location.href='$aksi?module=admin&act=nonaktif&id=$r[id_user]';\"></td>";

        }else {
          echo"<td align='center'><center><input type=button class='btn btn-danger btn-block' value='Tidak Aktif' onclick=\"window.location.href='$aksi?module=admin&act=aktif&id=$r[id_user]';\"></td>";
        }
        echo"
                <td class='center'><center>
                  <a href='?module=admin&act=lihat&id=$r[id_user]' class='btn btn-success' href='#'>
                    <i class='icon-zoom-in icon-white'></i>  
                    Detail                                            
                  </a>
                  <!--<a href='?module=admin&act=update&id=$r[id_user]' onclick=\"return confirm('Apakah anda yakin ingin mengubah data admin $r[nama]?')\" class='btn btn-info' href='#'>
                    <i class='icon-edit icon-white'></i>  
                    Edit                                            
                  </a>-->
                  <a href=$aksi?module=admin&act=hapus&id=$r[id_user] onclick=\"return confirm('Apakah anda yakin ingin menghapus data admin $r[nama]?')\" class='btn btn-danger' href='#'>
                    <i class='icon-trash icon-white'></i> 
                    Delete
                  </a>
               ";
        echo"</tr>
        ";
      $no++;
    }
    echo "</table>
    ";



    break;
  
  case "lihat":
       $tampil = mysql_query("SELECT * FROM tbl_admin WHERE id_user='$_GET[id]'");
    $t=mysql_fetch_array($tampil);
    echo "
   <div>
        <ul class='breadcrumb'>
          <li>
            <a href='index.php?module=' style='text-decoration:none'><i class='icon-home'></i> <font color='black'> Home</font></a> <span class='divider'>/</span>
          </li>
          <li>
            <a href='index.php?module=admin' style='text-decoration:none'><i class='icon-user'></i><font color='black'> Data Admin</font></a> <span class='divider'>/</span>
          </li>
          <li>
            <a style='text-decoration:none'><i class='icon-eye-open'></i><font color='grey'> Lihat Data</font></a> 
          </li>
        </ul>
      </div>

      <div class='row-fluid sortable'>    
        <div class='box span12'>
          <div class='box-header well' data-original-title>
            <h2><i class='icon-info-sign'></i><font color='green'> Data Admin : $t[nama]</font></h2>            
            <div class='box-icon'>
              <a href='#' class='btn btn-minimize btn-round'><i class='icon-chevron-up'></i></a>
              <a href='#' class='btn btn-close btn-round'><i class='icon-remove'></i></a>
            </div>
          </div>
          <div class='box-content'>
<a href='index.php?module=admin' type=button class='btn btn btn-success'><i class='icon32 icon-white icon-arrowreturn-se'></i></a>
<!--<a href='?module=admin&act=update&id=$t[id_user]' type=button class='btn btn'><i class='icon32 icon-compose'></i></a>-->
<br><br>
    <table width='200%' border='0' align='center' cellpadding='10' cellspacing='10'>
    <tr><td width='100'>Nama</td><td ><span class='input-xlarge uneditable-input'>$t[nama]</span></td></tr>
    <tr><td>Username</td><td><span class='input-xlarge uneditable-input'>$t[username]</span></td></tr>
    <tr><td>Tanggal Lahir </td><td><span class='input-xlarge uneditable-input'>$t[tgl_lahir]</span></td> </tr>
    <tr><td>No.HP </td><td><span class='input-xlarge uneditable-input'>$t[telp]</span></td></tr>
    <tr><td>Alamat</td><td><textarea disabled style='width: 270px;'>$t[alamat]</textarea></td></tr>


  </table>


              <div class='panel-body'>

  </div></div>";
  break;
  

  

  
  case "update":
       $tampil = mysql_query("SELECT * FROM tbl_admin WHERE id_user='$_GET[id]'");
    $t=mysql_fetch_array($tampil);

    echo "

      <div>
        <ul class='breadcrumb'>
          <li>
            <a href='index.php?module=' style='text-decoration:none'><i class='icon-home'></i> <font color='black'> Home</font></a> <span class='divider'>/</span>
          </li>
          <li>
            <a href='index.php?module=admin' style='text-decoration:none'><i class='icon-user'></i><font color='black'> Data Admin</font></a> <span class='divider'>/</span>
          </li>
          <li>
            <a style='text-decoration:none'><i class='icon-edit'></i><font color='grey'> Edit Data</font></a> 
          </li>
        </ul>
      </div>

      <div class='row-fluid sortable'>    
        <div class='box span12'>
          <div class='box-header well' data-original-title>
            <h2><i class='icon-edit'></i><font color='green'> Edit Data Admin : $t[nama]</font></h2>            
            <div class='box-icon'>
              <a href='#' class='btn btn-minimize btn-round'><i class='icon-chevron-up'></i></a>
              <a href='#' class='btn btn-close btn-round'><i class='icon-remove'></i></a>
            </div>
          </div>
          <div class='box-content'>

<a href='index.php?module=admin' type=button class='btn btn-success'><i class='icon32 icon-white icon-arrowreturn-se'></i></a>
<br><br>
<form method=POST enctype='multipart/form-data' action=$aksi?module=admin&act=update>
<input type=hidden name=id value=$t[id_user]>
    <table width='200%' border='0' align='center' cellpadding='7' cellspacing='7'>
    
    <tr><td width='100'>Nama</td><td ><input name='nama' type='text' value='$t[nama]' style='width: 270px;'></td></tr>
    <tr><td>Username</td><td><input name='username' type='text' value='$t[username]' style='width: 270px;'></td></tr>
    <tr><td width='100'>Password</td><td ><input name='password' type='text' value='$t[password]' style='width: 270px;'></td></tr>
    <tr>
      <td>Tanggal Lahir </td>
      <td><input type='text' class='input-xlarge datepicker' id='date01' name='tgl_lahir' value='$t[tgl_lahir]'>
                </div>
                </div>
      </td>
    </tr>
    <tr><td>No.HP </td><td><input name='telp' type='number' value='$t[telp]' style='width: 270px;'></td></tr>
    <tr><td>Alamat</td><td><textarea cols='900'name='alamat' type='text' style='width: 270px;'>$t[alamat]</textarea></td></tr>
<tr>
      <td>&nbsp;</td>
      <td><input type='submit' name='Submit' value='Simpan Perubahan' class='btn btn-success'>&nbsp;&nbsp;<input type='reset' name='Submit' value='Default'  class='btn btn-primary'></td>
    </tr>
  </table>


              <div class='panel-body'>

  </div></div>";
  break;
}
?>
</div></div></div></div></div></div></div></div></div></div>