-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2021 at 09:34 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `protomed`
--

-- --------------------------------------------------------

--
-- Table structure for table `additems`
--

CREATE TABLE `additems` (
  `Item_No` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `Item_Code` varchar(100) NOT NULL,
  `Quantity` int(100) NOT NULL,
  `Unit` varchar(10) NOT NULL,
  `Note` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `additems`
--

INSERT INTO `additems` (`Item_No`, `name`, `Item_Code`, `Quantity`, `Unit`, `Note`) VALUES
(1, '', '', 0, '', ''),
(2, 'Pramuditha', '100hn', 100, '', 'test 1'),
(3, 'ww', 'ww', 2300, '', '6230'),
(4, 'Pramuditha', 'sax', 100, '', 'p'),
(5, 'Test 2', '10200', 500, 'kg', 'its good'),
(6, 'Test3', '10500', 1500, 'pcs', 'ITs better'),
(7, 'test4', '10600', 500, 'g', 'test4'),
(8, 'Pramuditha', 'efw', 0, 'g', 'feweg'),
(9, 'seniya', '10450', 475, 'pcs', 'new'),
(10, '', '', 0, 'kg', ''),
(11, '', '', 0, 'kg', ''),
(12, 'x', '10500', 100, 'pcs', 'test 1\r\n'),
(13, 'x', '10500', 100, 'pcs', 'test 1\r\n'),
(14, 'x', '10500', 100, 'pcs', 'test 1\r\n'),
(15, 'y', '10600', 100, 'pcs', ''),
(16, '', '', 0, 'kg', ''),
(17, '', '', 0, 'kg', ''),
(18, '', '', 0, 'kg', ''),
(19, 'Pramuditha', 'wcw', 0, 'g', 'w'),
(20, 'Pramuditha', 'sax', 100, 'g', 'ss'),
(21, 'tes1234', '10250', 500, 'kg', 'tser123\r\n'),
(22, 'Metal Strip Brass 0.6 x70', '1000000579', 0, 'kg', ''),
(23, '', '', 0, 'kg', ''),
(24, '', '', 0, 'kg', '');

-- --------------------------------------------------------

--
-- Table structure for table `data_sample`
--

CREATE TABLE `data_sample` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `website` varchar(150) NOT NULL,
  `comment` text NOT NULL,
  `gender` enum('Male','Female') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_sample`
--

INSERT INTO `data_sample` (`id`, `name`, `email`, `website`, `comment`, `gender`) VALUES
(0, 'Pramuditha Jayawardhana', 'pramudithamaroons00@gmail.com', 'https://www.codexworld.com/downloads/autocomplete-multiselect-textbox-multiple-selection-jquery-php/', 'gerhgeg', 'Male'),
(0, 'Pramuditha Jayawardhana', 'pramudithamaroons00@gmail.com', 'https://www.codexworld.com/downloads/autocomplete-multiselect-textbox-multiple-selection-jquery-php/', 'wegfweg', 'Female'),
(0, 'Pramuditha Jayawardhana', 'pramudithamaroons00@gmail.com', 'https://www.codexworld.com/downloads/autocomplete-multiselect-textbox-multiple-selection-jquery-php/', 'qwfqw', 'Male'),
(0, 'Pramuditha Jayawardhana', 'pramudithamaroons00@gmail.com', 'https://www.codexworld.com/downloads/autocomplete-multiselect-textbox-multiple-selection-jquery-php/', 'wwvw', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `office` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `salary` int(11) NOT NULL,
  `photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `position`, `office`, `age`, `salary`, `photo`) VALUES
(1, 'Tiger Wood', 'Accountant', 'Tokyo', 36, 5689, '01.jpg'),
(2, 'Mark Oto Ednalan', 'Chief Executive Officer (CEO)', 'London', 56, 5648, '02.jpg'),
(3, 'Jacob thompson', 'Junior Technical Author', 'San Francisco', 23, 5689, '03.jpg'),
(4, 'cylde Ednalan', 'Software Engineer', 'Olongapo', 23, 54654, '04.jpg'),
(5, 'Angelica Ramos', 'Software Engineer', 'San Francisco', 26, 5465, '05.jpg'),
(6, 'Airi Satou', 'Integration Specialist', 'New York', 53, 56465, '06.jpg'),
(8, 'Tiger Nixon', 'Software Engineer', 'London', 45, 456, '07.jpg'),
(9, 'Airi Satou', 'Pre-Sales Support', 'New York', 25, 4568, '08.jpg'),
(10, 'Angelica Ramos', 'Sales Assistant', 'New York', 45, 456, '09.jpg'),
(11, 'Ashton updated', 'Senior Javascript Developer', 'Olongapo', 45, 54565, '01.jpg'),
(12, 'Bradley Greer', 'Regional Director', 'San Francisco', 27, 5485, '02.jpg'),
(13, 'Brenden Wagner', 'Javascript Developer', 'San Francisco', 38, 65468, '03.jpg'),
(14, 'Brielle Williamson', 'Personnel Lead', 'Olongapo', 56, 354685, '04.jpg'),
(15, 'Bruno Nash', 'Customer Support', 'New York', 36, 65465, '05.jpg'),
(16, 'cairocoders', 'Sales Assistant', 'Sydney', 45, 56465, '06.jpg'),
(17, 'Zorita Serrano', 'Support Engineer', 'San Francisco', 38, 6548, '07.jpg'),
(18, 'Zenaida Frank', 'Chief Operating Officer (COO)', 'San Francisco', 39, 545, '08.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `finishgood`
--

CREATE TABLE `finishgood` (
  `Product_code` varchar(50) NOT NULL,
  `Product_name` varchar(50) NOT NULL,
  `Used_items` varchar(50) NOT NULL,
  `amount` int(50) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `P_note` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `finishgood`
--

INSERT INTO `finishgood` (`Product_code`, `Product_name`, `Used_items`, `amount`, `unit`, `P_note`) VALUES
('wfeg', 'dfwd', '', 0, '', ''),
('wfwfwf', 'wfw', 'Array', 0, 'Array', ''),
('10500', 'face', 'Array', 0, 'Array', ''),
('', '', 'Array', 0, 'Array', ''),
('10500', 'yh7yh', 'Array', 0, 'Array', ''),
('10500', 'dfwd', 'Pramuditha', 0, 'pcs', ''),
('10500', 'dfwd', 'Test3', 0, 'pcs', ''),
('fwfwvw', 'wfwfwf', 'test4', 150, 'g', ''),
('', '', '', 0, '', ''),
('', '', 'Array', 0, 'Array', ''),
('', '', 'Array', 0, 'Array', ''),
('', '', 'Array', 0, 'Array', ''),
('', '', 'tes1234', 150, 'Kg', ''),
('', '', 'tes1234', 150, 'Pcs', ''),
('', '', 'Metal Strip Brass 0.6 x70', 0, 'Pcs', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_reg`
--

CREATE TABLE `user_reg` (
  `id` int(5) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_reg`
--

INSERT INTO `user_reg` (`id`, `firstname`, `lastname`, `username`, `password`, `role`, `status`) VALUES
(1, 'Pramuditha', 'Jayawardhana', 'pramu', 'pramu123', 'user', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `additems`
--
ALTER TABLE `additems`
  ADD PRIMARY KEY (`Item_No`);

--
-- Indexes for table `user_reg`
--
ALTER TABLE `user_reg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `additems`
--
ALTER TABLE `additems`
  MODIFY `Item_No` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_reg`
--
ALTER TABLE `user_reg`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
