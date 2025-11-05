<?php
// Memasukkan file class-mahasiswa.php untuk mengakses class cookiejoy
include '../config/class-cookiejoy.php';


// Membuat objek dari class cookiejoy
$cookiejoy = new Cookiejoy();
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
// Mengambil data mahasiswa dari form input menggunakan metode POST dan menyimpannya dalam array
$dataCookiejoy = [
    'id_pelanggan' => $_POST['id_pelanggan'],
    'nm_pelanggan' => $_POST['nm_pelanggan'],
    'alamat' => $_POST['alamat'],
    'email' => $_POST['email'],
    'telp' => $_POST['telp'],
    'daftar_menu' => $_POST['daftar_menu'],
    'jumlah_pesanan' => $_POST['jumlah_pesanan'],
    'tgl_pengiriman' => $_POST['tgl_pengiriman']
];

// Memanggil method inputMahasiswa untuk memasukkan data mahasiswa dengan parameter array $dataMahasiswa
$input = $cookiejoy->inputCookiejoy($dataCookiejoy);
// Mengecek apakah proses input berhasil atau tidak - true/false
if($input){
    header("Location: ../data-list.php?status=inputsuccess");
    exit;
} else {
    header("Location: ../data-input.php?status=failed");
    exit;
}
}

?>