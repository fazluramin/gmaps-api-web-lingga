<?php
session_start();
include "../../../config/koneksi.php";
include "../../../config/fungsi_thumb_event.php";

$module=$_GET[module];
$act=$_GET[act];



//mengambil data ketika edit
if(!empty($_GET['id_event'])){
$detail=mysql_fetch_array(mysql_query("select * from tbl_event where id_event=$_GET[id_event]"));
}
// Update petugas
if ($module=='event' AND $act=='update'){
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

    mysql_query("UPDATE tbl_event SET nama_event = '$_POST[nama_event]',
                 telepon = '$_POST[telepon]',
                 alamat = '$_POST[alamat]',
                 pengantar = '$_POST[pengantar]',
               tanggal_mulai = '$_POST[tanggal_mulai]',
                 tanggal_selesai = '$_POST[tanggal_selesai]',
                 waktu_mulai = '$_POST[waktu_mulai]',
                 waktu_selesai = '$_POST[waktu_selesai]',
                 latitude = '$_POST[latitude]',
                 longitude = '$_POST[longitude]',
                 foto = '$nama_file'
                  WHERE  id_event     = '$_POST[id]'");
  
  }
  else {
    mysql_query("UPDATE tbl_event SET nama_event = '$_POST[nama_event]',
                   telepon = '$_POST[telepon]',
                 alamat = '$_POST[alamat]',
                 pengantar = '$_POST[pengantar]',
                  tanggal_mulai = '$_POST[tanggal_mulai]',
                 tanggal_selesai = '$_POST[tanggal_selesai]',
                 waktu_mulai = '$_POST[waktu_mulai]',
                 waktu_selesai = '$_POST[waktu_selesai]',
                 latitude = '$_POST[latitude]',
                 longitude = '$_POST[longitude]'
                  WHERE  id_event     = '$_POST[id]'");
  
  }
  header('location:../../index.php?module='.$module);
}
elseif ($module=='event' AND $act=='hapus') {
  mysql_query("DELETE FROM tbl_event WHERE id_event='$_GET[id]'");
  header('location:../../index.php?module='.$module);
}
elseif ($module=='event' AND $act=='input'){
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


    
    mysql_query("INSERT INTO tbl_event (id_event,nama_event,telepon,alamat,foto,pengantar,tanggal_mulai,tanggal_selesai,waktu_mulai,waktu_selesai,latitude,longitude) 
    VALUES('$_POST[id_event]','$_POST[nama_event]','$_POST[telepon]','$_POST[alamat]','$nama_file','$_POST[pengantar]','$_POST[tanggal_mulai]','$_POST[tanggal_selesai]','$_POST[waktu_mulai]','$_POST[waktu_selesai]','$_POST[latitude]','$_POST[longitude]')");
  }
  else {
    mysql_query("INSERT INTO tbl_event (id_event,nama_event,telepon,alamat,pengantar,tanggal_mulai,tanggal_selesai,waktu_mulai,waktu_mulai,latitude,longitude) 
    VALUES('$_POST[id_event]','$_POST[nama_event]','$_POST[telepon]','$_POST[alamat]','$_POST[pengantar]','$_POST[tanggal_mulai]','$_POST[tanggal_selesai]','$_POST[waktu_mulai]','$_POST[waktu_selesai]','$_POST[latitude]','$_POST[longitude]')");
  }
  header('location:../../index.php?module='.$module);

}

?>