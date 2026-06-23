<?php

include "../../config/koneksi.php";

$id = $_GET['id'];

/*
    Ambil id_user dari asisten
*/

$data = mysqli_query($conn,"
    SELECT id_user
    FROM asisten_lab
    WHERE id_asisten='$id'
");

$asisten = mysqli_fetch_assoc($data);

$id_user = $asisten['id_user'];

/*
    Hapus data asisten
*/

mysqli_query($conn,"
    DELETE FROM asisten_lab
    WHERE id_asisten='$id'
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
    alert('Data Asisten Berhasil Dihapus');
    window.location='index.php';
</script>
";

?>