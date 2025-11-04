<?php 

// Memasukkan file konfigurasi database
include_once 'db-config.php';

class Mahasiswa extends Database {

    // Method untuk input data mahasiswa
    public function inputMahasiswa($data){
        // Mengambil data dari parameter $data
        $nmPelanggan      = $data['nm_pelanggan'];
        $alamat     = $data['alamat'];
        $email    = $data['email'];
        $telp   = $data['telp'];
        $mnPemesanan = $data['mn_pemesanan'];
        $jumlahPesanan    = $data['jumlah_pesanan'];
        $tglPengiriman     = $data['tgl_pengiriman'];
        // Menyiapkan query SQL untuk insert data menggunakan prepared statement
        $query = "INSERT INTO tb_pemesanan (nm_pelanggan, alamat, email, telp, mn_pemesanan, jumlah_pesanan, tgl_pengiriman) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        // Mengecek apakah statement berhasil disiapkan
        if(!$stmt){
            return false;
        }
        // Memasukkan parameter ke statement
        $stmt->bind_param("sssssss", $nmPelanggan, $alamat, $email, $telp, $mnPemesanan, $jumlahPesanan, $tglPengiriman);
        $result = $stmt->execute();
        $stmt->close();
        // Mengembalikan hasil eksekusi query
        return $result;
    }

    // Method untuk mengambil semua data mahasiswa
    public function getAllMahasiswa(){
        // Menyiapkan query SQL untuk mengambil data mahasiswa beserta prodi dan provinsi
        $query = "SELECT id_pemesanan, nm_pelanggan, alamat, email, telp, mn_pemesanan, jumlah_pesanan, tgl_pengiriman 
                  FROM tb_pemesanan
                  JOIN tb_cookies ON cookies = id_menu
                  JOIN tb_pelanggan ON pelanggan = id_pelanggan";
        $result = $this->conn->query($query);
        // Menyiapkan array kosong untuk menyimpan data mahasiswa
        $mahasiswa = [];
        // Mengecek apakah ada data yang ditemukan
        if($result->num_rows > 0){
            // Mengambil setiap baris data dan memasukkannya ke dalam array
            while($row = $result->fetch_assoc()) {
                $mahasiswa[] = [
                    'id' => $row['id_pelanggan'],
                    'nama' => $row['nm_pelanggan'],
                    'alamat' => $row['alamat'],
                    'email' => $row['email'],
                    'telp' => $row['telp'],
                    'menu' => $row['mn_pemesanan'],
                    'jumlah' => $row['jumlah_pesanan'],
                    'tanggal' => $row['tgl_pengiriman']
                ];
            }
        }
        // Mengembalikan array data mahasiswa
        return $mahasiswa;
    }

    // Method untuk mengambil data mahasiswa berdasarkan ID
    public function getUpdateMahasiswa($id){
        // Menyiapkan query SQL untuk mengambil data mahasiswa berdasarkan ID menggunakan prepared statement
        $query = "SELECT * FROM tb_pemesanan WHERE id_pemesanan = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = false;
        if($result->num_rows > 0){
            // Mengambil data mahasiswa  
            $row = $result->fetch_assoc();
            // Menyimpan data dalam array
            $data = [
                'id' => $row['id_pelanggan'],
                'nama' => $row['nm_pelanggan'],
                'alamat' => $row['alamat'],
                'email' => $row['email'],
                'telp' => $row['telp'],
                'menu' => $row['mn_pemesanan'],
                'jumlah' => $row['jumlah_pesanan'],
                'tanggal' => $row['tgl_pengiriman']
            ];
        }
        $stmt->close();
        // Mengembalikan data mahasiswa
        return $data;
    }

    // Method untuk mengedit data mahasiswa
    public function editMahasiswa($data){
        // Mengambil data dari parameter $data
        $nmPelanggan      = $data['nm_pelanggan'];
        $alamat     = $data['alamat'];
        $email    = $data['email'];
        $telp   = $data['telp'];
        $mnPemesanan = $data['mn_pemesanan'];
        $jumlahPesanan    = $data['jumlah_pesanan'];
        $tglPengiriman     = $data['tgl_pengiriman'];
        // Menyiapkan query SQL untuk update data menggunakan prepared statement
        $query = "UPDATE tb_pelanggan SET nm_pelanggan = ?, alamat = ?, email = ?, telp = ?, mn_pemesanan = ?, _jumlah_pesanan = ?, tgl_pengiriman = ? WHERE id_pemesanan = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        // Memasukkan parameter ke statement
        $stmt->bind_param("sssssssi", $nmPelanggan, $alamat, $email, $telp, $mnPemesanan, $jumlahPesanan, $tglPengiriman, $id);
        $result = $stmt->execute();
        $stmt->close();
        // Mengembalikan hasil eksekusi query
        return $result;
    }

    // Method untuk menghapus data mahasiswa
    public function deleteMahasiswa($id){
        // Menyiapkan query SQL untuk delete data menggunakan prepared statement
        $query = "DELETE FROM tb_pemesanan WHERE id_pemesanan = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $stmt->close();
        // Mengembalikan hasil eksekusi query
        return $result;
    }

    // Method untuk mencari data mahasiswa berdasarkan kata kunci
    public function searchMahasiswa($kataKunci){
        // Menyiapkan LIKE query untuk pencarian
        $likeQuery = "%".$kataKunci."%";
        // Menyiapkan query SQL untuk pencarian data mahasiswa menggunakan prepared statement
        $query = "SELECT id_pemesanan, nm_pelanggan, alamat, email, telp, mn_pemesanan, jumlah_pesanan, tgl_pengiriman 
                  FROM tb_pemesanan
                  JOIN tb_cookies ON cookies = id_menu
                  JOIN tb_pelanggan ON pelanggan = id_pelanggan
                  WHERE nm_pelanggan LIKE ? OR alamat LIKE ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            // Mengembalikan array kosong jika statement gagal disiapkan
            return [];
        }
        // Memasukkan parameter ke statement
        $stmt->bind_param("ss", $likeQuery, $likeQuery);
        $stmt->execute();
        $result = $stmt->get_result();
        // Menyiapkan array kosong untuk menyimpan data mahasiswa
        $mahasiswa = [];
        if($result->num_rows > 0){
            // Mengambil setiap baris data dan memasukkannya ke dalam array
            while($row = $result->fetch_assoc()) {
                // Menyimpan data mahasiswa dalam array
                $mahasiswa[] = [
                'id' => $row['id_pelanggan'],
                'nama' => $row['nm_pelanggan'],
                'alamat' => $row['alamat'],
                'email' => $row['email'],
                'telp' => $row['telp'],
                'menu' => $row['mn_pemesanan'],
                'jumlah' => $row['jumlah_pesanan'],
                'tanggal' => $row['tgl_pengiriman']
                ];
            }
        }
        $stmt->close();
        // Mengembalikan array data mahasiswa yang ditemukan
        return $mahasiswa;
    }

}

?>