-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 28, 2021 lúc 03:19 PM
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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `btlsv`
--

CREATE TABLE `btlsv` (
  `idTeam` int(11) NOT NULL,
  `nameTeam` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nameST1` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nameST2` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nameST3` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idBTL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `btlsv`
--

INSERT INTO `btlsv` (`idTeam`, `nameTeam`, `nameST1`, `nameST2`, `nameST3`, `idBTL`) VALUES
(3, 'Nhóm 3', 'Nguyễn Minh Đức', ' Trịnh Hoàng Long', 'Hà Việt Dũng', 2),
(7, 'nhóm ngu', 'hiếu ', ' phương', 'hoàng', 1),
(9, 'nhóm rất ngu', 'dũng', ' thiên ', 'kiệt', 1);

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
-- Cấu trúc bảng cho bảng `db_users`
--

CREATE TABLE `db_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_gioitinh` tinyint(1) NOT NULL,
  `user_birthday` date DEFAULT NULL,
  `user_phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_level` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_forgot` varchar(222) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_users`
--

INSERT INTO `db_users` (`user_id`, `user_name`, `user_avatar`, `user_gioitinh`, `user_birthday`, `user_phone`, `user_email`, `user_pass`, `user_level`, `status`, `code`, `code_forgot`) VALUES
(1, 'vtmo', '', 0, NULL, '', 'vtmo@tlu.edu.vn', '$2y$10$HJ0rPiSdeyJ/4IccIxf1quvEypJ/86u5/781vY0n1aVYeuXKQDN2G', 0, 1, '', '0'),
(2, 'ntphuong', '', 0, NULL, '', 'ntphuong@tlu.edu.vnb', '$2y$10$HJ0rPiSdeyJ/4IccIxf1quvEypJ/86u5/781vY0n1aVYeuXKQDN2G', 0, 1, '', '0'),
(3, 'MinhHN', 'img/avatar.jpg', 1, '2021-09-28', '034892039', 'MinhHN@gmail.com', '$2y$10$HJ0rPiSdeyJ/4IccIxf1quvEypJ/86u5/781vY0n1aVYeuXKQDN2G', 0, 1, '', '0'),
(38, 'Hoàng Nhật Minh', 'img/avatar.jpg', 0, '2001-07-07', '012345678911', 'Nhatminh7721@gmail.com', '$2y$10$HJ0rPiSdeyJ/4IccIxf1quvEypJ/86u5/781vY0n1aVYeuXKQDN2G', 0, 1, '805b00106d385e07fbaf6fd07d46d159', '0'),
(39, 'Vương Nguyễn', 'img/Logo HMT.png', 1, '2021-09-26', '039420349', 'ab@1.1', '$2y$10$HJ0rPiSdeyJ/4IccIxf1quvEypJ/86u5/781vY0n1aVYeuXKQDN2G', 0, 1, '9c9882ea7e6c162b7dac95b58994811e', '0'),
(40, 'minh nè', 'img/avatar.jpg_173', 1, '2021-09-27', '0122', 'minh01@minh.com', '$2y$10$HJ0rPiSdeyJ/4IccIxf1quvEypJ/86u5/781vY0n1aVYeuXKQDN2G', 0, 1, '2290c7fadb9c6c343a9f3e84cf2ee861', '0'),
(47, 'Huỳnh Hân', 'img/4207591edfda16844fcb.jpg', 0, '2021-10-20', '0972258286', 'han@gmail.com', '1', 0, 1, '9ceab358c1f5e4dcfc49b5d2a1d4a1e2', '0'),
(85, 'Nguyễn Minh Vương', ' img/cam.png', 1, '2021-09-29', '0972258286', 'vuong9xx@gmail.com', '$2y$10$Kdx5.I2oczhB9BUtZ8IFf.78qCur.o7N2I3.Vp5j7JAwreVTGCPvS', 0, 1, '53bafeca233d95be1b6d524b748779bf', '41877');

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
(2, 'Hệ quản trị CSDL', 2);

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
  `nameBTL` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sonhom` int(11) NOT NULL,
  `tenGV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `teach`
--

INSERT INTO `teach` (`idGV`, `idMH`, `nameBTL`, `sonhom`, `tenGV`) VALUES
(1, 1, '', 0, 0),
(2, 2, '', 0, 0);

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
  ADD PRIMARY KEY (`idTeam`);

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
-- Chỉ mục cho bảng `db_users`
--
ALTER TABLE `db_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`);

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
  MODIFY `idBTL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `btlsv`
--
ALTER TABLE `btlsv`
  MODIFY `idTeam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `btvn`
--
ALTER TABLE `btvn`
  MODIFY `idBTVN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `db_users`
--
ALTER TABLE `db_users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  MODIFY `idGV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  MODIFY `idMH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
