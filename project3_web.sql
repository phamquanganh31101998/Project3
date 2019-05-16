-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th5 13, 2019 lúc 02:08 AM
-- Phiên bản máy phục vụ: 5.7.24
-- Phiên bản PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project3_web`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `status`) VALUES
(1, 15, 1),
(2, 16, 0),
(3, 17, 0),
(4, 18, 0),
(5, 21, 0),
(8, 25, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_detail`
--

DROP TABLE IF EXISTS `cart_detail`;
CREATE TABLE IF NOT EXISTS `cart_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `cart_detail`
--

INSERT INTO `cart_detail` (`id`, `cart_id`, `product_id`, `amount`, `price`) VALUES
(2, 1, 3, 10, 1850000),
(11, 1, 4, 5, 300000),
(25, 1, 7, 2, 250000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `discount`
--

DROP TABLE IF EXISTS `discount`;
CREATE TABLE IF NOT EXISTS `discount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(8) NOT NULL,
  `discount_percent` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `discount`
--

INSERT INTO `discount` (`id`, `product_id`, `discount_percent`) VALUES
(1, 'QA1', 5),
(2, 'HT3', 10),
(5, 'HT5', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `feedback` varchar(191) CHARACTER SET utf8 NOT NULL,
  `answer` varchar(191) CHARACTER SET utf8 DEFAULT NULL,
  `isApproved` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `feedback`, `answer`, `isApproved`) VALUES
(2, 16, 'Chất lượng tuyệt lắm nha, nhưng mà mình thấy sản phẩm có vẻ chưa đa dạng lắm', 'Cảm ơn bạn, bên mình sẽ cố gắng mang đến cho các bạn nhiều sản phẩm hơn ạ', 1),
(3, 15, 'Yêu shop nhiều, ưng lắm đó', 'Cảm ơn bạn nha', 0),
(4, 17, 'Admin cho mình hỏi dưới 18 tuổi thì tập luyện có được không ạ?', 'Bạn có thể tập được nha, tuy nhiên bạn cần chú ý nghỉ ngơi và dinh dưỡng đầy đủ để có thể phát triển toàn diện nhé', 0),
(5, 15, 'Shop làm ăn chán thế', 'Bạn có thể cho mình biết tại sao không ạ?', 0),
(6, 16, 'Điểm 10 cho chất lượng nè', 'Yêu bạn nhiều', 1),
(7, 15, 'Trang Web này thật tuyệt vời', 'Cảm ơn bạn nhiều. Mong bạn tiếp tục ủng hộ chúng mình', 1),
(8, 15, '5 sao cho page luôn ạ', NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `fullname` varchar(45) CHARACTER SET utf8 NOT NULL,
  `address` varchar(191) CHARACTER SET utf8 NOT NULL,
  `phone_number` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `user_id`, `fullname`, `address`, `phone_number`, `total_amount`, `total_price`, `status`) VALUES
(2, 21, 'Lê Quang Thế Anh', 'Việt Nam', 1554456, 15, 2500000, 1),
(3, 21, 'Thế Anh', 'Hà Nội', 1252665998, 5, 9250000, 2),
(4, 21, 'Lê Quang Thế Anh', 'Việt Nam', 1554456, 20, 5700000, 2),
(5, 17, 'Phạm Sơn Tùng', 'Thành Công. Ba Đình, Hà Nội', 12345, 10, 900000, 1),
(6, 17, 'Tùng', 'Thành Công. Ba Đình, Hà Nội', 12345, 5, 1800000, 0),
(7, 17, 'Sơn Tùng', 'Thành Công. Ba Đình, Hà Nội', 12345, 10, 950000, 0),
(8, 17, 'Phạm Sơn Tùng', 'Thành Công. Ba Đình, Hà Nội', 12345, 15, 2825000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE IF NOT EXISTS `order_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `amount`, `price`) VALUES
(1, 2, 4, 5, 1500000),
(2, 2, 1, 10, 1000000),
(3, 3, 3, 5, 9250000),
(4, 4, 8, 10, 5000000),
(5, 4, 6, 10, 700000),
(6, 5, 11, 10, 900000),
(7, 6, 9, 5, 1800000),
(8, 7, 1, 10, 950000),
(9, 8, 23, 5, 2025000),
(10, 8, 10, 10, 800000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET utf8 NOT NULL,
  `type` varchar(45) CHARACTER SET utf8 NOT NULL,
  `image` varchar(191) DEFAULT NULL,
  `short_description` varchar(191) CHARACTER SET utf8 DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `product_id` varchar(45) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_id_UNIQUE` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `type`, `image`, `short_description`, `amount`, `price`, `product_id`) VALUES
