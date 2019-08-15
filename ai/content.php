<?php
include "../config/koneksi.php";
include "../config/library.php";
include "../config/fungsi_indotgl.php";

// Bagian User
if ($_GET[module]=='home'){
  include "modul/mod_home/home.php";
}
elseif ($_GET[module]=='admin') {
  include "modul/mod_admin/admin.php";
}
elseif ($_GET[module]=='inadmin') {
  include "modul/mod_inadmin/inadmin.php";
}
elseif ($_GET[module]=='profil'){
  include "modul/mod_profil/profil.php";
}
elseif ($_GET[module]=='tourism'){
  include "modul/mod_tourism/tourism.php";
}
elseif ($_GET[module]=='tibadah'){
  include "modul/mod_tourism/tibadah.php";
}
elseif ($_GET[module]=='hotel'){
  include "modul/mod_tourism/hotel.php";
}
elseif ($_GET[module]=='event'){
  include "modul/mod_tourism/event.php";
}
elseif ($_GET[module]=='perbelanjaan'){
  include "modul/mod_tourism/perbelanjaan.php";
}
elseif ($_GET[module]=='transportasi'){
  include "modul/mod_tourism/transportasi.php";
}
elseif ($_GET[module]=='pemerintahan'){
  include "modul/mod_tourism/pemerintahan.php";
}
elseif ($_GET[module]=='proflingga'){
  include "modul/mod_tourism/proflingga.php";
}
elseif ($_GET[module]=='tourism2'){
  include "modul/mod_tourism/konek1.php";
}
elseif ($_GET[module]=='dt_tourism'){
  include "modul/mod_tourism/detail_tourism.php";
}
elseif ($_GET[module]=='tibadah'){
  include "modul/mod_tibadah/tibadah.php";
}
elseif ($_GET[module]=='dt_tibadah'){
  include "modul/mod_tibadah/detail_tibadah.php";
}
elseif ($_GET[module]=='hotel'){
  include "modul/mod_hotel/hotel.php";
}
elseif ($_GET[module]=='dt_hotel'){
  include "modul/mod_hotel/detail_hotel.php";
}
elseif ($_GET[module]=='event'){
  include "modul/mod_event/event.php";
}
elseif ($_GET[module]=='dt_event'){
  include "modul/mod_event/detail_event.php";
}
elseif ($_GET[module]=='nomor_penting'){
  include "modul/mod_nomorpenting/nomor_penting.php";
}
elseif ($_GET[module]=='file-manager'){
  include "modul/mod_file/file-manager.php";
}
elseif ($_GET[module]=='gallery'){
  include "modul/mod_gallery/gallery.php";
}
// Jika modul tak ade. Lanjut ke 
else{

//hitung jumlah data
$jml_data = mysql_num_rows(mysql_query("SELECT level FROM tbl_admin"));
$jml_wisata = mysql_num_rows(mysql_query("SELECT id_wisata FROM tbl_owisata"));
$jml_tibadah = mysql_num_rows(mysql_query("SELECT id_tibadah FROM tbl_tibadah"));
$jml_hotel = mysql_num_rows(mysql_query("SELECT id_hotel FROM tbl_hotel"));
$jml_event = mysql_num_rows(mysql_query("SELECT id_event FROM tbl_event"));
$jml_tranportasi = mysql_num_rows(mysql_query("SELECT id_tranportasi FROM tbl_tranportasi"));
$jml_belanja = mysql_num_rows(mysql_query("SELECT id_belanja FROM tbl_belanja"));
$jml_pemerintahan = mysql_num_rows(mysql_query("SELECT id_pemerintahan FROM tbl_pemerintahan"));


//Jumlah halaman
$JmlHalaman = ceil($jml_data/$batas); //ceil digunakan untuk pembulatan keatas

  echo "
  <div>
        <ul class='breadcrumb'>
          <li>
            <li class='active'><i class='icon-home'></i> <font color='grey'> Home / Dashboard</font></a> <span class='divider'>
          </li>
        </ul>
      </div>
 <div class='sortable row-fluid'>

        <a data-rel='tooltip' title='$jml_wisata Objek Wisata' class='well span3 top-block' href='index.php?module=tourism'>
          <span class='icon32 icon-green icon-globe'></span>
          <div><font color='grey'>Objek Wisata</font></div>
          <span class='notification green'>$jml_wisata Objek Wisata</span>
        </a>

        <a data-rel='tooltip' title='4 new pro members.' class='well span3 top-block' href='index.php?module=event'>
          <span class='icon32 icon-orange icon-star-on'></span>
          <div><font color='grey'>Event</font></div>
          <span class='notification yellow'>$jml_event Event</span>
        </a>

        <a data-rel='tooltip' title='$34 new sales.' class='well span3 top-block' href='index.php?module=perbelanjaan'>
          <span class='icon32 icon-red icon-cart'></span>
          <div><font color='grey'>Perbelanjaan</font></div>
          <span class='notification red'>$jml_belanja Lokasi</span>
        </a>
        
        <a data-rel='tooltip' title='$jml_tibadah Tempat Ibadah' class='well span3 top-block' href='index.php?module=tibadah'>
          <span class='icon32 icon-blue icon-home'></span>
          <div><font color='grey'>Tempat Ibadah</font></div>
          
          <span class='notification blue'>$jml_tibadah Lokasi</span>
        </a>

<!-- baris baru -->       
<div class='sortable row-fluid'>

        <a data-rel='tooltip' title='12 new messages.' class='well span3 top-block' href='index.php?module=hotel'>
          <span class='icon32 icon-blue icon-flag'></span>
          <div><font color='grey'>Hotel & Penginapan</font></div>
          <span class='notification blue'>$jml_hotel Hotel</span>
        </a>

        <a data-rel='tooltip' title='12 new messages.' class='well span3 top-block' href='index.php?module=transportasi'>
          <span class='icon32 icon-red icon-sent'></span>
          <div><font color='grey'>Transportasi</font></div>
          
          <span class='notification red'>$jml_tranportasi Lokasi</span>
        </a>

        <a data-rel='tooltip' title='12 new messages.' class='well span3 top-block' href='index.php?module=pemerintahan'>
          <span class='icon32 icon-color icon-lightbulb'></span>
          <div><font color='grey'>Pendidikan & Pemerintahan</font></div>
          
          <span class='notification yellow'>$jml_pemerintahan Lokasi</span>
        </a>

        <a data-rel='tooltip' title='Jumlah Admin $jml_data orang' class='well span3 top-block' href='index.php?module=admin'>
          <span class='icon32 icon-green icon-users'></span>
          <div><font color='grey'>Admin</font></div>
          
          <span class='notification green'>$jml_data Orang</span>
        </a>

       

<!-- baris baru -->       
<div class='sortable row-fluid'>

        <!--<a data-rel='tooltip' title='12 new messages.' class='well span3 top-block' href='#'>
          <span class='icon32 icon-red icon-folder-open'></span>
          <div><font color='grey'>File Manager</font></div>
          
        </a>

        <a data-rel='tooltip' title='12 new messages.' class='well span3 top-block' href='#'>
          <span class='icon32 icon-green icon-image'></span>
          <div><font color='grey'>Gallery</font></div>

          </a>

         <a data-rel='tooltip' title='12 new messages.' class='well span3 top-block' href='index.php?module=nomor_penting'>
          <span class='icon32 icon-green icon-contacts'></span>
          <div><font color='grey'>Telepon Penting</font></div>

        </a>
        -->

      </div>

<!-- dialog sambutan sistem -->       
      <div class='row-fluid'>
        <div class='box span12'>
          <div class='box-header well'>
            <h2><i class='icon-info-sign'></i><font color='green'> Introduction</h2>
            <div class='box-icon'>
              <a href='#' class='btn btn-minimize btn-round'><i class='icon-chevron-up'></i></a>
              <a href='#' class='btn btn-close btn-round'><i class='icon-remove'></i></a>
            </div>
          </div>
          <div class='box-content'>
            <h1><font size='7' color='green'>Selamat Datang.... <small></font>
            <p>Sistem Informasi Pengolah Data dan Informasi Aplikasi Navigasi Pariwisata Kabupaten Lingga </small></h1>
            <p>Dinas Kebudayaan dan Pariwisata Kabupaten Lingga, Kepulauan Riau
            
            <div class='progress progress-success progress-striped active' style='margin-bottom: 9px;'>
              <div class='bar' style='width: 100%'></div>
            
          </div>
        </div><!--span disini-->
            </p>
            <div class='clearfix'></div>
          </div>
        </div>
      </div>
            </div>
        </div>
      </div>
            </div>
        </div>
      </div>
          
      </div>
        </div>
        
";
}
?>

