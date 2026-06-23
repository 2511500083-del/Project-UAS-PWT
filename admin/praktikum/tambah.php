<?php

include "../../config/koneksi.php";

if(isset($_POST['tambah'])){

    $nama = $_POST['nama_praktikum'];
    $semester = $_POST['semester'];

    $insert = mysqli_query($conn,"
        INSERT INTO praktikum
        (
            nama_praktikum,
            semester
        )
        VALUES
        (
            '$nama',
            '$semester'
        )
    ");

    if($insert){

        echo "
        <script>
            alert('Data Praktikum Berhasil Ditambahkan');
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
<title>Tambah Praktikum</title>

<style>

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
padding:35px;
border-radius:20px;
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
text-decoration:none;
font-weight:bold;
text-align:center;
}

.btn-simpan{
background:#3b82f6;
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
<h2>Tambah Praktikum</h2>
</div>

<form method="POST">

<div class="form-group">
<label>Nama Praktikum</label>
<input type="text" name="nama_praktikum" required>
</div>

<div class="form-group">
<label>Semester</label>
<input type="text" name="semester" required>
</div>

<div class="btn-group">

<button type="submit" name="tambah" class="btn btn-simpan">
💾 Simpan
</button>

<a href="index.php" class="btn btn-kembali">
← Kembali
</a>

</div>

</form>

</div>

</body>
</html>