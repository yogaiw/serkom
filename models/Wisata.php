<?php 
require_once __DIR__.'/../connection.php';

// Class untuk mengelola data wisata
class Wisata {
    /*
        showAll -> untuk menampilkan semua data dalam tabel wisata
        @return array|object
    */
    public function showAll() {
        global $conn;

        $query = "SELECT * FROM wisata";
        return $conn->query($query);
    }
}