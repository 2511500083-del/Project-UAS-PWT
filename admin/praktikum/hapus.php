<?php

include "../../config/koneksi.php";

$id = $_GET['id'];

$hapus = mysqli_query($conn,"
    DELETE FROM praktikum
    WHERE id_praktikum='$id'
");

if($hapus){

    echo "
    <script>
        alert('Data Praktikum Berhasil Dihapus');
        window.location='index.php';
    </script>
    ";

}else{

    echo "
    <script>
        alert('Data Praktikum Gagal Dihapus');
        window.location='index.php';
    </script>
    ";

}

?>