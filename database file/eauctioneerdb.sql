-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2019 at 04:59 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eauctioneerdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidding`
--

CREATE TABLE `bidding` (
  `bno` int(11) NOT NULL,
  `busername` varchar(255) NOT NULL,
  `pid` int(11) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `bprice` int(11) NOT NULL DEFAULT 0,
  `bdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `bowner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidding`
--

INSERT INTO `bidding` (`bno`, `busername`, `pid`, `pname`, `bprice`, `bdate`, `bowner`) VALUES
(61, 'hassan_1998', 24, 'BMW X5 X5', 5035, '2019-11-16 19:36:10', 'talha_1998'),
(62, 'hassan_1998', 29, 'Viking Beard Oil', 70, '2019-11-16 19:36:28', 'uzair_1998'),
(63, 'hassan_1998', 27, 'BodyGuardz Ace Case', 200, '2019-11-16 19:36:40', 'talha_1998'),
(64, 'hassan_1998', 31, 'TACKLIFE Garden Tools', 532, '2019-11-16 19:37:12', 'talha_1998'),
(65, 'hassan_1998', 25, ' La Mer Soft Cream', 50, '2019-11-16 19:37:29', 'talha_1998'),
(66, 'hassan_1998', 26, 'Spindle Back Chairs', 150, '2019-11-16 19:37:40', 'talha_1998'),
(67, 'talha_1998', 29, 'Viking Beard Oil', 85, '2019-11-16 19:38:50', 'uzair_1998'),
(68, 'talha_1998', 28, 'Dailylux Case for iPhone', 105, '2019-11-16 19:39:04', 'hassan_1998'),
(69, 'talha_1998', 30, 'Automatic Soap Dispenser', 220, '2019-11-16 19:39:15', 'hassan_1998'),
(70, 'talha_1998', 32, 'Baebody Eye Gel', 40, '2019-11-16 19:39:26', 'hassan_1998'),
(71, 'uzair_1998', 24, 'BMW X5 X5', 6004, '2019-11-16 19:54:34', 'talha_1998'),
(72, 'uzair_1998', 25, ' La Mer Soft Cream', 80, '2019-11-16 19:54:45', 'talha_1998'),
(73, 'uzair_1998', 28, 'Dailylux Case for iPhone', 200, '2019-11-16 19:54:59', 'hassan_1998'),
(74, 'usama_1998', 24, 'BMW X5 X5', 7000, '2019-11-17 08:37:21', 'talha_1998'),
(75, 'hassan_1998', 33, 'honda 125', 500, '2019-11-24 07:43:01', 'abc_123');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feed_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `feedback` varchar(2000) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feed_id`, `username`, `feedback`, `date`) VALUES
(6, 'talha_1998', 'I would give Fivestars if I could. I won an item when the auction ended and then suddenly 24 hours was added back onto the timer. Thank You E-Auctioneer', '2019-11-17 00:00:00'),
(8, 'uzair_1998', 'I sent one email and within 5 minutes I received the discount, I never had service like that. ', '2019-11-17 00:00:00'),
(9, 'hassan_1998', 'Amazing customer service! My first win I had won a ring, i guess their system was having difficulty at the time so I emailed customer service and they were nice enough to help me', '2019-11-17 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `pdes` varchar(1000) NOT NULL,
  `pcat` varchar(255) NOT NULL,
  `pdate` datetime NOT NULL DEFAULT current_timestamp(),
  `pimg` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `pname`, `pdes`, `pcat`, `pdate`, `pimg`, `uname`) VALUES
(24, 'BMW X5 X5', '2018 reg, 11175 miles, Auto 2993cc Diesel, 5 door SUV, White. This beautiful white X5 is fully specced and comes with Comfort Access ', 'Automated Products', '2019-11-17 00:00:00', 'images/AETV10811456_1b.jpg', 'talha_1998'),
(25, ' La Mer Soft Cream', 'I challenge you to find a product line more full of secrecy and bizarre rumors! It was started by rocket scientist Max Huber, who used astrology to create  ', 'Beauty Products', '2019-11-17 00:00:00', 'http://localhost:8080/e-auctioneer/images/La_Mer.png', 'talha_1998'),
(26, 'Spindle Back Chairs', 'Solid wood construction\r\nIncludes two chairs\r\nBlack finish\r\nPair of spindle Back chairs from the new Grange collection\r\nTheir spindle Back detailing gives them a Classic appeal ', 'House Products', '2019-11-17 00:00:00', 'http://localhost:8080/e-auctioneer/images/81n-e-Di8WL._SL1500_.jpg', 'talha_1998'),
(27, 'BodyGuardz Ace Case', 'UNEQUAL IMPACT-ABSORBING TECHNOLOGY: Ace Pro cases harness the same impact-prevention technology used by professional athletes to protect against injury. Made with Kevlar and Accelleron, this â€œshear thickeningâ€ material absorbs the impact of a drop. ', 'Tech Products', '2019-11-17 00:00:00', 'http://localhost:8080/e-auctioneer/images/41MT5cNRbLL._SL1020_.jpg', 'talha_1998'),
(28, 'Dailylux Case for iPhone', 'Compatible with Apple iPhone 11 Pro Max 6.5 inch Case (2019 Release),NOT COMPATIBLE other iPhone Model\r\niPhone 11 Pro Max Case Safty: Raised bevel eage prevents camera and screen from being scratches, drops and stumbles in daily use. ', 'Tech Products', '2019-11-17 00:00:00', 'http://localhost:8080/e-auctioneer/images/A14DXquhuIL._SL1500_.jpg', 'hassan_1998'),
(29, 'Viking Beard Oil', 'TAME YOUR BEARD: Even the burliest of beards can be controlled with our organic beard oil conditioner. Restore softness and shine for a smooth and frizz-free beard or mustache in seconds.\r\nNO ITCHING OR SCRATCHING: Get rid of the dreaded beardruff! Add a few drops of beard oil treatment and your beard will feel excellent as well as look great all day long! ', 'Beauty Products', '2019-11-17 00:00:00', 'http://localhost:8080/e-auctioneer/images/410Z-Q3f7YL.jpg', 'uzair_1998'),
(30, 'Automatic Soap Dispenser', 'Water Resistant Battery operated automatic soap dispenser with 17 oz. capacity container.\r\nOn/Off switch and adjustable soap dispenser volume control switch, from 0.03~0.19 oz. per activation ', 'Automated Products', '2019-11-17 00:00:00', 'http://localhost:8080/e-auctioneer/images/814v0LYlM2L._SL1500_.jpg', 'hassan_1998'),
(31, 'TACKLIFE Garden Tools', 'Heavy duty stainless Steel - Tacklife gardening tools is Made of heavy duty stainless Steel, The tool is strong and durable, with a high hardness and no need to worry about rusting and breaking ', 'Others', '2019-11-17 00:00:00', 'http://localhost:8080/e-auctioneer/images/71vXJBdcNNL._SL1500_.jpg', 'talha_1998'),
(32, 'Baebody Eye Gel', 'MORNING & NIGHT EYE GEL: This eye gel helps reduce the appearance of puffiness, dark circles, under eye bags & wrinkles! No more heavy creams, this lightweight gel is the perfect product to awaken your eyes! ', 'Beauty Products', '2019-11-17 00:00:00', 'http://localhost:8080/e-auctioneer/images/71i-3AIeXcL._SL1500_.jpg', 'hassan_1998');

-- --------------------------------------------------------

--
-- Table structure for table `user-register`
--

CREATE TABLE `user-register` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `address` varchar(225) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user-register`
--

