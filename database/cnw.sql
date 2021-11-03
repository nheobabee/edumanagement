-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 02, 2021 lúc 05:21 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cnw`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `btl`
--

CREATE TABLE `btl` (
  `idBTL` int(11) NOT NULL,
  `nameBTL` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `formatBTL` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `openedBTL` datetime NOT NULL DEFAULT current_timestamp(),
  `deadlineBTL` datetime NOT NULL,
  `notebtl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filenamebtl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idMH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `btl`
--

INSERT INTO `btl` (`idBTL`, `nameBTL`, `formatBTL`, `openedBTL`, `deadlineBTL`, `notebtl`, `filenamebtl`, `idMH`) VALUES
(33, ' Thiết kế WEB quản lý học tập', 'Tự luận', '2021-11-02 23:09:16', '2021-11-02 23:14:00', 'Nộp trước ngày thi một ngày.', 'cnw.sql', 13),
(34, ' Thiết kế WEB quản lý khách sạn', 'Tự luận', '2021-11-02 23:09:39', '2021-11-02 23:14:00', 'Nộp trước ngày thi một ngày.', 'cnw.sql', 13),
(35, ' Nghiên cứu hệ thống vào ra', 'Tự luận', '2021-11-02 23:13:08', '2021-11-02 16:13:00', 'Nộp trước ngày thi một ngày.', 'cnw.sql', 14),
(36, ' Giải thuật Robinson', 'Tự luận', '2021-11-02 23:15:23', '2021-11-02 15:15:00', 'Nộp trước ngày thi một ngày.', 'cnw.sql', 18),
(37, ' Dùng ngôn ngữ bậc cao + SQLSERVER', 'Tự luận', '2021-11-02 23:17:22', '2021-11-02 23:21:00', 'Nộp trước ngày thi một ngày.', 'cnw.sql', 19);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `btlsv`
--

