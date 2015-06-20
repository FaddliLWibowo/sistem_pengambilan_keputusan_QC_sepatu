-- Adminer 4.2.0 MySQL dump

SET NAMES utf8mb4;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `master_grade`;
CREATE TABLE `master_grade` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `master_grade` varchar(50) NOT NULL,
  `nilai_temuan` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `master_idt` (`master_grade`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `master_grade` (`id`, `master_grade`, `nilai_temuan`) VALUES
(4,	'baru',	0),
(5,	'bekas',	-4);

DROP TABLE IF EXISTS `master_idt`;
CREATE TABLE `master_idt` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `master_idt` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `master_idt` (`master_idt`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `master_idt` (`id`, `master_idt`) VALUES
(4,	'bagus'),
(5,	'bersih'),
(6,	'wangi'),
(7,	'kotor'),
(8,	'bau');

DROP TABLE IF EXISTS `standart_sepatu`;
CREATE TABLE `standart_sepatu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qualyt` varchar(10) NOT NULL,
  `ket` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `id_penyakit` smallint(6) DEFAULT NULL,
  `id_gejala` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_penyakit` (`id_penyakit`),
  KEY `id_gejala` (`id_gejala`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `transaksi` (`id`, `id_penyakit`, `id_gejala`) VALUES
(1,	1,	4),
(2,	1,	5),
(3,	1,	6),
(6,	4,	5),
(5,	4,	4),
(7,	4,	6),
(8,	5,	7),
(9,	5,	8);

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `level` varchar(10) NOT NULL,
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1,	'fahmi',	'123',	'admin'),
(3,	'Rina',	'123',	'admin'),
(4,	'ganteng',	'123',	'user');

-- 2015-06-20 02:07:15
