-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2020 at 04:35 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klaegen`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `image` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `image`) VALUES
(1, 'nathan', NULL, 'f5d1278e8109edd94e1e4197e04873b9', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `anonymous_complaint`
--

CREATE TABLE `anonymous_complaint` (
  `id` int(11) NOT NULL,
  `sender` varchar(256) DEFAULT NULL,
  `message` varchar(5000) DEFAULT NULL,
  `receiver` varchar(255) DEFAULT NULL,
  `replied` varchar(10) DEFAULT NULL,
  `dateSent` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anonymous_complaint`
--

INSERT INTO `anonymous_complaint` (`id`, `sender`, `message`, `receiver`, `replied`, `dateSent`) VALUES
(1, '859bd7b29f47caaa547bd58b5c2f6fcc', '', 'Beignet', NULL, '2020-04-13 15:29:21'),
(2, '859bd7b29f47caaa547bd58b5c2f6fcc', 'Really messed up man', 'Beignet', NULL, '2020-04-13 15:29:21'),
(3, '202000264', 'Hola Amigo', '4', 'true', '2020-04-13 15:29:21'),
(4, '202000264', 'Well well well', '4', 'true', '2020-04-13 16:15:45'),
(5, '202000264', 'Aqweeweerett', '4', 'true', '2020-04-15 09:40:18'),
(6, '202000264', 'broken tap', '4', NULL, '2020-04-15 09:40:42'),
(7, '202000264', 'another one', '4', 'true', '2020-04-15 10:10:30'),
(8, '201500111', 'lmlmmlmll', '5', NULL, '2020-04-15 10:31:09'),
(9, '202000264', 'again test new user', '7', NULL, '2020-04-15 19:59:09'),
(10, NULL, 'Dummy fix with new user test', '7', 'true', '2020-04-15 20:02:08'),
(11, '$2y$10$HmFyIj1aQnEKBWrwQ8bkXunYeOH5v0orEmX1fyKzMx8os/hLbY1Da', 'New Test With password_hash.', '7', 'true', '2020-04-16 08:11:38');

-- --------------------------------------------------------

--
-- Table structure for table `complaintcategory`
--

