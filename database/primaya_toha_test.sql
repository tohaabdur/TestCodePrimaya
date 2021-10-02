-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 02 Okt 2021 pada 10.23
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `primaya_toha_test`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `counter_trans`
--

CREATE TABLE `counter_trans` (
  `Date` date NOT NULL,
  `ID_Order` int(11) NOT NULL,
  `ID_Payment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `counter_trans`
--

INSERT INTO `counter_trans` (`Date`, `ID_Order`, `ID_Payment`) VALUES
('2021-10-01', 7, 1),
('2021-10-02', 11, 6),
('2021-10-03', 1, 1),
('2021-10-04', 1, 1),
('2021-10-05', 1, 1),
('2021-10-06', 1, 1),
('2021-10-07', 1, 1),
('2021-10-08', 1, 1),
('2021-10-09', 1, 1),
('2021-10-10', 1, 1),
('2021-10-11', 1, 1),
('2021-10-12', 1, 1),
('2021-10-13', 1, 1),
('2021-10-14', 1, 1),
('2021-10-15', 1, 1),
('2021-10-16', 1, 1),
('2021-10-17', 1, 1),
('2021-10-18', 1, 1),
('2021-10-19', 1, 1),
('2021-10-20', 1, 1),
('2021-10-21', 1, 1),
('2021-10-22', 1, 1),
('2021-10-23', 1, 1),
('2021-10-24', 1, 1),
('2021-10-25', 1, 1),
('2021-10-26', 1, 1),
('2021-10-27', 1, 1),
('2021-10-28', 1, 1),
('2021-10-29', 1, 1),
('2021-10-30', 1, 1),
('2021-10-31', 1, 1),
('2021-11-01', 1, 1),
('2021-11-02', 1, 1),
('2021-11-03', 1, 1),
('2021-11-04', 1, 1),
('2021-11-05', 1, 1),
('2021-11-06', 1, 1),
('2021-11-07', 1, 1),
('2021-11-08', 1, 1),
('2021-11-09', 1, 1),
('2021-11-10', 1, 1),
('2021-11-11', 1, 1),
('2021-11-12', 1, 1),
('2021-11-13', 1, 1),
('2021-11-14', 1, 1),
('2021-11-15', 1, 1),
('2021-11-16', 1, 1),
('2021-11-17', 1, 1),
('2021-11-18', 1, 1),
('2021-11-19', 1, 1),
('2021-11-20', 1, 1),
('2021-11-21', 1, 1),
('2021-11-22', 1, 1),
('2021-11-23', 1, 1),
('2021-11-24', 1, 1),
('2021-11-25', 1, 1),
('2021-11-26', 1, 1),
('2021-11-27', 1, 1),
('2021-11-28', 1, 1),
('2021-11-29', 1, 1),
('2021-11-30', 1, 1),
('2021-12-01', 1, 1),
('2021-12-02', 1, 1),
('2021-12-03', 1, 1),
('2021-12-04', 1, 1),
('2021-12-05', 1, 1),
('2021-12-06', 1, 1),
('2021-12-07', 1, 1),
('2021-12-08', 1, 1),
('2021-12-09', 1, 1),
('2021-12-10', 1, 1),
('2021-12-11', 1, 1),
('2021-12-12', 1, 1),
('2021-12-13', 1, 1),
('2021-12-14', 1, 1),
('2021-12-15', 1, 1),
('2021-12-16', 1, 1),
('2021-12-17', 1, 1),
('2021-12-18', 1, 1),
('2021-12-19', 1, 1),
('2021-12-20', 1, 1),
('2021-12-21', 1, 1),
('2021-12-22', 1, 1),
('2021-12-23', 1, 1),
('2021-12-24', 1, 1),
('2021-12-25', 1, 1),
('2021-12-26', 1, 1),
('2021-12-27', 1, 1),
('2021-12-28', 1, 1),
('2021-12-29', 1, 1),
('2021-12-30', 1, 1),
('2021-12-31', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_activity`
--

CREATE TABLE `log_activity` (
  `ID` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL,
  `Activity` char(100) NOT NULL,
  `DateTime` datetime NOT NULL DEFAULT current_timestamp(),
  `IPAddress` char(20) NOT NULL,
  `UserAgent` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `log_activity`
--

INSERT INTO `log_activity` (`ID`, `ID_User`, `Activity`, `DateTime`, `IPAddress`, `UserAgent`) VALUES
(1, 1, 'Success Login', '2021-10-01 11:15:37', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(2, 1, 'Success Login', '2021-10-01 11:17:43', '::1', 'PostmanRuntime/7.28.4'),
(3, 1, 'Success Login', '2021-10-01 11:23:42', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(4, 1, 'Success Login', '2021-10-01 11:23:57', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(5, 1, 'Success Login', '2021-10-01 11:24:43', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(6, 1, 'Success Login', '2021-10-01 11:27:02', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(7, 2, 'Success Login', '2021-10-01 12:03:37', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(8, 1, 'Success Login', '2021-10-01 12:27:35', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(9, 1, 'Loged out', '2021-10-01 12:35:49', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(10, 1, 'Loged out', '2021-10-01 12:36:39', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(11, 2, 'Success Login', '2021-10-01 12:39:29', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(12, 2, 'Success Login', '2021-10-01 16:01:43', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(13, 2, 'Success Login', '2021-10-01 16:08:56', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(14, 2, 'Success Login', '2021-10-01 17:29:56', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(15, 2, 'Success Login', '2021-10-02 02:42:51', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(16, 2, 'Success Login', '2021-10-02 02:51:25', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(17, 2, 'Loged out', '2021-10-02 03:27:07', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(18, 2, 'Success Login', '2021-10-02 03:27:25', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(19, 2, 'Update Order PSN20211002-002 Product 30', '2021-10-02 03:53:17', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(20, 2, 'Delete Product 4 From Order PSN20211001-006', '2021-10-02 03:53:35', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(21, 2, 'Delete Product 30 From Order PSN20211001-004', '2021-10-02 03:54:15', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(22, 2, 'Delete Product 29 From Order PSN20211001-007', '2021-10-02 03:54:24', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(23, 2, 'Update Order PSN20211001-007 Product 31', '2021-10-02 03:54:30', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(24, 2, 'Delete Order PSN20211001-004', '2021-10-02 03:59:25', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(25, 2, 'Create Order PSN20211002-003', '2021-10-02 04:04:55', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(26, 2, 'Delete Order PSN20211002-003', '2021-10-02 04:05:30', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(27, 2, 'Create Order PSN20211002-004', '2021-10-02 04:06:15', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(28, 2, 'Update Order PSN20211002-004 Product 3', '2021-10-02 04:06:26', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(29, 2, 'Update Order PSN20211002-004 Product 3', '2021-10-02 04:08:26', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(30, 2, 'Success Login', '2021-10-02 05:34:00', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(31, 2, 'Success Login', '2021-10-02 06:04:07', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(32, 2, 'Create Order PSN20211002-005', '2021-10-02 06:28:59', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(33, 2, 'Update Order PSN20211002-005 Product 3', '2021-10-02 06:29:40', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(34, 2, 'Success Login', '2021-10-02 06:31:32', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(35, 2, 'Create Payment BYR20211002-002', '2021-10-02 06:36:18', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(36, 2, 'Create Order PSN20211002-006', '2021-10-02 06:39:00', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(37, 2, 'Create Order PSN20211002-007', '2021-10-02 06:39:08', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(38, 2, 'Create Order PSN20211002-008', '2021-10-02 06:39:17', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(39, 2, 'Create Order PSN20211002-009', '2021-10-02 06:39:23', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(40, 2, 'Create Order PSN20211002-010', '2021-10-02 06:46:05', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(41, 2, 'Create Payment BYR20211002-005', '2021-10-02 06:46:17', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(42, 2, 'Delete Payment BYR20211002-002', '2021-10-02 07:01:21', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(43, 2, 'Create Payment BYR20211002-006', '2021-10-02 07:02:08', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(44, 2, 'Create Order PSN20211002-011', '2021-10-02 07:09:17', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(45, 2, 'Create product Test', '2021-10-02 08:01:16', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(46, 2, 'Update product Test2', '2021-10-02 08:09:09', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(47, 2, 'Success Login', '2021-10-02 08:14:12', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(48, 2, 'Update product Test2', '2021-10-02 08:15:16', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(49, 2, 'Delete product 34', '2021-10-02 08:17:37', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(50, 2, 'Delete product 33', '2021-10-02 08:18:00', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(51, 2, 'Delete product 32', '2021-10-02 08:20:06', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(52, 2, 'Delete product 31', '2021-10-02 08:20:16', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(53, 2, 'Loged out', '2021-10-02 08:24:29', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(54, 1, 'Success Login', '2021-10-02 08:24:33', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(55, 2, 'Success Login', '2021-10-02 09:09:36', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(56, 1, 'Success Login', '2021-10-02 09:59:43', '::1', 'PostmanRuntime/7.28.4'),
(57, 2, 'Loged out', '2021-10-02 10:11:59', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(58, 1, 'Success Login', '2021-10-02 10:12:03', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36'),
(59, 1, 'Loged out', '2021-10-02 10:12:12', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4655.5 Safari/537.36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_category`
--

CREATE TABLE `master_category` (
  `ID` int(11) NOT NULL,
  `Name` char(30) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `master_category`
--

INSERT INTO `master_category` (`ID`, `Name`, `Status`) VALUES
(1, 'Makanan', 1),
(2, 'Minuman', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_menu`
--

CREATE TABLE `master_menu` (
  `ID` int(11) NOT NULL,
  `URL` varchar(50) NOT NULL,
  `Icon` varchar(50) NOT NULL,
  `Color` varchar(10) NOT NULL,
  `Title` char(30) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `master_menu`
--

INSERT INTO `master_menu` (`ID`, `URL`, `Icon`, `Color`, `Title`, `Status`) VALUES
(1, 'order', 'order.png', '#98AFC7', 'Pemesanan', 1),
(2, 'payment', 'payment.png', '#DCDCDC', 'Pembayaran', 1),
(3, 'product', 'product.png', '#BCC6CC', 'Atur Produk', 1),
(4, 'report', 'report.png', '#C9C0BB', 'Laporan', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_payment_method`
--

CREATE TABLE `master_payment_method` (
  `ID` int(11) NOT NULL,
  `PaymentMethod` char(30) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `master_payment_method`
--

INSERT INTO `master_payment_method` (`ID`, `PaymentMethod`, `Status`) VALUES
(1, 'Tunai', 1),
(2, 'Kartu Kredit', 1),
(3, 'Kartu Debit', 1),
(4, 'e-Money', 1),
(5, 'e-Wallet', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_product`
--

CREATE TABLE `master_product` (
  `ID` int(11) NOT NULL,
  `Name` char(30) NOT NULL,
  `ID_Category` int(11) NOT NULL,
  `ID_Subcategory` int(11) NOT NULL,
  `ID_Unit` int(11) NOT NULL,
  `Price` float NOT NULL,
  `FlagReady` tinyint(4) NOT NULL DEFAULT 1,
  `Image` varchar(50) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  `AddDate` datetime DEFAULT NULL,
  `AddUser` int(11) DEFAULT NULL,
  `EditDate` datetime DEFAULT NULL,
  `EditUser` int(11) DEFAULT NULL,
  `DeleteDate` datetime DEFAULT NULL,
  `DeleteUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `master_product`
--

INSERT INTO `master_product` (`ID`, `Name`, `ID_Category`, `ID_Subcategory`, `ID_Unit`, `Price`, `FlagReady`, `Image`, `Status`, `AddDate`, `AddUser`, `EditDate`, `EditUser`, `DeleteDate`, `DeleteUser`) VALUES
(1, 'Nasi Goreng', 1, 1, 2, 20000, 1, 'dummy.jpeg', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Nasi Padang', 1, 1, 2, 19000, 1, 'dummy.jpeg', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Nasi Rames', 1, 1, 2, 18000, 1, 'dummy.jpeg', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Mie Goreng', 1, 1, 2, 17000, 1, 'dummy.jpeg', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Mie Rebus', 1, 1, 2, 17000, 1, 'dummy.jpeg', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Mie Ayam', 1, 1, 2, 20000, 1, 'dummy.jpeg', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Kwetiau Goreng', 1, 1, 2, 20000, 1, 'dummy.jpeg', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Kwetiau Rebus', 1, 1, 2, 20000, 1, 'dummy.jpeg', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Bakwan', 1, 2, 1, 2000, 1, 'dummy.jpeg', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Lumpia Basah', 1, 2, 1, 5000, 1, 'dummy.jpeg', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Martabak Telur', 1, 2, 1, 2000, 1, 'dummy.jpeg', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Batagor', 1, 2, 1, 10000, 1, 'dummy.jpeg', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Surabi', 1, 3, 1, 2000, 1, 'dummy.jpeg', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'Martabak Manis', 1, 3, 1, 30000, 1, 'dummy.jpeg', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'Nagasari', 1, 3, 1, 5000, 1, 'dummy.jpeg', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'Putu Mayang', 1, 3, 1, 2000, 1, 'dummy.jpeg', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Lapis Legit', 1, 3, 1, 2000, 1, 'dummy.jpeg', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'Kue Pukis', 1, 3, 2, 2000, 1, 'dummy.jpeg', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'Klepon', 1, 3, 2, 2500, 1, 'dummy.jpeg', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'Teh Manis Panas', 2, 4, 5, 5000, 1, 'dummy.jpeg', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'Jahe Susu', 2, 4, 5, 10000, 1, 'dummy.jpeg', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'Kopi Hitam Panas', 2, 4, 5, 10000, 1, 'dummy.jpeg', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'Kopi Susu Panas', 2, 4, 5, 15000, 1, 'dummy.jpeg', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'Teh Tawar Panas', 2, 4, 5, 5000, 1, 'dummy.jpeg', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'Teh Manis Dingin', 2, 5, 5, 5000, 1, 'dummy.jpeg', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'Kopi Susu Dingin', 2, 5, 5, 15000, 1, 'dummy.jpeg', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'Teh Tawar Dingin', 2, 5, 5, 5000, 1, 'dummy.jpeg', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'Soda Gembira', 2, 5, 5, 15000, 1, 'dummy.jpeg', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'Es Krim Coklat', 2, 6, 2, 20000, 1, 'dummy.jpeg', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'Es Krim Vanilla', 2, 6, 2, 20000, 1, 'dummy.jpeg', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'Es Krim Strawberry', 2, 6, 2, 20000, 1, 'dummy.jpeg', 0, NULL, NULL, NULL, NULL, '2021-10-02 08:20:16', 2),
(32, 'Test', 2, 6, 4, 120000, 1, 'test.png', 0, '2021-10-02 08:00:26', NULL, NULL, NULL, '2021-10-02 08:20:06', 2),
(33, 'Test', 2, 6, 4, 120000, 1, 'test.png', 0, '2021-10-02 08:00:57', NULL, NULL, NULL, '2021-10-02 08:18:00', 2),
(34, 'Test2', 1, 2, 5, 1200000, 0, 'test.png1', 0, '2021-10-02 08:15:16', 2, NULL, NULL, '2021-10-02 08:17:37', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_subcategory`
--

CREATE TABLE `master_subcategory` (
  `ID` int(11) NOT NULL,
  `Name` char(30) NOT NULL,
  `ID_Category` int(11) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `master_subcategory`
--

INSERT INTO `master_subcategory` (`ID`, `Name`, `ID_Category`, `Status`) VALUES
(1, 'Main Course', 1, 1),
(2, 'Appetizer', 1, 1),
(3, 'Dessert', 1, 1),
(4, 'Hot Drink', 2, 1),
(5, 'Cold Drink', 2, 1),
(6, 'Ice Cream', 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_table`
--

CREATE TABLE `master_table` (
  `ID` int(11) NOT NULL,
  `Name` char(20) NOT NULL,
  `CounterTrans` tinyint(4) NOT NULL DEFAULT 0,
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `master_table`
--

INSERT INTO `master_table` (`ID`, `Name`, `CounterTrans`, `Status`) VALUES
(1, 'Meja 1', 0, 1),
(2, 'Meja 2', 0, 1),
(3, 'Meja 3', 1, 1),
(4, 'Meja 4', 0, 1),
(5, 'Meja 5', 0, 1),
(6, 'Meja 6', 0, 1),
(7, 'Meja 7', 0, 1),
(8, 'Meja 8', 0, 1),
(9, 'Meja 9', 0, 1),
(10, 'Meja 10', 0, 1),
(11, 'Meja 11', 0, 1),
(12, 'Meja 12', 1, 1),
(13, 'Meja 13', 0, 1),
(14, 'Meja 14', 0, 1),
(15, 'Meja 15', 0, 1),
(16, 'Meja 16', 0, 1),
(17, 'Meja 17', 0, 1),
(18, 'Meja 18', 0, 1),
(19, 'Meja 19', 0, 1),
(20, 'Meja 20', 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_unit`
--

CREATE TABLE `master_unit` (
  `ID` int(11) NOT NULL,
  `Unit` char(20) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `master_unit`
--

INSERT INTO `master_unit` (`ID`, `Unit`, `Status`) VALUES
(1, 'Pcs', 1),
(2, 'Porsi', 1),
(3, 'Piring', 1),
(4, 'Pack', 1),
(5, 'Gelas', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_user`
--

CREATE TABLE `master_user` (
  `ID` int(11) NOT NULL,
  `Name` char(50) NOT NULL,
  `ID_UserLevel` int(11) NOT NULL,
  `Username` char(20) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `master_user`
--

INSERT INTO `master_user` (`ID`, `Name`, `ID_UserLevel`, `Username`, `Password`, `Status`) VALUES
(1, 'Budi', 1, 'budi', '00dfc53ee86af02e742515cdcf075ed3', 1),
(2, 'Andi', 2, 'andi', 'ce0e5bf55e4f71749eade7a8b95c4e46', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_user_level`
--

CREATE TABLE `master_user_level` (
  `ID` int(11) NOT NULL,
  `Userlevel` char(20) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `master_user_level`
--

INSERT INTO `master_user_level` (`ID`, `Userlevel`, `Status`) VALUES
(1, 'Pelayan', 1),
(2, 'Kasir', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_user_permission`
--

CREATE TABLE `master_user_permission` (
  `ID` int(11) NOT NULL,
  `ID_UserLevel` int(11) NOT NULL,
  `ID_Menu` int(11) NOT NULL,
  `FlagView` tinyint(4) NOT NULL DEFAULT 1,
  `FlagAdd` tinyint(4) NOT NULL DEFAULT 1,
  `FlagEdit` tinyint(4) NOT NULL DEFAULT 1,
  `FlagDelete` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `master_user_permission`
--

INSERT INTO `master_user_permission` (`ID`, `ID_UserLevel`, `ID_Menu`, `FlagView`, `FlagAdd`, `FlagEdit`, `FlagDelete`) VALUES
(1, 1, 1, 1, 1, 1, 1),
(2, 1, 2, 0, 0, 0, 0),
(3, 1, 3, 0, 0, 0, 0),
(4, 1, 4, 1, 1, 1, 1),
(5, 2, 1, 1, 1, 1, 1),
(6, 2, 2, 1, 1, 1, 1),
(7, 2, 3, 1, 1, 1, 1),
(8, 2, 4, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `setup`
--

CREATE TABLE `setup` (
  `PPNPersen` float NOT NULL,
  `SCPersen` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `setup`
--

INSERT INTO `setup` (`PPNPersen`, `SCPersen`) VALUES
(10, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `trans_order_detail`
--

CREATE TABLE `trans_order_detail` (
  `ID` char(15) NOT NULL,
  `Counter` tinyint(4) NOT NULL DEFAULT 1,
  `ID_Product` int(11) NOT NULL,
  `Price` float NOT NULL,
  `Qty` float NOT NULL,
  `Total` double NOT NULL,
  `Notes` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `trans_order_detail`
--

INSERT INTO `trans_order_detail` (`ID`, `Counter`, `ID_Product`, `Price`, `Qty`, `Total`, `Notes`) VALUES
('PSN20211001-004', 0, 31, 20000, 1, 20000, ''),
('PSN20211001-005', 0, 1, 20000, 3, 60000, 'tidak pedas'),
('PSN20211001-006', 0, 2, 19000, 1, 19000, ''),
('PSN20211001-007', 0, 26, 15000, 90, 1350000, ''),
('PSN20211001-007', 1, 28, 15000, 1, 15000, ''),
('PSN20211001-007', 2, 31, 20000, 12, 240000, 'as'),
('PSN20211001-007', 3, 30, 20000, 1, 20000, ''),
('PSN20211002-002', 0, 30, 20000, 122, 2440000, 'test212'),
('PSN20211002-002', 1, 30, 20000, 20, 400000, ''),
('PSN20211002-003', 0, 2, 19000, 1, 19000, ''),
('PSN20211002-003', 1, 3, 18000, 1, 18000, ''),
('PSN20211002-004', 0, 1, 20000, 1, 20000, ''),
('PSN20211002-004', 1, 3, 18000, 321, 5778000, '321'),
('PSN20211002-005', 0, 3, 18000, 10, 180000, '123'),
('PSN20211002-005', 1, 5, 17000, 1, 17000, ''),
('PSN20211002-006', 0, 3, 18000, 1, 18000, ''),
('PSN20211002-006', 1, 2, 19000, 1, 19000, ''),
('PSN20211002-007', 0, 2, 19000, 1, 19000, ''),
('PSN20211002-007', 1, 3, 18000, 1, 18000, ''),
('PSN20211002-008', 0, 7, 20000, 1, 20000, ''),
('PSN20211002-008', 1, 8, 20000, 1, 20000, ''),
('PSN20211002-009', 0, 3, 18000, 1, 18000, ''),
('PSN20211002-010', 0, 2, 19000, 1, 19000, ''),
('PSN20211002-011', 0, 2, 19000, 1, 19000, ''),
('PSN20211002-011', 1, 3, 18000, 1, 18000, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trans_order_header`
--

CREATE TABLE `trans_order_header` (
  `ID` char(15) NOT NULL,
  `DateTime` datetime NOT NULL DEFAULT current_timestamp(),
  `ID_User` int(11) NOT NULL,
  `ID_Table` int(11) NOT NULL,
  `Total` double NOT NULL,
  `FlagPayment` tinyint(4) NOT NULL DEFAULT 0,
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  `AddDate` datetime DEFAULT NULL,
  `AddUser` int(11) DEFAULT NULL,
  `EditDate` datetime DEFAULT NULL,
  `EditUser` int(11) DEFAULT NULL,
  `DeleteDate` datetime DEFAULT NULL,
  `DeleteUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `trans_order_header`
--

INSERT INTO `trans_order_header` (`ID`, `DateTime`, `ID_User`, `ID_Table`, `Total`, `FlagPayment`, `Status`, `AddDate`, `AddUser`, `EditDate`, `EditUser`, `DeleteDate`, `DeleteUser`) VALUES
('PSN20211001-004', '2021-10-01 21:02:10', 2, 2, 20000, 0, 0, '2021-10-01 21:02:10', 2, '2021-10-02 03:54:15', 2, '2021-10-02 03:59:25', 2),
('PSN20211001-005', '2021-10-01 21:05:54', 2, 10, 60000, 0, 0, '2021-10-01 21:05:54', 2, NULL, NULL, '2021-10-02 03:59:25', 2),
('PSN20211001-006', '2021-10-01 21:07:09', 2, 10, 19000, 0, 0, '2021-10-01 21:07:09', 2, '2021-10-02 03:53:35', 2, '2021-10-02 03:59:25', 2),
('PSN20211001-007', '2021-10-01 21:07:50', 2, 4, 1625000, 0, 0, '2021-10-01 21:07:50', 2, '2021-10-02 03:54:30', 2, '2021-10-02 03:59:25', 2),
('PSN20211002-002', '2021-10-02 03:28:07', 2, 10, 2840000, 0, 0, '2021-10-02 03:28:07', 2, '2021-10-02 03:53:17', 2, '2021-10-02 03:59:25', 2),
('PSN20211002-003', '2021-10-02 04:04:55', 2, 10, 37000, 0, 0, '2021-10-02 04:04:55', 2, NULL, NULL, '2021-10-02 04:05:30', 2),
('PSN20211002-004', '2021-10-02 04:06:15', 2, 1, 5798000, 1, 1, '2021-10-02 04:06:15', 2, '2021-10-02 04:08:26', 2, NULL, NULL),
('PSN20211002-005', '2021-10-02 06:28:59', 2, 12, 197000, 0, 1, '2021-10-02 06:28:59', 2, '2021-10-02 06:29:40', 2, NULL, NULL),
('PSN20211002-006', '2021-10-02 06:39:00', 2, 1, 37000, 1, 1, '2021-10-02 06:39:00', 2, NULL, NULL, NULL, NULL),
('PSN20211002-007', '2021-10-02 06:39:08', 2, 2, 37000, 1, 1, '2021-10-02 06:39:08', 2, NULL, NULL, NULL, NULL),
('PSN20211002-008', '2021-10-02 06:39:17', 2, 2, 40000, 1, 1, '2021-10-02 06:39:17', 2, NULL, NULL, NULL, NULL),
('PSN20211002-009', '2021-10-02 06:39:23', 2, 7, 18000, 1, 1, '2021-10-02 06:39:23', 2, NULL, NULL, NULL, NULL),
('PSN20211002-010', '2021-10-02 06:46:05', 2, 6, 19000, 1, 1, '2021-10-02 06:46:05', 2, NULL, NULL, NULL, NULL),
('PSN20211002-011', '2021-10-02 07:09:17', 2, 3, 37000, 0, 1, '2021-10-02 07:09:17', 2, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `trans_payment_detail`
--

CREATE TABLE `trans_payment_detail` (
  `ID` char(15) NOT NULL,
  `ID_Order` char(15) NOT NULL,
  `TotalOrder` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `trans_payment_detail`
--

INSERT INTO `trans_payment_detail` (`ID`, `ID_Order`, `TotalOrder`) VALUES
('BYR20211002-002', 'PSN20211002-004', 5798000),
('BYR20211002-002', 'PSN20211002-005', 197000),
('BYR20211002-003', 'PSN20211002-006', 37000),
('BYR20211002-003', 'PSN20211002-008', 40000),
('BYR20211002-003', 'PSN20211002-009', 18000),
('BYR20211002-004', 'PSN20211002-007', 37000),
('BYR20211002-005', 'PSN20211002-010', 19000),
('BYR20211002-006', 'PSN20211002-004', 5798000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `trans_payment_header`
--

CREATE TABLE `trans_payment_header` (
  `ID` char(15) NOT NULL,
  `DateTime` datetime NOT NULL,
  `ID_User` int(11) NOT NULL,
  `ID_PaymentMethod` int(11) NOT NULL,
  `TotalOrder` double NOT NULL,
  `Disc` float NOT NULL,
  `DiscRupiah` double NOT NULL,
  `PPN` float NOT NULL,
  `PPNRupiah` double NOT NULL,
  `ServiceCharge` float NOT NULL,
  `ServiceChargeRupiah` double NOT NULL,
  `GrandTotal` double NOT NULL,
  `Voucher` double NOT NULL,
  `TotalPayment` double NOT NULL,
  `TotalChange` double NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  `AddDate` datetime DEFAULT NULL,
  `AddUser` int(11) DEFAULT NULL,
  `EditDate` datetime DEFAULT NULL,
  `EditUser` int(11) DEFAULT NULL,
  `DeleteDate` datetime DEFAULT NULL,
  `DeleteUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `trans_payment_header`
--

INSERT INTO `trans_payment_header` (`ID`, `DateTime`, `ID_User`, `ID_PaymentMethod`, `TotalOrder`, `Disc`, `DiscRupiah`, `PPN`, `PPNRupiah`, `ServiceCharge`, `ServiceChargeRupiah`, `GrandTotal`, `Voucher`, `TotalPayment`, `TotalChange`, `Status`, `AddDate`, `AddUser`, `EditDate`, `EditUser`, `DeleteDate`, `DeleteUser`) VALUES
('BYR20211002-002', '0000-00-00 00:00:00', 2, 4, 5995000, 20, 1199000, 10, 479600, 5, 215820, 5491420, 100000, 5500000, 108580, 0, '2021-10-02 06:36:18', 2, NULL, NULL, '2021-10-02 07:01:21', 2),
('BYR20211002-003', '2021-10-02 06:43:26', 2, 4, 95000, 20, 19000, 10, 7600, 5, 3420, 87020, 10000, 90000, 12980, 1, '2021-10-02 06:43:26', 2, NULL, NULL, NULL, NULL),
('BYR20211002-004', '2021-10-02 06:45:24', 2, 1, 37000, 0, 0, 10, 3700, 5, 1665, 42365, 0, 50000, 7635, 1, '2021-10-02 06:45:24', 2, NULL, NULL, NULL, NULL),
('BYR20211002-005', '2021-10-02 06:46:17', 2, 1, 19000, 0, 0, 10, 1900, 5, 855, 21755, 0, 200000, 178245, 1, '2021-10-02 06:46:17', 2, NULL, NULL, NULL, NULL),
('BYR20211002-006', '2021-10-02 07:02:08', 2, 2, 5798000, 35, 2029299.9999999998, 10, 376870, 5, 169591.5, 4315161.5, 100000, 5000000, 784838.5, 1, '2021-10-02 07:02:08', 2, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `counter_trans`
--
ALTER TABLE `counter_trans`
  ADD PRIMARY KEY (`Date`);

--
-- Indeks untuk tabel `log_activity`
--
ALTER TABLE `log_activity`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `master_category`
--
ALTER TABLE `master_category`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `master_menu`
--
ALTER TABLE `master_menu`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `master_payment_method`
--
ALTER TABLE `master_payment_method`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `master_product`
--
ALTER TABLE `master_product`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `master_subcategory`
--
ALTER TABLE `master_subcategory`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `master_table`
--
ALTER TABLE `master_table`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `master_unit`
--
ALTER TABLE `master_unit`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `master_user`
--
ALTER TABLE `master_user`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `master_user_level`
--
ALTER TABLE `master_user_level`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `master_user_permission`
--
ALTER TABLE `master_user_permission`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `trans_order_detail`
--
ALTER TABLE `trans_order_detail`
  ADD PRIMARY KEY (`ID`,`Counter`) USING BTREE;

--
-- Indeks untuk tabel `trans_order_header`
--
ALTER TABLE `trans_order_header`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `trans_payment_detail`
--
ALTER TABLE `trans_payment_detail`
  ADD PRIMARY KEY (`ID`,`ID_Order`);

--
-- Indeks untuk tabel `trans_payment_header`
--
ALTER TABLE `trans_payment_header`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `log_activity`
--
ALTER TABLE `log_activity`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `master_category`
--
ALTER TABLE `master_category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `master_menu`
--
ALTER TABLE `master_menu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `master_payment_method`
--
ALTER TABLE `master_payment_method`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `master_product`
--
ALTER TABLE `master_product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `master_subcategory`
--
ALTER TABLE `master_subcategory`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `master_table`
--
ALTER TABLE `master_table`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `master_unit`
--
ALTER TABLE `master_unit`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `master_user`
--
ALTER TABLE `master_user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `master_user_level`
--
ALTER TABLE `master_user_level`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `master_user_permission`
--
ALTER TABLE `master_user_permission`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
