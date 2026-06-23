<?php

include "../../config/koneksi.php";

$id = $_GET['id'];

$data = mysqli_query($conn,"
SELECT *
FROM praktikum
WHERE id_praktikum='$id'
");

$praktikum = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){

    $nama = $_POST['nama_praktikum'];
    $semester = $_POST['semester'];

    $update = mysqli_query($conn,"
        UPDATE praktikum
        SET
            nama_praktikum='$nama',
            semester='$semester'
        WHERE id_praktikum='$id'
    ");

    if($update){

        echo "
        <script>
            alert('Data Praktikum Berhasil Diupdate');
            window.location='index.php';
        </script>
        ";

    }
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Edit Praktikum</title>

<style>

/* CSS sama seperti Mahasiswa & Asisten */

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;
}

body{
background:#f4f7fe;
min-height:100vh;
display:flex;
justify-content:center;
align-items:center;
padding:30px;
}

.container{
width:100%;
max-width:700px;
background:white;
border-radius:20px;
padding:35px;
box-shadow:0 10px 30px rgba(0,0,0,.1);
}

.header{
text-align:center;
margin-bottom:30px;
}

.icon{
font-size:60px;
margin-bottom:10px;
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

input[readonly]{
background:#e2e8f0;
}

.btn-group{
display:flex;
gap:15px;
margin-top:25px;
}

.btn{
flex:1;
padding:12px;
border:none;
border-radius:10px;
font-weight:bold;
text-decoration:none;
text-align:center;
}

.btn-update{
background:#10b981;
color:white;
}

.btn-kembali{
background:#e2e8f0;
color:#334155;
}

</style>

</head>
<body>

<div class="container">

<div class="header">
<div class="icon">📚</div>
<h2>Edit Praktikum</h2>
</div>

<form method="POST">

<div class="form-group">
<label>ID Praktikum</label>
<input
type="text"
value="<?= $praktikum['id_praktikum']; ?>"
readonly>
</div>

<div class="form-group">
<label>Nama Praktikum</label>
<input
type="text"
name="nama_praktikum"
value="<?= $praktikum['nama_praktikum']; ?>"
required>
</div>

<div class="form-group">
<label>Semester</label>
<input
type="text"
name="semester"
value="<?= $praktikum['semester']; ?>"
required>
</div>

<div class="btn-group">

<button
type="submit"
name="update"
class="btn btn-update">
🚀 Update Data
</button>

<a href="index.php" class="btn btn-kembali">
← Kembali
</a>

</div>

</form>

</div>

</body>
</html>