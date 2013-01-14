-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 08, 2011 at 03:34 PM
-- Server version: 5.1.36
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `crownfire`
--

-- --------------------------------------------------------

--
-- Table structure for table `descriptions`
--

CREATE TABLE IF NOT EXISTS `descriptions` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `page` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `descriptions`
--

INSERT INTO `descriptions` (`page_id`, `page`, `description`) VALUES
(1, 'index.php', 'Crownfire offers fire protection service to the greater Toronto area as well as Brantford, London and Hamilton.  Pass your next fire protection inspection ease!111');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `type_id` tinyint(4) NOT NULL,
  `state_id` tinyint(4) NOT NULL,
  `date_added` int(11) NOT NULL,
  `date_updated` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `user_id`, `property_id`, `type_id`, `state_id`, `date_added`, `date_updated`) VALUES
(2, 1, 1, 1, 2, 1302110769, 1302110826),
(3, 1, 1, 3, 0, 1302185377, 1302266960),
(5, 1, 1, 4, 0, 1302267455, 1302269445),
(6, 1, 1, 5, 0, 1302273281, 1302277140),
(7, 1, 1, 6, 0, 1302281055, 1302290415);

-- --------------------------------------------------------

--
-- Table structure for table `document_answers`
--

CREATE TABLE IF NOT EXISTS `document_answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `document_id` int(11) NOT NULL,
  `question_value` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `document_answers`
--

INSERT INTO `document_answers` (`id`, `question_id`, `document_id`, `question_value`) VALUES
(10, 16, 3, 1),
(11, 17, 3, 0),
(12, 18, 3, 0),
(13, 19, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `document_data_1_head`
--

CREATE TABLE IF NOT EXISTS `document_data_1_head` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `technician` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `inspection_date` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `man_name_model` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `document_data_1_head`
--

INSERT INTO `document_data_1_head` (`id`, `document_id`, `customer_name`, `technician`, `address`, `inspection_date`, `city`, `man_name_model`) VALUES
(1, 1, 'a', 'b', 'c', 'd', 'e', 'f'),
(2, 2, 'a', 'b', 'c', 'd', 'e', 'f'),
(3, 1, '1', '2', '3', '4', '5', '6'),
(4, 2, 'a', 'b', 'c', 'd', 'e', 'f');

-- --------------------------------------------------------

--
-- Table structure for table `document_data_1_zones`
--

CREATE TABLE IF NOT EXISTS `document_data_1_zones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document_id` int(11) NOT NULL,
  `zone_name` varchar(255) NOT NULL,
  `zone_num` varchar(255) NOT NULL,
  `alarm_circuit` varchar(255) NOT NULL,
  `supervisory_circuit` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `document_data_1_zones`
--

INSERT INTO `document_data_1_zones` (`id`, `document_id`, `zone_name`, `zone_num`, `alarm_circuit`, `supervisory_circuit`) VALUES
(1, 1, '7', '8', '9', '10'),
(6, 2, '7', '8', '9', '10'),
(7, 2, '11', '12', '13', '14'),
(8, 2, '15', '16', '17', '18');

-- --------------------------------------------------------

--
-- Table structure for table `document_data_3_head`
--

CREATE TABLE IF NOT EXISTS `document_data_3_head` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document_id` int(11) NOT NULL,
  `customer_name` int(11) NOT NULL,
  `technician_1` int(11) NOT NULL,
  `technician_2` int(11) NOT NULL,
  `address` int(11) NOT NULL,
  `inspection_date` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `document_data_3_head`
--

