-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2021 at 02:53 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_matkinh`
--
DROP DATABASE IF EXISTS `shop_matkinh`;
CREATE DATABASE IF NOT EXISTS `shop_matkinh` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `shop_matkinh`;

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `active` bit default 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `brand` (`id`, `title`,`slug`,`description`,`active`) VALUES
(1, 'Gucci', 'GUC', 'Gu chìiiiiiiiiiiiiii', 1),
(2, 'Dior', 'DIO', 'Đì ooooô', 1),
(3, 'Rayban', 'RAY', 'Rây bennnnnnnnnnnn', 1),
(4, 'Gentle Monster', 'GMT', 'gien tồ môn sờ tơ', 1),
(5, 'Louis Vuitton', 'LVT', 'luôn vui tươi', 1),
(6, 'Prada', 'PRA', 'pơ ra đa', 1),
(7, 'Lacoste', 'LAC', 'lác kotex', 1),
(8, 'Cartier', 'CAR', 'cả ti ơ', 1);


-- --------------------------------------------------------
CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `active` bit default 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `category` VALUES
(1, 'Kính mát', 'che luôn mặt trời', 1),
(2, 'Kính cận', 'dành cho mấy thằng nguy hiểm', 1),
(3, 'Kính thời trang', 'thích ra dẻ, sở khanh giả danh tri thức', 1),
(4, 'Kính áp tròng', 'đeo như không đeo', 1),
(5, 'Kính thể thao', 'đeo kính đá banh, đéo hiểu', 1),
(6, 'Gọng kính', 'mua mẹ nó nguyên cái kính đi', 1),
(7, 'Tròng kính', 'm ẩu nên mới mua tròng mới chứ gì', 1);
--
-- Table structure for table `diachi`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) not null,
  `active` bit default 1,
  `hinhanh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `diachi`
-- insert kinhs gucci + dior
INSERT INTO product VALUES (1, 'Kính mát Gucci GG0653S 001 55', 'Kính mát Gucci GG0653S 001 55', 1, 1, 1, 'GG0653S_001_55.jpg');
INSERT INTO product VALUES (2, 'Gọng kính Ray-Ban New Clubmaster RX7216F-2000(53)', 'Gọng kính Ray-Ban New Clubmaster RX7216F-2000(53)', 6, 1, 1, 'rayban-rx7216f-2000-53x160x120.jpg');
INSERT INTO product VALUES (3, 'Tròng kính Gucci', 'Tròng kính Gucci', 7, 1, 1, 'trongkinhguc001.jpg');
INSERT INTO product VALUES (4, 'Kính thể thao Gucci GC2601', 'Kính thể thao Gucci GC2601', 5, 1, 1, 'gucci_tt_001.jpg');
INSERT INTO product VALUES (5, 'GUCCI Cận Round Mens Eyeglasses', 'GUCCI Cận Round Mens Eyeglasses', 2, 1, 1, 'gucci-demo-round-mens-eyeglasses-gg0590ok001-52.jpg');
INSERT INTO product VALUES (6, 'GUCCI Mát Square Mens Sunglasses', 'GUCCI Mát Square Mens Sunglasses', 1, 1, 1, 'gucci-grey-square-mens-sunglasses-gg0562sk-001-53.jpg');
INSERT INTO product VALUES (7, 'Gucci Cầu lông', 'Gu lòng củ chi', 5, 1, 1, 'gucci-thethao.jpg');

