<?php
include 'dbkoneksi.php';

// Proses form jika data dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $no = $_POST['no'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $jurusan = $_POST['jurusan'];

    // Query untuk menambahkan data
    $sql = "INSERT INTO mahasiswa (No, nim, nama, jenis_kelamin, jurusan) VALUES ('$no', '$nim', '$nama', '$jenis_kelamin', '$jurusan')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); // Redirect ke halaman utama
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
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
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="text"], input[type="number"], select, input[type="submit"] {
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tambah Mahasiswa</h1>
        <form method="POST" action="">
            <label for="no">No:</label>
            <input type="number" id="no" name="no" required>

            <label for="nim">NIM:</label>
            <input type="number" id="nim" name="nim" required>

            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>

            <label for="jurusan">Jurusan:</label>
            <input type="text" id="jurusan" name="jurusan" required>

            <input type="submit" value="Tambah">
        </form>
    </div>
</body>
</html>