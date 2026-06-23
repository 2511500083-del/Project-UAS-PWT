<?php
include "../../config/koneksi.php";

$data = mysqli_query($conn,"
SELECT jd.*
FROM jadwal_detail jd
ORDER BY jd.id_detail DESC
");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Data Jadwal</title>

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
max-width:1200px;
margin:auto;
}

.header h1{
color:#1e293b;
margin-bottom:5px;
}

.header p{
color:#64748b;
}

.top-action{
display:flex;
justify-content:space-between;
margin:25px 0;
}

.back-dashboard{
background:#1e293b;
color:#fff;
padding:12px 18px;
border-radius:12px;
text-decoration:none;
font-weight:600;
}

.add-data{
background:#3b82f6;
color:#fff;
padding:12px 18px;
border-radius:12px;
text-decoration:none;
font-weight:600;
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
border-bottom:1px solid #e2e8f0;
}

.btn-edit{
background:#f59e0b;
color:#fff;
padding:8px 12px;
border-radius:8px;
text-decoration:none;
margin-right:5px;
}

.btn-hapus{
background:#ef4444;
color:#fff;
padding:8px 12px;
border-radius:8px;
text-decoration:none;
}
</style>
</head>

<body>

<div class="container">

<div class="header">
<h1>📅 Data Jadwal Praktikum</h1>
<p>Kelola jadwal laboratorium</p>
</div>

<div class="top-action">
<a href="../dashboard.php" class="back-dashboard">← Dashboard</a>
<a href="tambah.php" class="add-data">+ Tambah Jadwal</a>
</div>

<div class="table-container">

<table>
<thead>
<tr>
<th>No</th>
<th>ID</th>
<th>Praktikum</th>
<th>Asisten</th>
<th>Kelas</th>
<th>Hari</th>
<th>Jam</th>
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
<td><?= $row['id_detail']; ?></td>
<td><?= $row['id_praktikum']; ?></td>
<td><?= $row['id_asisten']; ?></td>
<td><?= $row['id_kelas']; ?></td>
<td><?= $row['hari']; ?></td>
<td><?= $row['jam_mulai']." - ".$row['jam_selesai']; ?></td>

<td>
<a href="edit.php?id=<?= $row['id_detail']; ?>" class="btn-edit">✏ Edit</a>
<a href="hapus.php?id=<?= $row['id_detail']; ?>" class="btn-hapus" onclick="return confirm('Hapus data?')">🗑</a>
</td>
</tr>

<?php } ?>

</tbody>
</table>

</div>

</div>

</body>
</html>