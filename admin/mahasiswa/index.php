<?php

include "../../config/koneksi.php";

$data = mysqli_query($conn,"
SELECT
    mahasiswa.*,
    kelas.nama_kelas
FROM mahasiswa
LEFT JOIN kelas
ON mahasiswa.id_kelas = kelas.id_kelas
ORDER BY mahasiswa.nim ASC
");

?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Data Mahasiswa</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    background:#f4f7fe;
    padding:30px;
}

.container{
    max-width:1200px;
    margin:auto;
}

.header{
    margin-bottom:25px;
}

.header h1{
    color:#1e293b;
    margin-bottom:5px;
}

.header p{
    color:#64748b;
}

.top-action{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
}

.back-dashboard{
    background:#1e293b;
    color:white;
    padding:12px 18px;
    border-radius:12px;
    text-decoration:none;
    font-weight:600;
    transition:.3s;
}

.back-dashboard:hover{
    background:#0f172a;
    transform:translateY(-2px);
}

.add-data{
    background:#3b82f6;
    color:white;
    padding:12px 18px;
    border-radius:12px;
    text-decoration:none;
    font-weight:600;
    transition:.3s;
}

.add-data:hover{
    background:#2563eb;
    transform:translateY(-2px);
}

.table-container{
    background:white;
    border-radius:20px;
    overflow:hidden;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
}

table{
    width:100%;
    border-collapse:collapse;
}

thead{
    background:#3b82f6;
    color:white;
}

th{
    padding:18px;
    text-align:left;
}

td{
    padding:15px 18px;
    border-bottom:1px solid #e2e8f0;
}

tr:hover{
    background:#f8fafc;
}

.badge-kelas{
    background:#dbeafe;
    color:#2563eb;
    padding:5px 12px;
    border-radius:20px;
    font-size:13px;
    font-weight:600;
}

.btn-edit{
    background:#f59e0b;
    color:white;
    padding:8px 12px;
    border-radius:8px;
    text-decoration:none;
    margin-right:5px;
    font-size:14px;
}

.btn-edit:hover{
    background:#d97706;
}

.btn-hapus{
    background:#ef4444;
    color:white;
    padding:8px 12px;
    border-radius:8px;
    text-decoration:none;
    font-size:14px;
}

.btn-hapus:hover{
    background:#dc2626;
}

.no-data{
    text-align:center;
    padding:30px;
    color:#64748b;
}

</style>

</head>
<body>

<div class="container">

    <div class="header">
        <h1>🎓 Data Mahasiswa</h1>
        <p>Kelola seluruh data mahasiswa praktikum laboratorium</p>
    </div>

    <div class="top-action">

        <a href="../dashboard.php" class="back-dashboard">
            ← Kembali ke Dashboard
        </a>

        <a href="tambah.php" class="add-data">
            + Tambah Mahasiswa
        </a>

    </div>

    <div class="table-container">

        <table>

            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Jurusan</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

            <?php

            $no = 1;

            if(mysqli_num_rows($data) > 0){

                while($row = mysqli_fetch_assoc($data)){

            ?>

                <tr>

                    <td><?= $no++; ?></td>

                    <td><?= $row['nim']; ?></td>

                    <td><?= $row['nama_mahasiswa']; ?></td>

                    <td><?= $row['jurusan']; ?></td>

                    <td>
                        <span class="badge-kelas">
                            <?= $row['nama_kelas']; ?>
                        </span>
                    </td>

                    <td>

                        <a
                        href="edit.php?nim=<?= $row['nim']; ?>"
                        class="btn-edit">
                            ✏ Edit
                        </a>

                        <a
                        href="hapus.php?nim=<?= $row['nim']; ?>"
                        class="btn-hapus"
                        onclick="return confirm('Yakin ingin menghapus data ini?')">
                            🗑 Hapus
                        </a>

                    </td>

                </tr>

            <?php

                }

            }else{

            ?>

                <tr>
                    <td colspan="6" class="no-data">
                        Belum ada data mahasiswa
                    </td>
                </tr>

            <?php } ?>

            </tbody>

        </table>

    </div>

</div>

</body>
</html>