<?php 
    require __DIR__.'/connection.php';
    require __DIR__.'/config.php';

    include_once __DIR__.'/models/Wisata.php';
    include_once __DIR__.'/models/Pesanan.php';

    $wisata = new Wisata;
    $pesanan = new Pesanan;

    if(isset($_POST['simpan'])) {
        $explodeValues = explode("|", $_POST['wisata']);
        $wisata_id = $explodeValues[1];
        
        $pesanan->createPesanan(
            $_POST['nama_lengkap'],
            $_POST['nik'],
            $_POST['nohp'],
            $wisata_id,
            $_POST['tanggal'],
            $_POST['dewasa'],
            $_POST['anak'],
            $_POST['total']
        );
    }
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
        <select name="wisata" id="wisata" required>
            <?php foreach($wisata->showAll() as $item): ?>
            <option value="<?= $item['harga'] ?>|<?= $item['id'] ?>"><?= $item['nama_wisata'] ?></option>
            <?php endforeach ?>
        </select><br>
        <input type="date" name="tanggal" required><br>
        <input type="number" name="dewasa" id="dewasa" placeholder="Pengunjung Dewasa" required><br>
        <input type="number" name="anak" id="anak" placeholder="Pengunjung Anak Anak" required><br>
        <input type="number" name="total" id="total" placeholder="Total" required><br>

        <button type="submit" name="simpan">Pesan Tiket</button>
        <a href="/">Cancel</a>
    </form>
    <button onclick="hitungTotal()">Hitung Total</button>

    <script src="http://code.jquery.com/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        function hitungTotal() {
            var value = document.getElementById('wisata').value;
            const split = value.split("|");
            let harga = parseInt(split[0]);

            var dewasa = document.getElementById('dewasa').value;
            var anak = document.getElementById('anak').value;

            var total = (harga*dewasa)+((harga/2)*anak);
            
            document.getElementById('total').value = total
        }
    </script>
</body>
</html>