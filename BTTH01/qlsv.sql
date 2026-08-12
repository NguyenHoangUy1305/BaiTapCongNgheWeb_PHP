-- Tạo cơ sở dữ liệu qlsv nếu chưa có và sử dụng nó
CREATE DATABASE IF NOT EXISTS `qlsv` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `qlsv`;

-- Tạo bảng lop
CREATE TABLE IF NOT EXISTS `lop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lop` varchar(10) DEFAULT NULL,
  `mota` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tạo bảng sinhvien
CREATE TABLE IF NOT EXISTS `sinhvien` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mssv` char(9) DEFAULT NULL,
  `hoten` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `lopid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sinhvien_lop_FK` (`lopid`),
  CONSTRAINT `sinhvien_lop_FK` FOREIGN KEY (`lopid`) REFERENCES `lop` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;