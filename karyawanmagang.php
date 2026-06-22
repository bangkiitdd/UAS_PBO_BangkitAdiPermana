<?php
// KaryawanMagang.php
require_once 'Karyawan.php';

class KaryawanMagang extends Karyawan {
    // Atribut tambahan spesifik anak
    private $uangSakuBulanan;
    private $sertifikatKampusMerdeka;

    public function __construct($id_karyawan, $nama_karyawan, $departemen, $hari_kerja_masuk, $gajiDasarPerHari, $uangSakuBulanan, $sertifikatKampusMerdeka) {
        parent::__construct($id_karyawan, $nama_karyawan, $departemen, $hari_kerja_masuk, $gajiDasarPerHari);
        $this->uangSakuBulanan = $uangSakuBulanan;
        $this->sertifikatKampusMerdeka = $sertifikatKampusMerdeka;
    }

    // Implementasi Method Abstrak 1: Hitung Gaji Bersih
    public function hitungGajiBersih() {
        // Gaji Magang = Uang saku bulanan tetap + (hari masuk * uang makan/gaji dasar per hari)
        return 0;
    }

    // Implementasi Method Abstrak 2: Tampilkan Profil
    public function tampilkanProfilKaryawan() {
        echo "<h3>Profil Karyawan Magang</h3>";
        echo "ID Karyawan: " . $this->id_karyawan . "<br>";
        echo "Nama: " . $this->nama_karyawan . "<br>";
        echo "Departemen: " . $this->departemen . "<br>";
        echo "Sertifikat Program: " . ($this->sertifikatKampusMerdeka ?? "Magang Reguler") . "<br>";
        echo "Uang Saku Pokok: Rp " . number_format($this->uangSakuBulanan, 0, ',', '.') . "<br>";
        echo "Total Pendapatan Bulan Ini: Rp " . number_format($this->hitungGajiBersih(), 0, ',', '.') . "<br>";
        echo "<hr>";
    }
}
?>