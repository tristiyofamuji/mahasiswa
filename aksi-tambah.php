<?php
include 'koneksi.php';
if(isset($_POST['simpan'])){
	//deklarasikan nama variabelnya
	$nama_mahasiswa		= $_POST['nama_mahasiswa'];
	$nim				= $_POST['nim'];
	$jenis_kelamin		= $_POST['jenis_kelamin'];
	$alamat 			= $_POST['alamat'];
	$nama_ortu			= $_POST['nama_ortu'];

	//Membuat variabel untuk menampung syntax insert ke tabel mahasiswa.
	$tambah_mahasiswa	= "INSERT INTO mahasiswa (nama_mahasiswa, nim, jenis_kelamin, alamat) VALUES ('$nama_mahasiswa','$nim', '$jenis_kelamin', '$alamat')";

	//Membuat variabel untuk memasukan data ke tabel mahasiswa
	$mahasiswa			= mysqli_query($con, $tambah_mahasiswa) or die(mysqli_error());

	//Membuat variabel untuk menyeleksi data mahasiswa yang baru saja dimasukan untuk diambil id_mahasiswanya.
	$cari_mahasiswa		= mysqli_fetch_array(mysqli_query($con,"SELECT * FROM mahasiswa WHERE nama_mahasiswa = '$nama_mahasiswa' AND nim = '$nim'"));

	//Membuat variabel id_mahasiswa.
	$id_mahasiswa 		= $cari_mahasiswa['id_mahasiswa'];

	//Membuat variabel untuk menampung syntax insert ke tabel ortu
	$tambah_ortu		= "INSERT INTO ortu (nama_ortu, id_mahasiswa) VALUES ('$nama_ortu', '$id_mahasiswa')";

	//Membuat variabel untuk memasukan data ke tabel ortu
	$ortu				= mysqli_query($con, $tambah_ortu) or die(mysqli_error());

	if(($mahasiswa > 0) AND ($ortu > 0)){
		echo"<script>alert('Data mahasiswa dengan nama mahasiswa $nama_mahasiswa dan nama orang tuanya $nama_ortu berhasil disimpan.');document.location='data.php'</script>";
	}
	else{
		echo"<script>alert('Data mahasiswa beserta orang tuanya gagal tersimpan.');document.location=history.go(-1)</script>";
	}
}
?>