INSERT INTO product VALUES (8, 'Kính Mát Dior Ladies Sunglasses DIORULTIME1 0AVB 57-17 Màu Vàng', 'Kính Mát Dior Ladies Sunglasses DIORULTIME1 0AVB 57-17 Màu Vàng', 1, 2, 1, 'kinh-mat-dior-ladies-sunglasses-diorultime1-0avb-57-17-mau-vang-635f9971e5484-31102022164625.jpg');
INSERT INTO product VALUES (9, 'Kính Mát Dior Oblique Pilot Sunglasses CD Link A1U F0B8 Màu Xanh Bạc', 'Kính Mát Dior Oblique Pilot Sunglasses CD Link A1U F0B8 Màu Xanh Bạc', 1, 2, 1, 'kinh-mat-dior-oblique-pilot-sunglasses-cd-link-a1u-f0b8-mau-xanh-bac-631ed328926b5-12092022133520.jpg');
INSERT INTO product VALUES (10, 'Kính Thời trang Dior Blue Mask Sunglasses With Silver Mirrored Dior Oblique MotifDior Motion M1I F0B8 Màu Xanh', 'Kính Mát Dior Blue Mask Sunglasses With Silver Mirrored Dior Oblique MotifDior Motion M1I F0B8 Màu Xanh', 3, 2, 1, 'kinh-mat-dior-blue-mask-sunglasses-with-silver-mirrored-dior-oblique-motifdior-motion-m1i-f0b8-mau-xanh-62ce8c2092b97-13072022161056.jpg');
INSERT INTO product VALUES (11, 'Kính Thời trang Dior So Stellaire 1 807VC Màu Hồng Gọng Đen', 'Kính Thời trang Dior So Stellaire 1 807VC Màu Hồng Gọng Đen', 3, 2, 1, 'kinh-mat-dior-so-stellaire-1-807vc-mau-hong-gong-den-6309a12a9e1cd-27082022114426.jpg');
INSERT INTO product VALUES (12, 'Kính Mắt Cận Eyeglasses Dior Stellaire 5 Gold DIORSTELLAIRE05 2M2 54-17 Medium', 'Kính Mắt Cận Eyeglasses Dior Stellaire 5 Gold DIORSTELLAIRE05 2M2 54-17 Medium', 2, 2, 1, 'kinh-mat-can-eyeglasses-dior-stellaire-5-gold-diorstellaire05-2m2-54-17-medium-6020fc4b4b4d2-08022021155435.jpg');
INSERT INTO product VALUES (13, 'Kính Mắt Dior Clan 2 DDB/1I Polarized', 'Kính Mắt Dior Clan 2 DDB/1I Polarized', 5, 2, 1, 'ki-nh-ma-t-dior-clan-2-ddb-1i-polarized-612f66e7dca3b-01092021184127.jpg');
-- insert rayben + Gentle Monster

-- insert Luis vuiton + prada

-- insert lacoste + cartier
-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `variation` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int NOT NULL,
  `sale_price` int NOT NULL,
  `inventory` int NOT NULL,
  `active` bit default 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donhang`
--

-- INSERT INTO `donhang` (`id`, `nguoidung_id`, `diachi_id`, `ngay`, `tongtien`, `ghichu`) VALUES
-- (1, 4, 1, '2020-10-23 13:38:40', 1320000, NULL),
-- (2, 5, 2, '2020-10-24 15:13:10', 3920000, NULL),
-- (3, 8, 4, '2021-03-13 16:38:57', 6035000, NULL),
-- (4, 9, 5, '2021-03-13 16:53:28', 6035000, NULL),
-- (5, 10, 6, '2021-03-13 16:55:44', 7800000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `donhangct`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donhangct`
-- --

-- INSERT INTO `donhangct` (`id`, `donhang_id`, `mathang_id`, `dongia`, `soluong`, `thanhtien`) VALUES
-- (1, 1, 1, 1320000, 1, 1320000),
-- (2, 2, 3, 2130000, 1, 2130000),
-- (3, 2, 7, 1790000, 1, 1790000),
-- (4, 4, 9, 1775000, 1, 1775000),
-- (5, 4, 4, 2130000, 2, 4260000),
-- (6, 5, 7, 1790000, 1, 1790000),
-- (7, 5, 5, 2050000, 1, 2050000),
-- (8, 5, 1, 1320000, 3, 3960000);

-- --------------------------------------------------------

--
-- Table structure for table `mathang`
--

