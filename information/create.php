<?php
include '../koneksi.php';

// Retrieve data from the 'menu' and 'koki' tables
$menu = mysqli_query($conn, "SELECT * FROM menu");
$koki = mysqli_query($conn, "SELECT * FROM koki");

if (isset($_POST['submit'])) {
    // Get data from the form
    $makanan = $_POST['makanan'];
    $koki_id = $_POST['koki_id'];

    // Handle file upload
    $target_dir = "upload/";
    $foto_koki = basename($_FILES["target_koki"]["name"]);
    $target_file = $target_dir . $foto_koki;

    // Move uploaded file to target directory
    if (move_uploaded_file($_FILES["target_koki"]["tmp_name"], $target_file)) {
        // Prepare SQL to insert data into 'menu' table
        $sql = "INSERT INTO menu (makanan, target_koki, koki_id) VALUES ('$makanan', '$target_file', '$koki_id')";

        // Execute the query and check for success
        if ($conn->query($sql) === TRUE) {
            echo "Data baru berhasil ditambahkan<br>";
            header('Location: index.php'); // Redirect to index.php after success
        } else {
            echo "Kesalahan menambahkan data: " . $conn->error . "<br>";
        }
    } else {
        echo "Kesalahan mengupload file.<br>";
    }
}

// Close the database connection
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
        <form action="create.php" method="post" enctype="multipart/form-data">
        <form action="create_koki.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="makanan" class="form-label">Tambah Makanan</label>
                <textarea class="form-control" id="makanan" name="makanan" rows="4" required></textarea>
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
            <div class="mb-3">
                <label for="target_koki" class="form-label">Foto Koki</label>
                <input type="file" class="form-control" id="target_koki" name="target_koki" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>
</html>
