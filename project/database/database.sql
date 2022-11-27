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
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
INSERT INTO product VALUES (24, 'Kính Mát Louis Vuitton 1.1 Millionaires Sunglasses Z1166W', 'Kính Mát Louis Vuitton 1.1 Millionaires Sunglasses Z1166W', 1, 5, 1, 'Louis_Vuitton_1.1_Millionaires_Sunglasse_ Z1166W.jpg');
INSERT INTO product VALUES (25, 'Kính Mát Louis Vuitton Z1485E LV Waimea Sunglasses Màu Nâu', 'Kính Mát Louis Vuitton Z1485E LV Waimea Sunglasses Màu Nâu', 1, 5, 1, 'Louis _Vuitton _Z1485E _LV _Waimea Sunglasses _Màu _Nâu.jpg');
INSERT INTO product VALUES (26, 'Gọng Kính Louis Vuitton 01', 'Gọng Kính Louis Vuitton 01', 6, 5, 1, 'GỌNG _Kính _Louis _Vuitton _01.jpg');
INSERT INTO product VALUES (27, 'Kính Cận Louis Vuitton 1A16', 'Kính Cận Louis Vuitton 1A16', 2, 5, 1, 'kinh_can_louis_vuitton.jpg');
INSERT INTO product VALUES (28, 'Kính Thể Thao Louis Vuitton E0068', 'Kính Thể Thao Louis Vuitton E0068', 5, 5, 1, 'Louis _Vuitton _E0068.jpg');

INSERT INTO product VALUES (29, 'Kính Mát Prada PR 17WS Talc Màu Trắng', 'Kính Mát Prada PR 17WS Talc Màu Trắng', 1, 6, 1, 'Kinh_Prada_PR_17WS_Talc.jpg');
INSERT INTO product VALUES (30, 'Gọng kính PRADA 0PS06L DG01O1', 'Gọng kính PRADA 0PS06L DG01O1', 6, 6, 1, 'Gọng_kính_PRADA_0PS06L_DG01O1.jpg');
INSERT INTO product VALUES (31, 'Kính cận Prada 0PS 02SS', 'Kính cận Prada 0PS 02SS', 2, 6, 1, 'Kính_cận_Prada_0PS_02SS.jpg');
INSERT INTO product VALUES (32, 'Kính thể thao Prada SPR07XSF 5436S1', 'Kính thể thao Prada SPR07XSF 5436S1', 5, 6, 1, 'Prada_SPR07XSF_5436S1.jpg');
INSERT INTO product VALUES (33, 'Kính Mát Prada 0PR 01US', 'Kính Mát Prada 0PR 01US', 1, 6, 1, 'Prada_0PR_01US.jpg');


-- insert lacoste + cartier by tong
INSERT INTO product VALUES (50, 'Kính Mắt Lacoste L166SA 001', 'Kính Mắt Lacoste L166SA 001', 1, 6, 1, 'kinh-mat-lacoste-l166sa-001-1.jpg');
INSERT INTO product VALUES (51, 'Gọng Kính Lacoste L2726A-005', 'Gọng Kính Lacoste L2726A-005', 6, 6, 1, 'gong-can-lacoste-l2726a-005-1.jpg');
INSERT INTO product VALUES (52, 'Gọng Kính Lacoste L2203-033', 'Gọng Kính Lacoste L2203-033', 6, 6, 1, 'liensonoptic-gong-can-lacoste-l2203-033-1.jpg');
INSERT INTO product VALUES (53, 'Gọng Kính Lacoste L2760A-001', 'Gọng Kính Lacoste L2760A-001', 6, 6, 1, 'gong-can-lacoste-l2760a-001-1.jpg');
INSERT INTO product VALUES (54, 'Gọng Kính Lacoste L2755-214', 'Gọng Kính Lacoste L2755-214', 6, 6, 1, 'liensonoptic-gong-can-lacoste-l2755a-214-1.jpg');

