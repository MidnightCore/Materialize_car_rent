-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2019 at 10:41 AM
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
  `approver_id` int(11) NOT NULL,
  `status` text NOT NULL,
  `note` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'singq', ''),
(2, 'qqqfff', ''),
(4, 'ฟฟฟฟ', 'หฟแดฟห'),
(5, 'ฟฟฟฟ555', 'ฟหดฟห'),
(6, 'aaaoopp', 'palm.txt');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `references_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
('111', '698d51a19d8a121ce581499d7b701668', 'Mary', 'Jane', 'approver', 'maryjane@ssru.ac.th', '065-567-1524', 'เจ้าหน้าที่เอกสาร', 'สำนักงานจีอี'),
('123', '202cb962ac59075b964b07152d234b70', 'Vichai', 'Srijintawiriya', 'user', 'srijintawiriya@ssru.ac.th', '093-732-8847', 'เจ้าหน้าที่ฝึกหัด', 'สำนักงานจีอี'),
('12355', '7694f4a66316e53c8cdd9d9954bd611d', 'Noel', 'Escanorr', 'admin', 'escanorr@yahoo.com', '099-135-2424', 'เจ้าหน้าที่ชั่วคราว', 'สำนักงานจีอี'),
('222', 'bcbe3365e6ac95ea2c0343a2395834dd', 'Kara', 'Denvers', 'approver', 'karadenvers@ssru.ac.th', '089-568-8955', 'เจ้าหน้าที่เอกสาร', 'สำนักงานจีอี'),
('333', '310dcbbf4cce62f762a2aaa148d556bd', 'Alex', 'Denvers', 'approver', 'alexdenvers@gmail.com', '084-541-5422', 'เจ้าหน้าที่เอกสาร', 'สำนักงานจีอี'),
('444', '550a141f12de6341fba65b0ad0433500', 'Maggie', 'Souyers', 'approver', 'maggie@ssru.ac.th', '061-232-6638', 'เจ้าหน้าที่เอกสาร', 'สำนักงานจีอี'),
('aaaoopp', '47bce5c74f589f4867dbd57e9ca9f808', 'Yanakorn', 'Limtongkun', 'driver', 'limtongkun@hotmail.com', '062-663-7684', 'คนขับประจำ', 'สำนักงานจีอี'),
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Adminkung', 'Cessruzaa', 'admin', 'admin@ssru.ac.th', '099-555-9595', 'เจ้าหน้าที่', 'สำนักงานจีอี'),
('palm', '82051c7417e1a7921e72d101a64f96bf', 'Wisarut', 'Witthaya', 'user', 's60122519000@ssru.ac.th', '066-268-2882', 'เจ้าหน้าที่', 'สำนักงานจีอี'),
('qqqfff', '343d9040a671c45832ee5381860e2996', 'Titikorn', 'Jarounpoozhorb', 'driver', 'jarounpoozhorb@yahoo.com', '099-142-7689', 'คนขับชั่วคราว', 'สำนักงานจีอี'),
('sa', '47bce5c74f589f4867dbd57e9ca9f808', 'Sunisara', 'Jamkrajang', 'user', 'sunisarajam@ssru.ac.th', '096-124-7489', 'เจ้าหน้าที่ฝึกหัด', 'สำนักงานจีอี'),
('saasad', '47bce5c74f589f4867dbd57e9ca9f808', 'Anagepan', 'Sombookit', 'user', 'sombookit@ssru.ac.th', '060-174-9986', 'เจ้าหน้าที่', 'สำนักงานจีอี'),
('singq', 'e10adc3949ba59abbe56e057f20f883e', 'Singhakom', 'Meenayon', 'driver', 'sing@gmail.com', '085-957-5958', 'คนขับประจำ', 'สำนักงานจีอี'),
('ฟฟฟฟ', 'cf10fefbd923acd5ad133458fe4c169d', 'Sonic', 'Rider', 'driver', 'sonypicture@gmail.com', '099-155-9595', 'คนขับชั่วคราว', 'สำนักงานจีอี'),
('ฟฟฟฟ555', 'cf10fefbd923acd5ad133458fe4c169d', 'Peter', 'Parker', 'driver', 'spiderman@outlook.com', '096-892-6642', 'คนขับชั่วคราว', 'สำนักงานจีอี');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rent_form`
--
ALTER TABLE `rent_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
