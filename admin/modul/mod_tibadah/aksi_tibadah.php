<?php
session_start();
include "../../../config/koneksi.php";
include "../../../config/fungsi_thumb_tibadah.php";

$module=$_GET[module];
$act=$_GET[act];

// Update petugas
if ($module=='tibadah' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  
  if (!empty($lokasi_file)){
    UploadBanner($nama_file);
    move_uploaded_file($lokasi_file,"$nama_file");

    mysql_query("UPDATE tbl_tibadah SET nama_tibadah = '$_POST[nama_tibadah]',
                 kategori = '$_POST[kategori]',
                 alamat = '$_POST[alamat]',
                 pengantar = '$_POST[pengantar]',
                 latitude = '$_POST[latitude]',
                 longitude = '$_POST[longitude]',
                 foto = '$nama_file'
                  WHERE  id_tibadah     = '$_POST[id]'");
  
  }
  else {
    mysql_query("UPDATE tbl_tibadah SET nama_tibadah = '$_POST[nama_tibadah]',
                   kategori = '$_POST[kategori]',
                 alamat = '$_POST[alamat]',
                 pengantar = '$_POST[pengantar]',
                 latitude = '$_POST[latitude]',
                 longitude = '$_POST[longitude]'
                  WHERE  id_tibadah     = '$_POST[id]'");
  
  }
  header('location:../../index.php?module='.$module);
}
elseif ($module=='tibadah' AND $act=='hapus') {
  mysql_query("DELETE FROM tbl_tibadah WHERE id_tibadah='$_GET[id]'");
  header('location:../../index.php?module='.$module);
}
elseif ($module=='tibadah' AND $act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 
 
  if (!empty($lokasi_file)){
    UploadBanner($nama_file);
    move_uploaded_file($lokasi_file,"$nama_file");


    
    mysql_query("INSERT INTO tbl_tibadah (id_tibadah,nama_tibadah,kategori,alamat,foto,pengantar,latitude,longitude) 
    VALUES('$_POST[id_tibadah]','$_POST[nama_tibadah]','$_POST[kategori]','$_POST[alamat]','$nama_file','$_POST[pengantar]','$_POST[latitude]','$_POST[longitude]')");
  }
  else {
    mysql_query("INSERT INTO tbl_tibadah (id_tibadah,nama_tibadah,kategori,alamat,pengantar,latitude,longitude) 
    VALUES('$_POST[id_tibadah]','$_POST[nama_tibadah]','$_POST[kategori]','$_POST[alamat]','$_POST[pengantar]','$_POST[latitude]','$_POST[longitude]')");
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