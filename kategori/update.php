<?php
    session_start();
	include 'koneksi.php';
	$nama = $_POST['nama'];
    $id_kategori = $_POST['id_kategori'];
    if (!empty($nama)) {
        $query = "UPDATE kategori SET nama='$nama' WHERE id_kategori='$id_kategori'";

        # query untuk melakukan pencarian nama kategori yang sama
        $query2 = "SELECT * FROM kategori WHERE nama = '$nama'";
        
        # cek apakah kategori sudah ada atau tidak
        if (empty($mysqli->query($query2)->fetch_assoc()['nama'])) {
            if ($mysqli->query($query) === TRUE) {
                echo "berhasil mengedit data";
            } else {
                echo "Error: $mysqli->error";
            }
        # menambahkan pesan apabila ternyata kategori sudah ada
        } else $_SESSION['kategoriMessage'] = "<script>alert('kategori $nama sudah ada')</script>";
    }

    header("Location: read.php");
?>