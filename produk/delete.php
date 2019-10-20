<?php
	session_start();
    if (empty($_SESSION["isloggedin"])) {
        header("Location: ../home.php");
    }
	include 'koneksi.php';

	$id_produk = $_GET['id_produk'];
	$query = "DELETE FROM produk WHERE id_produk = '$id_produk'";

	if($mysqli->query($query) === TRUE){
		echo "Berhasil menghapus data";
		header("Location: read.php");
	}else{
	    echo "Error: $mysqli->error";
	}