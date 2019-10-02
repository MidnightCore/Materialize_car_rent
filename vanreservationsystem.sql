-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2019 at 02:36 PM
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
(11, 'Wileart', 'palm.txt', 1),
(12, 'Vatanika', 'palm.txt', 3);

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
(16, 1, 'Black', 'Mitsubishi', '', 'MX-80 2018', 'No.1350-3522-88-122'),
(17, NULL, 'Red', 'BMW', '', 'Rider 2019', 'No.1350-3522-88-123'),
(18, 2, 'Dark Gray', 'Mercedez Benz', '', 'Ascord S-01 2018', 'No.1350-3522-88-124'),
(19, 3, 'White Perl', 'Nissan', '', 'Horst-03', 'No.1350-3522-88-125'),
(20, NULL, 'Deep Blue', 'Nissan', 'palm.txt', 'Kisaa03-2017', 'No.1350-3522-88-126'),
(21, NULL, 'Red', 'BMW', '', 'Mid Year 2019', 'No.1350-3522-88-127'),
(22, NULL, 'Black', 'Subaru', 'palm.txt', 'Sifer F', 'No.1350-3522-88-128');

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
(1, 'singha', ''),
(2, 'kirathi', ''),
(3, 'Jane', ''),
(4, 'John', ''),
(6, 'Peerawat', 'palm.txt');

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
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rent_form`
--

INSERT INTO `rent_form` (`id`, `user_id`, `request`, `place`, `count`, `people`, `date_go`, `date_back`, `note`, `phone`, `created_at`, `updated_at`) VALUES
(15, '111', 'ไปสัมนาวิชาการเรื่องความปลอดภัย', 'อิมแพคอารีน่า เมืองทองธานี', 'กรุงเทพฯ', '4-6', '2019-09-23 18:30:00', '2019-09-25 18:30:00', '-', '095-778-6954', '2019-09-22 15:54:05', '2019-10-02 12:35:31');

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
('111', '111', 'Wisarut', 'Witthaya', 'user', 'wisarutwitthaya@ssru.ac.th', '095-778-6954', 'เจ้าหน้าที่', 'สำนักงานจีอี'),
('admin', 'admin', 'Adminmain', 'Mainadmin', 'admin', 'adminmain@ssru.ac.th', '097-174-9954', 'แอดมินหลัก', 'สำนักงานจีอี'),
('Arpidate', 'Arpidate', 'Arpidate', 'Boonme', 'user', 'moonaja@ssru.ac.th', '063-784-9532', 'เด็กเสิร์ฟ', 'วิศวะคอม'),
('Arpisada', 'Arpisada', 'Arpisada', 'Kojasri', 'user', 'lzaachillmcl@ssru.ac.th', '093-562-5325', 'เจ้าหน้าที่ฝึกหัด', 'สำนักงานจีอี'),
('Jane', 'Jane', 'Jane', 'Doe', 'driver', 'janedoe@yahoo.com', '087-2245-7478', 'คนขับประจำ', 'สำนักงานจีอี'),
('John', 'John', 'John', 'Doe', 'driver', 'johndoe@outlook.com', '098-152-7729', 'คนขับประจำ', 'สำนักงานจีอี'),
('kirathi', 'kirathi', 'kirathi', 'Pongpaiboon', 'driver', 'kirathi@yahoo.com', '090-063-7730', 'คนขับชั่วคราว', 'สำนักงานจีอี'),
('Misteradmin', 'Misteradmin', 'Misteradmin', 'najakung', 'admin', 'misteradmin@ssru.ac.th', '091-191-1911', 'แอดมินชั่วคราว', 'สำนักงานจีอี'),
('Niracha', 'Niracha', 'Niracha', 'Kanjanakongka', 'user', 'kanjanakongka@ssru.ac.th', '099-215-5257', 'เด็กเสิร์ฟ', 'วิศวะคอม'),
('Peerawat', 'Peerawat', 'Peerawat', 'Konghatsanakun', 'driver', 'konghatsanakun@outlook.com', '068-264-9605', 'คนขับชั่วคราว', 'สำนักงานจีอี'),
('Preeyada', 'Preeyada', 'Preeyada', 'Boursunthorn', 'user', 'daniejang@ssru.ac.th', '066-379-0036', 'เด็กเสิร์ฟ', 'วิศวะคอม'),
('singha', 'singha', 'Singha', 'Wirojanapaisarn', 'driver', 'singha@gmail.com', '085-957-5958', 'คนขับประจำ', 'สำนักงานจีอี'),
('Vatanika', 'Vatanika', 'Vatanika', 'Pattamasing na Ayutthaya', 'approver', 'vatanika@gmail.com', '095-995-8829', 'หัวหน้าฝ่ายตรวจเอกสาร', 'สำนักงานจีอี'),
('Wileart', 'Wileart', 'Wileart', 'Dumrongsind', 'approver', 'dumrongsind@ssru.ac.th', '085-237-0037', 'เจ้าหน้าที่ตรวจเอกสาร', 'สำนักงานจีอี');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `approve_form`
--
ALTER TABLE `approve_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
