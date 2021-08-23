-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `assig_company`;
CREATE TABLE `assig_company` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(100) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `assig_company` (`company_id`, `company_name`, `created_on`, `updated_on`) VALUES
(56,	'Intermind Digital Solutions',	'2021-08-23 05:33:57',	'0000-00-00 00:00:00'),
(57,	'Ergode IT',	'2021-08-23 05:40:15',	'0000-00-00 00:00:00'),
(58,	'xyz',	'2021-08-23 05:43:31',	'0000-00-00 00:00:00'),
(59,	'Intermind',	'2021-08-23 06:26:06',	'0000-00-00 00:00:00');

DROP TABLE IF EXISTS `assig_department`;
CREATE TABLE `assig_department` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `department_name` varchar(50) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`department_id`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `assig_department` (`department_id`, `company_id`, `department_name`, `created_on`, `updated_on`) VALUES
(1,	56,	'PHP Developers',	'2021-08-23 06:43:18',	'0000-00-00 00:00:00'),
(2,	56,	'Android Developers',	'2021-08-23 06:43:36',	'0000-00-00 00:00:00'),
(4,	57,	'Order Proccessing',	'2021-08-23 06:44:00',	'2021-08-23 06:56:33'),
(5,	57,	'Marketing',	'2021-08-23 06:57:01',	'0000-00-00 00:00:00');

DROP TABLE IF EXISTS `assig_employee`;
CREATE TABLE `assig_employee` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `emp_name` varchar(50) NOT NULL,
  `emp_mobile` varchar(12) NOT NULL,
  `emp_address` varchar(150) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`emp_id`),
  KEY `department_id` (`department_id`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `assig_employee` (`emp_id`, `department_id`, `company_id`, `emp_name`, `emp_mobile`, `emp_address`, `created_on`, `updated_on`) VALUES
(2,	1,	56,	'Sushil Vishwakarma',	'9930519878',	'HOUSE NO 778, SS 3RD, SECTOR 2, KOPARKH, NEAR HANUMAN MANDIR',	'2021-08-23 07:38:42',	'2021-08-23 07:45:48');

-- 2021-08-23 06:12:17
