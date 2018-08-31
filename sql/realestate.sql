-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 31, 2018 at 06:25 PM
-- Server version: 5.7.19
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
-- Database: `realestate`
--

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

DROP TABLE IF EXISTS `properties`;
CREATE TABLE IF NOT EXISTS `properties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `contact_phone` varchar(255) NOT NULL,
  `property_type` varchar(255) NOT NULL,
  `property_for` varchar(255) NOT NULL,
  `development` varchar(255) NOT NULL,
  `bed_room` varchar(255) NOT NULL,
  `bath_room` varchar(255) NOT NULL,
  `air_conditioning` varchar(255) NOT NULL,
  `condition_id` tinyint(3) NOT NULL,
  `width` decimal(9,2) NOT NULL,
  `length` decimal(9,2) NOT NULL,
  `floor` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `township` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `price` decimal(9,2) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image_names` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `first_name`, `last_name`, `contact_phone`, `property_type`, `property_for`, `development`, `bed_room`, `bath_room`, `air_conditioning`, `condition_id`, `width`, `length`, `floor`, `address`, `township`, `state`, `price`, `description`, `image_names`) VALUES
(19, 'Zay Yar', 'Tun', '09972115006', 'Condominium', 'For Rent or Sale', 'Naing Grou', '3', '3', '4', 4, '36.00', '50.00', '4', 'No-26, Jalan Panti 6, Taman Bukit Tiram, 81800 Ulu Tiram', 'Bahan', 'Johor', '700.00', 'No description', 'house_1a.jpg, house_2b.jpg, house_4.jpg'),
(20, 'Kyawt', 'San', '09795377019', 'Mini-Condominium', 'For Rent', 'Naing', '3', '3', '3', 3, '35.00', '40.00', '4', 'No-26, Jalan Panti 6, Taman Bukit Tiram, 81800 Ulu Tiram', 'Johor Bahru', 'Johor', '244.00', 'Non', 'house_2a.jpg, house_8.jpg'),
(21, 'Daw Shwe ', 'MI', '0998234567', 'Apartment', 'For Sale', 'Mother land', '0', '1', '1', 2, '15.00', '60.00', '6', 'No-26, Jalan Panti 6, Taman Bukit Tiram, 81800 Ulu Tiram', 'Johor Bahru', 'Johor', '400.00', 'NON', 'house_1a_1.jpg'),
(22, 'U Soe', 'Nyunt', '0992345678', 'Apartment', 'For Rent', 'Tawwin Construction', '0', '1', '1', 4, '25.00', '60.00', '3', 'No-26, Jalan Panti 6, Taman Bukit Tiram, 81800 Ulu Tiram', 'Johor Bahru', 'Johor', '450.00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa cupiditate delectus hic impedit necessitatibus officiis pariatur repellendus rerum, sequi velit.', 'house_7.jpg'),
(23, 'Daw Ameena', 'Bi', '093456543', 'Mini-Condominium', 'For Sale', 'Naing Group', '2', '1', '1', 4, '20.00', '30.00', '2', 'No-26, Jalan Panti 6, Taman Bukit Tiram, 81800 Ulu Tiram', 'Johor Bahru', 'Johor', '340.00', 'NON', 'house_3a.jpg, house_6.jpg'),
(24, 'U Soe', 'Min', '099345678', 'Mini-Condominium', 'For Rent', 'Mother land', '1', '1', '1', 3, '25.00', '55.00', '5', 'No. 105, Thukha Road', 'Hlaing', 'Yangon', '550.00', 'A very nice place with lovely view with the evening sun on your face.', 'house_4_1.jpg, house_7_1.jpg, house_9.jpg'),
(25, 'Zay Yar', 'Nyunt', '0104135275', 'Condominium', 'For Rent', 'Naing yadanar', '3', '3', '4', 3, '0.00', '60.00', '5', 'No-26, Jalan Panti 6, Taman Bukit Tiram, 81800 Ulu Tiram', 'Bahan', 'Johor', '900.00', 'asdf', 'house_6_1.jpg, house_8_1.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
