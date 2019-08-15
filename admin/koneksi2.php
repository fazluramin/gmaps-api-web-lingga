<?php
$host="localhost";
$user="root";
$pass="";
$db="lingga";
$conn=mysql_connect($host,$user,$pass,$db);
if ($conn){
	$buka=mysql_select_db($db);
	if(!$buka){
		die("Database tidak bisa dibuka");
	}}
else
	{
	die("Server mySQL tidak terhubung");
	}
?>