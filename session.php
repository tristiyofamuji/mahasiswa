<?php
//memulai session
session_start();
error_reporting(0);

if(!isset($_SESSION['id_admin'])){
	echo "<script>;document.location='http://localhost/basisdata2/'</script>";
}
?>