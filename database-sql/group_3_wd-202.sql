-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2022 at 05:14 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `group_3_wd-202`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `CUSTOMER_ID` int(3) NOT NULL,
  `FNAME` varchar(15) DEFAULT NULL,
  `LNAME` varchar(15) DEFAULT NULL,
  `STREET` varchar(50) DEFAULT NULL,
  `CITY` varchar(30) DEFAULT NULL,
  `PHONE` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CUSTOMER_ID`, `FNAME`, `LNAME`, `STREET`, `CITY`, `PHONE`) VALUES
(101, 'Kelisa', 'Barrowa', 'Rizal', 'Angeles City', 944486889),
(102, 'Sahara', 'Drew', 'View', 'Angeles Ctiy', 968055967),
(103, 'Amiya', 'Dawe', 'Washington', 'Porac', 980834070),
(104, 'Arielle', 'Johns', 'View', 'Mabalacat', 941942168),
(105, 'Jose', 'Stephenson', 'Lake', 'Angeles City', 938973657),
(106, 'Efan', 'Ball', 'Hill', 'San Fernando', 911354903),
(107, 'Brax', 'Roberts', 'Washington', 'Mexico', 913466228),
(108, 'Fulgur', 'Ovid', 'Cedar', 'Porac', 966402822),
(109, 'Celia', 'Bowes', 'Lake', 'Mexico', 959170556),
(110, 'Zackery', 'Alvarado', 'View', 'Angeles City', 949175058),
(111, 'Raiden', 'Salter', 'Ninth', 'Mabalacat', 945259578),
(112, 'Elias', 'Major', 'Lake', 'Magalang', 979257159),
(113, 'Buddy', 'Holding', 'View', 'Mexico', 930102475),
(114, 'Wojciech', 'Summer', 'Lake', 'Arayat', 968879934),
(115, 'Keiran', 'Laing', 'Washington', 'San Fernando', 952455617),
(116, 'Michele', 'Bannister', 'View', 'Porac', 948315990),
(117, 'Henna', 'Berry', 'Lake', 'Magalang', 954479460),
(118, 'Conrad', 'Stein', 'View', 'Angeles City', 923350183),
(119, 'Konnor', 'Reilly', 'Hill', 'Mabalacat', 954674333),
(120, 'Lilly-Grace', 'Hanson', 'Cedar', 'Arayat', 972195015),
(130, 'Patrick', 'Mariano', 'Eighth', 'Arayat', 2147483647),
(153, 'fulgur', 'ovid', 'Cedar', 'Mabalacat', 5261556),
(154, 'dianxia', 'dianxia', 'Hill', 'dianxia', 2147483647),
(158, 'Vox', 'Akuma', 'Malaya', 'Mabalacat', 663511),
(159, 'Patrick', 'Mariano', 'Rizal', 'Angeles City', 52355),
(161, 'Rafa', 'Pineda', 'Malaya', 'Mabalacat', 526155642);

-- --------------------------------------------------------

--
-- Table structure for table `drinks`
--

CREATE TABLE `drinks` (
  `DRINK_ID` int(3) NOT NULL,
  `DRINK_NAME` varchar(20) NOT NULL,
  `DRINK_SIZE` varchar(15) NOT NULL,
  `DRINK_PRICE` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drinks`
--

INSERT INTO `drinks` (`DRINK_ID`, `DRINK_NAME`, `DRINK_SIZE`, `DRINK_PRICE`) VALUES
(111, 'Cappuccino', 'Small', '147.00'),
(112, 'Cappuccino', 'Regular', '167.00'),
(113, 'Cappuccino', 'Large', '175.00'),
(114, 'Americano', 'Small', '140.00'),
(115, 'Americano', 'Regular', '165.00'),
(116, 'Americano', 'Large', '175.00'),
(117, 'Espresso', 'Small ', '999.99'),
(118, 'Espresso', 'Regular', '165.00'),
(119, 'Espresso', 'Large', '175.00'),
(120, 'Macchiato', 'Small', '140.00'),
(121, 'Macchiato', 'Regular', '165.00'),
(122, 'Macchiato', 'Large', '175.00'),
(123, 'Coffee Latte', 'Small', '140.00'),
(124, 'Coffee Latte', 'Regular', '165.00'),
(125, 'Coffee Latte', 'Large', '175.00'),
(126, 'Piccolo Latte', 'Small', '140.00'),
(127, 'Piccolo Latte', 'Regular', '165.00'),
(128, 'Piccolo Latte', 'Large', '175.00'),
(129, 'Ristretto', 'Small', '140.00'),
(130, 'Ristretto', 'Regular', '165.00'),
(131, 'Ristretto', 'Large', '175.00'),
(132, 'Affogato', 'Small', '145.00'),
(133, 'Affogato', 'Regular', '165.00'),
(134, 'Affogato', 'Large', '175.00'),
(138, 'Mocha', 'Small', '140.00'),
(139, 'Mocha', 'Regular', '150.00'),
(140, 'Mocha', 'Large', '175.00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ORDER_ID` int(3) NOT NULL,
  `CUSTOMER_ID` int(3) NOT NULL,
  `ORDER_DATE` date DEFAULT NULL,
  `ORDER_TYPE` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ORDER_ID`, `CUSTOMER_ID`, `ORDER_DATE`, `ORDER_TYPE`) VALUES
(612, 132, '2022-05-06', 'Delivery'),
(613, 125, '2022-05-06', 'Pick-Up'),
(614, 112, '2022-05-07', 'Pick-Up'),
(615, 113, '2022-05-07', 'Pick-Up'),
(616, 115, '2022-05-07', 'Delivery');

-- --------------------------------------------------------

--
-- Table structure for table `order_line`
--

CREATE TABLE `order_line` (
  `ORDER_ID` int(3) NOT NULL,
  `DRINK_ID` int(3) NOT NULL,
  `ORDER_QUANTITY` int(3) DEFAULT NULL,
  `TOTAL_PRICE` decimal(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_line`
--

INSERT INTO `order_line` (`ORDER_ID`, `DRINK_ID`, `ORDER_QUANTITY`, `TOTAL_PRICE`) VALUES
(612, 139, 8, '1200.00'),
(613, 121, 6, '990.00'),
(614, 131, 4, '700.00'),
(615, 120, 3, '420.00'),
(616, 120, 4, '560.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `USER_ID` int(5) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`USER_ID`, `USERNAME`, `PASSWORD`) VALUES
(2, 'dianxia', 'a20c6062784fe465d8160c8d4c72ce9e'),
(3, 'patmariano', '86af80f7fe7db560f2bf7f2a9d90e83b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CUSTOMER_ID`);

--
-- Indexes for table `drinks`
--
ALTER TABLE `drinks`
  ADD PRIMARY KEY (`DRINK_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ORDER_ID`);

--
-- Indexes for table `order_line`
--
ALTER TABLE `order_line`
  ADD PRIMARY KEY (`ORDER_ID`,`DRINK_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`USER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `CUSTOMER_ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `drinks`
--
ALTER TABLE `drinks`
  MODIFY `DRINK_ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ORDER_ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=617;

--
-- AUTO_INCREMENT for table `order_line`
--
ALTER TABLE `order_line`
  MODIFY `ORDER_ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=617;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `USER_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
