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
        $query = "SELECT * FROM tb_pelanggan";
        $result = $this->conn->query($query);
        $pelanggan = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $pelanggan[] = [
                    'id_pelanggan' => $row['id_pelanggan'],
                    'nm_pelanggan' => $row['nm_pelanggan']
                ];
            }
        }
        return $pelanggan;
    }
    // Method untuk input data pelanggan
    public function inputPelanggan($data){
        $namaPelanggan = $data['nm_pelanggan'];
        $query = "INSERT INTO tb_pelanggan (nm_pelanggan) VALUES (?)";
        $stmt = $this->conn->prepare($query);
        if(!$stmt) return false;
        $stmt->bind_param("s", $namaPelanggan);
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
            $row = $result->fetch_assoc();
            $pelanggan = [
                'id_pelanggan' => $row['id_pelanggan'],
                'nm_pelanggan' => $row['nm_pelanggan']
            ];
        }
        $stmt->close();
        return $pelanggan;
    }

    // Method untuk mengedit data pelanggan
    public function updatePelanggan($data){
        $idPelanggan = $data['id_pelanggan'];
        $nmPelanggan = $data['nm_pelanggan'];
        $query = "UPDATE tb_pelanggan SET nm_pelanggan = ? WHERE id_pelanggan = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt) return false;
        $stmt->bind_param("si", $nmPelanggan, $idPelanggan);
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
