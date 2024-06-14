-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2024 at 04:34 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `invoice_no` varchar(60) NOT NULL,
  `product_id` int(11) NOT NULL,
  `total` float NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `invoice_no`, `product_id`, `total`, `status`) VALUES
(151, '241718373825', 24, 145, 1),
(152, '121718374440', 12, 458000, 0),
(153, '101718374550', 10, 45000, 0),
(156, '151718375108', 15, 4566, 0),
(157, '151718375329', 15, 4566, 0),
(158, '151718375394', 15, 4566, 0),
(159, '151718375454', 15, 4566, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(45) DEFAULT NULL,
  `UserName` varchar(50) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 9845632210, 'mallakush@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-12-29 06:21:53');

-- --------------------------------------------------------

--
-- Table structure for table `tblartist`
--

CREATE TABLE `tblartist` (
  `ID` int(10) NOT NULL,
  `Name` varchar(250) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `Education` mediumtext DEFAULT NULL,
  `Award` mediumtext DEFAULT NULL,
  `Profilepic` varchar(250) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblartist`
--

INSERT INTO `tblartist` (`ID`, `Name`, `MobileNumber`, `Email`, `Education`, `Award`, `Profilepic`, `CreationDate`) VALUES
(11, 'Nishant Rajput', 9856321452, 'greg@gmail.com', '', '', '3578f5208e3593960a6e7fccfa995a2f.jpg', '2024-02-13 16:25:28'),
(12, 'Jessamine Acevedo', 898959959, 'hilume@mailinator.com', '', '', '66ab0ef6e156db7046eb59ec94099d67.jpg', '2024-02-13 16:34:28'),
(13, 'Blake Witt', 515161516, 'lojekoji@mailinator.com', '', '', '14fae52edb39b851f801bd4dbdf73d64.jpg', '2024-02-13 16:34:41'),
(14, 'Picasso', 125, 'qefupasage@mailinator.com', '', '', 'c1f620e6e8f3ed339985cca48236795e.jpg', '2024-02-17 03:47:32'),
(15, 'Van Goh', 4562626, 'sfs@gmail.com', '', '', 'f62514fdccb3727123fa72f883da58a4.jpg', '2024-02-17 04:35:58'),
(16, 'Benedict Rath', 986, 'your.email+fakedata55134@gmail.com', '', '', '3578f5208e3593960a6e7fccfa995a2f.jpg', '2024-02-17 14:14:39'),
(17, 'Shyann Bahringer', 8966, 'your.email+fakedata49378@gmail.com', '', '', '3ade04cb91182a2ac975bac9f07d79f7.png', '2024-02-17 15:28:40'),
(18, 'Finn Leuschke-Upton', 9866, 'your.email+fakedata42217@gmail.com', '', '', '6e5c97db9399ea9897a84ddf14317697.jpg', '2024-02-17 15:48:54'),
(23, 'Araniko', 985223, 'abc@gmail.com', '', '', '0e00462b10fe6bccbac165f4e3a18c96.jpg', '2024-02-17 19:23:11');

-- --------------------------------------------------------

--
-- Table structure for table `tblartmedium`
--

CREATE TABLE `tblartmedium` (
  `ID` int(5) NOT NULL,
  `ArtMedium` varchar(250) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblartmedium`
--

INSERT INTO `tblartmedium` (`ID`, `ArtMedium`, `CreationDate`) VALUES
(15, 'Wood and Bronze', '2024-02-13 16:32:07'),
(16, 'Metal', '2024-02-13 16:32:22'),
(17, 'Oil on Canvas', '2024-02-13 16:32:36'),
(18, 'Oil on Linen', '2024-02-13 16:32:45'),
(19, 'AI Tools', '2024-02-17 03:47:49'),
(21, 'Case tools', '2024-02-17 15:29:00'),
(25, 'Clay', '2024-02-17 19:23:27');

-- --------------------------------------------------------

--
-- Table structure for table `tblartproduct`
--

CREATE TABLE `tblartproduct` (
  `ID` int(5) NOT NULL,
  `Title` varchar(250) DEFAULT NULL,
  `Dimension` varchar(250) DEFAULT NULL,
  `Orientation` varchar(100) DEFAULT NULL,
  `Size` varchar(100) DEFAULT NULL,
  `Artist` int(5) DEFAULT NULL,
  `ArtType` int(5) DEFAULT NULL,
  `ArtMedium` int(5) DEFAULT NULL,
  `SellingPricing` decimal(10,0) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `Image` varchar(250) DEFAULT NULL,
  `Image1` varchar(250) DEFAULT NULL,
  `Image2` varchar(250) DEFAULT NULL,
  `Image3` varchar(250) DEFAULT NULL,
  `Image4` varchar(250) DEFAULT NULL,
  `RefNum` int(10) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblartproduct`
--

INSERT INTO `tblartproduct` (`ID`, `Title`, `Dimension`, `Orientation`, `Size`, `Artist`, `ArtType`, `ArtMedium`, `SellingPricing`, `Description`, `Image`, `Image1`, `Image2`, `Image3`, `Image4`, `RefNum`, `CreationDate`) VALUES
(9, 'Nataraaja', '456*456', 'Potrait', 'Medium', 12, 12, 15, '90000', 'Sculpture of the Hindu god Nataraja', 'fab87f3cb5c1af1251e9fd7f070f4a5d1708142040.jpg', '', '', '', '', 655923970, '2024-02-17 03:54:00'),
(10, 'La Belle Ferroniere', '460*460', 'Potrait', NULL, 14, 18, 17, '45000', 'This is the portrait of La Belle Ferroniere. ', 'd344e9c38aeca1d223bd40f0e1f69be81708144394.jpg', '', '', '', '', 260648929, '2024-02-17 04:33:14'),
(12, 'Starry Night', '480*400', 'Landscape', '', 15, 18, 17, '458000', '\"Starry Night\" is an iconic masterpiece by Vincent van Gogh, capturing the night sky in swirling, vivid patterns.', '1ba74d15cc1f14dbea12552222ac2b561708144834.jpg', '', '', '', '', 345769310, '2024-02-17 04:40:34'),
(14, 'Marilyn Monroe', '450*450', 'Potrait', '', 13, 14, 18, '71000', 'This depicts the portrait of famous hollywood actress Marilyn Monroe by Andy Warhol', 'd9e23cff38fadae867f8ed9741109ef31708147913jpeg', '', '', '', '', 844861408, '2024-02-17 05:31:53'),
(15, 'Eye', '456*456', 'Landscape', NULL, 15, 14, 17, '4566', 'This is also demo', '68743e3250dc526ef2b0aa8f232c7be81708148237.jpg', '', '', '', '', 570457727, '2024-02-17 05:37:17'),
(24, 'Hindu Deity', '45*78', 'Potrait', NULL, 23, 18, 21, '145', 'This painting symbolizes hindu deity who punishes wrongdoers', '28cb655103ad21a7ccbf1be279d89ed71717832676.jpg', '', '', '', '', 811198731, '2024-06-08 07:44:36');

-- --------------------------------------------------------

--
-- Table structure for table `tblarttype`
--

CREATE TABLE `tblarttype` (
  `ID` int(5) NOT NULL,
  `ArtType` varchar(250) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblarttype`
--

INSERT INTO `tblarttype` (`ID`, `ArtType`, `CreationDate`) VALUES
(12, 'Sculpture', '2024-02-13 16:30:46'),
(14, 'Street Art', '2024-02-13 16:31:09'),
(17, 'AI', '2024-02-17 03:47:39'),
(18, 'Painting', '2024-02-17 04:28:21'),
(20, 'Digital Arts', '2024-02-17 15:28:52'),
(25, 'Clay art', '2024-02-17 19:23:20');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `id` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcontact`
--

INSERT INTO `tblcontact` (`id`, `name`, `phone`, `email`, `message`) VALUES
(30, 'Lydia Kertzmann', 432145138, 'your.email+fakedata80606@gmail.com', 'Nesciunt odio repellendus libero alias quas vitae sed.'),
(31, 'Joaquin Smith', 153038830, 'your.email+fakedata93019@gmail.com', 'Nihil animi sequi reiciendis et beatae nobis quasi.'),
(35, 'Astrid Emard', 158070852, 'your.email+fakedata68158@gmail.com', 'Sapiente corporis voluptatibus quis molestias facere.'),
(37, 'Anais Kuhlman', 835774144, 'your.email+fakedata88347@gmail.com', 'Accusantium illum minima non laudantium dolorem natus nam.');

-- --------------------------------------------------------

--
-- Table structure for table `tblenquiry`
--

CREATE TABLE `tblenquiry` (
  `ID` int(10) NOT NULL,
  `EnquiryNumber` varchar(10) NOT NULL,
  `Artpdid` int(9) DEFAULT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Message` varchar(250) DEFAULT NULL,
  `EnquiryDate` timestamp NULL DEFAULT current_timestamp(),
  `Status` varchar(10) DEFAULT NULL,
  `AdminRemark` varchar(200) NOT NULL,
  `AdminRemarkdate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblenquiry`
--

INSERT INTO `tblenquiry` (`ID`, `EnquiryNumber`, `Artpdid`, `FullName`, `Email`, `MobileNumber`, `Message`, `EnquiryDate`, `Status`, `AdminRemark`, `AdminRemarkdate`) VALUES
(5, '389451469', 9, 'Raj Bahadur', 'abc@gmail.com', 2652262, 'I want to buy this product\r\n', '2024-02-17 14:09:31', 'Answer', 'This product is not buyable', '2024-02-17 14:10:00'),
(9, '994931946', 18, 'Lucas Feil', 'your.email+fakedata15045@gmail.com', 261552443, 'Ipsam minima ducimus quibusdam earum et veniam.', '2024-02-17 16:58:56', NULL, '', NULL),
(12, '865398602', 9, 'Macaulay Norman', 'rore@mailinator.com', 989562, 'Quod porro officia v', '2024-02-17 18:51:47', 'Answer', 'sfds', '2024-02-17 18:52:00'),
(13, '328772327', 17, 'Gregg Nikolaus', 'your.email+fakedata92840@gmail.com', 435321053, 'Recusandae ea recusandae autem sunt vel magnam deserunt.', '2024-02-17 18:54:34', 'Answer', 's', '2024-02-17 18:55:10'),
(15, '541745159', 21, 'Adan Hammes', 'your.email+fakedata10047@gmail.com', 130723986, 'Facere doloribus eos voluptate nostrum porro nihil.', '2024-02-17 18:58:19', NULL, '', NULL),
(16, '961386729', 14, 'Charlotte Herman', 'your.email+fakedata39865@gmail.com', 949082705, 'Accusamus doloremque numquam incidunt alias vero.', '2024-02-17 19:22:44', 'Answer', 'checked.', '2024-02-17 19:24:09'),
(17, '451851675', 22, 'Freddie Stiedemann', 'your.email+fakedata78900@gmail.com', 162207368, 'Aut alias eveniet voluptates asperiores reiciendis beatae qui.', '2024-02-17 19:24:43', NULL, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` date DEFAULT NULL,
  `Timing` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`, `Timing`) VALUES
(1, 'aboutus', 'About Us', '<div><span style=\"font-size: 16px; color: rgb(32, 33, 36); font-family: arial, sans-serif;\">Welcome to <b>Artworks</b>, where art comes to life and creativity knows no bounds. Our gallery is a celebration of artistic expression, showcasing a diverse collection of works that span various styles, mediums, and perspectives. Here, we invite you to embark on a visual journey that transcends boundaries and sparks the imagination.</span><br></div>', NULL, NULL, NULL, ''),
(2, 'contactus', 'Contact Us', 'Lazimpat Sadak, Kathmandu 45600', 'artworks@gmail.com', 9845612782, NULL, '9:00 am to 6:00 pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblartist`
--
ALTER TABLE `tblartist`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblartmedium`
--
ALTER TABLE `tblartmedium`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblartproduct`
--
ALTER TABLE `tblartproduct`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblarttype`
--
ALTER TABLE `tblarttype`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblenquiry`
--
ALTER TABLE `tblenquiry`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CardId` (`Artpdid`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblartist`
--
ALTER TABLE `tblartist`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tblartmedium`
--
ALTER TABLE `tblartmedium`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tblartproduct`
--
ALTER TABLE `tblartproduct`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tblarttype`
--
ALTER TABLE `tblarttype`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tblenquiry`
--
ALTER TABLE `tblenquiry`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
