<?php
session_start();
include "../config/koneksi.php";

/*
|--------------------------------------------------------------------------
| CEK LOGIN
|--------------------------------------------------------------------------
*/

if (!isset($_SESSION['id_user'])) {
    header("Location: ../login.php");
    exit;
}

$id_user = $_SESSION['id_user'];

/*
|--------------------------------------------------------------------------
| AMBIL DATA ASISTEN
|--------------------------------------------------------------------------
*/

$query = mysqli_query($conn,"
SELECT
    a.*,
    u.username
FROM asisten_lab a
JOIN users u ON a.id_user = u.id_user
WHERE a.id_user = '$id_user'
");

$data = mysqli_fetch_assoc($query);

if(!$data){
    die("Data asisten tidak ditemukan.");
}

/*
|--------------------------------------------------------------------------
| UPDATE DATA
|--------------------------------------------------------------------------
*/

if(isset($_POST['simpan'])){

    $nama_asisten = mysqli_real_escape_string(
        $conn,
        $_POST['nama_asisten']
    );

    $username = mysqli_real_escape_string(
        $conn,
        $_POST['username']
    );

    mysqli_query($conn,"
        UPDATE asisten_lab
        SET nama_asisten='$nama_asisten'
        WHERE id_asisten='".$data['id_asisten']."'
    ");

    mysqli_query($conn,"
        UPDATE users
        SET username='$username'
        WHERE id_user='".$data['id_user']."'
    ");

    echo "
    <script>
        alert('Profil berhasil diperbarui');
        window.location='profil.php';
    </script>
    ";
    exit;
}

$inisial = strtoupper(substr($data['nama_asisten'],0,1));
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Profil</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    background:#f1f5f9;
}

/* CARD */

.container{
    max-width:800px;
    margin:40px auto;
    padding:20px;
}

.card{
    background:#fff;
    border-radius:25px;
    overflow:hidden;
    box-shadow:0 15px 35px rgba(0,0,0,.08);
}

/* HEADER */

.header{
    background:linear-gradient(135deg,#2563eb,#3b82f6);
    padding:35px;
    text-align:center;
    color:white;
}

.avatar{
    width:110px;
    height:110px;
    margin:auto;
    border-radius:50%;
    background:white;
    color:#2563eb;
    font-size:45px;
    font-weight:bold;
    display:flex;
    justify-content:center;
    align-items:center;
    margin-bottom:15px;
}

.header h2{
    font-size:28px;
}

/* FORM */

.form-body{
    padding:35px;
}

.form-group{
    margin-bottom:20px;
}

label{
    display:block;
    margin-bottom:8px;
    font-weight:600;
    color:#334155;
}

input{
    width:100%;
    padding:14px;
    border:1px solid #cbd5e1;
    border-radius:10px;
    font-size:15px;
}

input:focus{
    outline:none;
    border-color:#2563eb;
}

.readonly{
    background:#f8fafc;
}

/* BUTTON */

.btn-group{
    margin-top:30px;
    display:flex;
    gap:10px;
}

.btn{
    text-decoration:none;
    border:none;
    padding:13px 25px;
    border-radius:10px;
    cursor:pointer;
    font-size:15px;
}

.btn-save{
    background:#2563eb;
    color:white;
}

.btn-save:hover{
    background:#1d4ed8;
}

.btn-back{
    background:#64748b;
    color:white;
}

.btn-back:hover{
    background:#475569;
}

</style>
</head>
<body>

<div class="container">

<div class="card">

<div class="header">

<div class="avatar">
<?= $inisial ?>
</div>

<h2>Edit Profil Asisten</h2>

</div>

<div class="form-body">

<form method="POST">

<div class="form-group">
<label>ID Asisten</label>
<input
type="text"
value="<?= htmlspecialchars($data['id_asisten']) ?>"
readonly
class="readonly">
</div>

<div class="form-group">
<label>Nama Asisten</label>
<input
type="text"
name="nama_asisten"
value="<?= htmlspecialchars($data['nama_asisten']) ?>"
required>
</div>

<div class="form-group">
<label>Username</label>
<input
type="text"
name="username"
value="<?= htmlspecialchars($data['username']) ?>"
required>
</div>

<div class="btn-group">

<button
type="submit"
name="simpan"
class="btn btn-save">
💾 Simpan
</button>

<a
href="profil.php"
class="btn btn-back">
↩ Kembali
</a>

</div>

</form>

</div>

</div>

</div>

</body>
</html>