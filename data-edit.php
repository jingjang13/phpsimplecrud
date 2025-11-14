<?php 

include_once 'config/class-master.php';
include_once 'config/class-cookiejoy.php';
$master = new MasterData();
$cookiejoy = new Cookiejoy();

// Mengambil daftar cookies dan pelanggan
$cookiesList = $master->getCookies();
$pelangganList = $master->getPelanggan();

// Mengambil data cookiesjoy yang akan diedit berdasarkan id dari parameter GET
$dataCookiejoy = $cookiejoy->getUpdateCookiesjoy($_GET['id']);
if(isset($_GET['status'])){
    if($_GET['status'] == 'failed'){
        echo "<script>alert('Gagal mengubah data cookiesjoy. Silakan coba lagi.');</script>";
    }
}

?>


<!doctype html>
<html lang="en">
	<head>
		<?php include 'template/header.php'; ?>
	</head>

	<body class="layout-fixed fixed-header fixed-footer sidebar-expand-lg sidebar-open bg-body-tertiary">

		<div class="app-wrapper">

			<?php include 'template/navbar.php'; ?>

			<?php include 'template/sidebar.php'; ?>

			<main class="app-main">

				<div class="app-content-header">
					<div class="container-fluid">
						<div class="row">
							<div class="col-sm-6">
								<h3 class="mb-0">Edit Pemesanan</h3>
							</div>
							<div class="col-sm-6">
								<ol class="breadcrumb float-sm-end">
									<li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
									<li class="breadcrumb-item active" aria-current="page">Edit Pesanan</li>
								</ol>
							</div>
						</div>
					</div>
				</div>

				<div class="app-content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Formulir Pemesanan</h3>
										<div class="card-tools">
											<button type="button" class="btn btn-tool" data-lte-toggle="card-collapse" title="Collapse">
												<i data-lte-icon="expand" class="bi bi-plus-lg"></i>
												<i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
											</button>
											<button type="button" class="btn btn-tool" data-lte-toggle="card-remove" title="Remove">
												<i class="bi bi-x-lg"></i>
											</button>
										</div>
									</div>
                                    <form action="proses/proses-edit.php" method="POST">
									    <div class="card-body">
                                            <input type="hidden" name="id_pemesanan" value="<?php echo $dataCookiejoy['id_pemesanan']; ?>">
                                           <div class="mb-3">
                                                <label for="nm_pelanggan" class="form-label">Nama Lengkap</label>
                                                <input type="text" class="form-control" id="id_pelanggan" name="nm_pelanggan" placeholder="Masukkan Nama Lengkap pelanggan" value="<?php echo $dataCookiejoy['nm_pelanggan']; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="alamat" class="form-label">Alamat</label>
                                                <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan Alamat Lengkap Sesuai KTP" required><?php echo $dataCookiejoy['alamat']; ?></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email Valid dan Benar" value="<?php echo $dataCookiejoy['email']; ?>" required>
                                            </div>
                                                    
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="telp" class="form-label">Nomor Telepon</label>
                                                <input type="telp" class="form-control" id="telp" name="telp" placeholder="Masukkan Nomor Telpon/HP" value="<?php echo $dataCookiejoy['telp']; ?>" pattern="[0-9+\-\s()]{6,20}" required>
                                            </div>
                                            <div class="mb-3">
                                            <label for="cookies" class="form-label">Menu Cookies</label>
                                            <select class="form-select" id="cookies" name="daftar_menu"    required>
                                                    <option value="" selected disabled>Pilih Menu Cookies</option>
                                                    <?php
                                                    foreach ($cookiesList as $cookies) {
                                                        $selectedCookies = "";
                                                        if ($dataCookiejoy['daftar_menu'] == $cookies['kode_menu']) {
                                                            $selectedCookies = "selected";
                                                        }
                                                        echo '<option value="'.$cookies['kode_menu'].'" '.$selectedCookies.'>'.$cookies['daftar_menu'].'</option>';
                                                    }
                                                    ?>
                                            </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="jumlah" class="form-label">Jumlah Pesanan</label>
                                                <input type="number" class="form-control" id="jumlah_pesanan" name="jumlah_pesanan" placeholder="Masukkan jumlah pesanan" value="<?php echo $dataCookiejoy['jumlah_pesanan']; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="date" class="form-label">Tanggal Pengiriman</label>
                                                <input type="date" class="form-control" id="date" name="tgl_pengiriman" placeholder="Masukkan tanggal pengiriman" value="<?php echo $dataCookiejoy['tgl_pengiriman']; ?>" pattern="[0-9+\-\s()]{6,20}" required>
                                            </div>
                                            
                                                    
                                                </select>
                                            </div>
                                        </div>
									    <div class="card-footer">
                                            <button type="button" class="btn btn-danger me-2 float-start" onclick="window.location.href='data-list.php'">Batal</button>
                                            <button type="submit" class="btn btn-warning float-end">Update Data</button>
                                        </div>
                                    </form>
								</div>
							</div>
						</div>
					</div>
				</div>

			</main>

			<?php include 'template/footer.php'; ?>

		</div>
		
		<?php include 'template/script.php'; ?>

	</body>
</html>