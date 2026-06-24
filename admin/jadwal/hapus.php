<?php
include "../../config/koneksi.php";

if(isset($_GET['id'])){

    $id = $_GET['id'];
  
    mysqli_query($conn,"
    DELETE FROM detail_jadwal
    WHERE id_jadwal='$id'
    ");

    mysqli_query($conn,"
    DELETE FROM jadwal
    WHERE id_jadwal='$id'
    ");

    echo "
    <script>
        alert('Data berhasil dihapus');
        window.location='index.php';
    </script>
    ";
}else{

    echo "
    <script>
        alert('ID tidak ditemukan');
        window.location='index.php';
    </script>
    ";
}
?>