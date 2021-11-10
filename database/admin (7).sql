-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2018 at 10:09 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `wd_admin`
--

CREATE TABLE `wd_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `website` varchar(50) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wd_admin`
--

INSERT INTO `wd_admin` (`id`, `name`, `email`, `password`, `mobile`, `address`, `website`, `designation`, `dob`, `image`, `date`, `status`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin', '+91-90097-70191', 'Mahu naka indore(M.P)', 'http://shreejeeinfosolution.com', 'CEO', '1997-02-23', 'home-about.jpg', '2018-09-11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wd_category`
--

CREATE TABLE `wd_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wd_category`
--

INSERT INTO `wd_category` (`id`, `name`, `status`, `date`) VALUES
(1, 'Php', 1, '2018-09-18'),
(2, 'Business Analyst', 1, '2018-09-18'),
(3, 'Android', 1, '2018-09-18'),
(4, 'Web Designer', 1, '2018-09-18'),
(5, 'Graphic Designer', 1, '2018-09-18');

-- --------------------------------------------------------

--
-- Table structure for table `wd_subcategory`
--

CREATE TABLE `wd_subcategory` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wd_subcategory`
--

INSERT INTO `wd_subcategory` (`id`, `cat_id`, `name`, `status`, `date`) VALUES
(1, 1, 'Test', 1, '2018-10-29'),
(2, 2, 'Test abc', 1, '2018-10-29');

-- --------------------------------------------------------

--
-- Table structure for table `wd_supersubcat`
--

CREATE TABLE `wd_supersubcat` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_cat_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wd_supersubcat`
--

INSERT INTO `wd_supersubcat` (`id`, `cat_id`, `sub_cat_id`, `name`, `status`, `date`) VALUES
(1, 1, 1, 'Test1', 1, '2018-10-29'),
(2, 2, 2, 'Test2', 1, '2018-10-29');

-- --------------------------------------------------------

--
-- Table structure for table `wd_user`
--

CREATE TABLE `wd_user` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(200) NOT NULL,
  `type` varchar(50) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wd_user`
--

INSERT INTO `wd_user` (`id`, `name`, `phone`, `email`, `password`, `address`, `type`, `profile_pic`, `status`, `date`) VALUES
(1, 'Priyanka Bhanopa', '8305755009', 'priyanka@gmail.com', 'Priyanka@123#', 'ujjain', '2', '', 1, '2018-10-29'),
(2, 'Priyanka Sharma', '8305755009', 'priyankaSharma@gmail.com', 'Priyanka@123#', 'ujjain', '2', '', 1, '2018-10-29'),
(3, 'Priyanka Sharma', '8305755009', 'priyankaSharma1@gmail.com', 'Priyanka@123#', 'ujjain', '2', '', 1, '2018-10-29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wd_admin`
--
ALTER TABLE `wd_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wd_category`
--
ALTER TABLE `wd_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wd_subcategory`
--
ALTER TABLE `wd_subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wd_supersubcat`
--
ALTER TABLE `wd_supersubcat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wd_user`
--
ALTER TABLE `wd_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wd_admin`
--
ALTER TABLE `wd_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wd_category`
--
ALTER TABLE `wd_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wd_subcategory`
--
ALTER TABLE `wd_subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wd_supersubcat`
--
ALTER TABLE `wd_supersubcat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wd_user`
--
ALTER TABLE `wd_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
