-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Waktu pembuatan: 08 Jul 2021 pada 14.52
-- Versi server: 5.7.32
-- Versi PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `byfast`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `banners`
--

INSERT INTO `banners` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Diskon Akhir Bulan', 'Dapatkan 50% untuk periode 29-31 Februari 2021', '/random.jpeg', '2021-07-08 14:52:18', '2021-07-08 14:52:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `credits`
--

CREATE TABLE `credits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `balance` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `credits`
--

INSERT INTO `credits` (`id`, `user_id`, `balance`, `point`, `created_at`, `updated_at`) VALUES
(1, 1, 100000, 10000, '2021-07-08 14:52:18', '2021-07-08 14:52:18');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(336, '2014_10_12_000000_create_users_table', 1),
(337, '2014_10_12_100000_create_password_resets_table', 1),
(338, '2019_08_19_000000_create_failed_jobs_table', 1),
(339, '2021_07_05_194202_create_packet_categories_table', 1),
(340, '2021_07_06_083913_create_packets_table', 1),
(341, '2021_07_06_091725_create_toppings_table', 1),
(342, '2021_07_06_092221_create_transactions_table', 1),
(343, '2021_07_08_072750_create_purchased_packets_table', 1),
(344, '2021_07_08_074241_create_purchased_toppings_table', 1),
(345, '2021_07_08_075349_create_credits_table', 1),
(346, '2021_07_08_075800_create_banners_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `packets`
--

CREATE TABLE `packets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `packet_category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `quota` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `point_reward` int(11) NOT NULL,
  `active_period` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `packets`
--

INSERT INTO `packets` (`id`, `packet_category_id`, `name`, `description`, `quota`, `price`, `point_reward`, `active_period`, `created_at`, `updated_at`) VALUES
(1, 1, 'Paket Internet Lokal Extra', '20GB / 30 hari', 20000, 50000, 50, 30, '2021-07-08 14:52:18', '2021-07-08 14:52:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `packet_categories`
--

CREATE TABLE `packet_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `packet_categories`
--

INSERT INTO `packet_categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Terpopuler', NULL, NULL, NULL),
(2, 'Terbaru', NULL, NULL, NULL);

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
-- Struktur dari tabel `purchased_packets`
--

CREATE TABLE `purchased_packets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `initial_quota` int(11) NOT NULL,
  `current_quota` int(11) NOT NULL,
  `active_period` datetime NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `purchased_packets`
--

