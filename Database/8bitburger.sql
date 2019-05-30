-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2019 at 02:25 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `8bitburger`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `email`) VALUES
(1, 'test', 'test', 'test@test.com'),
(2, '', 'test', 'asd@s'),
(4, 'liam', 'liam', 'liam@liam'),
(5, 'gabriele', 'lghliuh', 'corinner@gabriele'),
(6, 'gab', 'cor', 'gav@cor'),
(7, 'martina', 'andrew', 'martina@andrew'),
(8, 'gorg', 'hello', 'gorgyy@gorg'),
(9, 'username1', 'testtest', 'username@gmail.com');

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
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `user_ID` int(11) NOT NULL,
  `food_ID` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`user_ID`, `food_ID`, `id`) VALUES
(4, 2, 21),
(7, 3, 88),
(7, 2, 89),
(7, 1, 90),
(1, 23, 96),
(1, 8, 98),
(1, 2, 105),
(1, 1, 106),
(8, 2, 107),
(8, 3, 109),
(8, 1, 111),
(9, 2, 112),
(9, 4, 113);

-- --------------------------------------------------------

--
-- Table structure for table `favourites2`
--

CREATE TABLE `favourites2` (
  `id` int(11) NOT NULL,
  `food` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 2, 'The 8Bit Special', '4.20', './views/assets/theSpecial.png', 'aec6cf'),
(2, 2, 'Classic Burger', '6.90', './views/assets/classic.png', 'ffb247e8'),
(3, 2, 'Fish Burger', '5.43', './views/assets/fishBurger.png', '8fdd8fe7'),
(4, 2, 'The OG smokey', '4.00', './views/assets/ogSmokey.png', 'fdfd96'),
(5, 2, 'Meat Burger', '1.00', './views/assets/luncheonmeat.png', 'b9cdd4'),
(6, 2, 'corinnes', '15.00', './views/assets/burger.jpeg', 'ffb247e8');

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
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`customerid`, `name`, `surname`, `telephone`, `email`, `dateandtime`, `message`) VALUES
(1, '', '', '', '', '1970-01-01 00:00:00.000000', ''),
(2, '', '', '', '', '1970-01-01 00:00:00.000000', ''),
(3, 'John', 'Borg', '21123456', 'username@gmail.com', '2019-06-10 19:30:00.000000', 'Table for four please!'),
(4, 'John', 'Borg', '', 'username@gmail.com', '2019-06-10 17:30:00.000000', 'Table for 4!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ID` (`user_ID`),
  ADD KEY `food_ID` (`food_ID`);

--
-- Indexes for table `favourites2`
--
ALTER TABLE `favourites2`
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
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `favourites2`
--
ALTER TABLE `favourites2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `customerid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
