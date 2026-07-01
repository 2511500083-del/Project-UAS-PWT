<?php

include "../../config/koneksi.php";

$carikode = mysqli_query($conn,
    "SELECT MAX(kode_asisten) AS kode FROM asisten_lab"
);

$data = mysqli_fetch_assoc($carikode);

if (!empty($data['kode'])) {
    $nilaikode = substr($data['kode'], 4); // karena "AST-" = 4 karakter
    $kode = (int)$nilaikode + 1;
    $hasilkode = "AST-" . str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {
    $hasilkode = "AST-001";
}

if(isset($_POST['tambah'])){
    $kode_asisten = $_POST['kode_asisten'];
    $nama = $_POST['nama_asisten'];
    $no_hp = $_POST['no_hp'];
   

    // Simpan akun login asisten
    mysqli_query($conn,"
        INSERT INTO users
        (
            username,
            password,
            role
        )
        VALUES
        (
            '$kode_asisten',
            '12345',
            'asisten'
        )
    ");

    // Ambil id_user terakhir
    $id_user = mysqli_insert_id($conn);

    // Simpan data asisten
    $insert = mysqli_query($conn,"
        INSERT INTO asisten_lab
        (
            kode_asisten,
            nama_asisten,
            no_hp,
            id_user
        )
        VALUES
        (
            '$kode_asisten',
            '$nama',
            '$no_hp',
            '$id_user'
        )
    ");

    if($insert){

        echo "
        <script>
            alert('Data Asisten Berhasil Ditambahkan');
            window.location='index.php';
        </script>
        ";

    }else{

        echo "
        <script>
            alert('Gagal Menambahkan Data');
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

<title>Tambah Asisten</title>

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

.btn-simpan{
    background:#3b82f6;
    color:white;
}

.btn-simpan:hover{
    background:#2563eb;
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
        <div class="icon">👨‍🏫</div>
        <h2>Tambah Data Asisten</h2>
        <p>Masukkan data asisten laboratorium</p>
    </div>

    <form method="POST">
        <div class="form-group">
            <label for="id_asisten">Kode Asisten</label>
            <input 
            type="text" 
            name="kode_asisten" 
            value="<?= $hasilkode; ?>" 
            placeholder="Id Kat" 
            class="form-control" 
            readonly>
        </div>

        <div class="form-group">
            <label>Nama Asisten</label>
            <input
                type="text"
                name="nama_asisten"
                required
            >
        </div>

        <div class="form-group">
            <label>No HP</label>
            <input
                type="text"
                name="no_hp"
                required
            >
        </div>

        <div class="btn-group">

            <button
                type="submit"
                name="tambah"
                class="btn btn-simpan"
            >
                💾 Simpan
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