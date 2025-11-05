<?php
include_once 'db-config.php';

class Cookiejoy extends Database {

    // === INPUT DATA COOKIE JOY === //
    public function inputCookiejoy($data) {
        $nmPelanggan   = $data['nm_pelanggan'];
        $alamat        = $data['alamat'];
        $email         = $data['email'];
        $telp          = $data['telp'];
        $mnPemesanan   = $data['daftar_menu'];
        $jumlahPesanan = $data['jumlah_pesanan'];
        $tglPengiriman = $data['tgl_pengiriman'];

        $query = "INSERT INTO tb_pemesanan 
                  (nm_pelanggan, alamat, email, telp, daftar_menu, jumlah_pesanan, tgl_pengiriman)
                  VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        if (!$stmt) return false;

        $stmt->bind_param("sssssis", $nmPelanggan, $alamat, $email, $telp, $mnPemesanan, $jumlahPesanan, $tglPengiriman);
        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }

    // Method untuk mengambil semua data cookiejoy
    public function getAllCookiejoy(){
        // Menyiapkan query SQL untuk mengambil data cookiejoy beserta cookies dan pelanggan
        $query = "SELECT 
              id_pemesanan,
              nm_pelanggan,
              alamat,
              email,
              telp,
              daftar_menu,
              jumlah_pesanan,
              tgl_pengiriman
          FROM tb_pemesanan
          ORDER BY id_pemesanan DESC";

        $result = $this->conn->query($query);

        $data = [];

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    // === GET DATA BY ID === //
    public function getUpdatecookiesjoy($id) {
        $query = "SELECT * FROM tb_pemesanan WHERE id_pemesanan = ?";
        $stmt = $this->conn->prepare($query);
        if (!$stmt) return false;

        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        $data = null;
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $data = [
                'id_pemesanan'   => $row['id_pemesanan'],
                'nm_pelanggan'   => $row['nm_pelanggan'],
                'alamat'         => $row['alamat'],
                'email'          => $row['email'],
                'telp'           => $row['telp'],
                'daftar_menu'   => $row['daftar_menu'],
                'jumlah_pesanan' => $row['jumlah_pesanan'],
                'tgl_pengiriman' => $row['tgl_pengiriman']
            ];
        }
        $stmt->close();
        return $data;
    }

    // === UPDATE DATA === //
    public function editCookiejoy($data) {
        $id             = $data['id_pemesanan'];
        $nmPelanggan    = $data['nm_pelanggan'];
        $alamat         = $data['alamat'];
        $email          = $data['email'];
        $telp           = $data['telp'];
        $mnPemesanan    = $data['daftar_menu'];
        $jumlahPesanan  = $data['jumlah_pesanan'];
        $tglPengiriman  = $data['tgl_pengiriman'];

        $query = "UPDATE tb_pemesanan 
                  SET id_pemesanan = ,nm_pelanggan = ?, alamat = ?, email = ?, telp = ?, daftar_menu = ?, jumlah_pesanan = ?, tgl_pengiriman = ?
                  WHERE id_pemesanan = ?";
        $stmt = $this->conn->prepare($query);
        if (!$stmt) return false;

        $stmt->bind_param("sssssisi", $nmPelanggan, $alamat, $email, $telp, $mnPemesanan, $jumlahPesanan, $tglPengiriman, $id);
        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }

    // === DELETE DATA === //
    public function deleteCookiejoy($id) {
        $query = "DELETE FROM tb_pemesanan WHERE id_pemesanan = ?";
        $stmt = $this->conn->prepare($query);
        if (!$stmt) return false;

        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }

    // === SEARCH DATA === //
    public function searchCookiejoy($kataKunci) {
        $likeQuery = "%".$kataKunci."%";
        $query = "SELECT id_pemesanan, nm_pelanggan, alamat, email, telp, daftar_menu, jumlah_pesanan, tgl_pengiriman
                  FROM tb_pemesanan
                  WHERE nm_pelanggan LIKE ? OR alamat LIKE ?";
        $stmt = $this->conn->prepare($query);
        if (!$stmt) return [];

        $stmt->bind_param("ss", $likeQuery, $likeQuery);
        $stmt->execute();
        $result = $stmt->get_result();

        $cookiejoy = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $cookiejoy[] = $row;
            }
        }
        $stmt->close();
        return $cookiejoy;
    }
}
?>
