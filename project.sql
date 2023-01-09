-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2022 at 10:08 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `aid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`aid`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `mycart`
--

CREATE TABLE `mycart` (
  `cartid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `cartqty` int(11) NOT NULL DEFAULT 1,
  `carttitle` varchar(30) NOT NULL,
  `cartdesc` varchar(100) NOT NULL,
  `cartprice` int(10) NOT NULL,
  `cartimg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mycart`
--

INSERT INTO `mycart` (`cartid`, `userid`, `pid`, `cartqty`, `carttitle`, `cartdesc`, `cartprice`, `cartimg`) VALUES
(9, 43, 17, 1, 'boAt Rockerz 450 Bluetooth On ', 'Active Noise Cancellation, Bluetooth Wireless Over Ear Headphones with Mic with 40Mm Drivers, Upto 2', 5000, 'admin/product-photos/h-2.jpg'),
(13, 43, 1, 3, 'EvoFox Game Box TV Gaming Cons', 'Smart Remote and Game Controller | 4GB RAM, 32 GB Storage | Dedicated GPU, Quad Core Processor | Dua', 8000, 'admin/product-photos/g-2.jpg'),
(57, 55, 18, 1, '2021 Apple MacBook Pro ', '16-inch 41.05 cm, Apple M1 Max chip with 10‑core CPU and 32‑core GPU, 32GB RAM, 1TB SSD - Space Grey', 90000, 'admin/product-photos/l-2.jpg'),
(78, 44, 6, 1, 'MEETION Gaming Mouse', 'Black Wired Gaming Mouse with LED Backlit, 5+1 Buttons, Optical A704\r\n                              ', 2500, 'admin/product-photos/g-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oid` int(11) NOT NULL,
  `ogrp_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `adrid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = pending\r\n1 = delivered'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oid`, `ogrp_id`, `uid`, `adrid`, `pid`, `qty`, `date`, `status`) VALUES
(40, 7424, 44, 39, 24, 2, '2022-11-09', 0),
(41, 7424, 44, 39, 19, 1, '2022-11-09', 1),
(42, 7619, 57, 40, 19, 1, '2022-11-09', 0),
(43, 7723, 57, 41, 23, 1, '2022-11-09', 1),
(44, 7920, 57, 42, 20, 2, '2022-11-15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product-catagory`
--

CREATE TABLE `product-catagory` (
  `cid` int(11) NOT NULL,
  `cname` varchar(30) NOT NULL,
  `slug` varchar(30) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0= enable,1= Disable',
  `issubset` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product-catagory`
--

INSERT INTO `product-catagory` (`cid`, `cname`, `slug`, `status`, `issubset`) VALUES
(1, 'mobile', 'mobiles', 0, 0),
(2, 'laptop', 'laptops', 0, 0),
(3, 'watch', 'smart watches', 0, 0),
(4, 'audio', 'Audio items', 0, 1),
(13, 'gaming', 'gaming products', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `cid` int(11) NOT NULL,
  `subid` int(11) NOT NULL DEFAULT 0,
  `price` int(8) NOT NULL,
  `dis-price` int(8) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `pimg` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0= enable,1= Disable'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `pname`, `cid`, `subid`, `price`, `dis-price`, `desc`, `pimg`, `status`) VALUES
(1, 'EvoFox Game Box TV Gaming Cons', 13, 31, 10000, 8000, 'Smart Remote and Game Controller | 4GB RAM, 32 GB Storage | Dedicated GPU, Quad Core Processor | Dual-Band WiFi | Fox OS | 4k HDMI Output | Bluetooth 5.0 (Coal Black)', 'admin/product-photos/g-2.jpg', 1),
(6, 'MEETION Gaming Mouse', 13, 30, 3000, 2500, 'Black Wired Gaming Mouse with LED Backlit, 5+1 Buttons, Optical A704\r\n                                            Sensor, 800 to 2400 DPI, Soft Touch Switch, Ergonomic Symmetric Design for  ', 'admin/product-photos/g-1.jpg', 0),
(13, 'Amazfit Smart Watch', 3, 0, 4000, 2000, 'Always-on AMOLED Display, Alexa Built-in, SpO2, 14 Days Battery Life, 68 Sports Modes, GPS, HR, Sleep & Stress Monitoring (Breeze Blue)', 'admin/product-photos/w-1.jpeg', 1),
(14, 'Fire-Boltt Ninja 3 Smartwatch', 3, 0, 3000, 2000, 'Full Touch 1.69 & 60 Sports Modes with IP68, Sp02 Tracking, Over 100 Cloud based watch faces', 'admin/product-photos/w-2.jpg', 0),
(15, 'Apple Watch SE ', 3, 25, 10000, 8000, 'Space Grey Aluminium Case with Midnight Sport Band - Regular', 'admin/product-photos/w-3.jpg', 0),
(16, 'boAt Rockerz 450 Bluetooth On ', 4, 1, 8000, 5000, ' Mic, Upto 15 Hours Playback, 40MM Drivers, Padded Ear Cushions, Integrated Controls and Dual  Headphones...', 'admin/product-photos/h-1.jpg', 0),
(17, 'boAt Rockerz 450 Bluetooth On ', 4, 1, 7000, 5000, 'Active Noise Cancellation, Bluetooth Wireless Over Ear Headphones with Mic with 40Mm Drivers, Upto 20 Hours Playtime, Deep Bass &...', 'admin/product-photos/h-2.jpg', 1),
(18, '2021 Apple MacBook Pro ', 2, 0, 100000, 90000, '16-inch 41.05 cm, Apple M1 Max chip with 10‑core CPU and 32‑core GPU, 32GB RAM, 1TB SSD - Space Grey', 'admin/product-photos/l-2.jpg', 0),
(19, 'OnePlus Nord CE 2 Lite 5G', 1, 0, 20000, 19000, 'Black Dusk, 6GB RAM, 128GB Storage\r\nmobile', 'admin/product-photos/m-1.jpg', 0),
(20, 'Apple iPhone 12 Mini (64GB) - ', 1, 0, 60000, 57000, 'Apple iPhone 12 Mini (64GB) Red mobile', 'admin/product-photos/m-2.jpeg', 0),
(21, 'Samsung Galaxy S20 FE 5G', 1, 0, 40000, 36000, 'Cloud Lavender, 8GB RAM, 128GB Storage mobile', 'admin/product-photos/m-3.jpg', 0),
(22, 'Xbox Series X', 5, 28, 70000, 56000, 'Introducing Xbox Series X, the fastest, most powerful Xbox ever. Play thousands of titles from four generations of consoles-all games look and play best on Xbox Series X.', 'admin/product-photos/g-3.jpg', 0),
(23, 'Dell Inspiron 3525 Laptop', 2, 0, 60000, 54000, ' AMD Athlon Silver 3050U, Win 11 + MSO 21, 8GB GDDR4, 256Gb SSD, Radeon Graphics, \r\nlaptop 15.6 (39.62Cms) HD Anti-Glare (D560766Win9Be, 1.68Kgs)', 'admin/product-photos/l-3.jpg', 0),
(24, 'Acer Nitro 5 Intel Core i5-9th', 2, 0, 60000, 54000, '15.6 (39.62cms) Display 1920 x 1080 Thin and Light Gaming Laptop (8GB Ram/1TB HDD/Windows 10 Home/GTX 1650 Graphics/Obsidian Black/2.3 Kgs), AN515-54', 'admin/product-photos/l-1.jpeg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub-catagory`
--

CREATE TABLE `sub-catagory` (
  `subid` int(11) NOT NULL,
  `subname` varchar(30) NOT NULL,
  `cid` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub-catagory`
--

INSERT INTO `sub-catagory` (`subid`, `subname`, `cid`, `status`) VALUES
(1, 'HeadPhone', 4, 0),
(30, 'mouse', 13, 0),
(31, 'controler', 13, 0),
(32, 'consoles', 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user-address`
--

CREATE TABLE `user-address` (
  `adrid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `number` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `zip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user-address`
--

INSERT INTO `user-address` (`adrid`, `uid`, `number`, `name`, `address`, `city`, `state`, `zip`) VALUES
(39, 44, '3435464656', 'test', 'sdsfdsf', 'dfsf', 'fsfd', 43434),
(40, 57, '3435454656', 'makima', 'sdsdada', 'surat', 'gujrat', 0),
(41, 57, '3434543535', 'makima', 'fdsf', 'fdf', 'dsf', 3232232),
(42, 57, '9824489823', 'makima', '478, Nai Sadak\r\nChandni chowk', 'Surat', 'Gujrat', 395009);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0 COMMENT '0= enable,1= Disable'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `status`) VALUES
(44, 'test', '$2y$10$Eja4miWmAXJSvLEq6ZmDv.HBOnMhKSJODl1ny6FMsphNtjlAySjO6', 'test@test', 0),
(49, 'test1', '$2y$10$18cTvpK8OM.H63zIqvGvh.rxRPj/RJ7rgnddJfI4l63jXH62sI60W', 'test@test1', 0),
(53, 'jainex', '$2y$10$PcgJcnHEsZklrtS41LUdXeTVoa/fei6bMNHjk5YYKsi3FEZP7JqIm', 'jainexp017@gmail.com', 0),
(56, 'luffy', '$2y$10$ARb0uU5So.eIgIgTt0d7ce0UITGcd2ibEA3HIo.LCaxSkEe4qegEC', 'luffy@gmail.com', 0),
(57, 'makima', '$2y$10$Cq4YdLOVcuPby5.GA1AkTuhQsXOlqFnw25SpwDHfp.8hBP2Dr8zzq', 'makima@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`aid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `mycart`
--
ALTER TABLE `mycart`
  ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `product-catagory`
--
ALTER TABLE `product-catagory`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `sub-catagory`
--
ALTER TABLE `sub-catagory`
  ADD PRIMARY KEY (`subid`);

--
-- Indexes for table `user-address`
--
ALTER TABLE `user-address`
  ADD PRIMARY KEY (`adrid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mycart`
--
ALTER TABLE `mycart`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `product-catagory`
--
ALTER TABLE `product-catagory`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `sub-catagory`
--
ALTER TABLE `sub-catagory`
  MODIFY `subid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user-address`
--
ALTER TABLE `user-address`
  MODIFY `adrid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
