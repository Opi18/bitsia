-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Des 2021 pada 13.14
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bitsia`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku_besars`
--

CREATE TABLE `buku_besars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jurnal_umums_id` bigint(20) UNSIGNED DEFAULT NULL,
  `daftar_akuns_id` bigint(20) UNSIGNED NOT NULL,
  `tgl_bb` date NOT NULL,
  `keterangan_bb` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `debet_bb` int(11) DEFAULT NULL,
  `kredit_bb` int(11) DEFAULT NULL,
  `saldo_debet_bb` int(11) DEFAULT NULL,
  `saldo_kredit_bb` int(11) DEFAULT NULL,
  `periode_bb` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `buku_besars`
--

INSERT INTO `buku_besars` (`id`, `jurnal_umums_id`, `daftar_akuns_id`, `tgl_bb`, `keterangan_bb`, `debet_bb`, `kredit_bb`, `saldo_debet_bb`, `saldo_kredit_bb`, `periode_bb`, `created_at`, `updated_at`) VALUES
(574, 1118, 1, '2021-11-01', 'modal awal', 47000000, NULL, NULL, NULL, '2021-11-30', '2021-12-07 04:01:34', '2021-12-07 04:01:34'),
(575, 1119, 4, '2021-11-01', 'modal awal', 631000000, NULL, NULL, NULL, '2021-11-30', '2021-12-07 04:01:35', '2021-12-07 04:01:35'),
(576, 1120, 3, '2021-11-01', 'modal awal', NULL, 678000000, NULL, NULL, '2021-11-30', '2021-12-07 04:01:35', '2021-12-07 04:01:35'),
(577, 1121, 2, '2021-11-03', 'penjualan apk a', NULL, 100000000, NULL, NULL, '2021-11-30', '2021-12-07 04:01:35', '2021-12-07 04:01:35'),
(578, 1122, 4, '2021-11-03', 'penjualan apk a', 45454545, NULL, NULL, NULL, '2021-11-30', '2021-12-07 04:01:35', '2021-12-07 04:01:35'),
(579, 1123, 14, '2021-11-03', 'penjualan apk a', 4545455, NULL, NULL, NULL, '2021-11-30', '2021-12-07 04:01:35', '2021-12-07 04:01:35'),
(580, 1124, 5, '2021-11-03', 'penjualan apk a', 50000000, NULL, NULL, NULL, '2021-11-30', '2021-12-07 04:01:35', '2021-12-07 04:01:35'),
(581, 1125, 1, '2021-11-05', 'bayar listrik', NULL, 1000000, NULL, NULL, '2021-11-30', '2021-12-07 04:01:35', '2021-12-07 04:01:35'),
(582, 1126, 6, '2021-11-05', 'bayar listrik', 1000000, NULL, NULL, NULL, '2021-11-30', '2021-12-07 04:01:35', '2021-12-07 04:01:35'),
(583, 1127, 4, '2021-11-15', 'penjualan apk b', 7863636, NULL, NULL, NULL, '2021-11-30', '2021-12-07 04:01:35', '2021-12-07 04:01:35'),
(584, 1128, 14, '2021-11-15', 'penjualan apk b', 786364, NULL, NULL, NULL, '2021-11-30', '2021-12-07 04:01:35', '2021-12-07 04:01:35'),
(585, 1129, 2, '2021-11-15', 'penjualan apk b', NULL, 8650000, NULL, NULL, '2021-11-30', '2021-12-07 04:01:35', '2021-12-07 04:01:35'),
(586, 1130, 1, '2021-11-20', 'bayar telepon', NULL, 1526000, NULL, NULL, '2021-11-30', '2021-12-07 04:01:35', '2021-12-07 04:01:35'),
(587, 1131, 7, '2021-11-20', 'bayar telepon', 1526000, NULL, NULL, NULL, '2021-11-30', '2021-12-07 04:01:36', '2021-12-07 04:01:36'),
(588, 1132, 5, '2021-11-25', 'pelunasan apk aa', NULL, 40000000, NULL, NULL, '2021-11-30', '2021-12-07 04:01:36', '2021-12-07 04:01:36'),
(589, 1133, 1, '2021-11-24', 'Pembelian alat', NULL, 1500000, NULL, NULL, '2021-11-30', '2021-12-07 04:01:36', '2021-12-07 04:01:36'),
(590, 1134, 8, '2021-11-24', 'Pembelian alat', 2000000, NULL, NULL, NULL, '2021-11-30', '2021-12-07 04:01:36', '2021-12-07 04:01:36'),
(591, 1135, 4, '2021-11-29', 'pengambilan pribadi', NULL, 5000000, NULL, NULL, '2021-11-30', '2021-12-07 04:01:36', '2021-12-07 04:01:36'),
(592, 1136, 9, '2021-11-29', 'pengambilan pribadi', 5000000, NULL, NULL, NULL, '2021-11-30', '2021-12-07 04:01:36', '2021-12-07 04:01:36'),
(593, 1137, 10, '2021-11-30', 'bayar gaji pegawai', 23655000, NULL, NULL, NULL, '2021-11-30', '2021-12-07 04:01:36', '2021-12-07 04:01:36'),
(594, 1138, 15, '2021-11-30', 'bayar gaji pegawai', 1245000, NULL, NULL, NULL, '2021-11-30', '2021-12-07 04:01:36', '2021-12-07 04:01:36'),
(595, 1139, 4, '2021-11-30', 'bayar gaji pegawai', NULL, 24900000, NULL, NULL, '2021-11-30', '2021-12-07 04:01:36', '2021-12-07 04:01:36'),
(596, 1140, 11, '2021-11-24', 'Pembelian alat', NULL, 500000, NULL, NULL, '2021-11-30', '2021-12-07 04:01:36', '2021-12-07 04:01:36'),
(597, 1141, 4, '2021-11-25', 'pelunasan apk aa', 40000000, NULL, NULL, NULL, '2021-11-30', '2021-12-07 04:01:36', '2021-12-07 04:01:36'),
(598, NULL, 16, '2021-12-07', 'Pajak PPh Pasal 25', 11383827, NULL, NULL, NULL, '2021-11-30', '2021-12-07 04:01:38', '2021-12-07 04:01:38'),
(599, NULL, 4, '2021-12-07', 'Pajak PPh Pasal 25', NULL, 11383827, NULL, NULL, '2021-11-30', '2021-12-07 04:01:38', '2021-12-07 04:01:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_akuns`
--

CREATE TABLE `daftar_akuns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `data_users_id` bigint(20) UNSIGNED NOT NULL,
  `kode_akun` int(11) NOT NULL,
  `nama_akun` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_akun` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `daftar_akuns`
--

INSERT INTO `daftar_akuns` (`id`, `data_users_id`, `kode_akun`, `nama_akun`, `tipe_akun`, `created_at`, `updated_at`) VALUES
(1, 3, 111, 'Kas', 'Harta/Aset', '2021-10-03 04:10:16', '2021-10-19 01:12:06'),
(2, 3, 411, 'pendapatan jasa', 'Pendapatan', '2021-10-03 04:12:53', '2021-10-19 01:11:27'),
(3, 3, 311, 'Modal', 'Modal/Ekuitas', '2021-10-19 00:25:21', '2021-10-19 01:06:07'),
(4, 3, 112, 'Bank', 'Harta/Aset', '2021-10-19 00:50:27', '2021-10-19 01:12:15'),
(5, 3, 113, 'Piutang Jasa', 'Harta/Aset', '2021-10-19 00:51:02', '2021-10-19 01:12:21'),
(6, 3, 512, 'Beban Listrik & Air', 'Beban', '2021-10-19 00:58:38', '2021-10-19 00:58:38'),
(7, 3, 513, 'Beban Telepon', 'Beban', '2021-10-19 00:58:58', '2021-10-19 00:58:58'),
(8, 3, 121, 'Peralatan', 'Harta/Aset', '2021-10-19 01:01:08', '2021-10-19 01:01:08'),
(9, 3, 312, 'Prive', 'Modal/Ekuitas', '2021-10-19 01:13:45', '2021-10-19 01:13:45'),
(10, 3, 511, 'Beban Gaji', 'Beban', '2021-10-19 01:14:03', '2021-10-19 01:14:03'),
(11, 3, 211, 'Utang Usaha', 'Kewajiban', '2021-10-19 01:14:23', '2021-10-19 01:14:23'),
(12, 3, 114, 'Perlengkapan', 'Harta/Aset', '2021-10-19 05:36:00', '2021-10-19 05:36:00'),
(14, 3, 514, 'PPN', 'Beban', '2021-11-14 07:54:07', '2021-11-14 07:54:07'),
(15, 3, 515, 'PPh Pasal 21', 'Beban', '2021-11-26 23:17:11', '2021-11-26 23:17:11'),
(16, 3, 516, 'PPh Pasal 25', 'Beban', '2021-12-06 20:34:26', '2021-12-06 20:34:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_transaksis`
--

CREATE TABLE `data_transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `data_users_id` bigint(20) UNSIGNED NOT NULL,
  `daftar_akuns_id` bigint(20) UNSIGNED NOT NULL,
  `jenis_transaksi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_transaksi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal_transaksi` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `transaksi_dibatalkan` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_transaksis`
--

INSERT INTO `data_transaksis` (`id`, `data_users_id`, `daftar_akuns_id`, `jenis_transaksi`, `keterangan_transaksi`, `nominal_transaksi`, `tgl_transaksi`, `transaksi_dibatalkan`, `created_at`, `updated_at`) VALUES
(89, 3, 1, 'Data Pemasukan', 'modal awal', 47000000, '2021-11-01', 0, '2021-11-27 01:16:55', '2021-11-27 01:16:55'),
(90, 3, 4, 'Data Pemasukan', 'modal awal', 631000000, '2021-11-01', 0, '2021-11-27 01:17:25', '2021-11-27 01:17:25'),
(91, 3, 3, 'Data Pemasukan', 'modal awal', 678000000, '2021-11-01', 0, '2021-11-27 01:19:28', '2021-11-27 01:19:28'),
(92, 3, 2, 'Data Pemasukan', 'penjualan apk a', 100000000, '2021-11-03', 0, '2021-11-27 01:20:27', '2021-11-27 01:20:54'),
(93, 3, 4, 'Data Pemasukan', 'penjualan apk a', 45454545, '2021-11-03', 0, '2021-11-27 01:20:54', '2021-11-27 01:20:54'),
(94, 3, 14, 'Data Pemasukan', 'penjualan apk a', 4545455, '2021-11-03', 0, '2021-11-27 01:20:54', '2021-11-27 01:20:54'),
(95, 3, 5, 'Data Piutang', 'penjualan apk a', 50000000, '2021-11-03', 0, '2021-11-27 01:20:54', '2021-11-27 01:20:54'),
(96, 3, 1, 'Data Pengeluaran', 'bayar listrik', 1000000, '2021-11-05', 0, '2021-11-27 01:25:07', '2021-11-27 01:25:07'),
(97, 3, 6, 'Data Pengeluaran', 'bayar listrik', 1000000, '2021-11-05', 0, '2021-11-27 01:25:07', '2021-11-27 01:25:07'),
(98, 3, 4, 'Data Pemasukan', 'penjualan apk b', 7863636, '2021-11-15', 0, '2021-11-27 01:25:48', '2021-11-27 01:25:48'),
(99, 3, 14, 'Data Pemasukan', 'penjualan apk b', 786364, '2021-11-15', 0, '2021-11-27 01:25:48', '2021-11-27 01:35:34'),
(100, 3, 2, 'Data Pemasukan', 'penjualan apk b', 8650000, '2021-11-15', 0, '2021-11-27 01:25:48', '2021-11-27 01:25:48'),
(101, 3, 1, 'Data Pengeluaran', 'bayar telepon', 1526000, '2021-11-20', 0, '2021-11-27 01:26:36', '2021-11-27 01:26:36'),
(102, 3, 7, 'Data Pengeluaran', 'bayar telepon', 1526000, '2021-11-20', 0, '2021-11-27 01:26:36', '2021-11-27 01:26:36'),
(103, 3, 2, 'Data Pemasukan', 'penjualan apk aa', 84000000, '2021-09-23', 0, '2021-11-27 01:27:54', '2021-11-27 01:34:31'),
(104, 3, 4, 'Data Pemasukan', 'penjualan apk aa', 38181818, '2021-09-23', 0, '2021-11-27 01:28:42', '2021-11-27 01:35:21'),
(105, 3, 14, 'Data Pemasukan', 'penjualan apk aa', 3818182, '2021-09-23', 0, '2021-11-27 01:28:44', '2021-11-27 01:35:50'),
(106, 3, 5, 'Data Piutang', 'penjualan apk aa', 42000000, '2021-09-10', 0, '2021-11-27 01:28:44', '2021-11-27 01:28:44'),
(107, 3, 5, 'Data Pemasukan', 'pelunasan apk aa', 40000000, '2021-11-25', 0, '2021-11-27 01:31:50', '2021-11-27 01:43:02'),
(108, 3, 1, 'Data Pengeluaran', 'Pembelian alat', 1500000, '2021-11-24', 0, '2021-11-27 01:37:54', '2021-11-27 01:37:54'),
(109, 3, 6, 'Data Pengeluaran', 'Pembelian alat', 1500000, '2021-11-24', 1, '2021-11-27 01:37:54', '2021-11-27 01:38:42'),
(110, 3, 8, 'Data Pemasukan', 'Pembelian alat', 2000000, '2021-11-24', 0, '2021-11-27 01:40:19', '2021-11-27 04:37:52'),
(111, 3, 4, 'Data Pengeluaran', 'pengambilan pribadi', 5000000, '2021-11-29', 0, '2021-11-27 01:41:16', '2021-11-27 01:41:16'),
(112, 3, 9, 'Data Pengeluaran', 'pengambilan pribadi', 5000000, '2021-11-29', 0, '2021-11-27 01:41:16', '2021-11-27 01:41:16'),
(113, 3, 10, 'Data Pengeluaran', 'bayar gaji pegawai', 23655000, '2021-11-30', 0, '2021-11-27 01:41:49', '2021-11-27 01:41:49'),
(114, 3, 15, 'Data Pengeluaran', 'bayar gaji pegawai', 1245000, '2021-11-30', 0, '2021-11-27 01:41:49', '2021-11-27 01:41:49'),
(115, 3, 4, 'Data Pengeluaran', 'bayar gaji pegawai', 24900000, '2021-11-30', 0, '2021-11-27 01:41:49', '2021-11-27 01:41:49'),
(116, 3, 11, 'Data Hutang', 'Pembelian alat', 500000, '2021-11-24', 0, '2021-11-27 01:49:02', '2021-11-27 04:37:30'),
(117, 3, 4, 'Data Pemasukan', 'pelunasan apk aa', 40000000, '2021-11-25', 0, '2021-11-27 03:57:02', '2021-11-27 03:57:02'),
(127, 3, 3, 'Data Pemasukan', 'Modal Awal', 737508354, '2021-11-01', 0, '2021-12-07 04:01:39', '2021-12-07 04:01:39'),
(128, 3, 1, 'Data Pemasukan', 'Modal Awal', 44250501, '2021-11-01', 0, '2021-12-07 04:01:39', '2021-12-07 04:01:39'),
(129, 3, 4, 'Data Pemasukan', 'Modal Awal', 693257853, '2021-11-01', 0, '2021-12-07 04:01:40', '2021-12-07 04:01:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_users`
--

CREATE TABLE `data_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_users`
--

INSERT INTO `data_users` (`id`, `nama`, `username`, `password`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Opi', 'accounting1050373087', '$2y$10$PS8gWj9b0MyieYmGSnPUK.0dw2gE6QgL8CnnQaJF9NAl/A/3kOn.y', 'Accounting', '2021-10-03 03:39:57', '2021-10-19 02:13:38'),
(4, 'Dika', 'pemilik1934246888', '$2y$10$onuyF7wlD8RS0K4lBwkGyOq7SsUJ3tWgxzCuMCkXX.ze7Gwsheim2', 'Pemilik', '2021-10-03 04:04:30', '2021-10-21 07:46:58'),
(5, 'aaa', 'accounting49317604', '$2y$10$REwNr6prPLBREER4pGrdUOHOzP75ZzYKxPrjbC5UjR80cgjG4yvTC', 'Accounting', '2021-10-19 05:34:33', '2021-10-19 05:34:33'),
(6, 'aaa', 'pemilik1966269726', '$2y$10$QOcrqFU7fUqD87o/5fKbfeIPscU3a1XYEbzftN2I19Gsh/K6QSqVq', 'Pemilik', '2021-10-21 07:46:30', '2021-10-21 07:46:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurnal_umums`
--

CREATE TABLE `jurnal_umums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `daftar_akuns_id` bigint(20) UNSIGNED NOT NULL,
  `data_transaksis_id` bigint(20) UNSIGNED NOT NULL,
  `tgl_ju` date NOT NULL,
  `debet_ju` int(11) DEFAULT NULL,
  `kredit_ju` int(11) DEFAULT NULL,
  `keterangan_ju` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `periode_ju` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jurnal_umums`
--

INSERT INTO `jurnal_umums` (`id`, `daftar_akuns_id`, `data_transaksis_id`, `tgl_ju`, `debet_ju`, `kredit_ju`, `keterangan_ju`, `periode_ju`, `created_at`, `updated_at`) VALUES
(1118, 1, 89, '2021-11-01', 47000000, NULL, 'modal awal', '2021-11-30', '2021-12-07 04:01:31', '2021-12-07 04:01:31'),
(1119, 4, 90, '2021-11-01', 631000000, NULL, 'modal awal', '2021-11-30', '2021-12-07 04:01:31', '2021-12-07 04:01:31'),
(1120, 3, 91, '2021-11-01', NULL, 678000000, 'modal awal', '2021-11-30', '2021-12-07 04:01:31', '2021-12-07 04:01:31'),
(1121, 2, 92, '2021-11-03', NULL, 100000000, 'penjualan apk a', '2021-11-30', '2021-12-07 04:01:32', '2021-12-07 04:01:32'),
(1122, 4, 93, '2021-11-03', 45454545, NULL, 'penjualan apk a', '2021-11-30', '2021-12-07 04:01:32', '2021-12-07 04:01:32'),
(1123, 14, 94, '2021-11-03', 4545455, NULL, 'penjualan apk a', '2021-11-30', '2021-12-07 04:01:32', '2021-12-07 04:01:32'),
(1124, 5, 95, '2021-11-03', 50000000, NULL, 'penjualan apk a', '2021-11-30', '2021-12-07 04:01:32', '2021-12-07 04:01:32'),
(1125, 1, 96, '2021-11-05', NULL, 1000000, 'bayar listrik', '2021-11-30', '2021-12-07 04:01:32', '2021-12-07 04:01:32'),
(1126, 6, 97, '2021-11-05', 1000000, NULL, 'bayar listrik', '2021-11-30', '2021-12-07 04:01:33', '2021-12-07 04:01:33'),
(1127, 4, 98, '2021-11-15', 7863636, NULL, 'penjualan apk b', '2021-11-30', '2021-12-07 04:01:33', '2021-12-07 04:01:33'),
(1128, 14, 99, '2021-11-15', 786364, NULL, 'penjualan apk b', '2021-11-30', '2021-12-07 04:01:33', '2021-12-07 04:01:33'),
(1129, 2, 100, '2021-11-15', NULL, 8650000, 'penjualan apk b', '2021-11-30', '2021-12-07 04:01:33', '2021-12-07 04:01:33'),
(1130, 1, 101, '2021-11-20', NULL, 1526000, 'bayar telepon', '2021-11-30', '2021-12-07 04:01:33', '2021-12-07 04:01:33'),
(1131, 7, 102, '2021-11-20', 1526000, NULL, 'bayar telepon', '2021-11-30', '2021-12-07 04:01:33', '2021-12-07 04:01:33'),
(1132, 5, 107, '2021-11-25', NULL, 40000000, 'pelunasan apk aa', '2021-11-30', '2021-12-07 04:01:33', '2021-12-07 04:01:33'),
(1133, 1, 108, '2021-11-24', NULL, 1500000, 'Pembelian alat', '2021-11-30', '2021-12-07 04:01:33', '2021-12-07 04:01:33'),
(1134, 8, 110, '2021-11-24', 2000000, NULL, 'Pembelian alat', '2021-11-30', '2021-12-07 04:01:34', '2021-12-07 04:01:34'),
(1135, 4, 111, '2021-11-29', NULL, 5000000, 'pengambilan pribadi', '2021-11-30', '2021-12-07 04:01:34', '2021-12-07 04:01:34'),
(1136, 9, 112, '2021-11-29', 5000000, NULL, 'pengambilan pribadi', '2021-11-30', '2021-12-07 04:01:34', '2021-12-07 04:01:34'),
(1137, 10, 113, '2021-11-30', 23655000, NULL, 'bayar gaji pegawai', '2021-11-30', '2021-12-07 04:01:34', '2021-12-07 04:01:34'),
(1138, 15, 114, '2021-11-30', 1245000, NULL, 'bayar gaji pegawai', '2021-11-30', '2021-12-07 04:01:34', '2021-12-07 04:01:34'),
(1139, 4, 115, '2021-11-30', NULL, 24900000, 'bayar gaji pegawai', '2021-11-30', '2021-12-07 04:01:34', '2021-12-07 04:01:34'),
(1140, 11, 116, '2021-11-24', NULL, 500000, 'Pembelian alat', '2021-11-30', '2021-12-07 04:01:34', '2021-12-07 04:01:34'),
(1141, 4, 117, '2021-11-25', 40000000, NULL, 'pelunasan apk aa', '2021-11-30', '2021-12-07 04:01:34', '2021-12-07 04:01:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_keuangans`
--

CREATE TABLE `laporan_keuangans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `neraca_saldos_id` bigint(20) UNSIGNED DEFAULT NULL,
  `daftar_akuns_id` bigint(20) UNSIGNED DEFAULT NULL,
  `jenis_laporan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_lk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal_lk` int(11) NOT NULL,
  `periode_lk` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `laporan_keuangans`
--

INSERT INTO `laporan_keuangans` (`id`, `neraca_saldos_id`, `daftar_akuns_id`, `jenis_laporan`, `keterangan_lk`, `nominal_lk`, `periode_lk`, `created_at`, `updated_at`) VALUES
(16, NULL, NULL, 'Laba Rugi', 'Perusahan Laba', 64508354, '2021-11-30', '2021-12-07 04:01:38', '2021-12-07 04:01:38'),
(17, NULL, NULL, 'Perubahan Modal', 'Perubahan Modal Periode 2021-11-30', 737508354, '2021-11-30', '2021-12-07 04:01:40', '2021-12-07 04:01:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '12021_09_21_063846_create_data_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '22021_09_21_064012_create_daftar_akuns_table', 1),
(4, '32021_09_21_155936_create_data_transaksis_table', 1),
(5, '42021_09_21_064044_create_jurnal_umums_table', 1),
(6, '52021_09_21_064120_create_buku_besars_table', 1),
(7, '62021_09_21_064141_create_neraca_saldos_table', 1),
(8, '72021_09_21_064213_create_laporan_keuangans_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `neraca_saldos`
--

CREATE TABLE `neraca_saldos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `buku_besars_id` bigint(20) UNSIGNED DEFAULT NULL,
  `daftar_akuns_id` bigint(20) UNSIGNED NOT NULL,
  `debet_ns` int(11) DEFAULT NULL,
  `kredit_ns` int(11) DEFAULT NULL,
  `periode_ns` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `neraca_saldos`
--

INSERT INTO `neraca_saldos` (`id`, `buku_besars_id`, `daftar_akuns_id`, `debet_ns`, `kredit_ns`, `periode_ns`, `created_at`, `updated_at`) VALUES
(306, NULL, 1, 42974000, NULL, '2021-11-30', '2021-12-07 04:01:38', '2021-12-07 04:01:38'),
(307, NULL, 2, NULL, 108650000, '2021-11-30', '2021-12-07 04:01:38', '2021-12-07 04:01:38'),
(308, NULL, 3, NULL, 678000000, '2021-11-30', '2021-12-07 04:01:38', '2021-12-07 04:01:38'),
(309, NULL, 4, 683034354, NULL, '2021-11-30', '2021-12-07 04:01:38', '2021-12-07 04:01:38'),
(310, NULL, 5, 10000000, NULL, '2021-11-30', '2021-12-07 04:01:38', '2021-12-07 04:01:38'),
(311, NULL, 6, 1000000, NULL, '2021-11-30', '2021-12-07 04:01:38', '2021-12-07 04:01:38'),
(312, NULL, 7, 1526000, NULL, '2021-11-30', '2021-12-07 04:01:39', '2021-12-07 04:01:39'),
(313, NULL, 8, 2000000, NULL, '2021-11-30', '2021-12-07 04:01:39', '2021-12-07 04:01:39'),
(314, NULL, 9, 5000000, NULL, '2021-11-30', '2021-12-07 04:01:39', '2021-12-07 04:01:39'),
(315, NULL, 10, 23655000, NULL, '2021-11-30', '2021-12-07 04:01:39', '2021-12-07 04:01:39'),
(316, NULL, 11, NULL, 500000, '2021-11-30', '2021-12-07 04:01:39', '2021-12-07 04:01:39'),
(317, NULL, 14, 5331819, NULL, '2021-11-30', '2021-12-07 04:01:39', '2021-12-07 04:01:39'),
(318, NULL, 15, 1245000, NULL, '2021-11-30', '2021-12-07 04:01:39', '2021-12-07 04:01:39'),
(319, NULL, 16, 11383827, NULL, '2021-11-30', '2021-12-07 04:01:39', '2021-12-07 04:01:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku_besars`
--
ALTER TABLE `buku_besars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buku_besars_jurnal_umums_id_foreign` (`jurnal_umums_id`),
  ADD KEY `buku_besars_daftar_akuns_id_foreign` (`daftar_akuns_id`);

--
-- Indeks untuk tabel `daftar_akuns`
--
ALTER TABLE `daftar_akuns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `daftar_akuns_data_users_id_foreign` (`data_users_id`);

--
-- Indeks untuk tabel `data_transaksis`
--
ALTER TABLE `data_transaksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_transaksis_data_users_id_foreign` (`data_users_id`),
  ADD KEY `data_transaksis_daftar_akuns_id_foreign` (`daftar_akuns_id`);

--
-- Indeks untuk tabel `data_users`
--
ALTER TABLE `data_users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jurnal_umums`
--
ALTER TABLE `jurnal_umums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jurnal_umums_daftar_akuns_id_foreign` (`daftar_akuns_id`),
  ADD KEY `jurnal_umums_data_transaksis_id_foreign` (`data_transaksis_id`);

--
-- Indeks untuk tabel `laporan_keuangans`
--
ALTER TABLE `laporan_keuangans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laporan_keuangans_neraca_saldos_id_foreign` (`neraca_saldos_id`),
  ADD KEY `laporan_keuangans_daftar_akuns_id_foreign` (`daftar_akuns_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `neraca_saldos`
--
ALTER TABLE `neraca_saldos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `neraca_saldos_buku_besars_id_foreign` (`buku_besars_id`),
  ADD KEY `neraca_saldos_daftar_akuns_id_foreign` (`daftar_akuns_id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku_besars`
--
ALTER TABLE `buku_besars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=600;

--
-- AUTO_INCREMENT untuk tabel `daftar_akuns`
--
ALTER TABLE `daftar_akuns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `data_transaksis`
--
ALTER TABLE `data_transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT untuk tabel `data_users`
--
ALTER TABLE `data_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jurnal_umums`
--
ALTER TABLE `jurnal_umums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1142;

--
-- AUTO_INCREMENT untuk tabel `laporan_keuangans`
--
ALTER TABLE `laporan_keuangans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `neraca_saldos`
--
ALTER TABLE `neraca_saldos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=320;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku_besars`
--
ALTER TABLE `buku_besars`
  ADD CONSTRAINT `buku_besars_daftar_akuns_id_foreign` FOREIGN KEY (`daftar_akuns_id`) REFERENCES `daftar_akuns` (`id`),
  ADD CONSTRAINT `buku_besars_jurnal_umums_id_foreign` FOREIGN KEY (`jurnal_umums_id`) REFERENCES `jurnal_umums` (`id`);

--
-- Ketidakleluasaan untuk tabel `daftar_akuns`
--
ALTER TABLE `daftar_akuns`
  ADD CONSTRAINT `daftar_akuns_data_users_id_foreign` FOREIGN KEY (`data_users_id`) REFERENCES `data_users` (`id`);

--
-- Ketidakleluasaan untuk tabel `data_transaksis`
--
ALTER TABLE `data_transaksis`
  ADD CONSTRAINT `data_transaksis_daftar_akuns_id_foreign` FOREIGN KEY (`daftar_akuns_id`) REFERENCES `daftar_akuns` (`id`),
  ADD CONSTRAINT `data_transaksis_data_users_id_foreign` FOREIGN KEY (`data_users_id`) REFERENCES `data_users` (`id`);

--
-- Ketidakleluasaan untuk tabel `jurnal_umums`
--
ALTER TABLE `jurnal_umums`
  ADD CONSTRAINT `jurnal_umums_daftar_akuns_id_foreign` FOREIGN KEY (`daftar_akuns_id`) REFERENCES `daftar_akuns` (`id`),
  ADD CONSTRAINT `jurnal_umums_data_transaksis_id_foreign` FOREIGN KEY (`data_transaksis_id`) REFERENCES `data_transaksis` (`id`);

--
-- Ketidakleluasaan untuk tabel `laporan_keuangans`
--
ALTER TABLE `laporan_keuangans`
  ADD CONSTRAINT `laporan_keuangans_daftar_akuns_id_foreign` FOREIGN KEY (`daftar_akuns_id`) REFERENCES `daftar_akuns` (`id`),
  ADD CONSTRAINT `laporan_keuangans_neraca_saldos_id_foreign` FOREIGN KEY (`neraca_saldos_id`) REFERENCES `neraca_saldos` (`id`);

--
-- Ketidakleluasaan untuk tabel `neraca_saldos`
--
ALTER TABLE `neraca_saldos`
  ADD CONSTRAINT `neraca_saldos_buku_besars_id_foreign` FOREIGN KEY (`buku_besars_id`) REFERENCES `buku_besars` (`id`),
  ADD CONSTRAINT `neraca_saldos_daftar_akuns_id_foreign` FOREIGN KEY (`daftar_akuns_id`) REFERENCES `daftar_akuns` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
