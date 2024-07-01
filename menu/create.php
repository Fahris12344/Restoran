<?php
include '../koneksi.php';

$menu = mysqli_query($conn, "SELECT * FROM menu");
$koki = mysqli_query($conn, "SELECT * FROM koki");

if (isset($_POST['submit'])) {
    $makanan = $_POST['makanan'];
    $koki_id = $_POST['koki_id'];

    // SQL untuk menambahkan data
    $sql = "INSERT INTO menu (makanan, koki_id)
VALUES ('$makanan', '$koki_id')";

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
                <label for="makanan" class="form-label">Tambah Makanan</label>
                <input class="form-control" type="text" name="makanan" id="makanan" required>
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
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>
</html>