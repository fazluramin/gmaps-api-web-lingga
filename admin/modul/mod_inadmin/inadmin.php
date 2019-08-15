  <div>
        <ul class='breadcrumb'>
          <li>
            <a href='index.php?module=' style='text-decoration:none'><i class='icon-home'></i> <font color='black'> Home</font></a> <span class='divider'>/</span>
          </li>
          <li>
            <a href='index.php?module=admin' style='text-decoration:none'><i class='icon-user'></i><font color='black'> Data Admin</font></a> <span class='divider'>/</span>
          </li>
          <li>
            <a style='text-decoration:none'><i class='icon-plus-sign'></i><font color='grey'> Tambah Admin</font></a> 
          </li>
        </ul>
      </div>
      <div class='row-fluid sortable'>    
        <div class='box span12'>
          <div class='box-header well' data-original-title>
            <h2>
              <i class='icon-plus'></i><i class='icon-user'></i><font color="green"> Tambah Admin</font></h2>            
            <div class='box-icon'>
              <a href='#' class='btn btn-minimize btn-round'><i class='icon-chevron-up'></i></a>
              <a href='#' class='btn btn-close btn-round'><i class='icon-remove'></i></a>
            </div>
          </div>
          <div class='box-content'>
<?php
include "../../../config/koneksi.php";

if ($_GET[act]=="proses") {
	$simpan="INSERT INTO tbl_admin SET username='$_POST[username]',
									  password='$_POST[password]',
									  nama='$_POST[nama]',
									  tgl_lahir='$_POST[tgl_lahir]',									 					  
									  level='$_POST[level]',
									  telp='$_POST[telp]',
									  alamat='$_POST[alamat]'";
	mysql_query($simpan);
	echo '<script language="javascript">
	alert("Data Admin Berhasil Ditambah");
	window.location="index.php?module=admin";
	</script>';
	exit();
}
?>

<a href='index.php?module=admin' type='button' class='btn btn-danger'><i class='icon32 icon-white icon-arrowreturn-se'></i></a>
<br><br>
<form name="form1" method="post" action="index.php?module=inadmin&act=proses">
  <table width="100%" border='0' cellpadding='1' cellspacing='2'>
    <tr>
      <td width="10%">Nama</td>
      <td width="90%"><input name="nama" type="text" id="nama" size="40" style='width: 270px;' placeholder="Nama Lengkap" required/></td>
    </tr>
    <tr>
      <td>Username</td>
      <td><input name="username" type="text" id="username" size="40" style='width: 270px;' required/></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input name="password" type="password" id="password" size="40" style='width: 270px;' required/></td>
    </tr>
    <tr>
      <td>Tanggal Lahir </td>
      <td>
<input type="text" class="input-xlarge datepicker" id="date01" name="tgl_lahir" placeholder="Tanggal Lahir Anda">
      </td>
    </tr>
     
                
    <tr>
      <td>No HP</td>
      <td><input name="telp" type="text" id="telp" style='width: 270px;' placeholder=""></td>
    </tr>
        <tr>
      <td></td>
      <td><input name="level" type="hidden" id="level" required style='width: 270px;' value="admin"/></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td><textarea name="alamat" cols="5" rows="2" id="alamat" style='width: 270px;'></textarea></td>
    </tr>
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
