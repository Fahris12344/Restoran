<?php
include '../koneksi.php';
include '../layout/navbar.php';
require '../layout/footer.php';

$result = mysqli_query($conn, "SELECT daftar_pelanggan.*, 
lokasi.lokasi AS lokasi_name, kapasitas_meja.kapasitas AS kapasitas FROM daftar_pelanggan
JOIN lokasi ON daftar_pelanggan.lokasi_id = lokasi.id
JOIN kapasitas_meja ON daftar_pelanggan.kapasitas_id = kapasitas_meja.id");

$i = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Data Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Data Pesanan</h1>
        <a href="create.php"><button class="btn btn-primary mb-3">Tambah</button></a>
        <table class="table table-bordered border-dark" id="datatable">
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
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['no_telpn']; ?></td>
                        <td><?php echo $row['alamat']; ?></td>
                        <td><?php echo $row['kapasitas']; ?></td>
                        <td><?php echo $row['lokasi_name']; ?></td>
                        <td><?php echo $row['tanggal_pesan']; ?></td>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-qBtjeK48zNU5HtJPlpk0VOFZUR2yE6h4WPpgQPCukrK9X+Y7fEX2Y6ZuQKOm6dcs" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12AvFtp2i3rxlJ7E+7L3/Jr59zp43I5df08eQbswv2+FQ2Iv" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                "pageLength": 10,
                "lengthMenu": [10, 25, 50, 100],
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true
            });
        });
    </script>
</body>

</html>