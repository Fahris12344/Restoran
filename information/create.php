<?php
include '../koneksi.php';
include '../layout/navbar.php';

// Retrieve data from the 'menu' and 'koki' tables
$menu = mysqli_query($conn, "SELECT * FROM menu");
$koki = mysqli_query($conn, "SELECT * FROM koki");

if (isset($_POST['submit_menu'])) {
    // Get data from the form
    $makanan = $_POST['makanan'];
    $koki_id = isset($_POST['koki_id']) ? $_POST['koki_id'] : '';

    // Validate koki_id
    if (empty($koki_id)) {
        echo "Koki tidak dipilih.<br>";
    } else {
        // Handle file upload
        $target_dir = "upload/";
        $foto_koki = uniqid() . '_' . basename($_FILES["target_koki"]["name"]);
        $target_file = $target_dir . $foto_koki;

        // Move uploaded file to target directory
        if (move_uploaded_file($_FILES["target_koki"]["tmp_name"], $target_file)) {
            // Prepare SQL to insert data into 'menu' table
            $sql = "INSERT INTO menu (makanan, target_koki, koki_id)
             VALUES ('$makanan', '$target_file', '$koki_id')";

            // Execute the query and check for success
            if ($conn->query($sql) === TRUE) {
                echo "<script>
                alert('Data Berhasil Di tambahkan');
                window.location.href = 'index.php';
              </script>";
            } else {
                echo "Kesalahan menambahkan data: " . $conn->error . "<br>";
            }
        } else {
            echo "Kesalahan mengupload file.<br>";
        }
    }
}

if (isset($_POST['submit_koki'])) {
    $nama = $_POST['nama']; // Ambil nilai 'nama' dari form

    // SQL untuk menambahkan data ke tabel 'koki'
    $sql = "INSERT INTO koki (nama) VALUES ('$nama')";

    if ($conn->query($sql) === TRUE) {
        echo "Data baru berhasil ditambahkan<br>";
        header('Location: index.php'); // Redirect ke halaman index setelah berhasil menambahkan
        exit();
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
        <h2 class="text-center">Tambah Data</h2>
        <form action="create.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="makanan" class="form-label">Tambah Informasi</label>
                <textarea class="form-control" id="makanan" name="makanan" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label for="koki_id" class="form-label">Koki</label>
                <select class="form-control" id="koki_id" name="koki_id" required>
                    <?php while ($row = mysqli_fetch_assoc($koki)) : ?>
                        <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="target_koki" class="form-label">Foto Koki</label>
                <input type="file" class="form-control" id="target_koki" name="target_koki" required>
            </div>
            <button type="submit" name="submit_menu" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>