<!DOCTYPE html>
<?php
include 'koneksi.php';
include 'session.php';
$id_admin = $_SESSION['id_admin'];
$admin = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM admin WHERE id_admin = '$id_admin'"));
?>
<html>
   <head>
      <title>Daftar data</title>
      <!--Link dibawah ini untuk memanggil CSS online-->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <style>
.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    padding: 12px 16px;
    z-index: 1;
    cursor: pointer;
}
.dropdown-content:hover{
   background: #cacaca;
}
.dropdown-content a{
   text-decoration: none;
   color: black;
}
.dropdown:hover .dropdown-content {
    display: block;
}
</style>
   </head>
   <body>
      <div class="col-md-12">
         <br />
         Selamat datang, 
         <div class="dropdown">
            <span><b><?php echo $admin['nama_admin'] ?> <i class="fa fa-caret-down"></i></b></span>
            <div class="dropdown-content">
               <a href="logout.php">Keluar</a>
            </div>
         </div>
         <br />
         <center>
            <h3>Menampilkan data mahasiswa beserta data orang tuanya</h3>
         </center>
         <div class="col-md-12">
            <a href="tambah.php" class="btn btn-warning"> Tambah data</a>
            <a href="riwayat.php" class="btn btn-primary"> Lihat riwayat</a><br /><br />
            <table id="example" class="table table-striped table-bordered" style="width:100%">
               <thead>
                  <tr>
                     <th>No</th>
                     <th>Nama mahasiswa</th>
                     <th>NIM mahasiswa</th>
                     <th>Jenis kelamin</th>
                     <th>Nama orang tua</th>
                     <th>Alamat</th>
                     <th >Aksi</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  $no = 1;
                     $sql = mysqli_query($con,"SELECT mahasiswa.id_mahasiswa, mahasiswa.nama_mahasiswa, mahasiswa.nim, mahasiswa.jenis_kelamin, mahasiswa.alamat, ortu.id_ortu, ortu.nama_ortu FROM ortu INNER JOIN mahasiswa ON ortu.id_mahasiswa = mahasiswa.id_mahasiswa ");
                     while($data = mysqli_fetch_array($sql)){ ?>
                  <tr>
                     <td><?php echo $no++; ?></td>
                     <td><?php echo $data['nama_mahasiswa'] ?></td>
                     <td><?php echo $data['nim'] ?></td>
                     <td><?php echo $data['jenis_kelamin'] ?></td>
                     <td><?php echo $data['nama_ortu'] ?></td>
                     <td><?php echo $data['alamat'] ?></td>
                     <td><a href="edit.php?data=<?php echo $data['id_mahasiswa'] ?>">Edit data</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="aksi-hapus.php?data=<?php echo $data['id_mahasiswa'] ?>" onClick='return confirm("Apakah anda yakin akan menghapus data mahasiswa dengan NIM mahasiswa <?php echo $data['nim'] ?> ?")'>Hapus data</a></td>
                  </tr>
                  <?php } ?>
               </tbody>
            </table>
         </div>
      </div>
   </body>
      <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
      <script type="text/javascript">
         $(document).ready(function() {
            $('#example').DataTable( {
            } );
         } );
      </script>
</html>