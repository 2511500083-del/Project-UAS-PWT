<?php

include "../../config/koneksi.php";

$data = mysqli_query($conn,"
SELECT
    j.id_jadwal,
    j.tanggal,
    l.nama_lab
FROM jadwal j
JOIN laboratorium l
    ON j.id_lab = l.id_lab
ORDER BY j.id_jadwal ASC
");

?>

<!DOCTYPE html>

<html>
<head>
<meta charset="UTF-8">
<title>Data Jadwal Praktikum</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;
}

body{
background:#f4f7fe;
padding:30px;
}

.container{
max-width:1300px;
margin:auto;
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

.top-action{
display:flex;
justify-content:space-between;
margin-bottom:25px;
}

.back-dashboard,
.add-data{
padding:12px 18px;
border-radius:12px;
text-decoration:none;
font-weight:600;
color:white;
transition:.3s;
}

.back-dashboard{
background:#1e293b;
}

.add-data{
background:#3b82f6;
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

th,td{
padding:15px;
text-align:left;
vertical-align:top;
}

td{
border-bottom:1px solid #e2e8f0;
}

.btn-edit{
background:#f59e0b;
color:white;
padding:8px 12px;
border-radius:8px;
text-decoration:none;
}

.btn-hapus{
background:#ef4444;
color:white;
padding:8px 12px;
border-radius:8px;
text-decoration:none;
}

.detail-item{
margin-bottom:8px;
padding:8px;
background:#f8fafc;
border-radius:8px;
}

</style>

</head>
<body>

<div class="container">

<div class="header">
<h1>📅 Data Jadwal Praktikum</h1>
<p>Kelola jadwal praktikum laboratorium</p>
</div>

<div class="top-action">

<a href="../dashboard.php" class="back-dashboard">
← Dashboard
</a>

<a href="tambah.php" class="add-data">
+ Tambah Jadwal
</a>

</div>

<div class="table-container">

<table>

<thead>
<tr>
<th>No</th>
<th>ID Jadwal</th>
<th>Tanggal</th>
<th>Laboratorium</th>
<th>Detail Jadwal</th>
<th>Aksi</th>
</tr>
</thead>

<tbody>

<?php

$no=1;

while($row=mysqli_fetch_assoc($data)){

?>

<tr>

<td><?= $no++; ?></td>

<td><?= $row['id_jadwal']; ?></td>

<td><?= date('d-m-Y', strtotime($row['tanggal'])); ?></td>

<td><?= $row['nama_lab']; ?></td>

<td>

<?php

$detail = mysqli_query($conn,"
SELECT
    d.*,
    p.nama_praktikum,
    a.nama_asisten,
    k.nama_kelas
FROM detail_jadwal d
JOIN praktikum p
    ON d.id_praktikum = p.id_praktikum
JOIN asisten_lab a
    ON d.id_asisten = a.id_asisten
JOIN kelas k
    ON d.id_kelas = k.id_kelas
WHERE d.id_jadwal = '".$row['id_jadwal']."'
");

while($d=mysqli_fetch_assoc($detail)){

?>

<div class="detail-item">

<b><?= $d['nama_praktikum']; ?></b><br>

Hari :

<?= $d['hari']; ?><br>

Jam :

<?= substr($d['jam_mulai'],0,5); ?>

*

<?= substr($d['jam_selesai'],0,5); ?><br>

Kelas :

<?= $d['nama_kelas']; ?><br>

Asisten :

<?= $d['nama_asisten']; ?>

</div>

<?php } ?>

</td>

<td>

<a
href="edit.php?id=<?= $row['id_jadwal']; ?>"
class="btn-edit">
✏ Edit </a>

<br><br>

<a
href="hapus.php?id=<?= $row['id_jadwal']; ?>"
class="btn-hapus"
onclick="return confirm('Yakin hapus data jadwal ini?')">
🗑 Hapus </a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</body>
</html>