(1, 'Áo phông đen', 'Quần áo', 'images/aophongden1.jpg', 'Áo phông đen ngắn tay', 100, 100000, 'QA1'),
(4, 'Áo khoác nỉ', 'Quần áo', 'images/aokhoacden1.jpg', 'Áo khoác nỉ cho những ngày tập luyện giá lạnh', 20, 300000, 'QA2'),
(3, 'Xà đơn gắn tường', 'Xà đơn', 'images/xadon1.jpg', 'Xà đơn gắn tường gọn nhẹ, tiện lợi', 20, 1850000, 'XA1'),
(5, 'Áo phông xám', 'Quần áo', 'images/aophongxam1.jpg', 'Áo phông xám ngắn tay', 25, 200000, 'QA3'),
(6, 'Băng tay', 'Hỗ trợ', 'images/bangtayden.jpg', 'Băng cổ tay', 50, 70000, 'HT1'),
(7, 'Quần nỉ', 'Quần áo', 'images/quanniden1.jpg', 'Quần tập', 18, 250000, 'QA4'),
(8, 'Vòng gỗ', 'Hỗ trợ', 'images/vonggo.jpg', 'Vòng gỗ có dây treo', 70, 500000, 'HT2'),
(9, 'Paralettes', 'Hỗ trợ', 'images/paralettes.jpg', 'Dụng cụ tập luyện', 25, 400000, 'HT3'),
(10, 'Dây trợ lực', 'Hỗ trợ', 'images/daytroluc1.jpg', 'Dây cao sư hỗ trợ', 40, 80000, 'HT4'),
(11, 'Tạ đơn 10kg', 'Tạ', 'images/tadon10kg.jpg', 'Tạ đơn tập luyện', 50, 90000, 'TA1'),
(12, 'Tạ đơn 20kg', 'Tạ', 'images/tadon20kg.jpg', 'Tạ đơn tập luyện', 70, 140000, 'TA2'),
(13, 'Xà đơn xếp', 'Xà đơn', 'images/xadonxep.jpg', 'Xà đơn xếp tiện lợi', 5, 3000000, 'XA2'),
(17, 'Xà kép cố định', 'Xà kép', 'images/xakepcodinh.jpg', 'Xà kép', 8, 1500000, 'XA3'),
(18, 'Xà kép mini', 'Xà kép', 'images/xakepmini.jpg', 'Xà kép nhỏ gọn tiện lợi', 15, 1000000, 'XA4'),
(19, 'Thanh đòn tạ', 'Tạ', 'images/thanhdonta.jpg', 'Thanh sắt', 45, 130000, 'TA3'),
(20, 'Bánh tạ 2,5kg', 'Tạ', 'images/banhta2,5kg.jpg', 'Bánh tạ lắp vào đòn tạ', 24, 25000, 'TA4'),
(21, 'Bánh tạ 5kg', 'Tạ', 'images/banhta5kg.jpg', 'Bánh tạ lắp vào đòn tạ', 79, 50000, 'TA5'),
(22, 'Bánh tạ 15kg', 'Tạ', 'images/banhta15kg.jpg', 'Bánh tạ lắp vào đòn tạ', 23, 150000, 'TA6'),
(23, 'Bóng', 'Hỗ trợ', 'images/bong75cm.jpg', 'Bóng tập', 40, 450000, 'HT5'),
(24, 'Máy chạy bộ', 'Hỗ trợ', 'images/maychaybo.jpg', 'Máy chạy bộ trong nhà', 5, 15000000, 'HT6');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_detail`
--

DROP TABLE IF EXISTS `product_detail`;
CREATE TABLE IF NOT EXISTS `product_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(8) NOT NULL,
  `origin` varchar(45) CHARACTER SET utf8 NOT NULL,
  `long_description` varchar(191) CHARACTER SET utf8 NOT NULL,
  `weight` varchar(11) CHARACTER SET utf16 DEFAULT NULL,
  `size` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `length` varchar(45) DEFAULT NULL,
  `color` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `product_detail`
