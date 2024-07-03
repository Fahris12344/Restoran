<?php
include '../koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // // Mengambil nama file dari database sebelum menghapus
    // $stmt_select = $conn->prepare("SELECT target_koki FROM menu WHERE id=?");
    // $stmt_select->bind_param("i", $id);
    // $stmt_select->execute();
    // $stmt_select->bind_result($file_path);
    // $stmt_select->fetch();
    // $stmt_select->close();

    // // Hapus file dari sistem file atau storage
    // if ($file_path && file_exists($file_path)) {
    //     if ($file_path) {

    //         unlink('upload/', $file_path);
    //         // Hapus entri dari database setelah file berhasil dihapus
    //         $stmt_delete = $conn->prepare("DELETE FROM menu WHERE id=?");
    //         $stmt_delete->bind_param("i", $id);
    //         $stmt_delete->execute();

    //         if ($stmt_delete->affected_rows > 0) {
    //             echo "<script>alert('Data berhasil dihapus');</script>";
    //         } else {
    //             echo "<script>alert('Gagal menghapus data');</script>";
    //         }

    //         $stmt_delete->close();
    //     } else {
    //         echo "<script>alert('Gagal menghapus file');</script>";
    //     }
    // } else {
    //     echo "<script>alert('File tidak ditemukan');</script>";
    // }

    // // Redirect ke index.php setelah menampilkan alert
    // echo "<script>window.location.href='index.php';</script>";
    // exit();
    $cari = mysqli_query($conn, "SELECT * FROM menu WHERE id = '$id'");
    $array = mysqli_fetch_array($cari);

    $foto_lama = $array["target_koki"];

    unlink($foto_lama);
    $query = mysqli_query($conn,"DELETE FROM menu WHERE id = '$id'");

    echo '<script>alert("Berhasil Hapus Foto") </script>';
    echo '<script>window.location.href="index.php"</script>';


}