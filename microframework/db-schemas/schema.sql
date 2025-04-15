DROP TABLE IF EXISTS `movie`;

CREATE TABLE `movie` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `plot` varchar(1200) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `director` varchar(255) NOT NULL,
  `rating` float DEFAULT NULL,
  `poster` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
);
