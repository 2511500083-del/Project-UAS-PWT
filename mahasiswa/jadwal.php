<?php

session_start();

if(!isset($_SESSION['id_user'])){
    header("Location: ../auth/login.php");
    exit();
}

include "../config/koneksi.php";

$data = mysqli_query($conn,"
SELECT
    jadwal.*,
    laboratorium.nama_lab,
    praktikum.nama_praktikum
FROM jadwal

LEFT JOIN laboratorium
ON jadwal.id_lab = laboratorium.id_lab

LEFT JOIN praktikum
ON jadwal.id_praktikum = praktikum.id_praktikum

ORDER BY jadwal.tanggal ASC
");

?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Jadwal Praktikum</title>

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

.table-container{
    background:white;
    border-radius:20px;
    overflow:hidden;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
}

table{
    width:100%;
    border-collapse:collapse;
}

thead{
    background:#3b82f6;
    color:white;
}

th{
    padding:18px;
    text-align:left;
}

td{
    padding:15px 18px;
    border-bottom:1px solid #e2e8f0;
}

tr:hover{
    background:#f8fafc;
}

.badge{
    background:#dbeafe;
    color:#2563eb;
    padding:5px 12px;
    border-radius:20px;
    font-size:13px;
    font-weight:600;
}

.no-data{
    text-align:center;
    padding:30px;
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
        <h1>📅 Jadwal Praktikum</h1>
        <p>Lihat seluruh jadwal praktikum laboratorium</p>
    </div>

    <div class="table-container">

        <table>

            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Laboratorium</th>
                    <th>Pratikum</th>

                </tr>
            </thead>

            <tbody>

            <?php

            $no = 1;

            if(mysqli_num_rows($data) > 0){

                while($row = mysqli_fetch_assoc($data)){

            ?>

                <tr>

                    <td><?= $no++; ?></td>

                    <td>
                        <span class="badge">
                            <?= $row['tanggal']; ?>
                        </span>
                    </td>

                    <td><?= $row['nama_lab']; ?></td>
                    <td><?= $row['nama_praktikum']; ?></td>

                </tr>

            <?php

                }

            }else{

            ?>

                <tr>
                    <td colspan="3" class="no-data">
                        Belum ada jadwal praktikum
                    </td>
                </tr>

            <?php } ?>

            </tbody>

        </table>

    </div>

</div>

</body>
</html>