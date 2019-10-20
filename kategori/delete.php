<?php
	include 'koneksi.php';

	$id_kategori = $_GET['id_kategori'];
	$query = "DELETE FROM kategori WHERE id_kategori = '$id_kategori'";

	if($mysqli->query($query) === TRUE){
		echo "berhasil menghapus data";
		header("Location: read.php");
	}else{
	    echo "Error: $mysqli->error";
    }
?>