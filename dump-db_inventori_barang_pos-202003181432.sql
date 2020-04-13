-- MySQL dump 10.16  Distrib 10.1.37-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: db_inventori_barang_pos
-- ------------------------------------------------------
-- Server version	10.1.37-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `barang`
--

DROP TABLE IF EXISTS `barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `barang` (
  `barang_id` int(11) NOT NULL AUTO_INCREMENT,
  `barang_kd` varchar(25) DEFAULT NULL,
  `barang_nm` varchar(50) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `active_st` enum('yes','no') NOT NULL DEFAULT 'yes',
  `satuan` varchar(100) DEFAULT NULL,
  `harga` varchar(15) DEFAULT NULL,
  `mdd` date DEFAULT NULL,
  UNIQUE KEY `barang_barang_id_IDX` (`barang_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barang`
--

LOCK TABLES `barang` WRITE;
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `com_group`
--

DROP TABLE IF EXISTS `com_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `com_group` (
  `group_id` varchar(2) NOT NULL,
  `group_name` varchar(50) DEFAULT NULL,
  `group_desc` varchar(100) DEFAULT NULL,
  `mdb` varchar(10) DEFAULT NULL,
  `mdb_name` varchar(40) DEFAULT NULL,
  `mdd` datetime DEFAULT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `com_group`
--

LOCK TABLES `com_group` WRITE;
/*!40000 ALTER TABLE `com_group` DISABLE KEYS */;
INSERT INTO `com_group` VALUES ('1','Developer web','Group developer website','1911130001',NULL,'2019-11-22 09:44:11'),('2','Operator','Admin Operator','1911130001',NULL,'2019-11-22 09:47:26'),('3','Kasir','Kasir Pengelola','1911130001','admin','2020-03-10 08:24:44');
/*!40000 ALTER TABLE `com_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `com_menu`
--

DROP TABLE IF EXISTS `com_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `com_menu` (
  `nav_id` int(11) NOT NULL,
  `parent_id` varchar(10) DEFAULT NULL,
  `nav_title` varchar(50) DEFAULT NULL,
  `nav_desc` varchar(100) DEFAULT NULL,
  `nav_url` varchar(100) DEFAULT NULL,
  `nav_no` int(11) unsigned DEFAULT NULL,
  `client_st` enum('1','0') DEFAULT '0',
  `active_st` enum('1','0') DEFAULT '1',
  `display_st` enum('1','0') DEFAULT '1',
  `nav_icon` varchar(50) DEFAULT NULL,
  `mdb` varchar(10) DEFAULT NULL,
  `mdb_name` varchar(50) DEFAULT NULL,
  `mdd` datetime DEFAULT NULL,
  PRIMARY KEY (`nav_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `com_menu`
--

LOCK TABLES `com_menu` WRITE;
/*!40000 ALTER TABLE `com_menu` DISABLE KEYS */;
INSERT INTO `com_menu` VALUES (2,'0','Master Data','','#',20,'0','1','1','ti-harddrives','1911130001','admin','2019-11-22 04:05:43'),(3,'2','User','menu user','master/user',1,'0','1','1','','1911130001','admin','2019-11-22 04:06:47'),(4,'0','Sistem','','#',21,'0','1','1','ti-settings','1911130001','admin','2019-11-22 04:06:08'),(5,'4','Menu Navigasi','navigasi','sistem/navigation',1,'0','1','1',NULL,'1911130001','admin','2019-11-21 17:30:53'),(6,'4','Role','master role','sistem/role',3,'0','1','1',NULL,'1911130001','admin','2019-11-21 17:31:23'),(7,'4','Group','group role','sistem/group',2,'0','1','1','','1911130001','admin','2019-11-27 02:30:36'),(8,'0','Logout','logout','sistem/login/logout',100,'0','1','1','ti-close','1911130001','admin','2019-11-22 04:06:36'),(9,'0','Lihat Beranda','Link to beranda','client/beranda',99,'0','0','0','ti-home','2002070001','superuser','2020-03-10 08:12:47'),(10,'0','Dashboard','','#',1,'0','1','1','ti-home','1911130001','admin','2019-11-22 04:54:22'),(11,'10','Dashboard','dashboard content','welcome',1,'0','1','1','','1911130001','admin','2019-11-22 04:58:30'),(12,'4','Hak Akses','Hak akses user','sistem/permission',4,'0','1','1','','1911130001','admin','2020-01-16 09:17:03'),(13,'0','Beranda','Untuk menu front client','client/beranda',1,'1','1','1','','1911130001','admin','2019-11-27 04:52:17'),(14,'0','Tentang','Untuk menu front client','client/about',2,'1','1','0','','1911130001','admin','2020-01-31 07:53:08'),(15,'0','Login','Login ke portal admin','welcome',3,'1','1','0','','1911130001','admin','2020-01-04 14:09:40'),(18,'16','Atur Kontak','Atur data kontak di halaman depan','setclient/contact',2,'0','0','0','','2002070001','superuser','2020-02-08 19:26:56'),(19,'2','Barang','data barang','master/barang',2,'0','1','1','ti-archive','2002070001','superuser','2020-03-10 08:17:24'),(20,'0','Atur','mengatur','#',4,'0','1','1','ti-hand-open','2002070001','superuser','2020-03-18 04:35:09'),(21,'20','Stok Barang','atur stok barang','atur/stok',1,'0','1','1','','2002070001','superuser','2020-03-10 08:21:36'),(22,'0','Kasir','proses pembelian','kasir/kasir',2,'0','1','1','ti-shopping-cart-full','2002070001','superuser','2020-03-10 08:23:56'),(23,'0','Laporan','Laporan','#',3,'0','1','1','ti-agenda','2002070001','superuser','2020-03-18 04:33:04'),(24,'23','Transaksi Pembelian','transaksi pembelian','laporan/pembelian',1,'0','1','1','','2002070001','superuser','2020-03-18 04:34:46');
/*!40000 ALTER TABLE `com_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `com_reset_pass`
--

DROP TABLE IF EXISTS `com_reset_pass`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `com_reset_pass` (
  `data_id` varchar(20) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nomor_telepon` varchar(50) DEFAULT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `request_date` datetime DEFAULT NULL,
  `request_st` enum('1','0','2') DEFAULT '0',
  `response_by` varchar(10) DEFAULT NULL,
  `response_date` datetime DEFAULT NULL,
  `response_notes` varchar(100) DEFAULT NULL,
  `request_expired` datetime DEFAULT NULL,
  `request_key` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`data_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `com_reset_pass`
--

LOCK TABLES `com_reset_pass` WRITE;
/*!40000 ALTER TABLE `com_reset_pass` DISABLE KEYS */;
/*!40000 ALTER TABLE `com_reset_pass` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `com_role`
--

DROP TABLE IF EXISTS `com_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `com_role` (
  `role_id` varchar(5) NOT NULL,
  `group_id` varchar(2) DEFAULT NULL,
  `role_nm` varchar(100) DEFAULT NULL,
  `role_desc` varchar(100) DEFAULT NULL,
  `mdb` varchar(50) DEFAULT NULL,
  `mdb_name` varchar(50) DEFAULT NULL,
  `mdd` datetime DEFAULT NULL,
  PRIMARY KEY (`role_id`),
  KEY `group_id` (`group_id`),
  CONSTRAINT `com_role_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `com_group` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `com_role`
--

LOCK TABLES `com_role` WRITE;
/*!40000 ALTER TABLE `com_role` DISABLE KEYS */;
INSERT INTO `com_role` VALUES ('1','1','Developer','Web developer','1911130001',NULL,'2019-11-22 09:45:00'),('2','2','Administrator','Admin Website','admin',NULL,'2019-11-13 07:49:08'),('3','3','Kasir','','1911130001','admin','2020-03-10 08:24:57');
/*!40000 ALTER TABLE `com_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `com_role_menu`
--

DROP TABLE IF EXISTS `com_role_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `com_role_menu` (
  `role_id` varchar(5) NOT NULL,
  `nav_id` varchar(10) NOT NULL,
  `role_tp` varchar(4) NOT NULL DEFAULT '1111',
  PRIMARY KEY (`nav_id`,`role_id`),
  KEY `role_id` (`role_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `com_role_menu`
--

LOCK TABLES `com_role_menu` WRITE;
/*!40000 ALTER TABLE `com_role_menu` DISABLE KEYS */;
INSERT INTO `com_role_menu` VALUES ('1','10','1111'),('2','10','1111'),('3','10','1111'),('1','11','1111'),('2','11','1111'),('3','11','1111'),('1','12','1111'),('1','16','1111'),('2','16','1111'),('1','17','1111'),('2','17','1111'),('1','18','1111'),('2','18','1111'),('1','19','1111'),('2','19','1111'),('1','2','1111'),('2','2','1111'),('1','20','1111'),('2','20','1111'),('1','21','1111'),('2','21','1111'),('1','22','1111'),('2','22','1111'),('3','22','1111'),('1','23','1111'),('2','23','1111'),('3','23','1111'),('1','24','1111'),('2','24','1111'),('3','24','1111'),('1','25','1111'),('2','25','1111'),('1','26','1111'),('2','26','1111'),('1','3','1111'),('2','3','1111'),('1','4','1111'),('1','5','1111'),('1','6','1111'),('1','7','1111'),('1','8','1111'),('2','8','1111'),('3','8','1111'),('1','9','1111'),('2','9','1111');
/*!40000 ALTER TABLE `com_role_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `com_role_user`
--

DROP TABLE IF EXISTS `com_role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `com_role_user` (
  `user_id` varchar(10) NOT NULL,
  `role_id` varchar(5) NOT NULL,
  `role_default` enum('1','2') DEFAULT '2',
  `role_display` enum('1','0') DEFAULT '1',
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `com_role_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `com_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `com_role_user_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `com_role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `com_role_user`
--

LOCK TABLES `com_role_user` WRITE;
/*!40000 ALTER TABLE `com_role_user` DISABLE KEYS */;
INSERT INTO `com_role_user` VALUES ('2002070001','1','2','1'),('2002070002','2','2','1'),('2003100001','3','2','1');
/*!40000 ALTER TABLE `com_role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `com_user`
--

DROP TABLE IF EXISTS `com_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `com_user` (
  `user_id` varchar(10) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_pass` varchar(255) DEFAULT NULL,
  `user_key` varchar(50) DEFAULT NULL,
  `user_mail` varchar(50) DEFAULT NULL,
  `default_page` varchar(100) DEFAULT NULL,
  `user_st` enum('1','0','2') DEFAULT NULL,
  `examiner_number` varchar(50) DEFAULT NULL COMMENT 'Medex - Nomor Penunjukan Penguji',
  `mdb` varchar(10) DEFAULT NULL,
  `mdb_name` varchar(50) DEFAULT NULL,
  `mdd` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `com_user`
--

LOCK TABLES `com_user` WRITE;
/*!40000 ALTER TABLE `com_user` DISABLE KEYS */;
INSERT INTO `com_user` VALUES ('2002070001','superuser','9hzMDkEFzxITeab+PtkYMAQyCEh4AtWDwhwtoeMtzlzn8Ld7tMlSK/KOYXwNyzhwiAZxjKn8pVuRfFYEurTZnQ==','4181705925','founder@artdev.id','welcome','1',NULL,'1911130001','admin','2020-03-18 08:24:14'),('2002070002','admineproposal','YFLYU3uvVYDVlKueW9w3KIoMa2TLLAkXCLRKY7EevjzBkZj1wB+eRW9ZfJZ1+U49X/mwCuavMjoqa8CHoEJ8dg==','2421872952','operator@gmail.com','welcome','1',NULL,'2002070001','superuser','2020-03-18 08:30:10'),('2003100001','kasir','bk4u+DZa39yzU8Z0I5mIEhOv6paEfKtF+VrIHsiEfJwZFvtD8YEviw29rQfiLJMzs63Hru5R/tpTNf1nhv4v8Q==','2047995966','kasir_utama@gmail.com','welcome','1',NULL,'2002070001','superuser','2020-03-18 08:28:08');
/*!40000 ALTER TABLE `com_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `com_user_login`
--

DROP TABLE IF EXISTS `com_user_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `com_user_login` (
  `user_id` varchar(10) NOT NULL,
  `login_date` datetime NOT NULL,
  `logout_date` datetime DEFAULT NULL,
  `ip_address` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`user_id`,`login_date`),
  CONSTRAINT `com_user_login_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `com_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `com_user_login`
--

LOCK TABLES `com_user_login` WRITE;
/*!40000 ALTER TABLE `com_user_login` DISABLE KEYS */;
/*!40000 ALTER TABLE `com_user_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `com_user_super`
--

DROP TABLE IF EXISTS `com_user_super`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `com_user_super` (
  `user_id` varchar(10) NOT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `com_user_super_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `com_user` (`user_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `com_user_super`
--

LOCK TABLES `com_user_super` WRITE;
/*!40000 ALTER TABLE `com_user_super` DISABLE KEYS */;
INSERT INTO `com_user_super` VALUES ('2002070001');
/*!40000 ALTER TABLE `com_user_super` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_transaksi`
--

DROP TABLE IF EXISTS `detail_transaksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_transaksi` (
  `detail_transaksi_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaksi_id` int(11) DEFAULT NULL,
  `barang_id` varchar(25) DEFAULT NULL,
  `jumlah` varchar(100) DEFAULT NULL,
  `subtotal` varchar(100) DEFAULT NULL,
  `mdb` varchar(25) DEFAULT NULL,
  `pembayaran_st` enum('process','done') DEFAULT 'process',
  UNIQUE KEY `detail_transaksi_detail_transaksi_id_IDX` (`detail_transaksi_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_transaksi`
--

LOCK TABLES `detail_transaksi` WRITE;
/*!40000 ALTER TABLE `detail_transaksi` DISABLE KEYS */;
INSERT INTO `detail_transaksi` VALUES (73,5,'2','10','5000','2002070001','done');
/*!40000 ALTER TABLE `detail_transaksi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kontak`
--

DROP TABLE IF EXISTS `kontak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kontak` (
  `telephone` varchar(25) DEFAULT NULL,
  `no_whatsapp` varchar(25) DEFAULT NULL,
  `fanpage_fb` varchar(50) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kontak`
--

LOCK TABLES `kontak` WRITE;
/*!40000 ALTER TABLE `kontak` DISABLE KEYS */;
INSERT INTO `kontak` VALUES ('082126641201','082126641201','lathiif aji santhosho','ajisanthoshol@gmail.com','karangsong');
/*!40000 ALTER TABLE `kontak` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaksi` (
  `transaksi_id` int(11) NOT NULL AUTO_INCREMENT,
  `total` varchar(100) DEFAULT NULL,
  `mdb` varchar(10) DEFAULT NULL,
  `mdd` datetime DEFAULT NULL,
  `mdb_name` varchar(100) DEFAULT NULL,
  UNIQUE KEY `transaksi_transaksi_id_IDX_2` (`transaksi_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaksi`
--

LOCK TABLES `transaksi` WRITE;
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` char(10) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `kabupaten` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `alamat` text,
  `hp` varchar(25) DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jns_kelamin` enum('L','P') DEFAULT NULL,
  `agama` varchar(30) DEFAULT NULL,
  `nik` char(16) DEFAULT NULL,
  `kode_pos` varchar(25) DEFAULT NULL,
  `nama_bank` varchar(30) DEFAULT NULL,
  `norek` varchar(30) DEFAULT NULL,
  `ahli_waris` varchar(50) DEFAULT NULL,
  `hubungan` varchar(30) DEFAULT NULL,
  `no_ahli_waris` varchar(25) DEFAULT NULL,
  `hu` varchar(30) DEFAULT NULL,
  `sponsor` varchar(30) DEFAULT NULL,
  `user_img` text,
  `status_anggota` enum('aktif','nonaktif') DEFAULT 'nonaktif',
  `mdd_anggota` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `com_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('2002070001','Superuser',NULL,NULL,NULL,'indramayu',NULL,NULL,NULL,'L',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'nonaktif',NULL),('2002070002','Admin',NULL,NULL,NULL,'indarmayu',NULL,NULL,NULL,'L',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'nonaktif',NULL),('2003100001','Kasir utama',NULL,NULL,NULL,'indramayu',NULL,NULL,NULL,'L',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'nonaktif',NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'db_inventori_barang_pos'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-03-18 14:32:05
