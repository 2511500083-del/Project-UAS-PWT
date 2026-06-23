<?php

include "../../config/koneksi.php";

if(isset($_POST['tambah'])){

$nama=$_POST['nama_lab'];
$kapasitas=$_POST['kapasitas'];

mysqli_query($conn,"
INSERT INTO laboratorium
(
nama_lab,
kapasitas
)
VALUES
(
'$nama',
'$kapasitas'
)
");

echo "
<script>
alert('Data Berhasil Ditambahkan');
window.location='index.php';
</script>
";

}

?>

<!DOCTYPE html>
<html>
<head>
<title>Tambah Laboratorium</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;
}

body{
background:#f4f7fe;
display:flex;
justify-content:center;
align-items:center;
min-height:100vh;
}

.container{
width:700px;
background:white;
padding:35px;
border-radius:20px;
box-shadow:0 10px 30px rgba(0,0,0,.1);
}

.header{
text-align:center;
margin-bottom:25px;
}

.form-group{
margin-bottom:20px;
}

label{
display:block;
margin-bottom:8px;
font-weight:600;
}

input{
width:100%;
padding:12px;
border:1px solid #cbd5e1;
border-radius:10px;
}

.btn{
padding:12px;
border:none;
border-radius:10px;
cursor:pointer;
font-weight:bold;
}

.btn-simpan{
background:#3b82f6;
color:white;
}

.btn-kembali{
background:#e2e8f0;
text-decoration:none;
padding:12px 20px;
border-radius:10px;
color:black;
}

</style>

</head>
<body>

<div class="container">

<div class="header">
<h2>🖥 Tambah Laboratorium</h2>
</div>

<form method="POST">

<div class="form-group">
<label>Nama Laboratorium</label>
<input type="text" name="nama_lab" required>
</div>

<div class="form-group">
<label>Kapasitas</label>
<input type="number" name="kapasitas" required>
</div>

<button type="submit" name="tambah" class="btn btn-simpan">
💾 Simpan
</button>

<a href="index.php" class="btn-kembali">
← Kembali
</a>

</form>

</div>

</body>
</html>