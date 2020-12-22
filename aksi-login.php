<?php
include 'koneksi.php';
if(isset($_POST['masuk'])){
	$username 	= $_POST['username'];
	$password 	= $_POST['password'];

	//query untuk cek data admin yang tersimpan di database
	$login		= mysqli_query($con, "SELECT * FROM admin WHERE username= '$username' AND password='$password' ");

	$row 		= mysqli_fetch_array($login);
	$cek		= mysqli_num_rows($login);

	if($cek > '0'){
		session_start();
		$_SESSION['id_admin'] 	= $row['id_admin'];
		echo"<script>alert('Selamat datang $row[nama_admin].');document.location='data.php'</script>";
	} 
	else{
		echo"<script>alert('Usrname atau password salah');document.location=history.go(-1)</script>";	    
	}
}
?>