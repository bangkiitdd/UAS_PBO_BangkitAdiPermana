<?php
// koneksi/database.php

class Database {
    private $host = "localhost";
    private $username = "root"; // Sesuaikan dengan username DB MySQL kamu
    private $password = "";     // Sesuaikan dengan password DB MySQL kamu
    private $db_name = "DB_UAS_TI1C_BangkitAdiPermana";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name, 
                $this->username, 
                $this->password
            );
            // Mengatur error mode ke exception untuk mempermudah debugging saat UAS
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Koneksi database gagal: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>