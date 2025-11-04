<?php

// Memasukkan file class-mahasiswa.php untuk mengakses class Mahasiswa
include '../config/class-mahasiswa.php';
// Membuat objek dari class Mahasiswa
$mahasiswa = new Mahasiswa();
// Mengambil data mahasiswa dari form input menggunakan metode POST dan menyimpannya dalam array
$dataMahasiswa = [
    'id' => $_POST['id'],
    'nm_pelanggan' => $_POST['nm_pelanggan'],
    'alamat' => $_POST['alamat'],
    'email' => $_POST['email'],
    'telp' => $_POST['telp'],
    'mn_pesanan' => $_POST['mn_pesanan'],
    'jumlah_pesanan' => $_POST['jumlah_pesanan'],
    'tgl_pengiriman' => $_POST['tgl_pengiriman']
];
// Memanggil method inputMahasiswa untuk memasukkan data mahasiswa dengan parameter array $dataMahasiswa
$input = $mahasiswa->inputMahasiswa($dataMahasiswa);
// Mengecek apakah proses input berhasil atau tidak - true/false
if($input){
    // Jika berhasil, redirect ke halaman data-list.php dengan status inputsuccess
    header("Location: ../data-list.php?status=inputsuccess");
} else {
    // Jika gagal, redirect ke halaman data-input.php dengan status failed
    header("Location: ../data-input.php?status=failed");
}

?>