<?php
session_start();
include "../../../config/koneksi.php";
include "../../config/koneksi.php";
include "../config/koneksi.php";
include "config/koneksi.php";
include "koneksi.php";
include "../../../config/fungsi_thumb.php";

$module=$_GET[module];
$act=$_GET[act];

// Update petugas
if ($module=='nomor_penting' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  
  if (!empty($lokasi_file)){
    UploadBanner($nama_file);
    move_uploaded_file($lokasi_file,"$nama_file");

    mysql_query("UPDATE tbl_nomor SET nama = '$_POST[nama]',
                 nomor = '$_POST[nomor]',
                 alamat = '$_POST[alamat]',
                 foto = '$nama_file'
                  WHERE  id_nomor     = '$_POST[id]'");
  
  }
  else {
    mysql_query("UPDATE tbl_nomor SET nama = '$_POST[nama]',
                 nomor = '$_POST[nomor]',
                 alamat = '$_POST[alamat]'
                  WHERE  id_nomor     = '$_POST[id]'");
  
  }
  header('location:../../index.php?module='.$module);
}
elseif ($module=='nomor_penting' AND $act=='hapus') {
  mysql_query("DELETE FROM tbl_nomor WHERE id_nomor='$_GET[id]'");
  header('location:../../index.php?module='.$module);
}
elseif ($module=='nomor_penting' AND $act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 
  if (!empty($lokasi_file)){
    UploadBanner($nama_file);
    move_uploaded_file($lokasi_file,"$nama_file");
  
    mysql_query("INSERT INTO tbl_nomor (nama,nomor,alamat,foto) 
    VALUES('$_POST[nama]','$_POST[nomor]','$_POST[alamat]','$nama_file')");
  }
  else {
    mysql_query("INSERT INTO tbl_nomor(nama,nomor,alamat) 
    VALUES('$_POST[nama]','$_POST[nomor]','$_POST[alamat]')");
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

