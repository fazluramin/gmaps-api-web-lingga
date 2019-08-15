<?php
session_start();
include "../../../config/koneksi.php";
include "../../../config/fungsi_thumb_hotel.php";

$module=$_GET[module];
$act=$_GET[act];

 function is_fasilitas_selected($id_fasilitas,$id_hotel){

$jml=mysql_num_rows(mysql_query("select * from tbl_hotel where id_hotel='$id_hotel' and fasilitas like '%$id_fasilitas%'"));
return $jml;
}
//menyiapkan jenis hobi kedalam aray
include "fasilitas_hotel.php";

//mengambil data ketika edit
if(!empty($_GET['id_hotel'])){
$detail=mysql_fetch_array(mysql_query("select * from tbl_hotel where id_hotel=$_GET[id_hotel]"));
}
// Update petugas
if ($module=='hotel' AND $act=='update'){
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

    mysql_query("UPDATE tbl_hotel SET nama_hotel = '$_POST[nama_hotel]',
                 telepon = '$_POST[telepon]',
                 alamat = '$_POST[alamat]',
                 pengantar = '$_POST[pengantar]',
                 fasilitas = '$fasilitas_to_sql',
                 jml_kamar = '$_POST[jml_kamar]',
                 jml_penginap = '$_POST[jml_penginap]',
                 harga = '$_POST[harga]',
                 latitude = '$_POST[latitude]',
                 longitude = '$_POST[longitude]',
                 foto = '$nama_file'
                  WHERE  id_hotel     = '$_POST[id]'");
  
  }
  else {
    mysql_query("UPDATE tbl_hotel SET nama_hotel = '$_POST[nama_hotel]',
                   telepon = '$_POST[telepon]',
                 alamat = '$_POST[alamat]',
                 pengantar = '$_POST[pengantar]',
                 fasilitas = '$fasilitas_to_sql',
                  jml_kamar = '$_POST[jml_kamar]',
                 jml_penginap = '$_POST[jml_penginap]',
                 harga = '$_POST[harga]',
                 latitude = '$_POST[latitude]',
                 longitude = '$_POST[longitude]'
                  WHERE  id_hotel     = '$_POST[id]'");
  
  }
  header('location:../../index.php?module='.$module);
}
elseif ($module=='hotel' AND $act=='hapus') {
  mysql_query("DELETE FROM tbl_hotel WHERE id_hotel='$_GET[id]'");
  header('location:../../index.php?module='.$module);
}
elseif ($module=='hotel' AND $act=='input'){
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


    
    mysql_query("INSERT INTO tbl_hotel (id_hotel,nama_hotel,telepon,alamat,foto,pengantar,fasilitas,jml_kamar,jml_penginap,harga,latitude,longitude) 
    VALUES('$_POST[id_hotel]','$_POST[nama_hotel]','$_POST[telepon]','$_POST[alamat]','$nama_file','$_POST[pengantar]','$fasilitas_to_sql','$_POST[jml_kamar]','$_POST[jml_penginap]','$_POST[harga]','$_POST[latitude]','$_POST[longitude]')");
  }
  else {
    mysql_query("INSERT INTO tbl_hotel (id_hotel,nama_hotel,telepon,alamat,pengantar,fasilitas,jml_kamar,jml_penginap,harga,latitude,longitude) 
    VALUES('$_POST[id_hotel]','$_POST[nama_hotel]','$_POST[telepon]','$_POST[alamat]','$_POST[pengantar]','$fasilitas_to_sql','$_POST[jml_kamar]','$_POST[jml_penginap]','$_POST[harga]','$_POST[latitude]','$_POST[longitude]')");
  }
  header('location:../../index.php?module='.$module);

}

?>