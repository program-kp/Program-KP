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
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_bidang` */

insert  into `tbl_bidang`(`id_bidang`,`nama_bidang`,`nama_kabid`,`status_user`) values 
(1,'Pertanian dan Perkebunan',NULL,'1'),
(27,'Penyuluhan',NULL,'1'),
(63,'123','436341','0'),
(65,'34242','2342342','0');

/*Table structure for table `tbl_disposisi` */

DROP TABLE IF EXISTS `tbl_disposisi`;

CREATE TABLE `tbl_disposisi` (
  `kode_disposisi` int(11) NOT NULL AUTO_INCREMENT,
  `no_surat` varchar(30) DEFAULT NULL,
  `tipe_surat` varchar(30) DEFAULT NULL,
  `keterangan` text,
  `tgl_disposisi` date DEFAULT NULL,
  PRIMARY KEY (`kode_disposisi`),
  KEY `Surat Undangan` (`no_surat`),
  CONSTRAINT `Surat Masuk` FOREIGN KEY (`no_surat`) REFERENCES `tbl_surat_masuk` (`no_surat`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Surat Undangan` FOREIGN KEY (`no_surat`) REFERENCES `tbl_surat_undangan` (`no_surat`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_disposisi` */

/*Table structure for table `tbl_surat_keluar` */

DROP TABLE IF EXISTS `tbl_surat_keluar`;

CREATE TABLE `tbl_surat_keluar` (
  `no_surat` varchar(30) NOT NULL,
  `no_urut` int(11) DEFAULT NULL,
  `tgl_surat` date DEFAULT NULL,
  `perihal` text,
  `tujuan_surat` text,
  `keterangan` text,
  `id_bidang` int(11) DEFAULT NULL COMMENT 'unit pengolah',
  PRIMARY KEY (`no_surat`),
  KEY `ID Bidang` (`id_bidang`),
  CONSTRAINT `ID Bidang` FOREIGN KEY (`id_bidang`) REFERENCES `tbl_bidang` (`id_bidang`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_surat_keluar` */

/*Table structure for table `tbl_surat_masuk` */

DROP TABLE IF EXISTS `tbl_surat_masuk`;

CREATE TABLE `tbl_surat_masuk` (
  `no_surat` varchar(30) NOT NULL,
  `no_urut` int(11) DEFAULT NULL,
  `asal_surat` int(11) DEFAULT NULL,
  `perihal` text,
  `tgl_terima` date DEFAULT NULL,
  PRIMARY KEY (`no_surat`),
  KEY `Asal Surat` (`asal_surat`),
  CONSTRAINT `Asal Surat` FOREIGN KEY (`asal_surat`) REFERENCES `tbl_bidang` (`id_bidang`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_surat_masuk` */

/*Table structure for table `tbl_surat_undangan` */

DROP TABLE IF EXISTS `tbl_surat_undangan`;

CREATE TABLE `tbl_surat_undangan` (
  `no_surat` varchar(30) NOT NULL,
  `no_urut` int(11) DEFAULT NULL,
  `tgl_terima` date DEFAULT NULL,
  `waktu_undangan` datetime DEFAULT NULL,
  `tempat_undangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`no_surat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_surat_undangan` */

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
('123','e4da3b7fbbce2345d7772b0674a318d5','5_e4da3b7fbbce2345d7772b0674a318d5','Bidang',27),
('admin_dkp3','5c286801d84ea4efd3d294c0d3688eb9','adm1ndkp3_5c286801d84ea4efd3d294c0d3688eb9','Admin',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
