<?php
include 'dbkoneksi.php';

// Ambil data berdasarkan ID
$id = $_GET['id'];
$sql = "SELECT * FROM mahasiswa WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// Proses form jika data dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $no = $_POST['no'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $jurusan = $_POST['jurusan'];

    // Query untuk mengupdate data
    $sql = "UPDATE mahasiswa SET No='$no', NIM='$nim', Nama='$nama', Jenis Kelamin='$jenis_kelamin', Jurusan='$jurusan' WHERE id=$id";

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
    <title>Edit Mahasiswa</title>
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
        <h1>Edit Mahasiswa</h1>
        <form method="POST" action="">
            <label for="no">No:</label>
            <input type="number" id="no" name="no" value="<?php echo $row['no']; ?>" required>

            <label for="nim">NIM:</label>
            <input type="number" id="nim" name="nim" value="<?php echo $row['nIM']; ?>" required>

            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required>

            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="Laki-laki" <?php echo ($row['jenis_kelamin'] == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                <option value="Perempuan" <?php echo ($row['jenis_kelamin'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
            </select>

            <label for="jurusan">Jurusan:</label>
            <input type="text" id="jurusan" name="jurusan" value="<?php echo $row['jurusan']; ?>" required>

            <input type="submit" value="Update">
        </form>
    </div>
</body>
</html>