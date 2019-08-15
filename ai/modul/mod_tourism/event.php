<center>
  <meta name="viewport" content="width=device-width; initial-scale=1, maximum-scale=1, user-scalable=0">
</meta>

<?php

      $tampil = mysql_query("SELECT * FROM tbl_informasi WHERE id_modul='1'");
       $t=mysql_fetch_array($tampil);
      ?>
      <table border="0" width="250">
  <tr>
    <td><center>
<img src="../admin/img/profilkab/<?php echo "$t[gambar]"; ?>" width="200" height="120">
<br>

    </td>
  </tr>
  <tr>
    <td>
      <p style="text-align:left;"><font color="black"><?php echo "$t[isi_modul]"; ?></p>
    </td>
  </tr>
      
     