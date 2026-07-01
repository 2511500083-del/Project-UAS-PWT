<?php
session_start();

if (!isset($_SESSION['role'])) {
    header("Location: ../auth/login.php");
    exit;
}

if ($_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard Admin</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

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
    width:260px;
    height:100%;
    background:#1e293b;
    color:white;
    padding:20px;
}

.logo{
    text-align:center;
    margin-bottom:40px;
}

.logo h2{
    font-size:22px;
}

.menu a{
    display:block;
    color:white;
    text-decoration:none;
    padding:14px;
    margin-bottom:10px;
    border-radius:10px;
    transition:.3s;
}

.menu a:hover{
    background:#334155;
}

.menu i{
    margin-right:10px;
}



.main{
    margin-left:260px;
    padding:25px;
}



.topbar{
    background:white;
    padding:20px;
    border-radius:15px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    box-shadow:0 2px 10px rgba(0,0,0,.1);
}

.topbar h2{
    color:#1e293b;
}

.admin-profile{
    font-weight:bold;
    color:#0d6efd;
}



.welcome{
    margin-top:20px;
    background:linear-gradient(135deg,#3b82f6,#2563eb);
    color:white;
    padding:25px;
    border-radius:15px;
}

.welcome h3{
    margin-bottom:10px;
}



.cards{
    margin-top:25px;
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:20px;
}

.card{
    background:white;
    padding:25px;
    border-radius:15px;
    box-shadow:0 3px 10px rgba(0,0,0,.1);
}

.card h2{
    margin-bottom:10px;
}

.card i{
    font-size:35px;
}

.blue{
    border-left:6px solid #3b82f6;
}

.green{
    border-left:6px solid #10b981;
}

.orange{
    border-left:6px solid #f59e0b;
}

.red{
    border-left:6px solid #ef4444;
}



.table-box{
    margin-top:25px;
    background:white;
    border-radius:15px;
    padding:20px;
    box-shadow:0 3px 10px rgba(0,0,0,.1);
}

.table-box h3{
    margin-bottom:15px;
}

table{
    width:100%;
    border-collapse:collapse;
}

table th{
    background:#3b82f6;
    color:white;
    padding:12px;
}

table td{
    padding:12px;
    border-bottom:1px solid #ddd;
}



@media(max-width:768px){

    .sidebar{
        width:100%;
        height:auto;
        position:relative;
    }

    .main{
        margin-left:0;
    }

}

</style>
</head>

<body>



<div class="sidebar">

    <div class="logo">
        <h2>🖥️ LAB SYSTEM</h2>
    </div>

    <div class="menu">

        <a href="dashboard.php">
            <i class="bi bi-house-door-fill"></i>
            Dashboard
        </a>

        <a href="mahasiswa/index.php">
            <i class="bi bi-mortarboard-fill"></i>
            Mahasiswa
        </a>

        <a href="asisten/index.php">
            <i class="bi bi-person-workspace"></i>
            Asisten
        </a>

        <a href="laboratorium/index.php">
            <i class="bi bi-pc-display"></i>
            Laboratorium
        </a>

        <a href="praktikum/index.php">
            <i class="bi bi-book-fill"></i>
            Praktikum
        </a>

        <a href="jadwal/index.php">
            <i class="bi bi-calendar-event-fill"></i>
            Jadwal
        </a>

        <a href="../auth/logout.php">
            <i class="bi bi-box-arrow-right"></i>
            Logout
        </a>

    </div>

</div>



<div class="main">

   

    <div class="topbar">

        <h2>Dashboard Admin</h2>

        <div class="admin-profile">
            👤 Admin
        </div>

    </div>

   

    <div class="welcome">

        <h3>Selamat Datang Admin 👋</h3>

        <p>
            Kelola data mahasiswa, asisten laboratorium,
            jadwal praktikum, dan laboratorium melalui dashboard ini.
        </p>

    </div>

    

    <div class="cards">

        <div class="card blue">
            <i class="bi bi-mortarboard-fill"></i>
            <h2>120</h2>
            <p>Mahasiswa</p>
        </div>

        <div class="card green">
            <i class="bi bi-person-workspace"></i>
            <h2>8</h2>
            <p>Asisten Lab</p>
        </div>

        <div class="card orange">
            <i class="bi bi-pc-display"></i>
            <h2>5</h2>
            <p>Laboratorium</p>
        </div>

        <div class="card red">
            <i class="bi bi-book-fill"></i>
            <h2>10</h2>
            <p>Praktikum</p>
        </div>

    </div>

   

    <div class="table-box">

        <h3>Jadwal Praktikum Terbaru</h3>

        <table>

            <tr>
                <th>Praktikum</th>
                <th>Lab</th>
                <th>Hari</th>
                <th>Jam</th>
            </tr>

            <tr>
                <td>Desain Mobile</td>
                <td>Lab 1</td>
                <td>Senin</td>
                <td>08.00 - 10.00</td>
            </tr>

            <tr>
                <td>Pemrograman Web</td>
                <td>Lab Komputer 2</td>
                <td>Selasa</td>
                <td>10.00 - 12.00</td>
            </tr>

        </table>

    </div>

</div>

</body>
</html>