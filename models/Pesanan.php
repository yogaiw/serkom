<?php 
require_once __DIR__.'/../connection.php';

/**
 * class untuk mengelola data pesanan
*/
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

        $updateVisitors = "UPDATE wisata SET visitors = visitors"."+".($dewasa+$anak)." WHERE wisata_id = ".$wisata_id;
        $conn->query($query);
        $conn->query($updateVisitors);
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
}