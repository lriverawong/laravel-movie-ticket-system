create database team3;
use team3;


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
    KEY `actors_movies_movie_id_foreign` (`movie_id`)
);

CREATE TABLE `carts` (
    `id` int(10) UNSIGNED NOT NULL,
    `user_id` int(10) UNSIGNED NOT NULL,
    `showing_id` int(10) UNSIGNED NOT NULL,
    `run_date_id` int(10) UNSIGNED NOT NULL,
    `number_of_tickets` int(11) NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `carts_user_id_foreign` (`user_id`),
    KEY `carts_showing_id_foreign` (`showing_id`),
    KEY `carts_run_date_id_foreign` (`run_date_id`)
);



CREATE TABLE `directors` (
    `id` int(10) UNSIGNED NOT NULL,
    `first_name` varchar(255) NOT NULL,
    `last_name` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
);


CREATE TABLE `migrations` (
    `id` int(10) UNSIGNED NOT NULL,
    `migration` varchar(255) NOT NULL,
    `batch` int(11) NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE `movies` (
    `id` int(10) UNSIGNED NOT NULL,
    `title` varchar(255) NOT NULL,
    `running_time` int(11) NOT NULL,
    `rating` varchar(255) NOT NULL,
    `plot_synopsis` text NOT NULL,
    `director_id` int(10) UNSIGNED DEFAULT NULL,
    `prod_comp_id` int(10) UNSIGNED DEFAULT NULL,
    `supplier_id` int(10) UNSIGNED DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `movies_director_id_foreign` (`director_id`),
    KEY `movies_prod_comp_id_foreign` (`prod_comp_id`),
    KEY `movies_supplier_id_foreign` (`supplier_id`)
);

CREATE TABLE `password_resets` (
    `email` varchar(255) NOT NULL,
    `token` varchar(255) NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    KEY `password_resets_email_index` (`email`)
);


CREATE TABLE `production_companies` (
    `id` int(10) UNSIGNED NOT NULL,
    `name` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
);


CREATE TABLE `reservations` (
    `id` int(10) UNSIGNED NOT NULL,
    `user_id` int(10) UNSIGNED DEFAULT NULL,
    `showing_id` int(10) UNSIGNED DEFAULT NULL,
    `number_of_tickets` int(10) UNSIGNED NOT NULL,
    PRIMARY KEY (`id`),
    KEY `reservations_user_id_foreign` (`user_id`),
    KEY `reservations_showing_id_foreign` (`showing_id`)
);

CREATE TABLE `reviews` (
    `user_id` int(10) UNSIGNED NOT NULL,
    `movie_id` int(10) UNSIGNED NOT NULL,
    `review` text NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`user_id`,`movie_id`),
    KEY `reviews_movie_id_foreign` (`movie_id`)
);


CREATE TABLE `roles` (
    `id` int(10) UNSIGNED NOT NULL,
    `title` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
);


CREATE TABLE `run_dates` (
    `id` int(10) UNSIGNED NOT NULL,
    `movie_id` int(10) UNSIGNED NOT NULL,
    `theatre_complex_id` int(10) UNSIGNED NOT NULL,
    `run_start_date` date NOT NULL,
    `run_end_date` date NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `run_dates_movie_id_theatre_complex_id_unique` (`movie_id`,`theatre_complex_id`),
    KEY `run_dates_theatre_complex_id_foreign` (`theatre_complex_id`)
);


