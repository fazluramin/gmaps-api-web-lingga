<?php
session_start();
include "../../../config/koneksi.php";
include "../../../config/fungsi_thumb.php";

$module=$_GET[module];
$act=$_GET[act];

// Update user
if ($module=='admin' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  
  if (!empty($lokasi_file)){
    UploadBanner($nama_file);
    move_uploaded_file($lokasi_file,"foto/$nama_file");

    mysql_query("UPDATE tbl_admin SET nama = '$_POST[nama]',
								 username = '$_POST[username]',
								 password = '$_POST[password]',
								 telp = '$_POST[telp]',
								 alamat = '$_POST[alamat]',
								 tgl_lahir = '$_POST[tgl_lahir]'
								  WHERE  id_user     = '$_POST[id]'");
	
	}
	else {
    mysql_query("UPDATE tbl_admin SET nama = '$_POST[nama]',
								 username = '$_POST[username]',
								 password = '$_POST[password]',
								 telp = '$_POST[telp]',
								 alamat = '$_POST[alamat]',
								 tgl_lahir = '$_POST[tgl_lahir]'
								  WHERE  id_user     = '$_POST[id]'");
	
	}
  header('location:../../index.php?module='.$module);
}
elseif ($module=='admin' AND $act=='hapus') {
	mysql_query("DELETE FROM tbl_admin WHERE id_user='$_GET[id]'");
  header('location:../../index.php?module='.$module);
}
elseif ($module=='admin' AND $act=='input'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  
  if (!empty($lokasi_file)){
    UploadBanner($nama_file);
    move_uploaded_file($lokasi_file,"foto/$nama_file");
  
	  mysql_query("INSERT INTO user(nama,pangkat,nrp,password,jabatan,gambar,level) 
	  VALUES('$_POST[nama]','$_POST[pangkat]','$_POST[nrp]','$_POST[password]',
	  '$_POST[jabatan]','$nama_file','user')");
  }
  else {
	  mysql_query("INSERT INTO user(nama,pangkat,nrp,password,jabatan,level) 
	  VALUES('$_POST[nama]','$_POST[pangkat]','$_POST[nrp]','$_POST[password]',
	  '$_POST[jabatan]','user')");
  }
  header('location:../../index.php?module='.$module);
}
//Pengaktifan dan Pengnonaktifan
elseif ($module=='admin' AND $act=='nonaktif'){
$aktif='N';
    mysql_query("UPDATE tbl_admin SET statusaktif  = '$aktif'  WHERE id_user='$_GET[id]'");
  header('location:../../index.php?module='.$module);
  
 }
elseif ($module=='admin' AND $act=='aktif'){
$aktif='Y';
    mysql_query("UPDATE tbl_admin SET statusaktif  = '$aktif'  WHERE id_user='$_GET[id]'");
  header('location:../../index.php?module='.$module);
  
 }

?>

