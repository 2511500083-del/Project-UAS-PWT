<?php
session_start();
include "../config/koneksi.php";

if (!isset($_SESSION['id_user'])) {
    header("Location: ../login.php");
    exit;
}

$id_user = $_SESSION['id_user'];

$query = mysqli_query($conn, "SELECT * FROM users WHERE id_user='$id_user'");
$user = mysqli_fetch_assoc($query);

if (!$user) {
    die("User tidak ditemukan!");
}

if (isset($_POST['simpan'])) {

    $password_lama = trim($_POST['password_lama']);
    $password_baru = trim($_POST['password_baru']);
    $konfirmasi_password = trim($_POST['konfirmasi_password']);

    // CEK PASSWORD LAMA (PLAIN TEXT)
    if ($password_lama != $user['password']) {

        echo "
        <script>
            alert('Password lama salah!');
            window.location='ganti_password.php';
        </script>
        ";
        exit;
    }

    // CEK KONFIRMASI PASSWORD
    if ($password_baru != $konfirmasi_password) {

        echo "
        <script>
            alert('Konfirmasi password tidak sesuai!');
            window.location='ganti_password.php';
        </script>
        ";
        exit;
    }

    // VALIDASI PANJANG PASSWORD
    if (strlen($password_baru) < 4) {

        echo "
        <script>
            alert('Password minimal 4 karakter!');
            window.location='ganti_password.php';
        </script>
        ";
        exit;
    }

    // UPDATE PASSWORD BARU (PLAIN TEXT)
    $update = mysqli_query($conn, "
        UPDATE users
        SET password='$password_baru'
        WHERE id_user='$id_user'
    ");

    if ($update) {

        echo "
        <script>
            alert('Password berhasil diganti!');
            window.location='profil.php';
        </script>
        ";

    } else {

        echo "
        <script>
            alert('Gagal mengganti password!');
            window.location='ganti_password.php';
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ganti Password</title>

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

.container{
    width:100%;
    max-width:500px;
    margin:50px auto;
}

.card{
    background:#fff;
    padding:30px;
    border-radius:15px;
    box-shadow:0 5px 20px rgba(0,0,0,0.1);
}

h2{
    text-align:center;
    color:#2563eb;
    margin-bottom:25px;
}

.form-group{
    margin-bottom:15px;
}

label{
    display:block;
    margin-bottom:6px;
    font-weight:600;
}

input{
    width:100%;
    padding:12px;
    border:1px solid #d1d5db;
    border-radius:8px;
    font-size:14px;
}

input:focus{
    outline:none;
    border-color:#2563eb;
}

.btn{
    width:100%;
    background:#2563eb;
    color:white;
    border:none;
    padding:12px;
    border-radius:8px;
    cursor:pointer;
    font-size:15px;
    margin-top:10px;
}

.btn:hover{
    background:#1d4ed8;
}

.back{
    display:block;
    text-align:center;
    margin-top:15px;
    text-decoration:none;
    color:#64748b;
}
</style>

</head>
<body>

<div class="container">
    <div class="card">

        <h2>🔐 Ganti Password</h2>

        <form method="POST">

            <div class="form-group">
                <label>Password Lama</label>
                <input type="password" name="password_lama" required>
            </div>

            <div class="form-group">
                <label>Password Baru</label>
                <input type="password" name="password_baru" required>
            </div>

            <div class="form-group">
                <label>Konfirmasi Password Baru</label>
                <input type="password" name="konfirmasi_password" required>
            </div>

            <button type="submit" name="simpan" class="btn">
                Simpan Password
            </button>

        </form>

        <a href="profil.php" class="back">← Kembali ke Profil</a>

    </div>
</div>

</body>
</html>