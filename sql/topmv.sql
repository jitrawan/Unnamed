-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Oct 19, 2013 at 02:24 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `topmv`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `admin`
-- 

CREATE TABLE `admin` (
  `id` int(11) NOT NULL auto_increment,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `admin`
-- 

INSERT INTO `admin` VALUES (1, 'admin', '1234');

-- --------------------------------------------------------

-- 
-- Table structure for table `chair`
-- 

CREATE TABLE `chair` (
  `c_id` int(11) NOT NULL auto_increment,
  `c_name` varchar(255) NOT NULL,
  `c_start` varchar(255) NOT NULL,
  PRIMARY KEY  (`c_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

-- 
-- Dumping data for table `chair`
-- 

INSERT INTO `chair` VALUES (1, 'A1', '0');
INSERT INTO `chair` VALUES (2, 'A2', '0');
INSERT INTO `chair` VALUES (3, 'A3', '0');
INSERT INTO `chair` VALUES (4, 'A4', '0');
INSERT INTO `chair` VALUES (5, 'A5', '0');
INSERT INTO `chair` VALUES (6, 'A6', '0');
INSERT INTO `chair` VALUES (7, 'A7', '0');
INSERT INTO `chair` VALUES (8, 'A8', '0');
INSERT INTO `chair` VALUES (9, 'A9', '0');
INSERT INTO `chair` VALUES (10, 'A10', '0');
INSERT INTO `chair` VALUES (11, 'B1', '0');
INSERT INTO `chair` VALUES (12, 'B2', '0');
INSERT INTO `chair` VALUES (13, 'B3', '0');
INSERT INTO `chair` VALUES (14, 'B4', '0');
INSERT INTO `chair` VALUES (15, 'B5', '0');
INSERT INTO `chair` VALUES (16, 'B6', '0');
INSERT INTO `chair` VALUES (17, 'B7', '0');
INSERT INTO `chair` VALUES (18, 'B8', '0');
INSERT INTO `chair` VALUES (19, 'B9', '0');
INSERT INTO `chair` VALUES (20, 'B10', '0');

-- --------------------------------------------------------

-- 
-- Table structure for table `movie`
-- 

CREATE TABLE `movie` (
  `m_id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  PRIMARY KEY  (`m_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `movie`
-- 

INSERT INTO `movie` VALUES (1, '111', '1.jpg');
INSERT INTO `movie` VALUES (2, '222', '2.jpg');
INSERT INTO `movie` VALUES (3, '333', '3.jpg');

-- --------------------------------------------------------

-- 
-- Table structure for table `orders`
-- 

CREATE TABLE `orders` (
  `o_id` int(11) NOT NULL auto_increment,
  `o_start` varchar(255) NOT NULL,
  `c_id` varchar(255) NOT NULL,
  `m_id` varchar(255) NOT NULL,
  PRIMARY KEY  (`o_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=83 ;

-- 
-- Dumping data for table `orders`
-- 

INSERT INTO `orders` VALUES (75, '2', '1', '1');
INSERT INTO `orders` VALUES (77, '2', '16', '1');
