<?php
include 'koneksi.php';
if(isset($_POST['simpan'])){
	//deklarasikan nama variabelnya
	$id_mahasiswa		= $_POST['id_mahasiswa'];
	$nama_mahasiswa		= $_POST['nama_mahasiswa'];
	$nim				= $_POST['nim'];
	$jenis_kelamin		= $_POST['jenis_kelamin'];
	$alamat 			= $_POST['alamat'];
	$nama_ortu			= $_POST['nama_ortu'];

	//Membuat variabel untuk menampung syntax update ke tabel mahasiswa.
	$edit_mahasiswa		= "UPDATE mahasiswa SET nama_mahasiswa = '$nama_mahasiswa', nim = '$nim', jenis_kelamin = '$jenis_kelamin', alamat = '$alamat' WHERE id_mahasiswa = '$id_mahasiswa'";

	$mahasiswa			= mysqli_query($con, $edit_mahasiswa) or die(mysqli_error());

	//Membuat variabel untuk menampung syntax update ke tabel ortu
	$edit_ortu			= "UPDATE ortu SET nama_ortu = '$nama_ortu' WHERE id_mahasiswa = '$id_mahasiswa'";

	//Membuat variabel untuk mengupdate data ke tabel ortu
	$ortu				= mysqli_query($con, $edit_ortu) or die(mysqli_error());

	if(($mahasiswa > 0) AND ($ortu > 0)){
		echo"<script>alert('Data mahasiswa dengan nama mahasiswa $nama_mahasiswa dan nama orang tuanya $nama_ortu berhasil diupdate.');document.location='data.php'</script>";
	}
	else{
		echo"<script>alert('Data mahasiswa beserta orang tuanya gagal diupdate.');document.location=history.go(-1)</script>";
	}
}
?>