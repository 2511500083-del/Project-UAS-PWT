<?php

include "../../config/koneksi.php";

$nim = $_GET['nim'];

/*
    Ambil id_user mahasiswa
*/

$data = mysqli_query($conn,"
    SELECT id_user
    FROM mahasiswa
    WHERE nim='$nim'
");

$mhs = mysqli_fetch_assoc($data);

$id_user = $mhs['id_user'];

/*
    Hapus data mahasiswa
*/

mysqli_query($conn,"
    DELETE FROM mahasiswa
    WHERE nim='$nim'
");

/*
    Hapus akun login user
*/

mysqli_query($conn,"
    DELETE FROM users
    WHERE id_user='$id_user'
");

echo "
<script>
    alert('Data Mahasiswa Berhasil Dihapus');
    window.location='index.php';
</script>
";

?>