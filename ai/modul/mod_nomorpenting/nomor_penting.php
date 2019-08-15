<?php
$aksi="modul/mod_nomorpenting/aksi_nomor_penting.php";
switch($_GET[act]){
  // Tampil User
  default:
      $tampil = mysql_query("SELECT * FROM tbl_nomor ORDER BY id_nomor DESC");
      
      echo "
  <div>
        <ul class='breadcrumb'>
          <li>
            <a href='index.php?module=' style='text-decoration:none'><i class='icon-home'></i><font color='black'> Home</font></a> <span class='divider'>/</span>
          </li>
          <li>
            <li class='active'><i class='icon-info-sign'></i><font color='grey'> Nomor Penting</font></a> <span class='divider'></span>
          </li>
        </ul></font>
      </div>
      
<div class='row-fluid sortable'>    
        <div class='box span12'>
          <div class='box-header well' data-original-title>
            <h2><i class='icon-info-sign'></i><font color='green'> Nomor Penting</font></h2>&nbsp;|&nbsp;
            <a href='?module=nomor_penting&act=input' type=button class='btn btn-success'><i class='icon-plus-sign icon-white'></i> Add Data</br></a>
            <div class='box-icon'>
              <a href='#' class='btn btn-minimize btn-round'><i class='icon-chevron-up'></i></a>
              <a href='#' class='btn btn-close btn-round'><i class='icon-remove'></i></a>
            </div>
          </div>
          <div class='box-content'>
            <font color='black'><table class='table table-striped table-bordered bootstrap-datatable datatable' width='100%'>
              <thead>
                <tr>
          <th width='1%' readonly><center><style='text-decoration:none'>No</th>
          <th width='20%'>Nama</th>
          <th width='15%'>No Telepon</th>
          <th width='28%'>Alamat</th>
          <th width='17%'><center>Foto</th>
          <th width='25%'><center>Action</th>         
                </tr>
              </thead>   

             
"; 
       $no+=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "
            <td><center>".$no."</td>
            <td>$r[nama]</td>
            <td>$r[nomor]</td>
            <td>$r[alamat]</td>
            <td><center><img src='img/npenting/$r[foto]' width='130' height='80'></td>";
      
        echo"
                <td class='center'><center>
                  <!--<a href='?module=nomor_penting&act=lihat&id=$r[id_nomor]' class='btn btn-success' href='#'>
                    <i class='icon-zoom-in icon-white'></i>  
                    Detail                                            
                  </a>-->
                 <a href='?module=nomor_penting&act=update&id=$r[id_nomor]' onclick=\"return confirm('Apakah anda yakin ingin mengubah Nomor Telepon $r[nama]?')\" class='btn btn-warning' href='#'>
                    <i class='icon-edit icon-white'></i>  
                    Edit                                            
                  </a>
                  <a href=$aksi?module=nomor_penting&act=hapus&id=$r[id_nomor] onclick=\"return confirm('Apakah anda yakin ingin menghapus Nomor Telepon $r[nama]?')\" class='btn btn-danger' href='#'>
                    <i class='icon-trash icon-white'></i> 
                    Delete
                  </a>
               ";
        echo"</tr>
        ";
      $no++;
    }
    echo "</table></font>
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
            <a style='text-decoration:none'><i class='icon-eye-open'></i><font color='grey'> Lihat Data</font></a> <span class='divider'></span>
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
    <tr><td width='100'>Nama</td><td ><input disabled value='$t[nama]' size='40'></td></tr>
    <tr><td>Username</td><td><input disabled value='$t[username]' size='40'></td></tr>
    <tr><td>Jenis Kelamin </td><td><input disabled value='$t[jk]' size='40'></td> </tr>
    <tr><td>No.HP </td><td><input disabled value='$t[telp]' size='40'></td></tr>
    <tr><td>Alamat</td><td><textarea disabled cols='900'>$t[alamat]</textarea></td></tr>


  </table>


              <div class='panel-body'>

  </div></div>";
  break;
  

  

  
  case "update":
       $tampil = mysql_query("SELECT * FROM tbl_nomor WHERE id_nomor='$_GET[id]'");
    $t=mysql_fetch_array($tampil);

    echo "

      <div>
        <ul class='breadcrumb'>
          <li>
            <a href='index.php?module=' style='text-decoration:none'><i class='icon-home'></i> <font color='black'> Home</font></a> <span class='divider'>/</span>
          </li>
          <li>
            <a href='index.php?module=nomor_penting' style='text-decoration:none'><i class='icon-info-sign'></i><font color='black'> Nomor Penting</font></a> <span class='divider'>/</span>
          </li>
          <li>
            <a style='text-decoration:none'><i class='icon-edit'></i><font color='grey'> Edit Data</font></a> <span class='divider'></span>
          </li>
        </ul>
      </div>

      <div class='row-fluid sortable'>    
        <div class='box span12'>
          <div class='box-header well' data-original-title>
            <h2><i class='icon-edit'></i><font color='green'> Edit Data Nomor Telepon : $t[nama]</font></h2>            
            <div class='box-icon'>
              <a href='#' class='btn btn-minimize btn-round'><i class='icon-chevron-up'></i></a>
              <a href='#' class='btn btn-close btn-round'><i class='icon-remove'></i></a>
            </div>
          </div>
          <div class='box-content'>

