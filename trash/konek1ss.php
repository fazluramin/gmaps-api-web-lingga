<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "lingga";
 
$dbc = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$dbc) {
    die("Database connection failed: " . mysqli_error($dbc));
    exit();
}

$dbs = mysqli_select_db($dbc, $db_name);
if (!$dbs) {
    die("Database selection failed: " . mysqli_error($dbc));
    exit(); 
}


      $tampil = mysql_query("SELECT * FROM tbl_admin");
      
      echo "
  <div>
        <ul class='breadcrumb'>
          <li>
            <a href='index.php?module=' style='text-decoration:none'><i class='icon-home'></i><font color='black'> Home</font></a> <span class='divider'>/</span>
          </li>
          <li>
            <li class='active'><i class='icon-user'></i><font color='grey'> Data Admin</font></a> <span class='divider'></span>
          </li>
        </ul></font>
      </div>
      
<div class='row-fluid sortable'>    
        <div class='box span12'>
          <div class='box-header well' data-original-title>
            <h2><i class='icon-user'></i><font color='green'> Admin</font></h2>&nbsp;&nbsp;|&nbsp;
            <a href='index.php?module=inadmin' type=button class='btn btn-success'><i class='icon-plus-sign icon-white'></i> Add Data</br></a>
            <div class='box-icon'>
              <a href='#' class='btn btn-minimize btn-round'><i class='icon-chevron-up'></i></a>
              <a href='#' class='btn btn-close btn-round'><i class='icon-remove'></i></a>
            </div>
          </div>
          <div class='box-content'>
            <table class='table table-striped table-bordered bootstrap-datatable datatable' width='100%'>
              <thead>
                <tr>
          <th width='3%'><center>No</th>
          <th width='15%'>Nama</th>
          <th width='10%'>No Hp</th>
          <th width='10%'>Tanggal Lahir</th>
          <th width='35%'>Alamat</th>
          <th width='7%'><center>Status</th>
          <th width='25%'><center>Action</th>         
                </tr>
              </thead>   

             
"; 
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "
            <td><center>$no</td>
            <td>$r[nama]</td>
            <td>$r[telp]</td>
            <td>$r[tgl_lahir]</td>
            <td>$r[alamat]</td>";
      
        if ($r[statusaktif]=="Y") {
          echo"<td><center><input type=button class='btn btn-success btn-block' value='Aktif' onclick=\"window.location.href='$aksi?module=admin&act=nonaktif&id=$r[id_user]';\"></td>";

        }else {
          echo"<td align='center'><center><input type=button class='btn btn-danger btn-block' value='Tidak Aktif' onclick=\"window.location.href='$aksi?module=admin&act=aktif&id=$r[id_user]';\"></td>";
        }
        echo"
                <td class='center'><center>
                  <a href='?module=admin&act=lihat&id=$r[id_user]' class='btn btn-success' href='#'>
                    <i class='icon-zoom-in icon-white'></i>  
                    Detail                                            
                  </a>
                  <!--<a href='?module=admin&act=update&id=$r[id_user]' onclick=\"return confirm('Apakah anda yakin ingin mengubah data admin $r[nama]?')\" class='btn btn-info' href='#'>
                    <i class='icon-edit icon-white'></i>  
                    Edit                                            
                  </a>-->
                  <a href=$aksi?module=admin&act=hapus&id=$r[id_user] onclick=\"return confirm('Apakah anda yakin ingin menghapus data admin $r[nama]?')\" class='btn btn-danger' href='#'>
                    <i class='icon-trash icon-white'></i> 
                    Delete
                  </a>
               ";
        echo"</tr>
        ";
      $no++;
    }
    echo "</table>
    ";
  
?>
</div></div></div></div></div></div></div></div></div></div>