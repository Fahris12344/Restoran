<?php
include '../koneksi.php';
include '../layout/navbar.php';
require '../layout/footer.php';

$result = mysqli_query($conn, "SELECT menu.*, koki.nama AS koki_name
FROM menu
JOIN koki ON menu.koki_id = koki.id");

$i =1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data menu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Data Menu</h1>
        <a href="create.php"><button class="btn btn-primary mb-3">Tambah</button></a>
        <table class="table table-bordered border-dark">
            <thead class="table-primary">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">makanan</th>
                    <th scope="col">koki</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            </tr>
            <?php
            $i = 1;
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $row['makanan']; ?></td>
                    <td><?php echo $row['koki_name']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id']; ?>"><button class="btn btn-primary"><i class="bi bi-pencil-square"></i></button></a>
                        <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus?')"><button class="btn btn-danger"><i class="bi bi-trash"></i></button></a>
                    </td>
                </tr>
            <?php
                $i++;
            } ?>
        </table>
    </div>

</body>
</html>