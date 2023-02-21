-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2023 at 07:43 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpusmuhammadiyah`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` bigint(20) UNSIGNED NOT NULL,
  `kode_buku` bigint(20) NOT NULL,
  `nama_buku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerbit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rak` int(11) NOT NULL,
  `stok_buku` int(11) NOT NULL,
  `foto_buku` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `kode_buku`, `nama_buku`, `penerbit`, `rak`, `stok_buku`, `foto_buku`, `created_at`, `updated_at`) VALUES
(3, 2251821, 'Cerita Rakyat Sumatera Selatan', 'penario', 8, 2, 'buku.jpeg', '2022-12-05 10:04:08', '2023-01-19 17:29:52'),
(4, 132343, 'Ilmu Pengetahuan Alam', 'sidu', 2, 2, 'buku.jpeg', '2022-12-05 10:08:57', '2023-01-19 17:26:31'),
(5, 755886878, 'Matematika', 'Erlangga', 2, 2, 'WhatsApp Image 2022-09-09 at 20.14.13 (2).jpeg', '2023-01-19 17:29:02', '2023-01-19 17:29:02'),
(6, 535395389, 'BOBO', 'BOBO', 10, 2, 'WhatsApp Image 2022-09-09 at 20.17.15.jpeg', '2023-01-19 17:31:16', '2023-01-19 17:31:16'),
(7, 38383929, 'Bahasa Inggris', 'Erlangga', 9, 1, 'WhatsApp Image 2022-09-11 at 20.59.57 (1).jpeg', '2023-01-19 17:31:58', '2023-01-19 19:37:36');

-- --------------------------------------------------------

--
-- Table structure for table `denda`
--

CREATE TABLE `denda` (
  `id_denda` bigint(20) UNSIGNED NOT NULL,
  `nominal_denda` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `denda`
--

INSERT INTO `denda` (`id_denda`, `nominal_denda`, `created_at`, `updated_at`) VALUES
(2, '3000', '2023-01-18 08:09:24', '2023-01-18 08:09:24');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` bigint(20) UNSIGNED NOT NULL,
  `jenis_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `jenis_kelas`, `created_at`, `updated_at`) VALUES
(6, 'kelas 4 B', '2022-12-02 07:52:28', '2023-01-19 17:12:16'),
(7, 'kelas 4 A', '2022-12-02 09:07:58', '2023-01-19 17:12:06'),
(8, 'kelas 4 C', '2023-01-19 17:12:29', '2023-01-19 17:12:29'),
(9, 'kelas 4 D', '2023-01-19 17:12:57', '2023-01-19 17:12:57'),
(10, 'kelas 5 A', '2023-01-19 17:13:08', '2023-01-19 17:13:08'),
(11, 'kelas 5 B', '2023-01-19 17:13:19', '2023-01-19 17:13:19'),
(12, 'Kelas 5 C', '2023-01-19 17:13:28', '2023-01-19 17:13:28'),
(13, 'Kelas 5 D', '2023-01-19 17:13:38', '2023-01-19 17:13:38'),
(14, 'kelas 6 A', '2023-01-19 17:14:13', '2023-01-19 17:14:13'),
(15, 'kelas 6 B', '2023-01-19 17:14:30', '2023-01-19 17:14:30'),
(16, 'Kelas 6 C', '2023-01-19 17:14:39', '2023-01-19 17:14:39'),
(17, 'kelas 6 D', '2023-01-19 17:14:48', '2023-01-19 17:14:48');

-- --------------------------------------------------------

--
-- Table structure for table `kepala_sekolah`
--

