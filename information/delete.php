<?php
include '../koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $cari = mysqli_query($conn, "SELECT * FROM menu WHERE id = '$id'");
    $array = mysqli_fetch_array($cari);

    $foto_lama = $array["target_koki"];

    unlink($foto_lama);
    $query = mysqli_query($conn,"DELETE FROM menu WHERE id = '$id'");

    echo '<script>alert("Berhasil Hapus Data") </script>';
    echo '<script>window.location.href="index.php"</script>';


}