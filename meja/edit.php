<?php
include '../koneksi.php';
include '../layout/navbar.php';
$kapasitas_meja = mysqli_query($conn, "SELECT * FROM kapasitas_meja");


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Validasi id untuk menghindari SQL Injection
    $id = mysqli_real_escape_string($conn, $id);

    // Ambil data daftar_pelanggan dari database berdasarkan id
    $query = "SELECT * FROM kapasitas_meja WHERE id='$id'";
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
    $id = $_POST['id'];
    $kapasitas =  $_POST['kapasitas'];

    // Update query
    $update_query = "UPDATE kapasitas_meja SET  
     kapasitas='$kapasitas' 
     WHERE id='$id'";

    if (mysqli_query($conn, $update_query)) {
        echo "<script>
        alert('Data Berhasil Di tambahkan');
        window.location.href = 'index.php';
      </script>";
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
    <title>Edit data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <style>
        body{
            background-color: darkgray;
        }
    </style>
    <div class="container">
        <h1 class="text-center">Edit Data</h1>
        <form action="" method="post">
            <div class="mb-3">
                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Kapasitas</label>
                    <input type="number" class="form-control" name="kapasitas" value="<?= $data['kapasitas'] ?>">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>