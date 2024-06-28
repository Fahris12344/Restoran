<?php
include '../koneksi.php';
include '../layout/navbar.php';
require '../layout/footer.php';

$sql = "SELECT * FROM daftar_pelanggan";
$result = mysqli_query($conn, $sql);
$i = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Pelanggan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>


    <div class="container"></div>
    <div class="container">
        <h1 class="text-center">Data Pesanan</h1>
        <a href="create.php"><button class="btn btn-primary mb-3">Tambah</button></a>
        <table class="table table-bordered border-dark">
            <thead class="table-primary">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">no_telpn</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Kapasitas</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Tanggal Pesan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            </tr>
            <?php
            $i = 1;
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['no_telpn']; ?></td>
                    <td><?php echo $row['alamat']; ?></td>
                    <td><?php echo $row['kapasitas']; ?></td>
                    <td><?php echo $row['lokasi']; ?></td>
                    <td><?php echo $row['tanggal_pesan']; ?></td>
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