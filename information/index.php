<?php
include '../koneksi.php';
include '../layout/navbar.php';
require '../layout/footer.php';

// Query SQL untuk mengambil data dari tabel 'menu' dan 'koki'
$result = mysqli_query($conn, "SELECT menu.*, koki.nama AS koki_name FROM 
menu JOIN koki ON menu.koki_id = koki.id");

$i = 1;
?>

<style>
    body {
        background-color: darkgrey;
    }
</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Data Menu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center">Information Data</h1>
        <a href="create.php"><button class="btn btn-primary mb-3">Tambah</button></a>
        <table class="table table-bordered border-dark">
            <thead class="table-primary border-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Foto Koki</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Information</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Looping melalui hasil query dan menampilkan setiap baris dalam tabel
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><img src="<?= htmlspecialchars($row['target_koki']) ?>" alt="Foto Koki" class="img-fluid text-center" width="150" height="100px"></td>
                        <td><?php echo htmlspecialchars($row['koki_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['makanan']); ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['id']; ?>"><button class="btn btn-primary"><i class="bi bi-pencil-square"></i></button></a>
                            <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus?')"><button class="btn btn-danger"><i class="bi bi-trash"></i></button></a>
                        </td>
                    </tr>
                <?php
                    $i++;
                } ?>
            </tbody>
        </table>
    </div>

</body>

</html>