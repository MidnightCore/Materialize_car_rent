-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2020 at 03:01 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

--
-- Dumping data for table `approver`
--

INSERT INTO `approver` (`id`, `user_id`, `license`, `rank`) VALUES
(13, '111', '71333651_395220648056055_5054177948970516480_n.jpg', 1),
(14, '222', '56464.jpg', 2),
(15, '333', '56464.jpg', 3),
(16, '444', '56464.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `approve_form`
--

CREATE TABLE `approve_form` (
  `id` int(11) NOT NULL,
  `rent_form_id` int(11) NOT NULL,
  `approver_id` int(11) DEFAULT NULL,
  `status` text NOT NULL,
  `note` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `approve_form`
--

INSERT INTO `approve_form` (`id`, `rent_form_id`, `approver_id`, `status`, `note`, `created_at`, `updated_at`) VALUES
(1, 28, 16, 'ได้รับอนุญาตจากMaggie Souyers', 'ได้รับอนุญาตให้ไปกิจกรรมที่ท่านขอมาได้', '2019-10-10 06:43:22', '2019-10-14 11:22:18'),
(2, 29, 16, 'ได้รับอนุญาตจากMaggie Souyers', 'ได้รับอนุญาตให้ไปกิจกรรมที่ท่านขอมาได้', '2019-10-13 08:01:47', '2019-10-14 10:56:18'),
(3, 30, 16, 'ได้รับอนุญาตจากMaggie Souyers', 'ได้รับอนุญาตให้ไปกิจกรรมที่ท่านขอมาได้', '2019-10-13 08:03:28', '2019-10-14 11:28:06'),
(4, 31, 14, 'ได้รับอนุญาตและเลือกรถจาก Mary Jane', 'ดำเนินการส่งเรื่องขออุญาติต่อ', '2019-10-16 02:44:01', '2019-10-16 02:44:51'),
(5, 32, 13, 'กำลังตรวจสอบ', 'ขั้นตอนการเลือกรถ', '2019-10-16 02:45:29', '0000-00-00 00:00:00'),
(6, 33, 13, 'กำลังตรวจสอบ', 'ขั้นตอนการเลือกรถ', '2019-10-16 02:46:58', '0000-00-00 00:00:00'),
(7, 34, 16, 'ได้รับอนุญาตจากMaggie Souyers', 'ได้รับอนุญาตให้ไปกิจกรรมที่ท่านขอมาได้', '2019-11-08 21:12:55', '2019-11-08 21:15:27'),
(8, 35, 16, 'ได้รับอนุญาตจากMaggie Souyers', 'ได้รับอนุญาตให้ไปกิจกรรมที่ท่านขอมาได้', '2019-11-08 21:13:30', '2019-11-08 21:15:46'),
(9, 36, 14, 'ได้รับอนุญาตและเลือกรถจาก Mary Jane', 'ดำเนินการส่งเรื่องขออุญาติต่อ', '2019-11-08 21:14:04', '2019-11-08 21:14:47'),
(10, 37, 13, 'กำลังตรวจสอบ', 'ขั้นตอนการเลือกรถ', '2020-12-12 07:06:54', '0000-00-00 00:00:00'),
(11, 38, 13, 'กำลังตรวจสอบ', 'ขั้นตอนการเลือกรถ', '2020-12-12 07:11:35', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `id` int(11) NOT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `color` text NOT NULL,
  `brand` text NOT NULL,
  `image` text NOT NULL,
  `version` text NOT NULL,
  `license` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id`, `driver_id`, `color`, `brand`, `image`, `version`, `license`) VALUES
(16, 1, 'Black', 'Toyata', '10.png', 'RTX-1060', 'No.1235-711-744-9980-1'),
(17, NULL, 'Dark Red', 'Nissan', '', 'GTX-1660 Ti', 'No.1235-711-744-9980-2'),
(18, 2, 'Deep Blue', 'Honda', '', 'GTX-1050', 'No.1235-711-744-9980-3'),
(20, NULL, 'Black', 'Honda', 'palm.txt', 'GTX-1050 Ti', 'No.1235-711-744-9980-4'),
(21, NULL, 'White', 'Honda', '', 'Sky Active 2018', 'No.1235-711-744-9980-5'),
(22, NULL, 'Red', 'Mazda', 'palm.txt', 'Unite 3 2019', 'No.1235-711-744-9980-6'),
(23, NULL, 'Black', 'Susuki', '161EE78B-EB55-4D74-B103-60B912663249.mov', 'GTX-1650', 'No.1235-711-744-9980-7'),
(24, NULL, 'Dark Gray', 'BMW', '2.png', 'intel onboard', 'No.1235-711-744-9980-8');

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
(1, 'driver1', ''),
(2, 'driver2', ''),
(4, 'driver4', 'หฟแดฟห'),
(5, 'driver5', 'ฟหดฟห'),
(6, 'driver3', 'palm.txt');

-- --------------------------------------------------------

--
-- Table structure for table `driver_rent`
--

CREATE TABLE `driver_rent` (
  `id` int(11) NOT NULL,
  `rent_form_id` int(11) NOT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `approver_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `driver_rent`
--

INSERT INTO `driver_rent` (`id`, `rent_form_id`, `driver_id`, `approver_id`) VALUES
(6, 28, 1, NULL),
(7, 29, 1, NULL),
(8, 30, 2, NULL),
(9, 31, 1, 14),
(10, 32, NULL, 13),
(11, 33, NULL, 13),
(12, 34, 1, NULL),
(13, 35, 2, NULL),
(14, 36, 1, 14),
(15, 37, NULL, 13),
(16, 38, NULL, 13);

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `references_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rent_form`
--

INSERT INTO `rent_form` (`id`, `user_id`, `request`, `place`, `count`, `people`, `date_go`, `date_back`, `note`, `phone`, `created_at`, `updated_at`, `references_id`) VALUES
(28, 'user4', 'ดูงาน', 'ลาว', 'Other', '7-9', '2019-10-12 18:30:00', '2019-10-16 13:42:00', '', '9999', '2019-10-10 06:42:27', '0000-00-00 00:00:00', 'palm palm'),
(29, 'user4', 'เที่ยว', 'ภูเก็ต', 'Other', '10-13', '2019-10-16 18:30:00', '2019-10-18 18:30:00', '-', '9999', '2019-10-13 08:01:47', '0000-00-00 00:00:00', 'Anagepan Sombookit'),
(30, 'user4', 'ทัศนศึกษา', 'ปักกิ่ง', 'Bangkok', '7-9', '2019-10-23 18:00:00', '2019-10-25 00:00:00', '-', '9999', '2019-10-13 08:03:28', '0000-00-00 00:00:00', 'Vichai Srijintawiriya'),
(31, 'user4', 'ประชุม', 'เดอะมอล์บางแค', 'Bangkok', '7-9', '2019-10-16 00:00:00', '2019-10-17 00:00:00', '', '000000000000', '2019-10-16 02:44:01', '0000-00-00 00:00:00', 'Vichai Srijintawiriya'),
(32, 'user4', 'นรก', 'ขุม9', 'Other', '0-3', '2019-10-16 09:44:00', '2019-10-17 00:44:00', '', '9999', '2019-10-16 02:45:29', '0000-00-00 00:00:00', 'Sunisara Jamkrajang'),
(33, 'user4', 'เที่ยว', 'น้ำตก', 'Other', '10-13', '2019-10-16 09:46:00', '2019-10-21 17:46:00', '', '9999', '2019-10-16 02:46:58', '0000-00-00 00:00:00', 'Vichai Srijintawiriya'),
(34, 'user2', 'asf', 'ลาว', 'Other', '0-3', '2019-11-13 18:30:00', '2019-11-15 04:12:00', '', '093-732-8847', '2019-11-08 21:12:55', '0000-00-00 00:00:00', 'palm palm'),
(35, 'user2', 'aaaa', 'ลาว', 'Other', '4-6', '2019-11-12 04:13:00', '2019-11-14 04:13:00', '', '093-732-8847', '2019-11-08 21:13:30', '0000-00-00 00:00:00', 'Sunisara Jamkrajang'),
(36, 'user2', 'aaaaasdasd', 'ปแแกหอ', 'Bangkok', '7-9', '2019-11-15 04:13:00', '2019-11-28 04:14:00', '', '093-732-8847', '2019-11-08 21:14:04', '0000-00-00 00:00:00', 'Vichai Srijintawiriya'),
(37, 'car_reservation_user', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ' ', '', '2020-12-12 07:06:54', '0000-00-00 00:00:00', ''),
(38, 'car_reservation_user', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ' ', '', '2020-12-12 07:11:35', '0000-00-00 00:00:00', '');

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
('111', '111', 'Mary', 'Jane', 'approver', 'maryjane@ssru.ac.th', '065-567-1524', 'เจ้าหน้าที่เอกสาร', 'สำนักงานจีอี'),
('222', '222', 'Kara', 'Denvers', 'approver', 'karadenvers@ssru.ac.th', '089-568-8955', 'เจ้าหน้าที่เอกสาร', 'สำนักงานจีอี'),
('333', '333', 'Alex', 'Denvers', 'approver', 'alexdenvers@gmail.com', '084-541-5422', 'เจ้าหน้าที่เอกสาร', 'สำนักงานจีอี'),
('444', '444', 'Maggie', 'Souyers', 'approver', 'maggie@ssru.ac.th', '061-232-6638', 'เจ้าหน้าที่เอกสาร', 'สำนักงานจีอี'),
('car_reservation_admin', 'car_reservation_admin', ' Mhanmai', 'Titiyakrun', 'admin', 'admin@ssru.ac.th', '099-999-9999', 'เจ้าหน้าที่', 'สำนักงานจีอี'),
('car_reservation_approver', 'car_reservation_approver', 'Jane', 'Doe', 'approver', 'approver@ssru.ac.th', '055-555-5555', 'เจ้าหน้าที่เอกสาร', 'สำนักงานจีอี'),
('car_reservation_user', 'car_reservation_user', 'Anagepan', 'Sombookit', 'user', 'sombookit@ssru.ac.th', '060-174-9986', 'เจ้าหน้าที่', 'สำนักงานจีอี'),
('driver1', 'driver1', 'Singhakom', 'Meenayon', 'driver', 'sing@gmail.com', '085-957-5958', 'คนขับประจำ', 'สำนักงานจีอี'),
('driver2', 'driver2', 'Titikorn', 'Jarounpoozhorb', 'driver', 'jarounpoozhorb@yahoo.com', '099-142-7689', 'คนขับชั่วคราว', 'สำนักงานจีอี'),
('driver3', 'driver3', 'Yanakorn', 'Limtongkun', 'driver', 'limtongkun@hotmail.com', '062-663-7684', 'คนขับประจำ', 'สำนักงานจีอี'),
('driver4', 'driver4', 'Sonic', 'Rider', 'driver', 'sonypicture@gmail.com', '099-155-9595', 'คนขับชั่วคราว', 'สำนักงานจีอี'),
('driver5', 'driver5', 'Peter', 'Parker', 'driver', 'spiderman@outlook.com', '096-892-6642', 'คนขับชั่วคราว', 'สำนักงานจีอี'),
('user1', 'user1', 'Sunisara', 'Jamkrajang', 'user', 'sunisarajam@ssru.ac.th', '096-124-7489', 'เจ้าหน้าที่ฝึกหัด', 'สำนักงานจีอี'),
('user2', 'user2', 'Vichai', 'Srijintawiriya', 'user', 'srijintawiriya@ssru.ac.th', '093-732-8847', 'เจ้าหน้าที่ฝึกหัด', 'สำนักงานจีอี'),
('user3', 'user3', 'Wisarut', 'Witthaya', 'user', 's60122519000@ssru.ac.th', '066-268-2882', 'เจ้าหน้าที่', 'สำนักงานจีอี'),
('user4', 'user4', 'Sighasenee', 'Sutalra', 'user', 'Sutalra@hotmail.com', '092-789-9542', 'เจ้าหน้าที่', 'สำนักงานจีอี');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `approve_form`
--
ALTER TABLE `approve_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `driver_rent`
--
ALTER TABLE `driver_rent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `rent_form`
--
ALTER TABLE `rent_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

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
