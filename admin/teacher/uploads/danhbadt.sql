-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 30, 2021 lúc 08:47 AM
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
-- Cơ sở dữ liệu: `project03`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_employees`
--

CREATE TABLE `db_employees` (
  `emp_id` int(10) UNSIGNED NOT NULL,
  `emp_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_position` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_phone` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emp_mobile` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_employees`
--

INSERT INTO `db_employees` (`emp_id`, `emp_name`, `emp_position`, `emp_phone`, `emp_mobile`, `emp_email`, `office_id`) VALUES
(1, 'Đặng Thị Thu Hiền', 'Phó TK', NULL, '088828807', 'hiendtt@tlu.edu.vn', 4),
(2, 'Trần Mạnh Tuấn', 'Trưởng BM', NULL, '098433333', 'tmtuan@tlu.edu.vn', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_office`
--

CREATE TABLE `db_office` (
  `office_id` int(10) UNSIGNED NOT NULL,
  `office_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office_phone` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office_website` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office_parent` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_office`
--

INSERT INTO `db_office` (`office_id`, `office_name`, `office_phone`, `office_email`, `office_website`, `office_address`, `office_parent`) VALUES
(1, 'Khoa CNTT', '02435444444', 'cntt@tlu.edu.vn', 'cntt.tlu.edu.vn', 'Nhà C1, Đại học Thủy lợi, 175 Tân Sơn', NULL),
(2, 'Khoa Kinh Tế', '02435444333', 'kinhte@tlu.edu.vn', 'kinhte.tlu.edu.vn', 'Nhà B1, Đại học Thủy lợi, 175 Tân Sơn', NULL),
(3, 'Khoa Cơ khí', '02435445555', 'cokhi@tlu.edu.vn', 'cokhi.tlu.edu.vn', 'Nhà C1, Đại học Thủy lợi, 175 Tân Sơn', NULL),
(4, 'Bộ môn HTTT', '0243511111', 'httt@tlu.edu.vn', 'httt.tlu.edu.vn', 'Nhà C1, Đại học Thủy lợi, 175 Tân Sơn', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_users`
--

CREATE TABLE `db_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_pass` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registration_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) DEFAULT 0,
  `user_level` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_users`
--

INSERT INTO `db_users` (`user_id`, `user_name`, `user_email`, `user_pass`, `registration_date`, `status`, `user_level`) VALUES
(1, 'vtmo', 'vtmo@tlu.edu.vn', 'abcabc', '2021-09-30 13:39:58', 0, 0),
(2, 'ntphuong', 'ntphuong@tlu.edu.vnb', 'abcabc', '2021-09-30 13:39:58', 0, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `db_employees`
--
ALTER TABLE `db_employees`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `office_id` (`office_id`);

--
-- Chỉ mục cho bảng `db_office`
--
ALTER TABLE `db_office`
  ADD PRIMARY KEY (`office_id`),
  ADD KEY `office_parent` (`office_parent`);

--
-- Chỉ mục cho bảng `db_users`
--
ALTER TABLE `db_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `db_employees`
--
ALTER TABLE `db_employees`
  MODIFY `emp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `db_office`
--
ALTER TABLE `db_office`
  MODIFY `office_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `db_users`
--
ALTER TABLE `db_users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `db_employees`
--
ALTER TABLE `db_employees`
  ADD CONSTRAINT `db_employees_ibfk_1` FOREIGN KEY (`office_id`) REFERENCES `db_office` (`office_id`);

--
-- Các ràng buộc cho bảng `db_office`
--
ALTER TABLE `db_office`
  ADD CONSTRAINT `db_office_ibfk_1` FOREIGN KEY (`office_parent`) REFERENCES `db_office` (`office_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
