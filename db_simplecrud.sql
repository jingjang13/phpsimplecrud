-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             12.10.0.7000
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_simplecrud
CREATE DATABASE IF NOT EXISTS `db_cookiesjoy` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `db_cookiesjoy`;

-- Dumping structure for table db_simplecrud.tb_mahasiswa
CREATE TABLE IF NOT EXISTS `tb_pelanggan` (
  `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `telp_pelanggan` char(12) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `nama_pelanggan` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `menu_cookies` char(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaksi` mediumint(3) NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_trx` date COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `status_mhs` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_simplecrud.tb_mahasiswa: ~0 rows (approximately)

-- Dumping structure for table db_simplecrud.tb_prodi
CREATE TABLE IF NOT EXISTS `tb_trx` (
  `id_trx` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pelanggan` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_trx` date COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_trx`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_simplecrud.tb_prodi: ~9 rows (approximately)
INSERT INTO `tb_menu` (`id_cookies`, `nm_cookies`) VALUES
	('1', 'Choco Chip Clasic'),
	('2', 'Red Velvet Cookies'),
	('3', 'Matcha Delight'),
	('4', 'Oatmeal Honey Cruach'),
	('5', 'Peanut Butter Bliss'),
	('6', 'Assorted Gift Bok (6 varian)'),

-- Dumping structure for table db_simplecrud.tb_provinsi
CREATE TABLE IF NOT EXISTS `tb_provinsi` (
  `id_provinsi` smallint(3) NOT NULL AUTO_INCREMENT,
  `nama_provinsi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_provinsi`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_simplecrud.tb_provinsi: ~6 rows (approximately)
INSERT INTO `tb_provinsi` (`id_provinsi`, `nama_provinsi`) VALUES
	(1, 'Bali'),
	(2, 'Nusa Tenggara Timur'),
	(3, 'Nusa Tenggara Barat'),
	(4, 'Jawa Timur'),
	(5, 'Jawa Tengah'),
	(6, 'Jawa Barat');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
