<?php 
require_once __DIR__.'/../connection.php';

/**
 * class untuk mengelola data Wisata
 */
class Wisata {
    
    protected $table = 'wisata';

    public function createWisata($nama, $harga, $gambar, $youtube) {
        global $conn;

        $initVisitor = 0;
        $query = "INSERT INTO $this->table VALUES (
            '',
            '$nama',
            '$harga',
            $initVisitor,
            '$gambar',
            '$youtube'
        )";

        $conn->query($query);
    } 

    /**
     * Menampilkan semua data dalam tabel database
     * 
     * @return iterable
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

        $query = "SELECT * FROM $this->table WHERE wisata_id = $id";

        return $conn->query($query)->fetch_assoc();
    }

    public function update($id, $nama, $harga, $youtube) {
        global $conn;

        $query = "UPDATE $this->table 
        SET nama_wisata = '$nama' , harga = $harga, youtube = '$youtube' 
        WHERE wisata_id = $id";

        $conn->query($query);
    }

    public function delete($id) {
        global $conn;

        $wisata = $this->detail($id);
        if($wisata['gambar'] != 'noimage.jpg') {
            unlink("assets/img/".$wisata['gambar']);
        }

        $query = "DELETE FROM $this->table WHERE wisata_id = $id";

        $conn->query($query);
    }
}