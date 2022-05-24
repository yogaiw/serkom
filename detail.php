<?php 
    require __DIR__.'/connection.php';
    require __DIR__.'/config.php';

    include_once __DIR__.'/models/Wisata.php';

    $wisata = new Wisata;
    $detail = $wisata->detail($_GET['id']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>wisata</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/custom.css">
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/Chart.js"></script>
</head>
<body>
    <div class="container-fluid mb-5">
        <div class="row">
            <img src="assets/img/<?= $detail['gambar'] ?>" alt="" style="object-fit: cover; height: 300px">
        </div>
    </div>
    <div class="container">
    <div class="d-flex justify-content-between">
        <a href="index.php" class="btn btn-secondary">Kembali</a>
        <a href="pesan.php" class="btn btn-secondary">Pesan Tiket</a>
    </div>
        <div class="row mb-4">
            <div class="d-flex justify-content-between">
                <h2><b><?= $detail['nama_wisata'] ?></b></h2>
                <h4>Harga Tiket Masuk <b><?= rupiah($detail['harga']) ?></b></h4>
            </div>
        </div>
        <div class="row">
            <iframe width="1280" height="720" src="<?= $detail['youtube'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
</body>
</html>