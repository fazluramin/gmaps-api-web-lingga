<?php
session_start();
include "../../../config/koneksi.php";
include "../../../config/fungsi_thumb_transportasi.php";

$module=$_GET[module];
$act=$_GET[act];

// Update petugas
if ($module=='transportasi' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  
  if (!empty($lokasi_file)){
    UploadBanner($nama_file);
    move_uploaded_file($lokasi_file,"$nama_file");

    mysql_query("UPDATE tbl_transportasi SET nama_transp = '$_POST[nama_transp]',
                 alamat = '$_POST[alamat]',
                 pengantar = '$_POST[pengantar]',
                 latitude = '$_POST[latitude]',
                 longitude = '$_POST[longitude]',
                 foto = '$nama_file'
                  WHERE  id_transp     = '$_POST[id]'");
  
  }
  else {
    mysql_query("UPDATE tbl_transportasi SET nama_transp = '$_POST[nama_transp]',
                 alamat = '$_POST[alamat]',
                 pengantar = '$_POST[pengantar]',
                 latitude = '$_POST[latitude]',
                 longitude = '$_POST[longitude]'
                  WHERE  id_transp     = '$_POST[id]'");
  
  }
  header('location:../../index.php?module='.$module);
}
elseif ($module=='transportasi' AND $act=='hapus') {
  mysql_query("DELETE FROM tbl_transportasi WHERE id_transp='$_GET[id]'");
  header('location:../../index.php?module='.$module);
}
elseif ($module=='transportasi' AND $act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 
 
  if (!empty($lokasi_file)){
    UploadBanner($nama_file);
    move_uploaded_file($lokasi_file,"$nama_file");


    
    mysql_query("INSERT INTO tbl_transportasi (id_transp,nama_transp,alamat,foto,pengantar,latitude,longitude) 
    VALUES('$_POST[id_transp]','$_POST[nama_transp]','$_POST[alamat]','$nama_file','$_POST[pengantar]','$_POST[latitude]','$_POST[longitude]')");
  }
  else {
    mysql_query("INSERT INTO tbl_transportasi (id_transp,nama_transp,alamat,pengantar,latitude,longitude) 
    VALUES('$_POST[id_transp]','$_POST[nama_transp]','$_POST[alamat]','$_POST[pengantar]','$_POST[latitude]','$_POST[longitude]')");
  }
  header('location:../../index.php?module='.$module);

}
//Pengaktifan dan Pengnonaktifan
elseif ($module=='data-petugas' AND $act=='nonaktif'){
$aktif='N';
    mysql_query("UPDATE tbl_petugas SET statusaktif  = '$aktif'  WHERE id_petugas='$_GET[id]'");
  header('location:../../media.php?module='.$module);
  
 }
elseif ($module=='data-petugas' AND $act=='aktif'){
$aktif='Y';
    mysql_query("UPDATE tbl_petugas SET statusaktif  = '$aktif'  WHERE id_petugas='$_GET[id]'");
  header('location:../../media.php?module='.$module);
  
 }

?>