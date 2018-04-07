-- ## Cart Controller ###############################
------ store ---------------------------------------
insert into `carts` (`user_id`, `showing_id`, `run_date_id`, `number_of_tickets`, `updated_at`, `created_at`) values ($user_id, $showing_id, $run_date_id, $number_of_tickets, $updated_at, $created_at)

------ show ---------------------------------------
select *, `temp`.`id` as `cart_id` from `carts` as `temp` inner join `show_times` on `temp`.`showing_id` = `show_times`.`id` inner join `run_dates` on `temp`.`run_date_id` = `run_dates`.`id` where `temp`.`user_id` = $id


-- ## Director Controller #############################
------ index ---------------------------------------
select * from `directors`

------ show ---------------------------------------
select * from `directors` where `directors`.`id` = $id

------ delete ---------------------------------------
delete from `directors` where `id` = $id

----- store ---------------------------------------
insert into `directors` (`first_name`, `last_name`) values ($first_name, $last_name)

-- ## Movie Controller ################################
----- playing ---------------------------------------
select `movies`.`id` as `id`, `movies`.`running_time` as `running_time`, `movies`.`rating` as `rating`, `movies`.`plot_synopsis` as `plot_synopsis`, `movies`.`director_id`, `movies`.`prod_comp_id`, `movies`.`supplier_id`, `run_dates`.`theatre_complex_id`, `movies`.`title` as `title` from `movies` inner join `run_dates` on `movies`.`id` = `run_dates`.`movie_id` where date(`run_start_date`) < $current_time and date(`run_end_date`) >= $current_time

----- reviews -----------------------------------------
select * from `movies`

------ write_review -----------------------------------
insert into `reviews` (`user_id`, `movie_id`, `review`) values ($user_id, $movie_id, $review)

------ public show ------------------------------------
-- reviews
select * from `reviews` inner join `users` on `reviews`.`user_id` = `users`.`id`
-- movie
select `movies`.`title` as `movie_title`, `movies`.`running_time`, `movies`.`rating`, `movies`.`plot_synopsis`, `production_companies`.`name` as `prod_comp_name`, `suppliers`.`name` as `supplier_name`, `movies`.`id` as `movie_id`, `directors`.`first_name` as `director_first_name`, `directors`.`last_name` as `director_last_name` from `movies` inner join `directors` on `movies`.`director_id` = `directors`.`id` inner join `production_companies` on `movies`.`prod_comp_id` = `production_companies`.`id` inner join `suppliers` on `movies`.`supplier_id` = `suppliers`.`id` where `movies`.`id` = $movie_id

----- index ---------------------------------------
select * from `movies`

----- create ---------------------------------------
-- movies
select * from `movies`
-- directors
select * from `directors`
-- production_companies
select * from `production_companies`
-- suppliers
select * from `suppliers`

----- edit ---------------------------------------
-- movies
select * from `movies` where `movies`.`id` = $id
-- directors
select * from `directors`
-- production_companies
select * from `production_companies`
-- suppliers
select * from `suppliers`

------ delete ---------------------------------------
delete from `movies` where `id` = $id

----- update ---------------------------------------
update `movies` set `title` = $title, `running_time` = $running_time, `rating` = $rating, `plot_synopsis` = $plot_synopsis, `director_id` = $director_id, `prod_comp_id` = $prod_comp_id, `supplier_id` = $supplier_id where id=$movie_id

----- store ---------------------------------------
insert into `movies` (`title`, `running_time`, `rating`, `plot_synopsis`, `director_id`, `prod_comp_id`, `supplier_id`) values ($title, $running_time, $rating, $plot_synopsis, $director_id, $prod_comp_id, $supplier_id)

-- ## ProductionCompany Controller ################################
-- index ---------------------------------------
select * from `production_companies`

-- edit ---------------------------------------
select * from `production_companies` where `production_companies`.`id` = $id

-- destroy ---------------------------------------
delete from `production_companies` where `id` = $id

-- update ---------------------------------------
update `production_companies` set `name` = $name where id = $id

-- store ---------------------------------------
insert into `movies` (`name`) values ($name)

-- ## Purchase Controller ################################
-- index ---------------------------------------
select `reservations`.`id` as `reservation_id`, `user_id`, `reservations`.`number_of_tickets`, `show_times`.`showing_start_time`, `show_times`.`run_date_id`, `run_dates`.`movie_id`, `title` as `movie_title` from `reservations` inner join `show_times` on `reservations`.`showing_id` = `show_times`.`id` inner join `run_dates` on `run_date_id` = `run_dates`.`id` inner join `movies` on `movie_id` = `movies`.`id` where `user_id` = $user_id and date(`show_times`.`showing_start_time`) > $current_time

