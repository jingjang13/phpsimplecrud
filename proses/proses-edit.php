<?php

// Memasukkan file class-cookiejoy.php untuk mengakses class cookiejoy
include_once '../config/class-cookiejoy.php';
// Membuat objek dari class cookiejoy
$cookiejoy = new Cookiejoy();
// Mengambil data cookiejoy dari form edit menggunakan metode POST dan menyimpannya dalam array
$dataCookiejoy = [
    'id_pelanggan'  => $_POST['id_pelanggan'],
    'nm_pelanggan'  => $_POST['nm_pelanggan'],
    'alamat'        => $_POST['alamat'],
    'email'         => $_POST['email'],
    'telp'          => $_POST['telp'],
    'daftar_menu'    => $_POST['daftar_menu'],
    'jumlah_pesanan' => $_POST['jumlah_pesanan'],
    'tgl_pengiriman' => $_POST['tgl_pengiriman']
];
// Memanggil method editMahasiswa untuk mengupdate data mahasiswa dengan parameter array $dataMahasiswa
$edit = $cookiejoy->editCookiejoy($dataCookiejoy);
// Mengecek apakah proses edit berhasil atau tidak - true/false
if($edit){
    // Jika berhasil, redirect ke halaman data-list.php dengan status editsuccess
    header("Location: ../data-list.php?status=editsuccess");
} else {
    // Jika gagal, redirect ke halaman data-edit.php dengan status failed dan membawa id mahasiswa
    header("Location: ../data-edit.php?id=".$dataCookiejoy['id']."&status=failed");
}

?>