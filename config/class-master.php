<?php

// Memasukkan file konfigurasi database
include_once 'db-config.php';

class MasterData extends Database {

    // Method untuk mendapatkan daftar cookies
    public function getCookies(){
        $query = "SELECT * FROM tb_cookies";
        $result = $this->conn->query($query);
        $cookies = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $cookies[] = [
                    'id' => $row['id_menu'],
                    'nama' => $row['daftar_menu']
                ];
            }
        }
        return $cookies;
    }

    // Method untuk mendapatkan daftar pelanggan
    public function getPelanggan(){
        $query = "SELECT * FROM tb_pelanggan";
        $result = $this->conn->query($query);
        $pelanggan = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $pelanggan[] = [
                    'id' => $row['id_pelanggan'],
                    'nama' => $row['nm_pelanggan']
                ];
            }
        }
        return $pelanggan;
    }

    // Method untuk input data cookies
    public function inputCookies($data){
        $idCookies = $data['id'];
        $daftarCookies = $data['daftar'];
        $query = "INSERT INTO tb_cookies (id_menu, daftar_menu) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("ss", $idCookies, $daftarCookies);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Method untuk mendapatkan data cookies berdasarkan id
    public function getUpdateCookies($id){
        $query = "SELECT * FROM tb_cookies WHERE id_menu = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $cookies = null;
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $cookies = [
                'id' => $row['id_menu'],
                'daftar' => $row['daftar_menu']
            ];
        }
        $stmt->close();
        return $cookies;
    }

    // Method untuk mengedit data cookies
    public function updateProdi($data){
        $kodeProdi = $data['id'];
        $namaProdi = $data['daftar'];
        $query = "UPDATE tb_cookies SET daftar_menu = ? WHERE id_menu = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("ss", $namaProdi, $kodeProdi);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Method untuk menghapus data cookies
    public function deleteProdi($id){
        $query = "DELETE FROM tb_cookies WHERE id_menu = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("s", $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Method untuk input data pelanggan
    public function inputPelanggan($data){
        $namaPelanggan = $data['nama'];
        $query = "INSERT INTO tb_pelanggan (nm_pelanggan) VALUES (?)";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("s", $namaPelanggan);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Method untuk mendapatkan data pelanggan berdasarkan id
    public function getUpdatePelanggan($id){
        $query = "SELECT * FROM tb_pelanggan WHERE id_pelanggan = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $pelanggan = null;
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $pelanggan = [
                'id' => $row['id_pelanggan'],
                'nm' => $row['nm_pelanggan']
            ];
        }
        $stmt->close();
        return $pelanggan;
    }

    // Method untuk mengedit data pelanggan
    public function updatePelanggan($data){
        $idPelanggan = $data['id'];
        $nmPelanggan = $data['nama'];
        $query = "UPDATE tb_pelanggan SET nm_pelanggan = ? WHERE id_pelanggan = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("si", $nmPelanggan, $idPelanggan);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Method untuk menghapus data pelanggan
    public function deletePelanggan($id){
        $query = "DELETE FROM tb_pelanggan WHERE id_pelanggan = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
}

?>