--

INSERT INTO `product_detail` (`id`, `product_id`, `origin`, `long_description`, `weight`, `size`, `length`, `color`) VALUES
(1, 'QA1', 'Việt Nam', 'Áo phông hàng made in Việt Nam chính hãng, được sử dụng khi đi tập. Đi tán gái mặc còn chất hơn nữa nha. Được làm từ: 50% Polyester, 25% Cotton, 25% Rayon', NULL, 'S,M,L,XL,XXL', NULL, 'Đen'),
(4, 'QA2', 'Mỹ', 'Áo khoác dành cho ngày trời lạnh. Co dãn và ôm sát giúp giữ ấm, không gây cản trở người tập', NULL, 'S, M, L, XL', NULL, 'Đen'),
(3, 'XA1', 'Hàn Quốc', 'Xà đơn gắn tường tiện lợi hỗ trợ trong việc tập lưng xô, phát triển chiều cao ahihi', NULL, NULL, '140cm', 'Đen, xám'),
(5, 'QA3', 'Thái Lan', 'Cực mềm mại, chất vải ôm sát tôn dáng. Chất vải cực nhẹ mang đến cho người mặc sự thoải mái, rất thích hợp để tập luyện. Ngoài ra còn phù hợp để mặc hàng ngày', NULL, 'M, L, XL', NULL, 'Xám'),
(6, 'HT1', 'Lào', 'Thiết kế bảo vệ cổ tay giúp bạn nâng được nặng hơn, thực hiện được nhiều động tác hơn', NULL, '11in.x 3in.', NULL, 'Đen'),
(7, 'QA4', 'Campuchia', 'Quần ôm sát dáng thể thao, có thể kéo dãn thoải mái. Có 2 túi và khóa kéo ở chân. Chất liệu: 95% Cotton, 5% Spandex', NULL, 'M, L, XL', NULL, 'Đen'),
(8, 'HT2', 'Nhật Bản', 'Được sử dụng để tập luyện ở bất kỳ chỗ nào. Giúp cho hành trình tập luyện của bạn trở nên thú vị hơn', NULL, '4.5mx28mm', NULL, NULL),
(9, 'HT3', 'Nga', 'Dụng cụ nâng cao độ khó bài tập', NULL, NULL, '18 inch', NULL),
(10, 'HT4', 'Mexico', 'Sử dụng để thay đổi độ khó của bài tập, rất nhỏ gọn, tiện lợi để mang đi.', NULL, '4.5*19mm', NULL, 'Đen'),
(11, 'TA1', 'Cuba', 'Tạ đơn 10kg, thích hợp để tập tay', '10kg', NULL, NULL, 'Đen'),
(12, 'TA2', 'Nam Phi', 'Tạ đơn 20kg, thích hợp để tập tay', '20kg', NULL, NULL, 'Đen'),
(13, 'XA2', 'Pháp', 'Xà đơn đặt trong nhà có thể xếp lại được', NULL, NULL, '200cm', 'Đen'),
(14, 'XA3', 'Đức', 'Xà kép đặt cố định ở ngoài trời, thích hợp trong việc tập ngực, tay sau, các động tác khó.', '50kg', 'Lớn', '3m', 'Đen'),
(15, 'XA4', 'Tây Ban Nha', 'Xà kép nhỏ gọn tiện lợi, thích hợp trong việc tập ngực, tay sau, các động tác khó.', '2kg', 'Nhỏ', '1m', 'Xám'),
(16, 'TA3', 'Phần Lan', 'Thanh đòn gắn thêm các bánh tạ để tập chân', '20kg', NULL, '180cm', 'Xám'),
(17, 'TA4', 'Italy', 'Bánh tạ lắp vào đòn tạ để tăng độ nặng khi tập chân', '2,5kg', NULL, NULL, 'Đen'),
(18, 'TA5', 'Croatia', 'Bánh tạ lắp vào đòn tạ để tăng độ nặng khi tập chân', '5kg', NULL, NULL, 'Đen'),
(19, 'TA6', 'Anh', 'Bánh tạ lắp vào đòn tạ để tăng độ nặng khi tập chân', '15kg', NULL, NULL, 'Xám'),
(20, 'HT5', 'Hà Lan', 'Bóng dùng để tập thể lực', '2kg', 'Lớn', '75cm', 'Xanh'),
(21, 'HT6', 'Canada', 'Máy chạy bộ trong nhà là giải pháp tuyệt vời cho những người muốn chạy bộ nhưng lại không thể hoặc lười ra ngoài', NULL, 'Lớn', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(16, 'linh', 'linh@gmail.com', NULL, '$2y$10$iq9NTp/4Rz31PVizwfSHieEnb/v3PAP7I6lpEm2BaxTteztBjG9UC', NULL, '2019-04-23 08:34:06', '2019-04-23 08:34:06'),
(17, 'tung', 'tung@gmail.com', NULL, '$2y$10$ba4MjCTQkBb7QO4Sx6fva./vc2yOb8uqu9ZQ5G0V980caiwr4Vx32', NULL, '2019-04-23 08:34:35', '2019-04-23 08:34:35'),
(15, 'quanganh', 'quanganh@gmail.com', NULL, '$2y$10$DTeeooNkiXql1Y9HqstvbOLCXnYJ.MsGJW6aPhrplJpGZkgXvPRaG', NULL, '2019-04-23 08:33:39', '2019-04-23 08:33:39'),
(14, 'admin', 'admin@admin', NULL, '$2y$10$5nM9Qq2Ol0B.S49IGTSaYu7JhImPx7.snj.O.s.g.wgfh9KljN7em', NULL, '2019-04-23 08:33:17', '2019-04-23 08:33:17'),
(25, 'hieu', 'hieu@gmail.com', NULL, '$2y$10$R88uZ3GCVjojjg/8YEkXb.se8Je.62mWeS6mQBQEKvgP.v8lLcAjO', NULL, '2019-05-12 18:41:04', '2019-05-12 18:41:04'),
(21, 'theanh', 'theanh28@gmail.com', NULL, '$2y$10$GHzBjUqBeLJ8mr6cGFJwbeVDydjhKbpqAgtJLFqe/9DqSO1xu8.xK', NULL, '2019-04-27 06:59:37', '2019-04-27 06:59:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_info`
--

DROP TABLE IF EXISTS `user_info`;
CREATE TABLE IF NOT EXISTS `user_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `isAdmin` tinyint(4) NOT NULL DEFAULT '0',
  `fullname` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `phone_number` int(10) DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `isLocked` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `user_info`
--

INSERT INTO `user_info` (`id`, `user_id`, `isAdmin`, `fullname`, `phone_number`, `address`, `isLocked`) VALUES
(1, 14, 1, 'Administrator', 12345, 'Ngõ 445 Lạc Long Quân, Tây Hồ, Hà Nội', 0),
(2, 15, 0, 'Phạm Quang Anh', 852665998, 'Tây Hồ, Hà Nội', 0),
(3, 16, 0, 'Hoàng Mỹ Linh', 828151298, 'Xuân Thủy, Cầu Giấy, Hà Nội', 0),
(4, 17, 0, 'Phạm Sơn Tùng', 12345, 'Thành Công. Ba Đình, Hà Nội', 0),
(5, 18, 0, 'Trần Đình Hiếu', 515141, 'Hoa Bằng, Cầu Giấy, Hà Nội', 0),
(14, 25, 0, 'Trần Đình Hiếu', 2132132, 'Yên Hòa, Hà Nội', 1),
(11, 21, 0, 'Lê Quang Thế Anh', 1554456, 'Việt Nam', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
