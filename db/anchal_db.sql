-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 06, 2022 at 06:23 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anchal_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus_tb`
--

CREATE TABLE `aboutus_tb` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `date` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aboutus_tb`
--

INSERT INTO `aboutus_tb` (`id`, `content`, `date`) VALUES
(1, '<p style=\"text-align:justify\"><strong>Anchal is a non-profitable organization that was, is, and will always be by your side in times of desolation.</strong></p>\r\n\r\n<p style=\"text-align:justify\">We are a crowdfunding platform that helps us to generate funds from across the country for education, healthcare, disaster reliefs, and many such purposes. Our passionate volunteers work round the clock and have mastered and counted the act of giving.</p>\r\n\r\n<p style=\"text-align:justify\">Our team ensures the fundraising is for the right cause and also makes sure there is no misuse of our donor&rsquo;s trust. Backed by a utilitarian notion, and using the power of social media and internet banking, Anchal has gained huge popularity in terms to raise funds for personal pressing needs.</p>\r\n', '2021-03-15 19:39:44');

-- --------------------------------------------------------

--
-- Table structure for table `activity_tb`
--

CREATE TABLE `activity_tb` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `image` longblob NOT NULL,
  `description` text NOT NULL,
  `date` text NOT NULL,
  `pagename` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin_tb`
--

CREATE TABLE `admin_tb` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_tb`
--

INSERT INTO `admin_tb` (`id`, `username`, `password`) VALUES
(1, 'anchaladmin', 'anchal123');

-- --------------------------------------------------------

--
-- Table structure for table `contactus_tb`
--

CREATE TABLE `contactus_tb` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `date` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `donation_tb`
--

CREATE TABLE `donation_tb` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donation_tb`
--

INSERT INTO `donation_tb` (`id`, `title`, `description`, `date`) VALUES
(1, 'Payment Details', '<p><strong>Account No</strong>- 10210002723077</p>\r\n\r\n<p><strong>IFSC</strong> : &nbsp; BDBL0001683</p>\r\n\r\n<p><strong>BANDHAN BANK</strong></p>\r\n\r\n<p><strong>MEMARI BRANCH</strong></p>\r\n', '2021-03-12 13:30:36');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_tb`
--

CREATE TABLE `gallery_tb` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `image` longblob NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `joinus_tb`
--

CREATE TABLE `joinus_tb` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `blood` text NOT NULL,
  `phone` text NOT NULL,
  `dob` text NOT NULL,
  `address` text NOT NULL,
  `documentsproof` text NOT NULL,
  `date` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `slider_tb`
--

CREATE TABLE `slider_tb` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `image` longblob NOT NULL,
  `sub_title` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `team_tb`
--

CREATE TABLE `team_tb` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `designation` text NOT NULL,
  `image` text NOT NULL,
  `date` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus_tb`
--
ALTER TABLE `aboutus_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_tb`
--
ALTER TABLE `activity_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_tb`
--
ALTER TABLE `admin_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus_tb`
--
ALTER TABLE `contactus_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donation_tb`
--
ALTER TABLE `donation_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_tb`
--
ALTER TABLE `gallery_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `joinus_tb`
--
ALTER TABLE `joinus_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_tb`
--
ALTER TABLE `slider_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_tb`
--
ALTER TABLE `team_tb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutus_tb`
--
ALTER TABLE `aboutus_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `activity_tb`
--
ALTER TABLE `activity_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_tb`
--
ALTER TABLE `admin_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contactus_tb`
--
ALTER TABLE `contactus_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donation_tb`
--
ALTER TABLE `donation_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gallery_tb`
--
ALTER TABLE `gallery_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `joinus_tb`
--
ALTER TABLE `joinus_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slider_tb`
--
ALTER TABLE `slider_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_tb`
--
ALTER TABLE `team_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
