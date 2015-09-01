
-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 06 Μάη 2014 στις 23:14:01
-- Έκδοση διακομιστή: 5.6.16
-- Έκδοση PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Βάση δεδομένων: `astirDB`
--

-- --------------------------------------------------------

--
-- Στημένη δομή για προβολή `average_salary`
--
CREATE TABLE IF NOT EXISTS `average_salary` (
`name` varchar(25)
,`avg(e.salary)` decimal(14,4)
);
-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `at` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `postalcode` int(11) NOT NULL,
  `city` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ccn` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`customer_id`),
  UNIQUE KEY `at` (`at`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Άδειασμα δεδομένων του πίνακα `customers`
--

INSERT INTO `customers` (`customer_id`, `at`, `name`, `surname`, `street`, `number`, `postalcode`, `city`, `ccn`) VALUES
(1, 'AB234567', 'Maria', 'Apostolaki', 'Zois', 4, 17788, 'Athens', '123456789'),
(2, 'AB586894', 'Venia', 'Dikaiou', 'Kapodistri', 17, 17777, 'Athens', '125777895'),
(3, 'AB456983', 'Panagiotis', 'Danasis', 'Xagis', 55, 25814, 'Lamia', '285886895292'),
(4, 'AB5869358', 'Manos', 'Vasilas', 'Elpidas', 7, 17798, 'Chios', '258475212598148'),
(5, 'AB234098', 'Nikos', 'Takis', 'Xaras', 5, 12365, 'Karditsa', '25824185');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `customer_phone`
--

CREATE TABLE IF NOT EXISTS `customer_phone` (
  `customer_id` int(11) NOT NULL,
  `phone_number` char(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`customer_id`,`phone_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `customer_phone`
--

