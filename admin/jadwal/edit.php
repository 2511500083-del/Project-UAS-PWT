<?php
include "../../config/koneksi.php";

$id = $_GET['id'];

$jadwal = mysqli_fetch_assoc(mysqli_query($conn,"
SELECT *
FROM jadwal
WHERE id_jadwal='$id'
"));

$laboratorium = mysqli_query($conn,"
SELECT * FROM laboratorium
ORDER BY nama_lab ASC
");

$praktikum = mysqli_query($conn,"
SELECT * FROM praktikum
ORDER BY nama_praktikum ASC
");

$kelas = mysqli_query($conn,"
SELECT * FROM kelas
ORDER BY nama_kelas ASC
");

$asisten = mysqli_query($conn,"
SELECT * FROM asisten_lab
ORDER BY nama_asisten ASC
");

$detail = mysqli_fetch_assoc(mysqli_query($conn,"
SELECT *
FROM detail_jadwal
WHERE id_jadwal='$id'
"));

if(isset($_POST['simpan'])){

    $tanggal = $_POST['tanggal'];
    $id_lab = $_POST['id_lab'];

    $id_praktikum = $_POST['id_praktikum'];
    $id_kelas = $_POST['id_kelas'];
    $id_asisten = $_POST['id_asisten'];
    $hari = $_POST['hari'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];

    mysqli_query($conn,"
    UPDATE jadwal SET
        tanggal='$tanggal',
        id_lab='$id_lab'
    WHERE id_jadwal='$id'
    ");

    mysqli_query($conn,"
    UPDATE detail_jadwal SET
        id_praktikum='$id_praktikum',
        id_kelas='$id_kelas',
        id_asisten='$id_asisten',
        hari='$hari',
        jam_mulai='$jam_mulai',
        jam_selesai='$jam_selesai'
    WHERE id_jadwal='$id'
    ");

    echo "
    <script>
    alert('Data berhasil diupdate');
    window.location='index.php';
    </script>
    ";
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Edit Jadwal Praktikum</title>

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

h1{
color:#1e293b;
margin-bottom:10px;
}

.subtitle{
color:#64748b;
margin-bottom:25px;
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
font-size:14px;
}

input:focus,
select:focus{
outline:none;
border-color:#3b82f6;
}

.button-group{
display:flex;
gap:10px;
margin-top:20px;
}

.btn{
padding:12px 18px;
border:none;
border-radius:10px;
text-decoration:none;
font-weight:600;
cursor:pointer;
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

<h1>✏ Edit Jadwal Praktikum</h1>
<p class="subtitle">Perbarui data jadwal praktikum</p>

<form method="POST">

<div class="form-group">
<label>Tanggal</label>
<input
type="date"
name="tanggal"
value="<?= $jadwal['tanggal']; ?>"
required>
</div>

<div class="form-group">
<label>Laboratorium</label>
<select name="id_lab" required>

<?php
while($lab=mysqli_fetch_assoc($laboratorium)){
?>

<option
value="<?= $lab['id_lab']; ?>"
<?= ($jadwal['id_lab']==$lab['id_lab']) ? 'selected' : ''; ?>>
<?= $lab['nama_lab']; ?>
</option>

<?php } ?>

</select>
</div>

<div class="form-group">
<label>Praktikum</label>
<select name="id_praktikum" required>

<?php
while($p=mysqli_fetch_assoc($praktikum)){
?>

<option
value="<?= $p['id_praktikum']; ?>"
<?= ($detail['id_praktikum']==$p['id_praktikum']) ? 'selected' : ''; ?>>
<?= $p['nama_praktikum']; ?>
</option>

<?php } ?>

</select>
</div>

<div class="form-group">
<label>Kelas</label>
<select name="id_kelas" required>

<?php
while($k=mysqli_fetch_assoc($kelas)){
?>

<option
value="<?= $k['id_kelas']; ?>"
<?= ($detail['id_kelas']==$k['id_kelas']) ? 'selected' : ''; ?>>
<?= $k['nama_kelas']; ?>
</option>

<?php } ?>

</select>
</div>

<div class="form-group">
<label>Asisten Lab</label>
<select name="id_asisten" required>

<?php
while($a=mysqli_fetch_assoc($asisten)){
?>

<option
value="<?= $a['id_asisten']; ?>"
<?= ($detail['id_asisten']==$a['id_asisten']) ? 'selected' : ''; ?>>
<?= $a['nama_asisten']; ?>
</option>

<?php } ?>

</select>
</div>

<div class="form-group">
<label>Hari</label>
<input
type="text"
name="hari"
value="<?= $detail['hari']; ?>"
required>
</div>

<div class="form-group">
<label>Jam Mulai</label>
<input
type="time"
name="jam_mulai"
value="<?= substr($detail['jam_mulai'],0,5); ?>"
required>
</div>

<div class="form-group">
<label>Jam Selesai</label>
<input
type="time"
name="jam_selesai"
value="<?= substr($detail['jam_selesai'],0,5); ?>"
required>
</div>

<div class="button-group">

<button
type="submit"
name="simpan"
class="btn btn-simpan">
💾 Simpan
</button>

<a
href="index.php"
class="btn btn-kembali">
← Kembali
</a>

</div>

</form>

</div>

</div>

</body>
</html>