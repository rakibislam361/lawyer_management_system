-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2020 at 09:16 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lawyer_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` int(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `phone`, `email`, `address`, `password`, `status`) VALUES
(9999, 'Rakib islam', 1950235178, 'islamrakib361@gmail.com', ' Dhanmondi 27 number Dhaka, Bangladesh ', '827ccb0eea8a706c4c34a16891f84e7b', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_case_comments`
--

CREATE TABLE `admin_case_comments` (
  `id` int(255) NOT NULL,
  `admin_id` int(50) NOT NULL,
  `documents` text NOT NULL,
  `clints_case_id` int(50) NOT NULL,
  `comments` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

CREATE TABLE `awards` (
  `id` int(25) NOT NULL,
  `lawyer_id` int(30) NOT NULL,
  `details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `case_update_information`
--

CREATE TABLE `case_update_information` (
  `id` int(100) NOT NULL,
  `case_id` int(100) NOT NULL,
  `lawyer_id` int(100) NOT NULL,
  `details` varchar(255) NOT NULL,
  `comments_date` datetime NOT NULL DEFAULT current_timestamp(),
  `next_date` datetime NOT NULL,
  `case_status` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `case_update_information`
--

INSERT INTO `case_update_information` (`id`, `case_id`, `lawyer_id`, `details`, `comments_date`, `next_date`, `case_status`, `status`) VALUES
(1, 14, 5, 'fsfwefw', '2020-10-19 17:10:48', '1970-01-01 00:00:00', 'pending', 1),
(2, 14, 5, 'sAVSDGFHCJH', '2020-10-19 17:12:40', '0000-00-00 00:00:00', 'running', 1),
(3, 14, 5, 'efdedqwd', '2020-10-19 17:17:27', '2020-10-20 00:00:00', 'pending', 1),
(4, 14, 5, 'complete', '2020-10-20 16:42:55', '2020-10-21 00:00:00', 'running', 1),
(5, 8, 1, 'Hello this is the first ............', '2020-11-03 00:53:06', '2020-11-24 00:00:00', 'running', 1),
(7, 26, 1, 'this is the first', '2020-11-08 12:13:21', '2020-11-17 00:00:00', 'Select a option', 1),
(9, 8, 1, 'next date', '2020-11-14 19:03:41', '2020-11-16 00:00:00', 'running', 1);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(25) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(11) NOT NULL DEFAULT '1' COMMENT '1=male,2=female,3=others',
  `password` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '1=accepted, 2=pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `phone`, `email`, `address`, `gender`, `password`, `status`) VALUES
(5, 'abid', '151626', 'abc@gmail.com', 'dhaka', 'male', '202cb962ac59075b964b07152d234b70', 2),
(32, 'Rakib', '01950235178', 'islamrakib391@gmail.com', 'sdrftgyhujikolp', 'male', '202cb962ac59075b964b07152d234b70', 2),
(39, 'Rakib', '01950235178', 'zarinislam82@gmail.com', 'zxerctvbyunimo,p.', 'male', '827ccb0eea8a706c4c34a16891f84e7b', 1);

-- --------------------------------------------------------

--
-- Table structure for table `clients_cases`
--

CREATE TABLE `clients_cases` (
  `id` int(255) NOT NULL,
  `case_id` int(11) NOT NULL,
  `client_id` int(30) NOT NULL,
  `lawyer_id` int(25) NOT NULL,
  `case_document` text NOT NULL,
  `case_details` varchar(250) NOT NULL,
  `uploaded_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status_change_date` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=pending,2=running,3=lawyer rejected,4=completed, 5=return from lawyer, 6=send to lawyer , 7=admin reject'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients_cases`
--

INSERT INTO `clients_cases` (`id`, `case_id`, `client_id`, `lawyer_id`, `case_document`, `case_details`, `uploaded_date`, `status_change_date`, `status`) VALUES
(8, 2029059532, 5, 1, 'uploads/174af993931b1748b3b5d2ba4f3203e9lawer_management_system_idea.docx', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bono', '2020-10-08 19:07:49', '2020-11-21 13:27:39', 2),
(26, 68973, 5, 1, 'uploads/bbba073913eab420a0d7d9a9a4b8b980d85af3a8a64cb30e186e8892c09954eblawer_management_system_idea.docx', 'SASDGFHGJH', '2020-11-07 21:38:59', '0000-00-00 00:00:00', 6);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(25) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `phone`, `subject`, `message`) VALUES
(1, 'rakib', 'abc@gmail.com', '01950235178', 'asadfgvhnb', 'hellow sir...............'),
(2, 'rakib', 'abc@gmail.com', '01950235178', 'asadfgvhnb', 'hello'),
(3, 'rakib', 'abc@gmail.com', '01950235178', 'asadfgvhnb', 'swadfsgdthgkuhlijok'),
(4, 'rakib', 'abc@gmail.com', '01950235178', 'asadfgvhnb', 'swadfsgdthgkuhlijok'),
(5, 'sadfghj', 'abc@gmail.com', '01950235178', 'asadfgvhnb', 'serdtfyubiokpl[]\''),
(6, 'sadfghj', 'abc@gmail.com', '01950235178', 'asadfgvhnb', 'serdtfyubiokpl[]\''),
(7, 'sadfghj', 'abc@gmail.com', '01950235178', 'asadfgvhnb', 'serdtfyubiokpl[]\''),
(8, 'sadfghj', 'abc@gmail.com', '01950235178', 'asadfgvhnb', 'serdtfyubiokpl[]\''),
(9, 'sadfghj', 'abc@gmail.com', '01950235178', 'asadfgvhnb', 'serdtfyubiokpl[]\''),
(10, 'sadfghj', 'abc@gmail.com', '01950235178', 'asadfgvhnb', 'awsedrtfyuhiokpl');

-- --------------------------------------------------------

--
-- Table structure for table `enroll_membership`
--

CREATE TABLE `enroll_membership` (
  `id` int(25) NOT NULL,
  `lawyer_id` int(30) NOT NULL,
  `membership_id` int(20) NOT NULL,
  `start_date` datetime NOT NULL DEFAULT current_timestamp(),
  `end_date` datetime NOT NULL,
  `payment_status` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1= pending 2= running'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enroll_membership`
--

INSERT INTO `enroll_membership` (`id`, `lawyer_id`, `membership_id`, `start_date`, `end_date`, `payment_status`, `status`) VALUES
(16, 1, 2, '2020-11-23 01:49:12', '2020-12-23 01:49:12', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lawyer`
--

CREATE TABLE `lawyer` (
  `id` int(255) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nid` int(150) NOT NULL,
  `image` text NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(11) DEFAULT '1' COMMENT '1=male,2=female,3=others',
  `education` varchar(255) NOT NULL,
  `law_member` varchar(255) NOT NULL,
  `awards` varchar(255) NOT NULL,
  `self_details` varchar(255) NOT NULL,
  `case_type` varchar(25) NOT NULL COMMENT ' criminal or civil',
  `lawyer_category_id` int(25) NOT NULL,
  `services_id` varchar(255) NOT NULL,
  `service_area` varchar(255) NOT NULL,
  `documents` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=pending, 2=token match, 3= activete, 4= reject',
  `token` text NOT NULL,
  `password` text NOT NULL,
  `request_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lawyer`
--

INSERT INTO `lawyer` (`id`, `name`, `phone`, `email`, `nid`, `image`, `address`, `gender`, `education`, `law_member`, `awards`, `self_details`, `case_type`, `lawyer_category_id`, `services_id`, `service_area`, `documents`, `status`, `token`, `password`, `request_date`) VALUES
(1, 'Rakib', '01950235178', 'islamrakib361@gmail.com', 2111111, 'uploads/ab_3.png', 'Dhaka Bangladesh', 'male', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt molliti', 'Enrolled as Advocate of the Appellate Division of the Supreme Court of Bangladesh.\r\nEnrolled as Advocate of the High Court Division of the Supreme Court of Bangladesh.\r\nEnrolled as Advocate of the Courts subordinate to the High Division of the Supreme Cou', 'Venture Capital Law - Barrister of the Year - Bangladesh - Lawyer Monthly.\r\nMergers & Acquisitions-Lawyer of the year 2017 by Finance Monthly.\r\nRecommended lawyer by Legal 500.\r\nWinner of International Advisory Experts Award for 2017.\r\nLawyer Monthly, Pri', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt molliti', '2', 2, '{\"service_id\":\"2\",\"category\":[\"Banking & Finance\",\"Business Formation\",\"Consumer Law\",\"Corporate Law\",\"Insurance\"]}', 'dhaka', 'uploads/bbf104db32a91445cc82c0d15164858bd85af3a8a64cb30e186e8892c09954eblawer_management_system_idea.docx', 3, '', '827ccb0eea8a706c4c34a16891f84e7b', '2020-10-24 15:39:15'),
(104, 'Mahbub', '01556600550', 'misujon58262@gmail.com', 12345, 'uploads/ab_2.png', 'Dhaka, Banagladesh', 'male', 'Enrolled as Advocate of the Appellate Division of the Supreme Court of Bangladesh.\r\nEnrolled as Advocate of the High Court Division of the Supreme Court of Bangladesh.\r\nEnrolled as Advocate of the Courts subordinate to the High Division of the Supreme Cou', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt molliti', 'Venture Capital Law - Barrister of the Year - Bangladesh - Lawyer Monthly.\r\n', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt molliti', '1', 1, '{\"service_id\":\"1\",\"category\":[\"Debt Relief\",\"Debtor & Creditor\",\"Foreclosure\"]}', 'Barisal', 'uploads/bbf104db32a91445cc82c0d15164858bd85af3a8a64cb30e186e8892c09954eblawer_management_system_idea.docx', 3, '', '827ccb0eea8a706c4c34a16891f84e7b', '2020-10-24 15:39:15'),
(113, 'David Marshall\r\n', '01556600550', 'misujon58262@gmail.com', 12345, 'uploads/team2.png', 'Dhaka, Banagladesh', 'male', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt molliti', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt molliti', 'Venture Capital Law - Barrister of the Year - Bangladesh - Lawyer Monthly.\r\n', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt molliti', '1', 1, '{\"service_id\":\"1\",\"category\":[\"Debt Relief\",\"Debtor & Creditor\",\"Foreclosure\"]}', 'Barisal', 'uploads/bbf104db32a91445cc82c0d15164858bd85af3a8a64cb30e186e8892c09954eblawer_management_system_idea.docx', 3, '', '827ccb0eea8a706c4c34a16891f84e7b', '2020-10-24 15:39:15');

-- --------------------------------------------------------

--
-- Table structure for table `lawyer_case_comnt`
--

CREATE TABLE `lawyer_case_comnt` (
  `id` int(250) NOT NULL,
  `clints_case_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL COMMENT 'lawyer client and admin all are user  ',
  `comments` varchar(255) NOT NULL,
  `type` text NOT NULL,
  `documents` text NOT NULL,
  `comments_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lawyer_case_comnt`
--

INSERT INTO `lawyer_case_comnt` (`id`, `clints_case_id`, `user_id`, `comments`, `type`, `documents`, `comments_date`, `status`) VALUES
(26, 1, 1, 'hello', 'Admin', '', '2020-11-08 11:28:15', 1),
(30, 1, 1, 'hi', 'Lawyer', '', '2020-11-08 11:36:25', 1),
(54, 26, 2, 'hello', 'Admin', '', '2020-11-21 15:23:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lawyer_category`
--

CREATE TABLE `lawyer_category` (
  `id` int(25) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lawyer_category`
--

INSERT INTO `lawyer_category` (`id`, `category_name`) VALUES
(1, 'Appellate Division\r\n'),
(2, 'High Court Division\r\n'),
(3, 'District Courts\r\n'),
(4, 'Metropolitan Sessions Courts'),
(5, 'Metropolitan Magistrates Court');

-- --------------------------------------------------------

--
-- Table structure for table `lawyer_document`
--

CREATE TABLE `lawyer_document` (
  `id` int(25) NOT NULL,
  `lawyer_id` int(30) NOT NULL,
  `nid` text NOT NULL,
  `license` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lawyer_hire`
--

CREATE TABLE `lawyer_hire` (
  `id` int(25) NOT NULL,
  `lawyer_id` int(30) NOT NULL,
  `client_id` int(30) NOT NULL,
  `services_id` int(30) NOT NULL,
  `start_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=accepted, 2=pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lawyer_types`
--

CREATE TABLE `lawyer_types` (
  `id` int(25) NOT NULL,
  `type` varchar(30) NOT NULL COMMENT '1=civil 2=criminal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lawyer_types`
--

INSERT INTO `lawyer_types` (`id`, `type`) VALUES
(1, 'Civil'),
(2, 'Criminal');

-- --------------------------------------------------------

--
-- Table structure for table `law_members`
--

CREATE TABLE `law_members` (
  `id` int(25) NOT NULL,
  `lawyer_id` int(30) NOT NULL,
  `details` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `membership_plan`
--

CREATE TABLE `membership_plan` (
  `id` int(25) NOT NULL,
  `plan_name` varchar(30) NOT NULL,
  `month` int(11) NOT NULL,
  `price` int(20) NOT NULL,
  `details` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `membership_plan`
--

INSERT INTO `membership_plan` (`id`, `plan_name`, `month`, `price`, `details`, `status`) VALUES
(1, 'Free trial', 1, 1, 'free for 1month', 2),
(2, 'Premium', 1, 1000, '6 months of access to our network of attorneys Unlimited number of 30-minute consultations on new legal matters Review of legal documents up to 10 pages for no added cost No hourly fees or surprises An ongoing relationship with professionals you trust\r\nRe', 1),
(3, 'Premium gold', 1, 1500, '12 months of access to our network of attorneys Unlimited number of 30-minute consultations on new legal matters Review of legal documents up to 10 pages for no added cost No hourly fees or surprises An ongoing relationship with professionals you trust An', 2),
(6, 'Basic', 4, 500, 'hello this is basic plan', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `item_price_currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'usd',
  `paid_amount` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `paid_amount_currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `item_name`, `item_id`, `item_price_currency`, `paid_amount`, `paid_amount_currency`, `txn_id`, `payment_status`, `created`, `modified`) VALUES
(1, '1', '3', 'Premium gold', 'USD', '6', 'USD', '2MW383584X876254P', 'COMPLETED', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '1', '3', 'Premium gold', 'USD', '6', 'USD', '0CK91212SL7216228', 'COMPLETED', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '1', '6', 'Basic', 'USD', '500', 'USD', '643579707X4123350', 'COMPLETED', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '1', '3', 'Premium gold', 'USD', '6', 'USD', '3GX70939BG357633X', 'COMPLETED', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '1', '6', 'Basic', 'USD', '500', 'USD', '53470983X13079322', 'COMPLETED', '2020-11-13 14:58:11', '0000-00-00 00:00:00'),
(6, '1', '1', 'Free trial', 'USD', '1', 'USD', '43X78280310516318', 'COMPLETED', '2020-11-23 01:08:13', '0000-00-00 00:00:00'),
(7, '1', '1', 'Free trial', 'USD', '1', 'USD', '165224969C010415X', 'COMPLETED', '2020-11-23 01:48:11', '0000-00-00 00:00:00'),
(8, '1', '2', 'Premium', 'USD', '1000', 'USD', '1B592229CF724290E', 'COMPLETED', '2020-11-23 01:49:53', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(25) NOT NULL,
  `service_name` varchar(30) NOT NULL,
  `type_id` int(25) NOT NULL COMMENT ' criminal or civil',
  `service_details` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `service_name`, `type_id`, `service_details`, `image`, `status`) VALUES
(1, 'Bankruptcy', 1, '', 'uploads/la_ser3.png', 1),
(2, 'Business Law', 2, '', 'uploads/law_contact.png', 1),
(3, 'Car Accident', 2, '', 'uploads/la_ser2.png', 1),
(4, 'Criminal Defense', 1, '', 'uploads/la_ser4.png', 1),
(20, 'Family law', 1, '', 'uploads/5e5878090792991180ec501a204b6c0fla_ser1.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(25) NOT NULL,
  `service_id` int(25) NOT NULL,
  `services_name` varchar(30) NOT NULL,
  `services_details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_id`, `services_name`, `services_details`) VALUES
(1, 1, 'Debt Relief', ''),
(2, 1, 'Debtor & Creditor', ''),
(3, 1, 'Foreclosure', ''),
(4, 2, 'Banking & Finance', ''),
(5, 2, 'Business Formation', ''),
(6, 2, 'Commercial Law', ''),
(7, 2, 'Consumer Law', ''),
(8, 2, 'Contracts', ''),
(9, 2, 'Corporate Law', ''),
(10, 2, 'Insurance', ''),
(11, 2, 'Mergers & Acquisitions', ''),
(12, 3, 'Bus Accidents', ''),
(13, 3, 'Motorcycle Accident', ''),
(14, 3, 'Truck Accident', ''),
(15, 4, 'Domestic Violence', ''),
(16, 4, 'Expungement', ''),
(17, 4, 'rape', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_case_comments`
--
ALTER TABLE `admin_case_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `awards`
--
ALTER TABLE `awards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case_update_information`
--
ALTER TABLE `case_update_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients_cases`
--
ALTER TABLE `clients_cases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enroll_membership`
--
ALTER TABLE `enroll_membership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lawyer`
--
ALTER TABLE `lawyer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lawyer_case_comnt`
--
ALTER TABLE `lawyer_case_comnt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lawyer_category`
--
ALTER TABLE `lawyer_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lawyer_document`
--
ALTER TABLE `lawyer_document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lawyer_hire`
--
ALTER TABLE `lawyer_hire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lawyer_types`
--
ALTER TABLE `lawyer_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `law_members`
--
ALTER TABLE `law_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership_plan`
--
ALTER TABLE `membership_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000;

--
-- AUTO_INCREMENT for table `admin_case_comments`
--
ALTER TABLE `admin_case_comments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `awards`
--
ALTER TABLE `awards`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `case_update_information`
--
ALTER TABLE `case_update_information`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `clients_cases`
--
ALTER TABLE `clients_cases`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `enroll_membership`
--
ALTER TABLE `enroll_membership`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `lawyer`
--
ALTER TABLE `lawyer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `lawyer_case_comnt`
--
ALTER TABLE `lawyer_case_comnt`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `lawyer_category`
--
ALTER TABLE `lawyer_category`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `lawyer_document`
--
ALTER TABLE `lawyer_document`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lawyer_hire`
--
ALTER TABLE `lawyer_hire`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lawyer_types`
--
ALTER TABLE `lawyer_types`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `law_members`
--
ALTER TABLE `law_members`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `membership_plan`
--
ALTER TABLE `membership_plan`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
