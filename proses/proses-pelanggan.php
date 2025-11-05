<?php

// Memasukkan file class-master.php untuk mengakses class MasterData
include '../config/class-master.php';
// Membuat objek dari class MasterData
$master = new MasterData();
// Mengecek aksi yang dilakukan berdasarkan parameter GET 'aksi'
if($_GET['aksi'] == 'inputpelanggan'){
    // Mengambil data pelanggan dari form input menggunakan metode POST dan menyimpannya dalam array
    $dataPelanggan = [
        'nm_pelanggan' => $_POST['nm_pelanggan']
    ];
    // Memanggil method inputpelanggan untuk memasukkan data pelanggan dengan parameter array $datapelanggan
    $input = $master->inputPelanggan($dataPelanggan);
    if($input){
        header("Location: ../master-pelanggan-list.php?status=inputsuccess");
    } else {
        header("Location: ../master-pelanggan-input.php?status=failed");
    }
} elseif($_GET['aksi'] == 'updatepelanggan'){
    // Mengambil data pelanggan dari form edit menggunakan metode POST dan menyimpannya dalam array
    $dataPelanggan = [
        'id_pelanggan' => $_POST['id_pelanggan'],
        'nm_pelanggan' => $_POST['nm_pelanggan']
    ];
    // Memanggil method updatepelanggan untuk mengupdate data pelanggan dengan parameter array $datapelanggan
    $update = $master->updatePelanggan($dataPelanggan);
    if($update){
        header("Location: ../master-pelanggan-list.php?status=editsuccess");
    } else {
        header("Location: ../master-pelanggan-edit.php?id=".$dataPelanggan['id']."&status=failed");
    }
} elseif($_GET['aksi'] == 'deletepelanggan'){
    // Mengambil id pelanggan dari parameter GET
    $id = $_GET['id'];
    // Memanggil method deletepelanggan untuk menghapus data pelanggan berdasarkan id
    $delete = $master->deletePelanggan($id);
    if($delete){
        header("Location: ../master-pelanggan-list.php?status=deletesuccess");
    } else {
        header("Location: ../master-pelanggan-list.php?status=deletefailed");
    }
}

?>