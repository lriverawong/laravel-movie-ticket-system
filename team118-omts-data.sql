-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Apr 02, 2018 at 05:12 PM
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

--
-- Dumping data for table `directors`
--

INSERT INTO `directors` (`id`, `first_name`, `last_name`) VALUES
(1, 'John', 'Wick'),
(2, 'Jason', 'Bourne'),
(3, 'Mike', 'WillMake'),
(4, 'Quentin', 'Pet');

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

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `running_time`, `rating`, `plot_synopsis`, `director_id`, `prod_comp_id`, `supplier_id`) VALUES
(1, 'The Bourne', 78, 'PG', 'He runs fast.', 2, 1, 2),
(2, 'Black Panther', 90, 'R', 'Super hero movie - bang.', 4, 2, 1),
(3, 'Mission Impossible', 60, 'PG', 'He climbs towers.', 1, 1, 1),
(4, 'Finding Nemo', 50, 'G', 'Movie about fish.', 3, 1, 1);

--
-- Dumping data for table `production_companies`
--

INSERT INTO `production_companies` (`id`, `name`) VALUES
(1, 'MGM'),
(2, 'IGN');

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `user_id`, `showing_id`, `number_of_tickets`) VALUES
(1, 2, 1, 10),
(2, 2, 2, 8);

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`) VALUES
(1, 'admin'),
(2, 'user');

--
-- Dumping data for table `run_dates`
--

INSERT INTO `run_dates` (`id`, `movie_id`, `theatre_complex_id`, `run_start_date`, `run_end_date`) VALUES
(1, 2, 1, '2018-03-18', '2018-03-24'),
(2, 4, 1, '2018-03-25', '2018-03-31'),
(3, 3, 2, '2018-04-01', '2018-04-07'),
(4, 1, 2, '2018-04-08', '2018-04-14'),
(5, 2, 3, '2018-03-18', '2018-03-24'),
(6, 2, 4, '2018-03-25', '2018-04-28');

--
-- Dumping data for table `show_times`
--

INSERT INTO `show_times` (`id`, `theatre_id`, `showing_start_time`, `num_seats_avail`, `run_date_id`) VALUES
(1, 1, '2018-03-19 16:00:00', 100, 1),
(2, 2, '2018-03-26 10:00:00', 50, 2);

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `phone_num`, `contact_first_name`, `contact_last_name`, `apt_num`, `street_num`, `street_name`, `city`, `province`, `country`, `postal_code`) VALUES
(1, 'ASupplier', '23456789', 'John', 'Smith', '13', '456789', 'Mack St.', 'Kingston', 'ON', 'Canada', 'K8H9L0'),
(2, 'AnotherSupplier', '3456789', 'Lillie', 'Pet', '56789', '456', 'Princess St.', 'Ottawa', 'ON', 'Canada', 'F9J5B7');

--
-- Dumping data for table `theatres`
--

INSERT INTO `theatres` (`id`, `theatre_num`, `max_num_seats`, `screen_size`, `theatre_complex_id`) VALUES
(1, '1A', 50, 80, 1),
(2, '1B', 56, 89, 1),
(3, '2A', 100, 80, 2),
(4, '2B', 78, 56, 2),
(5, '3A', 89, 58, 3),
(6, '3B', 45, 37, 3),
(7, '4A', 60, 89, 4),
(8, '4B', 48, 39, 4);

--
-- Dumping data for table `theatre_complexes`
--

INSERT INTO `theatre_complexes` (`id`, `name`, `phone_num`, `street_num`, `street_name`, `city`, `province`, `country`, `postal_code`) VALUES
(1, 'Complex1', '456789', '4567', 'AStreet St.', 'Kelowna', 'BC', 'Canada', 'H0F5K8'),
(2, 'Complex2', '23457890', '67890', 'Princess St.', 'Kingston', 'ON', 'Canada', 'K9J4D7'),
(3, 'Complex3', '567890', '4579', 'Johnson St.', 'Ottawa', 'ON', 'Canada', 'K9H5D7'),
(4, 'Complex4', '21345678', '5678', 'Clearfield Crescent', 'Toronto', 'ON', 'Canada', 'J8G7F0');

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `first_name`, `last_name`, `email`, `password`, `phone_num`, `credit_card_num`, `credit_card_exp`, `apt_num`, `street_num`, `street_name`, `city`, `province`, `country`, `postal_code`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'GSfWywseqO', 'QAiwVKM01G', 'tester1@gmail.com', '$2y$10$vyXHpEjKpN14zfBXiiWEc.ss.cRH6i027Fv.1d7F.Z8cNceHYTn3q', '8HVQtLlcWg', 'ASpn1qwUSC', 'IWfl7jo5VV', '9xkXxmNAR1', 'RwndmQaKB0', 'hwR1tXrHaD', 'I0CjwhWYVc', 'B3rQiQEKA1', 'ujcxBk2u1K', 'jpwmXhOLxX', NULL, '2018-04-02 12:50:21', '2018-04-02 12:50:21'),
(2, 2, 'T2UHrRbQD6', 'j3p0OpFFiH', 'tester2@gmail.com', '$2y$10$iXyAM1F42BCiwPFcBpLO.elXJXlZeHUZs18/u3j0PRUdVz4M6Qlyi', 'OxCqCcKIUY', 'dZLOfLlnPg', 'dQoSRgIHzj', 'JLruNPVevi', 'O7LWYJvLgX', 'HJgcnw5RRl', '6wC7AfTcmo', 'D0fedCcdti', '0AlAslevJ0', 'J1rGTy9vkO', NULL, '2018-04-02 12:50:22', '2018-04-02 12:50:22');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
