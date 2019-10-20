<?php
    session_start();
    if (empty($_SESSION["isloggedin"])) {
        header("Location: ../home.php");
    }
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
        <title>Edit kategori</title>
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
                <div class="container">
                    <span class="navbar-brand mb-0 h1">Edit Kategori</span>
                </div>
            </nav>

            <div class="vertical-center">
                <form action="update.php" method="POST" class="login-popup mx-auto align-middle">
                    <?php
                        include 'koneksi.php';
                        $id_kategori = $_GET['id_kategori'];
                        $query = "SELECT id_kategori, nama FROM kategori WHERE id_kategori = '$id_kategori'";
                        if ($result = $mysqli->query($query)) {
                            while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="form-group">
                        <label>Kategori</label>
                        <p class="keterangan">Masukkan nama kategori pengganti</p>
                        <input type="text" name="nama" class="form-control" placeholder="Enter kategori" value="<?=$row['nama']?>">
                        <input type="hidden" name="id_kategori" value="<?=$row['id_kategori']?>">
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