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
            <h2><i class='icon-plus'></i><i class='icon-user'></i><font color="green"> Tambah Data Nomor Penting</font></h2>            
            <div class='box-icon'>
              <a href='#' class='btn btn-minimize btn-round'><i class='icon-chevron-up'></i></a>
              <a href='#' class='btn btn-close btn-round'><i class='icon-remove'></i></a>
            </div>
          </div>
          <div class='box-content'>
<?php
include "config/koneksi.php";
if ($_GET[act]=="proses") {
	$simpan="INSERT INTO tbl_nomor SET nama='$_POST[nama]',
									  nomor='$_POST[nomor]',
									  alamat='$_POST[alamat]',
									  foto='$_POST[foto]'";
	mysql_query($simpan);
	echo '<script language="javascript">
	alert("Data Nomor Telepon Penting Berhasil Ditambah");
	window.location="index.php?module=nomor_penting";
	</script>';
	exit();
}
?>
<a href='index.php?module=nomor_penting' type='button' class='btn btn-success'><i class='icon32 icon-white icon-arrowreturn-se'></i></a>
<br><br>
<form name="form1" method="post" action="media.php?module=innomor&act=proses">
  <table width="100%" border='0' cellpadding='1' cellspacing='2'>
    <tr>
      <td width="10%">Nama</td>
      <td width="90%"><input name="nama" type="text" id="nama" size="40" required/></td>
    </tr>
    <tr>
      <td>Nomor Telepon</td>
      <td><input name="nomor" type="text" id="nomor" size="40" required/></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td><textarea name="alamat" cols="5" rows="2" id="alamat"></textarea></td>
    </tr>
    <tr><td>Foto</td><td><input type='file' cols='900'name='foto'></input></td></tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Simpan Data" class="btn btn-success">&nbsp;&nbsp;<input type="reset" name="Submit" value="Clear"  class="btn btn-primary"></td>
    </tr>
    
  </table>
</form>
</div></div></div></div>
</div></div></div></div>