CREATE TABLE `cart_item` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int not null, 
  `is_paid` bit default 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mathang`
--

-- INSERT INTO `mathang` (`id`, `tenmathang`, `mota`, `giagoc`, `giaban`, `soluongton`, `hinhanh`, `danhmuc_id`, `luotxem`, `luotmua`) VALUES
-- (1, 'Giày đá bóng Adidas Ace 15.2 CG đen xanh B27128', NULL, 0, 1320000, 10, 'images/a1.jpg', 1, 3, 0),
-- (2, 'Giày đá bóng Nike Magistax finale TF vàng - 844446 708', NULL, 0, 2020000, 10, 'images/n1.jpg', 3, 9, 0),
-- (3, 'Giày đá bóng Adidas X 16.3 TF bạc - S79575', NULL, 0, 2130000, 10, 'images/a2.jpg', 1, 9, 0),
-- (4, 'Giày đá bóng Adidas X 16.3 TF đỏ - S79576', NULL, 0, 2130000, 10, 'images/a3.jpg', 1, 7, 0),
-- (5, 'Giày đá bóng Nike Hypervenomx Pro TF đen trắng - 749904 013', NULL, 0, 2050000, 10, 'images/n2.jpg', 3, 4, 0),
-- (6, 'Giày đá bóng Nike Magistax Onda II TF vàng - 844417 708', NULL, 0, 1850000, 10, 'images/n3.jpg', 3, 4, 0),
-- (7, 'Giày thể thao Puma Ignite Sock W.T 361391_03', NULL, 0, 1790000, 10, 'images/p1.jpg', 2, 2, 0),
-- (8, 'Giày thể thao nam Puma Smash Suede V2 364989-08', NULL, 0, 1590000, 10, 'images/p2.jpg', 2, 1, 0),
-- (9, 'Giày nữ Nike Air Relentless 4 MSL hồng - 685152-601', NULL, 0, 1775000, 10, 'images/n4.jpg', 3, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(15) ,
  `address` varchar(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) not null,
  `item_id` int(11) not null,
  `shipping_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_description` varchar(255) COLLATE utf8_unicode_ci,
  `order_total` int(11) not null,
  `is_completed` bit default 0
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nguoidung`
--

-- INSERT INTO `nguoidung` (`id`, `email`, `sodienthoai`, `matkhau`, `hoten`, `loai`, `trangthai`, `hinhanh`) VALUES
-- (1, 'abc@abc.com', '0988994683', '900150983cd24fb0d6963f7d28e17f72', 'Quản trị ABC', 1, 1, NULL),
-- (2, 'def@abc.com', '0988994684', '900150983cd24fb0d6963f7d28e17f72', 'Nhân viên DEF', 2, 1, NULL),
-- (3, 'ghi@abc.com', '0988994685', '900150983cd24fb0d6963f7d28e17f72', 'Nhân viên GHI', 2, 1, NULL),
-- (4, 'kh1@gmail.com', '0988994686', '900150983cd24fb0d6963f7d28e17f72', 'Nguyễn Thị Thu An', 3, 1, NULL),
-- (5, 'kh2@gmail.com', '0988994687', '900150983cd24fb0d6963f7d28e17f72', 'Hồ Xuân Minh', 3, 1, NULL),
-- (6, 'aaa@abc.com', '1234567890', 'e807f1fcf82d132f9bb018ca6738a19f', 'AAA', 3, 1, NULL),
-- (7, 'bbb@abc.com', '1234567891', '0f7e44a922df352c05c5f73cb40ba115', 'BBB', 3, 1, NULL),
-- (8, 'ccc@abc.com', '1234567892', 'd893377c9d852e09874125b10a0e4f66', 'CCC', 3, 1, NULL),
-- (9, 'ddd@abc.com', '1234567893', '43042f668f07adfd174cb1823d4795e1', 'DDD', 3, 1, NULL),
-- (10, 'eee@abc.com', '1234567894', 'f66f4446648ae7ae56419eca43bf2b8a', 'EEE', 3, 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);
--
-- Indexes for table `danhmuc`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);
--
-- Indexes for table `donhang`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `donhangct`
--
ALTER TABLE `variation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `mathang`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `item_id` (`item_id`);


ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `item_id` (`item_id`);
  
  
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `diachi`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `variation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `donhangct`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mathang`
--
ALTER TABLE `cart_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `nguoidung`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
  
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `diachi`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `donhang`
--
ALTER TABLE `variation`
  ADD CONSTRAINT `variation_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `donhangct`
--
ALTER TABLE `cart_item`
  ADD CONSTRAINT `cart_item_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_item_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `variation` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `mathang`
--
ALTER TABLE `order`
	ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `cart_item` (`id`) ON UPDATE CASCADE,
	ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE;
COMMIT;


INSERT INTO user VALUES ('admin', MD5('123'), 'admin@gmail.com', '0956626169', 'long xuyen, an giang', 'avatar');