INSERT INTO product VALUES (55, 'CARTIER SANTOS CT0034S 008', 'CARTIER SANTOS CT0034S 008', 1, 7, 1, 'kinh_mat_cartier_ct0034s-008.jpg');
INSERT INTO product VALUES (56, 'CARTIER ESW00094', 'CARTIER ESW00094', 1, 7, 1, 'cartier-esw00094-cartier-esw00094.png');
INSERT INTO product VALUES (57, 'CARTIER T8200812 CT0062S-001', 'CARTIER T8200812 CT0062S-001', 1, 7, 1, 'cartier-t8200812-cartier-t8200812.png');
INSERT INTO product VALUES (58, 'CARTIER EYE00074', 'CARTIER EYE00074', 2, 7, 1, 'cartier-eye00074-cartier-eye00074.png');
INSERT INTO product VALUES (59, 'CARTIER EYP00006-CT0070O', 'CARTIER EYP00006-CT0070O', 2, 7, 1, 'cartier-eyp00006-cartier-eyp00006-1.png');



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
INSERT INTO `variation`(`id`, `product_id`, `price`, `sale_price`, `inventory`, `active`) VALUES (1, 1, 3000000,3000000,200,1);
INSERT INTO `variation`(`id`, `product_id`, `price`, `sale_price`, `inventory`, `active`) VALUES (2, 2, 4000000,4000000,200,1);
INSERT INTO `variation`(`id`, `product_id`, `price`, `sale_price`, `inventory`, `active`) VALUES (3, 3, 5000000,5000000,200,1);
INSERT INTO `variation`(`id`, `product_id`, `price`, `sale_price`, `inventory`, `active`) VALUES (4, 4, 6000000,6000000,200,1);
INSERT INTO `variation`(`id`, `product_id`, `price`, `sale_price`, `inventory`, `active`) VALUES (5, 5, 1000000,1000000,200,1);
INSERT INTO `variation`(`id`, `product_id`, `price`, `sale_price`, `inventory`, `active`) VALUES (6, 6, 4000000,4000000,200,1);
INSERT INTO `variation`(`id`, `product_id`, `price`, `sale_price`, `inventory`, `active`) VALUES (7, 7, 3100000,3100000,200,1);
INSERT INTO `variation`(`id`, `product_id`, `price`, `sale_price`, `inventory`, `active`) VALUES (8, 8, 6500000,6500000,200,1);
INSERT INTO `variation`(`id`, `product_id`, `price`, `sale_price`, `inventory`, `active`) VALUES (9, 9, 370000,370000,200,1);
INSERT INTO `variation`(`id`, `product_id`, `price`, `sale_price`, `inventory`, `active`) VALUES (10,10, 3200000,3200000,200,1);
INSERT INTO `variation`(`id`, `product_id`, `price`, `sale_price`, `inventory`, `active`) VALUES (11, 11, 120000,120000,200,1);
INSERT INTO `variation`(`id`, `product_id`, `price`, `sale_price`, `inventory`, `active`) VALUES (12, 12, 3110000,3110000,200,1);
INSERT INTO `variation`(`id`, `product_id`, `price`, `sale_price`, `inventory`, `active`) VALUES (13, 13, 2000000,2000000,200,1);


INSERT INTO `variation`(`id`, `product_id`, `price`, `sale_price`, `inventory`, `active`) VALUES (24,24, 3100000,3100000,200,1);
INSERT INTO `variation`(`id`, `product_id`, `price`, `sale_price`, `inventory`, `active`) VALUES (25, 25, 5000000,5000000,200,1);
INSERT INTO `variation`(`id`, `product_id`, `price`, `sale_price`, `inventory`, `active`) VALUES (26,26, 3100000,3100000,200,1);
INSERT INTO `variation`(`id`, `product_id`, `price`, `sale_price`, `inventory`, `active`) VALUES (27, 27, 5000000,5000000,200,1);
INSERT INTO `variation`(`id`, `product_id`, `price`, `sale_price`, `inventory`, `active`) VALUES (28,28, 3100000,3100000,200,1);
INSERT INTO `variation`(`id`, `product_id`, `price`, `sale_price`, `inventory`, `active`) VALUES (29, 29, 5000000,5000000,200,1);
INSERT INTO `variation`(`id`, `product_id`, `price`, `sale_price`, `inventory`, `active`) VALUES (30,30, 3100000,3100000,200,1);
INSERT INTO `variation`(`id`, `product_id`, `price`, `sale_price`, `inventory`, `active`) VALUES (31, 31, 5000000,5000000,200,1);
INSERT INTO `variation`(`id`, `product_id`, `price`, `sale_price`, `inventory`, `active`) VALUES (32,32, 3100000,3100000,200,1);
INSERT INTO `variation`(`id`, `product_id`, `price`, `sale_price`, `inventory`, `active`) VALUES (33, 33, 5000000,5000000,200,1);

INSERT INTO `variation`(`id`, `product_id`, `price`, `sale_price`, `inventory`, `active`) VALUES (50,50, 3100000,3100000,200,1);
INSERT INTO `variation`(`id`, `product_id`, `price`, `sale_price`, `inventory`, `active`) VALUES (51, 51, 5000000,5000000,200,1);
INSERT INTO `variation`(`id`, `product_id`, `price`, `sale_price`, `inventory`, `active`) VALUES (52,52, 3100000,3100000,200,1);
INSERT INTO `variation`(`id`, `product_id`, `price`, `sale_price`, `inventory`, `active`) VALUES (53, 53, 5000000,5000000,200,1);
INSERT INTO `variation`(`id`, `product_id`, `price`, `sale_price`, `inventory`, `active`) VALUES (54,54, 3100000,3100000,200,1);
INSERT INTO `variation`(`id`, `product_id`, `price`, `sale_price`, `inventory`, `active`) VALUES (55, 55, 5000000,5000000,200,1);
INSERT INTO `variation`(`id`, `product_id`, `price`, `sale_price`, `inventory`, `active`) VALUES (56,56, 3100000,3100000,200,1);
INSERT INTO `variation`(`id`, `product_id`, `price`, `sale_price`, `inventory`, `active`) VALUES (57, 57, 5000000,5000000,200,1);
INSERT INTO `variation`(`id`, `product_id`, `price`, `sale_price`, `inventory`, `active`) VALUES (58,58, 3100000,3100000,200,1);
INSERT INTO `variation`(`id`, `product_id`, `price`, `sale_price`, `inventory`, `active`) VALUES (59, 59, 5000000,5000000,200,1);


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

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(15) ,
  `address` varchar(255),
  `active` boolean
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- --------------------------------------------------------

insert into `user` VALUES (1, 'admin', '202cb962ac59075b964b07152d234b70', 'admin@gmail.com', '0123456789', 'Viet Nam', 1);
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
