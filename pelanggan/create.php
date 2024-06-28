<?php
include '../koneksi.php';

$kapasitas_meja = mysqli_query($conn, "SELECT * FROM kapasitas_meja");
$lokasi = mysqli_query($conn, "SELECT * FROM lokasi");

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $no_telpn = $_POST['no_telpn'];
    $alamat = $_POST['alamat'];
    $kapasitas = $_POST['kapasitas'];
    $lokasi = $_POST['lokasi'];
    $tanggal_pesan = $_POST['tanggal_pesan'];

    // SQL untuk menambahkan data
    $sql = "INSERT INTO daftar_pelanggan (nama, no_telpn, alamat, kapasitas, lokasi, tanggal_pesan)
VALUES ('$nama', '$no_telpn', '$alamat', '$kapasitas', '$lokasi', '$tanggal_pesan')";

    if ($conn->query($sql) === TRUE) {
        echo "Data baru berhasil ditambahkan<br>";
        header('Location: index.php');
    } else {
        echo "Kesalahan menambahkan data: " . $conn->error . "<br>";
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tambah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="text-center">Tambahkan Data</h1>
        <form action="create.php" method="post">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="no_telp" class="form-label">no_telp</label>
                <input type="text" class="form-control" id="no_telpn" name="no_telpn" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>
            <div class="mb-3">
                <label for="kapasitas" class="form-label">kapasitas</label>
                <select name="kapasitas" id="kapasitas" class="form-control">
                    <?php

                    foreach ($kapasitas_meja as $row) :
                    ?>
                        <option value="<?= $row['id'] ?>"><?= $row['kapasitas'] ?></option>
                    <?php
                    endforeach;
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="lokasi" class="form-label">Lokasi</label>
                <select name="lokasi" id="lokasi" class="form-control">
                    <?php

                    foreach ($lokasi as $row) :
                    ?>
                        <option value="<?= $row['id'] ?>"><?= $row['lokasi'] ?></option>
                    <?php
                    endforeach;
                    ?>
                </select>
            </div>
            <div class="mb-2 mt-3">
                <label for="tanggal_pesan" class="form-label">Tanggal Pesan</label>
                <input type="date" class="form-control" id="tanggal_pesan" name="tanggal_pesan" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>