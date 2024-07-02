<?php
include '../koneksi.php'; // Menghubungkan ke file koneksi database

if (isset($_POST['submit'])) { // Cek apakah form telah disubmit
    $nama = $_POST['nama']; // Ambil nilai 'nama' dari form

    // SQL untuk menambahkan data ke tabel 'koki'
    $sql = "INSERT INTO koki (nama) VALUES ('$nama')";

    if ($conn->query($sql) === TRUE) {
        echo "Data baru berhasil ditambahkan<br>";
        header('Location: index.php'); // Redirect ke halaman index setelah berhasil menambahkan
    } else {
        echo "Kesalahan menambahkan data: " . $conn->error . "<br>";
    }
}
$conn->close(); // Tutup koneksi database
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Koki</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Tambah Koki</h1>
        <form action="create_koki.php" method="post">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Koki</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
