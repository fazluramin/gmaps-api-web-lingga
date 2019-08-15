<?php
session_start();
include "../../../config/koneksi.php";
include "../../../config/fungsi_thumb_wisata.php";

$module=$_GET[module];
$act=$_GET[act];

 function is_fasilitas_selected($id_fasilitas,$id_wisata){

$jml=mysql_num_rows(mysql_query("select * from tbl_owisata where id_wisata='$id_wisata' and fasilitas like '%$id_fasilitas%'"));
return $jml;
}
//menyiapkan jenis hobi kedalam aray
include "fasilitas_wisata.php";

//mengambil data ketika edit
if(!empty($_GET['id_wisata'])){
$detail=mysql_fetch_array(mysql_query("select * from tbl_owisata where id_wisata=$_GET[id_wisata]"));
}
// Update petugas
if ($module=='tourism' AND $act=='update'){
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

    mysql_query("UPDATE tbl_owisata SET nama_owisata = '$_POST[nama_owisata]',
                 kategori = '$_POST[kategori]',
                 alamat = '$_POST[alamat]',
                 pengantar = '$_POST[pengantar]',
                 fasilitas = '$fasilitas_to_sql',
                 latitude = '$_POST[latitude]',
                 longitude = '$_POST[longitude]',
                 foto = '$nama_file'
                  WHERE  id_wisata     = '$_POST[id]'");
  
  }
  else {
    mysql_query("UPDATE tbl_owisata SET nama_owisata = '$_POST[nama_owisata]',
                   kategori = '$_POST[kategori]',
                 alamat = '$_POST[alamat]',
                 pengantar = '$_POST[pengantar]',
                 fasilitas = '$fasilitas_to_sql',
                 latitude = '$_POST[latitude]',
                 longitude = '$_POST[longitude]'
                  WHERE  id_wisata     = '$_POST[id]'");
  
  }
  header('location:../../index.php?module='.$module);
}
elseif ($module=='tourism' AND $act=='hapus') {
  mysql_query("DELETE FROM tbl_owisata WHERE id_wisata='$_GET[id]'");
  header('location:../../index.php?module='.$module);
}
elseif ($module=='tourism' AND $act=='input'){
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


    
    mysql_query("INSERT INTO tbl_owisata (id_wisata,nama_owisata,kategori,alamat,foto,pengantar,fasilitas,latitude,longitude) 
    VALUES('$_POST[id_wisata]','$_POST[nama_owisata]','$_POST[kategori]','$_POST[alamat]','$nama_file','$_POST[pengantar]','$fasilitas_to_sql','$_POST[latitude]','$_POST[longitude]')");
  }
  else {
    mysql_query("INSERT INTO tbl_owisata (id_wisata,nama_owisata,kategori,alamat,pengantar,fasilitas,latitude,longitude) 
    VALUES('$_POST[id_wisata]','$_POST[nama_owisata]','$_POST[kategori]','$_POST[alamat]','$_POST[pengantar]','$fasilitas_to_sql','$_POST[latitude]','$_POST[longitude]')");
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