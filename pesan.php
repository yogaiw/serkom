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

        header('Location:result.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pesan Tiket</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/custom.css">
    <script src="assets/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container py-4">
        <div class="row">
            <div class="card mx-auto py-4 shadow">
                <h4 class="mb-4"><b>Form Pemesanan Tiket</b></h4>
                <form action="" method="POST" onsubmit="return validate();">
                    <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" required><br>
                    <input type="number" id="nik" name="nik" class="form-control" placeholder="No. Identitas" required><br>
                    <input type="number" name="nohp" class="form-control" placeholder="No HP" required><br>
                    <div class="form-floating">
                        <select name="wisata" id="wisata" class="form-control" required>
                            <?php foreach($wisata->showAll() as $item): ?>
                            <option value="<?= $item['harga'] ?>|<?= $item['wisata_id'] ?>"><?= $item['nama_wisata'] ?> -- <?= rupiah($item['harga']) ?></option>
                            <?php endforeach ?>
                        </select><br>
                        <label for="wisata">Wisata</label>
                    </div>
                    <input type="date" name="tanggal" class="form-control" required><br>
                    <input type="number" name="dewasa" id="dewasa" class="form-control" placeholder="Pengunjung Dewasa" required><br>
                    <input type="number" name="anak" id="anak" class="form-control" placeholder="Pengunjung Anak Anak" required><br>
                    <input type="number" name="total" id="total" class="form-control" placeholder="Total" required><br>

                    <div class="d-flex justify-content-center">
                        <button class="btn btn-secondary mx-2" type="button" onclick="hitungTotal()">Hitung Total Bayar</button>
                        <button class="btn btn-success mx-2" type="submit" name="simpan">Pesan Tiket</button>
                        <a class="btn btn-danger mx-2" href="index.php">Cancel</a>
                    </div>
                </form>  
            </div>
        </div>
    </div>
    
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

        function validate() {
            var nik = document.getElementById('nik').value;
            if(nik.length != 16) {
                alert('NIK harus berjumlah 16 digit');
                return false;
            }
            return true;
        }
    </script>
</body>
</html>