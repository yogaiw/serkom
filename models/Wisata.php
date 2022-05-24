<?php 
require_once __DIR__.'/../connection.php';

/**
 * class untuk mengelola data Wisata
 */
class Wisata {
    
    protected $table = 'wisata';

    /**
     * Menampilkan semua data dalam tabel database
     * 
     * @return iterable void
     */
    public function showAll() {
        global $conn;

        $query = "SELECT * FROM $this->table";
        return $conn->query($query);
    }

    /**
     * Menampilkan detail dari wisata berdasarkan id
     * 
     * @param integer $id nomor identitas dari tabel wisata
     * @return array|object
     */
    public function detail($id) {
        global $conn;

        $query = "SELECT * FROM $this->table WHERE wisata_id = ".$id;

        return $conn->query($query)->fetch_assoc();
    }
}