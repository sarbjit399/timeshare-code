-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 29, 2015 at 12:05 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `timeshare`
--

-- --------------------------------------------------------

--
-- Table structure for table `attorney`
--

CREATE TABLE IF NOT EXISTS `attorney` (
  `attorney_id` int(11) NOT NULL AUTO_INCREMENT,
  `attorney_name` varchar(255) NOT NULL,
  `attorney_address` text NOT NULL,
  `attorney_city` varchar(255) NOT NULL,
  `attorney_state` varchar(255) NOT NULL,
  `is_domestic` enum('yes','no') NOT NULL DEFAULT 'yes',
  `attorney_country` varchar(255) NOT NULL,
  `attorney_zipcode` varchar(255) NOT NULL,
  `attorney_website` varchar(255) NOT NULL,
  `attorney_phone_no` varchar(255) NOT NULL,
  `attorney_latitude` varchar(255) NOT NULL,
  `attorney_longitude` varchar(255) NOT NULL,
  `attorney_description` text NOT NULL,
  `attorney_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`attorney_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `attorney`
--

INSERT INTO `attorney` (`attorney_id`, `attorney_name`, `attorney_address`, `attorney_city`, `attorney_state`, `is_domestic`, `attorney_country`, `attorney_zipcode`, `attorney_website`, `attorney_phone_no`, `attorney_latitude`, `attorney_longitude`, `attorney_description`, `attorney_status`, `created`, `modified`) VALUES
(8, 'parveen ', 'sec 40 ', 'Chandigarh', 'Chandigarh', 'yes', 'india', '160036', 'www.google.com', '8557819792', '30.6903441', '76.76678989999999', 'test', '', '2015-08-29 03:00:26', '2015-08-29 04:09:57'),
(9, 'The Abrams Firm', '1401 Marvin Road', 'Ste 307 Olympia-Lacey', 'WA', 'yes', 'USA', '98516', 'http://theabramsfirm.com/', '3609188196', '47.059446', '-122.766694', 'The Abrams Firm is a national consumer protections firm that has since specialized in timeshare divestment. They have helped thousands of people stuck in predatory ', 'active', '2015-08-29 03:03:03', '0000-00-00 00:00:00'),
(10, 'The Finn Law Group', '72nd St. Suite 305', 'Largo', 'Largo', 'yes', 'US', 'FL 33777', 'http://www.finnlawgroup.com/', '8553466529', '27.868775', '-82.73844390000001', 'The Finn Law Group is a real estate law firm which has over the last few years they put a significant amount of focus into helping clients get out of their unwanted timeshare ', 'active', '2015-08-29 03:09:49', '0000-00-00 00:00:00'),
(15, 'Reed Hein & Associates', '188th Street SW Suite ', 'Lynnwood', 'Lynnwood', 'yes', 'US', 'WA 98037', 'https://timeshareexitteam.com/', '8557333434', '47.8282988', '-122.3016002', 'ReedHein''s focuses exclusively on timeshare cancellation. They started their company in 2012 and already have over 25 offices in North America. They are the biggest ', 'active', '2015-08-29 03:15:48', '0000-00-00 00:00:00'),
(16, 'US Consumer Attorneys', 'US Consumer Attorneys 5173 Waring Road, Suite 106  ', 'San Diego,', 'CA', 'yes', 'US', 'CA 92120', 'http://usconsumerattorneys.com/index.php', '', '32.7926264', '-117.0735241', 'US Consumer Attorneys is a consumer protections law firm specializing in timeshare law.', 'active', '2015-08-29 03:18:04', '0000-00-00 00:00:00'),
(17, 'Law Offices of Susan M. Budowski', '7848 Winter Garden Vineland Rd.  Suite 124-117 ', 'Windermere', 'Florida', 'no', 'US', '34786', 'https://www.susanbudowski.com/', '8882657900', '28.4476264', '-81.5621194', 'An Avvo clients choice award winner in both 2013 and 2014, The Law Offices of Susan Budowski is a trusted name in the timeshare cancellation industry. Susan is a consumer ', 'active', '2015-08-29 07:42:24', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `attorney_view`
--
-- in use(#1356 - View 'timeshare.attorney_view' references invalid table(s) or column(s) or function(s) or definer/invoker of view lack rights to use them)

--
-- Dumping data for table `attorney_view`
--
-- in use (#1356 - View 'timeshare.attorney_view' references invalid table(s) or column(s) or function(s) or definer/invoker of view lack rights to use them)

-- --------------------------------------------------------

--
-- Stand-in structure for view `attorney_view_view`
--
CREATE TABLE IF NOT EXISTS `attorney_view_view` (
`attorney_id` int(11)
,`attorney_name` varchar(255)
,`attorney_address` text
,`attorney_city` varchar(255)
,`attorney_state` varchar(255)
,`is_domestic` enum('yes','no')
,`attorney_country` varchar(255)
,`attorney_zipcode` varchar(255)
,`attorney_website` varchar(255)
,`attorney_phone_no` varchar(255)
,`attorney_latitude` varchar(255)
,`attorney_longitude` varchar(255)
,`attorney_description` text
,`attorney_status` enum('active','inactive')
,`created` datetime
,`modified` datetime
);
-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` enum('admin','user') NOT NULL DEFAULT 'admin',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `user_type`, `created`, `modified`) VALUES
(1, 'admin', '123', 'admin', '0000-00-00 00:00:00', '2015-08-29 05:54:27');

-- --------------------------------------------------------

--
-- Structure for view `attorney_view_view`
--
DROP TABLE IF EXISTS `attorney_view_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `attorney_view_view` AS select `attorney`.`attorney_id` AS `attorney_id`,`attorney`.`attorney_name` AS `attorney_name`,`attorney`.`attorney_address` AS `attorney_address`,`attorney`.`attorney_city` AS `attorney_city`,`attorney`.`attorney_state` AS `attorney_state`,`attorney`.`is_domestic` AS `is_domestic`,`attorney`.`attorney_country` AS `attorney_country`,`attorney`.`attorney_zipcode` AS `attorney_zipcode`,`attorney`.`attorney_website` AS `attorney_website`,`attorney`.`attorney_phone_no` AS `attorney_phone_no`,`attorney`.`attorney_latitude` AS `attorney_latitude`,`attorney`.`attorney_longitude` AS `attorney_longitude`,`attorney`.`attorney_description` AS `attorney_description`,`attorney`.`attorney_status` AS `attorney_status`,`attorney`.`created` AS `created`,`attorney`.`modified` AS `modified` from `attorney`;
