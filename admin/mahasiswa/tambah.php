<?php

include "../../config/koneksi.php";

if(isset($_POST['tambah'])){

    $nim = $_POST['nim'];
    $nama = $_POST['nama_mahasiswa'];
    $jurusan = $_POST['jurusan'];
    $id_kelas = $_POST['id_kelas'];

    // Simpan akun login mahasiswa
    mysqli_query($conn,"
        INSERT INTO users
        (
            username,
            password,
            role
        )
        VALUES
        (
            '$nim',
            '12345',
            'mahasiswa'
        )
    ");

    // Ambil id_user terakhir
    $id_user = mysqli_insert_id($conn);

    // Simpan data mahasiswa
    $insert = mysqli_query($conn,"
        INSERT INTO mahasiswa
        (
            nim,
            nama_mahasiswa,
            jurusan,
            id_kelas,
            id_user
        )
        VALUES
        (
            '$nim',
            '$nama',
            '$jurusan',
            '$id_kelas',
            '$id_user'
        )
    ");

    if($insert){

        echo "
        <script>
            alert('Data Mahasiswa Berhasil Ditambahkan');
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

<title>Tambah Mahasiswa</title>

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

input,
select{
    width:100%;
    padding:12px 15px;
    border:1px solid #cbd5e1;
    border-radius:10px;
    outline:none;
    font-size:15px;
    transition:.3s;
}

input:focus,
select:focus{
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
        <div class="icon">🎓</div>
        <h2>Tambah Data Mahasiswa</h2>
        <p>Masukkan data mahasiswa baru</p>
    </div>

    <form method="POST">

        <div class="form-group">
            <label>NIM</label>
            <input
                type="text"
                name="nim"
                required
            >
        </div>

        <div class="form-group">
            <label>Nama Mahasiswa</label>
            <input
                type="text"
                name="nama_mahasiswa"
                required
            >
        </div>

        <div class="form-group">
            <label>Jurusan</label>
            <input
                type="text"
                name="jurusan"
                required
            >
        </div>

        <div class="form-group">
            <label>Kelas</label>

            <select name="id_kelas" required>

                <option value="">
                    -- Pilih Kelas --
                </option>

                <?php

                $kelas = mysqli_query(
                    $conn,
                    "SELECT * FROM kelas"
                );

                while($k = mysqli_fetch_assoc($kelas)){

                ?>

                    <option value="<?= $k['id_kelas']; ?>">
                        <?= $k['nama_kelas']; ?>
                    </option>

                <?php } ?>

            </select>

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