-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 18, 2023 at 10:40 AM
-- Server version: 5.6.13
-- PHP Version: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gamex`
--
CREATE DATABASE IF NOT EXISTS `gamex` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gamex`;

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `game` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `game`, `price`, `image`) VALUES
(1, 'Assassins Creed Valhalla', '10', 'assassins-creed-valhalla.jpg'),
(2, 'Diablo', '10', 'diablo.jpg'),
(3, 'Fortnite', '10', 'game-fortnite.jpg'),
(4, 'God of War', '10', 'god-of-war.jpg'),
(5, 'Grand Theft Auto', '10', 'grand-theft-auto.jpg'),
(6, 'Joker Batman', '10', 'joker-batman.jpg'),
(7, 'Fifa', '10', 'kylian-fifa.jpg'),
(8, 'League of Legends', '10', 'league-of-legends.jpg'),
(9, 'Modern Warfare 2', '10', 'modern-warfare-2.jpg'),
(10, 'Mortal Kombat', '10', 'mortal-kombat.jpg'),
(11, 'Need for Speed', '10', 'need-for-speed.jpg'),
(12, 'PUBG', '10', 'pubg.jpg'),
(13, 'Resident Evil', '10', 'resident-evil.jpg'),
(14, 'Spider Man', '10', 'spider-man.jpg'),
(15, 'Street Fighter', '10', 'street-fighter.jpg'),
(16, 'The Witcher 3 Wild Hunt', '10', 'the-witcher-3-wild-hunt.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `game` varchar(255) NOT NULL,
  `quantity` int(50) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user`, `game`, `quantity`, `date`) VALUES
(1, '3', 'Diablo', 2, '2023-05-03'),
(2, '1', 'Street Fighter', 40, '2023-05-30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user`, `password`, `role`) VALUES
(1, 'administrator1', 'administrator1', 'administrator'),
(2, 'customer2', 'customer2', 'customer'),
(3, 'customer1', 'customer1', 'customer'),
(4, 'administrator2', 'administrator2', 'administrator');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
