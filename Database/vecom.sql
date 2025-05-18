-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2024 at 06:39 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `a_username` varchar(50) NOT NULL,
  `a_email` varchar(200) NOT NULL,
  `a_password` varchar(16) NOT NULL,
  `a_image` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_username`, `a_email`, `a_password`, `a_image`) VALUES
(1, 'admin', 'admin@gmail.com', '123456', './img/admin-icon.png');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `b_id` int(11) NOT NULL,
  `ca_id` int(11) NOT NULL,
  `b_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`b_id`, `ca_id`, `b_name`) VALUES
(1, 1, 'Panasonic'),
(2, 1, 'Samsung'),
(3, 4, 'Puma'),
(4, 1, 'TCL'),
(5, 1, 'MI');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `pro_name` varchar(100) NOT NULL,
  `pro_image` varchar(200) NOT NULL,
  `pro_price` int(11) NOT NULL,
  `pro_quantity` int(11) NOT NULL,
  `cart_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ca_id` int(11) NOT NULL,
  `ca_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ca_id`, `ca_name`) VALUES
(1, 'Electronics'),
(2, 'Fashion'),
(3, 'home'),
(4, 'Sports'),
(5, 'Toys'),
(6, 'Beauty');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `co_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `c_first_name` varchar(50) NOT NULL,
  `c_last_name` varchar(100) NOT NULL,
  `c_mobile_no` varchar(15) NOT NULL,
  `c_email` varchar(250) NOT NULL,
  `c_password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_first_name`, `c_last_name`, `c_mobile_no`, `c_email`, `c_password`) VALUES
(1, 'kandarp', 'agravat', '+91 9499754054', 'kandarp@gmail', '123');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `o_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `c_f_name` varchar(100) NOT NULL,
  `c_l_name` varchar(100) NOT NULL,
  `c_mobile_no` varchar(15) NOT NULL,
  `c_email` varchar(250) NOT NULL,
  `c_address` varchar(300) NOT NULL,
  `c_city` varchar(100) NOT NULL,
  `c_pin_code` int(11) NOT NULL,
  `c_state` varchar(100) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `o_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_master`
--

CREATE TABLE `order_master` (
  `om_id` int(11) NOT NULL,
  `o_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_image` varchar(300) NOT NULL,
  `p_name` varchar(250) NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_quantity` int(11) NOT NULL,
  `p_total` int(11) NOT NULL,
  `om_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_master`
--

INSERT INTO `order_master` (`om_id`, `o_id`, `p_id`, `p_image`, `p_name`, `p_price`, `p_quantity`, `p_total`, `om_status`) VALUES
(1, 1, 2, 'samsung.png', 'Samsung 108 cm (43 inches) D Series Crystal 4K Vivid Ultra HD Smart LED TV UA43DUE70BKLXL (Black)', 28990, 1, 28990, 0),
(2, 2, 2, 'samsung.png', 'Samsung 108 cm (43 inches) D Series Crystal 4K Vivid Ultra HD Smart LED TV UA43DUE70BKLXL (Black)', 28990, 1, 28990, NULL),
(3, 3, 5, '714L9-X8dPL._SL1500_-removebg-preview.png', 'Panasonic 108 cm (43 inches) 4K Ultra HD Smart LED Google TV TH-43MX660DX (Black)', 29990, 1, 29990, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `p_image` varchar(250) NOT NULL,
  `p_qauntity` int(11) NOT NULL,
  `p_purchase_price` int(11) NOT NULL,
  `p_selling_price` int(11) NOT NULL,
  `p_description` varchar(300) NOT NULL,
  `b_id` int(11) NOT NULL,
  `ca_id` int(11) NOT NULL,
  `p_author` varchar(100) NOT NULL,
  `p_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `p_image`, `p_qauntity`, `p_purchase_price`, `p_selling_price`, `p_description`, `b_id`, `ca_id`, `p_author`, `p_status`) VALUES
