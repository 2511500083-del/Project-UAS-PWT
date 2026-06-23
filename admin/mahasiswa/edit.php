<?php

include "../../config/koneksi.php";

$nim = $_GET['nim'];

$data = mysqli_query($conn,"
    SELECT * FROM mahasiswa
    WHERE nim='$nim'
");

$mhs = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){

    $nama = $_POST['nama_mahasiswa'];
    $jurusan = $_POST['jurusan'];
    $id_kelas = $_POST['id_kelas'];

    $update = mysqli_query($conn,"
        UPDATE mahasiswa
        SET
            nama_mahasiswa='$nama',
            jurusan='$jurusan',
            id_kelas='$id_kelas'
        WHERE nim='$nim'
    ");

    if($update){

        echo "
        <script>
            alert('Data Mahasiswa Berhasil Diupdate');
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

<title>Edit Mahasiswa</title>

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
        <div class="icon">✏️</div>
        <h2>Edit Data Mahasiswa</h2>
        <p>Perbarui informasi mahasiswa</p>
    </div>

    <form method="POST">

        <div class="form-group">
            <label>NIM</label>
            <input
                type="text"
                value="<?= $mhs['nim']; ?>"
                readonly
            >
        </div>

        <div class="form-group">
            <label>Nama Mahasiswa</label>
            <input
                type="text"
                name="nama_mahasiswa"
                value="<?= $mhs['nama_mahasiswa']; ?>"
                required
            >
        </div>

        <div class="form-group">
            <label>Jurusan</label>
            <input
                type="text"
                name="jurusan"
                value="<?= $mhs['jurusan']; ?>"
                required
            >
        </div>

        <div class="form-group">

            <label>Kelas</label>

            <select name="id_kelas" required>

                <?php

                $kelas = mysqli_query(
                    $conn,
                    "SELECT * FROM kelas"
                );

                while($k = mysqli_fetch_assoc($kelas)){

                    $selected = "";

                    if(
                        $k['id_kelas']
                        ==
                        $mhs['id_kelas']
                    ){
                        $selected = "selected";
                    }

                ?>

                    <option
                        value="<?= $k['id_kelas']; ?>"
                        <?= $selected; ?>
                    >
                        <?= $k['nama_kelas']; ?>
                    </option>

                <?php } ?>

            </select>

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