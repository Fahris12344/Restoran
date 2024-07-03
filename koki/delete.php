<?php
include '../koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Cek apakah data sedang digunakan di tabel lain
    $stmt_check_usage = $conn->prepare("SELECT COUNT(*) FROM menu WHERE koki_id=?");
    $stmt_check_usage->bind_param("i", $id);
    $stmt_check_usage->execute();
    $stmt_check_usage->bind_result($usage_count);
    $stmt_check_usage->fetch();
    $stmt_check_usage->close();

    if ($usage_count > 0) {
        // Jika data sedang digunakan, tampilkan alert
        echo "<script>alert('Data sedang digunakan dan tidak dapat dihapus');</script>";
    } else {
        // Jika tidak ada penggunaan data, lanjutkan dengan operasi delete
        $stmt = $conn->prepare("DELETE FROM koki WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "<script>alert('Data berhasil dihapus');</script>";
        } else {
            echo "<script>alert('Gagal menghapus data');</script>";
        }

        $stmt->close();
    }

    // Redirect ke index.php setelah menampilkan alert
    echo "<script>window.location.href='index.php';</script>";
    exit();
}
?>
