<?php
include '../koneksi.php';

$kapasitas_meja = mysqli_query($conn, "SELECT * FROM kapasitas_meja");
$lokasi = mysqli_query($conn, "SELECT * FROM lokasi");


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Validasi id untuk menghindari SQL Injection
    $id = mysqli_real_escape_string($conn, $id);

    // Ambil data pelanggan dari database berdasarkan id
    $query = "SELECT * FROM daftar_pelanggan WHERE id='$id'";
    $result = mysqli_query($conn, $query);

    // Periksa apakah query berhasil
    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
    } else {
        echo "<div class='error'>Error: Data tidak ditemukan atau query gagal.</div>";
        exit;
    }
}

// Proses update data jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id =$_POST['id'];
    $nama =  $_POST['nama'];
    $alamat =  $_POST['alamat'];
    $no_telpn =  $_POST['no_telpn'];
    $kapasitas_id =  $_POST['kapasitas_id'];
    $lokasi_id =  $_POST['lokasi_id'];
    $tanggal_pesan =  $_POST['tanggal_pesan'];

    // Update query
    $update_query = "UPDATE daftar_pelanggan SET 
     nama='$nama', 
     alamat='$alamat', 
     no_telpn='$no_telpn', 
     kapasitas_id='$kapasitas_id', 
     lokasi_id='$lokasi_id', 
     tanggal_pesan='$tanggal_pesan' 
     WHERE id='$id'";

if (mysqli_query($conn, $update_query)) {
    echo "<div class='success'>Data berhasil diupdate.</div>";
    header("Location:index.php");
} else {
    echo "<div class='error'>Error: " . mysqli_error($conn) . "</div>";
}

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form action="" method="post">
            <div class="mb-3">
                <input type="hidden" name="id" value="<?= $data['id'] ?>">

                <label for="exampleInputEmail1" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" value="<?= $data['nama'] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">No_telp</label>
                <input type="text" class="form-control" name="no_telpn" value="<?= $data['no_telpn'] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat" value="<?= $data['alamat'] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Kapasitas</label>
                <select name="kapasitas_id" id="kapasitas_id" class="form-control" value="<?= $data['kapasitas'] ?>">
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
                <label for="exampleInputPassword1" class="form-label">Lokasi</label>
                <select name="lokasi_id" id="lokasi_id" class="form-control" value="<?= $data['lokasi'] ?>">
                    <?php

                    foreach ($lokasi as $row) :
                    ?>
                        <option value="<?= $row['id'] ?>"><?= $row['lokasi'] ?></option>
                    <?php
                    endforeach;
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Tanggal Pesan</label>
                <input type="date" class="form-control" name="tanggal_pesan" value="<?= $data['tanggal_pesan'] ?>">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>