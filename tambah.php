<?php 
include "functions.php";

// Ccek apakah tombol submit sudah di tekan atau belum
if( isset($_POST["submit"])){
    // cek apakah data berhasil di tambahkan atau tidak
    if( tambah($_POST)> 0 ){
         echo "<script>
				    alert('data berhasil ditambahkan!');
				    document.location.href = 'index.php'
				</script>";
      }else{
           echo "<script>
				    alert('data Gagal ditambahkan!');
				    document.location.href = 'index.php'
				</script>";
    }
}

 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ta,bah Data Mahasiswa</title>
</head>
<body>
	<h1>Tambah Data Mahasiswa</h1>

	<form action="" method="post" enctype="multipart/form-data">

		<ul>
	  		 <li>
	       		 <label for="nrp">NRP:</label>
	        	 <input type="text" name="nrp" id="nrp" required>
			</li>
	    	<li>
	    		<label for="nrp">Nama:</label>
	        	<input type="text" name="nama" id="nama" required>
	    	</li>
	    	<li>
	    		<label for="nrp">Email:</label>
	        	<input type="text" name="email" id="email" required>
	    	</li>
	    	<li>
	    		<label for="nrp">Jurusan:</label>
	        	<input type="text" name="jurusan" id="jurusan" required>
	    	</li>
	    	<li>
	    		<label for="nrp">Gambar:</label>
	        	<input type="file" name="gambar" id="gambar">
	    	</li>
	    	<li>
	    		<button type="submit" name="submit">Tambah Data!</button>
	    	</li>

		</ul>
		
	</form>

</body>
</html>