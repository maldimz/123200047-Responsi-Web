-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2021 at 06:47 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 
--

-- CREATE DATABASE responsi;

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `item_id` varchar(10) NOT NULL,
  `item_name` varchar(30) NOT NULL,
  `amount` int(11) NOT NULL,
  `unit` varchar(15) NOT NULL,
  `arrival_date` date NOT NULL,
  `category` varchar(20) NOT NULL,
  `item_status` varchar(20) NOT NULL,
  `price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`item_id`, `item_name`, `amount`, `unit`, `arrival_date`, `category`, `item_status`, `price`) VALUES
('AC4370', 'Acer Laptop 4370Z', 10, 'fruit', '2015-02-07', 'Electronic', 'Damaged', 6750000),
('CMPi5', 'HP Core i5 . computer', 25, 'units', '2016-05-04', 'Electronic', 'Well', 12750000),
('HND01', 'Honda CR-V 2016', 3, 'units', '2016-04-01', 'Vehicles', 'Well', 570000000),
('KUR', 'Chair', 200, 'units', '2016-03-11', 'Office Inventory', 'Well', 75000),
('MJ01', '2x1 Office Desk', 50, 'units', '2015-12-11', 'Office Inventory', 'Well', 250000),
('TNH01', 'Main Building Land', 350, 'm²', '2015-11-05', 'Building', 'Well', 2750000),
('TYT01', '2015 Toyota Camry', 5, 'units', '2015-10-10', 'Vehicles', 'Well', 345000000);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone_num` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`username`, `password`, `full_name`, `email`, `phone_num`) VALUES
('dexchinex', 'dexchinex123', 'Dimas Pratama', 'akmal@gmail.com', '081123321234'),
('maldimz', 'maldimz123', 'Akhmal Dimas Pratama', 'pratamadimas03@gmail.com', '081328751344');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
