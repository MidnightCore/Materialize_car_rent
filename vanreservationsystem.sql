-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2019 at 05:59 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vanreservationsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `approver`
--

CREATE TABLE `approver` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `license` text NOT NULL,
  `rank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `approve_form`
--

CREATE TABLE `approve_form` (
  `id` int(11) NOT NULL,
  `rent_form_id` int(11) NOT NULL,
  `approver_id` int(11) NOT NULL,
  `status` text NOT NULL,
  `note` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `color` text NOT NULL,
  `brand` text NOT NULL,
  `image` text NOT NULL,
  `vertion` text NOT NULL,
  `license` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id`, `driver_id`, `color`, `brand`, `image`, `vertion`, `license`) VALUES
(1, 1, 'red', 'edd', '', '500-95', 'df-8989');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id` int(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id`, `user_id`, `image`) VALUES
(1, 'singq', ''),
(2, 'qqqfff', ''),
(3, 'qwe', '');

-- --------------------------------------------------------

--
-- Table structure for table `driver_rent`
--

CREATE TABLE `driver_rent` (
  `id` int(11) NOT NULL,
  `rent_form_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `approver_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rent_form`
--

CREATE TABLE `rent_form` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `request` text NOT NULL,
  `place` text NOT NULL,
  `count` text NOT NULL,
  `people` text NOT NULL,
  `date_go` datetime NOT NULL,
  `date_back` datetime NOT NULL,
  `note` text NOT NULL,
  `phone` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rent_form`
--

INSERT INTO `rent_form` (`id`, `user_id`, `request`, `place`, `count`, `people`, `date_go`, `date_back`, `note`, `phone`, `created_at`, `updated_at`) VALUES
(15, '111', 'asfasfasfafwqwfwsfdasasdfasfasfasf', 'ไปไหนก็ได้เรื่องของชั้น', 'Other', '4-6', '2019-09-23 18:30:00', '2019-09-25 18:30:00', '-', '957786954', '2019-09-22 15:54:05', '2019-09-22 15:56:53');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `role` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `rank` text NOT NULL,
  `department` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `password`, `fname`, `lname`, `role`, `email`, `phone`, `rank`, `department`) VALUES
('111', '698d51a19d8a121ce581499d7b701668', 'palm', 'mlap', 'user', '', '957786954', 'เจ้าหน้าที่', 'สำนักงานจีอี'),
('123', 'e10adc3949ba59abbe56e057f20f883e', 'sing44', 'ha', 'approver', 'sing@gmail.com', '0859575958', '8ogdH[-pt', '8od;kf[hko'),
('12355', '7694f4a66316e53c8cdd9d9954bd611d', 'qq', 'qq', 'admin', 'q', 'q', 'q', 'q'),
('admin', '21232f297a57a5a743894a0e4a801fc3', '', '', 'admin', '', '', '', ''),
('qqq', 'a38933e6379e64d2fdbad595cec0b8c9', 'qqqqw', 'qwqw', 'approver', 'qweqwe', 'qweqwe', 'qweqtqwf', 'qwfqwdf'),
('qqqfff', '343d9040a671c45832ee5381860e2996', 'fff', 'ff', 'driver', 'fff', 'fff', 'fff', 'fff'),
('qqqwe', '006d2143154327a64d86a264aea225f3', 'qqq', 'qqq', 'approver', 'qweq', 'e', 'qweqwe', 'qweqwqwr'),
('qqqwe4535', '006d2143154327a64d86a264aea225f3', 'qqq534', 'qqq', 'approver', 'qweq', 'e', 'qweqwe', 'qweqwqwr'),
('qwd', '7694f4a66316e53c8cdd9d9954bd611d', 'qwd', 'qqwd', 'approver', 'q', 'd', 'd', 'qw'),
('qwe', 'qqwe', 'qwe', 'qwewqwww', 'driver', 'aaa', 'asdssdasdassa', 'asfasf', 'asfs'),
('singq', 'e10adc3949ba59abbe56e057f20f883e', 'sing', 'ha', 'driver', 'sing@gmail.com', '0859575958', '8ogdH[-pt', '8od;kf[hko');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approver`
--
ALTER TABLE `approver`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user&approver` (`user_id`);

--
-- Indexes for table `approve_form`
--
ALTER TABLE `approve_form`
  ADD PRIMARY KEY (`id`),
  ADD KEY `approver` (`approver_id`),
  ADD KEY `rent_form` (`rent_form_id`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`),
  ADD KEY `driver` (`driver_id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user&driver` (`user_id`);

--
-- Indexes for table `driver_rent`
--
ALTER TABLE `driver_rent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rent_form_driver` (`rent_form_id`),
  ADD KEY `driver_num` (`driver_id`),
  ADD KEY `approver_rent` (`approver_id`);

--
-- Indexes for table `rent_form`
--
ALTER TABLE `rent_form`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_rent` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approver`
--
ALTER TABLE `approver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `approve_form`
--
ALTER TABLE `approve_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `driver_rent`
--
ALTER TABLE `driver_rent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rent_form`
--
ALTER TABLE `rent_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `approver`
--
ALTER TABLE `approver`
  ADD CONSTRAINT `user&approver` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `approve_form`
--
ALTER TABLE `approve_form`
  ADD CONSTRAINT `approver` FOREIGN KEY (`approver_id`) REFERENCES `approver` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rent_form` FOREIGN KEY (`rent_form_id`) REFERENCES `rent_form` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `driver` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `driver`
--
ALTER TABLE `driver`
  ADD CONSTRAINT `user&driver` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `driver_rent`
--
ALTER TABLE `driver_rent`
  ADD CONSTRAINT `approver_rent` FOREIGN KEY (`approver_id`) REFERENCES `approver` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `driver_num` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rent_form_driver` FOREIGN KEY (`rent_form_id`) REFERENCES `rent_form` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rent_form`
--
ALTER TABLE `rent_form`
  ADD CONSTRAINT `user_rent` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
