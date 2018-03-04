-- === 
-- Create the tables.
-- ===

CREATE DATABASE IF NOT EXISTS `team118-omts`; 
USE `team118-omts`;

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_num` varchar(255) NOT NULL,
  `credit_card_num` varchar(255) NOT NULL,
  `credit_card_exp` varchar(255) NOT NULL,
  `apt_num` varchar(255) NOT NULL,
  `street_num` varchar(255) NOT NULL,
  `street_name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
);

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
);

CREATE TABLE `production_companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `movies` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `running_time` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `plot_synopsis` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
);

CREATE TABLE `directors` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `directors_movies` (
  `director_id` int(10) UNSIGNED NOT NULL,
  `movie_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`director_id`,`movie_id`),
  FOREIGN KEY (`director_id`) REFERENCES `directors` (`id`) ON DELETE CASCADE,
  FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE
);

CREATE TABLE `movies_production_companies` (
  `movie_id` int(10) UNSIGNED NOT NULL,
  `production_company_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`movie_id`,`production_company_id`),
  FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE,
  FOREIGN KEY (`production_company_id`) REFERENCES `production_companies` (`id`) ON DELETE CASCADE
);

CREATE TABLE `actors` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `actors_movies` (
  `actor_id` int(10) UNSIGNED NOT NULL,
  `movie_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`actor_id`,`movie_id`),
  FOREIGN KEY (`actor_id`) REFERENCES `actors` (`id`) ON DELETE CASCADE,
  FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE
);

CREATE TABLE `suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_num` varchar(255) NOT NULL,
  `contact_first_name` varchar(255) NOT NULL,
  `contact_last_name` varchar(255) NOT NULL,
  `apt_num` varchar(255) NOT NULL,
  `street_num` varchar(255) NOT NULL,
  `street_name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `movies_suppliers` (
  `movie_id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`movie_id`,`supplier_id`),
  FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE,
  FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE
);

CREATE TABLE `theatre_complexes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_num` varchar(255) NOT NULL,
  `street_num` varchar(255) NOT NULL,
  `street_name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `theatres` (
  `id` int(10) UNSIGNED NOT NULL,
  `max_num_seats` int(11) NOT NULL,
  `screen_size` int(11) NOT NULL,
  `theatre_complex_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`theatre_complex_id`) REFERENCES `theatre_complexes` (`id`) ON DELETE CASCADE
);

CREATE TABLE `run_dates` (
  `movie_id` int(10) UNSIGNED NOT NULL,
  `theatre_complex_id` int(10) UNSIGNED NOT NULL,
  `run_start_date` date NOT NULL,
  `run_end_date` date NOT NULL,
  PRIMARY KEY (`movie_id`,`theatre_complex_id`),
  FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE,
  FOREIGN KEY (`theatre_complex_id`) REFERENCES `theatre_complexes` (`id`) ON DELETE CASCADE
);

CREATE TABLE `show_times` (
  `id` int(10) UNSIGNED NOT NULL,
  `movie_id` int(10) UNSIGNED NOT NULL,
  `theatre_id` int(10) UNSIGNED NOT NULL,
  `theatre_complex_id` int(10) UNSIGNED NOT NULL,
  `showing_start_time` datetime NOT NULL,
  `num_seats_avail` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `showing_id` (`movie_id`,`theatre_id`,`theatre_complex_id`,`showing_start_time`),
  FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE,
  FOREIGN KEY (`theatre_complex_id`) REFERENCES `theatre_complexes` (`id`) ON DELETE CASCADE,
  FOREIGN KEY (`theatre_id`) REFERENCES `theatres` (`id`) ON DELETE CASCADE
);

CREATE TABLE `reservations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `showing_id` int(10) UNSIGNED NOT NULL,
  `number_of_tickets` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`showing_id`) REFERENCES `show_times` (`id`),
  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
);

CREATE TABLE `reviews` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `movie_id` int(10) UNSIGNED NOT NULL,
  `review` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`,`movie_id`),
  FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE,
  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
);

-- === 
-- Insert database values; migrations and sample data.
-- ===
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

INSERT INTO `users` VALUES