INSERT INTO `document_data_3_head` (`id`, `document_id`, `customer_name`, `technician_1`, `technician_2`, `address`, `inspection_date`, `city`) VALUES
(1, 3, 1, 2, 3, 4, 5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `document_data_3_summary`
--

CREATE TABLE IF NOT EXISTS `document_data_3_summary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document_id` int(11) NOT NULL,
  `deficiencies` longtext NOT NULL,
  `recommendations` longtext NOT NULL,
  `remarks` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `document_data_3_summary`
--

INSERT INTO `document_data_3_summary` (`id`, `document_id`, `deficiencies`, `recommendations`, `remarks`) VALUES
(1, 3, '55', '66', '77');

-- --------------------------------------------------------

--
-- Table structure for table `document_data_4_head`
--

CREATE TABLE IF NOT EXISTS `document_data_4_head` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `technician` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `inspection_date` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `site` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `document_data_4_head`
--

INSERT INTO `document_data_4_head` (`id`, `document_id`, `customer_name`, `technician`, `address`, `inspection_date`, `city`, `site`, `contact`) VALUES
(5, 5, 'fdsafd', 'safdas', 'fdsafd', 'dasfdas', 'asf', 'fdasfdas', 'fdasf');

-- --------------------------------------------------------

--
-- Table structure for table `document_data_4_report`
--

CREATE TABLE IF NOT EXISTS `document_data_4_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document_id` int(11) NOT NULL,
  `report_num` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `size_type` varchar(255) NOT NULL,
  `manufacture` varchar(255) NOT NULL,
  `serial` varchar(255) NOT NULL,
  `manufacture_date` varchar(255) NOT NULL,
  `last_h_test` varchar(255) NOT NULL,
  `next_h_test` varchar(255) NOT NULL,
  `next_six_year` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `document_data_4_report`
--

INSERT INTO `document_data_4_report` (`id`, `document_id`, `report_num`, `location`, `size_type`, `manufacture`, `serial`, `manufacture_date`, `last_h_test`, `next_h_test`, `next_six_year`, `remarks`) VALUES
(4, 5, '1', '2', '3', '4', '5', '6', '7', '8', '9', '10'),
(5, 5, '11', '12', '13', '14', '15', '16', '17', '18', '19', '20');

-- --------------------------------------------------------

--
-- Table structure for table `document_data_5_form`
--

CREATE TABLE IF NOT EXISTS `document_data_5_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document_id` int(255) NOT NULL,
  `unit_type` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `time_illuminated` varchar(255) NOT NULL,
  `pass_or_fail` varchar(255) NOT NULL,
  `unit_voltage` varchar(255) NOT NULL,
  `unit_watts` varchar(255) NOT NULL,
  `num_batteries` varchar(255) NOT NULL,
  `size_batteries` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `document_data_5_form`
--

INSERT INTO `document_data_5_form` (`id`, `document_id`, `unit_type`, `location`, `time_illuminated`, `pass_or_fail`, `unit_voltage`, `unit_watts`, `num_batteries`, `size_batteries`) VALUES
(2, 6, '11', '22', '33', '44', '55', '66', '77', '88'),
(3, 6, '111', '222', '333', '444', '555', '666', '777', '888'),
(4, 6, 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h');

-- --------------------------------------------------------

--
-- Table structure for table `document_data_5_head`
--

CREATE TABLE IF NOT EXISTS `document_data_5_head` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `technician` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `inspection_date` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `site` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `document_data_5_head`
--

INSERT INTO `document_data_5_head` (`id`, `document_id`, `customer_name`, `technician`, `address`, `inspection_date`, `city`, `site`, `contact`) VALUES
(1, 6, '1', '2', '3', '4', '5', '6', '7');

-- --------------------------------------------------------

--
-- Table structure for table `document_data_6_head`
--

CREATE TABLE IF NOT EXISTS `document_data_6_head` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `technician` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `inspection_date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `document_data_6_head`
--

INSERT INTO `document_data_6_head` (`id`, `document_id`, `customer_name`, `technician`, `address`, `inspection_date`) VALUES
(1, 7, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `document_data_6_valve`
--

CREATE TABLE IF NOT EXISTS `document_data_6_valve` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `size_a` varchar(255) NOT NULL,
  `size_b` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `document_data_6_valve`
--

INSERT INTO `document_data_6_valve` (`id`, `document_id`, `option_id`, `size_a`, `size_b`) VALUES
(24, 7, 1, '1', '2'),
(25, 7, 2, '3', '4'),
(26, 7, 3, '5', '6'),
(27, 7, 4, '7', '8'),
(28, 7, 5, '9', '10'),
(29, 7, 6, '11', '12'),
(30, 7, 7, '13', '14'),
(31, 7, 8, '15', '16');

-- --------------------------------------------------------

--
-- Table structure for table `document_questions`
--

CREATE TABLE IF NOT EXISTS `document_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `question` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `document_questions`
--

INSERT INTO `document_questions` (`id`, `type_id`, `question`) VALUES
(1, 2, 'Started pump automatically by opening test valve on side of controller'),
(2, 2, 'Did the local alarm work and can the external bell be heard at least r100 feet from the pump enclosure'),
(3, 2, 'Is the pump manual stop'),
(4, 2, 'Are packing glands dripping water'),
(5, 2, 'Do bearing cups drain properly'),
(6, 2, 'If diesel driven pump, is engine cooling water flowing and draining'),
(7, 2, 'If electric motor driven pump, is casing relief valve installed and flowing'),
(8, 2, 'If diesel driven pump, fuel tank level'),
(9, 2, 'If water tank or cistern, full'),
(10, 2, 'Overflowed'),
(11, 2, 'Tank Heated'),
(12, 2, 'If heated, is water circulation OK'),
(13, 2, 'If the pump is in a normally unoccupied detached building in a climate subject to freezing weather, does the building have a low temperature alarm'),
(14, 2, 'Was pump run for at least minutes'),
(15, 2, 'After stopping, was pump controller returned to auto start position'),
(16, 3, 'System in trouble on arrival\r\n'),
(17, 3, 'Does System Require Fire Watch\r\n'),
(18, 3, 'System left clear and operational\r\n'),
(19, 3, 'Has Customer & Fire Department been notified\r\n'),
(20, 6, 'Hydrant Outlets are slightly more then hand tight'),
(21, 6, 'Nozzle Threads are not damaged and lubricated'),
(22, 6, 'Operation Nut shows signs of wear'),
(23, 6, 'Cracks visually appear in the Hydrant  Barrel'),
(24, 6, 'There are leaks under caps due to worn gaskets'),
(25, 6, 'There are leaks in the top of hydrant'),
(26, 6, 'Barrel drains satisfactory');

-- --------------------------------------------------------

--
-- Table structure for table `document_question_options`
--

CREATE TABLE IF NOT EXISTS `document_question_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `optionname` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `document_question_options`
--


-- --------------------------------------------------------

--
-- Table structure for table `document_states`
--

CREATE TABLE IF NOT EXISTS `document_states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `statename` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `document_states`
--

INSERT INTO `document_states` (`id`, `statename`) VALUES
(1, 'Draft'),
(2, 'Final');

-- --------------------------------------------------------

--
-- Table structure for table `document_types`
--

CREATE TABLE IF NOT EXISTS `document_types` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `fl_active` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `document_types`
--

INSERT INTO `document_types` (`id`, `type`, `fl_active`) VALUES
(1, 'Fire Alarm Zone Panel', 1),
(2, 'UPS Monthly Fire Safety Report', 0),
(3, 'CF003 Deficience Reports', 1),
(4, 'CF007 ExtHose Report', 1),
(5, 'CF008 EL Inspection', 1),
(6, 'Fire Hydrant Inspection Report', 1);

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE IF NOT EXISTS `keywords` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `page` varchar(255) NOT NULL,
  `keywords` text NOT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `keywords`
--

INSERT INTO `keywords` (`page_id`, `page`, `keywords`) VALUES
(1, 'index.php', '1');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `page` varchar(255) NOT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `page`) VALUES
(1, 'index.php'),
(2, 'services-fire-alarms.php'),
(3, 'services-fire-extinguishers.php'),
(4, 'aboutus.php'),
(5, 'catalog.php'),
(6, 'contactus.php'),
(7, 'services-exit-emergency-lights.php'),
(8, 'services-extinguishers.php'),
(9, 'services-fire-alarms.php'),
(10, 'services-monitoring.php'),
(11, 'services-restaurants.php'),
(12, 'services-sprinkler-systems.php'),
(13, 'services-training.php'),
(14, 'services.php');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE IF NOT EXISTS `properties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `user_id`, `name`, `address1`, `address2`, `city`, `postal_code`, `province`, `country`) VALUES
(1, 1, '1fds', '1fds', '2fdsafdsaf', '4', '7', '5', '6fdsafsda'),
(2, 0, 'aaa', 'aaa', 'bb', 'ccc', 'ff', 'dd', 'ee'),
(3, 0, 'safsa', 'safsa', 'fdsf', 'dsafds', 'fdsaf', 'afds', 'safdsa'),
(4, 0, 'fdsf', 'fdsf', 'safdsa', 'fdsa', 'fdsa', 'fdsa', 'fdsa'),
(5, 1, 'fds', 'fds', 'fdsafds', 'sfd', 'fdsafdsa', 'dsaf', 'dsafdsa'),
(6, 1, 'fdsf', 'fdsf', 'dsafdsaf', 'dsaf', 'dsafddsa', 'dsaf', 'safd');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `type`) VALUES
(1, 'Nathan Poole', 'npoole', 'npoole', 'npoole@gmail.com', 2),
(2, '', 'kelly', 'crownfire2010', 'kelly@crownfire.ca', 0),
(3, '1', '2', '333333333', '4', 2),
(4, 'fds', 'fdsa', 'fdsa', 'fds', 2),
(5, 'fds', 'fdsa', 'fdsa', 'fds', 2),
(6, 'afdsaf', 'fdsa', 'dsaf', 'dsafsa', 2),
(7, 'fds', 'fdsafds', 'Nate123', 'fdsafdds@gmail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `valve_testing_options`
--

CREATE TABLE IF NOT EXISTS `valve_testing_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `testing_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `valve_testing_options`
--

INSERT INTO `valve_testing_options` (`id`, `testing_name`) VALUES
(1, 'Static Pressure'),
(2, 'Residual Pressure'),
(3, 'Pito Pressure'),
(4, 'G.P.M. Pressure'),
(5, 'Gaskets OK or Replace'),
(6, '2 1/2" Coupling'),
(7, '3" Coupling'),
(8, 'Hub');