CREATE TABLE `btlsv` (
  `idBTL` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `idMH` int(11) NOT NULL,
  `fileBTL` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notebtlsv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngaynop` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `btvn`
--

CREATE TABLE `btvn` (
  `idBTVN` int(11) NOT NULL,
  `nameBTVN` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `formatBTVN` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `openedBTVN` datetime NOT NULL DEFAULT current_timestamp(),
  `deadlineBTVN` datetime NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idMH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `btvn`
--

INSERT INTO `btvn` (`idBTVN`, `nameBTVN`, `formatBTVN`, `openedBTVN`, `deadlineBTVN`, `note`, `filename`, `idMH`) VALUES
(27, ' Dùng Bootstrap thiết kế giao diện nhà hàng', 'Tự luận', '2021-11-02 23:06:28', '2021-11-02 23:07:00', 'Làm và nộp link github.', 'cnw.sql', 13),
(28, ' Sử dụng Javascript thiết kế form Login', 'Tự luận', '2021-11-02 23:08:26', '2021-11-02 23:10:00', 'Làm và nộp link github.', 'cnw.sql', 13),
(29, ' Sử dụng hàng đợi.', 'Tự luận', '2021-11-02 23:11:17', '2021-11-14 23:10:00', 'Làm và nộp file PDF.', 'cnw.sql', 14),
(30, ' Giải thuật Roun Robin', 'Tự luận', '2021-11-02 23:11:53', '2021-11-02 12:11:00', 'Làm và nộp file PDF.', 'cnw.sql', 14),
(31, ' Bài toán Tháp Hà Nội', 'Tự luận', '2021-11-02 23:14:11', '2021-11-07 23:14:00', 'Làm và nộp file PDF.', 'cnw.sql', 18),
(32, ' Giải thuật A*', 'Tự luận', '2021-11-02 23:14:30', '2021-11-02 12:14:00', 'Làm và nộp file PDF.', 'cnw.sql', 18),
(33, ' Thực hành PROCEDURE', 'Tự luận', '2021-11-02 23:15:58', '2021-11-04 23:15:00', 'Làm và nộp file PDF.', 'cnw.sql', 19),
(34, ' Thực hành FUNCTION', 'Tự luận', '2021-11-02 23:16:56', '2021-11-02 23:19:00', 'Làm và nộp file PDF.', 'cnw.sql', 19);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `btvnsv`
--

CREATE TABLE `btvnsv` (
  `idBTVN` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fileBTVN` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notebtvnsv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idMH` int(11) NOT NULL,
  `ngaynop` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dkbtl`
--

CREATE TABLE `dkbtl` (
  `user_id` int(11) NOT NULL,
  `idBTL` int(11) NOT NULL,
  `idMH` int(11) DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ketquabtl`
--

CREATE TABLE `ketquabtl` (
  `user_id` int(11) NOT NULL,
  `idBTL` int(11) NOT NULL,
  `markBTL` int(11) NOT NULL,
  `cmtBTL` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ketquabtvn`
--

CREATE TABLE `ketquabtvn` (
  `user_id` int(11) NOT NULL,
  `idBTVN` int(11) NOT NULL,
  `markBTVN` int(11) NOT NULL,
  `cmtBTVN` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monhoc`
--

CREATE TABLE `monhoc` (
  `idMH` int(11) NOT NULL,
  `nameMH` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TC` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `monhoc`
--

INSERT INTO `monhoc` (`idMH`, `nameMH`, `TC`) VALUES
(13, 'Công nghệ WEB', 3),
(14, 'Hệ điều hành', 3),
(18, 'Trí tuệ nhân tạo', 3),
(19, 'Hệ quản trị CSDL', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `relationship`
--

CREATE TABLE `relationship` (
  `user_id` int(11) NOT NULL,
  `idMH` int(11) NOT NULL,
  `note` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `relationship`
--

INSERT INTO `relationship` (`user_id`, `idMH`, `note`) VALUES
(10, 13, 0),
(10, 14, 0),
(10, 18, 0),
(10, 19, 0),
(11, 13, 0),
(13, 13, 0),
(14, 13, 0),
(14, 14, 0),
(14, 19, 0),
(16, 14, 0),
(17, 14, 0),
(18, 14, 0),
(18, 18, 0),
(19, 14, 0),
(21, 18, 0),
(22, 18, 0),
(22, 19, 0),
(23, 18, 0),
(24, 13, 0),
(24, 18, 0),
(25, 19, 0),
(26, 19, 0),
(27, 19, 0),
(28, 19, 0),
(30, 18, 0),
(44, 18, 1),
(45, 13, 1),
(46, 19, 1),
(47, 14, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `comment_id` int(11) NOT NULL,
  `parent_comment_id` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `comment_sender_name` varchar(40) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_comment`
--

INSERT INTO `tbl_comment` (`comment_id`, `parent_comment_id`, `comment`, `comment_sender_name`, `date`) VALUES
(44, 0, 'hi', 'ADMIN', '2021-11-02 10:43:46'),
(45, 44, 's', 'ADMIN', '2021-11-02 10:43:51'),
(46, 0, 'n', 'Hồ Hữu Thiếng', '2021-11-02 13:06:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_gioitinh` tinyint(4) NOT NULL,
  `user_birthday` date NOT NULL,
  `user_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_level` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_forgot` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_avatar`, `user_gioitinh`, `user_birthday`, `user_phone`, `user_email`, `user_pass`, `user_level`, `status`, `code`, `code_forgot`) VALUES
(10, 'Hồ Hồng Quân', ' img/kakashi.png', 1, '2001-11-25', '0346785893', 'hhq@gmail.com', '$2y$10$TySByXD7JoufRz9qAoOes.o57J0r5LqV6tiiry4GE9bnDekiZgtLW', 0, 1, '01d5adc62fdbba0c64eae55eddb8bbb5', ''),
(11, 'Hồ Đức Hiếu', ' img/46508791_495542080957835_6194235171827351552_o.jpg', 1, '2005-01-30', '0335785981', 'anhqh25@gmail.com', '$2y$10$dPQCRa.NBG4OmhLxvFRe/uXGm6BYdErM6RqWSgoQpUdNIOTk7nDSm', 0, 1, 'dcda77b53070092589cc299187ea67aa', ''),
(13, 'Nguyễn Thị Bích Loan', ' img/137321599_208840064293477_7185830937899760390_n.jpg', 0, '2021-11-26', '0386653766', 'nheokid@gmail.com', '$2y$10$wZlqKKDY7rAAmtzAPsZaNedHj5YD/dcySGThysA5b6J.unBU1VKgO', 0, 1, 'a21fd45a9709a054ba2dc85e69231162', ''),
(14, 'Lê Thị Thu Hiền', ' img/137321599_208840064293477_7185830937899760390_n.jpg', 0, '2001-01-28', '0988784753', 'nheokids@gmail.com', '$2y$10$HHlVqz2M5YsXV7kypEiFBuBgBQQwJjatm/oDMgNPkrDzRBW1udvfS', 0, 1, 'f5ff2b48c11b83635d4d310527026aee', ''),
(16, 'Phạm Thị Thúy', ' img/137321599_208840064293477_7185830937899760390_n.jpg', 0, '2001-04-06', '0998887665', 'nheo.sosweet@gmail.com', '$2y$10$a3AQ7KdJ8NTrezXtArgUqu/ubxD5UQgVRtOR/00nkArwHk3xgrBmS', 0, 1, '4f615b8cd9a7bc8fc45dafa0344652f7', ''),
(17, 'Vũ Thị Nguyệt ', ' img/1_N86mYdIydgljjYnn8xwJgw.jpeg', 1, '1974-11-20', '0382373892', 'vuthinguyet1974@gmail.com', '$2y$10$dYkIcLHW6stis8Vb8okgDey9RBOSGiCbFO/8m55AEhScNYqmUsfe2', 0, 1, '3b2883c0487c64d70967a75ee7ab0fbc', ''),
(18, 'Đinh Trọng Thi', ' img/212-1068x601.jpg', 1, '2001-01-06', '0392871853', 'anhthi06@gmail.com', '$2y$10$1b0HOeM38mo61YLAJXChdu.UL38UFxMuWjoR8JZ8DbheXmZ97GOJ2', 0, 1, '833682d42549e01eddff86c9a6d76dda', ''),
(19, 'Hồ Khắc Hoàng', ' img/235282.jpg', 1, '2001-07-14', '0435244205', 'sv1@gmail.com', '$2y$10$Qm4uVNwms0d2PTQVACRn/uXTC4Go80gnj2ce4SqoIdyFaw/IyS3uW', 0, 1, 'a8eeed4db892e21396ca396aa862c3df', ''),
(21, 'Trịnh Hoàng Long', ' img/ad.jpg', 1, '2001-10-29', '0424234234', 'sv2@gmail.com', '$2y$10$YmL9EnhWUgH.vVC8L0NWuOLqsCIu9KCk9MNW7l8D/Y/kQBHAZRljK', 0, 1, '502b975067dd1bfcd70be9ff0f1701c9', ''),
(22, 'Nguyễn Minh Đức', ' img/65569960_p0-1068x1068.jpg', 1, '2001-09-20', '0334543824', 'sv3@gmail.com', '$2y$10$cXIUKbEk9Y4/gzMo75x1e.2lcp4QildGrJKHu2jeTJ89f9yF5ROX.', 0, 1, 'aaf181883cfda88034065d375f5ff02d', ''),
(23, 'Tô Duy Đức', ' img/212-1068x601.jpg', 1, '2001-12-03', '034234832', 'sv4@gmail.com', '$2y$10$lja.VjZLfCEQJ7bH8geVKOS6B6HHalmYt64KyK9oFwUaM67smICNu', 0, 1, '74a3910be3e3aba1285d9ebb8860ecb8', ''),
(24, 'Hồ Văn Phương', ' img/6ae7a40b156df15b12a3d019945592e20c38db80-1068x600.jpg', 1, '2001-10-23', '0342472982', 'sv5@gmail.com', '$2y$10$fSOCAh6M6YeYrHoGVe9c0eQRjWryKHCtAkr.gpmnU5/QtBkz/qg7S', 0, 1, '5f2f02c1027ec3323d44325f768a33ad', ''),
(25, 'Bùi Đinh Công Hậu', ' img/Hình0332.jpg', 1, '2001-01-07', '0231238132', 'sv6@gmail.com', '$2y$10$e5vLbw9zo3vCOLHCickSvuoK203YKLmdYubPfRpwh9kE82TQi5vhG', 0, 1, '7acfc142f533152057db31208402d285', ''),
(26, 'Nguyễn Văn Cường', ' img/46508791_495542080957835_6194235171827351552_o.jpg', 1, '2001-03-28', '042423423', 'sv7@gmail.com', '$2y$10$27T39OVh.ksU9ttuuvGbEe3Y7PubDTvkvQAq.bCct2nVPkwuXijbq', 0, 1, 'cb179ee33d8f2edcf0d55aefc8e6fda5', ''),
(27, 'Hồ Xuân Dũng', ' img/136049229_1092152204580352_5319614336780058479_n.jpg', 1, '2001-11-23', '0342348289', 'sv8@gmail.com', '$2y$10$SPH0kbTIi.X9YE49rmPx8uNXyl9f7FehFCqgoR5HQwmrKz7RCDFaK', 0, 1, '86d3ccf823b843c465cbf48d7b1cf147', ''),
(28, 'Hồ Bá Thanh ', ' img/9bad078b80762dfbc12ec227e9acc505.jpg', 1, '2001-09-29', '0342348829', 'sv9@gmail.com', '$2y$10$7fAq527XTecRdUxdzcpPQuAgRR5AeG63n0RsLleHLWYGFCSq3nboe', 0, 1, 'dbfeb3af13ac22d85efd8c5575bf8bee', ''),
(29, 'Phạm Văn Đạt', '212-1068x601.jpg', 1, '2001-02-12', '042349828', 'sv10@gmail.com', '$2y$10$vlOYOL5dCFR.L5H8u4VX9OCD4JHZuaw0atMGPMpHcAT9SAnaNlFki', 0, 1, '9ac09bafad02c42d007b63e86b987d83', ''),
(30, 'Hồ Văn Đàm ', ' img/unknown.png', 1, '2001-08-15', '0434298492', 'sv11@gmail.com', '$2y$10$7AJQ5CCmhWl3kPpbawkfwOwk3jv4nzXOQlRWokSq3q.opf2g/Rie.', 0, 1, 'eab32f145fc38d9b80a9c5a06de779e9', ''),
(31, 'Nguyễn Thị Thúy', ' img/46508791_495542080957835_6194235171827351552_o.jpg', 1, '2001-09-16', '034289348', 'sv12@gmail.com', '$2y$10$.pp8.CIRgrZqcyTkK6UOuuTPdIEA4sbCYk8PybPkBheVV8z0EgMW2', 0, 1, 'bd02a0ab90e6109bfcdfb5bc7344ade9', ''),
(32, 'Bùi Thanh Tùng', ' img/4T2A8593.JPG', 1, '2001-03-12', '0342834282', 'sv13@gmail.com', '$2y$10$UbBvf3HaDRE6K/4FyBucW.JiusAeMnZmlIxBAXH/NLsziVii1JGYi', 0, 1, 'c3850215286ee6a6c05632282e3107cc', ''),
(33, 'Hồ Đức Việt', ' img/e22da0e65d132ff19ff2edafb0d67a0c.jpg', 1, '2001-02-23', '034324237', 'sv14@gmail.com', '$2y$10$LSr5l.tUIfW.J2476CUdIuMVT.h7uKdy5F.InvNHVa1RA0uHpyQa6', 0, 1, '3e4ff33cffd3825cdbdf7b28e4d12b89', ''),
(34, 'Nguyễn Lan Anh', ' img/242768425_294331492154723_1251493049399012932_n.jpg', 1, '2001-06-13', '0434823489', 'sv15@gmail.com', '$2y$10$hfa9DpmYKqg35tbFRjKtL.YRAC.QKnFtHuV0N7JpXSODGRPqyLQfe', 0, 1, '82474e3a38ce703929e577bd7313f78d', ''),
(35, 'Trần Quỳnh Anh', ' img/244103339_2652082735100066_6816555485889753629_n.png', 1, '2001-09-02', '038428349', 'sv16@gmail.com', '$2y$10$4EtBHJ3wXH4mlcTmgaM5r.dkbRonm70amwrGMESIHmnGrXm3fG.EC', 0, 1, '43689b3b23dcad85e81ee7033d6e5c87', ''),
(36, 'Nguyễn Phương Linh', ' img/f1ab5986755d71f252d8839214643246.jpg', 0, '2001-10-02', '034293842', 'sv17@gmail.com', '$2y$10$z3lDiSbB7uTudLDbFnAgKufqoEUdGzvTrGd2blO5alPhjhDqxB5M.', 0, 1, '09886dfa8ae83f6639e8d0024a36239b', ''),
(39, 'ADMIN', ' img/unknown1.jpg', 1, '2021-11-03', '113', 'admin@gmail.com', '$2y$10$xIo/DAAQuqyoZ4q/WRvzze4vyIby.kJgj9JHrgHCvVlIhgeMAVBW2', 2, 1, '525b05b26b5477b5af0d478647bcc5b5', ''),
(44, 'Trần Thị Cẩm Giang', ' img/137321599_208840064293477_7185830937899760390_n.jpg', 0, '1990-12-12', '099999999', 'ai@gmail.com', '$2y$10$o4NchcDwZGlCyrFstIYieejp.xysjWaXidOOBxsOzHE03FB0LrfOy', 1, 1, '23163b29a2634d4864d4fa10766d539e', ''),
(45, 'Kiều Tuấn Dzũng', ' img/137321599_208840064293477_7185830937899760390_n.jpg', 1, '1989-12-09', '088888888', 'cnw@gmail.com', '$2y$10$Qpd.E8VrU2OklDm6Y2oaiODehVHC.LIGRhx0rUAeJKTjyoYdVcXmO', 1, 1, 'a3a947d3388f367fae6c6625e6f22ec1', ''),
(46, 'Nguyễn Ngọc Quỳnh Châu', ' img/137321599_208840064293477_7185830937899760390_n.jpg', 0, '1991-07-09', '0777777777', 'csdl@gmail.com', '$2y$10$WqUSiYta/HEDjnb/.PchP.5AVavG3HQ1u/UvQqq.RrN7mrltYmilC', 1, 1, 'd9f0a46cbbddcc289296ccf7707e16fc', ''),
(47, 'Đoàn Thị Quế', ' img/137321599_208840064293477_7185830937899760390_n.jpg', 0, '1988-12-09', '0666666666', 'hdh@gmail.com', '$2y$10$cOIrRycZPt.aY7epHku5putzMsUSQJQ/b8psTuSTFHXU6kPnV.yem', 1, 1, '91a13da344d2ba0a5d60e738db9e0dc4', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `btl`
--
ALTER TABLE `btl`
  ADD PRIMARY KEY (`idBTL`),
  ADD KEY `btl_fk0` (`idMH`);

--
-- Chỉ mục cho bảng `btlsv`
--
ALTER TABLE `btlsv`
  ADD PRIMARY KEY (`idBTL`,`user_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `idMH` (`idMH`);

--
-- Chỉ mục cho bảng `btvn`
--
ALTER TABLE `btvn`
  ADD PRIMARY KEY (`idBTVN`),
  ADD KEY `btvn_fk0` (`idMH`);

--
-- Chỉ mục cho bảng `btvnsv`
--
ALTER TABLE `btvnsv`
  ADD PRIMARY KEY (`idBTVN`,`user_id`),
  ADD KEY `btvnsv_fk1` (`user_id`),
  ADD KEY `btvnsv_fk2` (`idMH`);

--
-- Chỉ mục cho bảng `dkbtl`
--
ALTER TABLE `dkbtl`
  ADD PRIMARY KEY (`user_id`,`idBTL`),
  ADD KEY `idBTL` (`idBTL`),
  ADD KEY `idMH` (`idMH`);

--
-- Chỉ mục cho bảng `ketquabtl`
--
ALTER TABLE `ketquabtl`
  ADD PRIMARY KEY (`user_id`,`idBTL`),
  ADD KEY `ketquabtl_fk1` (`idBTL`);

--
-- Chỉ mục cho bảng `ketquabtvn`
--
ALTER TABLE `ketquabtvn`
  ADD PRIMARY KEY (`user_id`,`idBTVN`),
  ADD KEY `ketquabtvn_fk1` (`idBTVN`);

--
-- Chỉ mục cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`idMH`);

--
-- Chỉ mục cho bảng `relationship`
--
ALTER TABLE `relationship`
  ADD PRIMARY KEY (`user_id`,`idMH`),
  ADD KEY `relationship_fk1` (`idMH`);

--
-- Chỉ mục cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `btl`
--
ALTER TABLE `btl`
  MODIFY `idBTL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `btvn`
--
ALTER TABLE `btvn`
  MODIFY `idBTVN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  MODIFY `idMH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `btl`
--
ALTER TABLE `btl`
  ADD CONSTRAINT `btl_fk0` FOREIGN KEY (`idMH`) REFERENCES `monhoc` (`idMH`);

--
-- Các ràng buộc cho bảng `btlsv`
--
ALTER TABLE `btlsv`
  ADD CONSTRAINT `btlsv_ibfk_1` FOREIGN KEY (`idBTL`) REFERENCES `btl` (`idBTL`),
  ADD CONSTRAINT `btlsv_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `btlsv_ibfk_3` FOREIGN KEY (`idMH`) REFERENCES `monhoc` (`idMH`);

--
-- Các ràng buộc cho bảng `btvn`
--
ALTER TABLE `btvn`
  ADD CONSTRAINT `btvn_fk0` FOREIGN KEY (`idMH`) REFERENCES `monhoc` (`idMH`);

--
-- Các ràng buộc cho bảng `btvnsv`
--
ALTER TABLE `btvnsv`
  ADD CONSTRAINT `btvnsv_fk0` FOREIGN KEY (`idBTVN`) REFERENCES `btvn` (`idBTVN`),
  ADD CONSTRAINT `btvnsv_fk1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `btvnsv_fk2` FOREIGN KEY (`idMH`) REFERENCES `monhoc` (`idMH`);

--
-- Các ràng buộc cho bảng `dkbtl`
--
ALTER TABLE `dkbtl`
  ADD CONSTRAINT `dkbtl_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `dkbtl_ibfk_2` FOREIGN KEY (`idBTL`) REFERENCES `btl` (`idBTL`),
  ADD CONSTRAINT `dkbtl_ibfk_3` FOREIGN KEY (`idMH`) REFERENCES `monhoc` (`idMH`);

--
-- Các ràng buộc cho bảng `ketquabtl`
--
ALTER TABLE `ketquabtl`
  ADD CONSTRAINT `ketquabtl_fk0` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `ketquabtl_fk1` FOREIGN KEY (`idBTL`) REFERENCES `btl` (`idBTL`);

--
-- Các ràng buộc cho bảng `ketquabtvn`
--
ALTER TABLE `ketquabtvn`
  ADD CONSTRAINT `ketquabtvn_fk0` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `ketquabtvn_fk1` FOREIGN KEY (`idBTVN`) REFERENCES `btvn` (`idBTVN`);

--
-- Các ràng buộc cho bảng `relationship`
--
ALTER TABLE `relationship`
  ADD CONSTRAINT `relationship_fk0` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `relationship_fk1` FOREIGN KEY (`idMH`) REFERENCES `monhoc` (`idMH`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
