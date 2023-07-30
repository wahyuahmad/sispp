-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Apr 2023 pada 05.17
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sispp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'super admin', ''),
(2, 'admin', ''),
(3, 'bendahara', ''),
(4, 'siswa\r\n', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(3, 1),
(3, 10),
(3, 11),
(3, 12),
(3, 13),
(3, 14),
(3, 15),
(3, 16),
(3, 17),
(3, 18),
(3, 19),
(3, 20),
(3, 21),
(3, 22),
(3, 23),
(3, 24),
(3, 25),
(3, 26),
(4, 28);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 9),
(2, 6),
(3, 7),
(4, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'admin', NULL, '2023-04-08 16:43:34', 0),
(2, '::1', 'awk007', NULL, '2023-04-08 17:03:45', 0),
(3, '::1', 'wahyuahmadkh10092000@gmail.com', 6, '2023-04-08 17:04:14', 1),
(4, '::1', 'wahyuahmadkh10092000@gmail.com', 6, '2023-04-08 23:05:55', 1),
(5, '::1', 'wahyuahmadkh10092000@gmail.com', 6, '2023-04-09 09:25:25', 1),
(6, '::1', 'wahyuahmadkh10092000@gmail.com', 6, '2023-04-09 14:10:13', 1),
(7, '::1', 'wahyuahmadkh10092000@gmail.com', 6, '2023-04-10 06:49:08', 1),
(8, '::1', 'bendahara@gmail.com', 7, '2023-04-10 06:56:05', 1),
(9, '::1', 'siswa@gmail.com', 8, '2023-04-10 06:59:07', 1),
(10, '::1', 'wahyuahmadkh10092000@gmail.com', 6, '2023-04-10 07:02:13', 1),
(11, '::1', 'wahyuahmadkh10092000@gmail.com', 6, '2023-04-10 07:19:21', 1),
(12, '::1', 'bendahara@gmail.com', 7, '2023-04-10 07:20:25', 1),
(13, '::1', 'admin', NULL, '2023-04-10 07:26:27', 0),
(14, '::1', 'wahyuahmadkh10092000@gmail.com', 6, '2023-04-10 07:26:42', 1),
(15, '::1', 'superadmin@gmail.com', 9, '2023-04-10 07:44:06', 1),
(16, '::1', 'superadmin@gmail.com', 9, '2023-04-10 08:09:01', 1),
(17, '::1', 'siswa', NULL, '2023-04-10 08:57:13', 0),
(18, '::1', 'siswa@gmail.com', 8, '2023-04-10 08:57:36', 1),
(19, '::1', 'superadmin@gmail.com', 9, '2023-04-10 09:06:25', 1),
(20, '::1', 'admin', NULL, '2023-04-10 09:16:48', 0),
(21, '::1', 'wahyuahmadkh10092000@gmail.com', 6, '2023-04-10 09:16:58', 1),
(22, '::1', 'superadmin@gmail.com', 9, '2023-04-10 09:29:03', 1),
(23, '::1', 'bendahara@gmail.com', 7, '2023-04-10 09:33:16', 1),
(24, '::1', 'siswa@gmail.com', 8, '2023-04-10 09:35:50', 1),
(25, '::1', 'admin', NULL, '2023-04-10 09:43:29', 0),
(26, '::1', 'wahyuahmadkh10092000@gmail.com', 6, '2023-04-10 09:43:40', 1),
(27, '::1', 'siswa@gmail.com', 8, '2023-04-10 09:45:47', 1),
(28, '::1', 'wahyuahmadkh10092000@gmail.com', 6, '2023-04-10 09:46:31', 1),
(29, '::1', 'bendahara@gmail.com', 7, '2023-04-10 09:47:49', 1),
(30, '::1', 'wahyuahmadkh10092000@gmail.com', 6, '2023-04-10 09:52:09', 1),
(31, '::1', 'admin', NULL, '2023-04-10 09:54:51', 0),
(32, '::1', 'admin', NULL, '2023-04-10 09:55:07', 0),
(33, '::1', 'siswa@gmail.com', 8, '2023-04-10 09:55:22', 1),
(34, '::1', 'siswa', NULL, '2023-04-10 09:57:55', 0),
(35, '::1', 'siswa@gmail.com', 8, '2023-04-10 09:58:18', 1),
(36, '::1', 'wahyuahmadkh10092000@gmail.com', 6, '2023-04-10 09:59:13', 1),
(37, '::1', 'bendahara', NULL, '2023-04-10 10:00:43', 0),
(38, '::1', 'bendahara@gmail.com', 7, '2023-04-10 10:00:58', 1),
(39, '::1', 'siswa@gmail.com', 8, '2023-04-10 10:02:18', 1),
(40, '::1', 'wahyuahmadkh10092000@gmail.com', 6, '2023-04-10 10:06:07', 1),
(41, '::1', 'siswa', NULL, '2023-04-10 10:18:08', 0),
(42, '::1', 'siswa@gmail.com', 8, '2023-04-10 10:18:19', 1),
(43, '::1', 'siswa', NULL, '2023-04-10 10:36:51', 0),
(44, '::1', 'siswa@gmail.com', 8, '2023-04-10 10:37:05', 1),
(45, '::1', 'superadmin@gmail.com', 9, '2023-04-10 10:49:02', 1),
(46, '::1', 'siswa@gmail.com', 8, '2023-04-10 11:00:25', 1),
(47, '::1', 'superadmin@gmail.com', 9, '2023-04-10 11:08:20', 1),
(48, '::1', 'wahyuahmadkh10092000@gmail.com', 6, '2023-04-10 11:14:41', 1),
(49, '::1', 'bendahara@gmail.com', 7, '2023-04-10 11:15:07', 1),
(50, '::1', 'bendahara@gmail.com', 7, '2023-04-10 11:17:55', 1),
(51, '::1', 'bendahara@gmail.com', 7, '2023-04-10 11:20:27', 1),
(52, '::1', 'superadmin@gmail.com', 9, '2023-04-10 11:23:42', 1),
(53, '::1', 'wahyuahmadkh10092000@gmail.com', 6, '2023-04-10 11:28:17', 1),
(54, '::1', 'bendahara@gmail.com', 7, '2023-04-10 11:29:06', 1),
(55, '::1', 'siswa', NULL, '2023-04-10 11:30:07', 0),
(56, '::1', 'siswa@gmail.com', 8, '2023-04-10 11:30:20', 1),
(57, '::1', 'siswa@gmail.com', 8, '2023-04-10 11:37:48', 1),
(58, '::1', 'superadmin@gmail.com', 9, '2023-04-10 11:56:40', 1),
(59, '::1', 'wahyuahmadkh10092000@gmail.com', 6, '2023-04-10 11:57:51', 1),
(60, '::1', 'bendahara@gmail.com', 7, '2023-04-10 11:58:26', 1),
(61, '::1', 'siswa@gmail.com', 8, '2023-04-10 11:58:50', 1),
(62, '::1', 'bendahara@gmail.com', 7, '2023-04-10 21:26:16', 1),
(63, '::1', 'siswa@gmail.com', 8, '2023-04-10 21:26:50', 1),
(64, '::1', 'bendahara@gmail.com', 7, '2023-04-10 21:32:04', 1),
(65, '::1', 'siswa@gmail.com', 8, '2023-04-10 21:50:33', 1),
(66, '::1', 'siswa', NULL, '2023-04-10 21:52:22', 0),
(67, '::1', 'siswa@gmail.com', 8, '2023-04-10 21:52:33', 1),
(68, '::1', 'superadmin@gmail.com', 9, '2023-04-10 22:30:23', 1),
(69, '::1', 'superadmin@gmail.com', 9, '2023-04-12 07:50:08', 1),
(70, '::1', 'sgsh', NULL, '2023-04-12 07:54:08', 0),
(71, '::1', 'superadmin@gmail.com', 9, '2023-04-12 08:00:44', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'beranda', 'menu beranda'),
(2, 'data-siswa', 'menu data siswa'),
(3, 'tambah-siswa', 'menu tambah siswa'),
(4, 'edit-siswa', 'menu edit siswa'),
(5, 'hapus-siswa', 'menu hapus siswa'),
(6, 'data-kelas', 'menu data kelas'),
(7, 'tambah-kelas', 'menu tambah kelas'),
(8, 'edit-kelas', 'menu edit kelas'),
(9, 'hapus-kelas', 'menu hapus kelas'),
(10, 'data-tagihan ', 'menu data tagihan'),
(11, 'tambah-tagihan', 'menu tambah tagihan'),
(12, 'data-spp', 'menu data spp'),
(13, 'tambah-spp', 'menu tambah spp'),
(14, 'edit-spp', 'menu edit spp'),
(15, 'hapus-spp', 'menu hapus spp'),
(16, 'data-spp-bebas', 'menu data spp bebas'),
(17, 'tambah-spp-bebas', 'menu tambah spp bebas'),
(18, 'edit-spp-bebas', 'menu edit spp bebas'),
(19, 'hapus-spp-bebas', 'menu hapus spp bebas'),
(20, 'cari-tagihan-bulanan', 'menu cari tagihan bulanan'),
(21, 'bayar-bulanan', 'menu bayar bulanan'),
(22, 'data-bayar-bebas', 'menu data bayar bebas'),
(23, 'bayar-bebas', 'menu bayar bebas'),
(24, 'laporan-spp-bulanan', 'menu laporan spp bulanan'),
(25, 'laporan spp bebas', 'menu laporan spp bebas'),
(26, 'laporan siswa', 'menu laporan siswa'),
(28, 'histori bayar', 'cari-histori-bayar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bayar_bebas`
--

CREATE TABLE `bayar_bebas` (
  `id_bayar` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_bebas` int(11) DEFAULT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bayar_bebas`
--

INSERT INTO `bayar_bebas` (`id_bayar`, `nis`, `nama_siswa`, `id_kelas`, `id_bebas`, `tgl_bayar`, `jumlah_bayar`) VALUES
(3, 1, 'wahyu', 3, 3, '2023-04-10', 1000000),
(4, 2, 'kusuma wijaya', 3, 3, '2023-04-08', 100000),
(5, 2, 'kusuma wijaya', 3, 3, '2023-04-08', 600000),
(7, 2, 'kusuma wijaya', 3, 3, '2023-04-08', NULL),
(8, 4, 'wahyu', 2, 3, '2023-04-08', NULL),
(9, 3, 'budi', 3, 3, '2023-04-10', 1500000),
(10, 4, 'wahyu', 2, 3, '2023-04-08', 1000000),
(11, 5, 'ahmad', 3, 6, '2023-04-08', 300000),
(12, 4, 'wahyu', 2, 3, NULL, NULL),
(13, 5, 'ahmad', 3, 6, NULL, NULL),
(14, 4, 'wahyu', 2, 3, NULL, NULL),
(15, 4, 'wahyu', 2, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bebas`
--

CREATE TABLE `bebas` (
  `id_bebas` int(11) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `tahun` varchar(100) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bebas`
--

INSERT INTO `bebas` (`id_bebas`, `jenis`, `tahun`, `nominal`) VALUES
(3, 'kunjungan industri', '2023', 1500000),
(6, 'modul kelas X', '2023', 300000),
(7, 'seragam', '2022/2023', 850000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` char(250) NOT NULL,
  `jurusan` char(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`, `jurusan`) VALUES
(2, 'X AKL 3', 'Akuntansi Keuangan Lembaga'),
(3, 'X TKRO 1', 'Teknik Kendaraan Ringan Otomotif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1680985544, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `nm_siswa` varchar(250) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nm_siswa`, `id_kelas`) VALUES
(2, 2, 'kusuma wijaya', 3),
(4, 3, 'budi', 3),
(5, 4, 'wahyu', 2),
(6, 5, 'ahmad', 3),
(7, 6, 'soleh', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `spp`
--

CREATE TABLE `spp` (
  `id_spp` int(11) NOT NULL,
  `tahun` char(250) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `spp`
--

INSERT INTO `spp` (`id_spp`, `tahun`, `nominal`) VALUES
(4, '2022/2023', 125000),
(8, '2022/2023', 125000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tunggakan`
--

CREATE TABLE `tunggakan` (
  `id_bayar` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `nm_siswa` varchar(200) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_spp` int(11) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `bulan` varchar(50) DEFAULT NULL,
  `tgl_bayar` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tunggakan`
--

INSERT INTO `tunggakan` (`id_bayar`, `id_siswa`, `nis`, `nm_siswa`, `id_kelas`, `id_spp`, `jumlah`, `bulan`, `tgl_bayar`) VALUES
(37, 4, 3, 'budi', 3, 4, 125000, '04', '2023-04-07'),
(38, 4, 3, 'budi', 3, 4, 125000, '05', '2023-04-07'),
(39, 4, 3, 'budi', 3, 4, 125000, '06', '2023-04-07'),
(40, 4, 3, 'budi', 3, 4, 125000, '07', '2023-04-07'),
(41, 4, 3, 'budi', 3, 4, 125000, '08', '2023-03-01'),
(42, 4, 3, 'budi', 3, 4, 125000, '09', '2023-03-07'),
(43, 4, 3, 'budi', 3, 4, 125000, '10', NULL),
(44, 4, 3, 'budi', 3, 4, 125000, '11', NULL),
(45, 4, 3, 'budi', 3, 4, 125000, '12', NULL),
(46, 4, 3, 'budi', 3, 4, 125000, '01', NULL),
(47, 4, 3, 'budi', 3, 4, 125000, '02', NULL),
(48, 4, 3, 'budi', 3, 4, 125000, '03', NULL),
(49, 5, 4, 'wahyu', 2, 4, 125000, '04', '2023-04-08'),
(50, 5, 4, 'wahyu', 2, 4, 125000, '05', '2023-04-08'),
(51, 5, 4, 'wahyu', 2, 4, 125000, '06', '2023-04-08'),
(52, 5, 4, 'wahyu', 2, 4, 125000, '07', '2023-04-10'),
(53, 5, 4, 'wahyu', 2, 4, 125000, '08', '2023-04-10'),
(54, 5, 4, 'wahyu', 2, 4, 125000, '09', '2023-04-10'),
(55, 5, 4, 'wahyu', 2, 4, 125000, '10', '2023-04-10'),
(56, 5, 4, 'wahyu', 2, 4, 125000, '11', '2023-04-10'),
(57, 5, 4, 'wahyu', 2, 4, 125000, '12', '2023-04-10'),
(58, 5, 4, 'wahyu', 2, 4, 125000, '01', NULL),
(59, 5, 4, 'wahyu', 2, 4, 125000, '02', NULL),
(60, 5, 4, 'wahyu', 2, 4, 125000, '03', NULL),
(61, 6, 5, 'ahmad', 3, 4, 125000, '04', '2023-04-11'),
(62, 6, 5, 'ahmad', 3, 4, 125000, '05', '2023-04-11'),
(63, 6, 5, 'ahmad', 3, 4, 125000, '06', '2023-04-11'),
(64, 6, 5, 'ahmad', 3, 4, 125000, '07', NULL),
(65, 6, 5, 'ahmad', 3, 4, 125000, '08', NULL),
(66, 6, 5, 'ahmad', 3, 4, 125000, '09', NULL),
(67, 6, 5, 'ahmad', 3, 4, 125000, '10', NULL),
(68, 6, 5, 'ahmad', 3, 4, 125000, '11', NULL),
(69, 6, 5, 'ahmad', 3, 4, 125000, '12', NULL),
(70, 6, 5, 'ahmad', 3, 4, 125000, '01', NULL),
(71, 6, 5, 'ahmad', 3, 4, 125000, '02', NULL),
(72, 6, 5, 'ahmad', 3, 4, 125000, '03', NULL),
(73, 7, 6, 'soleh', 2, 8, 125000, '01', '2023-04-12'),
(74, 7, 6, 'soleh', 2, 8, 125000, '01', '2023-04-12'),
(75, 7, 6, 'soleh', 2, 8, 125000, '01', '2023-04-12'),
(76, 7, 6, 'soleh', 2, 8, 125000, '01', '2023-04-12'),
(77, 7, 6, 'soleh', 2, 8, 125000, '01', NULL),
(78, 7, 6, 'soleh', 2, 8, 125000, '01', NULL),
(79, 7, 6, 'soleh', 2, 8, 125000, '01', NULL),
(80, 7, 6, 'soleh', 2, 8, 125000, '01', NULL),
(81, 7, 6, 'soleh', 2, 8, 125000, '01', NULL),
(82, 7, 6, 'soleh', 2, 8, 125000, '01', NULL),
(83, 7, 6, 'soleh', 2, 8, 125000, '01', NULL),
(84, 7, 6, 'soleh', 2, 8, 125000, '01', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'wahyuahmadkh10092000@gmail.com', 'admin', '$2y$10$HKm4a0dWpJLJogibt1m9a.FLcF0hmZbKcykatncmanfkLPMKE9E02', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-04-08 17:03:25', '2023-04-08 17:03:25', NULL),
(7, 'bendahara@gmail.com', 'bendahara', '$2y$10$TBEUmXldz/8gsCfiTR6N0ewjVj9Eef/rhfl8EuJwuARYCGv56CY7u', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-04-10 06:55:41', '2023-04-10 06:55:41', NULL),
(8, 'siswa@gmail.com', 'siswa', '$2y$10$m2jAa7nFIwX5O8Vz7DSNIuYdOIz2BPK7n62I67R92wZlJ4Z4jYoCq', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-04-10 06:58:57', '2023-04-10 06:58:57', NULL),
(9, 'superadmin@gmail.com', 'Super admin', '$2y$10$8BlWVidWMcK5Igf1fnpYgeNXLFMwf0N8FrUjto3dhDjnsuIFyiN.K', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-04-10 07:43:17', '2023-04-10 07:43:17', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indeks untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indeks untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indeks untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indeks untuk tabel `bayar_bebas`
--
ALTER TABLE `bayar_bebas`
  ADD PRIMARY KEY (`id_bayar`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_bebas` (`id_bebas`);

--
-- Indeks untuk tabel `bebas`
--
ALTER TABLE `bebas`
  ADD PRIMARY KEY (`id_bebas`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `nis` (`nis`);

--
-- Indeks untuk tabel `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- Indeks untuk tabel `tunggakan`
--
ALTER TABLE `tunggakan`
  ADD PRIMARY KEY (`id_bayar`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_spp` (`id_spp`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `bayar_bebas`
--
ALTER TABLE `bayar_bebas`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `bebas`
--
ALTER TABLE `bebas`
  MODIFY `id_bebas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `spp`
--
ALTER TABLE `spp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tunggakan`
--
ALTER TABLE `tunggakan`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `bayar_bebas`
--
ALTER TABLE `bayar_bebas`
  ADD CONSTRAINT `bayar_bebas_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bayar_bebas_ibfk_3` FOREIGN KEY (`id_bebas`) REFERENCES `bebas` (`id_bebas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tunggakan`
--
ALTER TABLE `tunggakan`
  ADD CONSTRAINT `tunggakan_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tunggakan_ibfk_3` FOREIGN KEY (`id_spp`) REFERENCES `spp` (`id_spp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tunggakan_ibfk_4` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
