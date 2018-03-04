-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Mar 04, 2018 at 02:12 AM
-- Server version: 8.0.3-rc-log
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `team118-omts`
--

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

CREATE TABLE `actors` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `actors_movies`
--

CREATE TABLE `actors_movies` (
  `actor_id` int(10) UNSIGNED NOT NULL,
  `movie_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `directors`
--

CREATE TABLE `directors` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `directors_movies`
--

CREATE TABLE `directors_movies` (
  `director_id` int(10) UNSIGNED NOT NULL,
  `movie_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2018_02_24_031625_create_production_companies_table', 1),
(4, '2018_02_24_031627_create_movies_table', 1),
(5, '2018_02_24_031628_create_directors_table', 1),
(6, '2018_02_24_031629_create_directors_movies', 1),
(7, '2018_02_24_031630_create_movies_production_companies_table', 1),
(8, '2018_02_24_183737_create_actors_table', 1),
(9, '2018_02_24_183738_create_actors_movies_table', 1),
(10, '2018_02_24_184631_create_suppliers_table', 1),
(11, '2018_02_24_190220_create_movies_suppliers_table', 1),
(12, '2018_02_24_202726_create_theatre_complexes_table', 1),
(13, '2018_02_24_204701_create_theatres_table', 1),
(14, '2018_02_24_212421_create_run_dates_table', 1),
(15, '2018_02_24_212529_create_show_times_table', 1),
(16, '2018_02_24_225510_create_reservations_table', 1),
(17, '2018_02_24_230741_create_reviews_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `running_time` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `plot_synopsis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `movies_production_companies`
--

CREATE TABLE `movies_production_companies` (
  `movie_id` int(10) UNSIGNED NOT NULL,
  `production_company_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `movies_suppliers`
--

CREATE TABLE `movies_suppliers` (
  `movie_id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `production_companies`
--

CREATE TABLE `production_companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `showing_id` int(10) UNSIGNED NOT NULL,
  `number_of_tickets` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `movie_id` int(10) UNSIGNED NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `run_dates`
--

CREATE TABLE `run_dates` (
  `movie_id` int(10) UNSIGNED NOT NULL,
  `theatre_complex_id` int(10) UNSIGNED NOT NULL,
  `run_start_date` date NOT NULL,
  `run_end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `show_times`
--

CREATE TABLE `show_times` (
  `id` int(10) UNSIGNED NOT NULL,
  `movie_id` int(10) UNSIGNED NOT NULL,
  `theatre_id` int(10) UNSIGNED NOT NULL,
  `theatre_complex_id` int(10) UNSIGNED NOT NULL,
  `showing_start_time` datetime NOT NULL,
  `num_seats_avail` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apt_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `theatres`
--

CREATE TABLE `theatres` (
  `id` int(10) UNSIGNED NOT NULL,
  `max_num_seats` int(11) NOT NULL,
  `screen_size` int(11) NOT NULL,
  `theatre_complex_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `theatre_complexes`
--

CREATE TABLE `theatre_complexes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit_card_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit_card_exp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apt_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `actors_movies`
--
ALTER TABLE `actors_movies`
  ADD PRIMARY KEY (`actor_id`,`movie_id`),
  ADD KEY `actors_movies_movie_id_foreign` (`movie_id`);

--
-- Indexes for table `directors`
--
ALTER TABLE `directors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `directors_movies`
--
ALTER TABLE `directors_movies`
  ADD PRIMARY KEY (`director_id`,`movie_id`),
  ADD KEY `directors_movies_movie_id_foreign` (`movie_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies_production_companies`
--
ALTER TABLE `movies_production_companies`
  ADD PRIMARY KEY (`movie_id`,`production_company_id`),
  ADD KEY `movies_production_companies_production_company_id_foreign` (`production_company_id`);

--
-- Indexes for table `movies_suppliers`
--
ALTER TABLE `movies_suppliers`
  ADD PRIMARY KEY (`movie_id`,`supplier_id`),
  ADD KEY `movies_suppliers_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `production_companies`
--
ALTER TABLE `production_companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservations_user_id_foreign` (`user_id`),
  ADD KEY `reservations_showing_id_foreign` (`showing_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`user_id`,`movie_id`),
  ADD KEY `reviews_movie_id_foreign` (`movie_id`);

--
-- Indexes for table `run_dates`
--
ALTER TABLE `run_dates`
  ADD PRIMARY KEY (`movie_id`,`theatre_complex_id`),
  ADD KEY `run_dates_theatre_complex_id_foreign` (`theatre_complex_id`);

--
-- Indexes for table `show_times`
--
ALTER TABLE `show_times`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `showing_id` (`movie_id`,`theatre_id`,`theatre_complex_id`,`showing_start_time`),
  ADD KEY `show_times_theatre_id_foreign` (`theatre_id`),
  ADD KEY `show_times_theatre_complex_id_foreign` (`theatre_complex_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theatres`
--
ALTER TABLE `theatres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `theatres_theatre_complex_id_foreign` (`theatre_complex_id`);

--
-- Indexes for table `theatre_complexes`
--
ALTER TABLE `theatre_complexes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actors`
--
ALTER TABLE `actors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `directors`
--
ALTER TABLE `directors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `production_companies`
--
ALTER TABLE `production_companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `show_times`
--
ALTER TABLE `show_times`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `theatres`
--
ALTER TABLE `theatres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `theatre_complexes`
--
ALTER TABLE `theatre_complexes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `actors_movies`
--
ALTER TABLE `actors_movies`
  ADD CONSTRAINT `actors_movies_actor_id_foreign` FOREIGN KEY (`actor_id`) REFERENCES `actors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `actors_movies_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `directors_movies`
--
ALTER TABLE `directors_movies`
  ADD CONSTRAINT `directors_movies_director_id_foreign` FOREIGN KEY (`director_id`) REFERENCES `directors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `directors_movies_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `movies_production_companies`
--
ALTER TABLE `movies_production_companies`
  ADD CONSTRAINT `movies_production_companies_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `movies_production_companies_production_company_id_foreign` FOREIGN KEY (`production_company_id`) REFERENCES `production_companies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `movies_suppliers`
--
ALTER TABLE `movies_suppliers`
  ADD CONSTRAINT `movies_suppliers_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `movies_suppliers_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_showing_id_foreign` FOREIGN KEY (`showing_id`) REFERENCES `show_times` (`id`),
  ADD CONSTRAINT `reservations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `run_dates`
--
ALTER TABLE `run_dates`
  ADD CONSTRAINT `run_dates_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `run_dates_theatre_complex_id_foreign` FOREIGN KEY (`theatre_complex_id`) REFERENCES `theatre_complexes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `show_times`
--
ALTER TABLE `show_times`
  ADD CONSTRAINT `show_times_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `show_times_theatre_complex_id_foreign` FOREIGN KEY (`theatre_complex_id`) REFERENCES `theatre_complexes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `show_times_theatre_id_foreign` FOREIGN KEY (`theatre_id`) REFERENCES `theatres` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `theatres`
--
ALTER TABLE `theatres`
  ADD CONSTRAINT `theatres_theatre_complex_id_foreign` FOREIGN KEY (`theatre_complex_id`) REFERENCES `theatre_complexes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;