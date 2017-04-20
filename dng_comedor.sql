-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2017 at 04:55 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dng_comedor`
--

-- --------------------------------------------------------

--
-- Table structure for table `catering_member`
--

CREATE TABLE `catering_member` (
  `ctm_id` int(11) NOT NULL,
  `ct_name` varchar(111) NOT NULL,
  `ctm_member` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catering_member`
--

INSERT INTO `catering_member` (`ctm_id`, `ct_name`, `ctm_member`) VALUES
(7, 'Team1', 'Mahal,Mura,Rose,Daisy\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `catering_team`
--

CREATE TABLE `catering_team` (
  `ct_id` int(11) NOT NULL,
  `ct_contact` varchar(100) NOT NULL,
  `ct_name` varchar(111) NOT NULL,
  `power` enum('KATERER','ADMIN') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `combo`
--

CREATE TABLE `combo` (
  `id` int(11) NOT NULL,
  `comboname` varchar(100) NOT NULL,
  `combolist` varchar(100) NOT NULL,
  `mcat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `combo`
--

INSERT INTO `combo` (`id`, `comboname`, `combolist`, `mcat`) VALUES
(1, '250', '1 soup/3 main course/1 salad/1 desert/rice/soft drinks', 'lunch_and_dinner'),
(2, '315', '1 soup/4 main course/1 salad/1 desert/rice/soft drinks', 'lunch_and_dinner'),
(3, '400', '1 soup/4 main course/2 salad/2 desert/rice/soft drinks', 'lunch_and_dinner'),
(4, '285', '2 pasta/2 meat/3 bread/2 dessert/softdrinks', 'merienda');

-- --------------------------------------------------------

--
-- Table structure for table `falied`
--

CREATE TABLE `falied` (
  `id` int(11) NOT NULL,
  `attempt` int(11) NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `falied`
--

INSERT INTO `falied` (`id`, `attempt`, `time`) VALUES
(1, 0, '09:31:41');

-- --------------------------------------------------------

--
-- Table structure for table `functionhall`
--

CREATE TABLE `functionhall` (
  `id` int(11) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `functionhall`
--

INSERT INTO `functionhall` (`id`, `picture`, `description`) VALUES
(1, '1.jpg', 'jkyuy'),
(2, '2.jpg', 'jkhnu ui;mhi'),
(3, '3.jpg', 'yniyntytyty'),
(4, '4.jpg', 'dxcfvgbhnjmk,dsfghjkcvbnm');

-- --------------------------------------------------------

--
-- Table structure for table `maincategory`
--

CREATE TABLE `maincategory` (
  `mc_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maincategory`
--

INSERT INTO `maincategory` (`mc_id`, `name`) VALUES
(1, 'Sarapan'),
(2, 'Minum petang'),
(3, 'Makan Tengahari/Malam');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `mcat` varchar(100) NOT NULL,
  `scat` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` varchar(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `mcat`, `scat`, `name`, `description`, `price`, `image`) VALUES
(73, 'Sarapan', 'roti', 'roti sandwich', 'roti+telur+salad', '1.50', 'sandwich.jpg'),
(74, 'Makan Tengahari/Malam', 'sayuran', 'sayur campur', 'lobak merah+kubis bunga+suhun ', '0.50', 'sayur campur.JPG'),
(75, 'Minum petang', 'minuman', 'teh tarik', 'teh+susu', '1.00', '04-OLDTOWN-Teh-Tarik.jpg'),
(76, 'Makan Tengahari/Malam', 'udang', 'udang masak sambal', 'udang+sambal mmerah', '4.00', 'udang');

-- --------------------------------------------------------

--
-- Table structure for table `menu_res`
--

CREATE TABLE `menu_res` (
  `id` int(11) NOT NULL,
  `res_id` varchar(100) NOT NULL,
  `menu` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `res_id` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `motif` varchar(100) NOT NULL,
  `venueaddress` varchar(100) NOT NULL,
  `type_events` varchar(100) NOT NULL,
  `type_res` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `pax` varchar(100) NOT NULL,
  `combo` int(11) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `type_catering` varchar(100) NOT NULL,
  `team` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `resdate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `res_id`, `firstname`, `lastname`, `address`, `contact`, `motif`, `venueaddress`, `type_events`, `type_res`, `date`, `pax`, `combo`, `amount`, `type_catering`, `team`, `status`, `time`, `resdate`) VALUES
(1, 'RS-VR24Q3NI', 'hawa', 'akira', 'no20', '0166437857', 'birthday', 'cili api steamboat and grill taman u', 'party', 'catering', '04/30/2017', '30', 0, '0', 'specialty', '', 'Pending', '7PM', '04/15/2017'),
(2, 'RS-VR24Q3NI', 'hawa', 'akira', 'no20', '0166437857', 'birthday', 'FSKTM', 'party', 'catering', '04/30/2017', '50', 0, '0', 'lunch_and_dinner', '', 'Pending', '12PM', '04/15/2017'),
(3, 'RS-ZZCV0WRR', 'siti', 'hawa', 'no 320', '0164536289', 'makan2', 'prt bengkok', 'kesyukuran', 'catering', '05/01/2017', '100', 2, '31500', 'lunch_and_dinner', '', 'Pending', '8PM', '04/16/2017'),
(4, 'RS-DMV0PKZJ', 'ateen', 'aziz', 'no1', '0145380309', 'party', 'prt hj rais', 'birthday', 'catering', '05/08/2017', '100', 0, '0', 'lunch_and_dinner', '', 'Pending', '10AM', '04/17/2017');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `sc_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`sc_id`, `name`) VALUES
(1, 'sup'),
(2, 'kari'),
(3, 'ayam'),
(4, 'ikan'),
(5, 'daging lembu'),
(6, 'daging kambing'),
(7, 'udang'),
(9, 'sotong'),
(10, 'sayuran'),
(11, 'mee'),
(12, 'bihun'),
(13, 'kuey teow'),
(14, 'minuman'),
(15, 'nasi'),
(16, 'roti');

-- --------------------------------------------------------

--
-- Table structure for table `suggestion`
--

CREATE TABLE `suggestion` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `comment` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suggestion`
--

INSERT INTO `suggestion` (`id`, `name`, `subject`, `comment`) VALUES
(8, 'liza Dumaran', 'Food', 'The food is the best....amazing....'),
(9, 'jerry mueda', 'Food', 'your food is very good');

-- --------------------------------------------------------

--
-- Table structure for table `type_of_reservation`
--

CREATE TABLE `type_of_reservation` (
  `tr_id` int(11) NOT NULL,
  `tr_description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_of_reservation`
--

INSERT INTO `type_of_reservation` (`tr_id`, `tr_description`) VALUES
(1, 'catering'),
(2, 'catering'),
(3, 'catering'),
(4, 'catering'),
(5, 'catering'),
(6, 'catering'),
(7, 'catering'),
(8, 'catering'),
(9, 'functionroom'),
(10, 'functionroom'),
(11, 'functionroom'),
(12, 'functionroom'),
(13, 'catering'),
(14, 'catering'),
(15, 'catering'),
(16, 'functionroom'),
(17, 'catering'),
(18, 'catering'),
(19, 'catering'),
(20, 'catering'),
(21, 'catering'),
(22, 'catering'),
(23, 'functionroom'),
(24, 'catering'),
(25, 'catering'),
(26, 'catering'),
(27, 'catering'),
(28, 'catering'),
(29, 'catering'),
(30, 'catering'),
(31, 'catering'),
(32, 'catering'),
(33, 'catering'),
(34, 'catering'),
(35, 'catering'),
(36, 'catering'),
(37, 'catering'),
(38, 'catering'),
(39, 'catering'),
(40, 'catering'),
(41, 'catering'),
(42, 'catering'),
(43, 'functionroom'),
(44, 'catering'),
(45, 'catering'),
(46, 'catering'),
(47, 'catering'),
(48, 'catering'),
(49, 'catering'),
(50, 'catering'),
(51, 'catering'),
(52, 'catering'),
(53, 'catering'),
(54, 'functionroom'),
(55, 'catering'),
(56, 'functionroom'),
(57, 'catering'),
(58, 'catering'),
(59, 'catering'),
(60, 'catering'),
(61, 'catering'),
(62, 'catering'),
(63, 'catering'),
(64, 'functionroom'),
(65, 'catering'),
(66, 'catering'),
(67, 'catering'),
(68, 'catering'),
(69, 'catering'),
(70, 'catering'),
(71, 'catering'),
(72, 'catering'),
(73, 'catering');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `power` enum('KATERER','ADMIN') DEFAULT NULL,
  `com_name` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` varchar(111) NOT NULL,
  `cer_no` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `power`, `com_name`, `contact`, `address`, `cer_no`) VALUES
(1, 'ADMIN', 'admin', 'ADMIN', '', '0', '0', '0'),
(2, 'zee&i ent', '1234', 'KATERER', '', '0', '0', '0'),
(3, 'zainah katering', '1111', 'KATERER', '', '0', '0', '0'),
(4, 'restoren bp briani power', '4444', 'KATERER', '', '0', '0', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catering_member`
--
ALTER TABLE `catering_member`
  ADD PRIMARY KEY (`ctm_id`);

--
-- Indexes for table `catering_team`
--
ALTER TABLE `catering_team`
  ADD PRIMARY KEY (`ct_id`);

--
-- Indexes for table `combo`
--
ALTER TABLE `combo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `falied`
--
ALTER TABLE `falied`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `functionhall`
--
ALTER TABLE `functionhall`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maincategory`
--
ALTER TABLE `maincategory`
  ADD PRIMARY KEY (`mc_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_res`
--
ALTER TABLE `menu_res`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`sc_id`);

--
-- Indexes for table `suggestion`
--
ALTER TABLE `suggestion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_of_reservation`
--
ALTER TABLE `type_of_reservation`
  ADD PRIMARY KEY (`tr_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catering_member`
--
ALTER TABLE `catering_member`
  MODIFY `ctm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `catering_team`
--
ALTER TABLE `catering_team`
  MODIFY `ct_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `combo`
--
ALTER TABLE `combo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `falied`
--
ALTER TABLE `falied`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `functionhall`
--
ALTER TABLE `functionhall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `maincategory`
--
ALTER TABLE `maincategory`
  MODIFY `mc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `menu_res`
--
ALTER TABLE `menu_res`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `sc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `suggestion`
--
ALTER TABLE `suggestion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `type_of_reservation`
--
ALTER TABLE `type_of_reservation`
  MODIFY `tr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
