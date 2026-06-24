<?php

session_start();

if(!isset($_SESSION['id_user'])){
    header("Location: ../auth/login.php");
    exit();
}

include "../config/koneksi.php";

/*
Sesuaikan query ini dengan database kalian.
Jika username mahasiswa disimpan di session:
*/


$id_user = $_SESSION['id_user'];

$data = mysqli_query($conn,"
SELECT
    mahasiswa.*,
    kelas.nama_kelas,
    users.username
FROM mahasiswa

LEFT JOIN kelas
ON mahasiswa.id_kelas = kelas.id_kelas

LEFT JOIN users
ON mahasiswa.id_user = users.id_user

WHERE mahasiswa.id_user = '$id_user'
");

$mhs = mysqli_fetch_assoc($data);

if(!$mhs){
    die("Data mahasiswa tidak ditemukan");
}


?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Profil Mahasiswa</title>

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
    margin-bottom:25px;
}

.header h1{
    color:#1e293b;
}

.header p{
    color:#64748b;
}

.profile-card{
    background:white;
    border-radius:20px;
    padding:30px;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
}

.profile-header{
    text-align:center;
    margin-bottom:30px;
}

.avatar{
    width:100px;
    height:100px;
    border-radius:50%;
    background:#3b82f6;
    color:white;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:40px;
    font-weight:bold;
    margin:auto;
    margin-bottom:15px;
}

.profile-header h2{
    color:#1e293b;
}

.profile-header p{
    color:#64748b;
}

.info-table{
    width:100%;
    border-collapse:collapse;
}

.info-table td{
    padding:15px;
    border-bottom:1px solid #e2e8f0;
}

.label{
    width:200px;
    font-weight:600;
    color:#1e293b;
}

.value{
    color:#64748b;
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

        <a href="../auth/logout.php">
            🚪 Logout
        </a>

    </div>

</div>

<div class="main">

    <div class="header">
        <h1>👤 Profil Mahasiswa</h1>
        <p>Informasi data diri mahasiswa</p>
    </div>

    <div class="profile-card">

        <div class="profile-header">

            <div class="avatar">
                <?= strtoupper(substr($mhs['nama_mahasiswa'],0,1)); ?>
            </div>

            <h2><?= $mhs['nama_mahasiswa']; ?></h2>
            <p>Mahasiswa Praktikum</p>

        </div>

        <table class="info-table">

            <tr>
                <td class="label">Username</td>
                <td class="value"><?= $mhs['username']; ?></td>
            </tr>

            <tr>
                <td class="label">NIM</td>
                <td class="value"><?= $mhs['nim']; ?></td>
            </tr>

            <tr>
                <td class="label">Nama Mahasiswa</td>
                <td class="value"><?= $mhs['nama_mahasiswa']; ?></td>
            </tr>

            <tr>
                <td class="label">Jurusan</td>
                <td class="value"><?= $mhs['jurusan']; ?></td>
            </tr>

            <tr>
                <td class="label">Kelas</td>
                <td class="value"><?= $mhs['nama_kelas']; ?></td>
            </tr>

        </table>

    </div>

</div>

</body>
</html>