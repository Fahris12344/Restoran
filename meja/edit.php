<?php
include '../koneksi.php';

$kapasitas_meja = mysqli_query($conn, "SELECT * FROM kapasitas_meja");


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Validasi id untuk menghindari SQL Injection
    $id = mysqli_real_escape_string($conn, $id);

    // Ambil data pelanggan dari database berdasarkan id
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
    $id =$_POST['id'];
    $kapasitas =  $_POST['kapasitas'];

    // Update query
    $update_query = "UPDATE kapasitas SET  
     kapasitas='$kapasitas' 
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
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Kapasitas</label>
                <select name="kapasitas" id="kapasitas" class="form-control" value="<?= $data['kapasitas'] ?>">
                    <?php
                    foreach ($kapasitas_meja as $row) :
                    ?>
                        <option value="<?= $row['id'] ?>"><?= $row['kapasitas'] ?></option>
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