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
elseif ($_GET[module]=='transportasi'){
  include "modul/mod_transportasi/transportasi.php";
}
elseif ($_GET[module]=='dt_transportasi'){
  include "modul/mod_transportasi/detail_transportasi.php";
}
elseif ($_GET[module]=='perbelanjaan'){
  include "modul/mod_perbelanjaan/perbelanjaan.php";
}
elseif ($_GET[module]=='dt_perbelanjaan'){
  include "modul/mod_perbelanjaan/detail_perbelanjaan.php";
}
elseif ($_GET[module]=='pemerintahan'){
  include "modul/mod_pemerintahan/pemerintahan.php";
}
elseif ($_GET[module]=='dt_pemerintahan'){
  include "modul/mod_pemerintahan/detail_pemerintahan.php";
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
$jml_transportasi = mysql_num_rows(mysql_query("SELECT id_transp FROM tbl_transportasi"));
$jml_belanja = mysql_num_rows(mysql_query("SELECT id_perbelanjaan FROM tbl_perbelanjaan"));
$jml_pemerintahan = mysql_num_rows(mysql_query("SELECT id_pemerintahan FROM tbl_pemerintahan"));


//Jumlah halaman
$JmlHalaman = ceil($jml_data/$batas); //ceil digunakan untuk pembulatan keatas

  echo "
  <div>
        <ul class='breadcrumb'>
            <li class='active'><i class='icon-home'></i> <font color='grey'> Home / Dashboard</font></a>
          </li>
        </ul>
      </div>
 <div class='sortable row-fluid'>
<!-- dialog sambutan sistem -->       
      <div class='row-fluid'>
        <div class='box span12'>
          <div class='box-content'>
            <h1><font size='7' color='green' style='font-family: time news roman'>Selamat Datang di Visit Kampar <small>
            <p>Sistem Informasi Pengolah Data dan Informasi Aplikasi Navigasi Pariwisata Kabupaten Kampar </small></h1></font>
            <p><b><font size='4' color='green' style='font-family: time news roman'> </b>
            
            <div  style='margin-bottom: 9px;'>
             
            
          </div>
        </div><!--span disini-->
            </p>
            <div class='clearfix'></div>
          </div>
        </div>
      </div>
        <a data-rel='tooltip' title='$jml_wisata Objek Wisata' class='well span3 top-block' href='index.php?module=tourism'>

          <span class='icon32'> <img src='img/icon-wisata-png-5.png'> </img></span> 

          <div><font color='grey'><br>Objek Wisata</font></div>
        </a>

        <a data-rel='tooltip' title='$34 new sales.' class='well span3 top-block' href='index.php?module=perbelanjaan'>
         <span class='icon32'> <img src='img/belanja.png'> </img></span> 

          <div><font color='grey'><br>Perbelanjaan</font></div>
          
        </a>
        
        <a data-rel='tooltip' title='$jml_tibadah Tempat Ibadah' class='well span3 top-block' href='index.php?module=tibadah'>
           <span class='icon32'> <img src='img/mesjid.png'> </img></span> 
          <div><font color='grey'><br>Tempat Ibadah</font></div>
          
        </a>

        <a data-rel='tooltip' title='12 new messages.' class='well span3 top-block' href='index.php?module=hotel'>
          
           <span class='icon32'> <img src='img/hotel.png'> </img></span> 
          <div><font color='grey'><br>Hotel & Penginapan</font></div>
        </a>

<!-- baris baru -->       
<div class='sortable row-fluid'>

        

        <a data-rel='tooltip' title='12 new messages.' class='well span3 top-block' href='index.php?module=transportasi'>
           <span class='icon32'> <img src='img/spbu.jpg'> </img></span> 
          <div><font color='grey'><br>SPBU & Pertamina</font></div>
          
        </a>

        <a data-rel='tooltip' title='12 new messages.' class='well span3 top-block' href='index.php?module=pemerintahan'>
           <span class='icon32'> <img src='img/rs.png'> </img></span> 
          <div><font color='grey'><br>Puskesmas & Rumah Sakit</font></div>
          
        </a>

        <!--<a data-rel='tooltip' title='Jumlah Admin $jml_data orang' class='well span3 top-block' href='index.php?module=admin'>
          <span class='icon32 icon-green icon-users'></span>
          <div><font color='grey'><br>Admin</font></div>
        </a>-->

        <!--<a data-rel='tooltip' title='4 new pro members.' class='well span3 top-block' href='index.php?module=event'>
          <span class='icon32 icon-orange icon-star-on'></span>
          <div><font color='grey'>Event</font></div>
        </a>-->

       

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
<!--Penting penting
<span class='divider'></span>

<font style="font-family: arial">

-->