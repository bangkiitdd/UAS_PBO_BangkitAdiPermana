<?php
// KaryawanMagang.php
require_once 'Karyawan.php';

class KaryawanMagang extends Karyawan {
    private $uangSakuBulanan; // Tetap dipertahankan jika dibutuhkan di luar gaji bersih
    private $sertifikatKampusMerdeka;

    public function __construct($id_karyawan, $nama_karyawan, $departemen, $hari_kerja_masuk, $gajiDasarPerHari, $uangSakuBulanan, $sertifikatKampusMerdeka) {
        parent::__construct($id_karyawan, $nama_karyawan, $departemen, $hari_kerja_masuk, $gajiDasarPerHari);
        $this->uangSakuBulanan = $uangSakuBulanan;
        $this->sertifikatKampusMerdeka = $sertifikatKampusMerdeka;
    }

    // =========================================================================
    // METHOD OVERRIDING (Polimorfisme)
    // =========================================================================
    public function hitungGajiBersih() {
        // Menerima potongan upah sebesar 20% dari plafon harian (* 0.8)
        return ($this->hari_kerja_masuk * $this->gajiDasarPerHari) * 0.8;
    }

    public function tampilkanProfilKaryawan() {
        echo "<h3>Profil Karyawan Magang</h3>";
        echo "ID Karyawan: " . $this->id_karyawan . "<br>";
        echo "Nama: " . $this->nama_karyawan . "<br>";
        echo "Departemen: " . $this->departemen . "<br>";
        echo "Gaji Bersih (Setelah Potongan 20%): Rp " . number_format($this->hitungGajiBersih(), 0, ',', '.') . "<br>";
        echo "<hr>";
    }
}
?>