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
    <title>wisata</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/custom.css">
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/Chart.js"></script>
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
                <a href="pesan.php" class="btn btn-primary">Pesan Tiket Sekarang</a>
            </div>
        </div>
        <div class="row row-cols-2 row-cols-md-4 g-4 mb-4">
            <?php 
            foreach($wisata->showAll() as $value) {
            ?>
            <div class="col">
                <div class="card shadow h-100">
                    <img src="assets/img/noimage.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $value['nama_wisata'] ?></h5>
                        <p class="card-text"><?= rupiah($value['harga']) ?></p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="row mb-3">
            <h3 class="mb-3">Jumlah Pengunjung per Wisata</h3>
            <canvas id="myChart"></canvas>
        </div>
    </div>
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [<?php foreach($pesanan->showAll() as $item) { echo '"'. $item['nama_wisata'].'"'.','; } ?>],
                datasets: [{
                    label: 'Jumlah Pengunjung',
                    data: [<?php foreach($pesanan->showAll() as $item) { echo $item['dewasa']+$item['anak'].','; } ?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>