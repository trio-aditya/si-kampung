<?php
// membaca data dari form
// $nama = 'TRIO ADITYA';

//CETAK USIA
function hitung_umur($tanggal_lahir)
{
    $birthDate = new DateTime($tanggal_lahir);
    $today = new DateTime("today");
    if ($birthDate > $today) {
        exit("0 tahun 0 bulan 0 hari");
    }
    $y = $today->diff($birthDate)->y;
    // $m = $today->diff($birthDate)->m;
    // $d = $today->diff($birthDate)->d;
    return $y . " Tahun ";
}
// echo hitung_umur("1980-12-01");

$nama_surat = './assets/admin/upload/surat/' . $arsip_surat['surat'];

$kode = $arsip_surat['kode'];
$nama = $arsip_surat['nama'];
$tempat_lahir = $arsip_surat['tempat_lahir'];
$tanggal_lahir = date_indo($arsip_surat['tanggal_lahir']);
$umur = hitung_umur($arsip_surat['tanggal_lahir']);
$status_penduduk = $arsip_surat['status_penduduk'];
$agama = $arsip_surat['agama_id'];
$jenis_kelamin = $arsip_surat['jenis_kelamin'];
$pekerjaan = $arsip_surat['pekerjaan_id'];
$nik = $arsip_surat['nik'];
$no_kk = $arsip_surat['no_kk'];
$dusun = $arsip_surat['dusun'];
$rt = $arsip_surat['rt'];
$rw = $arsip_surat['rw'];
$alamat_sekarang = $arsip_surat['alamat_sekarang'];
$keperluan = $arsip_surat['keperluan'];
$keterangan = $arsip_surat['keterangan'];
$dari = date_indo($arsip_surat['dari']);
$sampai = date_indo($arsip_surat['sampai']);
$sekarang = date_indo('Y-m-d');

// memanggil dan membaca template dokumen yang telah kita buat
$document = file_get_contents($nama_surat);
// isi dokumen dinyatakan dalam bentuk string
$document = str_replace("#KODE", $kode, $document);
$document = str_replace("#NAMA", $nama, $document);
$document = str_replace("#TEMPAT", $tempat_lahir, $document);
$document = str_replace("#TANGGAL", $tanggal_lahir, $document);
$document = str_replace("#UMUR", $umur, $document);
$document = str_replace("#STATUS_PENDUDUK", $status_penduduk, $document);
$document = str_replace("#AGAMA", $agama, $document);
$document = str_replace("#JENIS_KELAMIN", $jenis_kelamin, $document);
$document = str_replace("#PEKERJAAN", $pekerjaan, $document);
$document = str_replace("#NIK", $nik, $document);
$document = str_replace("#NO_KK", $no_kk, $document);
$document = str_replace("#DUSUN", $dusun, $document);
$document = str_replace("#RT", $rt, $document);
$document = str_replace("#RW", $rw, $document);
$document = str_replace("#ALAMAT", $alamat_sekarang, $document);
$document = str_replace("#KEPERLUAN", $keperluan, $document);
$document = str_replace("#KETERANGAN", $keterangan, $document);
$document = str_replace("#DARI", $dari, $document);
$document = str_replace("#SAMPAI", $sampai, $document);
$document = str_replace("#SEKARANG", $sekarang, $document);
// header untuk membuka file output RTF dengan MS. Word
header("Content-type: application/msword");
header("Content-disposition: inline; filename=surat_keterangan.doc");
header("Content-length: " . strlen($document));
echo $document;
