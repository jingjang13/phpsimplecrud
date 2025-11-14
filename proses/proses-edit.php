<?php 
include_once '../config/class-cookiejoy.php';
$cookiejoy = new Cookiejoy();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dataCookiejoy = [
        'id_pemesanan'  => $_POST['id_pemesanan'],
        'nm_pelanggan'  => $_POST['nm_pelanggan'],
        'alamat'        => $_POST['alamat'],
        'email'         => $_POST['email'],
        'telp'          => $_POST['telp'],
        'daftar_menu'   => $_POST['daftar_menu'],
        'jumlah_pesanan'=> $_POST['jumlah_pesanan'],
        'tgl_pengiriman'=> $_POST['tgl_pengiriman']
    ];

    $edit = $cookiejoy->editCookiejoy($dataCookiejoy);

    if($edit){
        header("Location: ../data-list.php?status=editsuccess");
    } else {
        header("Location: ../data-edit.php?id=".$dataCookiejoy['id_pemesanan']."&status=failed");
    }
}
?>
