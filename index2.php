<?php 
// Koneksi database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

// Ambil data mahasiswa

$result = mysqli_query($conn, "SELECT * FROM mahasiswa");
// var_dump($result)
// Memunculkan pesan error di mysqli
// if( !$result ){
//     echo mysqli_error($conn);
// }
// //ambil data dari objek result

// $mhs = mysqli_fetch_assoc($result);
// // var_dump($mhs);




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Dasar</title>
</head>
<body>

    <h1>Daftar Mahasiswa </h1>

    <table border="1" cellpadding="10" cellspacing="0">

    <tr>
        <th>No.</th>
        <th>Aksi</th>
        <th>Gambar</th>
        <th>NRP</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jurusan</th>
    </tr>


    <?php $i = 1; ?>
    <?php while($row = mysqli_fetch_assoc($result)):  ?>
  

    <tr>
        <td><?= $i; ?></td>
        <td>
            <a href="">Unah</a> |
            <a href="">Hapus</a>
        </td>
        <td> <img src="img/<?= $row["gambar"]; ?>" width="50"</td> 
        <td><?= $row["nrp"]; ?></td>
        <td><?= $row["nama"]; ?></td>
        <td><?= $row["email"]; ?></td>
        <td><?= $row["jurusan"]; ?></td>

    </tr>
    <?php $i++; ?>
    <?php
        endwhile;
    ?>


    </table>
    
</body>
</html>