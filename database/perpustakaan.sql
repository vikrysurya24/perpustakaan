-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jul 2021 pada 04.36
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggotas`
--

CREATE TABLE `anggotas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `anggotas`
--

INSERT INTO `anggotas` (`id`, `name`, `sex`, `telp`, `alamat`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'P', '0891281111', 'Bandung', 'admin@gmail.com', '2021-05-10 13:00:00', NULL),
(2, 'Pelita', 'P', '087821505412', 'Gunung Batu, Bandung', 'pelita@gmail.com', '2021-05-27 19:39:20', NULL),
(3, 'Ayu', 'P', '08112121222', 'Sukawarna, Bandung', 'ayu@gmail.com', '2021-05-27 19:39:46', NULL),
(4, 'Fadhli', 'L', '08133613111', 'Cilandak, Jakarta', 'fadhli@gmail.com', '2021-05-27 19:40:13', NULL),
(5, 'Nur', 'P', '08212221311', 'Sunter, Jakarta', 'nur@gmail.com', '2021-05-27 19:40:49', NULL),
(6, 'Bagus', 'L', '0827379111', 'Sarijadi, Bandung', 'bagus@gmail.com\r\n', '2021-05-27 19:46:35', NULL),
(7, 'Mahendra', 'P', '08772191811', 'Sariwangi, Bandung', 'mahendra@gmail.com', '2021-05-27 19:46:35', NULL),
(8, 'Najmin', 'P', '08712911991', 'Sukaraja, Bandung', 'najmina@gmail.com', '2021-05-27 19:47:01', NULL),
(9, 'Putri', 'P', '0827191811', 'Cimahi', 'putri@gmail.com', '2021-06-02 09:00:42', NULL),
(10, 'Ridwan', 'L', '0898188191', 'Baros, Cimahi', 'ridwan@gmail.com', '2021-06-02 09:01:58', NULL),
(11, 'Feby', 'P', '08991717711', 'Sukajadi, Bandung', 'feby@gmail.com\r\n', '2021-06-02 09:01:58', NULL),
(12, 'Cindy', 'P', '08272772791', 'Sentral, Cimahi', 'cindy@gmail.com', '2021-06-02 09:03:16', NULL),
(13, 'Farid', 'P', '0876637911', 'Buah Batu, Bandung', 'farid@gmail.com', '2021-06-02 09:03:16', NULL),
(14, 'Bayu', 'L', '0887639199', 'Sunter, Jakarta', 'bayu@gmail.com', '2021-06-02 09:04:09', NULL),
(15, 'Deni', 'L', '0876619111', 'Cikutra, Subang', 'deni@gmail.com', '2021-06-02 10:30:32', NULL),
(28, 'Mariam Bruen', 'P', '+3283702919302', '62030 Stiedemann Glens', 'jamel.kilback@yahoo.com', '2021-07-05 18:29:21', '2021-07-05 18:29:21'),
(29, 'Dr. Orin Haley Jr.', 'P', '+5017993518858', '7128 Veum Mews Suite 813', 'madge94@hotmail.com', '2021-07-05 18:29:21', '2021-07-05 18:29:21'),
(30, 'Lucinda Smitham IV', 'P', '+9107679662317', '42032 Kulas Turnpike', 'xsatterfield@hotmail.com', '2021-07-05 18:29:21', '2021-07-05 18:29:21'),
(31, 'Cydney Beahan', 'P', '+3267492167025', '8208 Rosalia Parkways Suite 313', 'qdamore@hotmail.com', '2021-07-05 18:29:21', '2021-07-05 18:29:21'),
(32, 'Dr. Lucy Cummings', 'P', '+4181589933901', '7220 Dickens Row Suite 397', 'hkautzer@yahoo.com', '2021-07-05 18:29:21', '2021-07-05 18:29:21'),
(33, 'Mrs. Leann Ziemann DDS', 'P', '+4107142591008', '308 Brakus Manor', 'mertz.janis@gmail.com', '2021-07-05 18:29:21', '2021-07-05 18:29:21'),
(34, 'Giovanny Nolan', 'P', '+7528525133102', '209 Amya Park Apt. 270', 'bartell.joanne@yahoo.com', '2021-07-05 18:29:21', '2021-07-05 18:29:21'),
(35, 'Carleton Erdman', 'P', '+9784496078070', '396 Vita Hills', 'beer.gabe@gmail.com', '2021-07-05 18:29:21', '2021-07-05 18:29:21'),
(36, 'Adolph Kub DDS', 'P', '+8670457546859', '950 Beatty Hill', 'bosco.theresia@hotmail.com', '2021-07-05 18:29:21', '2021-07-05 18:29:21'),
(37, 'Dewitt Lemke II', 'P', '+3857137230515', '463 Shea Gardens Suite 531', 'alford.homenick@yahoo.com', '2021-07-05 18:29:21', '2021-07-05 18:29:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bukus`
--

CREATE TABLE `bukus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `isbn` int(11) NOT NULL,
  `judul` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` int(11) NOT NULL,
  `id_penerbit` bigint(20) UNSIGNED NOT NULL,
  `id_pengarang` bigint(20) UNSIGNED NOT NULL,
  `id_katalog` bigint(20) UNSIGNED NOT NULL,
  `qty_stok` int(11) NOT NULL,
  `harga_pinjam` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bukus`
--

INSERT INTO `bukus` (`id`, `isbn`, `judul`, `tahun`, `id_penerbit`, `id_pengarang`, `id_katalog`, `qty_stok`, `harga_pinjam`, `created_at`, `updated_at`) VALUES
(1, 2291, 'Lancar Javascript', 2018, 2, 5, 3, 8, 5000, NULL, NULL),
(2, 9281, 'Basic PHP', 2021, 4, 1, 2, 19, 7500, NULL, NULL),
(3, 92111, 'Belajar PHP', 2010, 1, 1, 1, 12, 12000, NULL, NULL),
(4, 377482, 'MySQL Dasar', 2020, 4, 4, 1, 20, 4000, NULL, NULL),
(5, 381561, 'Basic Vue.js', 2014, 3, 1, 3, 5, 5000, NULL, NULL),
(6, 774210, 'Laravel Master', 2021, 3, 5, 2, 7, 6500, NULL, NULL),
(7, 774211, 'Laravel Part 1', 2018, 3, 5, 2, 5, 4500, NULL, NULL),
(8, 777380, 'Mongo DB Lanjut', 2020, 1, 3, 3, 7, 10000, NULL, NULL),
(9, 777381, 'MySQL Lanjut', 2021, 1, 4, 1, 9, 8000, NULL, NULL),
(10, 882191, 'Belajar CSS', 2020, 3, 5, 1, 8, 12000, NULL, NULL),
(11, 882291, 'Belajar Laravel', 2020, 3, 5, 2, 3, 11500, NULL, NULL),
(12, 902191, 'CSS Part 2', 2020, 4, 5, 1, 8, 15000, NULL, NULL),
(13, 929181, 'Basic JQuery', 2019, 2, 5, 1, 11, 5500, NULL, NULL),
(14, 977381, 'CSS Part 1', 2018, 1, 1, 1, 9, 8000, NULL, NULL),
(15, 999281, 'Laravel Part 2', 2020, 4, 5, 2, 11, 13000, NULL, NULL),
(26, 747764, 'Mrs.', 2016, 1, 7, 5, 47, 12013, '2021-07-05 18:09:05', '2021-07-05 18:09:05'),
(27, 180771, 'Gregory Marks I', 2016, 5, 5, 3, 22, 5458, '2021-07-05 18:10:07', '2021-07-05 18:10:07'),
(28, 363745, 'Alexane Rolfson', 2018, 2, 5, 5, 18, 6772, '2021-07-05 18:10:07', '2021-07-05 18:10:07'),
(29, 384130, 'Brenden Schoen I', 2016, 1, 1, 4, 27, 13500, '2021-07-05 18:10:07', '2021-07-05 18:10:07'),
(30, 987393, 'Nicola Schaefer', 2018, 2, 7, 2, 11, 17433, '2021-07-05 18:10:07', '2021-07-05 18:10:07'),
(31, 994492, 'Maybell Predovic', 2015, 4, 7, 1, 11, 12287, '2021-07-05 18:10:07', '2021-07-05 18:10:07'),
(32, 210215, 'Daren Emmerich', 2018, 2, 5, 2, 23, 8760, '2021-07-05 18:10:08', '2021-07-05 18:10:08'),
(33, 488026, 'Kim Boehm', 2019, 5, 1, 1, 14, 15231, '2021-07-05 18:10:08', '2021-07-05 18:10:08'),
(34, 900501, 'Valerie Collins', 2019, 1, 6, 3, 14, 6291, '2021-07-05 18:10:08', '2021-07-05 18:10:08'),
(35, 327772, 'Kristy Marquardt IV', 2017, 4, 4, 2, 12, 8540, '2021-07-05 18:10:08', '2021-07-05 18:10:08'),
(36, 828971, 'Prof. Terrance Friesen Sr.', 2019, 4, 6, 5, 17, 15443, '2021-07-05 18:10:08', '2021-07-05 18:10:08'),
(37, 197488, 'Ike Senger PhD', 2018, 4, 2, 4, 45, 17975, '2021-07-05 18:22:13', '2021-07-05 18:22:13'),
(38, 312164, 'Cade Gulgowski I', 2021, 4, 7, 2, 21, 8767, '2021-07-05 18:22:13', '2021-07-05 18:22:13'),
(39, 905474, 'Maeve Beahan', 2021, 3, 3, 3, 45, 8154, '2021-07-05 18:22:13', '2021-07-05 18:22:13'),
(40, 601250, 'Abraham Swaniawski', 2021, 3, 1, 2, 38, 7312, '2021-07-05 18:22:13', '2021-07-05 18:22:13'),
(41, 712741, 'Kathryne Wyman', 2017, 5, 6, 1, 39, 11968, '2021-07-05 18:22:13', '2021-07-05 18:22:13'),
(42, 584028, 'Nichole Lynch', 2019, 2, 2, 5, 46, 8178, '2021-07-05 18:22:13', '2021-07-05 18:22:13'),
(43, 288859, 'Ms. Eve Willms MD', 2016, 1, 3, 2, 12, 14598, '2021-07-05 18:22:13', '2021-07-05 18:22:13'),
(44, 759046, 'Carson Heller', 2016, 2, 2, 4, 32, 16107, '2021-07-05 18:22:13', '2021-07-05 18:22:13'),
(45, 278853, 'Louvenia Baumbach', 2019, 4, 4, 4, 46, 11088, '2021-07-05 18:22:13', '2021-07-05 18:22:13'),
(46, 219004, 'Karelle Armstrong', 2019, 3, 1, 5, 34, 17209, '2021-07-05 18:22:13', '2021-07-05 18:22:13'),
(47, 631385, 'Erika Funk', 2018, 2, 6, 1, 40, 13142, '2021-07-05 18:22:43', '2021-07-05 18:22:43'),
(48, 892810, 'Dr. Velma Klein MD', 2017, 5, 3, 1, 26, 8704, '2021-07-05 18:22:43', '2021-07-05 18:22:43'),
(49, 156323, 'Fiona Dach', 2015, 3, 2, 5, 38, 13978, '2021-07-05 18:22:43', '2021-07-05 18:22:43'),
(50, 880589, 'Gavin Beahan', 2020, 3, 3, 4, 25, 7134, '2021-07-05 18:22:43', '2021-07-05 18:22:43'),
(51, 809077, 'Dr. Aaliyah McCullough', 2018, 2, 6, 5, 36, 7761, '2021-07-05 18:22:43', '2021-07-05 18:22:43'),
(52, 310906, 'Mrs. Muriel Pacocha Sr.', 2020, 2, 7, 5, 18, 6981, '2021-07-05 18:22:43', '2021-07-05 18:22:43'),
(53, 294591, 'Jakayla Stoltenberg', 2017, 3, 5, 1, 35, 9741, '2021-07-05 18:22:43', '2021-07-05 18:22:43'),
(54, 966559, 'Tiana Windler', 2019, 2, 6, 1, 16, 13292, '2021-07-05 18:22:43', '2021-07-05 18:22:43'),
(55, 748745, 'Edyth Buckridge PhD', 2018, 2, 4, 3, 37, 9212, '2021-07-05 18:22:43', '2021-07-05 18:22:43'),
(56, 983582, 'Letha Romaguera', 2020, 5, 5, 4, 19, 11382, '2021-07-05 18:22:43', '2021-07-05 18:22:43'),
(57, 657094, 'Prof. Aurelie King V', 2018, 1, 1, 2, 32, 19949, '2021-07-05 18:24:03', '2021-07-05 18:24:03'),
(58, 730508, 'Ted Rosenbaum', 2018, 2, 6, 5, 23, 11838, '2021-07-05 18:24:03', '2021-07-05 18:24:03'),
(59, 241160, 'Omer Jaskolski DDS', 2020, 3, 3, 5, 50, 6690, '2021-07-05 18:24:03', '2021-07-05 18:24:03'),
(60, 403067, 'Imogene Donnelly Jr.', 2019, 3, 1, 5, 45, 9719, '2021-07-05 18:24:03', '2021-07-05 18:24:03'),
(61, 521631, 'Ruth Larson IV', 2018, 2, 3, 2, 31, 12734, '2021-07-05 18:24:03', '2021-07-05 18:24:03'),
(62, 905044, 'Webster Wilderman', 2020, 2, 5, 5, 23, 9194, '2021-07-05 18:24:03', '2021-07-05 18:24:03'),
(63, 452655, 'Jarrell Wisoky', 2020, 1, 2, 4, 36, 13254, '2021-07-05 18:24:03', '2021-07-05 18:24:03'),
(64, 230002, 'Anastacio Dickens', 2021, 5, 7, 3, 19, 16582, '2021-07-05 18:24:03', '2021-07-05 18:24:03'),
(65, 930943, 'Mrs. Haylie Nitzsche V', 2017, 2, 1, 1, 27, 9836, '2021-07-05 18:24:03', '2021-07-05 18:24:03'),
(66, 198484, 'Prof. Nyah Krajcik IV', 2020, 3, 4, 2, 49, 16573, '2021-07-05 18:24:03', '2021-07-05 18:24:03'),
(67, 363147, 'Demario Reilly', 2019, 4, 6, 4, 10, 13737, '2021-07-05 18:24:36', '2021-07-05 18:24:36'),
(68, 283345, 'Dr. Darien Grimes PhD', 2021, 5, 3, 1, 43, 13934, '2021-07-05 18:24:36', '2021-07-05 18:24:36'),
(69, 444846, 'Marlin Champlin', 2015, 4, 6, 1, 24, 14198, '2021-07-05 18:24:36', '2021-07-05 18:24:36'),
(70, 299634, 'Dr. Jaylan Bosco MD', 2020, 2, 6, 5, 27, 5987, '2021-07-05 18:24:36', '2021-07-05 18:24:36'),
(71, 516106, 'Camden Hintz Jr.', 2016, 2, 1, 4, 12, 18449, '2021-07-05 18:24:36', '2021-07-05 18:24:36'),
(72, 567200, 'Edgardo Carroll', 2019, 3, 2, 5, 31, 14182, '2021-07-05 18:24:36', '2021-07-05 18:24:36'),
(73, 833708, 'Ross Kling', 2020, 2, 6, 3, 48, 6513, '2021-07-05 18:24:36', '2021-07-05 18:24:36'),
(74, 130912, 'Mr. Dedric Dicki', 2015, 1, 4, 4, 38, 7509, '2021-07-05 18:24:36', '2021-07-05 18:24:36'),
(75, 682469, 'Ms. Phoebe Boyer DVM', 2016, 4, 7, 1, 16, 9694, '2021-07-05 18:24:36', '2021-07-05 18:24:36'),
(76, 315582, 'Dameon Schamberger', 2019, 3, 3, 1, 26, 19801, '2021-07-05 18:24:36', '2021-07-05 18:24:36'),
(77, 429009, 'Angus Jacobi', 2018, 2, 2, 3, 12, 13832, '2021-07-05 18:25:01', '2021-07-05 18:25:01'),
(78, 870358, 'Miss Lauretta Bode DDS', 2015, 4, 3, 4, 30, 13378, '2021-07-05 18:25:01', '2021-07-05 18:25:01'),
(79, 449786, 'Antonia Homenick', 2021, 5, 3, 5, 31, 12090, '2021-07-05 18:25:01', '2021-07-05 18:25:01'),
(80, 642203, 'Claudia Beatty', 2019, 5, 7, 3, 14, 10691, '2021-07-05 18:25:01', '2021-07-05 18:25:01'),
(81, 639290, 'Fiona Gleason', 2021, 5, 4, 1, 34, 14982, '2021-07-05 18:25:01', '2021-07-05 18:25:01'),
(82, 392423, 'Prof. Gina Bergstrom', 2019, 3, 4, 2, 50, 13277, '2021-07-05 18:25:01', '2021-07-05 18:25:01'),
(83, 999019, 'Elva Hayes', 2020, 5, 4, 3, 33, 19436, '2021-07-05 18:25:01', '2021-07-05 18:25:01'),
(84, 750131, 'Ibrahim Jast', 2016, 4, 1, 3, 12, 18453, '2021-07-05 18:25:01', '2021-07-05 18:25:01'),
(85, 282908, 'Prof. Dimitri Morar', 2017, 3, 4, 4, 12, 10500, '2021-07-05 18:25:01', '2021-07-05 18:25:01'),
(86, 958768, 'Trystan Heaney', 2018, 4, 7, 1, 22, 8228, '2021-07-05 18:25:01', '2021-07-05 18:25:01'),
(87, 812906, 'Prof. Taurean Williamson Jr.', 2015, 4, 6, 5, 43, 8066, '2021-07-05 18:25:51', '2021-07-05 18:25:51'),
(88, 113434, 'Mr. Vicente Borer IV', 2016, 3, 4, 5, 19, 9121, '2021-07-05 18:25:51', '2021-07-05 18:25:51'),
(89, 703848, 'Octavia Hintz', 2015, 1, 6, 2, 34, 16624, '2021-07-05 18:25:51', '2021-07-05 18:25:51'),
(90, 999723, 'Dr. Shanel Gutkowski Sr.', 2017, 4, 4, 1, 48, 12789, '2021-07-05 18:25:51', '2021-07-05 18:25:51'),
(91, 175779, 'Ferne Corkery', 2015, 3, 4, 1, 25, 14317, '2021-07-05 18:25:51', '2021-07-05 18:25:51'),
(92, 227429, 'Miss Danielle Altenwerth', 2020, 4, 6, 4, 50, 9582, '2021-07-05 18:25:51', '2021-07-05 18:25:51'),
(93, 533075, 'Vance Kutch', 2016, 5, 7, 4, 40, 12222, '2021-07-05 18:25:51', '2021-07-05 18:25:51'),
(94, 956014, 'Leanna Swift', 2017, 4, 3, 4, 45, 15133, '2021-07-05 18:25:51', '2021-07-05 18:25:51'),
(95, 727087, 'Nia Bradtke', 2021, 5, 3, 4, 22, 6694, '2021-07-05 18:25:51', '2021-07-05 18:25:51'),
(96, 596245, 'Ms. Lupe Abernathy', 2019, 2, 7, 4, 39, 13107, '2021-07-05 18:25:51', '2021-07-05 18:25:51'),
(97, 201530, 'Cory Powlowski I', 2019, 1, 5, 1, 40, 11207, '2021-07-05 18:28:06', '2021-07-05 18:28:06'),
(98, 444182, 'Deborah Ward', 2019, 1, 3, 1, 23, 15157, '2021-07-05 18:28:06', '2021-07-05 18:28:06'),
(99, 618062, 'Dr. Mikel O\'Hara', 2015, 1, 4, 3, 30, 19952, '2021-07-05 18:28:06', '2021-07-05 18:28:06'),
(100, 166116, 'Florida Klocko', 2020, 4, 1, 5, 41, 5238, '2021-07-05 18:28:06', '2021-07-05 18:28:06'),
(101, 901921, 'Haylee Goyette I', 2016, 2, 3, 4, 41, 6191, '2021-07-05 18:28:06', '2021-07-05 18:28:06'),
(102, 436404, 'Paula Hintz', 2019, 5, 7, 5, 10, 16394, '2021-07-05 18:28:06', '2021-07-05 18:28:06'),
(103, 701070, 'Krista Luettgen Jr.', 2021, 5, 5, 1, 20, 16486, '2021-07-05 18:28:06', '2021-07-05 18:28:06'),
(104, 812347, 'Judd Ward', 2018, 1, 4, 3, 34, 8104, '2021-07-05 18:28:06', '2021-07-05 18:28:06'),
(105, 447499, 'Jayme Bradtke', 2019, 1, 1, 3, 49, 11235, '2021-07-05 18:28:06', '2021-07-05 18:28:06'),
(106, 192197, 'Mr. Terrill Davis', 2018, 2, 3, 5, 10, 16353, '2021-07-05 18:28:06', '2021-07-05 18:28:06'),
(107, 951946, 'Kelley Sporer Sr.', 2016, 4, 6, 5, 41, 10687, '2021-07-05 18:29:20', '2021-07-05 18:29:20'),
(108, 331664, 'Mr. Ewald Smitham', 2017, 3, 1, 3, 11, 6820, '2021-07-05 18:29:20', '2021-07-05 18:29:20'),
(109, 130765, 'Miss Sabina Jacobs', 2019, 3, 5, 5, 17, 18551, '2021-07-05 18:29:20', '2021-07-05 18:29:20'),
(110, 622221, 'Dr. Silas McGlynn II', 2017, 5, 6, 4, 20, 7292, '2021-07-05 18:29:20', '2021-07-05 18:29:20'),
(111, 374458, 'Prof. Javonte Connelly', 2018, 4, 5, 3, 10, 12370, '2021-07-05 18:29:20', '2021-07-05 18:29:20'),
(112, 141845, 'Prof. Korbin Cruickshank DVM', 2018, 4, 2, 4, 11, 6839, '2021-07-05 18:29:20', '2021-07-05 18:29:20'),
(113, 502492, 'Rosalee Wolff', 2021, 5, 6, 5, 34, 16000, '2021-07-05 18:29:20', '2021-07-05 18:29:20'),
(114, 140055, 'Adan Dooley', 2018, 2, 7, 1, 13, 11436, '2021-07-05 18:29:20', '2021-07-05 18:29:20'),
(115, 486486, 'Rebeka O\'Hara IV', 2016, 3, 2, 1, 48, 7024, '2021-07-05 18:29:20', '2021-07-05 18:29:20'),
(116, 735830, 'Etha Mills', 2020, 3, 5, 1, 46, 13487, '2021-07-05 18:29:20', '2021-07-05 18:29:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_peminjamen`
--

CREATE TABLE `detail_peminjamen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_peminjaman` bigint(20) UNSIGNED NOT NULL,
  `id_buku` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_peminjamen`
--

INSERT INTO `detail_peminjamen` (`id`, `id_peminjaman`, `id_buku`, `qty`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1, NULL, NULL),
(2, 1, 9, 3, NULL, NULL),
(3, 1, 15, 1, NULL, NULL),
(4, 2, 9, 1, NULL, NULL),
(5, 3, 2, 1, NULL, NULL),
(6, 3, 5, 1, NULL, NULL),
(7, 3, 9, 2, NULL, NULL),
(8, 3, 11, 1, NULL, NULL),
(9, 4, 2, 1, NULL, NULL),
(10, 4, 4, 1, NULL, NULL),
(11, 5, 5, 1, NULL, NULL),
(12, 5, 15, 2, NULL, NULL),
(13, 6, 1, 1, NULL, NULL),
(14, 6, 4, 2, NULL, NULL),
(15, 6, 9, 1, NULL, NULL),
(16, 6, 12, 1, NULL, NULL),
(17, 7, 11, 1, NULL, NULL),
(18, 8, 8, 2, NULL, NULL),
(19, 8, 13, 1, NULL, NULL),
(20, 9, 2, 1, NULL, NULL),
(21, 9, 4, 1, NULL, NULL),
(22, 9, 13, 1, NULL, NULL),
(23, 10, 5, 1, NULL, NULL),
(24, 10, 11, 1, NULL, NULL),
(25, 10, 12, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `katalogs`
--

CREATE TABLE `katalogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `katalogs`
--

INSERT INTO `katalogs` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Buku Dewasa', NULL, NULL),
(2, 'Buku Anak', NULL, NULL),
(3, 'Buku Belajar', NULL, NULL),
(4, 'Buku Belajar Agama', NULL, NULL),
(5, 'Buku Kesehatan', NULL, NULL);

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
(1, '2011_06_29_044349_create_anggotas_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2021_06_29_044359_create_penerbits_table', 1),
(6, '2021_06_29_044404_create_pengarangs_table', 1),
(7, '2021_06_29_044409_create_katalogs_table', 1),
(8, '2021_06_29_044415_create_bukus_table', 1),
(9, '2021_06_29_044420_create_peminjamen_table', 1),
(10, '2021_06_29_044425_create_detail_peminjamen_table', 1);

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
-- Struktur dari tabel `peminjamen`
--

CREATE TABLE `peminjamen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_anggota` bigint(20) UNSIGNED NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `peminjamen`
--

INSERT INTO `peminjamen` (`id`, `id_anggota`, `tgl_pinjam`, `tgl_kembali`, `created_at`, `updated_at`) VALUES
(1, 4, '2021-05-26', '2021-05-31', NULL, NULL),
(2, 2, '2021-05-27', '2021-05-29', NULL, NULL),
(3, 3, '2021-05-10', '2021-05-12', NULL, NULL),
(4, 7, '2021-05-27', '2021-05-31', NULL, NULL),
(5, 5, '2021-06-01', '2021-06-05', NULL, NULL),
(6, 10, '2021-06-01', '2021-06-03', NULL, NULL),
(7, 3, '2021-05-04', '2021-05-06', NULL, NULL),
(8, 4, '2021-06-03', '2021-06-09', NULL, NULL),
(9, 11, '2021-06-02', '2021-06-08', NULL, NULL),
(10, 5, '2021-05-25', '2021-06-02', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerbits`
--

CREATE TABLE `penerbits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_penerbit` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penerbits`
--

INSERT INTO `penerbits` (`id`, `nama_penerbit`, `email`, `telp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Penerbit 01', 'penerbit@perpus.co.id', '0219999333', 'Surabaya', NULL, NULL),
(2, 'Penerbit 02', 'penerbit2@gmail.com', '08765158111', 'Bandung', NULL, NULL),
(3, 'Penerbit 03', 'penerbit3@gmail.com', '', 'Jakarta Barat', NULL, NULL),
(4, 'Penerbit 04', 'penerbit4@gmail.com', '08972017209', 'Jakarta Selatan', NULL, NULL),
(5, 'Penerbit 05', 'penerbit5@gmail.com', '08972187209', 'Jakarta Selatan', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengarangs`
--

CREATE TABLE `pengarangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pengarang` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengarangs`
--

INSERT INTO `pengarangs` (`id`, `nama_pengarang`, `email`, `telp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Pengarang 01', 'pengarang1@perpus.co.id', '0929211', 'Bandung', NULL, NULL),
(2, 'Pengarang 02', 'pengarang2@perpus.co.id', '0929211222', 'Yogyakarta', NULL, NULL),
(3, 'Pengarang 03', 'pengarang3@perpus.co.id', '092921199', 'Banten', NULL, NULL),
(4, 'Pengarang 04', 'pengarang4@perpus.co.id', '93938199', 'Jakarta', NULL, NULL),
(5, 'Pengarang 05', 'pengarang5@perpus.co.id', '93938199', 'Cimahi', NULL, NULL),
(6, 'Pengarang 06', 'pengarang6@perpus.co.id', '0818176111', 'Cimahi', NULL, NULL),
(7, 'Pengarang 07', 'pengarang7@perpus.co.id', '08181762291', 'Semarang', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_anggota` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggotas`
--
ALTER TABLE `anggotas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bukus`
--
ALTER TABLE `bukus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bukus_id_penerbit_foreign` (`id_penerbit`),
  ADD KEY `bukus_id_pengarang_foreign` (`id_pengarang`),
  ADD KEY `bukus_id_katalog_foreign` (`id_katalog`);

--
-- Indeks untuk tabel `detail_peminjamen`
--
ALTER TABLE `detail_peminjamen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_peminjamen_id_peminjaman_foreign` (`id_peminjaman`),
  ADD KEY `detail_peminjamen_id_buku_foreign` (`id_buku`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `katalogs`
--
ALTER TABLE `katalogs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `peminjamen`
--
ALTER TABLE `peminjamen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peminjamen_id_anggota_foreign` (`id_anggota`);

--
-- Indeks untuk tabel `penerbits`
--
ALTER TABLE `penerbits`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengarangs`
--
ALTER TABLE `pengarangs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_anggota_foreign` (`id_anggota`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggotas`
--
ALTER TABLE `anggotas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `bukus`
--
ALTER TABLE `bukus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT untuk tabel `detail_peminjamen`
--
ALTER TABLE `detail_peminjamen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `katalogs`
--
ALTER TABLE `katalogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `peminjamen`
--
ALTER TABLE `peminjamen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `penerbits`
--
ALTER TABLE `penerbits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pengarangs`
--
ALTER TABLE `pengarangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bukus`
--
ALTER TABLE `bukus`
  ADD CONSTRAINT `bukus_id_katalog_foreign` FOREIGN KEY (`id_katalog`) REFERENCES `katalogs` (`id`),
  ADD CONSTRAINT `bukus_id_penerbit_foreign` FOREIGN KEY (`id_penerbit`) REFERENCES `penerbits` (`id`),
  ADD CONSTRAINT `bukus_id_pengarang_foreign` FOREIGN KEY (`id_pengarang`) REFERENCES `pengarangs` (`id`);

--
-- Ketidakleluasaan untuk tabel `detail_peminjamen`
--
ALTER TABLE `detail_peminjamen`
  ADD CONSTRAINT `detail_peminjamen_id_buku_foreign` FOREIGN KEY (`id_buku`) REFERENCES `bukus` (`id`),
  ADD CONSTRAINT `detail_peminjamen_id_peminjaman_foreign` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjamen` (`id`);

--
-- Ketidakleluasaan untuk tabel `peminjamen`
--
ALTER TABLE `peminjamen`
  ADD CONSTRAINT `peminjamen_id_anggota_foreign` FOREIGN KEY (`id_anggota`) REFERENCES `anggotas` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_anggota_foreign` FOREIGN KEY (`id_anggota`) REFERENCES `anggotas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
