-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2021 at 03:41 PM
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
-- Database: `php_ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_transaction`
--

CREATE TABLE `all_transaction` (
  `id` int(10) NOT NULL,
  `t_date` date NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `quantity` double NOT NULL,
  `unit` varchar(10) NOT NULL,
  `trans_type` varchar(50) NOT NULL,
  `per_value` double NOT NULL,
  `grand_total` double NOT NULL,
  `note` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `all_transaction`
--

INSERT INTO `all_transaction` (`id`, `t_date`, `item_name`, `quantity`, `unit`, `trans_type`, `per_value`, `grand_total`, `note`) VALUES
(100, '2021-09-02', 'Plastic Frame', 2000, 'select', 'Incoming', 17, 45000, ''),
(101, '2021-09-03', 'Ilastic Band', 1000, 'select', 'Incoming', 1.5, 150, ''),
(102, '2021-09-03', 'Ilastic Band', 1250, 'select', 'Incoming', 2.1, 1020, ''),
(103, '2021-08-25', 'Plastic Frame', 1500, 'pcs', 'Incoming', 0, 0, '010'),
(104, '2021-08-31', 'A-PET Sheet-Face sheild', 150, 'pcs', 'Incoming', 10, 1500, '040'),
(105, '2021-09-02', 'A-PET Sheet-Face sheild', 14000, 'pcs', 'Incoming', 100, 1404500, ''),
(106, '2021-08-26', 'face shield', 710, 'pcs', 'Incoming', 12, 8520, '');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `companyname` varchar(50) NOT NULL,
  `contact` int(10) NOT NULL,
  `c_address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `firstname`, `lastname`, `companyname`, `contact`, `c_address`, `city`) VALUES
(1, 'Pramuditha', 'Jayawardhana', 'kevilton', 713363678, 'Mahawatta', 'Kottawa'),
(4, 'gvrew', 'rtjw', 'yjmytjm', 0, ' mtymtym', ''),
(5, 'vbebeb', 'vrvber', 'wcwvcw', 0, '  erber be', ''),
(6, 'bg4t', 'ev', 'verv', 0, ' erb', ''),
(7, 'wvw', 'wewev', 'vwev', 0, ' wvw', ''),
(8, 'vewve', 'ererv', 'ber', 0, ' beqrb', ''),
(9, 'verv', 'vbrbb', 'rbrbr', 0, ' rbrtb', ''),
(10, 'edvwev', 'vwevwev', 'wvwev', 0, ' vwev', ''),
(11, 'vere', 'ververvev', 'berb', 0, ' bebeb', '');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(10) NOT NULL,
  `I_date` date NOT NULL,
  `I_id` int(50) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `iname` varchar(50) NOT NULL,
  `iquntity` int(50) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `i_value` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `I_date`, `I_id`, `customer`, `iname`, `iquntity`, `unit`, `i_value`) VALUES
(1, '2021-08-25', 0, '', 'A-PET Sheet-Face sheild', 15001, 'pcs', 0),
(2, '2021-08-17', 1750, 'sa', 'A-PET Sheet-Face sheild', 750, 'pcs', 1500),
(3, '2021-08-25', 10700, 'kevilton', 'Ilastic Band - Face shield', 1000, 'pcs', 1700),
(4, '2021-08-25', 7568578, 'kevilton', 'Ilastic Band - Face shield', 200, 'kg', 9);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_code` int(10) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `note` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_code`, `item_name`, `unit`, `quantity`, `note`) VALUES
(10400, 'A-PET Sheet-Face sheild', 'pcs', 0, ''),
(17500, 'Plastic Frame', 'pcs', 0, ''),
(10450, 'Ilastic Band', 'pcs', 0, ''),
(1750, '', 'pcs', 0, ''),
(0, '', '', 0, ''),
(17580, 'face shield', 'pcs', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(5) NOT NULL,
  `p_code` int(10) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `used_item` varchar(50) NOT NULL,
  `item_quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `p_code`, `product_name`, `used_item`, `item_quantity`) VALUES
(72, 0, 'ty', 'heds', 0),
(73, 0, 'ty', 'heds', 0),
(74, 0, 'ty', 'heds', 0),
(75, 0, 'ty', 'heds', 0),
(76, 0, 'ty', 'heds', 0),
(77, 0, 'ty', 'heds', 0),
(78, 0, 'ty', 'heds', 0),
(79, 0, 'ty', 'heds', 0),
(80, 0, 'ty', 'heds', 0),
(81, 0, 'ty', 'heds', 0),
(1750, 0, '', 'A-PET Sheet-Face sheild', 10),
(17580, 0, '', 'A-PET Sheet-Face sheild', 1);

CREATE TABLE `composite_item` (
  `composite_item_code` int(5) NOT NULL,
  `raw_item_code` int(10) NOT NULL,
  `item_quantity` int(100) NOT NULL,
  PRIMARY KEY (composite_item_code, raw_item_code)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(10) NOT NULL,
  `itemname` varchar(50) NOT NULL,
  `itemcode` int(10) NOT NULL,
  `qunitity` int(25) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `value` int(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(10) NOT NULL,
  `Item_code` int(50) NOT NULL,
  `Product_name` varchar(50) NOT NULL,
  `Quantity` int(50) NOT NULL,
  `Unit` varchar(50) NOT NULL,
  `each_value` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `Item_code`, `Product_name`, `Quantity`, `Unit`, `each_value`) VALUES
(22, 10400, 'A-PET Sheet-Face sheild', 14000, 'pcs', 100),
(23, 17580, 'face shield', 710, 'pcs', 12);

-- --------------------------------------------------------

--
-- Table structure for table `user_registration`
--

CREATE TABLE `user_registration` (
  `id` int(5) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `upassword` varchar(50) NOT NULL,
  `urole` varchar(50) NOT NULL,
  `ustatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_registration`
--

INSERT INTO `user_registration` (`id`, `firstname`, `lastname`, `username`, `upassword`, `urole`, `ustatus`) VALUES
(2, 'admin', 'admin', 'admin', 'admin', 'admin', 'Active'),
(4, 'Pramuditha', 'Jayawardhana', 'db', 'vdvbdb', 'admin', 'active'),
(5, 'Pramuditha', 'Jayawardhana', 'wed', 'dadada', 'user', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_transaction`
--
ALTER TABLE `all_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_registration`
--
ALTER TABLE `user_registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_transaction`
--
ALTER TABLE `all_transaction`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17581;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_registration`
--
ALTER TABLE `user_registration`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
