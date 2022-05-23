<?php 
require_once __DIR__.'/../connection.php';

// Class untuk mengelola data wisata
class Wisata {
    
    protected $table = 'wisata';

    public function showAll() {
        global $conn;

        $query = "SELECT * FROM $this->table";
        return $conn->query($query);
    }
}