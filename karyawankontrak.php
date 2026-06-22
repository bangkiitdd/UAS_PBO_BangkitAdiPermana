<?php
// KaryawanKontrak.php
require_once 'Karyawan.php';

class KaryawanKontrak extends Karyawan {
    // Atribut tambahan spesifik anak
    private $durasiKontrakBulan;
    private $agensiPenyalur;

    public function __construct($id_karyawan, $nama_karyawan, $departemen, $hari_kerja_masuk, $gajiDasarPerHari, $durasiKontrakBulan, $agensiPenyalur) {
        // Memanggil constructor dari abstract class Karyawan
        parent::__construct($id_karyawan, $nama_karyawan, $departemen, $hari_kerja_masuk, $gajiDasarPerHari);
        $this->durasiKontrakBulan = $durasiKontrakBulan;
        $this->agensiPenyalur = $agensiPenyalur;
    }

    // Implementasi Method Abstrak 1: Hitung Gaji Bersih
    public function hitungGajiBersih() {
        // Gaji Kontrak murni dari hari kerja * tarif per hari
        return 0;
    }

    // Implementasi Method Abstrak 2: Tampilkan Profil
    public function tampilkanProfilKaryawan() {
        echo "<h3>Profil Karyawan Kontrak</h3>";
        echo "ID Karyawan: " . $this->id_karyawan . "<br>";
        echo "Nama: " . $this->nama_karyawan . "<br>";
        echo "Departemen: " . $this->departemen . "<br>";
        echo "Durasi Kontrak: " . $this->durasiKontrakBulan . " Bulan<br>";
        echo "Agensi Penyalur: " . $this->agensiPenyalur . "<br>";
        echo "Gaji Bersih Bulan Ini: Rp " . number_format($this->hitungGajiBersih(), 0, ',', '.') . "<br>";
        echo "<hr>";
    }
}
?>