CREATE TABLE `complaintcategory` (
  `id` int(100) NOT NULL,
  `categoryName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaintcategory`
--

INSERT INTO `complaintcategory` (`id`, `categoryName`) VALUES
(4, 'Dormitory'),
(5, 'Cafeteria');

-- --------------------------------------------------------

--
-- Table structure for table `complaintfeedback`
--

CREATE TABLE `complaintfeedback` (
  `id` int(100) NOT NULL,
  `complaintID` int(100) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `feedback` varchar(9999) DEFAULT NULL,
  `sender` varchar(255) DEFAULT NULL,
  `dateSent` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaintfeedback`
--

INSERT INTO `complaintfeedback` (`id`, `complaintID`, `status`, `feedback`, `sender`, `dateSent`) VALUES
(6, 13, 'Processing', 'Working on it.', NULL, '2020-04-02 16:34:38'),
(7, 3, 'Processing', 'Testing 1', NULL, '2020-04-04 08:15:46'),
(8, 4, 'Processing', 'On s\'occupe de ca, salnip.', NULL, '2020-04-04 08:27:40'),
(9, 4, 'Closed', 'We solved it.', NULL, '2020-04-04 14:49:45'),
(10, 8, 'Processing', 'Ici latocuhe. dans Processing.', NULL, '2020-04-07 15:20:41'),
(11, 8, 'Closed', 'Alright Done with this.', NULL, '2020-04-07 16:47:50'),
(12, 9, 'Processing', 'I\'m processing it.Ltche', NULL, '2020-04-11 15:30:44');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `userID` int(100) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `categoryID` int(100) DEFAULT NULL,
  `sub_category` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `description` varchar(9999) DEFAULT NULL,
  `receiver` int(100) DEFAULT NULL,
  `date_issued` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(255) DEFAULT NULL,
  `notifCount` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `userID`, `title`, `categoryID`, `sub_category`, `picture`, `description`, `receiver`, `date_issued`, `status`, `notifCount`) VALUES
(2, 19, 'This sucs', 0, '', '', '', 0, '2020-04-04 08:13:30', NULL, NULL),
(3, 19, 'This sucks', 4, 'Room', 'Unavlbl.jpg', 'Essai  PADC', 2, '2020-04-04 08:14:27', 'Processing', NULL),
(4, 20, 'Salnip issue', 4, 'Room', 'Unavlbl.jpg', 'Le truc ne marche pas. Donc je ressaie. ', 3, '2020-04-04 08:25:13', 'Closed', NULL),
(5, 20, 'Test trois', 4, 'Select a Sub-category', '', 'Pourquoi', 1, '2020-04-04 08:33:51', NULL, NULL),
(6, 20, 'Test4', 4, 'Room', '', 'Je delire ou quoi', 1, '2020-04-04 08:35:03', NULL, NULL),
(7, 0, 'Test sunderman', 4, 'Room', '', 'Just saying hi to Latouche.', 4, '2020-04-06 16:52:09', NULL, NULL),
(8, 20, 'qiieeibef', 4, 'Room', '', 'ibeiivnreignvreig', 4, '2020-04-06 17:01:07', 'Closed', NULL),
(9, 20, 'Testing receiver', 4, 'Room', '', 'Sending it to Latouche', 4, '2020-04-11 15:29:11', 'Processing', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `complaints_old`
--

CREATE TABLE `complaints_old` (
  `id` int(11) NOT NULL,
  `userID` int(100) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `categoryID` int(100) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `sub_category` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `description` varchar(9999) DEFAULT NULL,
  `receiver` varchar(255) DEFAULT NULL,
  `date_issued` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `state` varchar(100) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaints_old`
--

INSERT INTO `complaints_old` (`id`, `userID`, `title`, `categoryID`, `category`, `sub_category`, `picture`, `description`, `receiver`, `date_issued`, `state`, `status`) VALUES
(12, 19, 'Light not working', 4, NULL, 'Room', 'bruh.PNG', 'Yesterday our light stopped working in the room', '2', '2020-04-02 16:07:44', NULL, NULL),
(13, 19, 'The test2', 4, NULL, 'Room', 'Priest.PNG', 'Stability issue.', '3', '2020-04-02 16:29:55', NULL, 'Processing');

-- --------------------------------------------------------

--
-- Table structure for table `complaint_subcategory`
--

CREATE TABLE `complaint_subcategory` (
  `id` int(100) NOT NULL,
  `categoryID` int(100) DEFAULT NULL,
  `subcategoryName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint_subcategory`
--

INSERT INTO `complaint_subcategory` (`id`, `categoryID`, `subcategoryName`) VALUES
(1, 5, 'Milk'),
(2, 4, 'Room'),
(3, 5, 'Payment'),
(4, 0, 'food');

-- --------------------------------------------------------

--
-- Table structure for table `logusers`
--

CREATE TABLE `logusers` (
  `id` int(10) NOT NULL,
  `uid` int(100) NOT NULL,
  `userID` varchar(255) NOT NULL,
  `userIP` varchar(16) NOT NULL,
  `state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logusers`
--

INSERT INTO `logusers` (`id`, `uid`, `userID`, `userIP`, `state`) VALUES
(26, 0, '201000252', '127.0.0.1', 1),
(27, 0, '201000252', '127.0.0.1', 1),
(28, 15, '201000252', '127.0.0.1', 1),
(29, 15, '201000252', '127.0.0.1', 1),
(30, 15, '201000252', '127.0.0.1', 1),
(31, 15, '201000252', '127.0.0.1', 1),
(32, 15, '201000252', '127.0.0.1', 1),
(33, 0, '201500101', '127.0.0.1', 0),
(34, 0, '201500101', '127.0.0.1', 0),
(35, 0, '201500999', '127.0.0.1', 0),
(36, 0, '201500999', '127.0.0.1', 0),
(37, 16, '201500264', '127.0.0.1', 1),
(38, 18, '201500269', '127.0.0.1', 1),
(39, 19, '201500111', '127.0.0.1', 1),
(40, 19, '201500111', '127.0.0.1', 1),
(41, 19, '201500111', '127.0.0.1', 1),
(42, 19, '201500111', '127.0.0.1', 1),
(43, 19, '201500111', '127.0.0.1', 1),
(44, 19, '201500111', '127.0.0.1', 1),
(45, 0, '20150011', '127.0.0.1', 0),
(46, 19, '201500111', '127.0.0.1', 1),
(47, 19, '201500111', '127.0.0.1', 1),
(48, 19, '201500111', '127.0.0.1', 1),
(49, 19, '201500111', '127.0.0.1', 1),
(50, 19, '201500111', '127.0.0.1', 1),
(51, 20, '202000264', '127.0.0.1', 1),
(52, 20, '202000264', '127.0.0.1', 1),
(53, 20, '202000264', '127.0.0.1', 1),
(54, 20, '202000264', '127.0.0.1', 1),
(55, 20, '202000264', '127.0.0.1', 1),
(56, 20, '202000264', '127.0.0.1', 1),
(57, 20, '202000264', '127.0.0.1', 1),
(58, 20, '202000264', '127.0.0.1', 1),
(59, 20, '202000264', '127.0.0.1', 1),
(60, 20, '202000264', '127.0.0.1', 1),
(61, 20, '202000264', '127.0.0.1', 1),
(62, 20, '202000264', '127.0.0.1', 1),
(63, 20, '202000264', '127.0.0.1', 1),
(64, 20, '202000264', '127.0.0.1', 1),
(65, 20, '202000264', '127.0.0.1', 1),
(66, 0, 'latouche', '127.0.0.1', 0),
(67, 0, 'latouche', '127.0.0.1', 0),
(68, 20, '202000264', '127.0.0.1', 1),
(69, 20, '202000264', '127.0.0.1', 1),
(70, 0, 'latouche', '127.0.0.1', 0),
(71, 20, '202000264', '127.0.0.1', 1),
(72, 20, '202000264', '127.0.0.1', 1),
(73, 20, '202000264', '127.0.0.1', 1),
(74, 20, '202000264', '127.0.0.1', 1),
(75, 20, '202000264', '127.0.0.1', 1),
(76, 0, '202000264', '127.0.0.1', 0),
(77, 20, '202000264', '127.0.0.1', 1),
(78, 20, '202000264', '127.0.0.1', 1),
(79, 20, '202000264', '127.0.0.1', 1),
(80, 21, '202000111', '127.0.0.1', 1),
(81, 20, '202000264', '127.0.0.1', 1),
(82, 19, '201500111', '127.0.0.1', 1),
(83, 21, '202000111', '127.0.0.1', 1),
(84, 19, '201500111', '127.0.0.1', 1),
(85, 19, '201500111', '127.0.0.1', 1),
(86, 20, '202000264', '127.0.0.1', 1),
(87, 20, '202000264', '127.0.0.1', 1),
(88, 20, '202000264', '127.0.0.1', 1),
(89, 20, '202000264', '127.0.0.1', 1),
(90, 20, '202000264', '127.0.0.1', 1),
(91, 20, '202000264', '127.0.0.1', 1),
(92, 20, '202000264', '127.0.0.1', 1),
(93, 19, '201500111', '127.0.0.1', 1),
(94, 19, '201500111', '127.0.0.1', 1),
(95, 20, '202000264', '127.0.0.1', 1),
(96, 20, '202000264', '127.0.0.1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reply_anonymous`
--

CREATE TABLE `reply_anonymous` (
  `id` int(100) NOT NULL,
  `sender` varchar(255) DEFAULT NULL,
  `reply` varchar(9999) DEFAULT NULL,
  `receiver` varchar(255) DEFAULT NULL,
  `messageID` int(100) DEFAULT NULL,
  `dateReplied` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply_anonymous`
--

INSERT INTO `reply_anonymous` (`id`, `sender`, `reply`, `receiver`, `messageID`, `dateReplied`) VALUES
(4, '4', 'Alright mate test2', NULL, 3, '2020-04-13 15:10:35'),
(5, '4', 'Alright mate test2', NULL, 3, '2020-04-13 15:19:06'),
(6, '4', 'Alright mate test2', NULL, 3, '2020-04-13 15:21:54'),
(7, '4', 'Alright mate test2', NULL, 3, '2020-04-13 15:26:03'),
(8, '4', 'Alright mate test2', NULL, 3, '2020-04-13 15:26:48'),
(9, '4', 'Alright mate test2', NULL, 3, '2020-04-13 15:27:29'),
(10, '4', 'Alright mate test2', NULL, 3, '2020-04-13 15:30:52'),
(11, '4', 'Alright mate test2', NULL, 3, '2020-04-13 15:36:37'),
(12, '4', 'Alright mate test2', NULL, 3, '2020-04-13 15:39:06'),
(13, '4', 'Alright mate test2', NULL, 3, '2020-04-13 15:39:34'),
(14, '4', 'Alright mate test2', NULL, 3, '2020-04-13 15:40:31'),
(15, '4', 'Alright mate test2', NULL, 3, '2020-04-13 15:41:29'),
(16, '4', 'Alright mate test2', NULL, 3, '2020-04-13 15:41:35'),
(17, '4', 'Alright mate test2', NULL, 3, '2020-04-13 15:42:45'),
(18, '4', 'Here we go again.', '4', 4, '2020-04-13 16:33:10'),
(19, '4', 'Acknowleged.', '4', 5, '2020-04-15 09:57:19'),
(20, '4', 'something', '4', 7, '2020-04-15 10:11:04'),
(21, '7', 'Ok fair enough.', NULL, 10, '2020-04-15 20:14:47'),
(22, '7', 'That works now.', NULL, 11, '2020-04-16 09:07:03');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(100) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `assignedComplaintID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `username`, `email`, `password`, `image`, `assignedComplaintID`) VALUES
(1, 'nathanstaff', NULL, 'e2fe7549a9c16389014a4f9ea09c6bea', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `staffusers`
--

CREATE TABLE `staffusers` (
  `id` int(100) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `office` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `phoneNumber` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffusers`
--

INSERT INTO `staffusers` (`id`, `fullName`, `username`, `image`, `email`, `password`, `office`, `position`, `phoneNumber`) VALUES
(1, NULL, 'Elonmusk', NULL, 'elonmusk@mail.com', '098f6bcd4621d373cade4e832627b4f6', 'IT110 AD2', 'Memesphere engineer', 11245574),
(2, 'Aspen Crow', 'Aspencrow', NULL, 'aspencrow@mail.com', '91a343c02e6c4e10b023216ecfcd69e7', 'AD101 EXT302', 'Salomon Hall RA', 963258741),
(3, 'Phaneendra Puppala', 'phaneen', NULL, 'phaneendra@apiu.edu', 'c81e728d9d4c2f636f067f89cc14862c', 'IT224', 'Dean CIS', 1938989),
(4, 'Latouche Laurent', 'latouche', 'e77304cc198a9066bfe2bb9f40ef1f1b.jpg', 'latouche@mail.com', '945e9f0b4e381b13aa70b94b89a28709', 'IT101', 'Chief Security Officer', 1101101),
(5, 'kaknkan', 'qwerty', NULL, 'kndk@ink.com', '098f6bcd4621d373cade4e832627b4f6', 'IT13', 'Someposition', 236896),
(7, 'Klag Donovan', 'klagdonov', NULL, 'klagdonov@test.com', '098f6bcd4621d373cade4e832627b4f6', 'AD 305', 'Plant Service Assistant', 9670987);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `idNumber` int(20) DEFAULT NULL,
  `dorm` varchar(255) DEFAULT NULL,
  `roomNumber` int(10) DEFAULT NULL,
  `Image` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `idNumber`, `dorm`, `roomNumber`, `Image`) VALUES
(1, 'nathan', 'stephane', 'nath@test.com', '3e47b75000b0924b6c9ba5759a7cf15d', 201500101, 'Elijah Hall', 212, NULL),
(5, 'tintin', 'cesourire', 'what@test.com', 'bee1c0f53d40e56f04a84dda46bbfbdb', 201500102, 'Salomon Hall', 505, NULL),
(6, 'norton', 'denovan', 'norton@tes.com', '1b7d9167ab164f30fa0d1e47497faef3', 201400876, 'Sarah Hall', 215, NULL),
(7, 'norton', 'denovan', 'norton@tes.com', '1b7d9167ab164f30fa0d1e47497faef3', 201400876, 'Sarah Hall', 215, NULL),
(8, 'Nav', 'than', 'nayth@gmau.com', '930e4e01d5113586bd4e37d71c8d9404', 201500260, 'Salomon Hall', 414, NULL),
(9, 'login', 'link', 'test@login.com', '013f9627f29838c7be865f3465c6740a', 201500147, 'Hall', 478, NULL),
(12, 'Getta', 'Nathan', 'nort@cide.com', '474aa46b872a1f8c2aad89230fcfc82d', 201500363, 'Luck', 471, NULL),
(16, 'Elon', 'musk', 'elonmusk@tesla.com', '098f6bcd4621d373cade4e832627b4f6', 201500264, 'Elijah Hall', 212, NULL),
(17, 'Elon', 'musk', 'elonmusk@tesla.com', '098f6bcd4621d373cade4e832627b4f6', 201500264, 'Elijah Hall', 212, NULL),
(18, 'Nishi', 'Pupp', 'nish@mail', 'c4ca4238a0b923820dcc509a6f75849b', 201500269, 'Elijah Hall', 101, NULL),
(19, 'test', 'tosterone', 'test@test.com', '098f6bcd4621d373cade4e832627b4f6', 201500111, 'Elijah Hall', 212, NULL),
(20, 'salsas', 'nippon', 'salnip@test.com', 'c0592d27574e54d1872216c5366a51fd', 202000264, 'Elijah Hall', 101, '31f93289db85d99c65588b3589e4e347.jpg'),
(21, 'qwerty', 'asd', 'qwe@bc.com', '098f6bcd4621d373cade4e832627b4f6', 202000111, 'Salomon', 211, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anonymous_complaint`
--
ALTER TABLE `anonymous_complaint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaintcategory`
--
ALTER TABLE `complaintcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaintfeedback`
--
ALTER TABLE `complaintfeedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints_old`
--
ALTER TABLE `complaints_old`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint_subcategory`
--
ALTER TABLE `complaint_subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logusers`
--
ALTER TABLE `logusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply_anonymous`
--
ALTER TABLE `reply_anonymous`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffusers`
--
ALTER TABLE `staffusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `anonymous_complaint`
--
ALTER TABLE `anonymous_complaint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `complaintcategory`
--
ALTER TABLE `complaintcategory`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `complaintfeedback`
--
ALTER TABLE `complaintfeedback`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `complaints_old`
--
ALTER TABLE `complaints_old`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `complaint_subcategory`
--
ALTER TABLE `complaint_subcategory`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `logusers`
--
ALTER TABLE `logusers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `reply_anonymous`
--
ALTER TABLE `reply_anonymous`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staffusers`
--
ALTER TABLE `staffusers`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