(1, 'TCL 139 cm (55 inches) 4K Ultra HD Smart QLED Google TV 55C61B (Black)', 'tcl.png', 5, 120990, 37990, 'Resolution: 4K Ultra HD (3840 x 2160) | Refresh Rate: DLG 120Hz | VRR 120Hz', 4, 1, '4', 1),
(2, 'Samsung 108 cm (43 inches) D Series Crystal 4K Vivid Ultra HD Smart LED TV UA43DUE70BKLXL (Black)', 'samsung.png', 8, 44900, 28990, 'Resolution: 4K Ultra HD (3840 x 2160) Resolution | Refresh Rate: 50 Hertz', 2, 1, '4', 1),
(5, 'Panasonic 108 cm (43 inches) 4K Ultra HD Smart LED Google TV TH-43MX660DX (Black)', '714L9-X8dPL._SL1500_-removebg-preview.png', 4, 42990, 29990, 'Resolution : 4K Ultra HD (3840 x 2160) | Refresh Rate : 60 Hertz\r\nConnectivity: 3 HDMI ports to connect set top box, Blu-ray speakers or gaming console | 2 USB ports to connect hard drives or other USB devices | Bluetooth | Built-in Wi-Fi', 1, 1, '4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `s_id` int(11) NOT NULL,
  `s_image` varchar(250) NOT NULL,
  `s_title` varchar(100) NOT NULL,
  `s_description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`s_id`, `s_image`, `s_title`, `s_description`) VALUES
(23, 'Clothing Company GoDaddy Store Image.png', ' ', ' '),
(24, 'Clothing Company GoDaddy Store Image (2).png', ' ', ' '),
(25, 'Clothing Company GoDaddy Store Image (1).png', ' ', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `v_id` int(11) NOT NULL,
  `v_f_name` varchar(50) NOT NULL,
  `v_l_name` varchar(50) NOT NULL,
  `v_mobile_no` varchar(15) NOT NULL,
  `v_email` varchar(250) NOT NULL,
  `v_password` varchar(16) NOT NULL,
  `v_address` varchar(300) NOT NULL,
  `v_image` varchar(300) NOT NULL,
  `v_store_name` varchar(100) NOT NULL,
  `v_store_about` varchar(250) NOT NULL,
  `v_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`v_id`, `v_f_name`, `v_l_name`, `v_mobile_no`, `v_email`, `v_password`, `v_address`, `v_image`, `v_store_name`, `v_store_about`, `v_status`) VALUES
(4, 'kandarp', 'agravat', '+919499754054', 'kandarp@gmail.com', '123', 'street no.8 manekpara', 'professional logo for VECOM multi-vendor e-commerce website.png', 'Shree Nurshury', 'for selling plant', 1),
(6, 'kandarp', 'agravat', '+919499754054', 'demo@gmail.com', '123', 'street no.8 manekpara amreli', 'professional logo for VECOM multi-vendor e-commerce website.png', 'Shree Nurshury', 'for selling plant', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `ca_id` (`ca_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD UNIQUE KEY `pro_name` (`pro_name`),
  ADD KEY `c_id` (`c_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ca_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`co_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`o_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `order_master`
--
ALTER TABLE `order_master`
  ADD PRIMARY KEY (`om_id`),
  ADD KEY `o_id` (`o_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `ca_id` (`ca_id`),
  ADD KEY `b_id` (`b_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ca_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `co_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_master`
--
ALTER TABLE `order_master`
  MODIFY `om_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brand`
--
ALTER TABLE `brand`
  ADD CONSTRAINT `brand_ibfk_1` FOREIGN KEY (`ca_id`) REFERENCES `category` (`ca_id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `product` (`p_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`);

--
-- Constraints for table `order_master`
--
ALTER TABLE `order_master`
  ADD CONSTRAINT `order_master_ibfk_1` FOREIGN KEY (`o_id`) REFERENCES `orders` (`o_id`),
  ADD CONSTRAINT `order_master_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `product` (`p_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`ca_id`) REFERENCES `category` (`ca_id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`b_id`) REFERENCES `brand` (`b_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
