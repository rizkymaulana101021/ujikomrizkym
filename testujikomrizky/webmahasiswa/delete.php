<?php
include 'dbkoneksi.php';

// Ambil ID dari URL
$id = $_GET['id'];

// Query untuk menghapus data
$sql = "DELETE FROM mahasiswa WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php"); // Redirect ke halaman utama
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi
$conn->close();
?>