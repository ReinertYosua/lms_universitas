-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Apr 2023 pada 08.58
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms_universitas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nidn` int(11) NOT NULL,
  `namadsn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempatlahirdsn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgllahirdsn` date NOT NULL,
  `genderdsn` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamatdsn` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fotodsn` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `notlpdsn` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approve` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id`, `user_id`, `nidn`, `namadsn`, `tempatlahirdsn`, `tgllahirdsn`, `genderdsn`, `alamatdsn`, `fotodsn`, `notlpdsn`, `approve`, `active`, `created_at`, `updated_at`) VALUES
(3, 12, 66666666, 'Reinert Y Rumagit', 'Jakarta', '1992-11-24', 'L', 'Bekasi', '66666666.jpeg', '08888888888', 'Y', 'Y', '2023-01-23 10:24:18', '2023-03-23 10:45:52'),
(4, 13, 2234567, 'galih', 'jakatta', '2023-01-26', 'L', 'rrwer', '2234567.jpeg', '14124124124124', 'Y', 'Y', '2023-01-23 11:35:04', '2023-01-27 04:06:27'),
(5, 14, 99999999, 'Ester Yakun', 'jakarta', '2023-01-17', 'L', 'bekasi', '99999999.png', '456758697', 'Y', 'Y', '2023-01-23 11:39:00', '2023-01-27 04:06:35'),
(6, 15, 123, '3123', 'fsdf', '2023-02-03', 'L', 'fsdf', '123.png', '123', 'Y', 'Y', '2023-01-23 20:45:50', '2023-01-27 10:40:45'),
(7, 16, 21111111, 'Rain Josh', 'Jakarta', '2023-01-18', 'L', 'Jakarta', '21111111.png', '124124124124', 'N', 'Y', '2023-01-23 20:54:42', '2023-02-02 03:58:04'),
(8, 26, 777777777, 'Agung Prasetyo', 'Banten', '2023-02-16', 'L', 'Jakarta utara pluit', '777777777.png', '08123423425', 'Y', 'Y', '2023-02-06 21:10:05', '2023-02-06 21:10:30'),
(10, 30, 88888888, 'Budi Kusuma', 'Jakarta', '2023-02-07', 'L', 'Grogol', '88888888.jpg', '0812314124', 'N', 'Y', '2023-02-08 05:01:12', '2023-02-08 05:01:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(11) NOT NULL,
  `id_scoring` bigint(20) NOT NULL,
  `saran` longtext NOT NULL,
  `id_dosen` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `feedback`
--

INSERT INTO `feedback` (`id`, `id_scoring`, `saran`, `id_dosen`, `created_at`, `updated_at`) VALUES
(1, 1, 'ee', 3, '2023-02-26 05:19:25', '2023-02-26 05:23:03'),
(2, 25, 'bb', 3, '2023-02-26 05:19:25', '2023-02-26 05:19:25'),
(3, 2, 'ff', 3, '2023-02-26 05:19:25', '2023-02-26 05:23:03'),
(4, 3, 'dd', 3, '2023-02-26 05:19:25', '2023-02-26 05:19:25'),
(5, 19, 'Silahkan tingkatkan lagi', 3, '2023-02-26 05:24:05', '2023-02-26 05:24:05'),
(6, 20, 'Pelajari materi lebih mendalam', 3, '2023-02-26 05:24:05', '2023-02-26 05:24:05'),
(7, 21, 'Nilai dapat ditingkatkan', 3, '2023-02-26 05:24:05', '2023-02-26 05:24:05'),
(8, 22, 'Pertahankan', 3, '2023-02-26 05:24:05', '2023-02-26 05:24:05'),
(9, 13, 'Pertahankan', 3, '2023-02-26 05:38:06', '2023-02-26 05:38:06'),
(10, 26, 'Bisa ditingkatkan', 3, '2023-02-26 05:38:06', '2023-02-26 05:38:06'),
(11, 14, 'Belajar banyak', 3, '2023-02-26 05:38:06', '2023-02-26 05:38:06'),
(12, 15, 'Sudah bagus', 3, '2023-02-26 05:38:06', '2023-02-26 05:38:06'),
(13, 16, 'Silahkan ulang kembali', 3, '2023-02-26 05:50:00', '2023-02-26 05:50:00'),
(14, 27, 'Pertahankan', 3, '2023-02-26 05:50:00', '2023-02-26 05:50:00'),
(15, 17, 'Tingkatkan lebih baik lagi', 3, '2023-02-26 05:50:00', '2023-02-26 05:50:00'),
(16, 18, 'Masih bisa lebih baik lagi', 3, '2023-02-26 05:50:00', '2023-02-26 05:50:00'),
(17, 7, 'Sudah baik', 3, '2023-02-26 05:51:35', '2023-02-26 05:51:35'),
(18, 23, 'Sudah bagus', 3, '2023-02-26 05:51:35', '2023-02-26 05:51:35'),
(19, 8, 'Pertahankan', 3, '2023-02-26 05:51:35', '2023-02-26 05:51:35'),
(20, 9, 'Tetap pertahankan', 3, '2023-02-26 05:51:35', '2023-02-26 05:51:35'),
(30, 32, 'aaa', 3, '2023-03-23 12:56:04', '2023-03-23 12:56:04'),
(31, 35, 'bbb', 3, '2023-03-23 12:56:04', '2023-03-23 12:56:04'),
(32, 33, 'ccc', 3, '2023-03-23 12:56:04', '2023-03-23 12:56:04'),
(33, 34, 'ddd', 3, '2023-03-23 12:56:04', '2023-03-23 12:56:04'),
(34, 28, 'Sudah Bagus silahkan dipertahankan', 3, '2023-03-24 16:15:18', '2023-03-24 16:15:18'),
(35, 31, 'Pelajari lebih dalam lagi materinya', 3, '2023-03-24 16:15:18', '2023-03-24 16:15:18'),
(36, 29, 'Kamu bisa lebih baik lagi', 3, '2023-03-24 16:15:18', '2023-03-24 16:15:18'),
(37, 30, 'Tingkatkan lagi nilainya', 3, '2023-03-24 16:15:18', '2023-03-24 16:15:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `file_materi`
--

CREATE TABLE `file_materi` (
  `id` bigint(20) NOT NULL,
  `id_materi_mtk` bigint(20) NOT NULL,
  `nama_materi` text NOT NULL,
  `jenis_materi` enum('Multimedia','PPT','PDF','Buku','Diktat','Dokumen','Excel','Teks','Tugas','Proyek','Diskusi','Referensi') NOT NULL,
  `gaya_belajar` enum('General','Active','Reflective','Sensing','Intuitive','Visual','Verbal','Sequential','Global') NOT NULL,
  `file_materi` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `file_materi`
--

INSERT INTO `file_materi` (`id`, `id_materi_mtk`, `nama_materi`, `jenis_materi`, `gaya_belajar`, `file_materi`, `created_at`, `updated_at`) VALUES
(231, 8, 'Sesi 2 General', 'Diskusi', 'General', 'COMP0003_session2_General.pptx', NULL, NULL),
(232, 8, 'Sesi 2 Active', 'Excel', 'Active', 'COMP0003_session2_Active.pptx', NULL, NULL),
(233, 8, 'Sesi 2 Reflective', 'Teks', 'Reflective', 'COMP0003_session2_Reflective.pptx', NULL, NULL),
(234, 8, 'Sesi 2 Sensing', 'Multimedia', 'Sensing', 'COMP0003_session2_Sensing.pptx', NULL, NULL),
(235, 8, 'Sesi 2 Intuitive', 'Diktat', 'Intuitive', 'COMP0003_session2_Intuitive.pptx', NULL, NULL),
(236, 8, 'Sesi 2 Visual', 'Referensi', 'Visual', 'COMP0003_session2_Visual.pptx', NULL, NULL),
(237, 8, 'Sesi 2 Verbal', 'PPT', 'Verbal', 'COMP0003_session2_Verbal.pptx', NULL, NULL),
(238, 8, 'Sesi 2 Sequential', 'Diskusi', 'Sequential', 'COMP0003_session2_Sequential.pptx', NULL, NULL),
(239, 8, 'Sesi 2 Global', 'PDF', 'Global', 'COMP0003_session2_Global.pptx', NULL, NULL),
(240, 9, 'Sesi 3 General', 'Excel', 'General', 'COMP0003_session3_General.pptx', NULL, NULL),
(241, 9, 'Sesi 3 Active', 'Multimedia', 'Active', 'COMP0003_session3_Active.pptx', NULL, NULL),
(242, 9, 'Sesi 3 Reflective', 'Excel', 'Reflective', 'COMP0003_session3_Reflective.pptx', NULL, NULL),
(243, 9, 'Sesi 3 Sensing', 'Proyek', 'Sensing', 'COMP0003_session3_Sensing.pptx', NULL, NULL),
(244, 9, 'Sesi 3 Intuitive', 'Diktat', 'Intuitive', 'COMP0003_session3_Intuitive.pptx', NULL, NULL),
(245, 9, 'Sesi 3 Visual', 'Dokumen', 'Visual', 'COMP0003_session3_Visual.pptx', NULL, NULL),
(246, 9, 'Sesi 3 Verbal', 'Diskusi', 'Verbal', 'COMP0003_session3_Verbal.pptx', NULL, NULL),
(247, 9, 'Sesi 3 Sequential', 'Diktat', 'Sequential', 'COMP0003_session3_Sequential.pptx', NULL, NULL),
(248, 9, 'Sesi 3 Global', 'Proyek', 'Global', 'COMP0003_session3_Global.pptx', NULL, NULL),
(249, 10, 'Sesi 4 General', 'Multimedia', 'General', 'COMP0003_session4_General.pptx', NULL, NULL),
(250, 10, 'Sesi 4 Active', 'Dokumen', 'Active', 'COMP0003_session4_Active.pptx', NULL, NULL),
(251, 10, 'Sesi 4 Reflective', 'PDF', 'Reflective', 'COMP0003_session4_Reflective.pptx', NULL, NULL),
(252, 10, 'Sesi 4 Sensing', 'Dokumen', 'Sensing', 'COMP0003_session4_Sensing.pptx', NULL, NULL),
(253, 10, 'Sesi 4 Intuitive', 'Tugas', 'Intuitive', 'COMP0003_session4_Intuitive.pptx', NULL, NULL),
(254, 10, 'Sesi 4 Visual', 'Proyek', 'Visual', 'COMP0003_session4_Visual.pptx', NULL, NULL),
(255, 10, 'Sesi 4 Verbal', 'PDF', 'Verbal', 'COMP0003_session4_Verbal.pptx', NULL, NULL),
(256, 10, 'Sesi 4 Sequential', 'Referensi', 'Sequential', 'COMP0003_session4_Sequential.pptx', NULL, NULL),
(257, 10, 'Sesi 4 Global', 'PDF', 'Global', 'COMP0003_session4_Global.pptx', NULL, NULL),
(258, 11, 'Sesi 5 General', 'Dokumen', 'General', 'COMP0003_session5_General.pptx', NULL, NULL),
(259, 11, 'Sesi 5 Active', 'Referensi', 'Active', 'COMP0003_session5_Active.pptx', NULL, NULL),
(260, 11, 'Sesi 5 Reflective', 'Diskusi', 'Reflective', 'COMP0003_session5_Reflective.pptx', NULL, NULL),
(261, 11, 'Sesi 5 Sensing', 'PPT', 'Sensing', 'COMP0003_session5_Sensing.pptx', NULL, NULL),
(262, 11, 'Sesi 5 Intuitive', 'PDF', 'Intuitive', 'COMP0003_session5_Intuitive.pptx', NULL, NULL),
(263, 11, 'Sesi 5 Visual', 'Tugas', 'Visual', 'COMP0003_session5_Visual.pptx', NULL, NULL),
(264, 11, 'Sesi 5 Verbal', 'Referensi', 'Verbal', 'COMP0003_session5_Verbal.pptx', NULL, NULL),
(265, 11, 'Sesi 5 Sequential', 'Dokumen', 'Sequential', 'COMP0003_session5_Sequential.pptx', NULL, NULL),
(266, 11, 'Sesi 5 Global', 'Diktat', 'Global', 'COMP0003_session5_Global.pptx', NULL, NULL),
(267, 12, 'Sesi 6 General', 'Buku', 'General', 'COMP0003_session6_General.pptx', NULL, NULL),
(268, 12, 'Sesi 6 Active', 'Buku', 'Active', 'COMP0003_session6_Active.pptx', NULL, NULL),
(269, 12, 'Sesi 6 Reflective', 'Buku', 'Reflective', 'COMP0003_session6_Reflective.pptx', NULL, NULL),
(270, 12, 'Sesi 6 Sensing', 'Tugas', 'Sensing', 'COMP0003_session6_Sensing.pptx', NULL, NULL),
(271, 12, 'Sesi 6 Intuitive', 'Dokumen', 'Intuitive', 'COMP0003_session6_Intuitive.pptx', NULL, NULL),
(272, 12, 'Sesi 6 Visual', 'Tugas', 'Visual', 'COMP0003_session6_Visual.pptx', NULL, NULL),
(273, 12, 'Sesi 6 Verbal', 'Excel', 'Verbal', 'COMP0003_session6_Verbal.pptx', NULL, NULL),
(274, 12, 'Sesi 6 Sequential', 'PPT', 'Sequential', 'COMP0003_session6_Sequential.pptx', NULL, NULL),
(275, 12, 'Sesi 6 Global', 'Excel', 'Global', 'COMP0003_session6_Global.pptx', NULL, NULL),
(276, 13, 'Sesi 7 General', 'Excel', 'General', 'COMP0003_session7_General.pptx', NULL, NULL),
(277, 13, 'Sesi 7 Active', 'PDF', 'Active', 'COMP0003_session7_Active.pptx', NULL, NULL),
(278, 13, 'Sesi 7 Reflective', 'Diktat', 'Reflective', 'COMP0003_session7_Reflective.pptx', NULL, NULL),
(279, 13, 'Sesi 7 Sensing', 'Teks', 'Sensing', 'COMP0003_session7_Sensing.pptx', NULL, NULL),
(280, 13, 'Sesi 7 Intuitive', 'Diskusi', 'Intuitive', 'COMP0003_session7_Intuitive.pptx', NULL, NULL),
(281, 13, 'Sesi 7 Visual', 'Tugas', 'Visual', 'COMP0003_session7_Visual.pptx', NULL, NULL),
(282, 13, 'Sesi 7 Verbal', 'Proyek', 'Verbal', 'COMP0003_session7_Verbal.pptx', NULL, NULL),
(283, 13, 'Sesi 7 Sequential', 'Tugas', 'Sequential', 'COMP0003_session7_Sequential.pptx', NULL, NULL),
(284, 13, 'Sesi 7 Global', 'Diktat', 'Global', 'COMP0003_session7_Global.pptx', NULL, NULL),
(285, 14, 'Sesi 8 General', 'PDF', 'General', 'COMP0003_session8_General.pptx', NULL, NULL),
(286, 14, 'Sesi 8 Active', 'Buku', 'Active', 'COMP0003_session8_Active.pptx', NULL, NULL),
(287, 14, 'Sesi 8 Reflective', 'Buku', 'Reflective', 'COMP0003_session8_Reflective.pptx', NULL, NULL),
(288, 14, 'Sesi 8 Sensing', 'Tugas', 'Sensing', 'COMP0003_session8_Sensing.pptx', NULL, NULL),
(289, 14, 'Sesi 8 Intuitive', 'Referensi', 'Intuitive', 'COMP0003_session8_Intuitive.pptx', NULL, NULL),
(290, 14, 'Sesi 8 Visual', 'Excel', 'Visual', 'COMP0003_session8_Visual.pptx', NULL, NULL),
(291, 14, 'Sesi 8 Verbal', 'Referensi', 'Verbal', 'COMP0003_session8_Verbal.pptx', NULL, NULL),
(292, 14, 'Sesi 8 Sequential', 'Tugas', 'Sequential', 'COMP0003_session8_Sequential.pptx', NULL, NULL),
(293, 14, 'Sesi 8 Global', 'PPT', 'Global', 'COMP0003_session8_Global.pptx', NULL, NULL),
(294, 15, 'Sesi 9 General', 'PDF', 'General', 'COMP0003_session9_General.pptx', NULL, NULL),
(295, 15, 'Sesi 9 Active', 'Dokumen', 'Active', 'COMP0003_session9_Active.pptx', NULL, NULL),
(296, 15, 'Sesi 9 Reflective', 'Referensi', 'Reflective', 'COMP0003_session9_Reflective.pptx', NULL, NULL),
(297, 15, 'Sesi 9 Sensing', 'Teks', 'Sensing', 'COMP0003_session9_Sensing.pptx', NULL, NULL),
(298, 15, 'Sesi 9 Intuitive', 'Diskusi', 'Intuitive', 'COMP0003_session9_Intuitive.pptx', NULL, NULL),
(299, 15, 'Sesi 9 Visual', 'Tugas', 'Visual', 'COMP0003_session9_Visual.pptx', NULL, NULL),
(300, 15, 'Sesi 9 Verbal', 'Dokumen', 'Verbal', 'COMP0003_session9_Verbal.pptx', NULL, NULL),
(301, 15, 'Sesi 9 Sequential', 'Diktat', 'Sequential', 'COMP0003_session9_Sequential.pptx', NULL, NULL),
(302, 15, 'Sesi 9 Global', 'PPT', 'Global', 'COMP0003_session9_Global.pptx', NULL, NULL),
(303, 16, 'Sesi 10 General', 'Tugas', 'General', 'COMP0003_session10_General.pptx', NULL, NULL),
(304, 16, 'Sesi 10 Active', 'Diktat', 'Active', 'COMP0003_session10_Active.pptx', NULL, NULL),
(305, 16, 'Sesi 10 Reflective', 'Diskusi', 'Reflective', 'COMP0003_session10_Reflective.pptx', NULL, NULL),
(306, 16, 'Sesi 10 Sensing', 'Referensi', 'Sensing', 'COMP0003_session10_Sensing.pptx', NULL, NULL),
(307, 16, 'Sesi 10 Intuitive', 'Referensi', 'Intuitive', 'COMP0003_session10_Intuitive.pptx', NULL, NULL),
(308, 16, 'Sesi 10 Visual', 'Excel', 'Visual', 'COMP0003_session10_Visual.pptx', NULL, NULL),
(309, 16, 'Sesi 10 Verbal', 'Referensi', 'Verbal', 'COMP0003_session10_Verbal.pptx', NULL, NULL),
(310, 16, 'Sesi 10 Sequential', 'Dokumen', 'Sequential', 'COMP0003_session10_Sequential.pptx', NULL, NULL),
(311, 16, 'Sesi 10 Global', 'Dokumen', 'Global', 'COMP0003_session10_Global.pptx', NULL, NULL),
(312, 17, 'Sesi 11 General', 'Tugas', 'General', 'COMP0003_session11_General.pptx', NULL, NULL),
(313, 17, 'Sesi 11 Active', 'Excel', 'Active', 'COMP0003_session11_Active.pptx', NULL, NULL),
(314, 17, 'Sesi 11 Reflective', 'Teks', 'Reflective', 'COMP0003_session11_Reflective.pptx', NULL, NULL),
(315, 17, 'Sesi 11 Sensing', 'Diktat', 'Sensing', 'COMP0003_session11_Sensing.pptx', NULL, NULL),
(316, 17, 'Sesi 11 Intuitive', 'Excel', 'Intuitive', 'COMP0003_session11_Intuitive.pptx', NULL, NULL),
(317, 17, 'Sesi 11 Visual', 'PDF', 'Visual', 'COMP0003_session11_Visual.pptx', NULL, NULL),
(318, 17, 'Sesi 11 Verbal', 'Tugas', 'Verbal', 'COMP0003_session11_Verbal.pptx', NULL, NULL),
(319, 17, 'Sesi 11 Sequential', 'Referensi', 'Sequential', 'COMP0003_session11_Sequential.pptx', NULL, NULL),
(320, 17, 'Sesi 11 Global', 'Buku', 'Global', 'COMP0003_session11_Global.pptx', NULL, NULL),
(321, 18, 'Sesi 12 General', 'Diskusi', 'General', 'COMP0003_session12_General.pptx', NULL, NULL),
(322, 18, 'Sesi 12 Active', 'Excel', 'Active', 'COMP0003_session12_Active.pptx', NULL, NULL),
(323, 18, 'Sesi 12 Reflective', 'Proyek', 'Reflective', 'COMP0003_session12_Reflective.pptx', NULL, NULL),
(324, 18, 'Sesi 12 Sensing', 'Diktat', 'Sensing', 'COMP0003_session12_Sensing.pptx', NULL, NULL),
(325, 18, 'Sesi 12 Intuitive', 'PPT', 'Intuitive', 'COMP0003_session12_Intuitive.pptx', NULL, NULL),
(326, 18, 'Sesi 12 Visual', 'Teks', 'Visual', 'COMP0003_session12_Visual.pptx', NULL, NULL),
(327, 18, 'Sesi 12 Verbal', 'Dokumen', 'Verbal', 'COMP0003_session12_Verbal.pptx', NULL, NULL),
(328, 18, 'Sesi 12 Sequential', 'Proyek', 'Sequential', 'COMP0003_session12_Sequential.pptx', NULL, NULL),
(329, 18, 'Sesi 12 Global', 'Multimedia', 'Global', 'COMP0003_session12_Global.pptx', NULL, NULL),
(330, 19, 'Sesi 13 General', 'Diktat', 'General', 'COMP0003_session13_General.pptx', NULL, NULL),
(331, 19, 'Sesi 13 Active', 'Teks', 'Active', 'COMP0003_session13_Active.pptx', NULL, NULL),
(332, 19, 'Sesi 13 Reflective', 'Buku', 'Reflective', 'COMP0003_session13_Reflective.pptx', NULL, NULL),
(333, 19, 'Sesi 13 Sensing', 'PDF', 'Sensing', 'COMP0003_session13_Sensing.pptx', NULL, NULL),
(334, 19, 'Sesi 13 Intuitive', 'Proyek', 'Intuitive', 'COMP0003_session13_Intuitive.pptx', NULL, NULL),
(335, 19, 'Sesi 13 Visual', 'PDF', 'Visual', 'COMP0003_session13_Visual.pptx', NULL, NULL),
(336, 19, 'Sesi 13 Verbal', 'Dokumen', 'Verbal', 'COMP0003_session13_Verbal.pptx', NULL, NULL),
(337, 19, 'Sesi 13 Sequential', 'Dokumen', 'Sequential', 'COMP0003_session13_Sequential.pptx', NULL, NULL),
(338, 19, 'Sesi 13 Global', 'Diskusi', 'Global', 'COMP0003_session13_Global.pptx', NULL, NULL),
(339, 6, 'Sesi 1 Intuitive', 'Multimedia', 'Intuitive', 'COMP0003_session1_Intuitive.pptx', '2023-03-11 08:13:19', '2023-03-11 08:13:19'),
(340, 6, 'Sesi 1 General', 'PPT', 'General', 'COMP0003_session1_General.pptx', '2023-03-11 08:16:11', '2023-03-11 08:16:11'),
(341, 6, 'Sesi 1 Active', 'Buku', 'Active', 'COMP0003_session1_Active.pptx', '2023-03-11 08:16:28', '2023-03-11 08:16:28'),
(342, 6, 'Sesi 1 Reflective', 'PPT', 'Reflective', 'COMP0003_session1_Reflective.pptx', '2023-03-11 08:16:50', '2023-03-11 08:16:50'),
(343, 6, 'Sesi 1 Sensing', 'PPT', 'Sensing', 'COMP0003_session1_Sensing.pptx', '2023-03-11 08:17:21', '2023-03-11 08:17:21'),
(344, 6, 'Sesi 1 Visual', 'PPT', 'Visual', 'COMP0003_session1_Visual.pptx', '2023-03-11 08:17:46', '2023-03-11 08:17:46'),
(345, 6, 'Sesi 1 Verbal', 'PPT', 'Verbal', 'COMP0003_session1_Verbal.pptx', '2023-03-11 08:18:07', '2023-03-11 08:18:07'),
(346, 6, 'Sesi 1 Sequential', 'PPT', 'Sequential', 'COMP0003_session1_Sequential.pptx', '2023-03-11 08:18:31', '2023-03-11 08:18:31'),
(347, 6, 'Sesi 1 Global', 'PPT', 'Global', 'COMP0003_session1_Global.pptx', '2023-03-11 08:18:58', '2023-03-11 08:18:58'),
(348, 9, 'Sesi 3 General', 'PDF', 'General', 'COMP0003_session3_General_Sesi 3 General.pdf', '2023-03-16 01:19:29', '2023-03-16 01:19:29'),
(349, 10, 'Sesi 4 Active Materi Baru', 'PPT', 'Active', 'COMP0003_session4_Active_Sesi 4 Active Materi Baru.pptx', '2023-03-16 01:36:21', '2023-03-16 01:36:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban`
--

