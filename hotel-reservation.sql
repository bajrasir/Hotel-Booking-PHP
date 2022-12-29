-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2022 at 08:39 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel-reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `name`, `username`, `password`) VALUES
(1, 'anushbuzz', 'anushbuzz', 'e50e379a06990a84578348176326ce98'),
(3, 'check', 'check', '0ba4439ee9a46d9d9f14c60f88f45f87'),
(4, 'test', 'test', '098f6bcd4621d373cade4e832627b4f6'),
(5, 'test', 'test', '098f6bcd4621d373cade4e832627b4f6'),
(6, 'test1', 'test1', '5a105e8b9d40e1329780d62ea2265d8a');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `active` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_banner`
--

INSERT INTO `tbl_banner` (`id`, `image`, `title`, `description`, `active`) VALUES
(1, 'Banner_206.webp', 'Land of Hotel Nepal', 'This is a banner of our webpage which is used to show the content of the webpage.', 'yes'),
(3, 'Banner_109.webp', 'This is second banner ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, molestias velit quia\r\n labore impedit vel esse. Ipsum rerum exercitationem veritatis!', 'yes'),
(5, 'Banner_733.jpg', 'Test Banner', 'This is a test banner ', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `id` int(11) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `adult` int(11) NOT NULL,
  `child` int(11) NOT NULL,
  `room` varchar(100) NOT NULL,
  `numberofroom` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `message` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`id`, `checkin`, `checkout`, `adult`, `child`, `room`, `numberofroom`, `fullname`, `email`, `contact`, `address`, `message`, `status`) VALUES
(1, '1989-02-05', '2001-06-10', 721, 632, '1', 4, 'Donovan Duran', 'fogojuby@mailinator.com', '657', 'Arsenio Cobb', 'Doloremque anim nost', 'Not Approved'),
(2, '2004-07-11', '1984-08-07', 919, 95, '1', 4, 'Jesse Carver', 'poqarovip@mailinator.com', '685', 'Bert Griffin', 'Occaecat ut eaque ea', 'Not Approved'),
(3, '1983-07-24', '2011-02-22', 42, 96, '3', 12, 'Yvette Frye', 'canybomu@mailinator.com', '199', 'Whitney Huff', 'Sit mollitia sed ips', 'Not Approved'),
(4, '1979-11-27', '1986-10-01', 572, 911, '2', 4, 'Macey Brady', 'riqo@mailinator.com', '593', 'Tanisha Raymond', 'Esse qui aliqua Vol', 'Not Approved'),
(5, '1979-02-04', '1983-07-21', 731, 378, '2', 4, 'Barbara Brown', 'pycisucanu@mailinator.com', '70', 'Berk Mckinney', 'Aut non in nostrud m', 'Not Approved');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `number_of_room` int(11) NOT NULL,
  `bathroom` int(11) NOT NULL,
  `sofa` int(11) NOT NULL,
  `adult` int(11) NOT NULL,
  `child` int(11) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `active` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`, `image`, `number_of_room`, `bathroom`, `sofa`, `adult`, `child`, `description`, `price`, `active`) VALUES
(1, 'Deluxe Super Duper Room', 'Room_Category_180.webp', 0, 0, 0, 0, 0, 'Cozy room with very room and butter bread', 3500, 'yes'),
(2, 'Double Decker', 'Room_Category_227.webp', 4, 0, 0, 0, 0, 'This is dowble deckerb', 8000, 'yes'),
(3, 'Single Bed Room', 'Room_Category_173.webp', 0, 1, 1, 5, 5, 'This is the first description Test', 2000, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_partners`
--

CREATE TABLE `tbl_partners` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_partners`
--

INSERT INTO `tbl_partners` (`id`, `name`, `image`) VALUES
(1, 'Khalti', 'Partner_Category_742.webp'),
(2, 'Esewa', 'Partner_Category_371.webp');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_room`
--

CREATE TABLE `tbl_room` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `room` int(11) NOT NULL,
  `bathroom` int(11) NOT NULL,
  `sofa` int(11) NOT NULL,
  `facility` varchar(200) NOT NULL,
  `adult` int(11) NOT NULL,
  `child` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `active` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `post` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `facebook` varchar(200) NOT NULL,
  `linkedin` varchar(200) NOT NULL,
  `active` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`id`, `name`, `post`, `image`, `facebook`, `linkedin`, `active`) VALUES
(1, 'Ram Hari', 'Manager', 'Staff_231.webp', 'https://en.wikipedia.org/wiki/Facebook', '', 'no'),
(2, 'Krishna Hari', 'Head Cook', 'Staff_357.webp', 'www.hotel-krishna.com', 'www.hotel-krishna.com', 'yes'),
(3, 'Sita Krishna', 'Senior Receptionist', 'Staff_231.webp', 'https://en.wikipedia.org/wiki/Facebook', 'https://en.wikipedia.org/wiki/Facebook', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `email`, `password`, `code`) VALUES
(1, 'Anush Bajracharya', 'anushbajra@gmail.com', 'e50e379a06990a84578348176326ce98', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_partners`
--
ALTER TABLE `tbl_partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_room`
--
ALTER TABLE `tbl_room`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_partners`
--
ALTER TABLE `tbl_partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_room`
--
ALTER TABLE `tbl_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_room`
--
ALTER TABLE `tbl_room`
  ADD CONSTRAINT `tbl_room_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
