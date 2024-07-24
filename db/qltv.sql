-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 24, 2024 lúc 08:01 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qltv`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cttra`
--

CREATE TABLE `cttra` (
  `Id` bigint(20) NOT NULL,
  `MaNV` bigint(10) NOT NULL,
  `MaDG` bigint(10) NOT NULL,
  `MaS` bigint(10) NOT NULL,
  `NgayTra` date NOT NULL,
  `SLTra` int(11) NOT NULL,
  `MaK` varchar(10) NOT NULL,
  `QH_Ma` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `docgia`
--

CREATE TABLE `docgia` (
  `Id` bigint(20) NOT NULL,
  `MaDG` varchar(20) NOT NULL,
  `TenDG` varchar(50) NOT NULL,
  `NgaySinh` date NOT NULL,
  `DiaChiDG` text NOT NULL,
  `NgayLapThe` date NOT NULL,
  `TaiKhoanDG` varchar(50) NOT NULL,
  `MatKhauDG` varchar(50) NOT NULL,
  `Mail` varchar(100) NOT NULL,
  `MaL` varchar(10) NOT NULL,
  `TrangThai` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `docgia`
--

INSERT INTO `docgia` (`Id`, `MaDG`, `TenDG`, `NgaySinh`, `DiaChiDG`, `NgayLapThe`, `TaiKhoanDG`, `MatKhauDG`, `Mail`, `MaL`, `TrangThai`) VALUES
(11, '20000', 'Đào Chính Uy', '1985-07-11', 'Cần thơ', '2024-05-31', 'chinhuy', 'e10adc3949ba59abbe56e057f20f883e', 'CHINHUY@gmail.com', 'CNTT', 0),
(12, '200001', 'Nguyễn Minh Thăng', '2000-07-06', 'Thốt Nốt', '2024-05-31', 'minhthang', 'e10adc3949ba59abbe56e057f20f883e', 'minhthang@gmail.com', 'Vận Chuyển', 0),
(13, '1111111', 'Nguyễn Ngọc Trân', '1996-06-05', 'Cần Thơ', '2024-05-31', 'ngoctran', 'e10adc3949ba59abbe56e057f20f883e', 'nguyenngoctran261002@gmail.com', 'Marketting', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoa`
--

CREATE TABLE `khoa` (
  `MaK` varchar(10) NOT NULL,
  `TenK` varchar(50) NOT NULL,
  `DiaChiK` varchar(50) NOT NULL,
  `SDT` varchar(20) NOT NULL,
  `QH_Ma` varchar(255) NOT NULL,
  `QH_Ten` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khoa`
--

INSERT INTO `khoa` (`MaK`, `TenK`, `DiaChiK`, `SDT`, `QH_Ma`, `QH_Ten`) VALUES
('900000', 'Cần Thơ', 'NK', '0987654321', '9010', NULL),
('901000', 'Cái Khế', 'NK', '0987654321', '9010', NULL),
('901150', 'An Hòa', 'NK', '0987654321', '9010', NULL),
('901737', 'Tổ Phát Thư CPN', 'NK', '098700000', '9010', NULL),
('901740', 'KHL', 'NK', '0987654321', '9010', NULL),
('901745', 'Hành Chính Công', 'NK', '0987654321', '9010', NULL),
('901750', 'BCP Cần Thơ', 'NK', '0987654321', '9010', NULL),
('902070', 'Mậu Thân', 'NK', '0987654321', '9010', NULL),
('902220', 'Hưng Lợi', 'NK', '0987654321', '9010', NULL),
('902240', 'Ủy Thác', 'NK', '0987654321', '9010', NULL),
('902430', 'An Bình', 'NK', '0987654321', '9010', NULL),
('902506', 'KDC 91B', 'NK', '0987654321', '9010', NULL),
('902510', 'An Khánh', 'NK', '0987654321', '9010', NULL),
('902800', 'Bình Thủy', 'BT', '0987654321', '9028', NULL),
('902870', 'An Thới', 'BT', '0987654321', '9028', NULL),
('902980', 'BCP Trà Nóc', 'BT', '0987654321', '9028', NULL),
('903040', 'Trà Nóc', 'BT', '0987654321', '9028', NULL),
('903100', 'VHX Long Hòa', 'BT', '0987654321', '9028', NULL),
('903240', 'Long Tuyền', 'BT', '0987654321', '9028', NULL),
('903380', 'Thới An Đông', 'BT', '0987654321', '9028', NULL),
('903670', 'Cái Răng', 'CR', '0987654321', '9037', NULL),
('903720', 'Thường Thạnh', 'CR', '0987654321', '9037', NULL),
('903740', 'VHX Phú Thứ', 'CR', '0987654321', '9037', NULL),
('903885', 'Ba Láng', 'CR', '0987654321', '9037', NULL),
('904000', 'Ô Môn', 'OM', '0987654321', '9040', NULL),
('904060', 'Phước Thới', 'OM', '0987654321', '9040', NULL),
('904110', 'BCP Ô Môn', 'OM', '0987654321', '9040', NULL),
('904120', 'Trường Lạc', 'OM', '0987654321', '9040', NULL),
('904130', 'Thới Long', 'OM', '0987654321', '9040', NULL),
('904200', 'Thốt Nốt', 'TN', '0987654321', '9042', NULL),
('904230', 'Tân Lộc', 'TN', '0987654321', '9042', NULL),
('904245', 'Tân Lộc 1', 'TN', '0987654321', '9042', NULL),
('904250', 'Thới Thuận', 'TN', '0987654321', '9042', NULL),
('904270', 'Trung Nhứt', 'TN', '0987654321', '9042', NULL),
('904287', 'Trung Kiên', 'TN', '0987654321', '9042', NULL),
('904300', 'Trung An', 'CD', '0987654321', '9046', NULL),
('904310', 'Thuận Hưng 1', 'TN', '0987654321', '9042', NULL),
('904311', 'Thuận Hưng', 'TN', '0987654321', '9042', NULL),
('904338', 'Trung Thạnh', 'CD', '0987654321', '9046', NULL),
('904340', 'KT Thốt Nốt', 'TN', '0987654321', '9042', NULL),
('904362', 'Thơm Rơm', 'TN', '0987654321', '9042', NULL),
('904390', 'BCP Thốt Nốt', 'TN', '0987654321', '9042', NULL),
('904400', 'Phong Điền', 'PD', '0987654321', '9044', NULL),
('904401', 'Mỹ Khánh', 'PD', '0987654321', '9044', NULL),
('904420', 'Giai Xuân', 'PD', '0987654321', '9044', NULL),
('904430', 'Tân Thới', 'PD', '0987654321', '9044', NULL),
('904477', 'Nhơn Ái', 'PD', '0987654321', '9044', NULL),
('904490', 'Nhơn Nghĩa', 'PD', '0987654321', '9044', NULL),
('904510', 'Trường Long', 'PD', '0987654321', '9044', NULL),
('904560', 'BCP Phong Điền', 'PD', '0987654321', '9044', NULL),
('904600', 'Thới Lai', 'TL', '0987654321', '9056', NULL),
('904620', 'Thới Thạnh', 'TL', '0987654321', '9056', NULL),
('904640', 'Định Môn', 'TL', '0987654321', '9056', NULL),
('904660', 'Cờ Đỏ', 'CD', '0987654321', '9046', NULL),
('904705', 'Thới Đông', 'CD', '0987654321', '9046', NULL),
('904710', 'Trường Thành', 'TL', '0987654321', '9056', NULL),
('904727', 'VHX Đông Thắng', 'CD', '0987654321', '9046', NULL),
('904730', 'Trường Xuân', 'TL', '0987654321', '9056', NULL),
('904762', 'Trường Xuân A', 'TL', '0987654321', '9056', NULL),
('904770', 'Đông Thuận', 'TL', '0987654321', '9056', NULL),
('904787', 'Xuân Thắng', 'TL', '0987654321', '9056', NULL),
('904790', 'VHX Thới Lai (Thới Tân)', 'TL', '0987654321', '9056', NULL),
('904810', 'Đông Bình', 'TL', '0987654321', '9056', NULL),
('904830', 'Sông Hậu', 'CD', '0987654321', '9046', NULL),
('904841', 'Thới Hưng', 'CD', '0987654321', '9046', NULL),
('904850', 'Đông Hiệp', 'CD', '0987654321', '9046', NULL),
('904910', 'BCP Cờ Đỏ', 'CD', '0987654321', '9046', NULL),
('905000', 'Vĩnh Thạnh', 'VT', '0987654321', '9050', NULL),
('905001', 'TT Thạnh An', 'VT', '0987654321', '9050', NULL),
('905010', 'Thạnh An', 'VT', '0987654321', '9050', NULL),
('905020', 'Thạnh Thắng', 'VT', '0987654321', '9050', NULL),
('905040', 'Thạnh Lộc', 'VT', '0987654321', '9050', NULL),
('905060', 'VHX Thạnh An', 'VT', '0987654321', '9050', NULL),
('905080', 'BCP Vĩnh Thạnh', 'VT', '0987654321', '9050', NULL),
('905090', 'Vĩnh Trinh', 'VT', '0987654321', '9050', NULL),
('905102', 'Vĩnh Trinh 1', 'VT', '0987654321', '9050', NULL),
('905110', 'Thạnh Phú', 'CD', '0987654321', '9046', NULL),
('905111', 'Nông Trường Cờ Đỏ', 'CD', '0987654321', '9046', NULL),
('905116', 'VHX Thạnh Lợi', 'VT', '0987654321', '9050', NULL),
('905119', 'KV NT Cờ Đỏ', 'CD', '0987654321', '9046', NULL),
('905123', 'Vĩnh Bình', 'VT', '0987654321', '9050', NULL),
('905130', 'VHX Thạnh Mỹ', 'VT', '0987654321', '9050', NULL),
('905138', 'Thạnh Mỹ 1', 'VT', '0987654321', '9050', NULL),
('905151', 'Thạnh Quới 1', 'VT', '0987654321', '9050', NULL),
('905170', 'Trung Hưng', 'CD', '0987654321', '9046', NULL),
('905197', 'Thạnh Tiến', 'VT', '0987654321', '9050', NULL),
('905340', 'Phú Thứ (BCP Phú Thứ)', 'CR', '0987654321', '9037', NULL),
('905390', 'BCP Cái Răng', 'CR', '0987654321', '9037', NULL),
('905420', 'TMĐT', 'NK', '0987654321', '9010', NULL),
('905510', 'Long Hưng', 'OM', '0987654321', '9040', NULL),
('905610', 'BCP Thới Lai', 'TL', '0987654321', '9056', NULL),
('905796', 'Trường Xuân B', 'TL', '0987654321', '9056', NULL),
('906040', 'Trà An (BCP Bình Thủy)', 'BT', '0987654321', '9028', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisach`
--

CREATE TABLE `loaisach` (
  `MaLS` bigint(10) NOT NULL,
  `TenLS` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisach`
--

INSERT INTO `loaisach` (`MaLS`, `TenLS`) VALUES
(4, 'Máy In'),
(5, 'Laptop'),
(6, 'Camera'),
(7, 'Bàn Phím'),
(8, 'Dây Cáp'),
(9, 'Màn Hình'),
(10, 'CPU');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

CREATE TABLE `lop` (
  `MaL` varchar(10) NOT NULL,
  `TenL` varchar(50) NOT NULL,
  `MaK` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lop`
--

INSERT INTO `lop` (`MaL`, `TenL`, `MaK`) VALUES
('CNTT', 'MT_CNTT 1', '902070'),
('Kinh Tế ', 'AH_Kinh Tế', '901150'),
('Marketting', 'CT_Marketting', '900000'),
('Vận Chuyển', 'XT_Vận Chuyển 1', '904787');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `muontra`
--

CREATE TABLE `muontra` (
  `Id` bigint(20) NOT NULL,
  `MaNV` bigint(10) NOT NULL,
  `MaDG` bigint(10) NOT NULL,
  `MaS` bigint(10) NOT NULL,
  `NgayMuon` date NOT NULL,
  `NgayTra` date NOT NULL,
  `TrangThai` tinyint(1) NOT NULL DEFAULT 0,
  `SLMuon` int(11) NOT NULL,
  `SLThucTe` int(11) NOT NULL DEFAULT 0,
  `GiaHan` int(1) NOT NULL DEFAULT 0,
  `MaPX` varchar(100) NOT NULL,
  `Ngayxuat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `muontra`
--

INSERT INTO `muontra` (`Id`, `MaNV`, `MaDG`, `MaS`, `NgayMuon`, `NgayTra`, `TrangThai`, `SLMuon`, `SLThucTe`, `GiaHan`, `MaPX`, `Ngayxuat`) VALUES
(66, 331256324, 0, 12345, '0000-00-00', '2024-10-02', 0, 0, 0, 0, '24062024134733', NULL),
(67, 331256324, 0, 1, '0000-00-00', '0000-00-00', 0, 0, 0, 0, '24062024134733', NULL),
(68, 331256324, 0, 2, '0000-00-00', '0000-00-00', 0, 0, 0, 0, '24062024134733', NULL),
(70, 331256324, 0, 1234, '0000-00-00', '0000-00-00', 0, 0, 0, 0, '29062024004809', NULL),
(72, 331256324, 0, 123445, '0000-00-00', '0000-00-00', 0, 0, 0, 0, '02072024102849', NULL),
(73, 331256324, 0, 1234455, '0000-00-00', '0000-00-00', 0, 0, 0, 0, '02072024104601', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `Id` bigint(20) NOT NULL,
  `MaNV` varchar(10) NOT NULL,
  `TenNV` varchar(50) NOT NULL,
  `DiaChiNV` text NOT NULL,
  `TenDangNhap` varchar(50) NOT NULL,
  `MatKhau` varchar(50) NOT NULL,
  `Mail` varchar(100) NOT NULL,
  `TrangThaiNV` int(1) DEFAULT 0,
  `HeSoPhuCap` float NOT NULL DEFAULT 1,
  `LoaiNV` int(2) NOT NULL DEFAULT 2,
  `DaXoa` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`Id`, `MaNV`, `TenNV`, `DiaChiNV`, `TenDangNhap`, `MatKhau`, `Mail`, `TrangThaiNV`, `HeSoPhuCap`, `LoaiNV`, `DaXoa`) VALUES
(7, '331256324', 'Nguyễn Ngọc Trân', 'TP. Cần Thơ', 'admin', '202cb962ac59075b964b07152d234b70', 'nnt2610ntdn@gmail.com', 0, 3.2, 1, 0),
(12, '1234', 'nguyễn nGọc Trân', 'CẦN THƠ', 'tran', 'e10adc3949ba59abbe56e057f20f883e', 'admin@gmail.com', 0, 2.1, 0, 0),
(14, '123', 'nguyễn nGọc Trân', 'fff', 'tran1', 'e10adc3949ba59abbe56e057f20f883e', '1@gmail.com', 0, 4.56, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhapsach`
--

CREATE TABLE `nhapsach` (
  `id` bigint(20) NOT NULL,
  `NgayNhap` date NOT NULL,
  `MaS` bigint(10) NOT NULL,
  `SoLuong` int(10) NOT NULL,
  `GhiChu` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhaxuatban`
--

CREATE TABLE `nhaxuatban` (
  `MaNXB` bigint(10) NOT NULL,
  `TenNXB` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhaxuatban`
--

INSERT INTO `nhaxuatban` (`MaNXB`, `TenNXB`) VALUES
(5, 'Trung Quốc'),
(6, 'Mỹ'),
(7, 'Viet Nam'),
(8, 'Nhật Bản');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieunhap`
--

CREATE TABLE `phieunhap` (
  `MaPN` varchar(100) NOT NULL,
  `Ngaynhap` date NOT NULL,
  `MoTa` text NOT NULL,
  `MaNV` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phieunhap`
--

INSERT INTO `phieunhap` (`MaPN`, `Ngaynhap`, `MoTa`, `MaNV`) VALUES
('02072024041455', '2024-07-09', 'ghi chú', '331256324'),
('02072024041526', '2024-07-04', '1', '331256324'),
('02072024051309', '2024-07-03', '11312321412DSFDSG', '331256324'),
('02072024114722', '2024-07-11', 'ghi chú', '331256324'),
('24062024134643', '2024-06-12', '3', '331256324'),
('29062024005526', '2024-06-06', 'ghi chú1', '331256324');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieuxuat`
--

CREATE TABLE `phieuxuat` (
  `MaPX` varchar(100) NOT NULL,
  `Ngayxuat` date NOT NULL,
  `MoTa` text NOT NULL,
  `MaNV` varchar(10) NOT NULL,
  `MaK` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phieuxuat`
--

INSERT INTO `phieuxuat` (`MaPX`, `Ngayxuat`, `MoTa`, `MaNV`, `MaK`) VALUES
('02072024102849', '2024-07-04', '12222222222', '331256324', '903885'),
('02072024104601', '2024-07-09', 'aba213', '331256324', '904120'),
('24062024134733', '2024-06-13', '1', '331256324', '904705'),
('29062024004809', '2024-06-01', 'ghi chú 1', '331256324', '903670');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quanhuyen`
--

CREATE TABLE `quanhuyen` (
  `QH_Ma` varchar(255) NOT NULL,
  `QH_Ten` varchar(255) DEFAULT NULL,
  `MaK` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `quanhuyen`
--

INSERT INTO `quanhuyen` (`QH_Ma`, `QH_Ten`, `MaK`) VALUES
('9010', 'Ninh Kiều', ''),
('9028', 'Bình Thủy', ''),
('9037', 'Cái Răng', ''),
('9040', 'Ô Môn', ''),
('9042', 'Thốt Nốt', ''),
('9044', 'Phong Điền', ''),
('9046', 'Cờ Đỏ', ''),
('9050', 'Vĩnh Thạnh', ''),
('9056', 'Thới Lai', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sach`
--

CREATE TABLE `sach` (
  `MaS` bigint(10) NOT NULL,
  `TenS` varchar(50) NOT NULL,
  `MaLS` bigint(10) NOT NULL,
  `MaTG` bigint(10) NOT NULL,
  `MaNXB` bigint(10) NOT NULL,
  `NamXB` int(11) NOT NULL,
  `SoTrang` int(11) NOT NULL,
  `HinhAnhS` text NOT NULL,
  `SL` int(11) NOT NULL,
  `Gia` decimal(11,0) NOT NULL,
  `NgayNhap` date NOT NULL,
  `XoaSach` int(1) NOT NULL DEFAULT 0,
  `MaPN` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sach`
--

INSERT INTO `sach` (`MaS`, `TenS`, `MaLS`, `MaTG`, `MaNXB`, `NamXB`, `SoTrang`, `HinhAnhS`, `SL`, `Gia`, `NgayNhap`, `XoaSach`, `MaPN`) VALUES
(1, 'MÁY TÍNH', 8, 6, 5, 2021, 8, '', 0, 200000, '2024-06-11', 0, '24062024134643'),
(2, 'laptop 98', 6, 6, 5, 2021, 122, '', 0, 346000, '2024-06-28', 0, '24062024134643'),
(3, 'MÁY TÍNH', 5, 6, 5, 2021, 8, '', 0, 200000, '2024-06-20', 0, '24062024134643'),
(1234, 'MÁY TÍNH', 5, 6, 5, 2021, 128, '', 0, 6880000, '2024-06-28', 0, '29062024005526'),
(12345, 'MÁY TÍNH', 6, 6, 5, 2021, 122, '', 0, 200000, '2024-06-05', 0, '24062024134643'),
(123445, 'MÁY TÍNH', 5, 6, 5, 2021, 8, '', 0, 200000, '2024-07-11', 0, '02072024041526'),
(1234455, 'MÁY TÍNH', 5, 6, 5, 2021, 8, '', 0, 200000, '2024-07-11', 0, '02072024041526');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tacgia`
--

CREATE TABLE `tacgia` (
  `MaTG` bigint(10) NOT NULL,
  `TenTG` varchar(11) NOT NULL,
  `DiaChiTG` text NOT NULL,
  `MoTa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tacgia`
--

INSERT INTO `tacgia` (`MaTG`, `TenTG`, `DiaChiTG`, `MoTa`) VALUES
(6, 'ASUS', '40 Lý Tự Trọng, Phường An Cư, Quận Ninh Kiều, Cần Thơ', 'Cần Thơ'),
(7, 'DELL', '211/2 Nguyễn Văn Linh.Q Ninh Kiều, Tp Cần Thơ', '0292-3783599'),
(8, 'APPLE', '115 Thái Hà, P. Trung Liệt, Q. Đống Đa.', 'Hà Nội'),
(9, 'Panasonic.', 'cần thơ', '000000'),
(10, 'Hikvision.', 'Hikvision.', 'Hikvision.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xuatsach`
--

CREATE TABLE `xuatsach` (
  `id` bigint(20) NOT NULL,
  `NgayXuat` date NOT NULL,
  `MaS` bigint(10) NOT NULL,
  `SoLuong` int(10) NOT NULL,
  `GhiChu` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `xuatsach`
--

INSERT INTO `xuatsach` (`id`, `NgayXuat`, `MaS`, `SoLuong`, `GhiChu`) VALUES
(19, '2024-07-02', 1212121212, 0, 'hư');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cttra`
--
ALTER TABLE `cttra`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `docgia`
--
ALTER TABLE `docgia`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `MaDG` (`MaDG`);

--
-- Chỉ mục cho bảng `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`MaK`);

--
-- Chỉ mục cho bảng `loaisach`
--
ALTER TABLE `loaisach`
  ADD PRIMARY KEY (`MaLS`);

--
-- Chỉ mục cho bảng `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`MaL`);

--
-- Chỉ mục cho bảng `muontra`
--
ALTER TABLE `muontra`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `TenDangNhap` (`TenDangNhap`),
  ADD UNIQUE KEY `Mail` (`Mail`),
  ADD UNIQUE KEY `MaNV` (`MaNV`);

--
-- Chỉ mục cho bảng `nhapsach`
--
ALTER TABLE `nhapsach`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhaxuatban`
--
ALTER TABLE `nhaxuatban`
  ADD PRIMARY KEY (`MaNXB`);

--
-- Chỉ mục cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`MaPN`);

--
-- Chỉ mục cho bảng `phieuxuat`
--
ALTER TABLE `phieuxuat`
  ADD PRIMARY KEY (`MaPX`);

--
-- Chỉ mục cho bảng `quanhuyen`
--
ALTER TABLE `quanhuyen`
  ADD PRIMARY KEY (`QH_Ma`);

--
-- Chỉ mục cho bảng `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`MaS`);

--
-- Chỉ mục cho bảng `tacgia`
--
ALTER TABLE `tacgia`
  ADD PRIMARY KEY (`MaTG`);

--
-- Chỉ mục cho bảng `xuatsach`
--
ALTER TABLE `xuatsach`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cttra`
--
ALTER TABLE `cttra`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `docgia`
--
ALTER TABLE `docgia`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `loaisach`
--
ALTER TABLE `loaisach`
  MODIFY `MaLS` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `muontra`
--
ALTER TABLE `muontra`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `nhapsach`
--
ALTER TABLE `nhapsach`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `nhaxuatban`
--
ALTER TABLE `nhaxuatban`
  MODIFY `MaNXB` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tacgia`
--
ALTER TABLE `tacgia`
  MODIFY `MaTG` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `xuatsach`
--
ALTER TABLE `xuatsach`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
