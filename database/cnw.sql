-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 29, 2021 lúc 12:37 PM
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
  `idMH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `btlsv`
--

CREATE TABLE `btlsv` (
  `user_id` int(11) NOT NULL,
  `idBTL` int(11) NOT NULL,
  `fileBTL` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
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
  `idMH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `btvnsv`
--

CREATE TABLE `btvnsv` (
  `idBTVN` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fileBTVN` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idMH` int(11) NOT NULL
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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `relationship`
--

CREATE TABLE `relationship` (
  `user_id` int(11) NOT NULL,
  `idMH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Hồ Hồng Quân', '.', 1, '2021-10-13', '0988664464', 'v@gmail.com', '1', 0, 1, '1', '1'),
(3, 'Nguyễn Văn Tân', ' img/1.jpg', 1, '2021-10-27', '0386653766', 'tannguyentttbs000@gmail.com', '$2y$10$YAqIoqhgwjs9W3kqYm1pYOwMTEBRhEraXPdlfpiFqoNJpOEBjmbMS', 0, 1, '6db1e92aa9c85c06baf66f5557769f22', ''),
(4, 'Vương', NULL, 1, '2021-10-12', '6464656', 'vuong9xx@gmail.com', '1', 1, 1, '1', '1'),
(5, 'Quân', NULL, 1, '2021-10-12', '1', 'quan@gmail.com', '1', 2, 1, '1', '1'),
(6, 'dcs', 'sd', 1, '2021-10-12', '11', 'v@gmai.com', '11', 2, 1, '1', '1');

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
  ADD PRIMARY KEY (`user_id`,`idBTL`),
  ADD KEY `btlsv_fk1` (`idBTL`);

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
  MODIFY `idBTL` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `btvn`
--
ALTER TABLE `btvn`
  MODIFY `idBTVN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  MODIFY `idMH` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  ADD CONSTRAINT `btlsv_fk0` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `btlsv_fk1` FOREIGN KEY (`idBTL`) REFERENCES `btl` (`idBTL`);

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
