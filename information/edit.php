<?php
include '../koneksi.php';
include '../layout/navbar.php';

$koki = mysqli_query($conn, "SELECT * FROM koki");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Validasi id untuk menghindari SQL Injection
    $id = mysqli_real_escape_string($conn, $id);

    // Ambil data daftar_pelanggan dari database berdasarkan id
    $query = "SELECT * FROM menu WHERE id='$id'";
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
    $makanan =  $_POST['makanan'];
    $koki_id = $_POST['koki_id'];

    // Update query
    $update_query = "UPDATE menu SET  
     makanan ='$makanan', koki_id = '$koki_id' 
     WHERE id='$id'";

    if (mysqli_query($conn, $update_query)) {
        echo "<script>
        alert('Data Berhasil Di update');
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
    <title>Tambah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <style>
        body {
            background-color: darkgray;
        }
    </style>
    <div class="container ">
        <h2 class="text-center">Edit Data</h2>
        <form action="edit.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $data['id']?>">
            <div class="mb-3">
                <label for="makanan" class="form-label">Tambah Informasi</label>
                <textarea class="form-control" id="makanan" name="makanan" rows="4"><?= $data['makanan'] ?></textarea>
            </div>
                <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Koki</label>
                <select name="koki_id" id="koki_id" class="form-control">
                    <?php
                    foreach ($koki as $row) :
                        $selected = $row['id'] == $data['koki_id'] ? 'selected' : '';
                    ?>
                        <option <?= $selected ?> value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" name="submit_menu" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
