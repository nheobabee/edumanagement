-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 28, 2021 lúc 02:28 PM
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
  `idMH` int(11) NOT NULL,
  `tenGV` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sonhom` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `btl`
--

INSERT INTO `btl` (`idBTL`, `nameBTL`, `formatBTL`, `openedBTL`, `deadlineBTL`, `idMH`, `tenGV`, `sonhom`) VALUES
(1, 'Web học tập', 'code', '2021-10-27 12:45:48', '2021-11-04 00:00:00', 1, '', 0),
(2, 'Dùng ngôn ngữ bậc cao kết nối CSDL', 'code', '2021-10-27 12:45:48', '2021-11-06 00:00:00', 2, '', 0),
(3, 'Đề tài 4: Thiết kế webdite quản lý học tập', 'Code', '2021-10-27 21:49:59', '2021-10-31 21:48:57', 1, 'Kiều Tuấn Dũng', 2),
(4, ' Hack sập facebook', 'code', '2021-10-27 00:00:00', '2021-11-25 00:00:00', 1, 'Kiều Tuấn Dũng', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `btl`
--
ALTER TABLE `btl`
  ADD PRIMARY KEY (`idBTL`),
  ADD KEY `BTL_fk0` (`idMH`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `btl`
--
ALTER TABLE `btl`
  MODIFY `idBTL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `btl`
--
ALTER TABLE `btl`
  ADD CONSTRAINT `BTL_fk0` FOREIGN KEY (`idMH`) REFERENCES `monhoc` (`idMH`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
