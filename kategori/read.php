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
        <title>Read Kategori</title>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
            <div class="container">
                <span class="navbar-brand mb-0 h1">Read Kategori</span>
                <a href="tambah.php" class="btn btn-primary mr-auto">Tambah Kategori</a>
                <a href="../produk/read.php" class="btn btn-info ml-auto">Lihat Produk</a>
                <a href="../logout.php" class="btn btn-outline-danger">Logout</a>
            </div>
        </nav>
        <div class="container">
            <p class="keterangan">Pada halaman ini anda dapat menambahkan, mengedit, dan menghapus data kategori</p>
            <table class="table table-bordered table-hover">
                <thead>
                <tr class="text-center">
                    <th scope="col">ID</th>
                    <th scope="col">Kategori</th>
                    <th scope="col" colspan="2">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    include './koneksi.php';
                    $query = "SELECT id_kategori, nama FROM kategori";
                    // if ($result = mysqli_query($mysqli2, $query)) {
                    if ($result = $mysqli->query($query)) {
                        // while ($row = mysqli_fetch_assoc($result)) {
                        while ($row = $result->fetch_assoc()) {
                        //loop here
                ?>
                        <tr>
                            <th scope="row"><?php echo $row['id_kategori']?></th>
                            <td><?=$row['nama']?></td>
                            <td width="1"><a href="edit.php?id_kategori=<?=$row['id_kategori']?>" class="btn btn-success">Edit</a></td>
                            <td width="1"><a href="delete.php?id_kategori=<?=$row['id_kategori']?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                <?php
                        }
                        //free result set (optional)
                        // mysqli_free_result($result);
                        $result->free();
                    }
                    // mysqli_close($mysqli2);
                    $mysqli->close();
                ?>
                </tbody>
            </table>
        </div>  
    </body>
</html>