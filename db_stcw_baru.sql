-- MySQL dump 10.13  Distrib 8.0.20, for Linux (x86_64)
--
-- Host: 192.168.10.10    Database: db_stcw
-- ------------------------------------------------------
-- Server version	5.7.29-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin_stcw`
--

DROP TABLE IF EXISTS `admin_stcw`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_stcw` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_stcw`
--

LOCK TABLES `admin_stcw` WRITE;
/*!40000 ALTER TABLE `admin_stcw` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_stcw` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `anggota_stcw`
--

DROP TABLE IF EXISTS `anggota_stcw`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `anggota_stcw` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_anggota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tlpn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anggota_stcw`
--

LOCK TABLES `anggota_stcw` WRITE;
/*!40000 ALTER TABLE `anggota_stcw` DISABLE KEYS */;
INSERT INTO `anggota_stcw` VALUES (2,'yoga','Screenshot from 2020-05-08 14-24-08_1595496486.png','yoga1@gmail.com','04532452343242',1,'2020-07-23 09:28:06','2020-07-23 09:28:06',NULL);
/*!40000 ALTER TABLE `anggota_stcw` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `artikel_stcw`
--

DROP TABLE IF EXISTS `artikel_stcw`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `artikel_stcw` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_artikel` text COLLATE utf8mb4_unicode_ci,
  `penulis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artikel_stcw`
--

