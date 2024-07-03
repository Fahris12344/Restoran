<?php
include '../koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Menggunakan parameterized query untuk menghindari SQL injection
    $stmt = $conn->prepare("DELETE FROM daftar_pelanggan WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    
    if ($stmt->affected_rows > 0) {
        echo "<script>alert('Data berhasil dihapus');</script>";
    } else {
        echo "<script>alert('Gagal menghapus data');</script>";
    }

    $stmt->close();

    // Redirect ke index.php setelah menampilkan alert
    echo "<script>window.location.href='index.php';</script>";
    exit();
}
?>
