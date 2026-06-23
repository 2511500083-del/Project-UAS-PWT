<?php

session_start();

include '../config/koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($conn,
"SELECT * FROM users
WHERE username='$username'
AND password='$password'
");

$data = mysqli_fetch_assoc($query);

if($data){

    $_SESSION['id_user'] = $data['id_user'];

    $_SESSION['role'] = $data['role'];

    if($data['role']=='admin'){

        header("Location: ../admin/dashboard.php");

    }

    elseif($data['role']=='asisten'){

        header("Location: ../asisten/dashboard.php");

    }

    elseif($data['role']=='mahasiswa'){

        header("Location: ../mahasiswa/dashboard.php");

    }

}else{

    echo "
    <script>

    alert('Username atau Password Salah');

    window.location='login.php';

    </script>
    ";

}
?>