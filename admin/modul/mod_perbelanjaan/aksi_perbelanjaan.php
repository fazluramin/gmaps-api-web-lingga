<?php
session_start();
include "../../../config/koneksi.php";
include "../../../config/fungsi_thumb_belanja.php";

$module=$_GET[module];
$act=$_GET[act];

 

//mengambil data ketika edit
// Update 
if ($module=='perbelanjaan' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

   $fasilitasis='';
$jml_data=count($fasilitas);
$fasilitaspilih=$_POST['fasilitas'];
for($b=0;$b<count($_POST['fasilitas']);$b++){
$fasilitasis=$fasilitasis.$fasilitaspilih[$b].',';
$fasilitas_to_sql=substr(strrev($fasilitasis),1);
}
  
  if (!empty($lokasi_file)){
    UploadBanner($nama_file);
    move_uploaded_file($lokasi_file,"$nama_file");

    mysql_query("UPDATE tbl_perbelanjaan SET nama_perbelanjaan = '$_POST[nama_perbelanjaan]',
                 kategori = '$_POST[kategori]',
                 alamat = '$_POST[alamat]',
                 pengantar = '$_POST[pengantar]',
                 telepon = '$_POST[telepon]',
                 latitude = '$_POST[latitude]',
                 longitude = '$_POST[longitude]',
                 foto = '$nama_file'
                  WHERE  id_perbelanjaan     = '$_POST[id]'");
  
  }
  else {
    mysql_query("UPDATE tbl_perbelanjaan SET nama_perbelanjaan = '$_POST[nama_perbelanjaan]',
                   kategori = '$_POST[kategori]',
                 alamat = '$_POST[alamat]',
                 pengantar = '$_POST[pengantar]',
                 telepon = '$_POST[telepon]',
                 latitude = '$_POST[latitude]',
                 longitude = '$_POST[longitude]'
                  WHERE  id_perbelanjaan     = '$_POST[id]'");
  
  }
  header('location:../../index.php?module='.$module);
}
elseif ($module=='perbelanjaan' AND $act=='hapus') {
  mysql_query("DELETE FROM tbl_perbelanjaan WHERE id_perbelanjaan='$_GET[id]'");
  header('location:../../index.php?module='.$module);
}
elseif ($module=='perbelanjaan' AND $act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 
  $fasilitasis='';
$jml_data=count($fasilitas);
$fasilitaspilih=$_POST['fasilitas'];
for($b=0;$b<count($_POST['fasilitas']);$b++){
$fasilitasis=$fasilitasis.$fasilitaspilih[$b].',';
$fasilitas_to_sql=substr(strrev($fasilitasis),1);
}
  if (!empty($lokasi_file)){
    UploadBanner($nama_file);
    move_uploaded_file($lokasi_file,"$nama_file");


    
    mysql_query("INSERT INTO tbl_perbelanjaan (id_perbelanjaan,nama_perbelanjaan,kategori,alamat,foto,pengantar,telepon,latitude,longitude) 
    VALUES('$_POST[id_perbelanjaan]','$_POST[nama_perbelanjaan]','$_POST[kategori]','$_POST[alamat]','$nama_file','$_POST[pengantar]','$_POST[telepon]','$_POST[latitude]','$_POST[longitude]')");
  }
  else {
    mysql_query("INSERT INTO tbl_perbelanjaan (id_perbelanjaan,nama_perbelanjaan,kategori,alamat,pengantar,telepon,latitude,longitude) 
    VALUES('$_POST[id_perbelanjaan]','$_POST[nama_perbelanjaan]','$_POST[kategori]','$_POST[alamat]','$_POST[pengantar]','$_POST[telepon]','$_POST[latitude]','$_POST[longitude]')");
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