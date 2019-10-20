<?php
	session_start();
    if (empty($_SESSION["isloggedin"])) {
        header("Location: ../home.php");
    }
	include 'koneksi.php';

	$nama = $_POST['nama'];
	$produk = $_POST['produk'];
	$harga = $_POST['harga'];
	$id_produk = $_POST['id_produk'];
	$query3 = "INSERT INTO kategori (nama)
				SELECT * FROM (SELECT '$nama') AS tmp
				WHERE NOT EXISTS ( SELECT nama FROM kategori WHERE nama = '$nama') LIMIT 1";
	$mysqli->query($query3);

	$query2 = $mysqli->query("SELECT id_kategori FROM kategori WHERE nama = '$nama'")->fetch_assoc()['id_kategori'];
	$query = "UPDATE produk SET id_kategori='$query2', nama='$produk', harga='$harga' WHERE id_produk='$id_produk'";


	if($mysqli->query($query) === TRUE){
		echo "Berhasil mengubah data";
		header("Location: read.php");
	}else{
	    echo "Error: $mysqli->error";
	}