-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2017 at 09:57 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_user` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `level` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_user`, `admin_email`, `admin_pass`, `level`) VALUES
(1, 'Rifat Alam', 'admin', 'admin@shop.com', '202cb962ac59075b964b07152d234b70', 0),
(2, 'Mr.ABC', 'new_admin', 'hello@admin.com', '202cb962ac59075b964b07152d234b70', 0);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`) VALUES
(8, 'Naviforce'),
(9, 'Curren'),
(10, 'Ochstin'),
(11, 'Casio'),
(13, 'Fine FIT Shoes');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` float NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `session_id`, `product_id`, `product_name`, `product_price`, `product_qty`, `product_image`) VALUES
(109, 'dd89ppsv9lr5mdealp7o2189m1', 24, 'Casio Edifice Chronograph Watch For Men', 2390, 0, 'upload/0ff0a943d0.jpg'),
(93, '30kv0igf97pbnc4k457gktsm00', 14, 'Google Pixel', 54544, 1, 'upload/c3f5894db9.jpg'),
(108, '8l9ac36ujuekvl6f7ulq9dijb2', 20, 'Mens Shoes', 220.97, 1, 'upload/39d91b2156.png'),
(89, 'ujrfrs7o3e8liis2v8lkd60me2', 11, 'Note 4', 33333, 1, 'upload/0eefeaed6a.jpg'),
(90, 'okcl4hj37i5kpfgb8kuehqain3', 11, 'Note 4', 33333, 1, 'upload/0eefeaed6a.jpg'),
(113, 'ckqbpmhmhkpohure7u26lu77t1', 21, 'Naviforce Men Wrist Watch - Black', 1600, 1, 'upload/f4f74624be.jpg'),
(111, '81kqec0b3ooo60pldi7vhdgb81', 24, 'Casio Edifice Chronograph Watch For Men', 2390, 1, 'upload/0ff0a943d0.jpg'),
(112, '81kqec0b3ooo60pldi7vhdgb81', 21, 'Naviforce Men Wrist Watch - Black', 1600, 1, 'upload/f4f74624be.jpg'),
(114, 'ckqbpmhmhkpohure7u26lu77t1', 24, 'Casio Edifice Chronograph Watch For Men', 2390, 4, 'upload/0ff0a943d0.jpg'),
(115, 'ckqbpmhmhkpohure7u26lu77t1', 23, 'OCHSTIN Black Leather Watch for Men ', 2600, 1, 'upload/070a03cf46.jpg'),
(116, '8dv7fi89uh7gu3pl43094ov307', 22, 'Curren Brown PU Leather Wrest Watch For Men', 1450, 1, 'upload/4253c145bc.jpg'),
(117, '8dv7fi89uh7gu3pl43094ov307', 23, 'OCHSTIN Black Leather Watch for Men ', 2600, 1, 'upload/070a03cf46.jpg'),
(118, '8dv7fi89uh7gu3pl43094ov307', 24, 'Casio Edifice Chronograph Watch For Men', 2390, -12, 'upload/0ff0a943d0.jpg'),
(123, 'vm6rnijlq0994kdiprdbq9bvj4', 22, 'Curren Brown PU Leather Wrest Watch For Men', 1450, 4, 'upload/4253c145bc.jpg'),
(147, 'fi862sh1hg5ihkh7aba2rr4rq5', 22, 'Curren Brown PU Leather Wrest Watch For Men', 1450, 1, 'upload/4253c145bc.jpg'),
(143, 'ermfajadis4v731t31vnbunl25', 23, 'OCHSTIN Black Leather Watch for Men ', 2600, 1, 'upload/070a03cf46.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(32, 'Men\'s Watches'),
(27, 'Toys and Games'),
(28, 'Books'),
(25, 'Women\'s Shoes'),
(26, 'Women\'s Jewellery'),
(29, 'Sports'),
(30, 'Fitness'),
(31, 'Men\'s Shoes');

-- --------------------------------------------------------

