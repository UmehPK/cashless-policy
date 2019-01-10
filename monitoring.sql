-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 22, 2014 at 09:09 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `network`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `Reciever` text NOT NULL,
  `Customer Name` text NOT NULL,
  `Phone No` text NOT NULL,
  `Comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`Reciever`, `Customer Name`, `Phone No`, `Comment`) VALUES
('justiceuche5@yahoo.com', 'justice', '07062045252', 'My Oga @ the top');

-- --------------------------------------------------------

--
-- Table structure for table `newaccount`
--

CREATE TABLE IF NOT EXISTS `newaccount` (
  `cust_id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` text NOT NULL,
  `Accountnum` text NOT NULL,
  `Sex` text NOT NULL,
  `DOB` date NOT NULL,
  `Occupation` text NOT NULL,
  `State` text NOT NULL,
  `Status` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `phone` text NOT NULL,
  `Accounttype` text NOT NULL,
  `Amount` text NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `newaccount`
--

INSERT INTO `newaccount` (`cust_id`, `Name`, `Accountnum`, `Sex`, `DOB`, `Occupation`, `State`, `Status`, `username`, `password`, `phone`, `Accounttype`, `Amount`, `image`) VALUES
(28, 'Uche Justice', '1225564031', 'male', '0000-00-00', 'doctor', 'Imo State', 'single', 'just', 'just', '08063732126', 'Savings', '1160800', ''),
(29, 'JUSTICE UCHE', '844467758', 'male', '2000-01-05', 'Student', 'Imo State', 'single', 'justice', 'uche', '08063732126', 'Current', '919000', ''),
(30, 'mike', '134393472', 'male', '2015-06-09', 'student', 'imo', 'single', 'mike', 'mike', '2225', 'Savings', '5344', ''),
(31, 'ONYENWE BRIGHT', '1670658208', 'male', '2000-01-05', 'Programmer', 'Imo State', 'single', 'bright', 'bright', '08166373465', 'Current', '989000', ''),
(32, 'onuoha ikechukwu', '1462773685', 'male', '2014-05-23', 'student', 'Imo State', 'Single', 'ik', 'ike', '08776755e', 'Savings', '5900', ''),
(36, 'Lilian', '1561564399', 'female', '2014-05-23', 'doctor', 'Imo State', 'Married', 'look', 'look', '07062045252', 'Savings', '34500', '');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `Accountname` text NOT NULL,
  `Accountnumber` text NOT NULL,
  `Amount` text NOT NULL,
  `ReceiveAccountname` text NOT NULL,
  `RecieveAcccountno` text NOT NULL,
  `TransactionType` text NOT NULL,
  `Time` time NOT NULL,
  `Date` date NOT NULL,
  `Bank Name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`Accountname`, `Accountnumber`, `Amount`, `ReceiveAccountname`, `RecieveAcccountno`, `TransactionType`, `Time`, `Date`, `Bank Name`) VALUES
('ONYENWE BRIGHT', '1670658208', '5000', 'mike', '134393472', 'Transfer', '16:23:08', '2014-11-22', 'Diamond Bank'),
('ONYENWE BRIGHT', '1670658208', '1000', 'GLO', '07062045252', 'Recharge', '16:42:19', '2014-11-22', 'VTU');
