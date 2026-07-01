<?php
session_start();

if (!isset($_SESSION['id_user'])) {
    header("Location: ../auth/login.php");
    exit();
}

include "../config/koneksi.php";

$id_user = $_SESSION['id_user'];

/*
Sesuaikan nama tabel jika berbeda
*/

$query = mysqli_query($conn, "
SELECT
    a.*,
    u.username
FROM asisten_lab a
JOIN users u ON a.id_user = u.id_user
WHERE a.id_user = '$id_user'
");

$asisten = mysqli_fetch_assoc($query);

if (!$asisten) {
    die("Data asisten tidak ditemukan");
}

$inisial = strtoupper(substr($asisten['nama_asisten'], 0, 1));
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Profil Saya</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    background:#f4f7fc;
}

/* SIDEBAR */

.sidebar{
    position:fixed;
    left:0;
    top:0;
    width:250px;
    height:100%;
    background:linear-gradient(180deg,#2563eb,#1d4ed8);
    padding:25px;
}

.logo{
    color:white;
    font-size:24px;
    font-weight:bold;
    margin-bottom:40px;
}

.menu a{
    display:block;
    text-decoration:none;
    color:white;
    padding:14px;
    border-radius:12px;
    margin-bottom:10px;
    transition:.3s;
}

.menu a:hover,
.menu a.active{
    background:rgba(255,255,255,.15);
}

/* MAIN */

.main{
    margin-left:250px;
    padding:35px;
}

.page-title{
    margin-bottom:25px;
}

.page-title h1{
    color:#1e293b;
}

.page-title p{
    color:#64748b;
    margin-top:5px;
}

/* CARD */

.profile-card{
    background:white;
    max-width:950px;
    margin:auto;
    border-radius:25px;
    overflow:hidden;
    box-shadow:0 15px 35px rgba(0,0,0,.08);
}

/* HEADER */

.profile-top{
    background:linear-gradient(135deg,#2563eb,#3b82f6);
    padding:40px;
    text-align:center;
    color:white;
}

.avatar{
    width:120px;
    height:120px;
    margin:auto;
    border-radius:50%;
    background:white;
    color:#2563eb;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:50px;
    font-weight:bold;
    margin-bottom:15px;
}

.profile-top h2{
    font-size:30px;
}

.profile-top p{
    margin-top:8px;
    opacity:.9;
}

/* INFO */

.profile-body{
    padding:35px;
}

.info-row{
    display:flex;
    justify-content:space-between;
    padding:18px 0;
    border-bottom:1px solid #e2e8f0;
}

.info-label{
    font-weight:600;
    color:#1e293b;
}

.info-value{
    color:#475569;
}

/* BUTTON */

.action{
    margin-top:30px;
    text-align:center;
}

.btn{
    display:inline-block;
    text-decoration:none;
    padding:12px 24px;
    border-radius:10px;
    margin:5px;
    color:white;
    background:#2563eb;
    transition:.3s;
}

.btn:hover{
    background:#1d4ed8;
    transform:translateY(-2px);
}

.btn-password{
    background:#0f172a;
}

.btn-password:hover{
    background:#020617;
}

/* RESPONSIVE */

@media(max-width:768px){

.sidebar{
    width:100%;
    height:auto;
    position:relative;
}

.main{
    margin-left:0;
}

.info-row{
    flex-direction:column;
    gap:8px;
}

}

</style>
</head>

<body>

<div class="sidebar">

    <div class="logo">
        👨‍🏫 Asisten
    </div>

    <div class="menu">
        <a href="dashboard.php">🏠 Dashboard</a>
        <a href="jadwal.php">📅 Jadwal Praktikum</a>
        <a href="profil.php" class="active">👤 Profil Saya</a>
        <a href="ganti_password.php">🔒 Ganti Password</a>
        <a href="../auth/logout.php">🚪 Logout</a>
    </div>

</div>

<div class="main">

    <div class="page-title">
        <h1>👤 Profil Saya</h1>
        <p>Informasi akun asisten laboratorium</p>
    </div>

    <div class="profile-card">

        <div class="profile-top">

            <div class="avatar">
                <?= $inisial ?>
            </div>

            <h2><?= $asisten['nama_asisten']; ?></h2>
            <p>Asisten Laboratorium</p>

        </div>

        <div class="profile-body">

            <div class="info-row">
                <div class="info-label">Username</div>
                <div class="info-value">
                    <?= $asisten['username']; ?>
                </div>
            </div>

            <div class="info-row">
                <div class="info-label">ID Asisten</div>
                <div class="info-value">
                    <?= $asisten['id_asisten']; ?>
                </div>
            </div>

            <div class="info-row">
                <div class="info-label">Nama Asisten</div>
                <div class="info-value">
                    <?= $asisten['nama_asisten']; ?>
                </div>
            </div>

            <?php if(isset($asisten['no_telp'])){ ?>
            <div class="info-row">
                <div class="info-label">No Telepon</div>
                <div class="info-value">
                    <?= $asisten['no_telp']; ?>
                </div>
            </div>
            <?php } ?>

            <?php if(isset($asisten['email'])){ ?>
            <div class="info-row">
                <div class="info-label">Email</div>
                <div class="info-value">
                    <?= $asisten['email']; ?>
                </div>
            </div>
            <?php } ?>

            <div class="action">

                <a href="edit_profil.php" class="btn">
                    ✏ Edit Profil
                </a>

                <a href="ganti_password.php" class="btn btn-password">
                    🔒 Ganti Password
                </a>

            </div>

        </div>

    </div>

</div>

</body>
</html>