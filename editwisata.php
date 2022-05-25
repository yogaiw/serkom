<?php 
    require __DIR__.'/connection.php';

    include_once __DIR__.'/models/Wisata.php';

    $wisata = new Wisata;
    $value = $wisata->detail($_GET['id']);

    if(isset($_POST['update'])) {
        $wisata->update($value['wisata_id'], $_POST['nama'], $_POST['harga']);
        header('Location:admin.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit - <?= $value['nama_wisata'] ?></title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/Chart.js"></script>
</head>
<body>
    <div class="container py-4">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <form action="" method="POST">
                        <label class="mb-1">Nama Wisata</label>
                        <input type="text" class="form-control mb-3" name="nama" value="<?= $value['nama_wisata'] ?>">
                        <label class="mb-1">Harga Tiket</label>
                        <input type="text" class="form-control mb-3" name="harga" value="<?= $value['harga'] ?>">
                        <button type="submit" class="btn btn-primary" name="update" style="float: right;">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>