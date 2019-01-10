<?php
include 'koneksi.php';
include 'session.php';
	$id				= $_GET['data'];
	$id_admin 		= $_SESSION['id_admin'];

	//query untuk mencari data mahasiswa berdasarkan idnya.
	$cari_data		= mysqli_fetch_array(mysqli_query($con,"SELECT * FROM mahasiswa WHERE id_mahasiswa = '$id'"));

	$nama_variabel	= $cari_data['nama_mahasiswa'];
	$tgl_hapus		= date("d-m-Y h:i:s a");
	$nama_tabel		= 'mahasiswa';
	//Membuat variabel untuk menampung syntax insert ke tabel riwayat.
	$tambah_riwayat	= mysqli_query($con,"INSERT INTO riwayat (id_admin, nama_tabel, nama_variabel, tgl_hapus) VALUES ('$id_admin','$nama_tabel', '$nama_variabel', '$tgl_hapus')");

	if($tambah_riwayat > 0){
		//query untuk menghapus data mahasiswa pada tabel mahasiswa berdasarkan idnya.
		$hapus			= mysqli_query($con, "DELETE FROM mahasiswa where id_mahasiswa = '$id'");
		echo"<Script>alert('Data mahasiswa berhasil dihapus.');window.location=history.go(-1)</script>";
	}
	else{
		echo"<Script>alert('Gagal menghapus data mahasiswa.');window.location=history.go(-1)</script>";
	}
?>