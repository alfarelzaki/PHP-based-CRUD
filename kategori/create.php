<?php
    session_start();
    include "koneksi.php";
    $nama = $_POST["nama"];
    if (!empty($nama)) {
        $query = "INSERT INTO kategori(nama) VALUES('$nama')";
        # query untuk melakukan pencarian nama kategori yang sama
        $query2 = "SELECT * FROM kategori WHERE nama = '$nama'";
        
        # cek apakah kategori sudah ada atau tidak
        if (empty($mysqli->query($query2)->fetch_assoc()['nama'])) {
            if ($mysqli->query($query) === TRUE) {
                echo "berhasil menambahkan data";
            } else {
                echo "Error: $mysqli->error";
            }
        # menambahkan pesan apabila ternyata kategori sudah ada
        } else $_SESSION['kategoriMessage'] = "<script>alert('kategori $nama sudah ada')</script>";
    }
    header("Location: read.php");
?>