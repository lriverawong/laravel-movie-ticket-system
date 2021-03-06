-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Apr 02, 2018 at 02:57 AM
-- Server version: 5.7.21
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

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`id`, `first_name`, `last_name`) VALUES
(3, 'Dory', 'Fish'),
(6, 'Stacy', 'Jones');

-- --------------------------------------------------------

--
-- Table structure for table `actors_movies`
--

CREATE TABLE `actors_movies` (
  `actor_id` int(10) UNSIGNED NOT NULL,
  `movie_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `actors_movies`
--

INSERT INTO `actors_movies` (`actor_id`, `movie_id`) VALUES
(3, 1),
(6, 1),
(6, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `showing_id` int(10) UNSIGNED NOT NULL,
  `run_date_id` int(10) UNSIGNED NOT NULL,
  `number_of_tickets` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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

--
-- Dumping data for table `directors`
--

INSERT INTO `directors` (`id`, `first_name`, `last_name`) VALUES
(6, 'Jason', 'Bourne'),
(7, 'John', 'Wick');

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
(1, '2014_10_11_000000_create_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2018_02_24_031625_create_production_companies_table', 1),
(5, '2018_02_24_031627_create_movies_table', 1),
(6, '2018_02_24_031628_create_directors_table', 1),
(7, '2018_02_24_183737_create_actors_table', 1),
(8, '2018_02_24_183738_create_actors_movies_table', 1),
(9, '2018_02_24_184631_create_suppliers_table', 1),
(10, '2018_02_24_202726_create_theatre_complexes_table', 1),
(11, '2018_02_24_204701_create_theatres_table', 1),
(12, '2018_02_24_212421_create_run_dates_table', 1),
(13, '2018_02_24_212529_create_show_times_table', 1),
(14, '2018_02_24_225510_create_reservations_table', 1),
(15, '2018_02_24_230741_create_reviews_table', 1),
(16, '2018_03_29_170630_add_foreign_keys_to_movies', 1),
(17, '2018_04_01_155604_create_carts_table', 1);

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
  `director_id` int(10) UNSIGNED DEFAULT NULL,
  `prod_comp_id` int(10) UNSIGNED DEFAULT NULL,
  `supplier_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `running_time`, `rating`, `plot_synopsis`, `director_id`, `prod_comp_id`, `supplier_id`) VALUES
(1, 'Mission Impossible', 120, 10, 'Tom Cruise is on a mission', 6, 1, 20),
(2, 'Mission Impossible 2', 220, 1, 'Tom Cruise is back on a mission', 7, 1, 60),
(3, 'Finding Nemo', 100, 9, 'A dad fish looses his son and must find him', 6, 1, 20);

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

--
-- Dumping data for table `production_companies`
--

INSERT INTO `production_companies` (`id`, `name`) VALUES
(1, 'MGM');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `showing_id` int(10) UNSIGNED DEFAULT NULL,
  `number_of_tickets` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `user_id`, `showing_id`, `number_of_tickets`) VALUES
