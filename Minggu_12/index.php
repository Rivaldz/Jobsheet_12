<?php
require 'functions.php';
$mahasiswa=query("SELECT * FROM mahasiswa");

// tombol cari di tekan 
// cari pada line 7 adalah name dari button
if(isset($_POST["cari"])){
    // dibawah ini adalah function cari dan keyword adalah name inputan text
    $mahasiswa = cari($_POST["keyword"]);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Daftar Mahasiswa</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>
    <h1>Menambah data Mahasiswa</h1>
    <a href="tambah_data.php">Tambah Data Mahasiswa</a>
       <form action="" method="post">
   <input type="text" name="keyword" size="48" autofocus placeholder="Masukan keyword pencarian" autocomplete="off"> 
   <button type = "submit" name=cari> cari </button> 
    </form>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No. </th>
            <th>Nama </th>
            <th>Nim </th>
            <th>Email </th>
            <th>Jurusan </th>
            <th>Gambar </th>
            <th>Aksi </th>
        </tr>
<?php $i=1 ?>
<!-- kita buat contoh data static -->
<?php foreach ($mahasiswa as $row):?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row["Nama"]; ?></td>
            <td><?= $row["Nim"]; ?></td>
            <td><?= $row["Email"]; ?></td>
            <td><?= $row["Jurusan"]; ?></td>
            <td> <img src="image/<?php echo $row["Gambar"]; ?>" alt="" height="100" width="100" srcset=""></td>
            <td>
               
                <a href="edit.php?id=<?php echo $row["id"];?>">Edit</a>
                <a href="hapus.php?id=<?php echo $row["id"]; ?>"onclick="return confirm('Apakah data ini akan dihapus?')">Hapus</a>
            </td>
        </tr>
<?php $i++ ?>
<?php endforeach;?>
    </table>
</body>
</html>
 
 <table class="table table-hover">
     <thead>
         <tr>
             <th></th>
         </tr>
     </thead>
     <tbody>
         <tr>
             <td></td>
         </tr>
     </tbody>
 </table>
 
