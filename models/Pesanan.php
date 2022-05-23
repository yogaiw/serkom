<?php 
require_once __DIR__.'/../connection.php';

// Class untuk mengelola data pesanan
class Pesanan {

    protected $table = 'pesanan';

    public function createPesanan($nama, $nik, $nohp, $wisata_id, $tanggal, $dewasa, $anak, $total) {
        global $conn;

        $query = "INSERT INTO $this->table VALUES (
            '',
            '$nama',
            '$nik',
            '$nohp',
            '$wisata_id',
            '$tanggal',
            '$dewasa',
            '$anak',
            $total
        )";

        $conn->query($query);
    }
}