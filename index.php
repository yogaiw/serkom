<?php 
    require __DIR__.'/connection.php';
    require __DIR__.'/config.php';

    include_once __DIR__.'/models/Wisata.php';

    $wisata = new Wisata;
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
</head>
<body>
    <div class="container-fluid text-center text-white mb-5">
        <div class="row py-5 header">
            <div class="col-6 mx-auto">
                <h2>WISATA</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mb-3">
            <div class="d-flex justify-content-between">
                <h3>Temukan Destinasi Wisata di Banyumas</h3>
                <a href="" class="btn btn-primary">Pesan Tiket Sekarang</a>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php 
            foreach($wisata->showAll() as $value) {
            ?>
            <div class="col">
                <div class="card shadow">
                    <img src="assets/img/noimage.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $value['nama_wisata'] ?></h5>
                        <p class="card-text"><?= rupiah($value['harga']) ?></p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>