INSERT INTO `purchased_packets` (`id`, `user_id`, `transaction_id`, `initial_quota`, `current_quota`, `active_period`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 20000, 20000, '2021-08-07 21:52:18', NULL, '2021-07-08 14:52:18', '2021-07-08 14:52:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `purchased_toppings`
--

CREATE TABLE `purchased_toppings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('Instagram','Twitter','Youtube') COLLATE utf8mb4_unicode_ci NOT NULL,
  `initial_quota` int(11) NOT NULL,
  `current_quota` int(11) NOT NULL,
  `active_period` datetime NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `purchased_toppings`
--

INSERT INTO `purchased_toppings` (`id`, `user_id`, `transaction_id`, `type`, `initial_quota`, `current_quota`, `active_period`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Instagram', 10000, 10000, '2021-07-18 21:52:18', NULL, '2021-07-08 14:52:18', '2021-07-08 14:52:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `toppings`
--

CREATE TABLE `toppings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `type` enum('Instagram','Twitter','Youtube') COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `quota` int(11) NOT NULL,
  `active_period` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `toppings`
--

INSERT INTO `toppings` (`id`, `name`, `description`, `type`, `price`, `quota`, `active_period`, `created_at`, `updated_at`) VALUES
(1, 'Kuota IG', '10GB / 10 hari', 'Instagram', 10000, 10000, 10, '2021-07-08 14:52:18', '2021-07-08 14:52:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `packet_id` bigint(20) UNSIGNED NOT NULL,
  `topping_id` bigint(20) UNSIGNED DEFAULT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `packet_id`, `topping_id`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 60000, '2021-07-08 14:52:18', '2021-07-08 14:52:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` tinyint(1) NOT NULL DEFAULT '1',
  `dob` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `email_verified_at` timestamp NOT NULL DEFAULT '2021-07-08 14:52:16',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone_number`, `gender`, `dob`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kukuh Prastyono', 'kukuh@gmail.com', '0832154247976', 1, '1980-04-21 08:33:37', '2021-07-08 14:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'frolnEFWKm', '2021-07-08 14:52:17', '2021-07-08 14:52:18'),
(2, 'Tiara Paris Zulaika S.E.I', 'kezia31@example.com', '089887054328', 1, '1983-10-01 06:14:34', '2021-07-08 14:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'nb2Ayr52sb', '2021-07-08 14:52:17', '2021-07-08 14:52:17'),
(3, 'Danu Tirtayasa Anggriawan', 'mandala.bakiadi@example.net', '089698160356', 1, '1998-07-08 04:41:58', '2021-07-08 14:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'j9hT9LvIey', '2021-07-08 14:52:17', '2021-07-08 14:52:17'),
(4, 'Bakijan Hutasoit', 'haryanti.hani@example.net', '089571703242', 0, '1995-07-06 03:25:05', '2021-07-08 14:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '6WFbr9txPo', '2021-07-08 14:52:17', '2021-07-08 14:52:17'),
(5, 'Cemplunk Radit Saputra M.TI.', 'halimah.ifa@example.net', '089976773968', 1, '1990-01-01 18:56:00', '2021-07-08 14:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'EJHzPQfOhq', '2021-07-08 14:52:17', '2021-07-08 14:52:17'),
(6, 'Jatmiko Napitupulu', 'cinthia.riyanti@example.net', '089602122537', 1, '1983-02-15 23:27:14', '2021-07-08 14:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'LbE1LopPpE', '2021-07-08 14:52:17', '2021-07-08 14:52:17'),
(7, 'Ophelia Kiandra Permata', 'buyainah@example.com', '089854294883', 0, '1988-04-26 16:42:06', '2021-07-08 14:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'eC9aaKkwsj', '2021-07-08 14:52:17', '2021-07-08 14:52:17'),
(8, 'Keisha Palastri', 'bsusanti@example.org', '089477926208', 1, '1987-09-09 13:19:28', '2021-07-08 14:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'cM5s0Bw6oh', '2021-07-08 14:52:17', '2021-07-08 14:52:17'),
(9, 'Jessica Widiastuti', 'rizki.zulkarnain@example.net', '089953537796', 1, '1993-11-17 18:44:41', '2021-07-08 14:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'bHvrwPdXQy', '2021-07-08 14:52:17', '2021-07-08 14:52:17'),
(10, 'Janet Hariyah', 'lanjar53@example.net', '089752958190', 1, '1970-03-13 19:13:59', '2021-07-08 14:52:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '8ZsdQ6t99o', '2021-07-08 14:52:17', '2021-07-08 14:52:17'),
(11, 'admin', 'admin@mail.com', '089508670107', 1, '1970-01-01 00:00:00', '2021-07-08 14:52:17', '$2y$10$AmYb7hZaglSqQYHyx4FwaOXXF2wBIYW2EbsLS5e0HtPsfFjRdV1jO', NULL, '2021-07-08 14:52:18', '2021-07-08 14:52:18');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `credits`
--
ALTER TABLE `credits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `credits_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `packets`
--
ALTER TABLE `packets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `packets_packet_category_id_foreign` (`packet_category_id`);

--
-- Indeks untuk tabel `packet_categories`
--
ALTER TABLE `packet_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `purchased_packets`
--
ALTER TABLE `purchased_packets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchased_packets_user_id_foreign` (`user_id`),
  ADD KEY `purchased_packets_transaction_id_foreign` (`transaction_id`);

--
-- Indeks untuk tabel `purchased_toppings`
--
ALTER TABLE `purchased_toppings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchased_toppings_user_id_foreign` (`user_id`),
  ADD KEY `purchased_toppings_transaction_id_foreign` (`transaction_id`);

--
-- Indeks untuk tabel `toppings`
--
ALTER TABLE `toppings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_packet_id_foreign` (`packet_id`),
  ADD KEY `transactions_topping_id_foreign` (`topping_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_number_unique` (`phone_number`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `credits`
--
ALTER TABLE `credits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=347;

--
-- AUTO_INCREMENT untuk tabel `packets`
--
ALTER TABLE `packets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `packet_categories`
--
ALTER TABLE `packet_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `purchased_packets`
--
ALTER TABLE `purchased_packets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `purchased_toppings`
--
ALTER TABLE `purchased_toppings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `toppings`
--
ALTER TABLE `toppings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `credits`
--
ALTER TABLE `credits`
  ADD CONSTRAINT `credits_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `packets`
--
ALTER TABLE `packets`
  ADD CONSTRAINT `packets_packet_category_id_foreign` FOREIGN KEY (`packet_category_id`) REFERENCES `packet_categories` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `purchased_packets`
--
ALTER TABLE `purchased_packets`
  ADD CONSTRAINT `purchased_packets_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchased_packets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `purchased_toppings`
--
ALTER TABLE `purchased_toppings`
  ADD CONSTRAINT `purchased_toppings_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchased_toppings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_packet_id_foreign` FOREIGN KEY (`packet_id`) REFERENCES `packets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_topping_id_foreign` FOREIGN KEY (`topping_id`) REFERENCES `toppings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
