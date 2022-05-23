<?php 
    require __DIR__.'/connection.php';
    require __DIR__.'/config.php';

    include_once __DIR__.'/models/Wisata.php';

    $wisata = new Wisata;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pesan Tiket</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/custom.css">
    <script src="assets/js/bootstrap.min.js"></script>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" required><br>
        <input type="number" name="nik" placeholder="NIK" required><br>
        <input type="number" name="nohp" placeholder="No HP" required><br>
        <select name="wisata">
            <?php foreach($wisata->showAll() as $item): ?>
            <option value="<?= $item['id'] ?>"><?= $item['nama_wisata'] ?></option>
            <?php endforeach ?>
        </select><br>
        <input type="date" name="tanggal"><br>
        <input type="number" name="dewasa" id="dewasa" placeholder="Pengunjung Dewasa" required><br>
        <input type="number" name="anak" id="anak" placeholder="Pengunjung Anak Anak" required><br>
        <input type="number" name="total" id="total" placeholder="Total" required><br>

        <button>Hitung Total</button>
        <button type="submit" name="simpan">Pesan Tiket</button>
        <a href="/">Cancel</a>
    </form>

    <script>

    </script>
</body>
</html>