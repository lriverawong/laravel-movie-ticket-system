-- === 
-- Insert database values; migrations and sample data.
-- ===
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
(1, 'Mission Impossible', '120', 'PG', 'Tom Cruise is on a mission', '6', '1', '20'),
(2, 'Mission Impossible 2', '220', 'R', 'Tom Cruise is back on a mission', '7', '1', '60'),
(3, 'Finding Nemo', '100', 'G', 'A dad fish looses his son and must find him', '6', '1', '20');

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
('4', '3', '3', '2018-04-14', '2018-04-21'),
('5', '1', '3', '2018-04-07', '2018-04-15');

-- Show Times
INSERT INTO `show_times` (`id`, `theatre_id`, `showing_start_time`, `num_seats_avail`, `run_date_id`) VALUES
('1', '55', '2018-03-07 19:30:00', '10', '1'),
('2', '90', '2018-03-17 13:30:00', '50', '2'),
('3', '55', '2018-04-01 15:00:00', '20', '3'),
('4', '90', '2018-04-14 13:00:00', '60', '4'),
('5', '90', '2018-04-08 19:00:00', '3', '5');

-- Reservations
INSERT INTO `reservations` (`id`, `user_id`, `showing_id`, `number_of_tickets`) VALUES 
('30', '1', '1', '3'),
('99', '1', '2', '6');

-- Reviews
INSERT INTO `reviews` (`user_id`, `movie_id`, `review`, `created_at`, `updated_at`) VALUES
('1', '3', 'sad movie...', '2018-03-17 00:00:00', '2018-03-18 00:00:00'),
('1', '1', 'bang bang bang pow', '2018-03-02 00:00:00', '2018-03-02 00:00:00');