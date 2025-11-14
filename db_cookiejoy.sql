/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 8.0.30 : Database - db_cookiesjoy
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
USE `db_cookiesjoy`;

/*Table structure for table `tb_cookies` */

DROP TABLE IF EXISTS `tb_cookies`;

CREATE TABLE `tb_cookies` (
  `id_menu` int NOT NULL AUTO_INCREMENT,
  `kode_menu` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `daftar_menu` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tb_cookies` */

insert  into `tb_cookies`(`id_menu`,`kode_menu`,`daftar_menu`) values 
(2,'CK002','Red Velvet (25k)'),
(3,'CK003','Matcha Delight (28k)'),
(9,'CK001','Choco Chip Classic (25k)'),
(10,'CK004','Oatmeal Honey Cruanch (27k)'),
(11,'CK005','Peanut Butter Bliss (26k)'),
(12,'CK006','Assorted Gift Bok_6 varian (50k)');

/*Table structure for table `tb_pelanggan` */

DROP TABLE IF EXISTS `tb_pelanggan`;

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` int NOT NULL AUTO_INCREMENT,
  `nm_pelanggan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `alamat` text,
  `email` varchar(100) DEFAULT NULL,
  `telp` varchar(100) DEFAULT NULL,
  `tgl_daftar` date DEFAULT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tb_pelanggan` */

insert  into `tb_pelanggan`(`id_pelanggan`,`nm_pelanggan`,`alamat`,`email`,`telp`,`tgl_daftar`) values 
(10,'Paula Pessa',NULL,NULL,NULL,NULL);

/*Table structure for table `tb_pemesanan` */

DROP TABLE IF EXISTS `tb_pemesanan`;

CREATE TABLE `tb_pemesanan` (
  `id_pemesanan` int NOT NULL AUTO_INCREMENT,
  `nm_pelanggan` varchar(100) DEFAULT NULL,
  `alamat` text,
  `email` varchar(100) DEFAULT NULL,
  `telp` varchar(100) DEFAULT NULL,
  `daftar_menu` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `jumlah_pesanan` int DEFAULT NULL,
  `tgl_pengiriman` date DEFAULT NULL,
  PRIMARY KEY (`id_pemesanan`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tb_pemesanan` */

insert  into `tb_pemesanan`(`id_pemesanan`,`nm_pelanggan`,`alamat`,`email`,`telp`,`daftar_menu`,`jumlah_pesanan`,`tgl_pengiriman`) values 
(23,'rani maharani','Gg. Darmajaya','Olivamornapakung@gmail.com','081239524736','CK006',4,'2025-11-18'),
(24,'jeon jungkook','panjerr','Olivamornapakung@gmail.com','081239524736','CK001',7,'2025-11-10'),
(25,'yeonjun pacar morna','wae bo','Olivamornapakung@gmail.com','0812395453434','CK004',8,'2025-11-07'),
(26,'Paula Pessa','sudirman','mornapakung@gmail.com','77384o984989','CK006',3,'2025-11-12'),
(27,'Euphrasia Musing','KarotTadong','Olivamornapakung@gmail.com','8123952454855','CK004',8,'2025-11-18'),
(29,'Odilia Varda Pakung Ebong','Wae Bo','mornapakung@gmail.com','0812356767878','CK001',3,'2025-11-19'),
(30,'evan pakung','waebo','evancr@gmail.com','08258996432','CK006',1,'2025-11-15');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
