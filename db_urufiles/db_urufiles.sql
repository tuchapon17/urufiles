# Host: 127.0.0.1  (Version: 5.0.51b-community-nt-log)
# Date: 2014-04-24 22:44:17
# Generator: MySQL-Front 5.3  (Build 4.120)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "tb_files"
#

DROP TABLE IF EXISTS `tb_files`;
CREATE TABLE `tb_files` (
  `files_id` int(11) NOT NULL auto_increment,
  `files_name` varchar(255) NOT NULL,
  PRIMARY KEY  (`files_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "tb_files"
#


#
# Structure for table "tb_sex"
#

DROP TABLE IF EXISTS `tb_sex`;
CREATE TABLE `tb_sex` (
  `sex_id` varchar(1) NOT NULL,
  `sex_name` varchar(15) NOT NULL,
  PRIMARY KEY  (`sex_id`),
  UNIQUE KEY `sex_name_UNIQUE` (`sex_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "tb_sex"
#

INSERT INTO `tb_sex` VALUES ('1','ชาย'),('2','หญิง'),('3','อื่นๆ');

#
# Structure for table "tb_user"
#

DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `user_username` varchar(15) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_email` varchar(128) NOT NULL,
  `user_firstname` varchar(30) NOT NULL,
  `user_lastname` varchar(30) NOT NULL,
  `user_phone` varchar(10) NOT NULL,
  `user_register_on` datetime NOT NULL,
  `tb_sex_id` varchar(1) NOT NULL,
  `user_status` varchar(1) NOT NULL default '0',
  `user_office` varchar(50) NOT NULL,
  `user_address` text NOT NULL,
  PRIMARY KEY  (`user_username`),
  UNIQUE KEY `user_username_UNIQUE` (`user_username`),
  KEY `fk_tb_user_tb_sex1_idx` (`tb_sex_id`),
  CONSTRAINT `fk_tb_user_tb_sex1` FOREIGN KEY (`tb_sex_id`) REFERENCES `tb_sex` (`sex_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "tb_user"
#

INSERT INTO `tb_user` VALUES ('admin','0a7aa8c8e3e17c502ad00cb2d18c8278','e_za_17@hotmail.com','ผู้ดูแล','เว็บไซต์','0881515680','2014-04-24 22:41:21','1','2','มรอ.','อุตรดิตถ์');
