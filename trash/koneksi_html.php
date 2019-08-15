<?php
$db_host = "mysql.idhostinger.com";
$db_user = "u721086519_lt";
$db_pass = "913113";
$db_name = "u721086519_db";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(mysqli_connect_errno()){
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}
?>