(30, 1, 1, 3),
(99, 1, 2, 6),
(100, 4, 5, 2),
(103, 3, 4, 3),
(104, 3, 5, 1),
(105, 3, 4, 1),
(106, 3, 5, 1);

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

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`user_id`, `movie_id`, `review`, `created_at`, `updated_at`) VALUES
(1, 1, 'bang bang bang pow', '2018-03-02 00:00:00', '2018-03-02 00:00:00'),
(1, 3, 'sad movie...', '2018-03-17 00:00:00', '2018-03-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `run_dates`
--

CREATE TABLE `run_dates` (
  `id` int(10) UNSIGNED NOT NULL,
  `movie_id` int(10) UNSIGNED NOT NULL,
  `theatre_complex_id` int(10) UNSIGNED NOT NULL,
  `run_start_date` date NOT NULL,
  `run_end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `run_dates`
--

INSERT INTO `run_dates` (`id`, `movie_id`, `theatre_complex_id`, `run_start_date`, `run_end_date`) VALUES
(1, 3, 2, '2018-03-01', '2018-03-16'),
(2, 2, 4, '2018-03-16', '2018-03-22'),
(3, 2, 2, '2018-03-31', '2018-04-14'),
(4, 3, 3, '2018-04-14', '2018-04-21'),
(5, 1, 3, '2018-04-07', '2018-04-15');

-- --------------------------------------------------------

--
-- Table structure for table `show_times`
--

CREATE TABLE `show_times` (
  `id` int(10) UNSIGNED NOT NULL,
  `theatre_id` int(10) UNSIGNED NOT NULL,
  `showing_start_time` datetime NOT NULL,
  `num_seats_avail` int(10) UNSIGNED NOT NULL,
  `run_date_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `show_times`
--

INSERT INTO `show_times` (`id`, `theatre_id`, `showing_start_time`, `num_seats_avail`, `run_date_id`) VALUES
(1, 55, '2018-03-07 19:30:00', 10, 1),
(2, 90, '2018-03-17 13:30:00', 50, 2),
(3, 55, '2018-04-01 15:00:00', 20, 3),
(4, 90, '2018-04-14 13:00:00', 60, 4),
(5, 90, '2018-04-08 19:00:00', 3, 5);

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

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `phone_num`, `contact_first_name`, `contact_last_name`, `apt_num`, `street_num`, `street_name`, `city`, `province`, `country`, `postal_code`) VALUES
(20, 'Some Supplier', '1234567788', 'Mike', 'Will Make Money', '', '55', 'Some Street', 'Some City Name', 'Quebec', 'Canada', 'H8G1J0'),
(60, 'BestSupplier', '7894561122', 'Micheal', 'Li', '89', '88', 'JayZ Drive', 'Ottawa', 'Ontario', 'Canada', 'K9F1H6');

-- --------------------------------------------------------

--
-- Table structure for table `theatres`
--

CREATE TABLE `theatres` (
  `id` int(10) UNSIGNED NOT NULL,
  `theatre_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_num_seats` int(11) NOT NULL,
  `screen_size` int(11) NOT NULL,
  `theatre_complex_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `theatres`
--

INSERT INTO `theatres` (`id`, `theatre_num`, `max_num_seats`, `screen_size`, `theatre_complex_id`) VALUES
(55, '1', 200, 20, 1),
(90, '2', 150, 15, 2);

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

--
-- Dumping data for table `theatre_complexes`
--

INSERT INTO `theatre_complexes` (`id`, `name`, `phone_num`, `street_num`, `street_name`, `city`, `province`, `country`, `postal_code`) VALUES
(1, 'KelownaScreens', '222222222', '123', 'main street', 'Kelowna', 'BC', 'Canada', 'V1B4Z1'),
(2, 'KingstonScreens', '33333333', '543', 'cherry street', 'Kingston', 'ON', 'Canada', 'K4X8H2'),
(3, 'VancouverScreens', '44444444', '723', 'bloop street', 'Vancouver', 'BC', 'Canada', 'M2R7Z9'),
(4, 'TorontoScreens', '55555555', '742', 'bleep street', 'Toronto', 'ON', 'Canada', 'M9K8J4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL DEFAULT '2',
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit_card_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `credit_card_exp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `first_name`, `last_name`, `email`, `password`, `phone_num`, `credit_card_num`, `credit_card_exp`, `apt_num`, `street_num`, `street_name`, `city`, `province`, `country`, `postal_code`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'John', 'Smith', 'johnsmith@gmail.com', '12345678', '5555555555', '1234567890123456', '0421', '43', '644', 'Johnson St.', 'Kingston', 'Ontario', 'Canada', 'K7K4S1', NULL, '2018-03-03 05:23:18', '2018-03-03 17:41:50'),
(2, 2, 'Jack', 'Jones', 'jackjonesh@gmail.com', '12345678', '5555551234', '9999999999999999', '0522', '', '633', 'Princess St.', 'Kingston', 'Ontario', 'Canada', 'K7K4S2', NULL, '2018-03-04 05:23:18', '2018-03-04 17:41:50'),
(3, 1, '2TwH7lh4rF', 'ASd8rtViK5', 'tester1@gmail.com', '$2y$10$08LRMRtb1Pyk2kUIqeBsY.dmCLtNt/HlxO5Vt8D.y65.4yVcyslTa', 'p2DnVZqQN4', 'ZGkwWYlpGV', '5HAnMCPbwj', '1G2y6zURHq', '2tYtzG1itZ', '6Hujq7KvEb', 'nenR8pPeCt', 'y1faytCqZh', 'n5nROimAwS', 'kVNw9QawUD', NULL, '2018-04-01 19:26:21', '2018-04-01 19:26:21'),
(4, 2, 'ooSTGPtofk', 'ykYp07WwqG', 'tester2@gmail.com', '$2y$10$NlWtt9B1gx2R442WqrxME.9ZOCPvlaq2QLpcMrUhp/jbDHPft6fPm', '6WMQlAw9kH', '3FVYgM7h1h', '7paVOMDR6t', 'wwCxPZ5Xt3', 'rxTardw5tm', 'RpuKI0ngCu', 'UgTgBfVMFe', 'lwO8mhLLoy', 'U2JMaGWpbp', 'kBxSh9n7u9', 'AfALq42VG1ZP8s84umw9H1BxO7dw4xy4h7yzNVx5mGa8PKd56CLdib7J0bHt', '2018-04-01 19:26:21', '2018-04-01 19:26:21');

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
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_showing_id_foreign` (`showing_id`),
  ADD KEY `carts_run_date_id_foreign` (`run_date_id`);

--
-- Indexes for table `directors`
--
ALTER TABLE `directors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movies_director_id_foreign` (`director_id`),
  ADD KEY `movies_prod_comp_id_foreign` (`prod_comp_id`),
  ADD KEY `movies_supplier_id_foreign` (`supplier_id`);

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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `run_dates`
--
ALTER TABLE `run_dates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `run_dates_movie_id_theatre_complex_id_unique` (`movie_id`,`theatre_complex_id`),
  ADD KEY `run_dates_theatre_complex_id_foreign` (`theatre_complex_id`);

--
-- Indexes for table `show_times`
--
ALTER TABLE `show_times`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `showing_id` (`theatre_id`,`showing_start_time`,`run_date_id`),
  ADD KEY `show_times_run_date_id_foreign` (`run_date_id`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actors`
--
ALTER TABLE `actors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `directors`
--
ALTER TABLE `directors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `production_companies`
--
ALTER TABLE `production_companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `run_dates`
--
ALTER TABLE `run_dates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `show_times`
--
ALTER TABLE `show_times`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `theatres`
--
ALTER TABLE `theatres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `theatre_complexes`
--
ALTER TABLE `theatre_complexes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_run_date_id_foreign` FOREIGN KEY (`run_date_id`) REFERENCES `run_dates` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_showing_id_foreign` FOREIGN KEY (`showing_id`) REFERENCES `show_times` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_director_id_foreign` FOREIGN KEY (`director_id`) REFERENCES `directors` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `movies_prod_comp_id_foreign` FOREIGN KEY (`prod_comp_id`) REFERENCES `production_companies` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `movies_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_showing_id_foreign` FOREIGN KEY (`showing_id`) REFERENCES `show_times` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `reservations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

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
  ADD CONSTRAINT `show_times_run_date_id_foreign` FOREIGN KEY (`run_date_id`) REFERENCES `run_dates` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `show_times_theatre_id_foreign` FOREIGN KEY (`theatre_id`) REFERENCES `theatres` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `theatres`
--
ALTER TABLE `theatres`
  ADD CONSTRAINT `theatres_theatre_complex_id_foreign` FOREIGN KEY (`theatre_complex_id`) REFERENCES `theatre_complexes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
