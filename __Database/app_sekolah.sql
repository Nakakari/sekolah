-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2022 at 04:40 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_sklh`
--

CREATE TABLE `data_sklh` (
  `id_data_sklh` int(11) NOT NULL,
  `nama_sklh` varchar(255) NOT NULL,
  `almt_sklh` text NOT NULL,
  `nama_app_sklh` varchar(255) NOT NULL,
  `foto_sklh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_sklh`
--

INSERT INTO `data_sklh` (`id_data_sklh`, `nama_sklh`, `almt_sklh`, `nama_app_sklh`, `foto_sklh`) VALUES
(2, 'SMA 1 Dempel', 'Dempel', 'Sekolahku', '1656989521_logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kelamin`
--

CREATE TABLE `jenis_kelamin` (
  `id_jk` int(11) NOT NULL,
  `nama_jk` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_kelamin`
--

INSERT INTO `jenis_kelamin` (`id_jk`, `nama_jk`) VALUES
(1, 'Laki-laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, '12 IPA 1'),
(2, '12 IPS 1');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `mode` varchar(11) NOT NULL,
  `pewaktu` datetime DEFAULT NULL,
  `kata_pengantar` text NOT NULL,
  `link_materi` varchar(255) NOT NULL,
  `kode_soal` varchar(11) DEFAULT NULL,
  `k_enrol` varchar(11) DEFAULT NULL,
  `id_guru` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_materi`, `judul`, `mode`, `pewaktu`, `kata_pengantar`, `link_materi`, `kode_soal`, `k_enrol`, `id_guru`) VALUES
(12, 'Tulang', 'mudah', '2022-07-05 19:34:00', 'Ini adlah materi tulang', 'https://youtu.be/5Pus_gY8d74', 'soal1', 'm11', 'guru2');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('sarinandhika@gmail.com', '$2y$10$Mc6bjK1hk2.jfVYW1DoFX.MyDTxbpN9ZsS3a6YLXgZzBNDmkAgTdu', '2022-07-03 07:39:05');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `mapel` varchar(255) NOT NULL,
  `k_enrol` varchar(255) NOT NULL,
  `id_siswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `name`, `kelas`, `password`, `email`, `mapel`, `k_enrol`, `id_siswa`) VALUES
('10a', 'Agung', '10 IPA 1', NULL, 'agung@mail.com', 'Matematika', 'm11', 6),
('10b', 'Mukti', '10 IPA 1', NULL, 'mukti@mail.com', 'Matematika', 'm11', 7);

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id_soal` int(11) NOT NULL,
  `soal` text NOT NULL,
  `opsi_satu` varchar(255) DEFAULT NULL,
  `opsi_dua` varchar(255) DEFAULT NULL,
  `opsi_tiga` varchar(255) DEFAULT NULL,
  `opsi_empat` varchar(255) DEFAULT NULL,
  `kunci` varchar(255) NOT NULL,
  `skor` int(11) NOT NULL,
  `pembahasan` text NOT NULL,
  `kode_soal` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id_soal`, `soal`, `opsi_satu`, `opsi_dua`, `opsi_tiga`, `opsi_empat`, `kunci`, `skor`, `pembahasan`, `kode_soal`) VALUES
(7, '3+3', '3', '4', '5', '6', 'A', 10, '0', 'soal1'),
(8, 'Siapa Nama Saya?', 'AKU', 'KAMU', 'DAN', 'KAU', 'A', 10, 'Nama Saya adalah Aku', 'soal1'),
(9, 'tulang', 't', 'l', 'a', 'g', 'B', 10, 'Terserah', 'soal1');

-- --------------------------------------------------------

--
-- Table structure for table `trx_kelas`
--

CREATE TABLE `trx_kelas` (
  `id_trx_kelas` int(11) NOT NULL,
  `k_enrol` varchar(11) DEFAULT NULL,
  `kelas` varchar(255) NOT NULL,
  `mapel` varchar(255) NOT NULL,
  `jml_siswa` int(11) DEFAULT NULL,
  `id_guru` varchar(11) DEFAULT NULL,
  `id_kls` int(11) DEFAULT NULL,
  `id_mpl` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trx_kelas`
--

INSERT INTO `trx_kelas` (`id_trx_kelas`, `k_enrol`, `kelas`, `mapel`, `jml_siswa`, `id_guru`, `id_kls`, `id_mpl`) VALUES
(31, 'm11', '10 IPA 1', 'Matematika', NULL, 'guru2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` int(11) DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nis` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mapel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `id_guru` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `k_enrol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `jk`, `foto`, `alamat`, `email`, `nis`, `kelas`, `mapel`, `email_verified_at`, `is_admin`, `id_guru`, `password`, `remember_token`, `created_at`, `updated_at`, `k_enrol`) VALUES
(72, 'Pasi', 1, '1656941310_chadengle.jpg', 'Di Bumi', 'admin@admin.com', NULL, NULL, NULL, NULL, 1, '', '$2y$10$IQXxdfX6rYIbMMWmd2NkSOyHEYtdfdVf/eCFniQNPXP45WGkzlcI2', NULL, '2022-07-04 06:28:30', '2022-07-04 06:28:30', NULL),
(73, 'Pengajar', 2, '1656941372_jm_denis.jpg', 'Sekolah', 'pengajar@mail.com', NULL, NULL, NULL, NULL, 2, 'guru1', '$2y$10$B6skyRUt1OP6V7QpjqDgOe/1Ygqf1mwtJQEz3lnz6w/mr73EDWdCO', NULL, '2022-07-04 06:29:32', '2022-07-04 06:29:32', NULL),
(77, 'Guru', 1, '1657022077_arashmil.jpg', 'Sekolah Harapan Bangsa', 'guru@mail.com', NULL, NULL, NULL, NULL, 2, 'guru2', '$2y$10$VvQFwYKCEBBXtXH79fd22eFvQFpE7Knn.IgvgRxO2LhDd8jztiOxC', NULL, '2022-07-05 04:54:37', '2022-07-05 04:54:37', NULL),
(78, 'Agung', NULL, NULL, NULL, 'agung@mail.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$CKzYAlb3I68EKLdnGryhqOb.0C6amiuuZp9Q8OUJyLoMfjncFpSO.', NULL, '2022-07-05 05:51:34', '2022-07-05 05:51:34', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_sklh`
--
ALTER TABLE `data_sklh`
  ADD PRIMARY KEY (`id_data_sklh`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  ADD PRIMARY KEY (`id_jk`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`);

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
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indexes for table `trx_kelas`
--
ALTER TABLE `trx_kelas`
  ADD PRIMARY KEY (`id_trx_kelas`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_sklh`
--
ALTER TABLE `data_sklh`
  MODIFY `id_data_sklh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  MODIFY `id_jk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `trx_kelas`
--
ALTER TABLE `trx_kelas`
  MODIFY `id_trx_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