INSERT INTO `user-register` (`id`, `fname`, `lname`, `email`, `username`, `password`, `cname`, `address`, `image`) VALUES
(18, 'Talha', 'khan', 'imtalha@gmail.com', 'talha_1998', 'admin', 'Graphic Team Designer', '81 East Ketch Harbour Court\r\nSaint Albans, NY 11412', 'http://localhost:8080/e-auctioneer/images/Styling_0004_Styling.jpg'),
(20, 'Hassan', 'khan', 'imhassan@gmail.com', 'hassan_1998', 'admin', 'Game Development', '19 Westminster Road\r\nGreat Falls, MT 59404', 'http://localhost:8080/e-auctioneer/images/headshot_new.jpg'),
(21, 'Uzair ', 'khan', 'imuzair@gmail.com', 'uzair_1998', 'admin', 'Android team ', '19 Westminster Road\r\nGreat Falls, MT 59404', 'http://localhost:8080/e-auctioneer/images/Henry_Cao-Web.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidding`
--
ALTER TABLE `bidding`
  ADD PRIMARY KEY (`bno`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feed_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `user-register`
--
ALTER TABLE `user-register`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`,`username`),
  ADD UNIQUE KEY `email_2` (`email`,`username`),
  ADD KEY `email_3` (`email`,`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidding`
--
ALTER TABLE `bidding`
  MODIFY `bno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user-register`
--
ALTER TABLE `user-register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
