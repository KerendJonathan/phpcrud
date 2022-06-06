<?php 
// Koneksi database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query){
    global $conn;
    $result=mysqli_query($conn, $query); 
    $rows=[]; 
    while( $row=mysqli_fetch_assoc ($result)){
         $rows []=$row; 
    }
    return $rows;   
}



function tambah($data){
    global $conn;
// ambil data tiap elemen dalam form
        $nrp=htmlspecialchars($data["nrp"]);
        $nama=htmlspecialchars($data["nama"]);
        $email=htmlspecialchars($data["email"]);
        $jurusan=htmlspecialchars($data["jurusan"]);

//  Fungsi Upload Gambar
    $gambar = upload();
    if( !$gambar ){
        return false;
    }

// query insert data
        $query="INSERT INTO mahasiswa
            VALUES
          ('', '$nama', '$nrp', '$email', '$jurusan', '$gambar')";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);

}

function upload(){
    
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //cek apakah ada  gambar yang tidak di upload
    if( $error === 4 ){
        echo"
        <script>
        alert('Pilih Gambar Terlebih Dahulu')    
        </script>";

        return false;
    } 

    // Cek apakah yang di Upload gambar atau tidak
    $ekstensiGambarValid = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if( !in_array($ekstensiGambar, $ekstensiGambarValid)){
        echo"
        <script>
        alert('Yang Anda Upload Bukan Gambar')    
        </script>";

        return false;
    }
    // Cek Jika Ukura Terlalu besar / Limit IMG
    if( $ukuranFile > 2000000 ){
        echo"
        <script>
        alert('Ukuran Gambar Terllu Besar')    
        </script>";

        return false;
    }

    // Siap Upload Gambar
    // Membuat nama gambar baru
    $namaFilebaru = uniqid();
    $namaFilebaru .= '.';
    $namaFilebaru .= $ekstensiGambar;



    move_uploaded_file($tmpName, 'img/' . $namaFilebaru);

    return $namaFilebaru;


}



//Hapus

function hapus ($id){
    global $conn;
   mysqli_query ($conn, "DELETE FROM mahasiswa WHERE id = $id"); 
    return mysqli_affected_rows($conn);
}

// Ubah Data

function ubah($data){

  global $conn;
// ambil data tiap elemen dalam form
        $id = $data["id"];
        $nrp=htmlspecialchars($data["nrp"]);
        $nama=htmlspecialchars($data["nama"]);
        $email=htmlspecialchars($data["email"]);
        $jurusan=htmlspecialchars($data["jurusan"]);
        $gambarLama = htmlspecialchars($data["gambarLama"]);

        // Cek apakah usermemilih gamkar baru atau tidak
        if( $_FILES['gambar']['error'] === 4 ){
            $gambar = $gambarLama;
        }else{
            $gambar = upload();
        }

     

// query insert data
       $query = "UPDATE mahasiswa SET
            nama = '$nama',
            nrp = '$nrp',
            email = '$email',
            jurusan = '$jurusan',
            gambar = '$gambar'

        WHERE id=$id  ";
           

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);

}

// Function Cari
 function cari($keyword){
    $query = "SELECT * FROM mahasiswa WHERE 
        nama LIKE '%$keyword%' OR 
        nrp LIKE '%$keyword%' OR 
        email LIKE '$keyword' OR 
        jurusan LIKE '$keyword'
        ";

        return query($query);

}


?>