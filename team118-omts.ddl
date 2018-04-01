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
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
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
  `director_id` int(10) UNSIGNED NOT NULL,
  `prod_comp_id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(10) UNSIGNED NOT NULL
  PRIMARY KEY (`id`)
);

CREATE TABLE `directors` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
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
  `theatre_num` varchar(255) NOT NULL,
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
(31, '2014_10_12_000000_create_users_table', 1),
(32, '2014_10_12_100000_create_password_resets_table', 1),
(33, '2018_02_24_031625_create_production_companies_table', 1),
(34, '2018_02_24_031627_create_movies_table', 1),
(35, '2018_02_24_031628_create_directors_table', 1),
(36, '2018_02_24_183737_create_actors_table', 1),
(37, '2018_02_24_183738_create_actors_movies_table', 1),
(38, '2018_02_24_184631_create_suppliers_table', 1),
(39, '2018_02_24_202726_create_theatre_complexes_table', 1),
(40, '2018_02_24_204701_create_theatres_table', 1),
(41, '2018_02_24_212421_create_run_dates_table', 1),
(42, '2018_02_24_212529_create_show_times_table', 1),
(43, '2018_02_24_225510_create_reservations_table', 1),
(44, '2018_02_24_230741_create_reviews_table', 1),
(45, '2018_03_29_170630_add_foreign_keys_to_movies', 1);

-- Roles
INSERT INTO `roles` (`id`, `title`) VALUES ('1', 'admin'), ('2', 'user');

-- Users
INSERT INTO `users` (`id`, `role_id`, `first_name`, `last_name`, `email`, `password`, `phone_num`, `credit_card_num`, `credit_card_exp`, `apt_num`, `street_num`, `street_name`, `city`, `province`, `country`, `postal_code`,`remember_token`, `created_at`, `updated_at`) VALUES 
('1', '1', 'John', 'Smith', 'johnsmith@gmail.com', '12345678', '5555555555', '1234567890123456', '0421', '43', '644', 'Johnson St.', 'Kingston', 'Ontario', 'Canada', 'K7K4S1', NULL, '2018-03-03 05:23:18', '2018-03-03 17:41:50'),
('2', '2', 'Jack', 'Jones', 'jackjonesh@gmail.com', '12345678', '5555551234', '9999999999999999', '0522', '', '633', 'Princess St.', 'Kingston', 'Ontario', 'Canada', 'K7K4S2', NULL, '2018-03-04 05:23:18', '2018-03-04 17:41:50');

-- Production Companies
INSERT INTO `production_companies` (`id`, `name`) VALUES ('1', 'MGM');

-- Suppliers
INSERT INTO `suppliers` (`id`, `name`, `phone_num`, `contact_first_name`, `contact_last_name`, `apt_num`, `street_num`, `street_name`, `city`, `province`, `country`, `postal_code`) VALUES 
('20', 'Some Supplier', '1234567788', 'Mike', 'Will Make Money', '', '55', 'Some Street', 'Some City Name', 'Quebec', 'Canada', 'H8G1J0'), 
('60', 'BestSupplier', '7894561122', 'Micheal', 'Li', '89', '88', 'JayZ Drive', 'Ottawa', 'Ontario', 'Canada', 'K9F1H6');

-- Directors
INSERT INTO `directors` (`id`, `first_name`, `last_name`) VALUES 
('6', 'Jason', 'Bourne'),
('7', 'John', 'Wick');

-- Movies
INSERT INTO `movies` (`id`, `title`, `running_time`, `rating`, `plot_synopsis`, `director_id`, `prod_comp_id`, `supplier_id`) VALUES
(1, 'Mission Impossible', '120', '10', 'Tom Cruise is on a mission', '6', '1', '20'),
(2, 'Mission Impossible 2', '220', '1', 'Tom Cruise is back on a mission', '7', '1', '60'),
(3, 'Finding Nemo', '100', '9', 'A dad fish looses his son and must find him', '6', '1', '20');

-- Actors
INSERT INTO `actors` (`id`, `first_name`, `last_name`) VALUES
('3', 'Dory', 'Fish'),
('6', 'Stacy', 'Jones');

-- Actors-Movies
INSERT INTO `actors_movies` (`actor_id`, `movie_id`) VALUES 
('3', '1'),
('3', '3'),
('6', '2'),
('6', '1');


-- Theatre Complexes
INSERT INTO `theatre_complexes` (`id`, `name`, `phone_num`, `street_num`, `street_name`, `city`, `province`, `country`, `postal_code`) VALUES 
(1, 'KelownaScreens', '222222222', '123', 'main street', 'Kelowna', 'BC', 'Canada', 'V1B4Z1'),
(2, 'KingstonScreens', '33333333', '543', 'cherry street', 'Kingston', 'ON', 'Canada', 'K4X8H2'),
(3, 'VancouverScreens', '44444444', '723', 'bloop street', 'Vancouver', 'BC', 'Canada', 'M2R7Z9'),
(4, 'TorontoScreens', '55555555', '742', 'bleep street', 'Toronto', 'ON', 'Canada', 'M9K8J4');

-- Theatres
INSERT INTO `theatres` (`id`, `theatre_num`, `max_num_seats`, `screen_size`, `theatre_complex_id`) VALUES 
('55', '1', '200', '20', '1'),
('90', '2','150', '15', '2');

-- Run Dates
INSERT INTO `run_dates` (`id`, `movie_id`, `theatre_complex_id`, `run_start_date`, `run_end_date`) VALUES 
('1', '3', '2', '2018-03-01', '2018-03-16'),
('2', '2', '4', '2018-03-16', '2018-03-22'),
('3', '2', '2', '2018-03-31', '2018-04-14'),
('4', '3', '3', '2018-04-14', '2018-04-21');

-- Show Times
INSERT INTO `show_times` (`id`, `theatre_id`, `showing_start_time`, `num_seats_avail`, `run_date_id`) VALUES
('1', '55', '2018-03-07 19:30:00', '10', '1'),
('2', '90', '2018-03-17 13:30:00', '50', '2'),
('3', '55', '2018-04-01 15:00:00', '20', '3'),
('4', '90', '2018-04-14 13:00:00', '60', '4');

-- Reservations
INSERT INTO `reservations` (`id`, `user_id`, `showing_id`, `number_of_tickets`) VALUES 
('30', '1', '1', '3'),
('99', '1', '2', '6');

-- Reviews
INSERT INTO `reviews` (`user_id`, `movie_id`, `review`, `created_at`, `updated_at`) VALUES
('1', '3', 'sad movie...', '2018-03-17 00:00:00', '2018-03-18 00:00:00'),
('1', '1', 'bang bang bang pow', '2018-03-02 00:00:00', '2018-03-02 00:00:00');