<?php 
    require __DIR__.'/connection.php';
    require __DIR__.'/config.php';

    include_once __DIR__.'/models/Wisata.php';
    include_once __DIR__.'/models/Pesanan.php';

    $wisata = new Wisata;
    $pesanan = new Pesanan;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/Chart.js"></script>
</head>
<body>
    <div class="container py-4">
        <div class="row">
            <div class="d-flex justify-content-between mb-3">
                <h3>Kelola Wisata</h3>
                <a href="" class="btn btn-danger">Logout</a>
            </div>
            <div class="card">
                <div class="card-header">List Wisata</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>No.</th>
                            <th>Nama Wisata</th>
                            <th>Harga Tiket</th>
                            <th>Tindakan</th>
                        </tr>
                        <?php $i=1; foreach($wisata->showAll() as $item): ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $item['nama_wisata'] ?></td>
                            <td><?= rupiah($item['harga']) ?></td>
                            <td>
                                <div class="d-flex">
                                    <a href="" class="btn btn-warning">Edit</a>
                                    <form action="" method="POST">
                                        <button class="btn btn-danger" type="submit" name="delete">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="d-flex justify-content-between mb-3">
                <h3>List Pemesan</h3>
            </div>
            <div class="card">
                <div class="card-header">List Pemesan</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>No.</th>
                            <th>Tanggal Kunjungan</th>
                            <th>Nama Pemesan</th>
                            <th>NIK</th>
                            <th>No Telp</th>
                            <th>Jumlah Pengunjung</th>
                            <th>Total Bayar</th>
                        </tr>
                        <?php $i=1; foreach($pesanan->showAll() as $item): ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= date('D, d M Y', strtotime($item['tanggal'])) ?></td>
                            <td><?= $item['nama_lengkap'] ?></td>
                            <td><?= $item['nik'] ?></td>
                            <td><?= $item['nohp'] ?></td>
                            <td><?= $item['anak']+$item['dewasa'] ?> ( <?= $item['dewasa'] ?> Dewasa, <?= $item['anak'] ?> Anak )</td>
                            <td style="float:right;"><?= rupiah($item['total']) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>