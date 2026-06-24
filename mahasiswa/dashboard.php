<?php
session_start();

if (!isset($_SESSION['role'])) {
    header("Location: ../auth/login.php");
    exit;
}

include "../config/koneksi.php";

$total_praktikum = mysqli_num_rows(mysqli_query($conn,"
SELECT * FROM praktikum
"));

$total_lab = mysqli_num_rows(mysqli_query($conn,"
SELECT * FROM laboratorium
"));

$total_jadwal = mysqli_num_rows(mysqli_query($conn,"
SELECT * FROM jadwal
"));

?>


<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard Mahasiswa</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;
}

body{
background:#f4f7fe;
}

.sidebar{
position:fixed;
left:0;
top:0;
width:250px;
height:100%;
background:#1e293b;
padding:25px;
}

.logo{
color:white;
font-size:22px;
font-weight:bold;
margin-bottom:40px;
}

.menu a{
display:block;
padding:14px;
margin-bottom:10px;
color:white;
text-decoration:none;
border-radius:10px;
transition:.3s;
}

.menu a:hover{
background:#334155;
}

.main{
margin-left:250px;
padding:30px;
}

.header{
margin-bottom:30px;
}

.header h1{
color:#1e293b;
}

.header p{
color:#64748b;
margin-top:5px;
}

.cards{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
gap:20px;
margin-bottom:30px;
}

.card{
background:white;
padding:25px;
border-radius:20px;
box-shadow:0 10px 30px rgba(0,0,0,.08);
}

.card h3{
font-size:14px;
color:#64748b;
margin-bottom:10px;
}

.card .number{
font-size:35px;
font-weight:bold;
color:#2563eb;
}

.info-box{
background:white;
padding:25px;
border-radius:20px;
box-shadow:0 10px 30px rgba(0,0,0,.08);
}

.info-box h2{
margin-bottom:15px;
color:#1e293b;
}

.info-box p{
color:#64748b;
line-height:1.8;
}

</style>

</head>
<body>

<div class="sidebar">

<div class="logo">
🎓 Mahasiswa
</div>

<div class="menu">

<a href="dashboard.php">
🏠 Dashboard
</a>

<a href="jadwal.php">
📅 Jadwal Praktikum
</a>

<a href="profil.php">
👤 Profil Saya
</a>

<a href="../logout.php">
🚪 Logout
</a>

</div>

</div>

<div class="main">

<div class="header">
<h1>Selamat Datang 👋</h1>
<p>Sistem Informasi Praktikum Laboratorium</p>
</div>

<div class="cards">

<div class="card">
<h3>Total Praktikum</h3>
<div class="number">
<?= $total_praktikum ?>
</div>
</div>

<div class="card">
<h3>Laboratorium</h3>
<div class="number">
<?= $total_lab ?>
</div>
</div>

<div class="card">
<h3>Jadwal Praktikum</h3>
<div class="number">
<?= $total_jadwal ?>
</div>
</div>

</div>

<div class="info-box">

<h2>Informasi Mahasiswa</h2>

<p>
Selamat datang di Sistem Informasi Praktikum Laboratorium.
Melalui dashboard ini mahasiswa dapat melihat jadwal praktikum,
informasi laboratorium, dan data praktikum yang tersedia.
</p>

</div>

</div>

</body>
</html>