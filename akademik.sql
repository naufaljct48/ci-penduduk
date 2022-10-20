-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2022 at 08:53 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akademik`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_activation_attempts`
--

INSERT INTO `auth_activation_attempts` (`id`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36 Edg/106.0.1370.42', '6c18855cd5b686530ff6f00b4873b715', '2022-10-17 04:11:15');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
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
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'wotamfan@gmail.com', NULL, '2022-10-17 03:37:33', 0),
(2, '::1', 'wotamfan', 1, '2022-10-17 03:37:39', 0),
(3, '::1', 'wotamfan@gmail.com', 1, '2022-10-17 03:37:51', 1),
(4, '::1', 'wotamfan@gmail.com', 1, '2022-10-17 03:38:01', 1),
(5, '::1', 'kurotenshi4848@gmail.com', 9, '2022-10-17 04:11:19', 1),
(6, '::1', 'kurotenshi4848@gmail.com', 9, '2022-10-17 04:15:32', 1),
(7, '::1', 'kurotenshi4848@gmail.com', 9, '2022-10-17 04:15:55', 1),
(8, '::1', 'kurotenshi4848@gmail.com', 9, '2022-10-17 04:18:36', 1),
(9, '::1', 'kurotenshi4848@gmail.com', 9, '2022-10-17 04:19:36', 1),
(10, '::1', 'kurotenshi4848@gmail.com', 9, '2022-10-17 12:56:29', 1),
(11, '::1', 'kurotenshi4848@gmail.com', 9, '2022-10-17 13:00:22', 1),
(12, '::1', 'kurotenshi4848@gmail.com', 9, '2022-10-17 13:03:42', 1),
(13, '::1', 'kurotenshi4848@gmail.com', 9, '2022-10-17 13:49:24', 1),
(14, '::1', 'kurotenshi4848@gmail.com', 9, '2022-10-17 14:06:54', 1),
(15, '::1', 'kurotenshi4848@gmail.com', 9, '2022-10-17 15:35:13', 1),
(16, '::1', 'kurotenshi4848@gmail.com', 9, '2022-10-18 03:12:55', 1),
(17, '::1', 'kurotenshi4848@gmail.com', 9, '2022-10-18 03:19:48', 1),
(18, '::1', 'kurotenshi4848@gmail.com', 9, '2022-10-18 05:37:55', 1),
(19, '::1', 'superadmin', NULL, '2022-10-18 07:20:24', 0),
(20, '::1', 'kurotenshi4848@gmail.com', 9, '2022-10-18 07:20:28', 1),
(21, '::1', 'superadmin', NULL, '2022-10-18 12:28:12', 0),
(22, '::1', 'kurotenshi4848@gmail.com', 9, '2022-10-18 12:28:15', 1),
(23, '::1', 'superadmin', NULL, '2022-10-18 13:50:28', 0),
(24, '::1', 'kurotenshi4848@gmail.com', 9, '2022-10-18 13:50:32', 1),
(25, '::1', 'superadmin', NULL, '2022-10-20 01:07:24', 0),
(26, '::1', 'kurotenshi4848@gmail.com', 9, '2022-10-20 01:07:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
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
-- Table structure for table `auth_tokens`
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
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` varchar(25) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `alamat` varchar(25) NOT NULL,
  `fakultas` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `alamat`, `fakultas`) VALUES
(1, '1812495798', 'Naufal', 'Tangerang', 'Sistem Informasi'),
(2, '1812495790', 'Bagus', 'Kab. Tangerang', 'Teknik Informatika'),
(3, '1812495799', 'Tazkia', 'Cipondoh', 'Sistem Informasi'),
(4, '1812495791', 'Okta', 'Kab. Tangerang', 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
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
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1665993328, 1);

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

CREATE TABLE `penduduk` (
  `id` int(11) NOT NULL,
  `penduduk` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`id`, `penduduk`, `bulan`, `tahun`) VALUES
(1, 28889, 10, 2019),
(2, 28983, 11, 2019);

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'wotamfan@gmail.com', 'wotamfan', '$2y$10$8Ma8JpWQOPEsnafrlxQbTux8Y.NJjXLmr3OldIgFHdRuG5CQ86X9e', NULL, NULL, NULL, '4fd31bac542b2394e01e912bc1787a4e', NULL, NULL, 1, 0, '2022-10-17 03:22:45', '2022-10-17 03:22:45', NULL),
(9, 'kurotenshi4848@gmail.com', 'kurotenshi4848', '$2y$10$CfG2lJvmwFeYrNs3wqd/4O4sCrurng20tn5150Z9TvmSiGuVn25Kq', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-10-17 04:10:45', '2022-10-17 04:11:15', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
