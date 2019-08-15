<?php
include "config/koneksi.php";
if ($_GET[act]=="proses") {
  $simpan="INSERT INTO tbl_user SET username='$_POST[username]',
                    password='$_POST[password]',
                    nama_m='$_POST[nama_m]',
                    nim='$_POST[nim]',
                    tgl_lahir='$_POST[tgl_lahir]',
                    jk='$_POST[jk]',
                    email='$_POST[email]',
                    alamat='$_POST[alamat]',
                    jenjang= '$_POST[jenjang]',
                    fakultas='$_POST[fakultas]',
                    jurusan='$_POST[jurusan]',
                    semester='$_POST[semester]',
                    statusaktif='$_POST[statusaktif]',
                    ipk='$_POST[ipk]',
                    angkatan='$_POST[angkatan]'
                   ";
  mysql_query($simpan);
  echo '<script language="javascript">
  alert("Input Data Berhasil");
  window.location="media.php?module=users";
  </script>';
  exit();
}
?>
<form name="form1" method="post" action="media.php?module=inmurid&act=proses">
<div class="col-lg-12">
<div class="panel panel-info">
              <div class="panel-heading">
                <h3 class="panel-title"><b>Form Tambah Mahasiswa</h3></b>
              </div>
              <div class="panel-body">
  <table width="80%" border="0" align="center" cellpadding="7" cellspacing="7">
    <tr>
    </tr>
    
    <tr>
      <td>Nama Lengkap</td>
      <td><input name="nama_m" type="text" id="nama_m" size="40" required/></td>
    </tr>

  <tr>
      <td>Password</td>
      <td><input name="password" type="password" id="password" size="40" required/></td>
    </tr>
    <tr>
      <td>Username</td>
      <td><input name="username" type="text" id="username" size="40" required/></td>
    </tr>

    <tr>
      <td>NIM</td>
      <td><input name="nim" type="text" id="nim" size="40" required/></td>
    </tr>
      <tr>
      <td>IPK</td>
      <td>
<input name="ipk" type="text" id="ipk" size="40" required/>
      </td>
    </tr>
    <tr>
      <td>Tempat/Tanggal Lahir</td>
      <td><input name="tgl_lahir" type="text" id="tgl_lahir" size="40" required/></td>
    </tr>
    
<td>Jenis Kelamin </td>
            <td><input type=radio name=jk id="jk" value="Laki-Laki" onClick="setjenis(this.value)">Laki-Laki &nbsp;&nbsp;&nbsp; <input type=radio name=jk id="jk" value="Perempuan" onClick="setjenis(this.value)">Perempuan
      </td>
    </tr>
    <tr>
    <td>Email</td>
      <td><input name="email" type="email" id="email" size="40" required/>
      </td>
    </tr>    
    <tr>
      <td>Jenjang Studi</td>
      <td><input name="jenjang" type="text" id="jenjang" size="40" required/></td>
    </tr>
    <tr>
      <td>Fakultas </td>
      <td><input name="fakultas" type="text" id="fakultas" size="40" required/></td>
    </tr>
    <tr>
      <td>Jurusan </td>
      <td><input name="jurusan" type="text" id="jurusan" size="40" required/></td>
    </tr>
    <tr>
      <td>Semester</td>
      <td>
<select name="semester" id="semester" style="width:150px; height:20px;">
          <option selected>Semester 1</option>
          <option value="Semester 1">Semester 1</option>
          <option value="Semester 2">Semester 2</option>
          <option value="Semester 3">Semester 3</option>
          <option value="Semester 4">Semester 4</option>
          <option value="Semester 5">Semester 5</option>
          <option value="Semester 6">Semester 6</option>
          <option value="Semester 7">Semester 7</option>
          <option value="Semester 8">Semester 8</option>
            </select>
      </td>
    </tr>
    <tr>
      <td>Angkatan </td>
      <td>
<select name="angkatan" id="angkatan" style="width:150px; height:20px;">
          <option selected>2016-2017</option>
          <option value="2009-2010">2009-2010</option>
          <option value="2010-2011">2010-2011</option>
          <option value="2011-2012">2011-2012</option>
          <option value="2012-2013">2012-2013</option>
          <option value="2013-2014">2013-2014</option>
          <option value="2014-2015">2014-2015</option>
          <option value="2015-2016">2015-2016</option>
          <option value="2016-2017">2016-2017</option>

      </td>
    </tr>
        <tr>
      <td>Alamat</td>
      <td><textarea name="alamat" cols="70" rows="2" id="alamat"></textarea></td>
    </tr>
    <tr hidden>
      <td>Status</td>
      <td>
<select name="statusaktif" id="satutsaktif" style="width:150px; height:20px;">
          <option selected>N</option>
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Daftar" class="btn btn-primary">&nbsp;&nbsp;<input type="reset" name="Submit" value="Hapus" class="btn btn-primary"></td>
    </tr>
  </table>
</form> </div> </div> </div>
