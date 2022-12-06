-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Des 2022 pada 17.23
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel-portofolio`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `halaman`
--

CREATE TABLE `halaman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `halaman`
--

INSERT INTO `halaman` (`id`, `judul`, `isi`, `created_at`, `updated_at`) VALUES
(1, 'Membuat Tampilan Layout Website Sederhana Dengan HTML dan CSS', '<p style=\"padding: 0px 0px 1em; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; outline: none; list-style: none; border: 0px none; color: rgb(51, 51, 51); font-family: &quot;Times New Roman&quot;, Times, serif;\">Layout situs merupakan tata letak elemen halaman situs web.Layout situs yang baik akan menjadikan halaman web web baik juga. Dengan desain halaman web yang baik dan tepat akan membuat pengunjung merasa nyaman dengan tampilan (layout) halaman web tersebut, dan tetap dapat fokus pada isi (content). Desain halaman web tidak mengganggu kejelasan bagian isi. Pada desain layout yang tepat, pengunjung dapat berpindah ke halaman lain dengan mudah melalui navigasi yang baik, mudah dan informatif.</p><p style=\"padding: 0px 0px 1em; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; outline: none; list-style: none; border: 0px none; color: rgb(51, 51, 51); font-family: &quot;Times New Roman&quot;, Times, serif;\">Pengunjung merasa bahwa setiap halaman dari situs merupakan satu kesatuan. Setiap halaman memiliki posisi dan kesamaan tampilan (layout), yang berbeda hanya isi (content). Adanya layout tata letak yang baik dapat membuat halaman lebih cantik dan seimbang, terutama enak dilihat dan mudah dibaca. Desain layout suatu halaman web meliputi penyusunan:<br style=\"padding: 0px; margin: 0px; outline: none; list-style: none; border: 0px none;\">– pembagian tempat pada halaman<br style=\"padding: 0px; margin: 0px; outline: none; list-style: none; border: 0px none;\">– pengaturan jarak sepasi<br style=\"padding: 0px; margin: 0px; outline: none; list-style: none; border: 0px none;\">– pengelompokan teks dan grafik<br style=\"padding: 0px; margin: 0px; outline: none; list-style: none; border: 0px none;\">– serta penekanan pada suatu bagian tertentu</p>', '2022-11-30 08:45:04', '2022-11-30 20:13:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `metadata`
--

CREATE TABLE `metadata` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `metadata`
--

INSERT INTO `metadata` (`id`, `meta_key`, `meta_value`, `created_at`, `updated_at`) VALUES
(4, '_language', 'HTML, PHP, javascript, codeigniter, php, css3', '2022-12-06 15:46:57', '2022-12-06 16:06:30'),
(6, '_workflow', '<ul><li>Gitlab</li><li>Github</li></ul>', '2022-12-06 15:49:14', '2022-12-06 16:06:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2022_11_29_145132_table_users_add_column_google_id', 2),
(3, '2022_11_29_152651_users_set_default_password', 3),
(4, '2022_11_30_135533_user_add_column_avatar', 4),
(5, '2022_11_30_140617_create_halamen_table', 5),
(6, '2022_12_05_132421_create_riwayats_table', 6),
(7, '2022_12_05_220815_riwayat_set_default_isi', 7),
(8, '2022_12_06_220751_create_metadata_table', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat`
--

CREATE TABLE `riwayat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe` enum('experience','education') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_akhir` date DEFAULT NULL,
  `info1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `riwayat`
--

INSERT INTO `riwayat` (`id`, `judul`, `tipe`, `tanggal_mulai`, `tanggal_akhir`, `info1`, `info2`, `info3`, `isi`, `created_at`, `updated_at`) VALUES
(2, 'Pro Player', 'experience', '2022-12-05', NULL, 'Gojek', NULL, NULL, '<p>Hello</p>', '2022-12-05 14:40:13', '2022-12-05 14:47:01'),
(4, 'STMIK WIdya Pratama', 'education', '2022-12-05', '2022-12-25', 'Teknik', 'Teknik Informatika', '3,69', NULL, '2022-12-05 15:26:50', '2022-12-05 15:26:50'),
(5, 'Staff', 'experience', '2022-12-07', '2022-12-25', 'Technopark', NULL, NULL, '<p>Hello Hai</p>', '2022-12-05 15:30:07', '2022-12-05 15:30:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `google_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `google_id`, `avatar`) VALUES
(1, 'Ballsky', 'syaifuliqbal26062000@gmail.com', NULL, NULL, NULL, '2022-11-29 08:31:50', '2022-11-30 07:03:52', '103729054250599515566', '103729054250599515566.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `halaman`
--
ALTER TABLE `halaman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `metadata`
--
ALTER TABLE `metadata`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `halaman`
--
ALTER TABLE `halaman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `metadata`
--
ALTER TABLE `metadata`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
