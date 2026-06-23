<?php
session_start();

// Jika sudah login
if(isset($_SESSION['role'])){

    if($_SESSION['role'] == 'admin'){
        header("Location: admin/dashboard.php");
    }

    if($_SESSION['role'] == 'asisten'){
        header("Location: asisten/dashboard.php");
    }

    if($_SESSION['role'] == 'mahasiswa'){
        header("Location: mahasiswa/dashboard.php");
    }

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistem Informasi Praktikum Laboratorium</title>

    <style>

        body{
            font-family: Arial, sans-serif;
            background:#f4f6f9;
            margin:0;
        }

        .container{
            text-align:center;
            margin-top:100px;
        }

        .btn{
            background:#0d6efd;
            color:white;
            padding:12px 20px;
            text-decoration:none;
            border-radius:5px;
        }

    </style>

</head>
<body>

<div class="container">

    <h1>Sistem Informasi Praktikum Laboratorium</h1>

    <p>
        Selamat Datang di Sistem Informasi Praktikum Laboratorium
    </p>

    <br>

    <a href="auth/login.php" class="btn">
        Login
    </a>

</div>

</body>
</html>