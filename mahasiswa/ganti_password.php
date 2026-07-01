<?php

session_start();

if(!isset($_SESSION['id_user'])){
    header("Location: ../auth/login.php");
    exit();
}

include "../config/koneksi.php";

$id_user = $_SESSION['id_user'];

if(isset($_POST['simpan'])){

    $password_lama = $_POST['password_lama'];
    $password_baru = $_POST['password_baru'];
    $konfirmasi = $_POST['konfirmasi'];

    $cek = mysqli_query($conn,"
    SELECT *
    FROM users
    WHERE id_user='$id_user'
    ");

    $user = mysqli_fetch_assoc($cek);

    if($password_lama != $user['password']){

        echo "
        <script>
        alert('Password lama salah!');
        </script>
        ";

    }elseif($password_baru != $konfirmasi){

        echo "
        <script>
        alert('Konfirmasi password tidak cocok!');
        </script>
        ";

    }else{

        mysqli_query($conn,"
        UPDATE users
        SET password='$password_baru'
        WHERE id_user='$id_user'
        ");

        echo "
        <script>
        alert('Password berhasil diubah!');
        window.location='dashboard.php';
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
    background:#f4f7fe;
}

.sidebar{
    position:fixed;
    left:0;
    top:0;
    width:250px;
    height:100%;
    background:#1e293b;
    padding:25px;
}

.logo{
    color:white;
    font-size:22px;
    font-weight:bold;
    margin-bottom:40px;
}

.menu a{
    display:block;
    padding:14px;
    margin-bottom:10px;
    color:white;
    text-decoration:none;
    border-radius:10px;
    transition:.3s;
}

.menu a:hover{
    background:#334155;
}

.main{
    margin-left:250px;
    padding:40px;
}

.card{
    background:white;
    max-width:600px;
    padding:30px;
    border-radius:20px;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
}

.card h2{
    margin-bottom:20px;
    color:#1e293b;
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
    padding:12px;
    border:1px solid #cbd5e1;
    border-radius:10px;
}

.btn{
    background:#3b82f6;
    color:white;
    border:none;
    padding:12px 20px;
    border-radius:10px;
    cursor:pointer;
    font-weight:600;
}

.btn:hover{
    background:#2563eb;
}

</style>

</head>
<body>

<div class="sidebar">

    <div class="logo">
        🎓 Mahasiswa
    </div>

    <div class="menu">

        <a href="dashboard.php">🏠 Dashboard</a>

        <a href="jadwal.php">📅 Jadwal Praktikum</a>

        <a href="profil.php">👤 Profil Saya</a>

        <a href="ganti_password.php">🔑 Ganti Password</a>

        <a href="../auth/logout.php">🚪 Logout</a>

    </div>

</div>

<div class="main">

    <div class="card">

        <h2>🔑 Ganti Password</h2>

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
                <input type="password" name="konfirmasi" required>
            </div>

            <button type="submit" name="simpan" class="btn">
                Simpan Password
            </button>

        </form>

    </div>

</div>

</body>
</html>