-- create ---------------------------------------
select * from `movies`

-- destroy ---------------------------------------
delete from `reservations` where `id` = $id

-- rentals ---------------------------------------
select `reservations`.`id` as `reservation_id`, `user_id`, `reservations`.`number_of_tickets`, `show_times`.`showing_start_time`, `show_times`.`run_date_id`, `run_dates`.`movie_id`, `title` as `movie_title` from `reservations` inner join `show_times` on `reservations`.`showing_id` = `show_times`.`id` inner join `run_dates` on `run_date_id` = `run_dates`.`id` inner join `movies` on `movie_id` = `movies`.`id` where `user_id` = $user_id and date(`show_times`.`showing_start_time`) < $current_time

-- store ---------------------------------------
-- insert the reservation
insert into `reservations` (`user_id`, `showing_id`, `number_of_tickets`) values ($user_id, $showing_id, $number_of_tickets)
-- decrement the number of seats available
update `show_times` set `num_seats_avail` = `num_seats_avail` - $number_of_tickets where `show_times`.`id` = $showing_id
-- find the item from the users shopping cart that has been added to reservations
select * from `carts` where `carts`.`id` = $cart_id
-- delete the confirmed reservation
delete from `carts` where `id` = $cart_id

-- movie_stats ---------------------------------------
select movie_id, title, sum(number_of_tickets) as sum_num_tickets from `reservations` as `temp` inner join `show_times` on `temp`.`showing_id` = `show_times`.`id` inner join `run_dates` on `run_date_id` = `run_dates`.`id` inner join `movies` on `movie_id` = `movies`.`id` group by movie_id order by `sum_num_tickets` desc

-- complex_stats ---------------------------------------
select theatre_complex_id, name, sum(number_of_tickets) as sum_num_tickets from `reservations` as `temp` inner join `show_times` on `temp`.`showing_id` = `show_times`.`id` inner join `run_dates` on `run_date_id` = `run_dates`.`id` inner join `theatre_complexes` on `theatre_complex_id` = `theatre_complexes`.`id` group by theatre_complex_id order by `sum_num_tickets` desc

-- ## RunDate Controller ################################
-- index ----------------------------------------
select * from `run_dates`
-- edit -----------------------------------------
select * from `run_dates` where `run_dates`.`id` = $id
-- destroy --------------------------------------
delete from `run_dates` where `id` = $id
-- update ---------------------------------------
update `run_dates` set `movie_id` = $movie_id, `theatre_complex_id` = $theatre_complex_id, `run_start_date` = $run_start_date, `run_end_date` = $run_end_date where id=$id
-- store ----------------------------------------
insert into `run_dates` (`movie_id`, `theatre_complex_id`, `run_start_date`, `run_end_date`) values ($movie_id, $theatre_complex_id, $run_start_date, $run_end_date)

-- ## ShowTime Controller ################################
-- index ----------------------------------------
-- create ---------------------------------------
-- edit -----------------------------------------
-- destroy --------------------------------------
-- update ---------------------------------------
-- store ----------------------------------------

-- ## Supplier Controller ################################
-- index ----------------------------------------
-- create ---------------------------------------
-- edit -----------------------------------------
-- destroy --------------------------------------
-- update ---------------------------------------
-- store ----------------------------------------

-- ## Theatre Controller ################################
-- public_index ----------------------------------------
-- public_show ---------------------------------------
-- index ----------------------------------------
-- create ---------------------------------------
-- edit -----------------------------------------
-- destroy --------------------------------------
-- update ---------------------------------------
-- store ----------------------------------------

-- ## TheatreComplex Controller ################################
-- index ----------------------------------------
-- create ---------------------------------------
-- edit -----------------------------------------
-- destroy --------------------------------------
-- update ---------------------------------------
-- store ----------------------------------------

-- ## User Controller ################################
-- index ----------------------------------------
-- show ----------------------------------------
-- edit -----------------------------------------
-- update ---------------------------------------
-- destroy --------------------------------------
-- create ---------------------------------------
-- store ----------------------------------------

-- ## UserManagement Controller ################################
-- index ----------------------------------------
-- create ---------------------------------------
-- store ----------------------------------------
-- edit -----------------------------------------
-- update ---------------------------------------
-- destroy --------------------------------------
-- purchase_history ----------------------------------------