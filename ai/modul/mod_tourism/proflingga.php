<center>
  <meta name="viewport" content="width=device-width; initial-scale=1, maximum-scale=1, user-scalable=0">
</meta>
<body bgcolor="black">
<?php
$aksi="modul/mod_tourism/aksi_tourism.php";
switch($_GET[act]){
  // Tampil User
  default:

       $tampil = mysql_query("SELECT * FROM tbl_informasi WHERE id_modul='1'");
    $t=mysql_fetch_array($tampil);

    echo "
    <table width='300' border='0'>
  <tr>
    <td width='25%'><a href='index.php?module=tourism' type=button class='btn btn-default'>&nbsp;&nbsp;&nbsp;&nbsp;<i class='icon icon-black icon-arrowreturn-se'></i>&nbsp;&nbsp;&nbsp;&nbsp;</a></td>
    <td width='75%' style='text-align: right'><a href='http://maps.google.com/?q=$t[latitude],$t[longitude]' type=button class='btn btn-default'>Lihat Peta <i class='icon icon-black icon-sent'></i></a></td>
    <!-- https://www.google.com/maps/dir/-0.5334607,104.5043386/$t[latitude],$t[longitude]/@-0.5693326,104.4931961,13z -->
  </tr>
  <tr>
    <td colspan='2'>
    <center>
    <br>
    <b><font size='4'>$t[nama_owisata]</b></font>
    <br>
    <font size='2' color='grey'>$t[kategori]</font>
    <br><img src='../admin/img/gallery/wisata/$t[foto]' width='250' height='150'>
    <br>&nbsp;
    </td>
  </tr>
   <tr>
    <td colspan='2'  style='text-align: justify'><font > $t[pengantar]    
    </td></font>

  </tr>

  <tr>
    <td>
    </td>
  </tr>
  <tr>
    <td>
    </td>
  </tr>

   
    <tr>
    <td width='25%'><b>Fasilitas</b></td>
    </font>
    <td width='75%' rowspan='2'>
    ";?>
<?php
function is_fasilitas_selected($id_fasilitas,$id_wisata){
$jml=mysql_num_rows(mysql_query("select * from tbl_owisata where id_wisata='$id_wisata' and fasilitas like '%$id_fasilitas%'"));
return $jml;}
//menyiapkan jenis hobi kedalam aray
$fasilitas= array('Tempat Makan','Gazebo','Taman Bermain','Kamar Kecil','Penginapan','Perlengkapan Renang','Free Wifi','Mushola','Parkir','Khusus Anak');
echo "";
  $fasilitas_tmp=explode(',',$t['fasilitas']);
  for ($c=0;$c<count($fasilitas_tmp);$c++){
  $satu_fasilitas=$fasilitas_tmp[$c];
  echo $fasilitas[$satu_fasilitas].", ";
};
?><?php echo"
</td>
  </tr>
  


  <tr>
    <td width='25%' height='100%'>
  </tr>
  <tr>
    <td><b>Tiket</b></td>
    <td>Rp.  $t[tiket]</td>
  </tr>
   <tr>
    <td><b>Latitude</b></td>
    <td> $t[latitude]</td>
  </tr>
  <tr>
    <td><b>Longitude</b></td>
    <td> $t[longitude]</td>
  </tr>

    
  </div></div>";
   break;
}
?>
</div></div>
</table>