LOCK TABLES `artikel_stcw` WRITE;
/*!40000 ALTER TABLE `artikel_stcw` DISABLE KEYS */;
INSERT INTO `artikel_stcw` VALUES (5,'coba lagi','<p style=\"font-family: \'Noto Sans\', sans-serif; text-size-adjust: 100%; background: none 0px 0px repeat scroll #ffffff; border: 0px none; font-size: 16px; margin: 0px 0px 30px; outline: none 0px; padding: 0px; box-sizing: border-box; line-height: 1.8em; text-align: center;\">\"Bisa terjadi, karena milih orang yang ngurus Jakarta dengan APBD di atas</p>\r\n<p style=\"font-family: \'Noto Sans\', sans-serif; text-size-adjust: 100%; background: none 0px 0px repeat scroll #ffffff; border: 0px none; font-size: 16px; margin: 0px 0px 30px; outline: none 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; box-sizing: border-box; line-height: 1.8em; text-align: center;\">Rp 80 triliun jadi enggak sesederhana yang orang bayangkan. Nanti kita salah milih orang,\" kata Taufik saat dihubungi, Kamis (25/7).</p>\r\n<p style=\"font-family: \'Noto Sans\', sans-serif; text-size-adjust: 100%; background: none 0px 0px repeat scroll #ffffff; border: 0px none; font-size: 16px; margin: 0px 0px 30px; outline: none 0px; padding: 0px; box-sizing: border-box; line-height: 1.8em;\">Taufik mengatakan, hingga kini belum ada jadwal jelas penyelanggaraan Rapimgab pembahasan tata tertib (tatib) pemilihan wagub. Dia menyebut sejumlah anggota pun masih sibuk dengan kunjungan kerja.</p>\r\n<p style=\"font-family: \'Noto Sans\', sans-serif; text-size-adjust: 100%; background: none 0px 0px repeat scroll #ffffff; border: 0px none; font-size: 16px; margin: 0px 0px 30px; outline: none 0px; padding: 0px; box-sizing: border-box; line-height: 1.8em;\">\"Iya semua kan kunker karena rapim harus dihadiri pimpinan fraksi dan setiap komisi, komisinya kunker gimana ? Sabar saja dulu,\" ucapnya.</p>\r\n<p style=\"font-family: \'Noto Sans\', sans-serif; text-size-adjust: 100%; background: none 0px 0px repeat scroll #ffffff; border: 0px none; font-size: 16px; margin: 0px 0px 30px; outline: none 0px; padding: 0px; box-sizing: border-box; line-height: 1.8em;\">Awalnya rapat paripurna pemilihan wakil gubernur DKI Jakarta direncanakan pada Senin, 22 Juli 2019. Akan tetapi pelaksanan Rapimgab pembahasan tatib wagub telah tertunda selama tiga kali.</p>\r\n<p style=\"font-family: \'Noto Sans\', sans-serif; text-size-adjust: 100%; background: none 0px 0px repeat scroll #ffffff; border: 0px none; font-size: 16px; margin: 0px 0px 30px; outline: none 0px; padding: 0px; box-sizing: border-box; line-height: 1.8em;\">Sebelumnya, harapan warga DKI Jakarta memiliki Wakil Gubernur (Wagub) dalam waktu dekat ini tampaknya belum bisa terwujud. Padahal dua nama kandidat pengganti Sandiaga Uno telah disetujui oleh partai pengusung.</p>\r\n<p style=\"font-family: \'Noto Sans\', sans-serif; text-size-adjust: 100%; background: none 0px 0px repeat scroll #ffffff; border: 0px none; font-size: 16px; margin: 0px 0px 30px; outline: none 0px; padding: 0px; box-sizing: border-box; line-height: 1.8em;\">Ketua Fraksi&nbsp;<strong style=\"text-size-adjust: 100%; background: none 0px 0px repeat scroll transparent; border: 0px none; margin: 0px; outline: none 0px; padding: 0px; box-sizing: border-box;\"><a style=\"font-family: arial; text-size-adjust: 100%; background: none 0px 0px repeat scroll transparent; border: 0px none; margin: 0px; outline: none medium; padding: 0px; box-sizing: border-box; color: #2b67a2; text-decoration-line: none;\" href=\"https://www.merdeka.com/partai-demokrasi-indonesia-perjuangan/\" target=\"_blank\" rel=\"noopener\">PDIP</a></strong>&nbsp;DPRD DKI, Gembong Warsono mengatakan, rapat paripurna untuk pemilihan Wagub DKI Jakarta belum bisa dilakukan dalam waktu dekat.</p>\r\n<p style=\"font-family: \'Noto Sans\', sans-serif; text-size-adjust: 100%; background: none 0px 0px repeat scroll #ffffff; border: 0px none; font-size: 16px; margin: 0px 0px 30px; outline: none 0px; padding: 0px; box-sizing: border-box; line-height: 1.8em;\">Sebab, rapat pimpinan gabungan (Rapimgab) untuk penentuan tata tertib (Tatib) saja belum juga jadi dilakukan. Sedangkan, rapat paripurna harus didahului dengan rapimgab.</p>\r\n<p style=\"font-family: \'Noto Sans\', sans-serif; text-size-adjust: 100%; background: none 0px 0px repeat scroll #ffffff; border: 0px none; font-size: 16px; margin: 0px 0px 30px; outline: none 0px; padding: 0px; box-sizing: border-box; line-height: 1.8em;\">\"Tahapan Rapimgab dilalui dulu, baru penjadwalan paripurna pengesahan tatib,\" tutur Gembong saat dihubungi, Jakarta, Rabu 17 Juli 2019.</p>','yoga','2019-07-25 08:21:55','2019-07-25 08:21:55',NULL),(6,'dasd','<blockquote>\r\n<p>dadasd</p>\r\n<p>dadasdas</p>\r\n<p>dadsasda</p>\r\n<div>dasdasd</div>\r\n<div>sdsdsdsd</div>\r\n<div>dsdsdsdsd</div>\r\n<div>sdsds</div>\r\n<div>dsdsd</div>\r\n<p>sasasasd</p>\r\n</blockquote>\r\n<div>dasddsasda</div>\r\n<div>dsasdasd</div>\r\n<div>asdasdad</div>\r\n<div>sdasdasd</div>\r\n<div>asdasdasd</div>\r\n<div>asdasdasddsada</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<div>dasdasdasdasdadsasd</div>\r\n<div>asdasdadsadasd</div>\r\n<div>&nbsp;</div>\r\n<div>dasdasdadad</div>','yoga','2019-07-25 08:26:21','2019-07-25 08:26:21',NULL),(7,'lomba layangan','<p>sdasdsafdafasda</p>','yoga','2019-07-27 11:52:07','2019-07-27 11:52:07',NULL),(8,'lomba layangan','<p>asdjahsdlkasldlasildaskdasjldkasd</p>','yoga','2019-08-01 11:20:51','2019-08-01 11:20:51',NULL);
/*!40000 ALTER TABLE `artikel_stcw` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `baju_stcw`
--

DROP TABLE IF EXISTS `baju_stcw`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `baju_stcw` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_baju` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desk_baju` text COLLATE utf8mb4_unicode_ci,
  `foto_baju` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_baju` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `baju_stcw`
--

LOCK TABLES `baju_stcw` WRITE;
/*!40000 ALTER TABLE `baju_stcw` DISABLE KEYS */;
INSERT INTO `baju_stcw` VALUES (1,'ogoh','<p>untuk pengerupukan</p>','Screenshot from 2020-05-08 14-24-08_1595496804.png',2000000,'2020-07-23 09:33:24','2020-07-23 09:33:24',NULL);
/*!40000 ALTER TABLE `baju_stcw` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bukti_pemasukan_stcw`
--

DROP TABLE IF EXISTS `bukti_pemasukan_stcw`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bukti_pemasukan_stcw` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_pemasukan` bigint(20) NOT NULL,
  `foto_bukti` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bukti_pemasukan_stcw`
--

LOCK TABLES `bukti_pemasukan_stcw` WRITE;
/*!40000 ALTER TABLE `bukti_pemasukan_stcw` DISABLE KEYS */;
INSERT INTO `bukti_pemasukan_stcw` VALUES (9,4,'Screenshot from 2020-05-08 14-28-25_1595511359.png','2020-07-23 13:35:59','2020-07-23 13:35:59',NULL),(10,3,'Screenshot from 2020-05-08 19-23-26_1595511385.png','2020-07-23 13:36:25','2020-07-23 13:36:25',NULL),(11,2,'Screenshot from 2020-05-08 19-26-56_1595511410.png','2020-07-23 13:36:50','2020-07-23 13:36:50',NULL),(12,1,'Screenshot from 2020-05-08 15-27-42_1595511433.png','2020-07-23 13:37:13','2020-07-23 13:37:13',NULL);
/*!40000 ALTER TABLE `bukti_pemasukan_stcw` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bukti_pengeluaran_stcw`
--

DROP TABLE IF EXISTS `bukti_pengeluaran_stcw`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bukti_pengeluaran_stcw` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_pengeluaran` bigint(20) NOT NULL,
  `foto_bukti` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bukti_pengeluaran_stcw`
--

LOCK TABLES `bukti_pengeluaran_stcw` WRITE;
/*!40000 ALTER TABLE `bukti_pengeluaran_stcw` DISABLE KEYS */;
INSERT INTO `bukti_pengeluaran_stcw` VALUES (4,1,'Screenshot from 2020-05-08 15-30-57_1595511889.png','2020-07-23 13:44:49','2020-07-23 13:44:49',NULL);
/*!40000 ALTER TABLE `bukti_pengeluaran_stcw` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_pengurus_stcw`
--

DROP TABLE IF EXISTS `detail_pengurus_stcw`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detail_pengurus_stcw` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_pengurus` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `mulai_menjabat` date NOT NULL,
  `akhir_menjabat` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_pengurus_stcw`
--

LOCK TABLES `detail_pengurus_stcw` WRITE;
/*!40000 ALTER TABLE `detail_pengurus_stcw` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_pengurus_stcw` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dokumentasi_stcw`
--

DROP TABLE IF EXISTS `dokumentasi_stcw`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dokumentasi_stcw` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `media` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_media` int(11) NOT NULL COMMENT '1=foto, 0=video',
  `doc_for` int(11) NOT NULL COMMENT '0=stcw, 1=matahati, 2=sekaagong',
  `uploaded` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dokumentasi_stcw`
--

LOCK TABLES `dokumentasi_stcw` WRITE;
/*!40000 ALTER TABLE `dokumentasi_stcw` DISABLE KEYS */;
INSERT INTO `dokumentasi_stcw` VALUES (1,'Screenshot from 2020-05-08 14-24-46_1595510785.png',1,0,'yoga','2020-07-23 13:26:25','2020-07-23 13:26:25',NULL),(2,'https://www.youtube.com/watch?v=Dny51RB2D_g&t=454s',0,0,'yoga','2020-07-23 13:26:43','2020-07-23 13:29:34',NULL);
/*!40000 ALTER TABLE `dokumentasi_stcw` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `image_artikel_stcw`
--

DROP TABLE IF EXISTS `image_artikel_stcw`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `image_artikel_stcw` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_artikel` bigint(20) NOT NULL,
  `foto_artikel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sumber_foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image_artikel_stcw`
--

LOCK TABLES `image_artikel_stcw` WRITE;
/*!40000 ALTER TABLE `image_artikel_stcw` DISABLE KEYS */;
INSERT INTO `image_artikel_stcw` VALUES (1,2,'S__11165705_1564041264.jpg','darisaya yoga','2019-07-25 07:54:24','2019-08-24 11:45:10',NULL),(2,3,'S__11165711_1564041463.jpg','darisaya','2019-07-25 07:57:43','2019-07-25 07:57:43',NULL),(3,4,'S__11165705_1564041700.jpg','darisaya yoga','2019-07-25 08:01:40','2019-08-02 11:50:18',NULL),(4,4,'S__11165706_1564041700.jpg','darisaya yoga','2019-07-25 08:01:40','2019-08-02 11:50:18',NULL),(5,4,'S__11165707_1564041700.jpg','darisaya yoga','2019-07-25 08:01:40','2019-08-02 11:50:18',NULL),(6,4,'S__11165708_1564041700.jpg','darisaya yoga','2019-07-25 08:01:40','2019-08-02 11:50:18',NULL),(15,7,'S__11165706_1564228327.jpg','darisaya','2019-07-27 11:52:07','2019-07-27 11:52:07',NULL),(17,9,'S__11165717_1565610370.jpg','ije kaden','2019-08-12 11:46:10','2019-09-12 08:45:50','2019-09-12 08:45:50'),(18,9,'S__11165718_1565610370.jpg','ije kaden','2019-08-12 11:46:10','2019-08-12 11:46:10',NULL),(20,9,'S__11165718_1565759263.jpg','ije kaden yoga','2019-08-14 05:07:43','2019-08-14 05:07:43',NULL),(21,9,'Untitled-1_1565759263.jpg','ije kaden yoga','2019-08-14 05:07:43','2019-08-14 05:07:43',NULL),(22,9,'S__11165716_1565759288.jpg','ije kaden','2019-08-14 05:08:08','2019-08-14 05:08:08',NULL);
/*!40000 ALTER TABLE `image_artikel_stcw` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kegiatan_stcw`
--

DROP TABLE IF EXISTS `kegiatan_stcw`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kegiatan_stcw` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_berakhir` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kegiatan_stcw`
--

LOCK TABLES `kegiatan_stcw` WRITE;
/*!40000 ALTER TABLE `kegiatan_stcw` DISABLE KEYS */;
INSERT INTO `kegiatan_stcw` VALUES (2,'pameran lukisan baru','2019-08-24','2019-08-31','2019-08-09 04:09:14','2019-08-09 04:15:52',NULL),(3,'lomba','2020-07-25','2020-07-25','2020-07-23 13:30:39','2020-07-23 13:35:07',NULL);
/*!40000 ALTER TABLE `kegiatan_stcw` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2019_07_09_062352_create_artikel_stcw',1),(2,'2019_07_09_062535_create_detail_artikel_stcw',1),(3,'2019_07_09_062842_create_image_artikel_stcw',1),(4,'2019_07_09_062947_create_admin_stcw',1),(5,'2019_07_09_063005_create_anggota_stcw',1),(6,'2019_07_09_063551_create_dokumen_stcw',1),(7,'2019_07_09_093315_create_pengurus_stcw',1),(8,'2019_07_09_093333_create_detail_pengurus_stcw',1),(9,'2019_07_09_093947_create_pengeluaran_stcw',1),(10,'2019_07_09_094003_create_detail_pengeluaran_stcw',1),(11,'2019_07_09_094031_create_pemasukan_stcw',1),(12,'2019_07_09_094045_create_detail_pemasukan_stcw',1),(13,'2019_07_09_094116_create_prestasi_stcw',1),(14,'2019_07_15_110110_create_pemesanan_stcw',1),(15,'2019_07_15_110217_create_daftar_pemesanan_stcw',1),(16,'2019_07_15_122702_create_bukti_pengeluaran_stcw',1),(17,'2019_07_15_131510_create_bukti_pemasukan_stcw',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pemasukan_stcw`
--

DROP TABLE IF EXISTS `pemasukan_stcw`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pemasukan_stcw` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_barang_jasa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sumber_dana` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pemasukan_stcw`
--

LOCK TABLES `pemasukan_stcw` WRITE;
/*!40000 ALTER TABLE `pemasukan_stcw` DISABLE KEYS */;
INSERT INTO `pemasukan_stcw` VALUES (1,'Uang','10000000','kelian','2019-08-09 13:18:43','2019-08-12 11:02:07',NULL),(2,'Uang batang','1000000','kelian','2019-08-14 12:09:09','2019-08-14 12:09:09',NULL),(3,'Uang batang','1000000','kelian','2019-08-14 12:09:25','2019-08-14 12:09:25',NULL),(4,'Uang','2313123123123','kelian','2019-08-14 12:40:47','2020-07-23 13:39:44',NULL);
/*!40000 ALTER TABLE `pemasukan_stcw` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pemesan_baju_stcw`
--

DROP TABLE IF EXISTS `pemesan_baju_stcw`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pemesan_baju_stcw` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_baju` bigint(20) NOT NULL,
  `nama_pemesan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukuran_baju` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_baju` tinyint(4) DEFAULT NULL,
  `gender_baju` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL COMMENT '0=belum_bayar, 1=bayar_DP 2=Lunas',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pemesan_baju_stcw`
--

LOCK TABLES `pemesan_baju_stcw` WRITE;
/*!40000 ALTER TABLE `pemesan_baju_stcw` DISABLE KEYS */;
INSERT INTO `pemesan_baju_stcw` VALUES (3,1,'angga','L',1,'Laki-laki',0,'2020-07-23 13:21:16','2020-07-23 13:22:15','2020-07-23 13:22:15');
/*!40000 ALTER TABLE `pemesan_baju_stcw` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengeluaran_stcw`
--

DROP TABLE IF EXISTS `pengeluaran_stcw`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pengeluaran_stcw` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_barang_jasa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keperluan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengeluaran_stcw`
--

LOCK TABLES `pengeluaran_stcw` WRITE;
/*!40000 ALTER TABLE `pengeluaran_stcw` DISABLE KEYS */;
INSERT INTO `pengeluaran_stcw` VALUES (1,'Uang batang','5000','ulang tahun stt','2019-08-15 14:22:13','2020-07-23 13:48:46',NULL);
/*!40000 ALTER TABLE `pengeluaran_stcw` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengurus_stcw`
--

DROP TABLE IF EXISTS `pengurus_stcw`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pengurus_stcw` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_kepengurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengurus_stcw`
--

LOCK TABLES `pengurus_stcw` WRITE;
/*!40000 ALTER TABLE `pengurus_stcw` DISABLE KEYS */;
INSERT INTO `pengurus_stcw` VALUES (1,'Ketua','2020-07-23 09:03:11','2020-07-23 09:03:11',NULL);
/*!40000 ALTER TABLE `pengurus_stcw` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prestasi_stcw`
--

DROP TABLE IF EXISTS `prestasi_stcw`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prestasi_stcw` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_prestasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `juara` tinyint(4) DEFAULT NULL COMMENT '1=juara_1, 2=juara_2, 3=juara_3, 4=juara_1_h, 5=juara_2_h, 6=juara_3_h',
  `tingkat_prestasi` tinyint(4) DEFAULT NULL COMMENT '0=desa, 1=kecamatan, 2=kabupaten, 3=provinsi, 4=nasional, 5=internasional',
  `isi_prestasi` text COLLATE utf8mb4_unicode_ci,
  `bukti_prestasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prestasi_stcw`
--

LOCK TABLES `prestasi_stcw` WRITE;
/*!40000 ALTER TABLE `prestasi_stcw` DISABLE KEYS */;
INSERT INTO `prestasi_stcw` VALUES (1,'asdasdasd',1,3,'bacottttt','bacotttt','2019-08-24 14:46:57','2020-07-23 14:05:26',NULL),(2,'lomba layangan',3,2,'<p>sdadasdasdasd</p>','3_1566658109.png','2019-08-24 14:48:29','2019-08-24 14:48:29',NULL);
/*!40000 ALTER TABLE `prestasi_stcw` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-08-02 21:40:41
