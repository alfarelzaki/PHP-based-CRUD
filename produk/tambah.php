<?php
    session_start();
    if (empty($_SESSION["isloggedin"])) {
        header("Location: ../home.php");
    }

    echo @$_SESSION['kategoriMessage'];
    $_SESSION['kategoriMessage'] = '';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <title>Tambah Produk</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container">
            <span class="navbar-brand mb-0 h1">Tambah Produk</span>
        </div>
    </nav>

    <div class="container">
        <div class="vertical-center">
            <form action="create.php" method="POST" class="login-popup mx-auto align-middle">
                <div class="form-group">
                    <label>Kategori</label>
                    <input type="text" name="nama" class="form-control" placeholder="Enter kategori">
                    <label>Nama Produk</label>
                    <input type="text" name="produk" class="form-control" placeholder="Enter Produk">
                    <label>Harga</label>
                    <input type="number" name="harga" class="form-control" placeholder="Enter Harga">
                </div>
                <input type="submit" class="btn btn-primary" name="submit" value="Simpan">
            </form>
        </div>
    </div>
  </body>
</html>