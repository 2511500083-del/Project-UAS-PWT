<?php

include "../../config/koneksi.php";

$data = mysqli_query($conn,"
SELECT *
FROM laboratorium
ORDER BY id_lab ASC
");

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Data Laboratorium</title>

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

</style>

</head>
<body>

<div class="container">

<div class="header">
<h1>🖥 Data Laboratorium</h1>
<p>Kelola data laboratorium praktikum</p>
</div>

<div class="top-action">

<a href="../dashboard.php" class="back-dashboard">
← Dashboard
</a>

<a href="tambah.php" class="add-data">
+ Tambah Laboratorium
</a>

</div>

<div class="table-container">

<table>

<thead>
<tr>
<th>No</th>
<th>ID Lab</th>
<th>Nama Lab</th>
<th>Kapasitas</th>
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
<td><?= $row['id_lab']; ?></td>
<td><?= $row['nama_lab']; ?></td>
<td><?= $row['kapasitas']; ?> Orang</td>

<td>

<a href="edit.php?id=<?= $row['id_lab']; ?>" class="btn-edit">
✏ Edit
</a>

<a href="hapus.php?id=<?= $row['id_lab']; ?>"
class="btn-hapus"
onclick="return confirm('Yakin hapus data?')">
🗑 Hapus
</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</body>
</html>