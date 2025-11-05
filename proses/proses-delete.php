<?php

// Memasukkan file class-cookiejoy.php untuk mengakses class cookiejoy
include_once '../config/class-cookiejoy.php';
// Membuat objek dari class cookiejoy
$cookiejoy = new Cookiejoy();
// Mengambil id cookiejoy dari parameter GET
$id = $_GET['id'];
// Memanggil method deletecookiejoy untuk menghapus data cookiejoy berdasarkan id
$delete = $cookiejoy->deleteCookiejoy($id);
// Mengecek apakah proses delete berhasil atau tidak - true/false
if($delete){
    // Jika berhasil, redirect ke halaman data-list.php dengan status deletesuccess
    header("Location: ../data-list.php?status=deletesuccess");
} else {
    // Jika gagal, redirect ke halaman data-list.php dengan status deletefailed
    header("Location: ../data-list.php?status=deletefailed");
}

?>