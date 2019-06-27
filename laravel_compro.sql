-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jun 2019 pada 08.57
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_compro`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `abouts`
--

CREATE TABLE `abouts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `description`, `icon`, `picture`, `created_at`, `updated_at`) VALUES
(1, 'MISSION', 'is to help customers achieve their business objectives by providing innovative, best-in-class consulting, IT solutions and services and to make it a joy for all stakeholders to work with us. .', 'ion-ios-speedometer-outline', 'about-mission.jpg', NULL, NULL),
(2, 'VISSION', 'We aim to be a globally respected and sustainable company.', 'ion-ios-eye-outline', 'about-vision.jpg', NULL, NULL),
(3, 'PLAN', 'We can do the best for our company until become 1st best company in our country and till international', 'ion-ios-list-outline', 'about-plan.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `clients`
--

INSERT INTO `clients` (`id`, `name`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'GMF AEROASIA', '1543828612.jpeg', NULL, '2018-12-02 19:16:53'),
(2, 'ASSA', 'assa.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `descriptions`
--

CREATE TABLE `descriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `descriptions`
--

INSERT INTO `descriptions` (`id`, `description`, `type`, `created_at`, `updated_at`) VALUES
(1, 'We ensure the highest levels of certainty and satisfaction through a deep-set commitment to our clients, comprehensive industry expertise and a global network of innovation and delivery cente', 'about_us', NULL, NULL),
(2, 'Laudem latine persequeris id sed, ex fabulas delectus quo. No vel partiendo abhorreant vituperatoribus, ad pro quaestio laboramus. Ei ubique vivendum pro. At ius nisl accusam lorenta zanos pa', 'service', NULL, NULL),
(3, 'You need Our Service and Support to Consultation, Lets to contact me', 'call_action', NULL, NULL),
(4, 'We Have Any skill in IT development such in PHP, Networking, Java, Javascripy, Mobile Dev, and this is rate our skill', 'skill', NULL, NULL),
(5, 'Good team working joined in this company', 'team', NULL, '2018-11-26 15:08:30'),
(6, 'PT.LAMJAYA GLOBAL SOLUSI IS SYSTEM INTEGRATOR THAT WILL HELP YOU INCREASE YOUR COMPANY PERFORMANCE, IMPROVE EFFICIENCY AND OVERALL PRODUCTIVITY.', 'desc', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `intros`
--

CREATE TABLE `intros` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `intros`
--

INSERT INTO `intros` (`id`, `title`, `description`, `picture`, `created_at`, `updated_at`) VALUES
(2, 'SAP fdsfasdfas', 'Implemententation And Consultation fdsafdsafa', '1561343793.jpeg', NULL, '2019-06-23 18:36:33'),
(3, 'DMS Dokmee', 'Implementing bla bla bla', 'slider2.jpg', NULL, NULL),
(4, 'Software Aplication', 'We Are build And developt Software', 'slider3.jpg', NULL, '2018-11-26 17:34:17'),
(5, 'slide a', 'We are the best bla blba blba bajsdjasjd', '1544580352.png', '2018-12-11 19:05:54', '2018-12-11 19:05:54'),
(6, 'testing q', 'descripsi ba vaksjd jkj', '1544580384.png', '2018-12-11 19:06:25', '2018-12-11 19:06:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(191) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_11_22_045957_create_intros_table', 1),
(4, '2018_11_22_050020_create_clients_table', 1),
(5, '2018_11_22_050040_create_products_table', 1),
(6, '2018_11_22_050112_create_services_table', 1),
(7, '2018_11_22_050135_create_teams_table', 1),
(8, '2018_11_22_050144_create_skills_table', 1),
(9, '2018_11_22_050203_create_abouts_table', 1),
(10, '2018_11_22_050243_create_web_names_table', 1),
(11, '2018_11_22_051501_create_descriptions_table', 1),
(12, '2018_11_22_075245_create_messages_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_produk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `name_produk`, `description`, `picture`, `type`, `created_at`, `updated_at`) VALUES
(4, 'Design 1', 'asdsa', 'card1.jpg', 'Design', NULL, NULL),
(5, 'Design 2', 'ads', 'card2.jpg', 'Design', NULL, NULL),
(6, 'Design 3', 'asdsa', 'card3.jpg', 'Design', NULL, NULL),
(7, 'Website App 1', 'Aplikation Web base balasd', 'web1.jpg', 'Web', NULL, NULL),
(8, 'Website App 2', 'Aplikation Web base balasd', 'web2.jpg', 'Web', NULL, NULL),
(13, 'Website App 3', 'fdasfdsa asd', '1561346975.jpeg', 'Sekut', '2019-06-23 19:25:17', '2019-06-23 19:29:35'),
(14, 'Website App 3', NULL, '1561346856.jpeg', 'Hiya', '2019-06-23 19:27:36', '2019-06-23 19:39:21'),
(15, 'Website App 3', NULL, '1561347017.jpeg', 'Sekut', '2019-06-23 19:30:17', '2019-06-23 19:30:17'),
(16, 'Website App 3', 'fdsafd afdsafd saf sa', '1561347287.png', 'Hiya', '2019-06-23 19:34:48', '2019-06-23 19:34:48'),
(17, 'fdsaffdsaf sa', 'dfsf df dfsa', '1561347746.png', 'Sekut', '2019-06-23 19:42:26', '2019-06-23 19:42:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'SAP Implementation And Consultation', 'If you have problen with your system in your company, you can Consultation with us and the we can give you Solution to implementation', 'fa fa-ravelry', NULL, NULL),
(2, 'Web Aplication Service', 'We Can build the Aplication what you Want, you need, cause we can do analyst and then build the program', 'fa fa-globe', NULL, NULL),
(3, 'DMS Implementation', 'will have to make sure the prototype looks finished by inserting text or photo.make sure the prototype looks finished by.', 'ion-ios-bookmarks-outline', NULL, NULL),
(4, 'Testing', 'This For Impelemtation how to get is and add more about our service', 'fa fa-address-card-o', '2018-11-26 14:23:25', '2018-11-26 14:28:57'),
(5, 'fdas', 'fsdaf', 'fa fa-address-book', '2019-06-23 20:16:12', '2019-06-23 20:16:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skills`
--

CREATE TABLE `skills` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `skills`
--

INSERT INTO `skills` (`id`, `name`, `value`, `color`, `created_at`, `updated_at`) VALUES
(1, 'HTML', '100', 'bg-success', NULL, NULL),
(2, 'PHP developer', '95', 'bg-warning', NULL, NULL),
(3, 'Java Script', '85', 'bg-primary', NULL, NULL),
(4, 'Mobile developer', '75', 'bg-danger', NULL, NULL),
(5, 'Vue JS', '90', 'bg-secondary', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `teams`
--

CREATE TABLE `teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `teams`
--

INSERT INTO `teams` (`id`, `name`, `position`, `picture`, `created_at`, `updated_at`) VALUES
(1, 'Jhonny Simbolon', 'Director', 'team-1.jpg', NULL, NULL),
(2, 'Halida', 'HRD', 'team-2.jpg', NULL, NULL),
(3, 'Bagas Udi Sahsangka', 'Senior Programmer', 'team-3.jpg', NULL, NULL),
(4, 'Sata Lesmana', 'Senior Programmer', 'team-4.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'info@lamsolusi.com', NULL, '$2y$10$.j0z1ZMcx2irqrBxkmiJUOHr1DbtCMI96eKyjHsHBXp31nJB1sTia', '7hXqGFqZuwx9IOxIKsxAjq5xagMgVuTX0eUaIUXHfVQUqpkVHebwC9tf66tg', '2018-11-27 18:53:00', '2018-12-02 19:09:17'),
(2, 'gusti ngurah wisnu', 'ngurah@gmail.com', NULL, '$2y$10$ox1Mr09uQ8pSmCvknRdOF.5g4.ZFv2A.OvTeTyjgNOcrlbvDP0eQS', NULL, '2019-06-21 00:54:14', '2019-06-21 00:54:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `web_names`
--

CREATE TABLE `web_names` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `web_names`
--

INSERT INTO `web_names` (`id`, `name`, `telp`, `email`, `address`, `logo`, `seo`, `created_at`, `updated_at`) VALUES
(1, 'PT NGoerah Wisnoe', '081333738358', 'info@lamsolusi.com', 'Graha Mustika Ratu 10th Floor Jl. Jend. Gatot Subroto No.Kav 74-75 Menteng Dalam \r\nTebet Kota Jakarta Selatan, \r\nDaerah Khusus Ibukota Jakarta 12870 \r\nIndonesia', '1561343653.png', 'SAP Consultan, Software Developer, Consultan IT, DOKME DMS, SAP Implementation , SAP, Middleware Aplication', NULL, '2019-06-23 18:34:13');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `descriptions`
--
ALTER TABLE `descriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `intros`
--
ALTER TABLE `intros`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `messages`
--
ALTER TABLE `messages`
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
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `web_names`
--
ALTER TABLE `web_names`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `descriptions`
--
ALTER TABLE `descriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `intros`
--
ALTER TABLE `intros`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `web_names`
--
ALTER TABLE `web_names`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
