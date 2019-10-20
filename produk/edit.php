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
    <title>Edit Produk</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container">
            <span class="navbar-brand mb-0 h1">Edit Produk</span>
        </div>
    </nav>

    <div class="container">
      <div class="vertical-center">
        <form action="update.php" method="POST" class="login-popup mx-auto align-middle">
          <?php
              include 'koneksi.php';
              $id_produk = $_GET['id_produk'];
              $query = "SELECT id_produk, id_kategori, nama, harga FROM produk WHERE id_produk = '$id_produk'";
              
              if ($result = $mysqli->query($query)) {
                  while ($row = $result->fetch_assoc()) {
                  $id = $mysqli->query("SELECT nama FROM kategori WHERE id_kategori = $row[id_kategori]");
          ?>
          <div class="form-group">
            <label>Kategori</label>
            <input type="text" name="nama" class="form-control" placeholder="Enter kategori" value="<?=$id->fetch_assoc()['nama']?>">
            <label>Nama Produk</label>
            <input type="text" name="produk" class="form-control" placeholder="Enter Produk" value="<?=$row['nama']?>">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" placeholder="Enter Harga" value="<?=$row['harga']?>">
            <input type="hidden" name="id_produk" value="<?=$row['id_produk']?>">
          </div>
          <input type="submit" class="btn btn-primary" name="submit" value="Simpan">
          <?php
                }
                //free result set (optional)
                $result->free();
            }
            $mysqli->close();
          ?>
        </form>
      </div>
    </div>
  </body>
</html>