CREATE TABLE `show_times` (
    `id` int(10) UNSIGNED NOT NULL,
    `theatre_id` int(10) UNSIGNED NOT NULL,
    `showing_start_time` datetime NOT NULL,
    `num_seats_avail` int(10) UNSIGNED NOT NULL,
    `run_date_id` int(10) UNSIGNED NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `showing_id` (`theatre_id`,`showing_start_time`,`run_date_id`),
    KEY `show_times_run_date_id_foreign` (`run_date_id`)
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

CREATE TABLE `theatres` (
    `id` int(10) UNSIGNED NOT NULL,
    `theatre_num` varchar(255) NOT NULL,
    `max_num_seats` int(11) NOT NULL,
    `screen_size` int(11) NOT NULL,
    `theatre_complex_id` int(10) UNSIGNED NOT NULL,
    PRIMARY KEY (`id`),
    KEY `theatres_theatre_complex_id_foreign` (`theatre_complex_id`)
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



CREATE TABLE `users` (
    `id` int(10) UNSIGNED NOT NULL,
    `role_id` int(10) UNSIGNED NOT NULL DEFAULT '2',
    `first_name` varchar(255) NOT NULL,
    `last_name` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `phone_num` varchar(255) NOT NULL,
    `credit_card_num` varchar(255) NOT NULL DEFAULT '',
    `credit_card_exp` varchar(255) NOT NULL DEFAULT '',
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
    UNIQUE KEY `users_email_unique` (`email`),
    KEY `users_role_id_foreign` (`role_id`)
);

-- ############################################################## --

INSERT INTO `actors` (`id`, `first_name`, `last_name`) VALUES
(3, 'Dory', 'Fish'),
(6, 'Stacy', 'Jones');



INSERT INTO `actors_movies` (`actor_id`, `movie_id`) VALUES
(3, 1),
(6, 1),
(6, 2),
(3, 3);


INSERT INTO `carts` (`id`, `user_id`, `showing_id`, `run_date_id`, `number_of_tickets`, `created_at`, `updated_at`) VALUES
(1, 4, 4, 4, 1, '2018-04-06 14:37:26', '2018-04-06 14:37:26');


INSERT INTO `directors` (`id`, `first_name`, `last_name`) VALUES
(6, 'Jason', 'Bourne'),
(7, 'John', 'Wick'),
(8, 'Tony', 'Stark');



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



INSERT INTO `movies` (`id`, `title`, `running_time`, `rating`, `plot_synopsis`, `director_id`, `prod_comp_id`, `supplier_id`) VALUES
(1, 'Mission Impossible', 120, 'PG', 'Tom Cruise is on a mission yeehaw', 6, 1, 20),
(2, 'Mission Impossible 2', 220, 'R', 'Tom Cruise is back on a mission', 7, 1, 60),
(3, 'Finding Nemo', 100, 'G', 'A dad fish looses his son and must find him', 6, 1, 20),
(4, 'Bobs Burgers', 64, 'R', 'its burger time', 8, 2, 61),
(5, 'Ready player one', 120, 'R', 'You are in a video game! WOW!', 8, 2, 61),
(7, 'Black Panther', 180, 'PG', 'Black panther is a super hero movie', 7, 1, 60);



INSERT INTO `production_companies` (`id`, `name`) VALUES
(1, 'MGM'),
(2, 'TMG');



INSERT INTO `reservations` (`id`, `user_id`, `showing_id`, `number_of_tickets`) VALUES
(30, 4, 1, 3),
(99, 4, 2, 6),
(100, 4, 4, 3),
(101, 3, 5, 3),
(102, 3, 5, 1),
(103, 1, 4, 2),
(104, 1, 5, 2),
(105, 6, 5, 1),
(106, 6, 5, 2),
(108, 7, 5, 1),
(109, 7, 4, 2);


INSERT INTO `reviews` (`user_id`, `movie_id`, `review`, `created_at`, `updated_at`) VALUES
(1, 1, 'bang bang bang pow', '2018-03-02 00:00:00', '2018-03-02 00:00:00'),
(1, 3, 'sad movie...', '2018-03-17 00:00:00', '2018-03-18 00:00:00'),
(7, 3, 'Great movie!', '2018-04-04 00:00:00', '2018-04-04 00:00:00');



INSERT INTO `roles` (`id`, `title`) VALUES
(1, 'admin'),
(2, 'user');


INSERT INTO `run_dates` (`id`, `movie_id`, `theatre_complex_id`, `run_start_date`, `run_end_date`) VALUES
(1, 3, 2, '2018-03-01', '2018-03-16'),
(2, 2, 4, '2018-03-16', '2018-03-22'),
(3, 2, 2, '2018-03-31', '2018-04-14'),
(4, 3, 3, '2018-04-14', '2018-04-21'),
(5, 1, 3, '2018-04-07', '2018-04-15'),
(10, 7, 7, '2018-03-02', '2018-04-18'),
(11, 5, 5, '2018-03-19', '2018-04-19'),
(13, 5, 7, '2018-03-28', '2018-04-20');



INSERT INTO `show_times` (`id`, `theatre_id`, `showing_start_time`, `num_seats_avail`, `run_date_id`) VALUES
(1, 55, '2018-03-06 19:30:00', 10, 1),
(2, 90, '2018-03-17 13:30:00', 50, 2),
(3, 55, '2018-04-01 15:00:00', 20, 3),
(4, 90, '2018-04-14 13:00:00', 60, 4),
(5, 90, '2018-03-08 19:00:00', 3, 5),
(7, 95, '2018-04-04 00:00:00', 55, 4),
(8, 97, '2018-03-27 00:00:00', 32, 11);


INSERT INTO `suppliers` (`id`, `name`, `phone_num`, `contact_first_name`, `contact_last_name`, `apt_num`, `street_num`, `street_name`, `city`, `province`, `country`, `postal_code`) VALUES
(20, 'Some Supplier', '1234567788', 'Mike', 'Will Make Money', '', '55', 'Some Street', 'Some City Name', 'Quebec', 'Canada', 'H8G1J0'),
(60, 'BestSupplier', '7894561122', 'Micheal', 'Li', '89', '88', 'JayZ Drive', 'Ottawa', 'Ontario', 'Canada', 'K9F1H6'),
(61, 'QSupplier', '89867655', 'Quentin', 'Jones', '', '23', 'Big srt', 'Edmonton', 'AB', 'Canada', 'K9K4S');


INSERT INTO `theatres` (`id`, `theatre_num`, `max_num_seats`, `screen_size`, `theatre_complex_id`) VALUES
(55, '1', 200, 20, 1),
(90, '2', 150, 15, 2),
(91, '3A', 400, 500, 5),
(93, '3B', 3, 4, 5),
(95, '4A', 90, 88, 7),
(97, '4B', 799, 800, 7),
(99, '5A', 999, 8000, 4);



INSERT INTO `theatre_complexes` (`id`, `name`, `phone_num`, `street_num`, `street_name`, `city`, `province`, `country`, `postal_code`) VALUES
(1, 'KelownaScreens', '222222222', '123', 'main street', 'Kelowna', 'BC', 'Canada', 'V1B4Z1'),
(2, 'KingstonScreens', '33333333', '543', 'cherry street', 'Kingston', 'ON', 'Canada', 'K4X8H2'),
(3, 'VancouverScreens', '44444444', '723', 'bloop street', 'Vancouver', 'BC', 'Canada', 'M2R7Z9'),
(4, 'TorontoScreens', '55555555', '742', 'bleep street', 'Toronto', 'ON', 'Canada', 'M9K8J4'),
(5, 'testScreens', '98778966', '159', 'Pinegrove', 'Vernon', 'BC', 'Canada', 'V3B9C2'),
(7, 'PentictonScreens', '65465465', '982', 'Blank', 'Street', 'AB', 'Canada', 'B8Y3D');



INSERT INTO `users` (`id`, `role_id`, `first_name`, `last_name`, `email`, `password`, `phone_num`, `credit_card_num`, `credit_card_exp`, `apt_num`, `street_num`, `street_name`, `city`, `province`, `country`, `postal_code`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'John', 'Smith', 'johnsmith@gmail.com', '12345678', '5555555555', '1234567890123456', '0421', '43', '644', 'Johnson St.', 'Kingston', 'Ontario', 'Canada', 'K7K4S1', NULL, '2018-03-03 05:23:18', '2018-03-03 17:41:50'),
(2, 2, 'Jack', 'Jones', 'jackjonesh@gmail.com', '12345678', '5555551234', '9999999999999999', '0522', '', '633', 'Princess St.', 'Kingston', 'Ontario', 'Canada', 'K7K4S2', NULL, '2018-03-04 05:23:18', '2018-03-04 17:41:50'),
(3, 1, '2450IW1M4h', 'jaUKGoJTS4', 'tester1@gmail.com', '$2y$10$2w3.yi/igxXxiTHUO7nIjuU1X6GJrI7gIFtMTRl2SZnbUSdhYUKfm', 'OixsCrAfU4', 'Diq5MMpXyx', 'bryLPrakPk', '2h12Tw8YnF', 'rXD7A67WpV', 'Q8dl8tWwre', 'fvIh8821T1', 'Ia3rf2H3BP', 'jl6r4gKEeY', 'aC9d0YHryz', 'yjlgRtVKQYoRfeKsBkmqpsIlqy3ngmzUhZ1EemJ4OTuMdMA6FhLZTJw6gGfA', '2018-04-02 01:05:42', '2018-04-02 01:05:42'),
(4, 2, 'RIvICRjaBH', 'tE68e2kHiH', 'tester2@gmail.com', '$2y$10$t8/DUtaiN3chww8dvBS0net0.ybVna3RX8eO6ZH6DshH7SHyDdQyG', 'Hxsa6zLoY8', 'iurLIjIxx8', 'wCBWxmdXR9', 'dPl96KvpR4', 'jK5IzhBAFW', '7b6bGsYSQm', 'Qq7XfrNzf3', 'M996Gox4GJ', 'rvbrxOC6ee', 'OiFDQ96AJ1', '2dpkm1dqu73F7dRZlhIL2B4RIpH7GJNiT0C2l9IzUwMbrVH0z7WDptSmVXwy', '2018-04-02 01:05:42', '2018-04-02 01:05:42'),
(6, 2, 'Bob', 'Billy', 'bob@gmail.com', '$2y$10$C8CJ.yF8Q2XOnO.Jvu4hqOepeH6KdO5PUCwwWeiVnyvHgp5obxWxC', '2508643851', '9999999999999', '1212', '', '24', 'br street', 'Toronto', 'ON', 'Canada', 'K7L 4A6', 'dQGhd1wufkaUdx0DtpCGGzclGxhKVa5YiyIYetnHQBl6VWtdy66O1qZ702sJ', '2018-04-02 10:46:46', '2018-04-02 10:47:38'),
(7, 2, 'Curtis', 'Miller', 'Kdog@gmail.com', '$2y$10$kHBek7GCm6jby/ma2tyIZe8tBieFW1T.Tkxd2dkpl4S.pBQlNJMl.', '9999999', '12345678', '1221', '', '22', 'borg street', 'Vernon', 'BC', 'Canada', 'v9xb5w', '9PX4a28xeFX2HIqb9MN4HuSQkcGL7zGwPsEgNgMyY0hWAL9OFFSeDN7pYFls', '2018-04-02 11:45:41', '2018-04-02 11:45:54'),
(8, 2, 'Bobby', 'Jones', 'bobby@gmail.com', '$2y$10$hNAuvf02lklAqS9KMLK/R.V1WHvcvrAd8HUUpf6h9ntc4PemF/YLe', '6565676', '65543234', '543342', '', '11', 'Pinegrove', 'Kelown', 'BC', 'Canada', 'V8WI2K', 'jW0FjdbJBFKnYKKxXcO9wGcfR9y8rLjrOOOBIDrgdHTEgtZp3l2fG82yeIXW', '2018-04-02 13:09:20', '2018-04-02 13:09:20');
