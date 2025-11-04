<?php

// Memasukkan file class-mahasiswa.php untuk mengakses class Mahasiswa
include_once '../config/class-mahasiswa.php';
// Membuat objek dari class Mahasiswa
$mahasiswa = new Mahasiswa();
// Mengambil data mahasiswa dari form edit menggunakan metode POST dan menyimpannya dalam array
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
// Memanggil method editMahasiswa untuk mengupdate data mahasiswa dengan parameter array $dataMahasiswa
$edit = $mahasiswa->editMahasiswa($dataMahasiswa);
// Mengecek apakah proses edit berhasil atau tidak - true/false
if($edit){
    // Jika berhasil, redirect ke halaman data-list.php dengan status editsuccess
    header("Location: ../data-list.php?status=editsuccess");
} else {
    // Jika gagal, redirect ke halaman data-edit.php dengan status failed dan membawa id mahasiswa
    header("Location: ../data-edit.php?id=".$dataMahasiswa['id']."&status=failed");
}

?>