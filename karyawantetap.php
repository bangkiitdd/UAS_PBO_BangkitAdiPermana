<?php
// KaryawanTetap.php
require_once 'Karyawan.php';

class KaryawanTetap extends Karyawan {
    // Atribut tambahan spesifik anak
    private $tunjanganKesehatan;
    private $opsiSahamID;

    public function __construct($id_karyawan, $nama_karyawan, $departemen, $hari_kerja_masuk, $gajiDasarPerHari, $tunjanganKesehatan, $opsiSahamID) {
        parent::__construct($id_karyawan, $nama_karyawan, $departemen, $hari_kerja_masuk, $gajiDasarPerHari);
        $this->tunjanganKesehatan = $tunjanganKesehatan;
        $this->opsiSahamID = $opsiSahamID;
    }

    // Implementasi Method Abstrak 1: Hitung Gaji Bersih
    public function hitungGajiBersih() {
        // Gaji Tetap = (Hari kerja * gaji dasar) + Tunjangan Kesehatan
        return 0;
    }

    // Implementasi Method Abstrak 2: Tampilkan Profil
    public function tampilkanProfilKaryawan() {
        echo "<h3>Profil Karyawan Tetap</h3>";
        echo "ID Karyawan: " . $this->id_karyawan . "<br>";
        echo "Nama: " . $this->nama_karyawan . "<br>";
        echo "Departemen: " . $this->departemen . "<br>";
        echo "Opsi Saham ID: " . $this->opsiSahamID . "<br>";
        echo "Tunjangan Kesehatan: Rp " . number_format($this->tunjanganKesehatan, 0, ',', '.') . "<br>";
        echo "Gaji Bersih Bulan Ini: Rp " . number_format($this->hitungGajiBersih(), 0, ',', '.') . "<br>";
        echo "<hr>";
    }
}
?>