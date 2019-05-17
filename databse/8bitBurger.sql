-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 16, 2019 at 11:08 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `8bitBurger`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Starters'),
(2, 'Burgers');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `surname`, `email`, `subject`, `message`, `date`) VALUES
(1, 'Corinne', 'Gatt', '', 'hello', 'ok', '0000-00-00 00:00:00'),
(2, 'Alessio', 'Gatt', '', 'wfh', 'ok', '0000-00-00 00:00:00'),
(3, 'corinne', 'gatt', '', 'sdoijfwop', 'sofjw', '0000-00-00 00:00:00'),
(4, '', '', '', '', '', '0000-00-00 00:00:00'),
(5, 'Corinne', 'Gatt', 'gatt.corinne@gmail.com', 'sfkweso', 'sofijwepokrf', '0000-00-00 00:00:00'),
(6, 'Corinne', 'Gatt', 'gatt.corinne@gmail.com', 'sfkweso', 'sofijwepokrf', '0000-00-00 00:00:00'),
(7, 'Corinne', 'Gatt', 'gatt.corinne@gmail.com', 'sfkweso', 'sofijwepokrf', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `category` int(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `img` text NOT NULL,
  `background_colour` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `category`, `name`, `price`, `img`, `background_colour`) VALUES
(1, 2, 'The 8Bit Special', '4.20', './views/assets/theSpecial.png', 'afeeee'),
(9, 2, 'Classic Burger', '6.90', './views/assets/classic.png', 'f2a2e8 '),
(11, 2, 'Fish Burger', '5.43', './views/assets/fishBurger.png', 'ffeeb1'),
(17, 2, 'The OG smokey', '4.00', './views/assets/ogSmokey.png', 'ffced3'),
(18, 2, 'Luncheon Meat Burger', '1.00', './views/assets/luncheonmeat.png', 'E0B0FF'),
(19, 2, 'corinnes', '15.00', './views/assets/burger.jpeg', 'FF00FF');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `customerid` int(50) NOT NULL,
  `name` text NOT NULL,
  `surname` text NOT NULL,
  `telephone` text NOT NULL,
  `email` text NOT NULL,
  `dateandtime` datetime(6) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`category`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`customerid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `customerid` int(50) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `cat_id` FOREIGN KEY (`category`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
