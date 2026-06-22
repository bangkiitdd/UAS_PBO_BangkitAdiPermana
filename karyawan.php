<?php
// Karyawan.php

abstract class Karyawan {
    // Atribut Terenkapsulasi (Protected)
    protected $id_karyawan;
    protected $nama_karyawan;
    protected $departemen;
    protected $hari_kerja_masuk;
    protected $gajiDasarPerHari;

    // Constructor untuk menginisialisasi atribut induk saat objek anak dibuat
    public function __construct($id_karyawan, $nama_karyawan, $departemen, $hari_kerja_masuk, $gajiDasarPerHari) {
        $this->id_karyawan = $id_karyawan;
        $this->nama_karyawan = $nama_karyawan;
        $this->departemen = $departemen;
        $this->hari_kerja_masuk = $hari_kerja_masuk;
        $this->gajiDasarPerHari = $gajiDasarPerHari;
    }

    // =========================================================================
    // METODE ABSTRAK (Wajib Diimplementasikan oleh Kelas Anak / Subclass)
    // =========================================================================
    
    /**
     * Menghitung total gaji bersih berdasarkan formula spesifik jenis karyawan.
     * @return int
     */
    abstract public function hitungGajiBersih();

    /**
     * Menampilkan profil lengkap beserta atribut spesifik milik karyawan.
     * @return void
     */
    abstract public function tampilkanProfilKaryawan();
}
?>