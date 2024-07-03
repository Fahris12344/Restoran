<?php
include '../koneksi.php';
include '../layout/navbar.php';
if (isset($_POST['submit'])) {
    $koki = $_POST['nama'];

    // SQL untuk menambahkan data
    $sql = "INSERT INTO koki (nama)
VALUES ('$koki')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Data Berhasil Di tambahkan');
                window.location.href = 'index.php';
              </script>";
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
<style>
    body{
        background-color: darkgray;
    }
</style>
    <div class="container">
        <h1 class="text-center">Tambah Koki</h1>
        <form action="create.php" method="post">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>