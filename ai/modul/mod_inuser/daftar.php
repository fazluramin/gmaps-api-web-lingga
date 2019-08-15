<?php
include "config/koneksi.php";
if ($_GET[act]=="proses") {
	$simpan="INSERT INTO tbl_user SET username='$_POST[username]',
									  password='$_POST[password]',
									  nama='$_POST[nama]',
									  tgl_lahir='$_POST[tgl_lahir]',
									  jk='$_POST[jk]',
									  agama='$_POST[agama]',
									  kwgn='$_POST[kwgn]',
									  nama_ayah= '$_POST[nama_ayah]',
									  nama_ibu='$_POST[nama_ibu]',
									  pekerjaan_ayah='$_POST[pekerjaan_ayah]',
									  pekerjaan_ibu='$_POST[pekerjaan_ibu]',
									  sekolah_asal='$_POST[sekolah_asal]',
									  telp='$_POST[telp]',
									  alamat='$_POST[alamat]'";
	mysql_query($simpan);
	echo '<script language="javascript">
	alert("Anda Berhasil Melakukan Registrasi");
	window.location="media.php?module=users";
	</script>';
	exit();
}
?>
<form name="form1" method="post" action="media.php?module=inmurid&act=proses">
<br>
  <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <th colspan="2" align="center">Formulir Pendaftaran</th>
    </tr>
    <tr>
      <td>Nama</td>
      <td><input name="username" type="text" id="username" size="40" required/></td>
    </tr>
    <tr>
      <td>NIM</td>
      <td><input name="password" type="text" id="password" size="40" required/></td>
    </tr>
    <tr>
      <td>Tempat/Tanggal Lahir</td>
      <td><input name="nama" type="text" id="nama" size="40" required/></td>
    </tr>
    <tr>
      <td>Jenis Kelamin </td>
      <td>
<td>Jenis Kelamin </td>
            <td><input type=radio name=jk id="jk" value="Laki-Laki" onClick="setjenis(this.value)">Laki-Laki &nbsp;&nbsp;&nbsp; <input type=radio name=jk id="jk" value="Perempuan" onClick="setjenis(this.value)">Perempuan
      </td>
    </tr>
    <tr>
      <input name="tgl_lahir" type="text" id="tgl_lahir" size="40" required/>
      </td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td><input name="agama" type="text" id="agama" size="40" required/></td>
    </tr>
    <tr>
      <td>Kewarganegaraan</td>
      <td><input name="kwgn" type="text" id="kwgn" size="40" required/></td>
    </tr>
    <tr>
      <td>Fakultas </td>
      <td><input name="nama_ayah" type="text" id="nama_ayah" size="40" required/></td>
    </tr>
    <tr>
      <td>Jurusan </td>
      <td><input name="nama_ibu" type="text" id="nama_ibu" size="40" required/></td>
    </tr>
    <tr>
      <td>Semester</td>
      <td>
<select name="pekerjaan_ayah" id="pekerjaan_ayah" style="width:150px; height:20px;">
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
<select name="pekerjaan_ayah" id="pekerjaan_ayah" style="width:150px; height:20px;">
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
      <td>Tahun Rencana Lulus</td>
      <td>
<select name="sekolah_asal" id="sekolah_asal" style="width:150px; height:20px;">
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
      <td>IPK</td>
      <td>
<input name="telp" type="text" id="telp" size="40" required/>
      </td>
    </tr>
    <tr>
      <td>Prestasi</td>
      <td><textarea name="alamat" cols="120" rows="2" id="alamat"></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Daftar"><input type="reset" name="Submit" value="Hapus"></td>
    </tr>
  </table>
</form>
