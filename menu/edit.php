<?php
include '../koneksi.php';

$koki = mysqli_query($conn, "SELECT * FROM koki");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Validasi id untuk menghindari SQL Injection
    $id = mysqli_real_escape_string($conn, $id);

    // Ambil data pelanggan dari database berdasarkan id
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
    $koki_id =  $_POST['koki_id'];


    // Update query
    $update_query = "UPDATE menu SET  
     makanan ='$makanan',
     koki_id ='$koki_id'
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
                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">makanan</label>
                    <input class="form-control" type="text" name="makanan" id="makanan" value="<?= $data['makanan'] ?>">
                </div>
                <div class="mb-3">
                    <label for="koki" class="form-label">Koki</label>
                    <select name="koki_id" id="koki" class="form-control">
                        <?php

                        foreach ($koki as $row) :
                        ?>
                            <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                        <?php
                        endforeach;
                        ?>
                    </select>
                </div>
             

                <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>