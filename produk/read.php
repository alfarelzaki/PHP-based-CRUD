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
        <title>Read Produk</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
            <div class="container">
                <span class="navbar-brand mb-0 h1">Read Produk</span>
                <a href="tambah.php" class="btn btn-primary mr-auto">Tambah Produk</a>
                <a href="../kategori/read.php" class="btn btn-info ml-auto">Lihat Kategori</a>
                <a href="../logout.php" class="btn btn-outline-danger">Logout</a>
            </div>
        </nav>

        <div class="container">
            <p class="keterangan">Pada halaman ini anda dapat menambahkan, mengedit, dan menghapus data kategori</p>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr class="text-center">
                        <th scope="col">idProduk</th>
                        <th scope="col">idKategori</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Produk</th>
                        <th scope="col">Harga</th>
                        <th scope="col" colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include 'koneksi.php';
                        $query = "SELECT p.id_produk, p.id_kategori, p.nama, p.harga, k.nama as namaCat
                                FROM produk as p 
                                INNER JOIN kategori as k 
                                ON k.id_kategori = p.id_kategori";
                        if ($result = $mysqli->query($query)) {
                            while ($row = $result->fetch_assoc()) {
                    ?>
                            <tr>
                                <th scope="row"><?php echo $row['id_produk']?></th>
                                <td><?=$row['id_kategori']?></td>
                                <td><?=$row['namaCat']?></td>
                                <td><?=$row['nama']?></td>
                                <td><?=number_format($row['harga'])?></td>
                                <td width="1"><a href="edit.php?id_produk=<?=$row['id_produk']?>" class="btn btn-success">Edit</a></td>
                                <td width="1"><a href="delete.php?id_produk=<?=$row['id_produk']?>" class="btn btn-danger">Delete</a></td>
                            </tr>
                    <?php
                            }
                            $result->free();
                        }
                        $mysqli->close();
                    ?>
                </tbody>
            </table>
        </div>  
    </body>
</html>