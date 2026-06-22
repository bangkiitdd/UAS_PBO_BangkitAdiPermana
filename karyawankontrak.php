<?php
// KaryawanKontrak.php
require_once 'Karyawan.php';

class KaryawanKontrak extends Karyawan {
    private $durasiKontrakBulan;
    private $agensiPenyalur;

    public function __construct($id_karyawan, $nama_karyawan, $departemen, $hari_kerja_masuk, $gajiDasarPerHari, $durasiKontrakBulan, $agensiPenyalur) {
        parent::__construct($id_karyawan, $nama_karyawan, $departemen, $hari_kerja_masuk, $gajiDasarPerHari);
        $this->durasiKontrakBulan = $durasiKontrakBulan;
        $this->agensiPenyalur = $agensiPenyalur;
    }

    // =========================================================================
    // METHOD OVERRIDING (Polimorfisme)
    // =========================================================================
    public function hitungGajiBersih() {
        // Sistem penggajian murni berdasarkan jumlah kehadiran
        return $this->hari_kerja_masuk * $this->gajiDasarPerHari;
    }

    public function tampilkanProfilKaryawan() {
        echo "<h3>Profil Karyawan Kontrak</h3>";
        echo "ID Karyawan: " . $this->id_karyawan . "<br>";
        echo "Nama: " . $this->nama_karyawan . "<br>";
        echo "Departemen: " . $this->departemen . "<br>";
        echo "Gaji Bersih: Rp " . number_format($this->hitungGajiBersih(), 0, ',', '.') . "<br>";
        echo "<hr>";
    }
}
?>