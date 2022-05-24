<?php 
    require __DIR__.'/connection.php';
    require __DIR__.'/config.php';

    include_once __DIR__.'/models/Wisata.php';
    include_once __DIR__.'/models/Pesanan.php';

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
    <div class="container py-4">
        <div class="row">
            <img src="assets/img/<?= $detail['gambar'] ?>" alt="" style="object-fit: cover; width:100%; height: 200px">
        </div>
    </div>
</body>
</html>