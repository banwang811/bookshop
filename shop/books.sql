-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-05-26 10:24:29
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `books`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` char(16) NOT NULL,
  `password` char(40) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', '123456');

-- --------------------------------------------------------

--
-- 表的结构 `bookmark`
--

CREATE TABLE IF NOT EXISTS `bookmark` (
  `username` varchar(16) NOT NULL,
  `bm_URL` varchar(255) NOT NULL,
  KEY `username` (`username`),
  KEY `bm_URL` (`bm_URL`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `isbn` char(13) NOT NULL,
  `author` char(80) DEFAULT NULL,
  `title` char(100) DEFAULT NULL,
  `catid` int(10) unsigned DEFAULT NULL,
  `price` float(4,2) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `books`
--

INSERT INTO `books` (`isbn`, `author`, `title`, `catid`, `price`, `description`) VALUES
('0672319241', 'Sterling Hughes and Andrei Zmievski', 'PHP Developer''s Cookbook', 1, 39.99, 'Provides a complete, solutions-oriented guide to the challenges most often faced by PHP developers\r\nWritten specifically for experienced Web developers, the book offers real-world solutions to real-world needs\r\n'),
('0672329166', 'Luke Welling and Laura Thomson', 'PHP and MySQL Web Development', 1, 49.99, 'PHP & MySQL Web Development teaches the reader to develop dynamic, secure e-commerce web sites. You will learn to integrate and implement these technologies by following real-world examples and working sample projects.'),
('067232976X', 'Julie Meloni', 'Sams Teach Yourself PHP, MySQL and Apache All-in-One', 1, 34.99, 'Using a straightforward, step-by-step approach, each lesson in this book builds on the previous ones, enabling you to learn the essentials of PHP scripting, MySQL databases, and the Apache web server from the ground up.'),
('1', '456', 'fg', 6, 10.00, 'efrygy');

-- --------------------------------------------------------

--
-- 表的结构 `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `catid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `catname` char(60) NOT NULL,
  PRIMARY KEY (`catid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `categories`
--

INSERT INTO `categories` (`catid`, `catname`) VALUES
(1, 'Internet'),
(2, 'Self-help'),
(4, 'Gardening'),
(5, 'Fiction'),
(6, 'hello'),
(7, 'ÎÄÑ§');

-- --------------------------------------------------------

--
-- 表的结构 `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customerid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(60) NOT NULL,
  `address` char(80) NOT NULL,
  `city` char(30) NOT NULL,
  `state` char(20) DEFAULT NULL,
  `zip` char(10) DEFAULT NULL,
  `country` char(20) NOT NULL,
  PRIMARY KEY (`customerid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `customers`
--

INSERT INTO `customers` (`customerid`, `name`, `address`, `city`, `state`, `zip`, `country`) VALUES
(1, 'tom', '1', '2', '3', '4', '5');

-- --------------------------------------------------------

--
-- 表的结构 `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `orderid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customerid` int(10) unsigned NOT NULL,
  `amount` float(6,2) DEFAULT NULL,
  `date` date NOT NULL,
  `order_status` char(10) DEFAULT NULL,
  `ship_name` char(60) NOT NULL,
  `ship_address` char(80) NOT NULL,
  `ship_city` char(30) NOT NULL,
  `ship_state` char(20) DEFAULT NULL,
  `ship_zip` char(10) DEFAULT NULL,
  `ship_country` char(20) NOT NULL,
  PRIMARY KEY (`orderid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `orders`
--

INSERT INTO `orders` (`orderid`, `customerid`, `amount`, `date`, `order_status`, `ship_name`, `ship_address`, `ship_city`, `ship_state`, `ship_zip`, `ship_country`) VALUES
(1, 1, 39.99, '2016-05-26', 'PARTIAL', 'tom', '1', '2', '3', '4', '5'),
(2, 0, 79.98, '2016-05-26', 'PARTIAL', 'tom', '1', '2', '3', '4', '5'),
(3, 0, 39.99, '2016-05-26', 'PARTIAL', 'tom', '1', '2', '3', '4', '5'),
(4, 0, 39.99, '2016-05-26', 'PARTIAL', 'tom', '1', '2', '3', '4', '5');

-- --------------------------------------------------------

--
-- 表的结构 `order_items`
--

CREATE TABLE IF NOT EXISTS `order_items` (
  `orderid` int(10) unsigned NOT NULL,
  `isbn` char(13) NOT NULL,
  `item_price` float(4,2) NOT NULL,
  `quantity` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`orderid`,`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `order_items`
--

INSERT INTO `order_items` (`orderid`, `isbn`, `item_price`, `quantity`) VALUES
(1, '0672319241', 39.99, 1),
(2, '0672319241', 39.99, 2),
(3, '0672319241', 39.99, 1);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(16) NOT NULL,
  `passwd` char(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`username`, `passwd`, `email`) VALUES
('123', 'fe07320f909f179d3adabef07207c9f01991b36e', 'hong@123.com'),
('hong', 'fe07320f909f179d3adabef07207c9f01991b36e', 'hong@123.com'),
('tom', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123@163.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