INSERT INTO `customer_phone` (`customer_id`, `phone_number`) VALUES
(1, '2102588763'),
(2, '2109677784'),
(3, '6958962478'),
(4, '6925874596'),
(5, '6987775364');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `ssn` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `postalcode` int(11) NOT NULL,
  `city` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `salary` int(11) NOT NULL,
  PRIMARY KEY (`employee_id`),
  UNIQUE KEY `ssn` (`ssn`),
  KEY `hotel_id` (`hotel_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Άδειασμα δεδομένων του πίνακα `employees`
--

INSERT INTO `employees` (`employee_id`, `ssn`, `name`, `surname`, `street`, `number`, `postalcode`, `city`, `hotel_id`, `start_date`, `end_date`, `salary`) VALUES
(1, '0987574832', 'George', 'Panagiotou', 'Vasileos', 6, 12365, 'Athens', 1, '2014-05-01', NULL, 500),
(2, '1235698745', 'Maria', 'Manou', 'Mukonou', 1, 123455, 'Athens', 1, '2014-03-04', '2014-05-21', 1000),
(3, '123432', 'Miltos', 'Panou', 'Alkminis', 12, 23372, 'Chios', 5, '2012-05-05', '2014-10-08', 1500),
(4, '163737792', 'Martha', 'Kara', 'Venizelou', 33, 12344, 'Mukonos', 7, '2013-09-16', '2014-10-09', 1200),
(5, '1273247212', 'Nicolas', 'Katzakis', 'Mina', 333, 12345, 'Patra', 3, '2014-05-10', NULL, 500),
(6, '1234567891', 'Marina', 'Aggelakou', 'Periopis', 12, 89789, 'Karditsa', 6, '2013-03-03', NULL, 1200),
(7, '1234567893', 'Maria', 'Tolia', 'Drossou', 1, 12345, 'Athens', 2, '2010-05-11', NULL, 1500),
(8, '123456789', 'Eugenia', 'Riza', 'Peukis', 37, 15679, 'Athens', 2, '2012-11-05', NULL, 790),
(9, '7896579008', 'Dora', 'Zaxou', 'Thermon', 87, 98844, 'Athens', 2, '2013-05-01', NULL, 2000);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `employee_phone`
--

CREATE TABLE IF NOT EXISTS `employee_phone` (
  `employee_id` int(11) NOT NULL,
  `phone_number` char(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`employee_id`,`phone_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `employee_phone`
--

INSERT INTO `employee_phone` (`employee_id`, `phone_number`) VALUES
(1, '6932659847'),
(2, '6985471236'),
(3, '6958476936'),
(4, '6958475412'),
(5, '6958475869'),
(6, '6958474512'),
(7, '6958475869'),
(8, '6958475869'),
(9, '6958451258');

-- --------------------------------------------------------

--
-- Στημένη δομή για προβολή `high_salaries`
--
CREATE TABLE IF NOT EXISTS `high_salaries` (
`name` varchar(10)
,`surname` varchar(10)
,`salary` int(11)
);
-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `hotels`
--

CREATE TABLE IF NOT EXISTS `hotels` (
  `hotel_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `postalcode` int(11) NOT NULL,
  `city` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `rate` tinyint(4) NOT NULL,
  `construction_year` year(4) NOT NULL,
  `renovation_year` year(4) DEFAULT NULL,
  PRIMARY KEY (`hotel_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Άδειασμα δεδομένων του πίνακα `hotels`
--

INSERT INTO `hotels` (`hotel_id`, `name`, `street`, `number`, `postalcode`, `city`, `rate`, `construction_year`, `renovation_year`) VALUES
(1, 'Maria_Plaza', 'Vouliagmen', 19, 16677, 'Athens', 4, 2000, 2010),
(2, 'Venia_Palace', 'Poseidonos', 7, 16675, 'Athens', 4, 2007, NULL),
(3, 'Panos_Place', 'Stadiou', 22, 13244, 'Athens', 3, 1980, 2010),
(4, 'Rose_Apartments', 'Metaxa', 122, 12432, 'Patra', 2, 2000, 2012),
(5, 'Alkmini', 'Alkminis', 21, 12376, 'Irakleio', 5, 2010, NULL),
(6, 'Achileas', 'Sofokleous', 22, 63257, 'Mukonos', 3, 1990, 2013),
(7, 'Dionisis_Palace', 'Laodikis', 3, 13245, 'Lamia', 1, 1975, 2005);

--
-- Δείκτες `hotels`
--
DROP TRIGGER IF EXISTS `Insert_room`;
DELIMITER //
CREATE TRIGGER `Insert_room` AFTER INSERT ON `hotels`
	FOR EACH ROW BEGIN
		INSERT INTO rooms VALUES (new.hotel_id,100,'simple',new.rate*50);
		INSERT INTO rooms VALUES (new.hotel_id,200,'deluxe',new.rate*70);
		INSERT INTO rooms VALUES (new.hotel_id,300,'suite',new.rate*100);	 
   	END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `Update_rating`;
DELIMITER //
CREATE TRIGGER `Update_rating` BEFORE UPDATE ON `hotels`
	FOR EACH ROW BEGIN
		UPDATE rooms SET rooms.price=(1+(new.rate-old.rate)*0.2)*rooms.price WHERE new.hotel_id=rooms.hotel_id;    
   	END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `hotel_phone`
--

CREATE TABLE IF NOT EXISTS `hotel_phone` (
  `hotel_id` int(11) NOT NULL,
  `phone_number` char(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`hotel_id`,`phone_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `hotel_phone`
--

INSERT INTO `hotel_phone` (`hotel_id`, `phone_number`) VALUES
(1, '2101224569'),
(2, '2109677732'),
(3, '2105678874'),
(4, '2210235467'),
(5, '2810230241'),
(6, '2310987612'),
(7, '2410563487');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `hotel_service`
--

CREATE TABLE IF NOT EXISTS `hotel_service` (
  `hotel_id` int(11) NOT NULL,
  `service` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`hotel_id`,`service`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `hotel_service`
--

INSERT INTO `hotel_service` (`hotel_id`, `service`) VALUES
(1, 'Gym'),
(1, 'Spa'),
(1, 'Wifi'),
(2, 'Gym'),
(2, 'Spa'),
(2, 'Wifi'),
(3, 'Gym'),
(3, 'Wifi'),
(4, 'Wifi'),
(5, 'Golf'),
(5, 'Gym'),
(5, 'Spa'),
(5, 'Wifi'),
(6, 'Gym'),
(7, 'Wifi');

-- --------------------------------------------------------

--
-- Στημένη δομή για προβολή `luxury_hotels`
--
CREATE TABLE IF NOT EXISTS `luxury_hotels` (
`name` varchar(25)
,`rate` tinyint(4)
);
-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `reservations`
--

CREATE TABLE IF NOT EXISTS `reservations` (
  `reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `reservation_date` date NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `payment_method` enum('cash','credit card','check') COLLATE utf8_unicode_ci DEFAULT 'cash',
  `customer_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `room_number` int(11) NOT NULL,
  PRIMARY KEY (`reservation_id`),
  KEY `customer_id` (`customer_id`),
  KEY `hotel_id` (`hotel_id`),
  KEY `room_number` (`room_number`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Άδειασμα δεδομένων του πίνακα `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `reservation_date`, `start_date`, `end_date`, `payment_method`, `customer_id`, `hotel_id`, `room_number`) VALUES
(1, '2014-03-03', '2014-03-18', '2014-03-27', 'credit card', 1, 1, 101),
(2, '2014-05-01', '2014-05-04', '2014-05-07', 'cash', 2, 5, 501),
(3, '2013-09-02', '2013-10-01', '2013-10-10', 'check', 3, 5, 100),
(4, '2013-09-08', '2013-09-24', '2013-10-01', 'credit card', 4, 6, 102),
(5, '2014-04-07', '2014-05-17', '2014-05-26', 'credit card', 5, 7, 100),
(6, '2014-01-01', '2014-01-02', '2014-01-05', 'cash', 5, 2, 200);

--
-- Δείκτες `reservations`
--
DROP TRIGGER IF EXISTS `Upgrade_to_VIP`;
DELIMITER //
CREATE TRIGGER `Upgrade_to_VIP` BEFORE INSERT ON `reservations`
	FOR EACH ROW BEGIN
		IF (2 = (SELECT count(*) FROM reservations WHERE new.customer_id=reservations.customer_id ))
		THEN
			INSERT INTO vip VALUES (new.customer_id,10);
		END IF;
		IF (5 = (SELECT count(*) FROM reservations WHERE new.customer_id=reservations.customer_id ))
		THEN
			DELETE FROM vip WHERE customer_id=new.customer_id; 
			INSERT INTO vip VALUES (new.customer_id,20);	
		END IF;
   	END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `hotel_id` int(11) NOT NULL,
  `numder` int(11) NOT NULL,
  `type` enum('simple','deluxe','suite') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'simple',
  `price` int(11) NOT NULL,
  PRIMARY KEY (`hotel_id`,`numder`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `rooms`
--

INSERT INTO `rooms` (`hotel_id`, `numder`, `type`, `price`) VALUES
(1, 200, 'deluxe', 150),
(1, 300, 'suite', 250),
(2, 200, 'deluxe', 290),
(2, 300, 'suite', 350),
(5, 200, 'deluxe', 250),
(5, 300, 'suite', 500),
(6, 100, 'simple', 100),
(7, 100, 'simple', 40);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `vip`
--

CREATE TABLE IF NOT EXISTS `vip` (
  `customer_id` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `vip`
--

INSERT INTO `vip` (`customer_id`, `discount`) VALUES
(3, 10),
(4, 10);

-- --------------------------------------------------------

--
-- Δομή για προβολή `average_salary`
--
DROP TABLE IF EXISTS `average_salary`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `average_salary` AS (SELECT `h`.`name` AS `name`,avg(`e`.`salary`) AS `avg(e.salary)` FROM (`hotels` `h` JOIN `employees` `e`) WHERE (`h`.`hotel_id` = `e`.`hotel_id`) GROUP BY `h`.`hotel_id`);

-- --------------------------------------------------------

--
-- Δομή για προβολή `high_salaries`
--
DROP TABLE IF EXISTS `high_salaries`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `high_salaries` AS SELECT `employees`.`name` AS `name`,`employees`.`surname` AS `surname`,`employees`.`salary` AS `salary` FROM `employees` WHERE (`employees`.`salary` > 1400);

-- --------------------------------------------------------

--
-- Δομή για προβολή `luxury_hotels`
--
DROP TABLE IF EXISTS `luxury_hotels`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `luxury_hotels` AS SELECT `hotels`.`name` AS `name`,`hotels`.`rate` AS `rate` FROM `hotels` WHERE (`hotels`.`rate` > 3);

--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `customer_phone`
--
ALTER TABLE `customer_phone`
  ADD CONSTRAINT `customer_phone_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Περιορισμοί για πίνακα `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`hotel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Περιορισμοί για πίνακα `employee_phone`
--
ALTER TABLE `employee_phone`
  ADD CONSTRAINT `employee_phone_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Περιορισμοί για πίνακα `hotel_phone`
--
ALTER TABLE `hotel_phone`
  ADD CONSTRAINT `hotel_phone_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`hotel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Περιορισμοί για πίνακα `hotel_service`
--
ALTER TABLE `hotel_service`
  ADD CONSTRAINT `hotel_service_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`hotel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Περιορισμοί για πίνακα `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`hotel_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Περιορισμοί για πίνακα `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`hotel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Περιορισμοί για πίνακα `vip`
--
ALTER TABLE `vip`
  ADD CONSTRAINT `vip_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
