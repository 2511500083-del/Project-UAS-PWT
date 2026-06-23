<?php
session_start();

if($_SESSION['role']!='admin'){
    header("Location: ../auth/login.php");
}
?>

<h1>Dashboard Admin</h1>

<a href="mahasiswa/index.php">Data Mahasiswa</a><br>
<a href="asisten/index.php">Data Asisten</a><br>
<a href="laboratorium/index.php">Data Lab</a><br>
<a href="praktikum/index.php">Data Praktikum</a><br>
<a href="jadwal/index.php">Jadwal Praktikum</a>