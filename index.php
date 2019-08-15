<?php
session_start();
error_reporting(0);
if($_SESSION){
#	header("Location: index.php");
#	header("Location: logout.php");	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shorcut icon" type="image/ico" href="img/logo_LT.png">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Aplikasi Navigasi Kampar</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<style>
		body {
		background: #7f9b4e url(img/ic.jpg); background-attachment:fixed;
			
			background-color:#eee;
			    background-position: center;
			        background-size: cover;
		}
		.row {
			margin:100px auto;
			width:300px;
			text-align:center;
		}
		.login {
			background-color:transparant;
			padding:20px;
			margin-top:20px;
		}
	</style>
	 <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
</head>
<body>
	<center>
	<div class="container">
		<div class="row">
			<img src="img/logo_LT.png" width="200" height="200">
			<div class="login">
				<?php
				if(isset($_POST['login'])){
					include("config/koneksi_login.php");
					
					$nama		= $_POST['nama'];
					$username	= $_POST['username'];
					$password	= $_POST['password'];
					$level		= $_POST['level'];
					
					$query = mysqli_query($koneksi, "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password' AND statusaktif='Y'");
					if(mysqli_num_rows($query) == 0){
						echo '<div class="alert alert-danger"><i class="fa fa-warning"></i> <b>Maaf...</b>
							<br> Username atau Password 
							<br> Tidak Terdaftar
						</div>';
					}else{
						$row = mysqli_fetch_assoc($query);
						
						if($row['level'] == admin && $level == admin){
							$_SESSION['username']=$username;
							$_SESSION['level']='Adimin';
							$_SESSION['nama']=$nama;
							header("Location: admin/index.php?module=");
						}else{
							echo '<div class="alert alert-danger"><b>Login Gagal !</b>
							<br>Silahkan periksa kembali, atau akun anda sedang di blokir</div>';
						}
					}
				}
				?>	
				<form action="" method="post" name="form1">
					<div class="form-group input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="text" name="username" class="form-control" placeholder="Username" title="Masukkan Username anda" required autofocus />
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon"><i class="fa fa-lock"> </i> </span>
						<input type="password" name="password" class="form-control" placeholder="Password" title="Masukkan Password anda" required autofocus />
					</div>
					<div  class="form-group">
						<input  type="hidden" name="level" class="form-control" placeholder="Username" value="admin" required autofocus />
					</div>
					<div class="form-group">
						<input type="submit" name="login" class="btn btn-success btn-block" value="Login" />
						
					</div>
				</form>
			</div>
			<font size="2" color="white">Aplikasi Navigasi Objek Wisata Kabupaten Kampar
			Copyright &copy; 2016 | <b>Dinas Kebudayaan dan Pariwisata Kabupaten Kampar, Provinsi Riau</b>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>