CREATE TABLE `jawaban` (
  `id` int(11) NOT NULL,
  `nim` bigint(20) NOT NULL,
  `P01` int(11) NOT NULL,
  `C01` int(11) NOT NULL,
  `R01` int(11) NOT NULL,
  `U01` int(11) NOT NULL,
  `P02` int(11) NOT NULL,
  `C02` int(11) NOT NULL,
  `R02` int(11) NOT NULL,
  `U02` int(11) NOT NULL,
  `P03` int(11) NOT NULL,
  `C03` int(11) NOT NULL,
  `R03` int(11) NOT NULL,
  `U03` int(11) NOT NULL,
  `P04` int(11) NOT NULL,
  `C04` int(11) NOT NULL,
  `R04` int(11) NOT NULL,
  `U04` int(11) NOT NULL,
  `P05` int(11) NOT NULL,
  `C05` int(11) NOT NULL,
  `R05` int(11) NOT NULL,
  `U05` int(11) NOT NULL,
  `P06` int(11) NOT NULL,
  `C06` int(11) NOT NULL,
  `R06` int(11) NOT NULL,
  `U06` int(11) NOT NULL,
  `P07` int(11) NOT NULL,
  `C07` int(11) NOT NULL,
  `R07` int(11) NOT NULL,
  `U07` int(11) NOT NULL,
  `P08` int(11) NOT NULL,
  `C08` int(11) NOT NULL,
  `R08` int(11) NOT NULL,
  `U08` int(11) NOT NULL,
  `P09` int(11) NOT NULL,
  `C09` int(11) NOT NULL,
  `R09` int(11) NOT NULL,
  `U09` int(11) NOT NULL,
  `P10` int(11) NOT NULL,
  `C10` int(11) NOT NULL,
  `R10` int(11) NOT NULL,
  `U10` int(11) NOT NULL,
  `P11` int(11) NOT NULL,
  `C11` int(11) NOT NULL,
  `R11` int(11) NOT NULL,
  `U11` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jawaban`
--

INSERT INTO `jawaban` (`id`, `nim`, `P01`, `C01`, `R01`, `U01`, `P02`, `C02`, `R02`, `U02`, `P03`, `C03`, `R03`, `U03`, `P04`, `C04`, `R04`, `U04`, `P05`, `C05`, `R05`, `U05`, `P06`, `C06`, `R06`, `U06`, `P07`, `C07`, `R07`, `U07`, `P08`, `C08`, `R08`, `U08`, `P09`, `C09`, `R09`, `U09`, `P10`, `C10`, `R10`, `U10`, `P11`, `C11`, `R11`, `U11`, `created_at`, `updated_at`) VALUES
(1, 2440082762, 1, 1, 0, 1, 0, 0, 1, 0, 1, 0, 1, 1, 1, 1, 1, 0, 1, 0, 1, 0, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 1, 1, 1, 1, 1, 1, 0, 0, 0, 1, 1, 1, 0, 1, '2023-01-30 02:26:56', '2023-01-30 02:26:56'),
(2, 2440018822, 1, 1, 1, 0, 1, 1, 0, 1, 1, 1, 1, 0, 0, 1, 0, 1, 0, 1, 1, 1, 1, 1, 1, 0, 1, 0, 1, 0, 1, 0, 1, 1, 1, 1, 1, 1, 0, 0, 1, 0, 1, 1, 0, 0, '2023-01-30 02:37:57', '2023-01-30 02:37:57'),
(3, 2502041514, 1, 1, 0, 0, 1, 1, 1, 1, 1, 0, 1, 0, 1, 1, 1, 1, 0, 0, 1, 1, 0, 1, 1, 1, 0, 1, 1, 1, 1, 0, 1, 1, 0, 0, 0, 1, 0, 0, 0, 1, 1, 1, 1, 1, '2023-02-08 05:02:45', '2023-02-08 05:02:45'),
(4, 2502041041, 1, 1, 1, 1, 0, 1, 1, 0, 0, 1, 0, 0, 1, 1, 0, 0, 1, 1, 1, 1, 0, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 0, 0, 1, 0, 1, 1, 1, 1, '2023-02-12 01:40:34', '2023-02-12 01:40:34'),
(5, 2440067622, 1, 1, 1, 0, 1, 1, 1, 1, 0, 1, 1, 0, 1, 1, 0, 0, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 0, 1, 1, 0, 0, 1, 1, 0, 1, 1, 0, 0, '2023-02-23 08:59:02', '2023-02-23 08:59:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_jurusan` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id`, `kode_jurusan`, `jurusan`, `created_at`, `updated_at`) VALUES
(1, 'COMP', 'Teknik Informatika', NULL, NULL),
(2, 'ISYS', 'Sistem Informasi', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuesioner`
--

CREATE TABLE `kuesioner` (
  `id` int(11) NOT NULL,
  `kode_kuis` varchar(3) NOT NULL,
  `soal` text NOT NULL,
  `pil1` text NOT NULL,
  `pil2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kuesioner`
--

INSERT INTO `kuesioner` (`id`, `kode_kuis`, `soal`, `pil1`, `pil2`) VALUES
(1, 'P01', 'Saya lebih mudah memahami sesuatu dengan cara', 'Mencoba/bertindak', 'Berpikir/menganalisa'),
(2, 'P02', 'Ketika mempelajari segala sesuatu yang baru, itu dapat membantu saya untuk', 'Berbicara tentang hal itu', 'Berpikir tentang hal itu'),
(3, 'P03', 'Dalam kelompok belajar yang mengerjakan materi yang sulit, saya lebih cenderung \r\nmelakukannya', 'Langsung masuk dan menyumbangkan ide', 'Duduk dan mendengarkan'),
(4, 'P04', 'Bila bertemu dengan orang-orang di lingkungan sosial/kampus, maka saya cenderung', 'Cukup percaya diri untuk menyapa/ramah tama', 'Sedikit sungkan/gugup sebelum kenal baik'),
(5, 'P05', 'Saya cenderung menyelesaikan tugas/masalah dengan cara', 'Segera mengerjakan dan temukan solusi', 'Temukan solusi dan segera mengerjakan'),
(6, 'P06', 'Saya lebih suka', 'Belajar dalam kelompok', 'Belajar sendiri'),
(7, 'P07', 'Saya lebih mengutamakan proses', 'Mencoba berbagai hal', 'Memikirkan bagaimana cara melakukan'),
(8, 'P08', 'Dalam belajar, saya lebih mudah mengingat', 'Sesuatu yang saya lakukan', 'Sesuatu yang saya pikirkan/analisa'),
(9, 'P09', 'Ketika harus mengerjakan tugas kelompok, kesempatan pertama yang ingin saya \r\nlakukan', 'Curah pendapat kelompok dan mengumpulkan ide masing-masing\n', 'Mengumpulkan ide/gagasan individu kemudain berkumpul membandingkan ide'),
(10, 'P10', 'Saya lebih cenderung dipertimbangkan sebagai pribadi yang', 'ramah tamah', 'pendiam'),
(11, 'P11', 'Gagasan mengerjakan pekerjaan rumah dalam kelompok, dengan satu nilai untuk seluruh kelompok\r\n', 'menarik bagi saya', 'tidak menarik bagi saya'),
(12, 'C01', 'Saya merasa diri sebagai seorang yang', 'Realistis', 'Inovatif'),
(13, 'C02', 'Dalam kegiatan pendidikan, saya lebih suka mengajar atau belajar', 'yang berhubungan dengan fakta dan situasi kehidupan nyata', 'yang berhubungan dengan teori dan ide'),
(14, 'C03', 'Saya merasa lebih mudah untuk mempelajari', 'fakta/nyata', 'konsep/abstrak'),
(15, 'C04', 'Dalam membaca tulisan nonfiksi (tulisan berdasarkan fakta), saya lebih suka sesuatu yang', 'mengajari saya fakta baru atau memberi tahu saya cara melakukan sesuatu', 'memberi saya ide-ide baru untuk dipikirkan'),
(16, 'C05', 'Saya lebih suka ide yang bersifat', 'pasti', 'teori'),
(17, 'C06', 'Dalam mengerjakan tugas, saya lebih cenderung', 'memperhatikan hal-hal detail secara matang', 'menciptakan kreatifitas tentang bagaimana cara mengerjakan tugas'),
(18, 'C07', 'Ketika saya membaca artikel atau majalah hiburan, saya suka penulis menuliskan', 'dengan jelas apa yang mereka maksud', 'sesuatu dengan cara yang kreatif dan menarik'),
(19, 'C08', 'Ketika saya harus mengerjakan tugas, saya lebih suka', 'Menguasai salah satu cara untuk melakukannya', 'Mencari cara baru untuk melakukannya'),
(20, 'C09', 'Saya menganggap menyampaikan pujian atau sanjungan yang lebih tinggi kepada seseorang', 'masuk akal', 'Imajinatif'),
(21, 'C10', 'Saya lebih suka perkuliahan yang menekankan', 'bahan konkret (fakta, data)', 'materi abstrak (konsep, teori)'),
(22, 'C11', 'Ketika saya melakukan cukup banyak pekerjaan', 'Saya cenderung mengulangi semua langkah saya dan memeriksa pekerjaan saya dengan cermat', 'Saya merasa memeriksa kembali pekerjaan adalah hal yang melelahkan dan harus melakukannya dengan terpaksa'),
(23, 'R01', 'Jika saya pernah melakukan posting di media sosial pada beberapa hari yang lalu, maka hal yang paling mudah saya ingat adalah:', 'Video/gambar', 'Tulisan/teks'),
(24, 'R02', 'Saya lebih suka mengingat/mendapatkan informasi baru melalui', 'Gambar, diagram, grafik, atau peta', 'Pengarahan langsung/tertulis'),
(25, 'R03', 'Dalam sebuah buku atau artikel yang berisi banyak gambar dan grafik, saya cenderung', 'Fokus pada gambar/grafik', 'Fokus pada teks yang tertulis'),
(26, 'R04', 'Saya lebih suka cara mengajar dosen yang', 'Menempatkan banyak diagram di papan tulis', 'Menghabiskan banyak waktu untuk menjelaskan'),
(27, 'R05', 'Saya memiliki ingatan terbaik melalui', 'Apa yang saya lihat', 'Apa yang saya dengar'),
(28, 'R06', 'Ketika menuju suatu alamat yang baru, saya lebih suka memanfaatkan petunjuk', 'Peta/share location', 'Membaca arahan tertulis'),
(29, 'R07', 'Ketika saya melihat diagram atau sketsa di kelas, kemungkinan besar yang akan saya', 'Tampilan gambar/sketsa', 'Apa yang dikatakan dosen tentang itu'),
(30, 'R08', 'Ketika seseorang menunjukkan data kepada saya, saya lebih suka', 'Bagan atau grafik', 'Teks ringkasan hasil'),
(31, 'R09', 'Ketika saya bertemu dan berkenalan dengan orang baru, saya lebih cenderung untuk \r\nmengingat', 'Seperti apa penampilan orang itu', 'Apa yang diucapkan dalam perkenalan'),
(32, 'R10', 'Saya lebih suka menikmati hiburan di rumah dengan cara', 'Menonton youtube/film', 'Membaca berita'),
(33, 'R11', 'Saya cenderung membayangkan tempat-tempat yang pernah saya kunjungi', 'dengan mudah dan cukup akurat', 'cukup susah dan tanpa banyak detail'),
(34, 'U01', 'Dalam belajar, saya lebih cenderung memahami topik bahasan yang disajikan secara', 'Detail dari pada struktur keseluruhan', 'Struktur keseluruhan dari pada secara detail'),
(35, 'U02', 'Dalam belajar, setelah saya mengerti', 'semua bagian, baru saya mengerti semuanya', 'semua bagian, baru saya mencocokkan bagian-bagiannya (sub topik)'),
(36, 'U03', 'Ketika saya mengerjakan soal matematika, biasanya', 'Dikerjakan selangkah demi selangkah', 'Pahami dulu jawabannya, baru berjuang mencari tahu langkah-langkahnya'),
(37, 'U04', 'Ketika saya menganalisis sebuah cerita atau novel', 'Saya memikirkan insiden dan mencoba menyatukannya untuk mencari tahu temanya', 'Saya hanya tahu apa temanya ketika saya selesai membaca dan kemudian saya harus kembali dan menemukan insiden yang menunjukkannya'),
(38, 'U05', 'Bagi saya, hal yang paling penting untuk dosen lakukan adalah', 'Menata materi belajar dalam langkah-langkah berurutan yang jelas', 'Beri saya gambaran global/keseluruhan sekaligus hubungkan materi dengan \r\ntopik lain'),
(39, 'U06', 'Cara saya belajar adalah', 'Dengan kecepatan yang cukup teratur . Jika saya belajar dengan giat, saya akan \r\n\"mengerti.\"', 'Mencocokkan dan memulai; Walaupun pada mulanya sedikit bingung, kemudian \r\n“nyambung”'),
(40, 'U07', 'Saat berusaha mengingat bagian suatu informasi, saya lebih cenderung melakukannya', 'Fokus pada detail dan abaikan gambaran besarnya', 'Mencoba untuk memahami gambaran besarnya sebelum masuk ke detailnya'),
(41, 'U08', 'Saat menulis makalah, saya lebih cenderung mengerjakan (memikirkan atau menulis)', 'mulai dari awal makalah dan maju ke depan', 'Menulis dulu point-point utama, baru diuraikan satu per satu'),
(42, 'U09', 'Ketika saya mempelajaritopik baru sutu mata kuliah baru, saya lebih suka', 'Selalu fokus pada topik itu, kemudain berjuang semampu saya untuk memahami', 'Mencoba untuk membuat hubungan antar topik yang saling berkaitan'),
(43, 'U10', 'Ketika dosen memulai mengajar dan menyajikan lay-out atau garis besar topik \r\npembelajaran, maka gambaran tersebut', 'cukup membantu saya', 'sangat membantu saya'),
(44, 'U11', 'Saat memecahkan masalah dalam kelompok, saya akan lebih cenderung melakukannya', 'memikirkan langkah-langkah dalam proses menemukan solusi', 'Memikirkan kemungkinan konsekuensi atau penerapan solusi di berbagai bidang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuesioner_acak`
--

CREATE TABLE `kuesioner_acak` (
  `id` int(11) NOT NULL,
  `kode_kuis` varchar(3) NOT NULL,
  `soal` text NOT NULL,
  `pil1` text NOT NULL,
  `pil2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kuesioner_acak`
--

INSERT INTO `kuesioner_acak` (`id`, `kode_kuis`, `soal`, `pil1`, `pil2`) VALUES
(1, 'P01', 'Saya lebih mudah memahami sesuatu dengan cara:', 'Mencoba/bertindak', 'Berpikir/menganalisa\r\n'),
(2, 'C01', 'Saya merasa diri sebagai pribadi yang cenderung \r\n', 'Realistis - apa adanya\r\n', 'Inovatif - terobosan baru\r\n'),
(3, 'R01', 'Hal yang paling mudah saya ingat pada saat melakukan posting di media sosial pada waktu sebelumnya, adalah:\r\n', 'Video/gambar\r\n', 'Tulisan/teks\r\n'),
(4, 'U01', 'Dalam belajar, saya lebih cenderung memahami topik bahasan yang disajikan secara\r\n', 'Detail dari pada struktur keseluruhan\r\n', 'Struktur keseluruhan dari pada detail\r\n'),
(5, 'P02', 'Ketika mempelajari segala sesuatu yang baru, itu akan mempermudah bagi saya untuk \r\n', 'Berbicara tentang hal itu \r\n', 'Berpikir tentang hal itu  \r\n'),
(6, 'C02', 'Saya lebih suka mengajar atau belajar yang berhubungan dengan \r\n', 'Fakta dan situasi kehidupan nyata\r\n', 'Teori dan ide\r\n'),
(7, 'R02', 'Saya lebih suka mengingat/menyimpan informasi baru melalui:\r\n', 'Gambar, diagram, grafik, atau peta\r\n', 'Pengarahan langsung/tertulis\r\n'),
(8, 'U02', 'Dalam belajar, setelah saya memahami semua bagian atau opik, selanjutnya:\r\n', 'Baru saya mengerti semuanya \r\n', 'Baru saya menyesuaikan bagian-bagian topiknya\r\n'),
(9, 'P03', 'Dalam kelompok belajar yang mengerjakan materi yang sulit, saya lebih cenderung melakukannya \r\n', 'Langsung masuk dan menyumbangkan ide \r\n', 'Duduk dan mendengarkan\r\n'),
(10, 'C03', 'Saya merasa lebih mudah untuk mempelajari segala sesuatu yang bersifat\r\n', 'Fakta/nyata \r\n', 'Konsep/abstrak\r\n'),
(11, 'R03', 'Dalam sebuah buku atau artikel yang berisi banyak gambar dan grafik, saya cenderung:\r\n', 'Fokus pada gambar/grafik\r\n', 'Fokus pada teks yang tertulis\r\n'),
(12, 'U03', 'Ketika saya mengerjakan soal matematika, biasanya \r\n', 'Dikerjakan selangkah demi selangkah\r\n', 'Memahami dulu soalnya, baru berjuang mencari tahu langkah-langkahnya\r\n'),
(13, 'P04', 'Bila bertemu dengan orang-orang di lingkungan sosial/kampus, maka saya cenderung;\r\n', 'Cukup percaya diri untuk menyapa/ramah tama\r\n', 'Sedikit sungkan/gugup sebelum kenal baik\r\n'),
(14, 'C04', 'Ketika membaca suatu tulisan berdasarkan fakta (nonfiksi), saya lebih suka tulisan yang mengajari saya\r\n', 'Fakta baru/petunjuk cara melakukan sesuatu\r\n', 'Ide-ide baru untuk dipikirkan\r\n'),
(15, 'R04', 'Saya lebih suka cara mengajar dosen yang: \r\n', 'Menempatkan banyak diagram di papan tulis\r\n', 'Memanfaatkan banyak waktu untuk menjelaskan\r\n'),
(16, 'U04', 'Ketika saya menganalisis bacaan sebuah cerita atau novel, maka saya cenderung \r\n', 'Memikirkan kejadian dan menyimpulkan tema apa yang sedang diceritakan \r\n', 'Saya hanya tahu tema ceritanya, kemudian menyimpulkan kejadian yang sebenarnya \r\n'),
(17, 'P05', 'Saya cenderung menyelesaikan tugas/masalah dengan cara:\r\n', 'Segera mengerjakan dan temukan solusi\r\n', 'Temukan solusi dan segera mengerjakan\r\n'),
(18, 'C05', 'Saya lebih suka ide yang bersifat \r\n', 'Praktis\r\n', 'Teoritikal\r\n'),
(19, 'R05', 'Saya memiliki ingatan terbaik melalui: \r\n', 'Apa yang saya lihat\r\n', 'Apa yang saya dengar\r\n'),
(20, 'U05', 'Bagi saya, hal yang paling penting untuk dosen lakukan adalah\r\n', 'Menata materi belajar dalam langkah-langkah berurutan yang jelas\r\n', 'Beri saya gambaran global/keseluruhan sekaligus menghubungkan keterkaitan satu sama lain\r\n'),
(21, 'P06', 'Saya lebih suka:\r\n', 'Belajar dalam kelompok\r\n', 'Belajar sendiri\r\n'),
(22, 'C06', 'Dalam mengerjakan tugas, saya lebih cenderung \r\n', 'Mempelajari detail secara mendalam \r\n', 'Menciptakan kreatifitas cara mengerjakan tugas\r\n'),
(23, 'R06', 'Ketika menuju ke suatu tempat/alamat yang baru, saya lebih suka memanfaatkan petunjuk:\r\n', 'Peta/share location\r\n', 'Membaca arahan tertulis\r\n'),
(24, 'U06', 'Cara saya belajar adalah: \r\n', 'Belajar dengan kecepatan cukup teratur, jika belajar dengan giat, saya akan mengerti\r\n', 'Mencoba mencocokkan dan memulai, walaupun pada mulanya sedikit bingung, kemudian bisa dimengerti\r\n'),
(25, 'P07', 'Saya lebih mengutamakan proses\r\n', 'Mencoba berbagai hal. \r\n', 'Memikirkan bagaimana cara melakukan\r\n'),
(26, 'C07', 'Saya lebih suka penulis artikel atau penulis majalah hiburan yang menuliskan \r\n', 'Tentang apa yang mereka maksud dengan jelas \r\n', 'Tentang sesuatu yang kreatif dan menarik\r\n'),
(27, 'R07', 'Ketika saya melihat diagram atau sketsa di kelas, kemungkinan besar yang akan saya ingat adalah: \r\n', 'Tampilan diagram/sketsa  \r\n', 'Penjelasan dosen tentang diagram/sketsa\r\n'),
(28, 'U07', 'Saat berusaha mengingat bagian suatu informasi, saya lebih cenderung melakukannya\r\n', 'Fokus pada detail dan abaikan gambaran besarnya\r\n', 'Mencoba untuk memahami gambaran besarnya sebelum masuk ke detailnya\r\n'),
(29, 'P08', 'Dalam belajar, saya lebih mudah mengingat: \r\n', 'Sesuatu yang saya lakukan\r\n', 'Sesuatu yang saya pikirkan/analisa\r\n'),
(30, 'C08', 'Ketika saya harus mengerjakan tugas, saya lebih suka \r\n', 'Melakukan salah satu cara yang dikuasai \r\n', 'Mencari cara baru untuk melakukannya.\r\n'),
(31, 'R08', 'Ketika saya memperoleh data dari suatu sumber, maka saya cenderung memperhatikan: \r\n', 'Bagan atau grafik. \r\n', 'Teks ringkasan hasil \r\n'),
(32, 'U08', 'Saat menulis makalah, saya lebih cenderung mengerjakan (memikirkan atau menulis)\r\n', 'Memulai dari awal makalah dan maju ke depan\r\n', 'Menulis dulu point-point utama, baru diuraikan satu per satu\r\n'),
(33, 'P09', 'Ketika harus mengerjakan tugas kelompok, kesempatan pertama yang ingin saya lakukan \r\n', 'Curah pendapat kelompok dan mengumpulkan ide masing-masing \r\n', 'Mengumpulkan ide/gagasan individu kemudain berkumpul membandingkan ide\r\n'),
(34, 'C09', 'Memberikan pujian atau sanjungan karena kekaguman kepada seseorang adalah kehendak atau niatan yang\r\n', 'Masuk akal\r\n', 'Imajinatif\r\n'),
(35, 'R09', 'Kesan pertama ketika bertemu dan berkenalan dengan orang baru, hal utama yang paling saya ingat adalah:\r\n', 'Seperti apa penampilannya \r\n', 'Kata/ucapannya dalam perkenalan \r\n'),
(36, 'U09', 'Ketika saya mempelajari topik baru suatu mata kuliah, saya lebih suka \r\n', 'Selalu fokus pada topik itu, kemudain berjuang semampu saya untuk memahami \r\n', 'Mencoba untuk membuat hubungan antar topik yang saling berkaitan\r\n'),
(37, 'P10', 'Saya lebih cenderung dipertimbangkan sebagai pribadi yang  \r\n', 'Ramah tamah\r\n', 'Pendiam\r\n'),
(38, 'C10', 'Saya lebih suka perkuliahan yang menekankan penyajian\r\n', 'Bahan konkret (fakta, data)\r\n', 'Materi abstrak (konsep, teori).\r\n'),
(39, 'R10', 'Saya lebih suka menikmati hiburan di rumah dengan cara: \r\n', 'Menonton youtube/film\r\n', 'Membaca buku/majalah\r\n'),
(40, 'U10', 'Ketika dosen memulai mengajar dan menyajikan lay-out atau garis besar topik pembelajaran, maka gambaran tersebut \r\n', 'Cukup membantu saya\r\n', 'Sangat membantu saya\r\n'),
(41, 'P11', 'Gagasan mengerjakan pekerjaan rumah dalam kelompok, dengan satu nilai untuk seluruh kelompok,\r\n', 'Menarik bagi saya. \r\n', 'Tidak menarik bagi saya. \r\n'),
(42, 'C11', 'Ketika saya melakukan cukup banyak pekerjaan, saya cenderung merasa\r\n', 'Nyaman memeriksa ulang satu per satu dengan cermat untuk memastikan \r\n', 'Terpaksa memeriksa ulang satu per satu walaupun terasa melelahkan\r\n'),
(43, 'R11', 'Ketika Anda pernah mengunjungi suatu lokasi/objek wisata tertentu, apakah Anda:\r\n', 'Mudah mengingat tempat itu cukup akurat \r\n', 'Cenderung susah mengingat secara detail\r\n'),
(44, 'U11', 'Saat memecahkan masalah dalam kelompok, saya akan lebih cenderung\r\n', 'Memikirkan langkah-langkah dalam proses menemukan solusi\r\n', 'Memikirkan kemungkinan konsekuensi atau penerapan solusi di berbagai bidang\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nim` bigint(20) NOT NULL,
  `jurusan_id` bigint(20) UNSIGNED NOT NULL,
  `namadepan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namabelakang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempatlahirmhs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgllahirmhs` date NOT NULL,
  `gendermhs` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamatmhs` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fotomhs` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `notlpmhs` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perguruantinggi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fakultas` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `programstudi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fotoidcard` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `suratpengantar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `approve` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `user_id`, `nim`, `jurusan_id`, `namadepan`, `namabelakang`, `tempatlahirmhs`, `tgllahirmhs`, `gendermhs`, `alamatmhs`, `fotomhs`, `notlpmhs`, `perguruantinggi`, `fakultas`, `programstudi`, `fotoidcard`, `suratpengantar`, `approve`, `active`, `created_at`, `updated_at`) VALUES
(2, 23, 2440082762, 1, 'Andreas Werner', 'Sihotang', 'Jakarta', '2023-01-26', 'L', 'Jakarta', '2440082762.jpg', '124124124124', 'BINUS', 'SoCS', 'Computer Science', '2440082762.png', '2440082762.png', 'Y', 'Y', '2023-01-23 21:20:25', '2023-01-29 21:23:25'),
(3, 24, 2440018822, 1, 'JANICE VISAKHA', 'OENTORO', 'Jakarta', '2023-01-19', 'P', 'Pluit', '2440018822.jpg', '08723423442', 'BINUS', 'SoCS', 'Computer Science', '2440018822.png', '2440018822.png', 'Y', 'Y', '2023-01-26 20:28:27', '2023-02-02 04:01:54'),
(4, 25, 2440067622, 1, 'SAMSON', 'NDRURU', 'Jakarta', '2023-01-25', 'L', 'Kemanggisan', '2440067622.jpg', '081242342523', 'BINUS', 'SoCS', 'Computer Science', '2440067622.png', '2440067622.png', 'Y', 'Y', '2023-01-26 21:39:55', '2023-01-30 02:54:26'),
(5, 27, 2502041041, 1, 'MEILY', 'ZANETTA', 'Jakarta', '2023-02-07', 'P', 'Petamburan Grogol', '2502041041.jpg', '08123123124', 'BINUS', 'SoCS', 'Computer Science', '2502041041.PNG', '2502041041.pdf', 'Y', 'Y', '2023-02-08 04:51:39', '2023-02-12 01:37:17'),
(6, 28, 2502041514, 1, 'NATHALIA', 'CHANDRA', 'Jakarta', '2023-02-02', 'P', 'Sentul', '2502041514.jpg', '08742352355', 'BINUS', 'SoCS', 'Computer Science', '2502041514.png', '2502041514.pdf', 'Y', 'Y', '2023-02-08 04:54:12', '2023-02-08 05:01:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mailinbox`
--

CREATE TABLE `mailinbox` (
  `id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `to_id` bigint(20) UNSIGNED NOT NULL,
  `from_id` bigint(20) UNSIGNED NOT NULL,
  `body` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mailinbox`
--

INSERT INTO `mailinbox` (`id`, `subject`, `to_id`, `from_id`, `body`, `created_at`, `updated_at`) VALUES
(1, 'Feedback COMP0003-Komputer Grafik Sesi 5', 23, 12, '\n                                Dear Andreas Werner,</br></br>aaa</br>Reinert Y Rumagit\n                            ', '2023-03-23 12:56:04', '2023-03-23 12:56:04'),
(2, 'Feedback COMP0003-Komputer Grafik Sesi 5', 25, 12, '\n                                Dear SAMSON,</br></br>bbb</br>Reinert Y Rumagit\n                            ', '2023-03-23 12:56:04', '2023-03-23 12:56:04'),
(3, 'Feedback COMP0003-Komputer Grafik Sesi 5', 27, 12, '\n                                Dear MEILY,</br></br>ccc</br>Reinert Y Rumagit\n                            ', '2023-03-23 12:56:04', '2023-03-23 12:56:04'),
(4, 'Feedback COMP0003-Komputer Grafik Sesi 5', 28, 12, '\n                                Dear NATHALIA,</br></br>ddd</br>Reinert Y Rumagit\n                            ', '2023-03-23 12:56:04', '2023-03-23 12:56:04'),
(5, 'Feedback COMP0003-Komputer Grafik Sesi 4', 23, 12, '\n                            Dear Andreas Werner,</br></br>Sudah Bagus silahkan dipertahankan</br>Reinert Y Rumagit\n                        ', '2023-03-24 16:15:18', '2023-03-24 16:15:18'),
(6, 'Feedback COMP0003-Komputer Grafik Sesi 4', 25, 12, '\n                            Dear SAMSON,</br></br>Pelajari lebih dalam lagi materinya</br>Reinert Y Rumagit\n                        ', '2023-03-24 16:15:18', '2023-03-24 16:15:18'),
(7, 'Feedback COMP0003-Komputer Grafik Sesi 4', 27, 12, '\n                            Dear MEILY,</br></br>Kamu bisa lebih baik lagi</br>Reinert Y Rumagit\n                        ', '2023-03-24 16:15:18', '2023-03-24 16:15:18'),
(8, 'Feedback COMP0003-Komputer Grafik Sesi 4', 28, 12, '\n                            Dear NATHALIA,</br></br>Tingkatkan lagi nilainya</br>Reinert Y Rumagit\n                        ', '2023-03-24 16:15:18', '2023-03-24 16:15:18'),
(9, 'Tes', 23, 12, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '2023-03-30 06:50:58', '2023-03-30 06:50:58'),
(10, 'reply', 12, 23, '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '2023-03-30 07:23:39', '2023-03-30 07:23:39'),
(11, 'laa', 12, 23, '<p>fdf sfdafd</p>\r\n\r\n<p>sdfsfd</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>sdfsfd</p>', '2023-03-30 07:25:08', '2023-03-30 07:25:08'),
(12, 'Tes aja', 28, 12, '<p>Dear Nathalia,</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Tes aja</p>', '2023-03-31 00:21:24', '2023-03-31 00:21:24'),
(13, 'Tes kirim email', 12, 28, '<p>Dear Pak Reinert,</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n\r\n<p>Salam,</p>\r\n\r\n<p>Nathalia</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '2023-04-01 00:27:34', '2023-04-01 00:27:34'),
(14, 'Test kirim email', 12, 23, '<p>Dear Pak Reinert,</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>Terima kasih,</p>\r\n\r\n<p>Salam,</p>\r\n\r\n<p>Andreas</p>', '2023-04-05 00:20:30', '2023-04-05 00:20:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_kuis`
--

CREATE TABLE `master_kuis` (
  `id` int(11) NOT NULL,
  `kode` varchar(3) NOT NULL,
  `gaya_belajar` varchar(50) NOT NULL,
  `kode_1` varchar(30) NOT NULL,
  `kode_0` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `master_kuis`
--

INSERT INTO `master_kuis` (`id`, `kode`, `gaya_belajar`, `kode_1`, `kode_0`) VALUES
(1, 'P', 'Processing', 'Active', 'Reflective'),
(2, 'C', 'Perception', 'Sensing', 'Intuitive'),
(3, 'R', 'Reception', 'Visual', 'Verbal'),
(4, 'U', 'Understanding', 'Sequential', 'Global');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id` bigint(20) NOT NULL,
  `id_dosen` bigint(20) UNSIGNED NOT NULL,
  `id_jurusan` bigint(20) UNSIGNED NOT NULL,
  `kode_matakuliah` varchar(30) NOT NULL,
  `nama_matakuliah` varchar(100) NOT NULL,
  `sks` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `active` enum('Y','N') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `matakuliah`
--

INSERT INTO `matakuliah` (`id`, `id_dosen`, `id_jurusan`, `kode_matakuliah`, `nama_matakuliah`, `sks`, `deskripsi`, `active`, `created_at`, `updated_at`) VALUES
(14, 3, 1, 'COMP0001', 'Web Programming Laravel', 4, 'Laravel Framework', 'Y', '2023-02-02 20:30:00', '2023-02-12 11:14:37'),
(18, 3, 1, 'COMP0003', 'Komputer Grafik', 2, 'Matlab', 'Y', '2023-02-02 20:37:00', '2023-02-02 20:37:00'),
(19, 3, 1, 'COMP0004', 'Data Structure', 4, 'Belajar dasar-dasar mengenai Data Structure', 'Y', '2023-02-02 20:38:19', '2023-02-02 20:38:19'),
(20, 3, 1, 'COMP0005', 'Human Computer Interaction', 2, 'Web HCI', 'Y', '2023-02-02 20:39:00', '2023-02-02 20:39:00'),
(23, 3, 1, 'COMP0008', 'Software Engineering', 4, 'Software Engineering dalam pembuatan aplikasi', 'Y', '2023-02-02 20:41:23', '2023-02-02 20:41:23'),
(24, 3, 1, 'COMP0009', 'Object Oriented Analysis Desain', 2, 'OOAD', 'Y', '2023-02-02 20:42:14', '2023-02-02 20:42:14'),
(27, 3, 1, 'COMP0036', 'Multimedia Programming Foundation', 4, 'Matakuliah mengenai multimedia', 'N', '2023-02-03 03:23:25', '2023-02-08 20:51:53'),
(28, 3, 2, 'ISYS0031', 'Manajemen Sistem Informasi', 4, 'Tentang manajemen aplikasi sistem informasi', 'Y', '2023-02-03 03:24:17', '2023-02-03 03:24:17'),
(29, 3, 1, 'COMP0038', 'Website Design', 2, 'Belajar HTML dan CSS', 'Y', '2023-02-03 20:43:57', '2023-02-03 20:43:57'),
(30, 3, 1, 'COMP0040', 'Algorithm Programming', 4, 'Belajar basic algoritma pemrograman', 'Y', '2023-02-03 20:44:51', '2023-02-03 20:44:51'),
(31, 3, 1, 'COMP0042', 'Kalkulus 1', 4, 'Belajar Kalkulus 1', 'Y', '2023-02-03 20:45:25', '2023-02-03 20:45:25'),
(32, 3, 1, 'COMP0044', 'Kalkulus 2', 2, 'Belajar Kalkulus 2', 'Y', '2023-02-03 20:45:53', '2023-02-03 20:45:53'),
(33, 3, 1, 'COMP0045', 'Artificial Inteligence', 2, 'AI dengan Python', 'Y', '2023-02-08 20:50:14', '2023-02-08 20:50:14'),
(34, 8, 2, 'ISYS0036', 'Data Mining Visualization', 2, 'Pembelajaran Data Mining dengan Visualization', 'Y', '2023-02-15 05:04:56', '2023-02-15 05:04:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi_matakuliah`
--

CREATE TABLE `materi_matakuliah` (
  `id` bigint(20) NOT NULL,
  `id_matakuliah` bigint(20) NOT NULL,
  `session` int(11) NOT NULL,
  `materi` text NOT NULL,
  `deskripsi` text NOT NULL,
  `referensi` text NOT NULL,
  `tingkat_kesulitan` enum('high','medium','low','') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `materi_matakuliah`
--

INSERT INTO `materi_matakuliah` (`id`, `id_matakuliah`, `session`, `materi`, `deskripsi`, `referensi`, `tingkat_kesulitan`, `created_at`, `updated_at`) VALUES
(6, 18, 1, 'Introduction to Computer Graphics', '• What is Computer Graphics (CG)\r\n • Conceptual model for Interactive CG\r\n • Geometric modeling\r\n • Application models\r\n • Graphic system and graphic library\r\n • Sample-based vs Geometric-based graphics\r\n • Use of Graphics system\r\n • What is Computer Graphics (CG)\r\n • Conceptual model for Interactive CG\r\n • Application models\r\n • Graphic system and graphic library\r\n • Geometric modeling\r\n • Sample-based vs Geometric-based graphics\r\n • Use of Graphics system', 'Edward Angel, David Shreiner. (2014). Interactive computer graphics : a top-down approach with WebGL. 7.\r\nPearson, Addison Wesley. Boston. ISBN: 978-0133574845 .', 'low', '2023-02-08 03:19:05', '2023-02-13 04:17:17'),
(8, 18, 2, 'Your First Step with WebGL', '• WHAT IS WebGL ?\r\n • Clear Drawing Area and Draw a point\r\n • What is Canvas? And Context in WebGL\r\n • What is a Shader and WebGL Structure\r\n • Initialize Shaders\r\n • Flow WebGL Program\r\n • Vertex Shader and Fragment Shader\r\n • Draw Operations\r\n • WebGL Coordinate System\r\n • Change the Point Color\r\n • Event Handling\r\n • Retrieving the Storage Location, and assigning of a\r\nUniform Variable', 'Edward Angel, David Shreiner. (2014). Interactive computer graphics : a top-down approach with WebGL. 7.\r\nPearson, Addison Wesley. Boston. ISBN: 978-0133574845 .', 'low', '2023-02-12 04:46:55', '2023-02-13 04:19:56'),
(9, 18, 3, '2D and 3D Geometry Transformation', '• Transformation into Homogeneous coordinate\r\nsystem\r\n • What is Geometric Transformation\r\n • Composition transformations\r\n • Scaling and Rotation in 2D\r\n • 3D geometric transformations', 'Edward Angel, David Shreiner. (2014). Interactive computer graphics : a top-down approach with WebGL. 7.\r\nPearson, Addison Wesley. Boston. ISBN: 978-0133574845 .', 'high', '2023-02-12 04:48:08', '2023-02-13 04:21:23'),
(10, 18, 4, '3D Viewing I', '• Camera in rendering process\r\n • Constructing view volume\r\n • Viewing volume\r\n • Orientation : Look and Up vectors\r\n • Aspect ratio and viewing angles\r\n • Near and Far clipping plane', 'Edward Angel, David Shreiner. (2014). Interactive computer graphics : a top-down approach with WebGL. 7.\r\nPearson, Addison Wesley. Boston. ISBN: 978-0133574845 .', 'high', '2023-02-12 04:49:51', '2023-02-13 04:23:24'),
(11, 18, 5, '3D Viewing II', '• Finding u, v, and w\r\n • Normalization transformation (paralel)\r\n • Windowing transformation\r\n • Normalization transformation (perspective)\r\n • Final words', 'Edward Angel, David Shreiner. (2014). Interactive computer graphics : a top-down approach with WebGL. 7.\r\nPearson, Addison Wesley. Boston. ISBN: 978-0133574845 .', 'high', '2023-02-12 04:51:04', '2023-02-13 04:24:41'),
(12, 18, 6, 'Color Models', '• Color and Colorimetry terms\r\n • Tristimulus theory\r\n • CIE Chromacity diagram\r\n • Color space\r\n • Color models fro Raster Graphic', 'Edward Angel, David Shreiner. (2014). Interactive computer graphics : a top-down approach with WebGL. 7.\r\nPearson, Addison Wesley. Boston. ISBN: 978-0133574845 .', 'high', '2023-02-12 04:52:51', '2023-02-13 04:27:24'),
(13, 18, 7, 'Topics for Final Project: Overview', '• Normal mapping\r\n • Deferred lighting/Shading\r\n • Shadow mapping\r\n • Tenselation shaders\r\n • UI for Graphic Application\r\n • High Dynamic Range (HDR)', 'Edward Angel, David Shreiner. (2014). Interactive computer graphics : a top-down approach with WebGL. 7.\r\nPearson, Addison Wesley. Boston. ISBN: 978-0133574845 .', 'high', '2023-02-12 04:54:50', '2023-02-13 04:28:20'),
(14, 18, 8, 'Image Processing and ANTIALIASING', '• Discrete and continuous images\r\n • Pixels\r\n • Modeling an image\r\n • Image processing pipeline\r\n • Some examples of Image Processing', 'Edward Angel, David Shreiner. (2014). Interactive computer graphics : a top-down approach with WebGL. 7.\r\nPearson, Addison Wesley. Boston. ISBN: 978-0133574845 .', 'high', '2023-02-12 04:56:12', '2023-02-13 04:29:11'),
(15, 18, 9, 'Rasterization (Scan Conversion', '• Rasterization process\r\n • DDA Line Rasterization\r\n • Mid-Point Algorithm for Circles\r\n • Mid-Point Algorithm for Lines\r\n • Mid-Point Algorithm for Ellipse', 'Edward Angel, David Shreiner. (2014). Interactive computer graphics : a top-down approach with WebGL. 7.\r\nPearson, Addison Wesley. Boston. ISBN: 978-0133574845 .', 'high', '2023-02-12 04:58:36', '2023-02-13 04:30:04'),
(16, 18, 10, 'Line and POLYGON Clipping', '• Cyrus-Beck line clipping\r\n • Concept of Line and Polygon clipping\r\n • Cohen-Sutherland line clipping\r\n • Sutherland-Hodgeman polygon clipping\r\n • Weiler-Atherton polygon clipping', 'Edward Angel, David Shreiner. (2014). Interactive computer graphics : a top-down approach with WebGL. 7.\r\nPearson, Addison Wesley. Boston. ISBN: 978-0133574845 .', 'high', '2023-02-12 05:00:24', '2023-02-13 04:31:01'),
(17, 18, 11, 'Lighting and Illumination Models', '• What is Light\r\n • Illumination and Shading\r\n • Illumination Model: Non-Global vs Global\r\n • Reflectance Models', 'Edward Angel, David Shreiner. (2014). Interactive computer graphics : a top-down approach with WebGL. 7.\r\nPearson, Addison Wesley. Boston. ISBN: 978-0133574845 .', 'high', '2023-02-12 05:02:05', '2023-02-13 04:31:58'),
(18, 18, 12, 'Texture Mapping', '• Texture mapping overview\r\n • Texture mapping style\r\n • Mapping techniques\r\n • Complex geometry\r\n • Complex geometry in real application\r\n • Computation of barycentric coordinates\r\n • Type texture mapping techniques', 'Edward Angel, David Shreiner. (2014). Interactive computer graphics : a top-down approach with WebGL. 7.\r\nPearson, Addison Wesley. Boston. ISBN: 978-0133574845 .', 'high', '2023-02-12 05:05:50', '2023-02-13 04:33:03'),
(19, 18, 13, 'Final Project: Group Presentation', 'Student’s Presentation on Final Project', 'Edward Angel, David Shreiner. (2014). Interactive computer graphics : a top-down approach with WebGL. 7.\r\nPearson, Addison Wesley. Boston. ISBN: 978-0133574845 .', 'high', '2023-02-12 05:06:56', '2023-02-13 04:34:10'),
(22, 14, 1, 'An Introduction to PHP', '• Introduction PHP\r\n • Installation PHP\r\n • Operator\r\n • Date\r\n • Writing Script PHP\r\n • Variable & Data type\r\n • Session, Cookies\r\n • Processing File\r\n • Processing Data from Form', 'Steve Prettyman. (2020). Learn PHP 8 Using MySQL, Javascript, CSS3, and HTML5 Edition. 2. Apress. Key\r\nWest, FL, USA. ISBN: 9781484262399 .', 'low', '2023-02-12 23:08:13', '2023-02-16 05:53:22'),
(23, 14, 2, 'PHP for MySQL', '• Introduction to MySQL\r\n • Table Creation\r\n • Using MySQL in PHP\r\n • Database Creation', 'Steve Prettyman. (2020). Learn PHP 8 Using MySQL, Javascript, CSS3, and HTML5 Edition. 2. Apress. Key\r\nWest, FL, USA. ISBN: 9781484262399', 'medium', '2023-02-16 05:56:23', '2023-02-16 05:56:23'),
(24, 14, 3, 'An Introduction to PHP Framework', '• Understanding Framework\r\n • Framework Vs PHP Native\r\n • Introduction to Laravel\r\n • MVC architecture\r\n • Installing Laravel\r\n • Accessing Laravel', '1.	Andy Turner. (2022). Laravel 9.x | PHP Learning Laravel with Easiest Way: The book will teach you Laravel 9.x step by step. 1. Taylor Hicks. -. ISBN: 9798839740273', 'low', '2023-03-08 00:59:24', '2023-03-08 01:03:31');

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
(15, '2014_10_12_000000_create_users_table', 1),
(16, '2014_10_12_100000_create_password_resets_table', 1),
(17, '2019_08_19_000000_create_failed_jobs_table', 1),
(18, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(19, '2023_01_19_065119_create_dosen_table', 1),
(20, '2023_01_19_065248_create_jurusan_table', 1),
(21, '2023_01_19_065309_create_mahasiswa_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `periode`
--

CREATE TABLE `periode` (
  `id` int(11) NOT NULL,
  `tanggal_awal` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `tahun` int(11) NOT NULL,
  `kode_periode` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `periode`
--

INSERT INTO `periode` (`id`, `tanggal_awal`, `tanggal_akhir`, `tahun`, `kode_periode`, `created_at`, `updated_at`) VALUES
(1, '2023-02-01', '2023-06-19', 2023, 'GENAP2022', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `score_jawaban`
--

CREATE TABLE `score_jawaban` (
  `id` int(11) NOT NULL,
  `nim` bigint(20) NOT NULL,
  `score_active` int(11) NOT NULL,
  `score_reflective` int(11) NOT NULL,
  `score_sensing` int(11) NOT NULL,
  `score_intuitive` int(11) NOT NULL,
  `score_visual` int(11) NOT NULL,
  `score_verbal` int(11) NOT NULL,
  `score_sequential` int(11) NOT NULL,
  `score_global` int(11) NOT NULL,
  `v_active` int(11) NOT NULL,
  `v_reflective` int(11) NOT NULL,
  `v_sensing` int(11) NOT NULL,
  `v_intuitive` int(11) NOT NULL,
  `v_visual` int(11) NOT NULL,
  `v_verbal` int(11) NOT NULL,
  `v_sequential` int(11) NOT NULL,
  `v_global` int(11) NOT NULL,
  `dominan` varchar(50) NOT NULL,
  `level` enum('balance','moderate','strong','') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `score_jawaban`
--

INSERT INTO `score_jawaban` (`id`, `nim`, `score_active`, `score_reflective`, `score_sensing`, `score_intuitive`, `score_visual`, `score_verbal`, `score_sequential`, `score_global`, `v_active`, `v_reflective`, `v_sensing`, `v_intuitive`, `v_visual`, `v_verbal`, `v_sequential`, `v_global`, `dominan`, `level`, `created_at`, `updated_at`) VALUES
(1, 2440082762, 8, 3, 6, 5, 8, 3, 7, 4, 5, 0, 1, 0, 5, 0, 3, 0, 'Active', 'moderate', '2023-01-30 02:26:57', '2023-01-30 02:26:57'),
(2, 2440018822, 8, 3, 8, 3, 8, 3, 5, 6, 5, 0, 5, 0, 5, 0, 0, 1, 'Active', 'moderate', '2023-01-30 02:37:57', '2023-01-30 02:37:57'),
(3, 2502041514, 6, 5, 6, 5, 8, 3, 9, 2, 1, 0, 1, 0, 5, 0, 7, 0, 'Sequential', 'moderate', '2023-02-08 05:02:45', '2023-02-08 05:02:45'),
(4, 2502041041, 5, 6, 10, 1, 9, 2, 6, 5, 0, 1, 9, 0, 7, 0, 1, 0, 'Sensing', 'strong', '2023-02-12 01:40:34', '2023-02-12 01:40:34'),
(5, 2440067622, 6, 5, 10, 1, 9, 2, 4, 7, 1, 0, 9, 0, 7, 0, 0, 3, 'Sensing', 'strong', '2023-02-23 08:59:02', '2023-02-23 08:59:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `scoring`
--

CREATE TABLE `scoring` (
  `id` bigint(20) NOT NULL,
  `periode` varchar(30) NOT NULL,
  `nim` bigint(20) NOT NULL,
  `kode_matakuliah` varchar(30) NOT NULL,
  `kategori_ujian` varchar(10) NOT NULL,
  `final_score` bigint(20) NOT NULL,
  `topic_mastery` enum('high','medium','low') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `scoring`
--

INSERT INTO `scoring` (`id`, `periode`, `nim`, `kode_matakuliah`, `kategori_ujian`, `final_score`, `topic_mastery`, `created_at`, `updated_at`) VALUES
(1, 'GENAP2022', 2440082762, 'COMP0003', '1', 65, 'medium', '2023-02-17 03:11:12', '2023-02-17 03:12:25'),
(2, 'GENAP2022', 2502041041, 'COMP0003', '1', 85, 'high', '2023-02-17 03:11:12', '2023-02-17 03:13:32'),
(3, 'GENAP2022', 2502041514, 'COMP0003', '1', 45, 'low', '2023-02-17 03:11:12', '2023-02-17 03:15:14'),
(4, 'GENAP2022', 2502041514, 'COMP0001', '2', 30, 'low', '2023-02-17 20:13:16', '2023-02-17 20:13:16'),
(5, 'GENAP2022', 2440082762, 'COMP0001', '2', 40, 'low', '2023-02-17 20:13:16', '2023-02-17 20:13:16'),
(6, 'GENAP2022', 2502041041, 'COMP0001', '2', 80, 'high', '2023-02-17 20:13:16', '2023-02-17 20:13:16'),
(7, 'GENAP2022', 2440082762, 'COMP0003', 'UTS', 80, 'high', '2023-02-18 08:41:07', '2023-02-24 03:03:45'),
(8, 'GENAP2022', 2502041041, 'COMP0003', 'UTS', 90, 'high', '2023-02-18 08:41:08', '2023-02-24 03:03:45'),
(9, 'GENAP2022', 2502041514, 'COMP0003', 'UTS', 91, 'high', '2023-02-18 08:41:08', '2023-02-24 03:03:45'),
(10, 'GENAP2022', 2440082762, 'COMP0003', 'UAS', 95, 'high', '2023-02-18 08:43:37', '2023-02-18 08:43:37'),
(11, 'GENAP2022', 2502041041, 'COMP0003', 'UAS', 60, 'medium', '2023-02-18 08:43:37', '2023-02-18 08:43:37'),
(12, 'GENAP2022', 2502041514, 'COMP0003', 'UAS', 85, 'high', '2023-02-18 08:43:37', '2023-02-18 08:43:37'),
(13, 'GENAP2022', 2440082762, 'COMP0003', '2', 90, 'high', '2023-02-19 05:25:09', '2023-02-19 05:25:09'),
(14, 'GENAP2022', 2502041041, 'COMP0003', '2', 45, 'low', '2023-02-19 05:25:09', '2023-02-19 05:25:09'),
(15, 'GENAP2022', 2502041514, 'COMP0003', '2', 87, 'high', '2023-02-19 05:25:09', '2023-02-19 05:25:09'),
(16, 'GENAP2022', 2440082762, 'COMP0003', '3', 40, 'low', '2023-02-20 03:51:01', '2023-02-23 23:00:57'),
(17, 'GENAP2022', 2502041041, 'COMP0003', '3', 60, 'medium', '2023-02-20 03:51:01', '2023-02-20 03:51:01'),
(18, 'GENAP2022', 2502041514, 'COMP0003', '3', 78, 'high', '2023-02-20 03:51:01', '2023-02-20 03:51:01'),
(19, 'GENAP2022', 2502041514, 'COMP0001', '1', 56, 'low', '2023-02-24 01:47:15', '2023-02-24 01:47:15'),
(20, 'GENAP2022', 2440082762, 'COMP0001', '1', 67, 'medium', '2023-02-24 01:47:15', '2023-02-24 01:47:15'),
(21, 'GENAP2022', 2502041041, 'COMP0001', '1', 78, 'high', '2023-02-24 01:47:15', '2023-02-24 01:47:15'),
(22, 'GENAP2022', 2440067622, 'COMP0001', '1', 87, 'high', '2023-02-24 01:47:15', '2023-02-24 01:47:15'),
(23, 'GENAP2022', 2440067622, 'COMP0003', 'UTS', 92, 'high', '2023-02-24 03:03:45', '2023-02-24 03:03:45'),
(24, 'GENAP2022', 2440067622, 'COMP0003', 'UAS', 70, 'high', '2023-02-24 03:04:21', '2023-02-24 03:04:21'),
(25, 'GENAP2022', 2440067622, 'COMP0003', '1', 30, 'low', '2023-02-24 21:19:57', '2023-02-24 21:19:57'),
(26, 'GENAP2022', 2440067622, 'COMP0003', '2', 70, 'high', '2023-02-24 21:20:45', '2023-02-24 21:20:45'),
(27, 'GENAP2022', 2440067622, 'COMP0003', '3', 93, 'high', '2023-02-24 21:21:28', '2023-02-24 21:21:28'),
(28, 'GENAP2022', 2440082762, 'COMP0003', '4', 90, 'high', '2023-02-24 21:22:13', '2023-02-24 21:22:13'),
(29, 'GENAP2022', 2502041041, 'COMP0003', '4', 67, 'medium', '2023-02-24 21:22:13', '2023-02-24 21:22:13'),
(30, 'GENAP2022', 2502041514, 'COMP0003', '4', 79, 'high', '2023-02-24 21:22:13', '2023-02-24 21:22:13'),
(31, 'GENAP2022', 2440067622, 'COMP0003', '4', 45, 'low', '2023-02-24 21:22:13', '2023-02-24 21:22:13'),
(32, 'GENAP2022', 2440082762, 'COMP0003', '5', 35, 'low', '2023-03-16 01:38:14', '2023-03-16 01:38:14'),
(33, 'GENAP2022', 2502041041, 'COMP0003', '5', 89, 'high', '2023-03-16 01:38:14', '2023-03-16 01:38:14'),
(34, 'GENAP2022', 2502041514, 'COMP0003', '5', 67, 'medium', '2023-03-16 01:38:14', '2023-03-16 01:38:14'),
(35, 'GENAP2022', 2440067622, 'COMP0003', '5', 45, 'low', '2023-03-16 01:38:14', '2023-03-16 01:38:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksimatakuliah`
--

CREATE TABLE `transaksimatakuliah` (
  `id` int(11) NOT NULL,
  `periode` varchar(30) NOT NULL,
  `nim` bigint(20) NOT NULL,
  `kode_matakuliah` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksimatakuliah`
--

INSERT INTO `transaksimatakuliah` (`id`, `periode`, `nim`, `kode_matakuliah`, `created_at`, `updated_at`) VALUES
(1, 'GENAP2022', 2502041514, 'COMP0001', NULL, '2023-02-16 05:10:54'),
(4, 'GANJIL2023', 2440082762, 'COMP0004', NULL, NULL),
(6, 'GENAP2022', 2440082762, 'COMP0003', '2023-02-09 02:47:58', '2023-02-16 05:09:59'),
(7, 'GENAP2022', 2440082762, 'COMP0004', '2023-02-09 02:48:20', '2023-02-09 02:48:20'),
(10, 'GENAP2022', 2440082762, 'COMP0008', '2023-02-11 07:55:26', '2023-02-11 07:55:26'),
(13, 'GENAP2022', 2440082762, 'COMP0009', '2023-02-11 08:17:07', '2023-02-11 08:17:07'),
(19, 'GENAP2022', 2440082762, 'COMP0042', '2023-02-11 08:39:04', '2023-02-11 08:39:04'),
(20, 'GENAP2022', 2440082762, 'COMP0001', '2023-02-12 11:15:49', '2023-02-16 05:10:54'),
(21, 'GENAP2022', 2502041041, 'COMP0003', '2023-02-13 04:35:52', '2023-02-16 05:09:59'),
(22, 'GENAP2022', 2502041041, 'COMP0001', '2023-02-13 04:35:57', '2023-02-16 05:10:54'),
(23, 'GENAP2022', 2502041514, 'COMP0003', '2023-02-13 04:36:59', '2023-02-16 05:09:59'),
(24, 'GENAP2022', 2502041514, 'COMP0038', '2023-02-15 05:55:40', '2023-02-15 05:55:40'),
(25, 'GENAP2022', 2440067622, 'COMP0003', '2023-02-23 08:59:26', '2023-02-23 08:59:26'),
(26, 'GENAP2022', 2440067622, 'COMP0001', '2023-02-23 08:59:36', '2023-02-23 08:59:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `usertype`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@lms.com', '1', NULL, '$2a$12$G8q.5xnMyUb/nj65mMbj2uE7a0QtM.2JvC8s4mKd3cs3A214ZCdmi', NULL, '2023-01-19 00:02:56', '2023-01-19 00:02:56'),
(3, 'Agung Sucipto Wiranata', 'awiranata@lms.com', '3', NULL, '$2a$12$H5mn5tUoF.hCqsvjOrO2/ep/3TlXbZ.Xt32KVRB9XIJ23okF7g6O6', NULL, '2023-01-19 00:02:56', '2023-01-19 00:02:56'),
(12, 'Reinert Y Rumagit', 'reinert.rumagit@binus.edu', '2', NULL, '$2y$10$v9SWZ4vsv/j2galxslVtm.Dej3c/z4rqRTTB2rRLu/E00oOM9sZey', NULL, '2023-01-23 10:24:18', '2023-03-23 10:45:52'),
(13, 'galih', 'galih@binusl.edu', '2', NULL, '$2y$10$VWCngSLpS/8f9xjX7pBNi.aUb7O3e1/PrwUy9ngztYFl3EPEeBhe.', NULL, '2023-01-23 11:35:04', '2023-01-23 11:35:04'),
(14, 'Ester Yakun', 'ester@gmail.com', '2', NULL, '$2y$10$LZQmtn7GDi6sbmEho4iV4eK4533kNL/PGoFxjqD6kL8KA1Jk67mwa', NULL, '2023-01-23 11:39:00', '2023-01-23 11:39:00'),
(15, '3123', 'reinertyosua24@gmail.com', '2', NULL, '$2y$10$e7t.Ug0BK1yS/9SHTiMn2.OhZ3JXE6J5pqkQUQMisyuJDryAx/zli', NULL, '2023-01-23 20:45:50', '2023-01-23 20:45:50'),
(16, 'Rain Josh', 'rainjosh@gmail.com', '2', NULL, '$2y$10$vqyGpqH9TEvW8juxZMzBdOouPR4kc1LVDTxEqre2X9i28io5USxbe', NULL, '2023-01-23 20:54:42', '2023-01-23 20:54:42'),
(23, 'Andreas Werner Sihotang', 'asihotang@binus.ac.id', '3', NULL, '$2y$10$vKTRa4cTZJ9oNzBvAK0s..REJWggR3oXv8FfsLfSBt7B404DgSigq', NULL, '2023-01-23 21:20:25', '2023-01-23 21:20:25'),
(24, 'JANICE VISAKHA OENTORO', 'joentoro@binus.ac.id', '3', NULL, '$2y$10$b0TsveT9G9SG/AMQL13JJeKNR74vf6OVs/mqHA5ZAwq9q.1wxz2Ue', NULL, '2023-01-26 20:28:27', '2023-01-26 20:28:27'),
(25, 'SAMSON NDRURU', 'sndruru@binus.ac.id', '3', NULL, '$2y$10$78lDRPIa0ztlvgauO3OVN.DsY5Gc4lKv6K6eYwz5Ovefp/Yic24cq', NULL, '2023-01-26 21:39:55', '2023-01-26 21:39:55'),
(26, 'Agung Prasetyo', 'aprasetyo@binus.edu', '2', NULL, '$2y$10$eVscyKYEuZMmv59jTEqxJOWrnjk0eU2YZx4XiVW5e6hi.515Ky0Im', NULL, '2023-02-06 21:10:05', '2023-02-06 21:10:05'),
(27, 'MEILY ZANETTA', 'mzanetta@binus.ac.id', '3', NULL, '$2y$10$pwSWkwOsm94u1hCJk9gFtuIZl3d2H4LjZL.CvHTJbEQcrb58qxAq6', NULL, '2023-02-08 04:51:39', '2023-02-08 04:51:39'),
(28, 'NATHALIA CHANDRA', 'nchandra@binus.ac.id', '3', NULL, '$2y$10$Jf6CE2ZKii8DAyWzd/hxROfrZGrIRgGLwTnhMOClp1gfCzX8IGrdq', NULL, '2023-02-08 04:54:12', '2023-02-08 04:54:12'),
(30, 'Budi Kusuma', 'bkusuma@binus.edu', '2', NULL, '$2y$10$ufcXo0R4Q/wnHY9kYdNCD.BEBU4VBgGA9kUck3BDatAn33KbZo4ly', NULL, '2023-02-08 05:01:12', '2023-02-08 05:01:12');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nidn` (`nidn`),
  ADD KEY `dosen_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_scoring_feedback` (`id_scoring`),
  ADD KEY `fk_feedback_dosen` (`id_dosen`);

--
-- Indeks untuk tabel `file_materi`
--
ALTER TABLE `file_materi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_file_detailmateri` (`id_materi_mtk`);

--
-- Indeks untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jawaban_mahasiswa` (`nim`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kuesioner`
--
ALTER TABLE `kuesioner`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kuesioner_acak`
--
ALTER TABLE `kuesioner_acak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`),
  ADD KEY `mahasiswa_jurusan_id_foreign` (`jurusan_id`),
  ADD KEY `mahasiswa_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `mailinbox`
--
ALTER TABLE `mailinbox`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id_to` (`to_id`),
  ADD KEY `fk_user_id_from` (`from_id`);

--
-- Indeks untuk tabel `master_kuis`
--
ALTER TABLE `master_kuis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_matakuliah` (`kode_matakuliah`),
  ADD KEY `fk_jurusan_matakuliah` (`id_jurusan`),
  ADD KEY `fk_dosen_matakuliah` (`id_dosen`);

--
-- Indeks untuk tabel `materi_matakuliah`
--
ALTER TABLE `materi_matakuliah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_materikul_mtk` (`id_matakuliah`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_periode` (`kode_periode`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `score_jawaban`
--
ALTER TABLE `score_jawaban`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_score_mahasiswa` (`nim`);

--
-- Indeks untuk tabel `scoring`
--
ALTER TABLE `scoring`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_scoring_periode` (`periode`),
  ADD KEY `fk_scoring_nim` (`nim`),
  ADD KEY `fk_scoring_kodemk` (`kode_matakuliah`);

--
-- Indeks untuk tabel `transaksimatakuliah`
--
ALTER TABLE `transaksimatakuliah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_mhs_transaksi` (`nim`),
  ADD KEY `fk_mk_transaksi` (`kode_matakuliah`);

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
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `file_materi`
--
ALTER TABLE `file_materi`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=350;

--
-- AUTO_INCREMENT untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kuesioner`
--
ALTER TABLE `kuesioner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `kuesioner_acak`
--
ALTER TABLE `kuesioner_acak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `mailinbox`
--
ALTER TABLE `mailinbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `master_kuis`
--
ALTER TABLE `master_kuis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `materi_matakuliah`
--
ALTER TABLE `materi_matakuliah`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `periode`
--
ALTER TABLE `periode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `score_jawaban`
--
ALTER TABLE `score_jawaban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `scoring`
--
ALTER TABLE `scoring`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `transaksimatakuliah`
--
ALTER TABLE `transaksimatakuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `fk_feedback_dosen` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_scoring_feedback` FOREIGN KEY (`id_scoring`) REFERENCES `scoring` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `file_materi`
--
ALTER TABLE `file_materi`
  ADD CONSTRAINT `fk_file_detailmateri` FOREIGN KEY (`id_materi_mtk`) REFERENCES `materi_matakuliah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  ADD CONSTRAINT `fk_jawaban_mahasiswa` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_jurusan_id_foreign` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`id`),
  ADD CONSTRAINT `mahasiswa_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `mailinbox`
--
ALTER TABLE `mailinbox`
  ADD CONSTRAINT `fk_user_id_from` FOREIGN KEY (`from_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_id_to` FOREIGN KEY (`to_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD CONSTRAINT `fk_dosen_matakuliah` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_jurusan_matakuliah` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `materi_matakuliah`
--
ALTER TABLE `materi_matakuliah`
  ADD CONSTRAINT `fk_materi_matakuliah` FOREIGN KEY (`id_matakuliah`) REFERENCES `matakuliah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_materikul_mtk` FOREIGN KEY (`id_matakuliah`) REFERENCES `matakuliah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `score_jawaban`
--
ALTER TABLE `score_jawaban`
  ADD CONSTRAINT `fk_score_mahasiswa` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `scoring`
--
ALTER TABLE `scoring`
  ADD CONSTRAINT `fk_scoring_kodemk` FOREIGN KEY (`kode_matakuliah`) REFERENCES `matakuliah` (`kode_matakuliah`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_scoring_nim` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_scoring_periode` FOREIGN KEY (`periode`) REFERENCES `periode` (`kode_periode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksimatakuliah`
--
ALTER TABLE `transaksimatakuliah`
  ADD CONSTRAINT `fk_mhs_transaksi` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_mk_transaksi` FOREIGN KEY (`kode_matakuliah`) REFERENCES `matakuliah` (`kode_matakuliah`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
