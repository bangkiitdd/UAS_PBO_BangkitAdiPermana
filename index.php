<?php
// index.php atau view.php

// 1. Memuat file koneksi database dan kelas-kelas OOP
require_once 'koneksi.php';
require_once 'Karyawan.php';
require_once 'karyawankontrak.php';
require_once 'karyawantetap.php';
require_once 'karyawanmagang.php';

// 2. Inisialisasi koneksi database
$database = new Database();
$db = $database->getConnection();

if ($db === null) {
    die("Gagal memuat halaman karena koneksi database kosong.");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Slip Gaji Karyawan Dinamis</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 40px; background-color: #f4f7f6; color: #333; }
        h1 { text-align: center; color: #2c3e50; margin-bottom: 30px; }
        h2 { color: #2c3e50; margin-top: 40px; border-bottom: 3px solid #3498db; padding-bottom: 10px; text-transform: uppercase; font-size: 1.4rem; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; background: #fff; box-shadow: 0 4px 6px rgba(0,0,0,0.05); border-radius: 4px; overflow: hidden; }
        th, td { padding: 12px 15px; text-align: left; border: 1px solid #e0e0e0; }
        th { background-color: #34495e; color: white; font-weight: 600; }
        tr:nth-child(even) { background-color: #f8f9fa; }
        tr:hover { background-color: #f1f2f6; }
        .gaji-bersih { font-weight: bold; color: #27ae60; }
        .spesifik-header { background-color: #e67e22; color: white; }
    </style>
</head>
<body>

    <h1>SISTEM DAFTAR SLIP GAJI KARYAWAN</h1>

    <h2>Kategori: Karyawan Kontrak</h2>
    <table>
        <thead>
            <tr>
                <th>ID Karyawan</th>
                <th>Nama Karyawan</th>
                <th>Departemen</th>
                <th>Hari Masuk</th>
                <th>Gaji / Hari</th>
                <th>Durasi Kontrak</th>
                <th>Agensi Penyalur</th>
                <th>Gaji Bersih</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $queryKontrak = "SELECT id_karyawan, nama_karyawan, departemen, hari_kerja_masuk, gaji_dasar_per_hari, durasi_kontrak_bulan, agensi_penyalur 
                             FROM tabel_karyawan WHERE jenis_karyawan = 'kontrak'";
            $stmtKontrak = $db->prepare($queryKontrak);
            $stmtKontrak->execute();

            while ($row = $stmtKontrak->fetch(PDO::FETCH_ASSOC)) {
                // Instansiasi objek secara polimorfisme
                $karyawan = new KaryawanKontrak(
                    $row['id_karyawan'], $row['nama_karyawan'], $row['departemen'],
                    $row['hari_kerja_masuk'], $row['gaji_dasar_per_hari'],
                    $row['durasi_kontrak_bulan'], $row['agensi_penyalur']
                );

                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['id_karyawan']) . "</td>";
                echo "<td>" . htmlspecialchars($row['nama_karyawan']) . "</td>";
                echo "<td>" . htmlspecialchars($row['departemen']) . "</td>";
                echo "<td>" . $row['hari_kerja_masuk'] . " Hari</td>";
                echo "<td>Rp " . number_format($row['gaji_dasar_per_hari'], 0, ',', '.') . "</td>";
                echo "<td>" . $row['durasi_kontrak_bulan'] . " Bulan</td>";
                echo "<td>" . htmlspecialchars($row['agensi_penyalur']) . "</td>";
                echo "<td class='gaji-bersih'>Rp " . number_format($karyawan->hitungGajiBersih(), 0, ',', '.') . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <h2>Kategori: Karyawan Tetap</h2>
    <table>
        <thead>
            <tr>
                <th>ID Karyawan</th>
                <th>Nama Karyawan</th>
                <th>Departemen</th>
                <th>Hari Masuk</th>
                <th>Gaji / Hari</th>
                <th>Tunjangan Kesehatan</th>
                <th>Opsi Saham ID</th>
                <th>Gaji Bersih</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $queryTetap = "SELECT id_karyawan, nama_karyawan, departemen, hari_kerja_masuk, gaji_dasar_per_hari, tunjangan_kesehatan, opsi_saham_id 
                           FROM tabel_karyawan WHERE jenis_karyawan = 'tetap'";
            $stmtTetap = $db->prepare($queryTetap);
            $stmtTetap->execute();

            while ($row = $stmtTetap->fetch(PDO::FETCH_ASSOC)) {
                // Instansiasi objek secara polimorfisme
                $karyawan = new KaryawanTetap(
                    $row['id_karyawan'], $row['nama_karyawan'], $row['departemen'],
                    $row['hari_kerja_masuk'], $row['gaji_dasar_per_hari'],
                    $row['tunjangan_kesehatan'], $row['opsi_saham_id']
                );

                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['id_karyawan']) . "</td>";
                echo "<td>" . htmlspecialchars($row['nama_karyawan']) . "</td>";
                echo "<td>" . htmlspecialchars($row['departemen']) . "</td>";
                echo "<td>" . $row['hari_kerja_masuk'] . " Hari</td>";
                echo "<td>Rp " . number_format($row['gaji_dasar_per_hari'], 0, ',', '.') . "</td>";
                echo "<td>Rp " . number_format($row['tunjangan_kesehatan'], 0, ',', '.') . "</td>";
                echo "<td>" . htmlspecialchars($row['opsi_saham_id']) . "</td>";
                echo "<td class='gaji-bersih'>Rp " . number_format($karyawan->hitungGajiBersih(), 0, ',', '.') . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <h2>Kategori: Karyawan Magang</h2>
    <table>
        <thead>
            <tr>
                <th>ID Karyawan</th>
                <th>Nama Karyawan</th>
                <th>Departemen</th>
                <th>Hari Masuk</th>
                <th>Plafon Gaji / Hari</th>
                <th>Sertifikat Program</th>
                <th>Gaji Bersih (Potongan 20%)</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $queryMagang = "SELECT id_karyawan, nama_karyawan, departemen, hari_kerja_masuk, gaji_dasar_per_hari, uang_saku_bulanan, sertifikat_kampus_merdeka 
                            FROM tabel_karyawan WHERE jenis_karyawan = 'magang'";
            $stmtMagang = $db->prepare($queryMagang);
            $stmtMagang->execute();

            while ($row = $stmtMagang->fetch(PDO::FETCH_ASSOC)) {
                // Instansiasi objek secara polimorfisme
                $karyawan = new KaryawanMagang(
                    $row['id_karyawan'], $row['nama_karyawan'], $row['departemen'],
                    $row['hari_kerja_masuk'], $row['gaji_dasar_per_hari'],
                    $row['uang_saku_bulanan'], $row['sertifikat_kampus_merdeka']
                );

                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['id_karyawan']) . "</td>";
                echo "<td>" . htmlspecialchars($row['nama_karyawan']) . "</td>";
                echo "<td>" . htmlspecialchars($row['departemen']) . "</td>";
                echo "<td>" . $row['hari_kerja_masuk'] . " Hari</td>";
                echo "<td>Rp " . number_format($row['gaji_dasar_per_hari'], 0, ',', '.') . "</td>";
                echo "<td>" . ($row['sertifikat_kampus_merdeka'] ? htmlspecialchars($row['sertifikat_kampus_merdeka']) : 'Magang Reguler') . "</td>";
                echo "<td class='gaji-bersih'>Rp " . number_format($karyawan->hitungGajiBersih(), 0, ',', '.') . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>