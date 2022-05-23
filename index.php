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
        <div class="row">
            <div class="col-12">
                <?php 
                $i = 1;
                foreach($wisata->showAll() as $value) {
                ?>
                <div class="card mb-3 mx-auto" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="..." class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $value['nama_wisata'] ?></h5>
                                <p class="card-text"><?= rupiah($value['harga']) ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
</html>