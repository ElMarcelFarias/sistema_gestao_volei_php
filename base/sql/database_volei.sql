CREATE DATABASE volei_database;
USE volei_database;

CREATE TABLE `users` (
    `id_users` int(11) NOT NULL,
    `user_name` varchar(255) NOT NULL,
    `password` char(32) NOT NULL
);

ALTER TABLE `users`
    ADD PRIMARY KEY(`id_users`);

ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT;


CREATE TABLE `players` (
    `id_players` int(11) NOT NULL,
    `name` varchar(255) NOT NULL,
    `cpf` varchar(14) not NULL,
    `zipcode` varchar(9),
    `city` varchar(255),
    `neighborhood` varchar(255),
    `street` varchar(255), 
    `number` int(4),
    `gender` char(1),
    `birthdate` date,
    `height` varchar(4),
    `status` char(1)
);

ALTER TABLE `players`
    ADD PRIMARY KEY(`id_players`);

ALTER TABLE `players`
  MODIFY `id_players` int(11) NOT NULL AUTO_INCREMENT;


CREATE TABLE `stadium` (
    `id_stadium` int(11) NOT NULL,
    `stadium_name` varchar(255) NOT NULL,
    `zipcode` varchar(9) NOT NULL,
    `city` varchar(255) NOT NULL,
    `neighborhood` varchar(255) NOT NULL,
    `street` varchar(255) NOT NULL, 
    `number` int(4) NOT NULL,
    `price1hr` decimal(15,2) NOT NULL,
    `status` char(1)
);

ALTER TABLE `stadium`
    ADD PRIMARY KEY(`id_stadium`);

ALTER TABLE `stadium`
  MODIFY `id_stadium` int(11) NOT NULL AUTO_INCREMENT;
  

CREATE TABLE `games` (
    `id_game` int(11) NOT NULL,
    `game_duration` int(1) NOT NULL,
    `id_stadiumfk` int(11) NOT NULL,
    `id_playersfk` int(11) NOT NULL,
    `quantity_peaple` int(11) NOT NULL,
    `price` decimal(15,2) NOT NULL,
    `game_date` date NOT NULL,
    `payment` varchar(30) NOT NULL,
    `status` char(1) NOT NULL,
    `judge_name` varchar(255)
);

ALTER TABLE `games` 
    ADD PRIMARY KEY (`id_game`),
    ADD KEY `fk_games_id_stadiumfk_idx` (`id_stadiumfk`),
    ADD KEY `fk_games_id_playersfk_idx` (`id_playersfk`);

ALTER TABLE `games`
  MODIFY `id_game` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `games`
    ADD CONSTRAINT `fk_games_id_stadiumfk_idx` FOREIGN KEY (`id_stadiumfk`) REFERENCES `stadium` (`id_stadium`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    ADD CONSTRAINT `fk_games_id_playersfk_idx` FOREIGN KEY (`id_playersfk`) REFERENCES `players` (`id_players`) ON DELETE NO ACTION ON UPDATE NO ACTION;

INSERT INTO users  (`user_name`, `password`) VALUES ('Marcel', 'c4ca4238a0b923820dcc509a6f75849b');
INSERT INTO users  (`user_name`, `password`) VALUES ('Ester', 'c4ca4238a0b923820dcc509a6f75849b');

