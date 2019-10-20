<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "crud";
    $mysqli = new mysqli($host, $user, $password, $database);
    if ($mysqli->connect_errno) {
        echo "Error: ". $mysqli->connect_error;
        exit();
    }
?>