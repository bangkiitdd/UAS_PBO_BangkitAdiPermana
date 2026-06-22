<?php
// KaryawanTetap.php
require_once 'Karyawan.php';

class KaryawanTetap extends Karyawan {
    private $tunjanganKesehatan;
    private $opsiSahamID;

    public function __construct($id_karyawan, $nama_karyawan, $departemen, $hari_kerja_masuk, $gajiDasarPerHari, $tunjanganKesehatan, $opsiSahamID) {
        parent::__construct($id_karyawan, $nama_karyawan, $departemen, $hari_kerja_masuk, $gajiDasarPerHari);
        $this->tunjanganKesehatan = $tunjanganKesehatan;
        $this->opsiSahamID = $opsiSahamID;
    }

    // =========================================================================
    // METHOD OVERRIDING (Polimorfisme)
    // =========================================================================
    public function hitungGajiBersih() {
        // Mendapatkan tambahan tunjangan kesehatan/keluarga yang besarnya bervariasi
        return ($this->hari_kerja_masuk * $this->gajiDasarPerHari) + $this->tunjanganKesehatan;
    }

    public function tampilkanProfilKaryawan() {
        echo "<h3>Profil Karyawan Tetap</h3>";
        echo "ID Karyawan: " . $this->id_karyawan . "<br>";
        echo "Nama: " . $this->nama_karyawan . "<br>";
        echo "Departemen: " . $this->departemen . "<br>";
        echo "Gaji Bersih: Rp " . number_format($this->hitungGajiBersih(), 0, ',', '.') . "<br>";
        echo "<hr>";
    }
}
?>