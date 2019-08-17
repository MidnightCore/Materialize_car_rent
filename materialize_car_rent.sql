-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2019 at 04:59 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `materialize_car_rent`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_car`
--

CREATE TABLE `add_car` (
  `car_name` text NOT NULL,
  `car_id` text NOT NULL,
  `car_brand` text NOT NULL,
  `car_version` text NOT NULL,
  `car_color` text NOT NULL,
  `car_number` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `add_car`
--

INSERT INTO `add_car` (`car_name`, `car_id`, `car_brand`, `car_version`, `car_color`, `car_number`) VALUES
('nissan navara x2', 'ns1', 'nissan', 'navara x2', 'ดำ', 'ฟจ8991');

-- --------------------------------------------------------

--
-- Table structure for table `add_driver`
--

CREATE TABLE `add_driver` (
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `id_license` text NOT NULL,
  `driver_license` text NOT NULL,
  `driver_phone` text NOT NULL,
  `driver_email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `add_driver`
--

INSERT INTO `add_driver` (`first_name`, `last_name`, `id_license`, `driver_license`, `driver_phone`, `driver_email`) VALUES
('John', 'Doe', 'xxxxxxxxxxxxx', 'xxxxxxxxxx', 'xxxxxxxx', 'xxxxxxx');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` varchar(50) NOT NULL,
  `id_order` varchar(50) NOT NULL,
  `rank` varchar(50) NOT NULL,
  `member_list` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `permit`
--

CREATE TABLE `permit` (
  `id` varchar(100) NOT NULL,
  `id_order` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rent_form`
--

CREATE TABLE `rent_form` (
  `id` int(11) NOT NULL,
  `date_write` text NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `rank` text NOT NULL,
  `zone` text NOT NULL,
  `want` text NOT NULL,
  `place` text NOT NULL,
  `county` text NOT NULL,
  `people` int(11) NOT NULL,
  `date_go` text NOT NULL,
  `time_go` text NOT NULL,
  `date_back` text NOT NULL,
  `time_back` text NOT NULL,
  `phone_num` int(11) NOT NULL,
  `license_user` text NOT NULL,
  `can_go` text NOT NULL,
  `driver_name` text NOT NULL,
  `driver_car` text NOT NULL,
  `driver_carid` text NOT NULL,
  `license_agent` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rent_form`
--

INSERT INTO `rent_form` (`id`, `date_write`, `first_name`, `last_name`, `rank`, `zone`, `want`, `place`, `county`, `people`, `date_go`, `time_go`, `date_back`, `time_back`, `phone_num`, `license_user`, `can_go`, `driver_name`, `driver_car`, `driver_carid`, `license_agent`) VALUES
(13, 'Aug 13, 2019', 'test2', 'test2', 'test2', 'test2', 'test2', 'test2', 'Bangkok', 2, 'Aug 30, 2019', '12:31 PM', 'Aug 31, 2019', '12:31 PM', 0, 'test2', 'not_agree', 'test2', 'test2', 'test2 ', 'test2'),
(14, 'Aug 13, 2019', 'test2', 'test2', 'test2', 'test2', 'test2', 'test2', 'Bangkok', 2, 'Aug 30, 2019', '12:31 PM', 'Aug 31, 2019', '12:31 PM', 0, 'test2', 'not_agree', 'test2', 'test2', 'test2 ', 'test2'),
(15, 'Aug 13, 2019', 'test2', 'test2', 'test2', 'test2', 'test2', 'test2', 'Bangkok', 2, 'Aug 30, 2019', '12:31 PM', 'Aug 31, 2019', '12:31 PM', 0, 'test2', 'not_agree', 'test2', 'test2', 'test2 ', 'test2'),
(16, 'Aug 13, 2019', 'test2', 'test2', 'test2', 'test2', 'test2', 'test2', 'Bangkok', 2, 'Aug 30, 2019', '12:31 PM', 'Aug 31, 2019', '12:31 PM', 0, 'test2', 'not_agree', 'test2', 'test2', 'test2 ', 'test2'),
(17, 'Aug 13, 2019', 'test2', 'test2', 'test2', 'test2', 'test2', 'test2', 'Bangkok', 2, 'Aug 30, 2019', '12:31 PM', 'Aug 31, 2019', '12:31 PM', 0, 'test2', 'not_agree', 'test2', 'test2', 'test2 ', 'test2'),
(18, 'Aug 13, 2019', 'test2', 'test2', 'test2', 'test2', 'test2', 'test2', 'Bangkok', 2, 'Aug 30, 2019', '12:31 PM', 'Aug 31, 2019', '12:31 PM', 0, 'test2', 'not_agree', 'test2', 'test2', 'test2 ', 'test2'),
(19, 'Aug 13, 2019', 'test2', 'test2', 'test2', 'test2', 'test2', 'test2', 'Bangkok', 2, 'Aug 30, 2019', '12:31 PM', 'Aug 31, 2019', '12:31 PM', 0, 'test2', 'not_agree', 'test2', 'test2', 'test2 ', 'test2'),
(20, 'Aug 13, 2019', 'test2', 'test2', 'test2', 'test2', 'test2', 'test2', 'Bangkok', 2, 'Aug 30, 2019', '12:31 PM', 'Aug 31, 2019', '12:31 PM', 0, 'test2', 'not_agree', 'test2', 'test2', 'test2 ', 'test2'),
(21, 'Aug 13, 2019', 'test2', 'test2', 'test2', 'test2', 'test2', 'test2', 'Bangkok', 2, 'Aug 30, 2019', '12:31 PM', 'Aug 31, 2019', '12:31 PM', 0, 'test2', 'not_agree', 'test2', 'test2', 'test2 ', 'test2'),
(22, 'Aug 13, 2019', 'test2', 'test2', 'test2', 'test2', 'test2', 'test2', 'Bangkok', 2, 'Aug 30, 2019', '12:31 PM', 'Aug 31, 2019', '12:31 PM', 0, 'test2', 'not_agree', 'test2', 'test2', 'test2 ', 'test2'),
(23, 'Aug 13, 2019', 'test2', 'test2', 'test2', 'test2', 'test2', 'test2', 'Bangkok', 2, 'Aug 30, 2019', '12:31 PM', 'Aug 31, 2019', '12:31 PM', 0, 'test2', 'not_agree', 'test2', 'test2', 'test2 ', 'test2'),
(24, 'Aug 13, 2019', 'test2', 'test2', 'test2', 'test2', 'test2', 'test2', 'Bangkok', 2, 'Aug 30, 2019', '12:31 PM', 'Aug 31, 2019', '12:31 PM', 0, 'test2', 'not_agree', 'test2', 'test2', 'test2 ', 'test2'),
(25, 'Aug 20, 2019', 'aa', 'aa', 'aa', 'aa', 'aa', 'aa', 'Other', 2, 'Aug 20, 2019', '02:18 PM', 'Aug 20, 2019', '02:18 PM', 0, 'aa', 'not_agree', 'aa', 'aa', 'aa ', 'aa');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `user_password` text NOT NULL,
  `Phone_num` text NOT NULL,
  `user_email` text NOT NULL,
  `Role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`first_name`, `last_name`, `user_id`, `user_password`, `Phone_num`, `user_email`, `Role`) VALUES
('', '', '111', '111', '', '', 'user'),
('', '', 'admin', 'admin', '', '', 'admin'),
('Jane', 'Doe', 'jane', 'jane', 'xxx', 'xxx', 'user'),
('', '', 'mai', 'mai', '', '', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rent_form`
--
ALTER TABLE `rent_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rent_form`
--
ALTER TABLE `rent_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
