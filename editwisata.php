<?php 
    require __DIR__.'/connection.php';

    include_once __DIR__.'/models/Wisata.php';

    $wisata = new Wisata;
    $value = $wisata->detail($_GET['id']);

    if(isset($_POST['update'])) {
        $wisata->update($value['wisata_id'], $_POST['nama'], $_POST['harga'], $_POST['youtube']);
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
                        <input type="number" class="form-control mb-3" name="harga" value="<?= $value['harga'] ?>">
                        <label class="mb-1">Video Youtube</label>
                        <input type="text" class="form-control mb-3" name="youtube" value="<?= $value['youtube'] ?>">
                        <div class="d-flex flex-row-reverse">
                            <a href="admin.php" class="btn btn-danger mx-2">Kembali</a>
                            <button type="submit" class="btn btn-success" name="update">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>