<?php

include "../../config/koneksi.php";

$id = $_GET['id'];

$data = mysqli_query($conn,"
    SELECT *
    FROM laboratorium
    WHERE id_lab='$id'
");

$lab = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){

    $nama = $_POST['nama_lab'];
    $kapasitas = $_POST['kapasitas'];

    $update = mysqli_query($conn,"
        UPDATE laboratorium
        SET
            nama_lab='$nama',
            kapasitas='$kapasitas'
        WHERE id_lab='$id'
    ");

    if($update){

        echo "
        <script>
            alert('Data Laboratorium Berhasil Diupdate');
            window.location='index.php';
        </script>
        ";

    }else{

        echo mysqli_error($conn);

    }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Laboratorium</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    background:#f4f7fe;
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:30px;
}

.container{
    width:100%;
    max-width:700px;
    background:white;
    border-radius:20px;
    padding:35px;
    box-shadow:0 10px 30px rgba(0,0,0,.1);
}

.header{
    text-align:center;
    margin-bottom:30px;
}

.icon{
    font-size:60px;
    margin-bottom:10px;
}

.header h2{
    color:#1e293b;
    margin-bottom:8px;
}

.header p{
    color:#64748b;
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
    padding:12px 15px;
    border:1px solid #cbd5e1;
    border-radius:10px;
    outline:none;
    font-size:15px;
    transition:.3s;
}

input:focus{
    border-color:#3b82f6;
    box-shadow:0 0 10px rgba(59,130,246,.2);
}

input[readonly]{
    background:#e2e8f0;
    cursor:not-allowed;
    font-weight:bold;
}

.btn-group{
    display:flex;
    gap:15px;
    margin-top:25px;
}

.btn{
    flex:1;
    padding:12px;
    border:none;
    border-radius:10px;
    cursor:pointer;
    font-size:15px;
    font-weight:bold;
    text-decoration:none;
    text-align:center;
    transition:.3s;
}

.btn-update{
    background:#10b981;
    color:white;
}

.btn-update:hover{
    background:#059669;
}

.btn-kembali{
    background:#e2e8f0;
    color:#334155;
}

.btn-kembali:hover{
    background:#cbd5e1;
}

</style>

</head>
<body>

<div class="container">

    <div class="header">
        <div class="icon">🖥️</div>
        <h2>Edit Data Laboratorium</h2>
        <p>Perbarui informasi laboratorium</p>
    </div>

    <form method="POST">

        <div class="form-group">
            <label>ID Laboratorium</label>
            <input
                type="text"
                value="<?= $lab['id_lab']; ?>"
                readonly
            >
        </div>

        <div class="form-group">
            <label>Nama Laboratorium</label>
            <input
                type="text"
                name="nama_lab"
                value="<?= $lab['nama_lab']; ?>"
                required
            >
        </div>

        <div class="form-group">
            <label>Kapasitas</label>
            <input
                type="number"
                name="kapasitas"
                value="<?= $lab['kapasitas']; ?>"
                required
            >
        </div>

        <div class="btn-group">

            <button
                type="submit"
                name="update"
                class="btn btn-update"
            >
                🚀 Update Data
            </button>

            <a
                href="index.php"
                class="btn btn-kembali"
            >
                ← Kembali
            </a>

        </div>

    </form>

</div>

</body>
</html>