<?php
    session_start();
    if (empty($_SESSION["isloggedin"])) {
        header("Location: ../home.php");
    }
	include 'koneksi.php';

	$nama = $_POST['nama'];
	$produk = $_POST['produk'];
	$harga = $_POST['harga'];
	
	# ini untuk mencari apakah kategori ada atau tidak, apabila ada maka tidak perlu ditambahkan lagi
	$query2 = "INSERT INTO kategori(nama)
				SELECT * FROM (SELECT '$nama') AS tmp
				WHERE NOT EXISTS ( SELECT nama FROM kategori WHERE nama = '$nama') LIMIT 1";
	$query3 = "SELECT id_kategori FROM kategori WHERE nama = '$nama'";

	# inisialisasi variabel
	$id = 0;
	if($mysqli->query($query2) === TRUE){
		# ini untuk menjalankan query, yaitu mencari id kategori yang sama dengan nama kategori yang dimasukkan
		$id = $mysqli->query($query3);

		# ini untuk melakukan pengambilan data string dari selection yang diperoleh (objek -> string)
		$id = $id->fetch_assoc()['id_kategori'];
	}
	
	$query = "INSERT INTO produk(id_kategori, nama, harga) VALUES($id, '$produk', $harga)";

	if($mysqli->query($query) === TRUE){
		echo "Berhasil menambahkan data";
		header("Location: read.php");
	}else{
	    echo "Error: $mysqli->error";
	}
?>