<?php

include "../../config/koneksi.php";

if(isset($_POST['simpan'])){

    $tanggal = $_POST['tanggal'];
    $id_lab  = $_POST['id_lab'];

    mysqli_query($conn,"
        INSERT INTO jadwal(tanggal,id_lab)
        VALUES('$tanggal','$id_lab')
    ");

    $id_jadwal = mysqli_insert_id($conn);

    $id_praktikum = $_POST['id_praktikum'];
    $id_kelas     = $_POST['id_kelas'];
    $id_asisten   = $_POST['id_asisten'];
    $hari         = $_POST['hari'];
    $jam_mulai    = $_POST['jam_mulai'];
    $jam_selesai  = $_POST['jam_selesai'];

    mysqli_query($conn,"
        INSERT INTO detail_jadwal
        (
            id_jadwal,
            id_praktikum,
            id_kelas,
            id_asisten,
            hari,
            jam_mulai,
            jam_selesai
        )
        VALUES
        (
            '$id_jadwal',
            '$id_praktikum',
            '$id_kelas',
            '$id_asisten',
            '$hari',
            '$jam_mulai',
            '$jam_selesai'
        )
    ");

    echo "
    <script>
        alert('Data Jadwal Berhasil Ditambahkan');
        window.location='index.php';
    </script>
    ";
}

$lab = mysqli_query($conn,"SELECT * FROM laboratorium");
$praktikum = mysqli_query($conn,"SELECT * FROM praktikum");
$kelas = mysqli_query($conn,"SELECT * FROM kelas");
$asisten = mysqli_query($conn,"SELECT * FROM asisten_lab");

?>

<!DOCTYPE html>

<html>
<head>
<meta charset="UTF-8">
<title>Tambah Jadwal</title>

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
max-width:900px;
margin:auto;
}

.card{
background:white;
padding:30px;
border-radius:20px;
box-shadow:0 10px 30px rgba(0,0,0,.08);
}

h2{
margin-bottom:25px;
color:#1e293b;
}

.form-group{
margin-bottom:18px;
}

label{
display:block;
margin-bottom:8px;
font-weight:600;
color:#334155;
}

input,
select{
width:100%;
padding:12px;
border:1px solid #cbd5e1;
border-radius:10px;
}

.btn{
padding:12px 18px;
border:none;
border-radius:10px;
cursor:pointer;
font-weight:600;
text-decoration:none;
display:inline-block;
}

.btn-simpan{
background:#3b82f6;
color:white;
}

.btn-kembali{
background:#64748b;
color:white;
}

</style>

</head>
<body>

<div class="container">

<div class="card">

<h2>Tambah Jadwal Praktikum</h2>

<form method="POST">

<div class="form-group">
<label>Tanggal</label>
<input type="date" name="tanggal" required>
</div>

<div class="form-group">
<label>Laboratorium</label>
<select name="id_lab" required>
<option value="">-- Pilih Laboratorium --</option>
<?php while($l=mysqli_fetch_assoc($lab)){ ?>
<option value="<?= $l['id_lab']; ?>">
<?= $l['nama_lab']; ?>
</option>
<?php } ?>
</select>
</div>

<div class="form-group">
<label>Praktikum</label>
<select name="id_praktikum" required>
<option value="">-- Pilih Praktikum --</option>
<?php while($p=mysqli_fetch_assoc($praktikum)){ ?>
<option value="<?= $p['id_praktikum']; ?>">
<?= $p['nama_praktikum']; ?>
</option>
<?php } ?>
</select>
</div>

<div class="form-group">
<label>Kelas</label>
<select name="id_kelas" required>
<option value="">-- Pilih Kelas --</option>
<?php while($k=mysqli_fetch_assoc($kelas)){ ?>
<option value="<?= $k['id_kelas']; ?>">
<?= $k['nama_kelas']; ?>
</option>
<?php } ?>
</select>
</div>

<div class="form-group">
<label>Asisten Lab</label>
<select name="id_asisten" required>
<option value="">-- Pilih Asisten --</option>
<?php while($a=mysqli_fetch_assoc($asisten)){ ?>
<option value="<?= $a['id_asisten']; ?>">
<?= $a['nama_asisten']; ?>
</option>
<?php } ?>
</select>
</div>

<div class="form-group">
<label>Hari</label>
<select name="hari" required>
<option>Senin</option>
<option>Selasa</option>
<option>Rabu</option>
<option>Kamis</option>
<option>Jumat</option>
<option>Sabtu</option>
</select>
</div>

<div class="form-group">
<label>Jam Mulai</label>
<input type="time" name="jam_mulai" required>
</div>

<div class="form-group">
<label>Jam Selesai</label>
<input type="time" name="jam_selesai" required>
</div>

<button type="submit" name="simpan" class="btn btn-simpan">
Simpan
</button>

<a href="index.php" class="btn btn-kembali">
Kembali
</a>

</form>

</div>

</div>

</body>
</html>