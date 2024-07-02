<?php
include '../koneksi.php';

if (isset($_POST['submit'])) {
    $kapasitas_id = $_POST['kapasitas_id'];

    // SQL untuk menambahkan data
    $sql = "INSERT INTO kapasitas_meja (kapasitas)
VALUES ( '$kapasitas_id')";

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
        <form action="create.php" method="post">
            <div class="mb-3">
                <label for="kapasitas" class="form-label">kapasitas</label>
                <input type="text" class="form-control" id="kapasitas_id" name="kapasitas_id" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>

</html>