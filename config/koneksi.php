<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "db_praktikum"
);

if(!$conn){
    die("Koneksi gagal");
}
?>