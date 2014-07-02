-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 02, 2014 at 01:19 
-- Server version: 5.5.36
-- PHP Version: 5.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `iam_ocs_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `MS_CS`
--

CREATE TABLE IF NOT EXISTS `MS_CS` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Current_statut` varchar(25) NOT NULL,
  `Priority` varchar(25) NOT NULL,
  `Issue_description` text NOT NULL,
  `Assignee_from_L1` varchar(25) NOT NULL,
  `Summary` text NOT NULL,
  `Recommendations` text NOT NULL,
  `Issue_type` varchar(55) NOT NULL,
  `Type` varchar(25) NOT NULL,
  `Date_identified` date NOT NULL,
  `MS_type` varchar(55) NOT NULL,
  `Nodenetwork_element` varchar(55) NOT NULL,
  `Entered_by_iam` varchar(55) NOT NULL,
  `Onsite_presence` varchar(55) NOT NULL,
  `Palliative_resolution_date` date NOT NULL,
  `final_resolution_time` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `MS_CS`
--

INSERT INTO `MS_CS` (`id`, `Current_statut`, `Priority`, `Issue_description`, `Assignee_from_L1`, `Summary`, `Recommendations`, `Issue_type`, `Type`, `Date_identified`, `MS_type`, `Nodenetwork_element`, `Entered_by_iam`, `Onsite_presence`, `Palliative_resolution_date`, `final_resolution_time`) VALUES
(1, 'Closed', 'High', 'Activation des vouchers', 'Imad', 'On a procédé a l''activation des vouchers ', '', 'MS Maintenance Activity', 'SW', '2014-06-10', 'Others', '', '', '', '0000-00-00', '2014-07-01');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