--
-- Table structure for table `compare`
--

CREATE TABLE `compare` (
  `comapre_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` float NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `session_id` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `compare`
--

INSERT INTO `compare` (`comapre_id`, `cust_id`, `product_id`, `product_name`, `product_price`, `product_image`, `session_id`) VALUES
(9, 2, 24, 'Casio Edifice Chronograph Watch For Men', 2390, 'upload/0ff0a943d0.jpg', '81kqec0b3ooo60pldi7vhdgb81'),
(8, 2, 21, 'Naviforce Men Wrist Watch - Black', 1600, 'upload/f4f74624be.jpg', '81kqec0b3ooo60pldi7vhdgb81');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_city` text NOT NULL,
  `customer_country` text NOT NULL,
  `customer_zip` varchar(255) NOT NULL,
  `customer_phone` int(11) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_address`, `customer_city`, `customer_country`, `customer_zip`, `customer_phone`, `customer_email`, `customer_password`) VALUES
(2, 'Md.Rifat', 'House-408/21,Shimultaly,Chayabagh', 'GAZIPUR', 'Bangladesh', '1703', 1521498004, 'b@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(5, 'Md. Alam', '123,Mirpur', 'Gazipur', 'Bangladesh', '1703', 2342424, 'a@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_body` text NOT NULL,
  `product_price` float NOT NULL,
  `total_product` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_type` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `cat_id`, `brand_id`, `product_body`, `product_price`, `total_product`, `product_image`, `product_type`) VALUES
(26, 'Sky Sea Brown Leather Casual Shoe', 31, 13, 'Fine FIT Shoes is an exclusively designed Formal and casual shoe collection, tailor-made to suit the individualistic taste and luxurious lifestyle of a man who defines success. They made the ultimate shoe made from the finest quality materials and premium accessories that exudes luxury and authority in every step.', 1990, 6, 'upload/636f8b0e3d.jpg', 1),
(25, 'Fine FIT Brown Leather Boot For Men', 31, 13, 'Fine FIT Shoes is the trendiest footwear brand from Bangladesh. They are committed to provide you with the best quality Shoes. The main goal of their business is customer satisfaction.â€Ž\r\nKey Features\r\nProduct Type: Boot\r\nColor: Brown\r\nUpper Material: Full Leather\r\nSloe Material: Best Rubber Sole', 2700, 5, 'upload/9b1a1a89b1.jpg', 0),
(21, 'Naviforce Men Wrist Watch - Black', 29, 8, 'Muslin Watch is one of the popular brands for all type of products at reasonable price. They provide us with different types of products very frequently. Shop your choice from this seller!', 1600, 10, 'upload/f4f74624be.jpg', 0),
(22, 'Curren Brown PU Leather Wrest Watch For Men', 32, 9, 'Muslin Watch is one of the popular brands for all type of products at reasonable price. They provide us with different types of products very frequently. Shop your choice from this seller!', 1450, 5, 'upload/4253c145bc.jpg', 1),
(23, 'OCHSTIN Black Leather Watch for Men ', 32, 10, 'With strap that is made of leather which gives you a smooth touch and unique look. Strap in black color which fit with various accessories and apparel. Itâ€™s a Casual style hand watch that can be worn along with most suitable design of apparel, in parties, special occasions or to send it as an ideal gift to whom you love.', 2600, 6, 'upload/070a03cf46.jpg', 0),
(24, 'Casio Edifice Chronograph Watch For Men', 32, 11, 'With strap that is made of leather which gives you a smooth touch and unique look. Strap in black color which fit with various accessories and apparel. Itâ€™s a Casual style hand watch that can be worn along with most suitable design of apparel, in parties, special occasions or to send it as an ideal gift to whom you love.', 2390, 5, 'upload/0ff0a943d0.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `compare`
--
ALTER TABLE `compare`
  ADD PRIMARY KEY (`comapre_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `compare`
--
ALTER TABLE `compare`
  MODIFY `comapre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
