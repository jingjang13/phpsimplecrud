
<?php

// Memasukkan file class-master.php untuk mengakses class MasterData
include '../config/class-master.php';
// Membuat objek dari class MasterData
$master = new MasterData();
// Mengecek aksi yang dilakukan berdasarkan parameter GET 'aksi'
if($_GET['aksi'] == 'inputcookies'){
    // Mengambil data cookies dari form input menggunakan metode POST dan menyimpannya dalam array
    $dataCookies = [
        'kode_menu' => $_POST['kode_menu'],
        'daftar_menu' => $_POST['daftar_menu']
    ];
    // Memanggil method inputCookies untuk memasukkan data Cookies dengan parameter array $dataCookies
    $input = $master->inputCookies($dataCookies);
    if($input){
        // Jika berhasil, redirect ke halaman master-Cookies-list.php dengan status inputsuccess
        header("Location: ../master-cookies-list.php?status=inputsuccess");
    } else {
        // Jika gagal, redirect ke halaman master-Cookies-input.php dengan status failed
        header("Location: ../master-cookies-input.php?status=failed");
    }
} elseif($_GET['aksi'] == 'updatecookies'){
    // Mengambil data Cookies dari form edit menggunakan metode POST dan menyimpannya dalam array
    $dataCookies = [
        
        'kode_menu' => $_POST['kode_menu'],
        'daftar_menu' => $_POST['daftar_menu']
    ];
    // Memanggil method updateCookies untuk mengupdate data Cookies dengan parameter array $dataCookies
    $update = $master->updateCookies($dataCookies);
    if($update){
        // Jika berhasil, redirect ke halaman master-Cookies-list.php dengan status editsuccess
        header("Location: ../master-cookies-list.php?status=editsuccess");
    } else {
        // Jika gagal, redirect ke halaman master-prCookiesodi-edit.php dengan status failed dan membawa id Cookies
        header("Location: ../master-cookies-edit.php?id=".$dataCookies['id']."&status=failed");
    }
} elseif($_GET['aksi'] == 'deletecookies'){
    // Mengambil id Cookies dari parameter GET
    $id = $_GET['kode'];
    // Memanggil method deleteCookies untuk menghapus data Cookies berdasarkan id
    $delete = $master->deleteCookies($id);
    if($delete){
        // Jika berhasil, redirect ke halaman master-Cookies-list.php dengan status deletesuccess
        header("Location: ../master-cookies-list.php?status=deletesuccess");
    } else {
        // Jika gagal, redirect ke halaman master-Cookies-list.php dengan status deletefailed
        header("Location: ../master-cookies-list.php?status=deletefailed");
    }
}

?>
