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

    public function showResult() {
        global $conn;

        $query = "SELECT * FROM $this->table
        LEFT JOIN wisata ON pesanan.wisata_id = wisata.wisata_id
        ORDER BY pesanan_id DESC
        LIMIT 1
        ";

        return $conn->query($query)->fetch_assoc();
    }

    public function showAll() {
        global $conn;

        $query = "SELECT * FROM $this->table
        LEFT JOIN wisata ON pesanan.wisata_id = wisata.wisata_id
        ";

        return $conn->query($query);
    }
}