<?php

include "../../config/koneksi.php";

$id = $_GET['id'];

$hapus = mysqli_query($conn,"
    DELETE FROM laboratorium
    WHERE id_lab='$id'
");

if($hapus){

    echo "
    <script>
        alert('Data Laboratorium Berhasil Dihapus');
        window.location='index.php';
    </script>
    ";

}else{

    echo "
    <script>
        alert('Data Gagal Dihapus');
        window.location='index.php';
    </script>
    ";

}

?>