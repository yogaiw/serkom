<?php 
    require __DIR__.'/connection.php';
    require __DIR__.'/config.php';

    include_once __DIR__.'/models/Wisata.php';
    include_once __DIR__.'/models/Pesanan.php';

    $wisata = new Wisata;
    $pesanan = new Pesanan;

    if(isset($_POST['tambah'])) {
        $gambar = $_FILES['gambar']['name'];
        $img_path = 'assets/img/'.basename($gambar);
        move_uploaded_file($_FILES['gambar']['tmp_name'],$img_path);

        $wisata->createWisata($_POST['nama'], $_POST['harga'], $gambar, $_POST['youtube']);
    }
    if(isset($_POST['delete'])) {
        $wisata->delete($_POST['id']);
    }
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
                <div class="d-flex mb-3">
                    <h3>Kelola Wisata</h3>
                    <button type="button" class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Tambah Wisata
                    </button>
                </div>
                <a href="" class="btn btn-danger mb-3">Logout</a>
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
                                    <a href="editwisata.php?id=<?= $item['wisata_id'] ?>" class="btn btn-warning">Edit</a>
                                    <form action="" method="POST">
                                        <input type="hidden" value="<?= $item['wisata_id'] ?>" name="id">
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
                            <th>Wisata</th>
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
                            <td><?= $item['nama_wisata'] ?></td>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Wisata</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <label class="mb-2">Nama Wisata</label>
                        <input class="form-control mb-4" type="text" name="nama" required>

                        <label class="mb-2">Harga</label>
                        <input class="form-control mb-4" type="number" name="harga" required>

                        <label class="mb-2">Gambar</label>
                        <input class="form-control mb-4" type="file" name="gambar">

                        <label class="mb-2">Youtube</label>
                        <input class="form-control mb-4" type="text" name="youtube">
                        <button type="submit" class="btn btn-primary" name="tambah">Simpan</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>