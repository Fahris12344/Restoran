<?php
include '../koneksi.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $daftar_pelanggan = mysqli_query($conn, "DELETE FROM daftar_pelanggan WHERE id='$id'");
    
    
    header("Location:index.php");
    
} else {
    echo "<div class='error'>Error: Data tidak ditemukan atau query gagal.</div>";
        header("Location:index.php");
}