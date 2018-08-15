-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 15, 2018 at 11:37 PM
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
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_subject_id` (`subject_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `subject_id`, `image_path`) VALUES
(1, 1, 'house_1a.jpg'),
(2, 1, 'house_1b.jpg'),
(3, 1, 'house_1c.jpg'),
(4, 2, 'house_2a.jpg'),
(5, 2, 'house_2b.jpg'),
(6, 2, 'house_2c.jpg'),
(7, 3, 'house_3a.jpg'),
(8, 3, 'house_3b.jpg'),
(9, 3, 'house_3c.jpg'),
(10, 4, 'house_4.jpg'),
(11, 5, 'house_5.jpg'),
(12, 6, 'house_6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

DROP TABLE IF EXISTS `properties`;
CREATE TABLE IF NOT EXISTS `properties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `development` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `township` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `property_type` varchar(255) NOT NULL,
  `floor` varchar(255) NOT NULL,
  `width` decimal(9,2) NOT NULL,
  `length` decimal(9,2) NOT NULL,
  `bed_room` int(11) NOT NULL,
  `bath_room` int(11) NOT NULL,
  `air_conditioning` varchar(255) NOT NULL,
  `price` decimal(9,2) NOT NULL,
  `features` varchar(255) NOT NULL,
  `condition_id` tinyint(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `description`, `development`, `state`, `township`, `street`, `property_type`, `floor`, `width`, `length`, `bed_room`, `bath_room`, `air_conditioning`, `price`, `features`, `condition_id`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At delectus facere molestiae', 'Naing Group', 'Yangon', 'Kandawlay', 'Pansoda', 'Condo', '1st Floor', '25.00', '60.00', 3, 2, 'Yes', '300000.00', 'Feature are written here', 3),
(2, 'nobis vero. Ducimus itaque maiores molestias necessitatibus odio officiis voluptates! Assumenda beatae blanditiis consequuntur enim recusandae similique vel.', 'Mother Land Group', 'Yangon', 'Tamwe', 'Tamwe Road', 'Mini-Condo', '5st Floor', '45.00', '100.00', 3, 3, 'Yes', '650000.00', 'Feature are written here', 2),
(3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aliquid aspernatur assumenda consequuntur cupiditate dolorem eligendi est', 'Father Land Group', 'Yangon', 'Bahan', 'Bahan Road', 'Mini-Condo', '4st Floor', '45.00', '100.00', 3, 3, 'Yes', '650000.00', 'Feature are written here', 5),
(4, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis facilis hic iusto labore laudantium minus ', 'GrandFather Land Group', 'Yangon', 'Hlain', 'Hlain Road', 'Condo', '5th Floor', '45.00', '100.00', 3, 3, 'Yes', '650000.00', 'Feature are written here', 3),
(5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae ducimus', 'Yadanar Myaing Construction', 'Yangon', 'Kyauktada', 'Frazer Road', 'Condo', '11th Floor', '60.00', '100.00', 5, 5, 'Yes', '1050000.00', 'Feature are written here', 4),
(6, 'earum expedita iure non quae qui quidem, repudiandae rerum saepe!', 'FMI', 'Yangon', 'Hlain', 'Hlain Road', 'Condo', '5th Floor', '45.00', '100.00', 3, 3, 'Yes', '150000.00', 'Feature are written here', 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
