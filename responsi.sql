-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2021 at 12:35 PM
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
-- Database: `responsi`

CREATE DATABASE responsi;
--

-- --------------------------------------------------------

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
('001', 'CRV', 2, 'Units', '2021-12-10', 'Vehicles', 'Damaged', 100000000),
('002', 'PC', 10, 'Units', '2021-11-27', 'Office Inventory', 'Well', 6000000),
('003TRX', 'TronX Tower', 1000, 'm2', '2021-11-27', 'Building', 'Maintenance', 2000000),
('KalkunManj', 'Kalkun 3 Pro', 4, 'Units', '2021-11-24', 'Electronic', 'Damaged', 1000000);

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
