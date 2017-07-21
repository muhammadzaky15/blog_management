-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2017 at 08:03 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `backlink`
--

CREATE TABLE `backlink` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `backlink` varchar(250) NOT NULL,
  `type` varchar(50) NOT NULL,
  `rating` varchar(50) NOT NULL,
  `email_verification` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `backlink`
--

INSERT INTO `backlink` (`id`, `iduser`, `name`, `backlink`, `type`, `rating`, `email_verification`, `email`, `username`, `password`) VALUES
(1, 0, 'asd', 'df', '0', '0', '0', '', '', ''),
(2, 0, 'asdf', 'asdf', 'WEB 2.0', 'Not Bad', 'yes', '', '', ''),
(3, 1, '12', '12', 'WEB 2.0', 'Good', 'No', '12', '12', '131'),
(4, 1, 'qwqw', 'qwq', 'WEB 2.0', 'Good', 'yes', 'qwq', 'qw', 'qw'),
(5, 0, 'adsas', 'asd', 'Comment', 'Very Good', 'yes', 'ad', 'asd', 'adad');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`) VALUES
(1, 'Action'),
(2, 'Animation'),
(3, 'Children'),
(4, 'Classics'),
(5, 'Comedy'),
(6, 'Documentary'),
(7, 'Drama'),
(8, 'Family'),
(9, 'Foreign'),
(10, 'Games'),
(11, 'Horror'),
(12, 'Music'),
(13, 'New'),
(14, 'Sci-Fi'),
(15, 'Sports'),
(16, 'Travel');

-- --------------------------------------------------------

--
-- Table structure for table `domain`
--

CREATE TABLE `domain` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `domain` varchar(50) DEFAULT NULL,
  `registrar` varchar(255) DEFAULT NULL,
  `email` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `renewal` date DEFAULT NULL,
  `webmaster` int(11) DEFAULT NULL,
  `adsense` int(11) DEFAULT NULL,
  `hosting` int(11) DEFAULT NULL,
  `niche` int(11) DEFAULT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `domain`
--

INSERT INTO `domain` (`id`, `iduser`, `domain`, `registrar`, `email`, `username`, `password`, `renewal`, `webmaster`, `adsense`, `hosting`, `niche`, `description`) VALUES
(1, 1, 'http://freedriversolution.com', 'asdf', 1, 'asd', 'asd', '2017-07-24', 1, 1, 1, 1, ''),
(2, 0, 'xxx.com', 'adsad', 1, 'ads', 'asd', '2017-07-21', 1, 1, 1, 1, 'ads'),
(3, 2, 'qw', 'qwe', 1, 'qew', 'qw', '2017-07-03', 1, 1, 1, 1, 'qeqe');

-- --------------------------------------------------------

--
-- Table structure for table `domain_backlink`
--

CREATE TABLE `domain_backlink` (
  `id` int(11) NOT NULL,
  `domain` int(11) NOT NULL,
  `backlink` int(11) NOT NULL,
  `url` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `indexed` varchar(10) NOT NULL,
  `keyword` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `domain_backlink`
--

INSERT INTO `domain_backlink` (`id`, `domain`, `backlink`, `url`, `email`, `username`, `password`, `indexed`, `keyword`) VALUES
(1, 1, 1, 'asdad', '1', 'ads', 'ads', 'yes', 'adsad'),
(2, 1, 1, 'asdad', '1', 'ads', 'ads', 'yes', 'adsad'),
(3, 1, 1, 'asdad', '1', 'ads', 'ads', 'yes', 'adsad'),
(4, 1, 2, 'qweqw', '1', 'qwe', 'qew', 'yes', 'qewq');

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `handphone` varchar(255) DEFAULT NULL,
  `email_recovery` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`id`, `email`, `password`, `handphone`, `email_recovery`) VALUES
(1, 'muhammadzakyarca@gmail.com', 'zaKY20!%', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hosting`
--

CREATE TABLE `hosting` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `hosting` varchar(255) DEFAULT NULL,
  `email` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `cpanel_url` varchar(255) DEFAULT NULL,
  `cpanel_username` varchar(255) DEFAULT NULL,
  `cpanel_password` varchar(255) DEFAULT NULL,
  `name_server_1` varchar(255) DEFAULT NULL,
  `name_server_2` varchar(255) DEFAULT NULL,
  `name_server_3` varchar(255) DEFAULT NULL,
  `name_server_4` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hosting`
--

INSERT INTO `hosting` (`id`, `iduser`, `hosting`, `email`, `username`, `password`, `cpanel_url`, `cpanel_username`, `cpanel_password`, `name_server_1`, `name_server_2`, `name_server_3`, `name_server_4`) VALUES
(1, 0, 'jagoan hosting', 1, 'jagoan', 'jag', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf'),
(2, 2, 'adad', 1, 'admin', 'ad', 'ads', 'ad', 'ad', 'ad', 'ad', 'ad', 'ad');

-- --------------------------------------------------------

--
-- Table structure for table `niche`
--

CREATE TABLE `niche` (
  `id` int(11) NOT NULL,
  `niche` varchar(255) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `niche`
--

INSERT INTO `niche` (`id`, `niche`, `description`) VALUES
(1, 'Car', 'About Car');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`) VALUES
(1, 'khairul', '25d55ad283aa400af464c76d713c07ad', 'khairulbahri.aceh@gmail.com'),
(2, 'zaky', '25d55ad283aa400af464c76d713c07ad', 'zaky@xxx.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `backlink`
--
ALTER TABLE `backlink`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `domain`
--
ALTER TABLE `domain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `domain_backlink`
--
ALTER TABLE `domain_backlink`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hosting`
--
ALTER TABLE `hosting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `niche`
--
ALTER TABLE `niche`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `backlink`
--
ALTER TABLE `backlink`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `domain`
--
ALTER TABLE `domain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `domain_backlink`
--
ALTER TABLE `domain_backlink`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hosting`
--
ALTER TABLE `hosting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `niche`
--
ALTER TABLE `niche`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