CREATE TABLE `kepala_sekolah` (
  `id_kepsek` bigint(20) UNSIGNED NOT NULL,
  `nip_kepsek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kepsek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin_kepsek` enum('p','l') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir_kepsek` date NOT NULL,
  `foto_kepsek` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kepala_sekolah`
--

INSERT INTO `kepala_sekolah` (`id_kepsek`, `nip_kepsek`, `nama_kepsek`, `jenis_kelamin_kepsek`, `tgl_lahir_kepsek`, `foto_kepsek`, `created_at`, `updated_at`) VALUES
(1, '12726377', 'rodiyahh', 'l', '1966-10-27', '086593900_1553668873-LISA_BLACKPINK_1.jpg', '2023-01-20 18:32:55', '2023-01-20 18:42:22');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2022_12_02_070552_create_kelas_table', 3),
(11, '2022_12_03_214202_create_rak_table', 4),
(12, '2022_12_02_051558_create_siswa_table', 5),
(13, '2022_12_04_135623_create_buku_table', 6),
(16, '2022_12_06_005647_create_pinjambuku_table', 9),
(17, '2022_12_06_121632_create_riwayat_pinjam_table', 10),
(18, '2023_01_18_000007_create_denda_table', 11),
(20, '2023_01_18_184407_create_kepala_sekolah_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pinjambuku`
--

CREATE TABLE `pinjambuku` (
  `id_pinjam` bigint(20) UNSIGNED NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pinjambuku`
--

INSERT INTO `pinjambuku` (`id_pinjam`, `id_siswa`, `id_buku`, `tanggal_kembali`, `created_at`, `updated_at`) VALUES
(6, 8, 7, '2023-01-27', '2023-01-19 19:37:36', '2023-01-19 19:37:36');

-- --------------------------------------------------------

--
-- Table structure for table `rak`
--

CREATE TABLE `rak` (
  `id_rak` bigint(20) UNSIGNED NOT NULL,
  `jenis_rak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rak`
--

INSERT INTO `rak` (`id_rak`, `jenis_rak`, `created_at`, `updated_at`) VALUES
(2, 'Buku IPA', '2022-12-04 04:46:20', '2023-01-19 17:26:58'),
(8, 'Cerita Rakyat', '2023-01-19 17:27:25', '2023-01-19 17:27:25'),
(9, 'Bahasa', '2023-01-19 17:27:47', '2023-01-19 17:27:47'),
(10, 'Majalah', '2023-01-19 17:28:02', '2023-01-19 17:30:34');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pinjam`
--

CREATE TABLE `riwayat_pinjam` (
  `id_riwayat` bigint(20) UNSIGNED NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `denda` bigint(20) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `riwayat_pinjam`
--

INSERT INTO `riwayat_pinjam` (`id_riwayat`, `id_siswa`, `id_buku`, `tanggal_kembali`, `denda`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 4, '2022-12-13', 5000, 'selesai', '2022-12-06 05:51:18', '2022-12-06 18:41:22'),
(2, 1, 4, '2022-12-17', 0, 'selesai', '2022-12-10 14:30:53', '2022-12-10 14:31:16'),
(3, 1, 4, '2022-12-30', 0, 'selesai', '2022-12-23 13:43:45', '2022-12-25 07:31:21'),
(4, 1, 3, '2023-01-01', 0, 'selesai', '2022-12-25 07:32:14', '2023-01-18 08:31:01'),
(5, 1, 3, '2023-01-01', 51000, 'selesai', '2023-01-18 11:33:52', '2023-01-18 11:37:21'),
(6, 8, 7, '2023-01-27', NULL, 'pinjam', '2023-01-19 19:37:36', '2023-01-19 19:37:36');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` bigint(20) UNSIGNED NOT NULL,
  `nis` bigint(20) NOT NULL,
  `barcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('p','l') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `barcode`, `nama_siswa`, `jenis_kelamin`, `tgl_lahir`, `kelas`, `foto`, `created_at`, `updated_at`) VALUES
(1, 1289302329, '8992759170580', 'Al Huda', 'l', '1999-01-22', '7', 'WhatsApp Image 2022-09-03 at 05.39.02 (2).jpeg', '2022-12-04 04:55:23', '2023-01-19 17:20:49'),
(2, 3537347353, '901813132', 'Ade Estyana', 'p', '2023-01-20', '6', 'WhatsApp Image 2022-09-09 at 19.37.04.jpeg', '2023-01-19 17:16:36', '2023-01-19 17:18:22'),
(3, 8486435433, '206616610', 'Ardiansyah', 'l', '2023-01-20', '8', 'WhatsApp Image 2022-09-11 at 20.59.57 (1).jpeg', '2023-01-19 17:17:15', '2023-01-19 17:17:15'),
(4, 6324252232, '762096216', 'Sayfudin', 'l', '2023-01-20', '9', 'WhatsApp Image 2022-09-11 at 20.59.59 (1).jpeg', '2023-01-19 17:18:12', '2023-01-19 17:18:12'),
(5, 9865485433, '300779917', 'Indah Anggraini', 'p', '2023-01-20', '10', 'WhatsApp Image 2022-09-09 at 21.20.14.jpeg', '2023-01-19 17:19:07', '2023-01-19 17:19:07'),
(6, 332525553, '61934586', 'M Bastian', 'l', '2023-01-20', '11', 'WhatsApp Image 2022-09-09 at 19.29.24.jpeg', '2023-01-19 17:19:44', '2023-01-19 17:19:44'),
(7, 565655433, '141512814', 'Agung Kurniawan', 'l', '2023-01-20', '12', 'WhatsApp Image 2022-09-03 at 05.39.01 (2).jpeg', '2023-01-19 17:20:26', '2023-01-19 17:20:26'),
(8, 865853345, '169026197', 'Fuzan', 'l', '2023-01-20', '13', 'WhatsApp Image 2022-09-03 at 05.39.01 (3).jpeg', '2023-01-19 17:21:52', '2023-01-19 17:21:52'),
(9, 547464563, '63586196', 'Hafiz', 'l', '2023-01-20', '14', 'WhatsApp Image 2022-09-03 at 05.39.01.jpeg', '2023-01-19 17:22:33', '2023-01-19 17:22:33'),
(10, 5642326711, '521544757', 'Putri', 'p', '2023-01-20', '16', '', '2023-01-19 17:23:18', '2023-01-19 17:23:18'),
(11, 211355355, '698386875', 'Permata', 'p', '2023-01-20', '15', '', '2023-01-19 17:23:56', '2023-01-19 17:23:56'),
(12, 2228887744, '749302924', 'Roby', 'l', '2023-01-20', '17', '', '2023-01-19 17:24:19', '2023-01-19 17:24:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nip`, `name`, `telp`, `email_verified_at`, `password`, `type`, `foto`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '123456789', 'Rimba Sitio', '08172733', NULL, '$2y$10$LkhnULWnKoggQl/mWWRUHunSy4nUiHw2Xm1RbykogtJAMgdKNKaka', 'Petugas', 'WhatsApp Image 2022-12-11 at 17.38.08.jpeg', NULL, '2022-12-01 07:34:32', '2023-01-19 17:10:30'),
(3, '12345678', 'Badriah', '08117807970', NULL, '$2y$10$sQFwF0wX3oTQsVCTqQkPQuUvfrUSrqvGgugi5vHSdsQi9W3OQKWhW', 'Kepsek', '086593900_1553668873-LISA_BLACKPINK_1.jpg', NULL, '2023-01-09 09:55:33', '2023-01-19 17:09:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `denda`
--
ALTER TABLE `denda`
  ADD PRIMARY KEY (`id_denda`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `kepala_sekolah`
--
ALTER TABLE `kepala_sekolah`
  ADD PRIMARY KEY (`id_kepsek`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pinjambuku`
--
ALTER TABLE `pinjambuku`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indexes for table `rak`
--
ALTER TABLE `rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indexes for table `riwayat_pinjam`
--
ALTER TABLE `riwayat_pinjam`
  ADD PRIMARY KEY (`id_riwayat`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `denda`
--
ALTER TABLE `denda`
  MODIFY `id_denda` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `kepala_sekolah`
--
ALTER TABLE `kepala_sekolah`
  MODIFY `id_kepsek` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pinjambuku`
--
ALTER TABLE `pinjambuku`
  MODIFY `id_pinjam` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rak`
--
ALTER TABLE `rak`
  MODIFY `id_rak` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `riwayat_pinjam`
--
ALTER TABLE `riwayat_pinjam`
  MODIFY `id_riwayat` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
