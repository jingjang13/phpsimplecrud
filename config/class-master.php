<?php

// Memasukkan file konfigurasi database
include_once 'db-config.php';

class MasterData extends Database {

    // Method untuk mendapatkan daftar cookies
    //data menu cookies //
    public function getCookies(){
        $query = "SELECT * FROM tb_cookies";
        $result = $this->conn->query($query);
        $cookies = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $cookies[] = [
                    'kode_menu' => $row['kode_menu'],
                    'daftar_menu' => $row['daftar_menu']
                ];
            }
        }
        return $cookies;
    }

    // Method untuk input data cookies
    public function inputCookies($data){
        $kodeMenu = $data['kode_menu'];
        $daftarMenu = $data['daftar_menu'];
        $query = "INSERT INTO tb_cookies (kode_menu, daftar_menu) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        if(!$stmt) return false;
        $stmt->bind_param("ss", $kodeMenu, $daftarMenu);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Method untuk mendapatkan data cookies berdasarkan id
    public function getUpdateCookies($kode){
        $query = "SELECT * FROM tb_cookies WHERE kode_menu = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt) return false;
        $stmt->bind_param("s", $kode);
        $stmt->execute();
        $result = $stmt->get_result();
        $cookies = null;
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $cookies = [
                'kode_menu' => $row['kode_menu'],
                'daftar_menu' => $row['daftar_menu']
            ];
        }
        $stmt->close();
        return $cookies;
    }

    // Method untuk mengedit data cookies
    public function updateCookies($data){
        $kodeMenu = $data['kode_menu'];
        $daftarMenu = $data['daftar_menu'];
        $query = "UPDATE tb_cookies SET daftar_menu = ? WHERE kode_menu = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt) return false;
        $stmt->bind_param("ss", $daftarMenu, $kodeMenu);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Method untuk menghapus data cookies
    public function deleteCookies($kode){
        $query = "DELETE FROM tb_cookies WHERE kode_menu = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt) return false;
        $stmt->bind_param("s", $kode);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // DAFTAR PELANGGAN//
    // Method untuk mendapatkan daftar pelanggan
    public function getPelanggan(){
    $query = "SELECT id_pelanggan, nm_pelanggan, alamat, email, telp, tgl_daftar 
              FROM tb_pelanggan
              ORDER BY id_pelanggan DESC";

    $result = $this->conn->query($query);
    $data = [];

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    return $data;
}

    // Method untuk input data pelanggan
    public function inputPelanggan($data){
    $nama = $data['nm_pelanggan'];
    $alamat = $data['alamat'];
    $email = $data['email'];
    $telp = $data['telp'];
    $tgl = $data['tgl_daftar'];

    $query = "INSERT INTO tb_pelanggan (nm_pelanggan, alamat, email, telp, tgl_daftar) 
              VALUES (?, ?, ?, ?, ?)";

    $stmt = $this->conn->prepare($query);
    if(!$stmt) return false;

    $stmt->bind_param("sssss", $nama, $alamat, $email, $telp, $tgl);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}

    // Method untuk mendapatkan data pelanggan berdasarkan id
    public function getUpdatePelanggan($id){
        $query = "SELECT * FROM tb_pelanggan WHERE id_pelanggan = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt) return false;

        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $pelanggan = null;

        if($result->num_rows > 0){
            $pelanggan = $result->fetch_assoc();
        }

        $stmt->close();
        return $pelanggan;
    }


    // Method untuk mengedit data pelanggan
    public function updatePelanggan($data){
        $id = $data['id_pelanggan'];
        $nama = $data['nm_pelanggan'];
        $alamat = $data['alamat'];
        $email = $data['email'];
        $telp = $data['telp'];
        $tgl = $data['tgl_daftar'];

        $query = "UPDATE tb_pelanggan 
                SET nm_pelanggan = ?, alamat = ?, email = ?, telp = ?, tgl_daftar = ?
                WHERE id_pelanggan = ?";

        $stmt = $this->conn->prepare($query);
        if(!$stmt) return false;

        $stmt->bind_param("sssssi", $nama, $alamat, $email, $telp, $tgl, $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Method untuk menghapus data pelanggan
    public function deletePelanggan($id){
        $query = "DELETE FROM tb_pelanggan WHERE id_pelanggan = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt) return false;
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
}

?>
