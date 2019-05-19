/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.1.29-MariaDB : Database - dkp3_surat
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dkp3_surat` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dkp3_surat`;

/*Table structure for table `tbl_bidang` */

DROP TABLE IF EXISTS `tbl_bidang`;

CREATE TABLE `tbl_bidang` (
  `id_bidang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bidang` varchar(30) DEFAULT NULL,
  `nama_kabid` varchar(100) DEFAULT NULL,
  `status_user` char(1) DEFAULT '0',
  PRIMARY KEY (`id_bidang`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_bidang` */

insert  into `tbl_bidang`(`id_bidang`,`nama_bidang`,`nama_kabid`,`status_user`) values 
(1,'Perikanan','M. Aminudin Said, STP., MM','1'),
(27,'Ketahanan Pangan','Ir. H. Nefo Djumantoro','1'),
(65,'Pertanian dan Perkebunan','Muhlan, SP., MM','0'),
(66,'Kepala Dinas','Siti Hamdah, SP., MT','0'),
(67,'Peternakan','Ir. Madya Irawan Madu, MM','0'),
(68,'Penyuluhan','Ir. Azidin Noor, M.AP','0');

/*Table structure for table `tbl_disposisi` */

DROP TABLE IF EXISTS `tbl_disposisi`;

CREATE TABLE `tbl_disposisi` (
  `kode_disposisi` int(11) NOT NULL AUTO_INCREMENT,
  `no_urut_surat` int(11) DEFAULT NULL,
  `no_urut_undangan` int(11) DEFAULT NULL,
  `tipe_surat` varchar(30) DEFAULT NULL,
  `tujuan_surat` int(11) DEFAULT NULL,
  `tgl_disposisi` date DEFAULT NULL,
  PRIMARY KEY (`kode_disposisi`),
  KEY `Bidang` (`tujuan_surat`),
  KEY `Surat` (`no_urut_surat`),
  KEY `Undangan` (`no_urut_undangan`),
  CONSTRAINT `Bidang` FOREIGN KEY (`tujuan_surat`) REFERENCES `tbl_bidang` (`id_bidang`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Surat` FOREIGN KEY (`no_urut_surat`) REFERENCES `tbl_surat_masuk` (`no_urut`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Undangan` FOREIGN KEY (`no_urut_undangan`) REFERENCES `tbl_surat_undangan` (`no_urut`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_disposisi` */

insert  into `tbl_disposisi`(`kode_disposisi`,`no_urut_surat`,`no_urut_undangan`,`tipe_surat`,`tujuan_surat`,`tgl_disposisi`) values 
(64,11,NULL,'Surat Masuk',65,'2019-05-17'),
(66,2432,NULL,'Surat Masuk',65,'2019-05-17'),
(67,2432,NULL,'Surat Masuk',27,'2019-05-17'),
(68,2432,NULL,'Surat Masuk',1,'2019-05-17'),
(70,NULL,67,'Undangan',1,'2019-05-16'),
(71,NULL,67,'Undangan',27,'2019-05-23'),
(74,NULL,4,'Undangan',65,'2019-05-15'),
(75,NULL,4,'Undangan',66,'2019-05-15'),
(76,NULL,4,'Undangan',27,'2019-05-15'),
(78,NULL,1,'Undangan',66,'2019-05-18');

/*Table structure for table `tbl_surat_keluar` */

DROP TABLE IF EXISTS `tbl_surat_keluar`;

CREATE TABLE `tbl_surat_keluar` (
  `no_urut` int(11) DEFAULT NULL,
  `no_surat` varchar(30) NOT NULL,
  `tgl_surat` date DEFAULT NULL,
  `tgl_terima` date DEFAULT NULL,
  `perihal` text,
  `tujuan_surat` text,
  `keterangan` text,
  `unit_pengolah` int(11) DEFAULT NULL COMMENT 'unit pengolah',
  `tahun` int(11) DEFAULT NULL,
  PRIMARY KEY (`no_surat`),
  KEY `ID Bidang` (`unit_pengolah`),
  CONSTRAINT `ID Bidang` FOREIGN KEY (`unit_pengolah`) REFERENCES `tbl_bidang` (`id_bidang`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_surat_keluar` */

insert  into `tbl_surat_keluar`(`no_urut`,`no_surat`,`tgl_surat`,`tgl_terima`,`perihal`,`tujuan_surat`,`keterangan`,`unit_pengolah`,`tahun`) values 
(12,'200/012-PP/DKP3/2019','2019-05-18','2019-05-19','12 vhngiaue hgikduhzjgiuaer uiewhft iuWEHR NCiuweh iLWE\nEU FT098weutn oWJFD ur984uwT VAOEWJFSLJR 0','12W9UT','ewrvqw345tq3456eqr12',1,NULL),
(21312,'213123','2019-05-17','2019-05-19','12312','3123','12312',66,NULL),
(213,'21321','2019-05-17','2019-05-18','12321','3123','1231',68,NULL);

/*Table structure for table `tbl_surat_masuk` */

DROP TABLE IF EXISTS `tbl_surat_masuk`;

CREATE TABLE `tbl_surat_masuk` (
  `no_urut` int(11) NOT NULL,
  `no_surat` varchar(30) DEFAULT NULL,
  `asal_surat` varchar(50) DEFAULT NULL,
  `perihal` text,
  `tgl_surat` date DEFAULT NULL,
  `tgl_terima` date DEFAULT NULL,
  PRIMARY KEY (`no_urut`),
  KEY `Asal Surat` (`asal_surat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_surat_masuk` */

insert  into `tbl_surat_masuk`(`no_urut`,`no_surat`,`asal_surat`,`perihal`,`tgl_surat`,`tgl_terima`) values 
(11,'800/011-PP/DKP3/2019','Dinas Mantul','Perihal Perihal Perihal Perihal Perihal Perihal',NULL,'2019-05-19'),
(123,'123','1231231','12321312312',NULL,'2019-05-18'),
(1234,'12312','12312','231213123',NULL,'2019-05-17'),
(2432,'eqwe','qweqw','eqweq',NULL,'2019-05-18'),
(12313,'1231231','213123','123123','2019-05-19','2019-05-19'),
(123333,'12344','21312','31231',NULL,'2019-05-18');

/*Table structure for table `tbl_surat_undangan` */

DROP TABLE IF EXISTS `tbl_surat_undangan`;

CREATE TABLE `tbl_surat_undangan` (
  `no_urut` int(11) NOT NULL,
  `no_surat` varchar(30) DEFAULT NULL,
  `tgl_terima` date DEFAULT NULL,
  `tgl_surat` date DEFAULT NULL,
  `asal_surat` varchar(100) DEFAULT NULL,
  `waktu_undangan` datetime DEFAULT NULL,
  `tempat_undangan` varchar(100) DEFAULT NULL,
  `uraian` text,
  PRIMARY KEY (`no_urut`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_surat_undangan` */

insert  into `tbl_surat_undangan`(`no_urut`,`no_surat`,`tgl_terima`,`tgl_surat`,`asal_surat`,`waktu_undangan`,`tempat_undangan`,`uraian`) values 
(1,'3123123','2019-05-18',NULL,NULL,'2019-05-18 14:23:00','QWERTY','Rapat pulang'),
(4,'2131231','2019-05-18',NULL,NULL,'2019-05-19 14:23:00','1231','Rapat Tarus'),
(67,'800/067-PP/DKP3/2019','2019-05-17','2019-05-19','1111111','2019-05-21 14:24:00','3242342','Rapat Anu'),
(12345,'12','2019-05-19','2019-05-19','12','2019-05-19 08:00:00','12','12');

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(300) DEFAULT NULL,
  `tpass_user` varchar(300) DEFAULT NULL,
  `role` enum('Super','Admin','Bidang') DEFAULT NULL,
  `id_bidang` int(11) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`username`,`password`,`tpass_user`,`role`,`id_bidang`) values 
('1','c4ca4238a0b923820dcc509a6f75849b','1_c4ca4238a0b923820dcc509a6f75849b','Admin',NULL),
('12','c20ad4d76fe97759aa27a0c99bff6710','12_c20ad4d76fe97759aa27a0c99bff6710','Bidang',1),
('123','202cb962ac59075b964b07152d234b70','123_202cb962ac59075b964b07152d234b70','Bidang',27),
('admin_dkp3','5c286801d84ea4efd3d294c0d3688eb9','adm1ndkp3_5c286801d84ea4efd3d294c0d3688eb9','Admin',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
