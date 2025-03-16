<?php
include 'dbkoneksi.php';

// Ambil data dari tabel mahasiswa
$sql = "SELECT * FROM mahasiswa";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 50px auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn {
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 4px;
        }
        .btn-edit {
            background-color: #ffc107;
            color: black;
        }
        .btn-delete {
            background-color: #dc3545;
            color: white;
        }
        .btn-add {
            background-color:rgb(40, 163, 167);
            color: white;
            padding: 10px 20px;
            display: inline-block;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Data Mahasiswa</h1>
        <a href="addmahasiswa.php" class="btn btn-add">Tambah Mahasiswa</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Jurusan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['no']}</td>
                                <td>{$row['nim']}</td>
                                <td>{$row['nama']}</td>
                                <td>{$row['jenis_kelamin']}</td>
                                <td>{$row['jurusan']}</td>
                                <td>
                                    <a href='editmahasiswa.php?id={$row['id']}' class='btn btn-edit'>Edit</a>
                                    <a href='delete.php?id={$row['id']}' class='btn btn-delete'>Hapus</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>Tidak ada data ditemukan.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
<center><footer>191011402105/RIZKY MAULANA</footer></center>
</html>

<?php
// Tutup koneksi
$conn->close();
?>