<a href='index.php?module=nomor_penting' type=button class='btn btn-success'><i class='icon32 icon-white icon-arrowreturn-se'></i></a>
<br><br>
<form method=POST enctype='multipart/form-data' action=$aksi?module=nomor_penting&act=update>
<input type=hidden name=id value=$t[id_nomor]>
    <table width='200%' border='0' align='center' cellpadding='7' cellspacing='7'>
    
    <tr><td width='100'>Nama</td><td ><input name='nama' type='text' id='nama' size='40' value='$t[nama]' required/></td></tr>
    <tr><td>Nomor Telepon</td><td><input name='nomor' type='text' value='$t[nomor]' size='40'></td></tr>
    <tr><td width='100'>Alamat</td><td ><input name='alamat' type='text' value='$t[alamat]' size='40'></td></tr>
    <tr><td>Foto</td><td><img src='img/npenting/$t[foto]' width='217' height='100'></td></tr>
    <tr><td>Ganti Foto</td><td><input type='file' cols='900'name='fupload'></input></td></tr>
<tr>
      <td>&nbsp;</td>
      <td><input type='submit' name='Submit' value='Simpan Perubahan' class='btn btn-success'>&nbsp;&nbsp;<input type='reset' name='Submit' value='Default'  class='btn btn-primary'></td>
    </tr>
  </table>


              <div class='panel-body'>

  </div></div>";
   break;
  

  

  
  case "input":
    echo "
      <div>
        <ul class='breadcrumb'>
          <li>
            <a href='index.php?module=' style='text-decoration:none'><i class='icon-home'></i> <font color='black'> Home</font></a> <span class='divider'>/</span>
          </li>
          <li>
            <a href='index.php?module=nomor_penting' style='text-decoration:none'><i class='icon-info-sign'></i><font color='black'> Nomor Penting</font></a> <span class='divider'>/</span>
          </li>
          <li>
            <a style='text-decoration:none'><i class='icon-plus-sign'></i><font color='grey'> Tambah Data</font></a> <span class='divider'></span>
          </li>
        </ul>
      </div>
      <div class='row-fluid sortable'>    
        <div class='box span12'>
          <div class='box-header well' data-original-title>
            <h2><i class='icon-plus'></i><i class='icon-user'></i><font color='green'> Tambah Data Nomor Penting</font></h2>            
            <div class='box-icon'>
              <a href='#' class='btn btn-minimize btn-round'><i class='icon-chevron-up'></i></a>
              <a href='#' class='btn btn-close btn-round'><i class='icon-remove'></i></a>
            </div>
          </div>
          <div class='box-content'>

           <form method=POST enctype='multipart/form-data' action=$aksi?module=nomor_penting&act=input>

<a href='index.php?module=nomor_penting' type='button' class='btn btn-danger'><i class='icon32 icon-white icon-arrowreturn-se'></i></a>
<br><br>
<form name='form1' method='post' action='media.php?module=innomor&act=proses'>
  <table width='100%' border='0' cellpadding='1' cellspacing='2'>
    <tr>
      <td width='10%'>Nama</td>
      <td width='90%'><input name='nama' type='text' id='nama' size='40' required/></td>
    </tr>
    <tr>
      <td>Nomor Telepon</td>
      <td><input name='nomor' type='text' id='nomor' size='40' required/></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td><textarea name='alamat' cols='5' rows='2' id='alamat'></textarea></td>
    </tr>
    <tr><td>Foto</td><td><input type='file' cols='900'name='fupload' required/></td></tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><button type='submit' name='Submit' class='btn btn-success'><i class='icon icon-white icon-save'></i> Simpan Data</button>&nbsp;&nbsp;<button type='reset' name='Submit' class='btn btn-warning'><i class='icon icon-white icon-refresh'></i> Clear</button></td>
    </tr>
    
  </table>
</form>
</div></div></div></div>
</div></div></div></div>



  </div></div>";
   break;
  
}
?>
</div></div></div></div></div></div></div></div></div></div>