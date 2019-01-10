<!DOCTYPE html>
<?php
include 'koneksi.php';
include 'session.php';
$a = $_GET['data'];
$id_admin = $_SESSION['id_admin'];
$admin = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM admin WHERE id_admin = '$id_admin'"));
?>
<html>
   <head>
      <title>Edit data</title>
      <!--Link dibawah ini untuk memanggil CSS online-->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
            <h3>Menambahkan data mahasiswa beserta data orang tuanya</h3>
         </center>
         <?php
         $sql = mysqli_query($con,"SELECT mahasiswa.id_mahasiswa, mahasiswa.nama_mahasiswa, mahasiswa.nim, mahasiswa.jenis_kelamin, mahasiswa.alamat, ortu.id_ortu, ortu.nama_ortu FROM ortu INNER JOIN mahasiswa ON ortu.id_mahasiswa = mahasiswa.id_mahasiswa WHERE mahasiswa.id_mahasiswa = '$a' ");
         while($data = mysqli_fetch_array($sql)){ ?>
         <div class="col-md-6">
            <form action="aksi-edit.php" method="post">
               <div class="form-group">
                  <label>Nama mahasiswa</label>
                  <input type="hidden" name="id_mahasiswa" value="<?php echo $data['id_mahasiswa'] ?>">
                  <input type="text" name="nama_mahasiswa" class="form-control" placeholder="Nama mahasiswa" value="<?php echo $data['nama_mahasiswa'] ?>">
               </div>
               <div class="form-group">
                  <label>NIM mahasiswa</label>
                  <input type="text" name="nim" class="form-control" placeholder="NIM mahasiswa" value="<?php echo $data['nim'] ?>">
               </div>
               <div class="form-group">
                  <label>Jenis kelamin</label>
                  <select name="jenis_kelamin" class="form-control">
                     <option value="Laki-laki" <?php if($data['jenis_kelamin'] == 'Laki-laki') {echo 'selected';} ?>>Laki-laki</option>
                     <option value="Perempuan" <?php if($data['jenis_kelamin'] == 'Perempuan') {echo 'selected';} ?>>Perempuan</option>
                  </select>
               </div>
               <div class="form-group">
                  <label>nama orang tua</label>
                  <input type="text" name="nama_ortu" class="form-control" placeholder="Nama orang tua" value="<?php echo $data['nama_ortu'] ?>">
               </div>
               <div class="form-group">
                  <label>Alamat</label>
                  <textarea name="alamat" class="form-control" placeholder="Alamat rumah mahasiswa" rows="4"><?php echo $data['alamat'] ?></textarea>
               </div>
               <button name="simpan" class="btn btn-success">Simpan</button>&nbsp;&nbsp;<a href="javascript:history.back()" class="btn btn-danger">Kembali</a>
            </form>
         </div>
         <?php } ?>
      </div>
   </body>
</html>