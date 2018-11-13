<?php
    require 'functions.php';
    // cek apakah button submit sudah ditekan atau belum
    if(isset($_POST['submit'])){
        // cek sukses data dirubah menggunakan function edit pada function.php
        if(edit($_POST) > 0){
            echo "
                <script>
                    alert('data berhasil disimpan');
                    document.location.href='index.php';
                </script>
                ";
        } else {
            echo "
            <script>
                alert('data gagal disimpan');
                document.location.href='edit.php';
            </script>";
            echo "<br>";
            echo mysqli_error($conn);
        }
    }

//  menggunakakn method get untuk mengambil id yg telah terseleksi oleh user dan dimasukan ke dalam data  -->
$id=$_GET['id'];
//var_dump($id);

// query berdasarkan id
$mhs =query("SELECT * FROM mahasiswa WHERE id=$id")[0];
//var_dump($mhs);
?>

<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Update data</title>
    </head>
    <body>
        <h1 class="text-center">Update Data Mahasiswa</h1>
        <form action="" method="post">
           <li>
                <input type="hidden" name="id" value="<?= $mhs['id'] ?>"> 
           </li> 
            
            <ul>
                <li>
                    <!-- for pada tabel terhung dengan id jadi jika label nama diklik maka textfield nama akan aktif juga -->
                    
                    <label for="Nama">Nama:</label>
                    <!-- untuk mengisi name besar kecilnya harus sesuai dengan fieldnya -->

                    <input type="text" name="Nama" id="Nama" value="<?= $mhs['Nama']; ?>">
                </li>
                <li>
                    <label for="Nim">Nim:</label>
                    <input type="text" name="Nim" id="Nim" required value="<?= $mhs['Nim']; ?>">
                </li>
                <li>
                    <label for="Email">Email</label>
                    <input type="text" name="Email" id="Email"  required value="<?= $mhs['Email']; ?>">
                </li>
                <li>
                    <label for="Jurusan">Jurusan</label>
                    <input type="text" name="Jurusan" id="Jurusan"required value="<?= $mhs['Jurusan']; ?>">

                </li>
                <li>
                    <label for="Gambar">Gambar</label>
                    <input type="text" name="Gambar" id="Gambar" required value="<?= $mhs['Gambar']; ?>">
                </li>
                <li>
                    <button type="submit" name="submit"> Update</button>
                </li>
            </ul>
        </form>
    </body>
</html>
