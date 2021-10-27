-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 27, 2021 lúc 02:25 PM
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
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idMH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `btl`
--

INSERT INTO `btl` (`idBTL`, `nameBTL`, `formatBTL`, `openedBTL`, `deadlineBTL`, `note`, `idMH`) VALUES
(1, 'Web học tập', 'code', '2021-10-27 12:45:48', '2021-11-04 00:00:00', 'cố lên ae', 1),
(2, 'Dùng ngôn ngữ bậc cao kết nối CSDL', 'code', '2021-10-27 12:45:48', '2021-11-06 00:00:00', 'cố lên ae', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `btlsv`
--

CREATE TABLE `btlsv` (
  `idBTL` int(11) NOT NULL,
  `idSV` int(11) NOT NULL,
  `fileBTL` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idMH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `btlsv`
--

INSERT INTO `btlsv` (`idBTL`, `idSV`, `fileBTL`, `idMH`) VALUES
(1, 1, '.zip', 1),
(2, 2, '.zip', 2);

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

--
-- Đang đổ dữ liệu cho bảng `btvn`
--

INSERT INTO `btvn` (`idBTVN`, `nameBTVN`, `formatBTVN`, `openedBTVN`, `deadlineBTVN`, `note`, `idMH`) VALUES
(1, 'Thiết kết giao diện bằng bootstrap5', 'code', '2021-10-27 12:43:52', '2021-11-04 00:00:00', 'Thiết kế giao diện Web học tập bằng Bootstrap 5 và nộp link github tại đây', 1),
(2, 'Bài thực hành TRIGGER', 'code', '2021-10-27 12:43:52', '2021-11-06 00:00:00', '', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `btvnsv`
--

CREATE TABLE `btvnsv` (
  `idBTVN` int(11) NOT NULL,
  `idSV` int(11) NOT NULL,
  `fileBTVN` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idMH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `btvnsv`
--

INSERT INTO `btvnsv` (`idBTVN`, `idSV`, `fileBTVN`, `idMH`) VALUES
(1, 1, '.zip', 1),
(2, 2, '.zip', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giaovien`
--

CREATE TABLE `giaovien` (
  `idGV` int(11) NOT NULL,
  `nameGV` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genderGV` tinyint(1) NOT NULL,
  `emailGV` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdtGV` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addressGV` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giaovien`
--

INSERT INTO `giaovien` (`idGV`, `nameGV`, `genderGV`, `emailGV`, `sdtGV`, `addressGV`) VALUES
(1, 'Kiều Tuấn Dzũng', 1, 'ktz@gmail.com', '09999999', 'Hà Nội'),
(2, 'Nguyễn Ngọc Quỳnh Châu', 0, 'chaunnq2@gmail.com', '0998768546', 'Hà Nội');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ketquabtl`
--

CREATE TABLE `ketquabtl` (
  `idSV` int(11) NOT NULL,
  `idBTL` int(11) NOT NULL,
  `markBTL` float NOT NULL,
  `cmtBTL` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ketquabtl`
--

INSERT INTO `ketquabtl` (`idSV`, `idBTL`, `markBTL`, `cmtBTL`) VALUES
(1, 1, 9, 'Rất tốt'),
(2, 2, 10, 'Rất tốt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ketquabtvn`
--

CREATE TABLE `ketquabtvn` (
  `idSV` int(11) NOT NULL,
  `idBTVN` int(11) NOT NULL,
  `markBTVN` float NOT NULL,
  `cmtBTVN` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ketquabtvn`
--

INSERT INTO `ketquabtvn` (`idSV`, `idBTVN`, `markBTVN`, `cmtBTVN`) VALUES
(1, 1, 9, 'Rất tốt'),
(2, 2, 10, 'Rất tốt');

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
(1, 'Công nghệ Web', 3),
(2, 'Hệ quản trị CSDL', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinhvien`
--

CREATE TABLE `sinhvien` (
  `idSV` int(11) NOT NULL,
  `nameSV` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genderSV` tinyint(1) NOT NULL,
  `emailSV` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdtSV` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addressSV` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sinhvien`
--

INSERT INTO `sinhvien` (`idSV`, `nameSV`, `genderSV`, `emailSV`, `sdtSV`, `addressSV`) VALUES
(1, 'Nguyễn Văn Tân', 0, 'tan@gmail.com', '0386653766', 'Thái Bình'),
(2, 'Hồ Hồng Quân', 1, 'quan@gmail.com', '0444354234', 'Nghệ An'),
(3, 'Nguyễn Văn Tân', 1, 'tannguyentttbs000@gmail.com', '0386653766', '175, Tây Sơn, Đống Đa, Hà');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `study`
--

CREATE TABLE `study` (
  `idSV` int(11) NOT NULL,
  `idMH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `study`
--

INSERT INTO `study` (`idSV`, `idMH`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teach`
--

CREATE TABLE `teach` (
  `idGV` int(11) NOT NULL,
  `idMH` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `teach`
--

INSERT INTO `teach` (`idGV`, `idMH`, `status`) VALUES
(1, 1, NULL),
(2, 2, NULL);

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
-- Chỉ mục cho bảng `btlsv`
--
ALTER TABLE `btlsv`
  ADD PRIMARY KEY (`idBTL`,`idSV`,`idMH`),
  ADD KEY `BTLSV_fk1` (`idSV`),
  ADD KEY `BTLSV_fk2` (`idMH`);

--
-- Chỉ mục cho bảng `btvn`
--
ALTER TABLE `btvn`
  ADD PRIMARY KEY (`idBTVN`),
  ADD KEY `BTVN_fk0` (`idMH`);

--
-- Chỉ mục cho bảng `btvnsv`
--
ALTER TABLE `btvnsv`
  ADD PRIMARY KEY (`idBTVN`,`idSV`,`idMH`),
  ADD KEY `BTVNSV_fk1` (`idSV`),
  ADD KEY `BTVNSV_fk2` (`idMH`);

--
-- Chỉ mục cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  ADD PRIMARY KEY (`idGV`);

--
-- Chỉ mục cho bảng `ketquabtl`
--
ALTER TABLE `ketquabtl`
  ADD PRIMARY KEY (`idSV`,`idBTL`),
  ADD KEY `KETQUABTL_fk1` (`idBTL`);

--
-- Chỉ mục cho bảng `ketquabtvn`
--
ALTER TABLE `ketquabtvn`
  ADD PRIMARY KEY (`idSV`,`idBTVN`),
  ADD KEY `KETQUABTVN_fk1` (`idBTVN`);

--
-- Chỉ mục cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`idMH`);

--
-- Chỉ mục cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`idSV`);

--
-- Chỉ mục cho bảng `study`
--
ALTER TABLE `study`
  ADD PRIMARY KEY (`idSV`,`idMH`),
  ADD KEY `study_fk1` (`idMH`);

--
-- Chỉ mục cho bảng `teach`
--
ALTER TABLE `teach`
  ADD PRIMARY KEY (`idGV`,`idMH`),
  ADD KEY `TEACH_fk1` (`idMH`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `btl`
--
ALTER TABLE `btl`
  MODIFY `idBTL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `btvn`
--
ALTER TABLE `btvn`
  MODIFY `idBTVN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  MODIFY `idGV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  MODIFY `idMH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  MODIFY `idSV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `btl`
--
ALTER TABLE `btl`
  ADD CONSTRAINT `BTL_fk0` FOREIGN KEY (`idMH`) REFERENCES `monhoc` (`idMH`);

--
-- Các ràng buộc cho bảng `btlsv`
--
ALTER TABLE `btlsv`
  ADD CONSTRAINT `BTLSV_fk0` FOREIGN KEY (`idBTL`) REFERENCES `btl` (`idBTL`),
  ADD CONSTRAINT `BTLSV_fk1` FOREIGN KEY (`idSV`) REFERENCES `sinhvien` (`idSV`),
  ADD CONSTRAINT `BTLSV_fk2` FOREIGN KEY (`idMH`) REFERENCES `monhoc` (`idMH`);

--
-- Các ràng buộc cho bảng `btvn`
--
ALTER TABLE `btvn`
  ADD CONSTRAINT `BTVN_fk0` FOREIGN KEY (`idMH`) REFERENCES `monhoc` (`idMH`);

--
-- Các ràng buộc cho bảng `btvnsv`
--
ALTER TABLE `btvnsv`
  ADD CONSTRAINT `BTVNSV_fk0` FOREIGN KEY (`idBTVN`) REFERENCES `btvn` (`idBTVN`),
  ADD CONSTRAINT `BTVNSV_fk1` FOREIGN KEY (`idSV`) REFERENCES `sinhvien` (`idSV`),
  ADD CONSTRAINT `BTVNSV_fk2` FOREIGN KEY (`idMH`) REFERENCES `monhoc` (`idMH`);

--
-- Các ràng buộc cho bảng `ketquabtl`
--
ALTER TABLE `ketquabtl`
  ADD CONSTRAINT `KETQUABTL_fk0` FOREIGN KEY (`idSV`) REFERENCES `sinhvien` (`idSV`),
  ADD CONSTRAINT `KETQUABTL_fk1` FOREIGN KEY (`idBTL`) REFERENCES `btl` (`idBTL`);

--
-- Các ràng buộc cho bảng `ketquabtvn`
--
ALTER TABLE `ketquabtvn`
  ADD CONSTRAINT `KETQUABTVN_fk0` FOREIGN KEY (`idSV`) REFERENCES `sinhvien` (`idSV`),
  ADD CONSTRAINT `KETQUABTVN_fk1` FOREIGN KEY (`idBTVN`) REFERENCES `btvn` (`idBTVN`);

--
-- Các ràng buộc cho bảng `study`
--
ALTER TABLE `study`
  ADD CONSTRAINT `study_fk0` FOREIGN KEY (`idSV`) REFERENCES `sinhvien` (`idSV`),
  ADD CONSTRAINT `study_fk1` FOREIGN KEY (`idMH`) REFERENCES `monhoc` (`idMH`);

--
-- Các ràng buộc cho bảng `teach`
--
ALTER TABLE `teach`
  ADD CONSTRAINT `TEACH_fk0` FOREIGN KEY (`idGV`) REFERENCES `giaovien` (`idGV`),
  ADD CONSTRAINT `TEACH_fk1` FOREIGN KEY (`idMH`) REFERENCES `monhoc` (`idMH`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
