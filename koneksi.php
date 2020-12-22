<?php
date_default_timezone_set("Asia/Jakarta");
$con=mysqli_connect("localhost","root","","db_mahasiswa");
if (mysqli_connect_errno())
{
  echo "Gagal tersambung dengan database : " . mysqli_connect_error();
}
?>