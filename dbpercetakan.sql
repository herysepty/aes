# Host: localhost  (Version: 5.6.20)
# Date: 2015-08-08 19:47:29
# Generator: MySQL-Front 5.2  (Build 5.66)

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE */;
/*!40101 SET SQL_MODE='NO_ENGINE_SUBSTITUTION' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES */;
/*!40103 SET SQL_NOTES='ON' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

DROP DATABASE IF EXISTS `dbpercetakan`;
CREATE DATABASE `dbpercetakan` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dbpercetakan`;

#
# Source for table "tb_encrypt"
#

DROP TABLE IF EXISTS `tb_encrypt`;
CREATE TABLE `tb_encrypt` (
  `id_encrypt` int(5) NOT NULL AUTO_INCREMENT,
  `nm_file` varchar(50) DEFAULT NULL,
  `file_dir` varchar(100) DEFAULT NULL,
  `password` varchar(16) DEFAULT NULL,
  `keterangan` text,
  `tanggal` date DEFAULT NULL,
  `id_user` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_encrypt`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

#
# Data for table "tb_encrypt"
#

INSERT INTO `tb_encrypt` VALUES (69,'TEBteefront#1.pse','files/herysepty/encrypted/TEBteefront#1.pse','12345','','2015-08-04','herysepty'),(70,'BAB I update.doce','files/admin/encrypted/BAB I update.doce','12345','','2015-08-04','admin'),(71,'Gambar 1.jpe','files/admin/encrypted/Gambar 1.jpe','12345','','2015-08-04','admin'),(72,'pw2_pertemuan01.pde','files/admin/encrypted/pw2_pertemuan01.pde','12345','Pemograman Web','2015-08-04','admin'),(73,'Baju Pria PAnjang.cde','files/admin/encrypted/Baju Pria PAnjang.cde','12345678','','2015-08-06','admin'),(74,'BAB V.doce','files/herys/encrypted/BAB V.doce','12345678','Word','2015-08-06','herys'),(75,'Shirt.pse','files/herys/encrypted/Shirt.pse','12345678','Shirt','2015-08-06','herys'),(76,'BAB II Update.doce','files/herys/encrypted/BAB II Update.doce','12345678','BAB II','2015-08-06','herys'),(77,'BAB I update.doce','files/herys/encrypted/BAB I update.doce','12345678','','2015-08-06','herys');

#
# Source for table "tb_log"
#

DROP TABLE IF EXISTS `tb_log`;
CREATE TABLE `tb_log` (
  `id_log` int(5) NOT NULL AUTO_INCREMENT,
  `nm_file` varchar(25) DEFAULT NULL,
  `jenis` varchar(7) DEFAULT NULL,
  `type_file` varchar(8) DEFAULT NULL,
  `size_file` varchar(10) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `password` varchar(16) DEFAULT NULL,
  `username` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB AUTO_INCREMENT=178 DEFAULT CHARSET=latin1;

#
# Data for table "tb_log"
#

INSERT INTO `tb_log` VALUES (138,'Gambar 1','Enkrip','jpe','272986','2015-08-04','12345678','admin'),(139,'Gambar 2','Enkrip','jpe','296821','2015-08-04','12345','admin'),(140,'Gambar 3','Enkrip','jpe','1110448','2015-08-04','12345678','admin'),(174,'BAB V','Deskrip','docx','19309','2015-08-06','12345','herys'),(175,'Shirt','Enkrip','pse','5370199','2015-08-06','12345678','herys'),(176,'BAB II Update','Enkrip','doce','684743','2015-08-06','12345','herys'),(177,'BAB I update','Enkrip','doce','32365','2015-08-06','12345678','herys');

#
# Source for table "user"
#

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` varchar(5) NOT NULL DEFAULT '',
  `nm_lengkap` varchar(25) DEFAULT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "user"
#

INSERT INTO `user` VALUES ('U0001','Hery Septyadi','admin','12345'),('U0002','Yanuarius','yanuar','12345'),('U0003','Fredi Purwanto','fredi','12345'),('U0004','Hery Septyadi','herys','12345');

/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
