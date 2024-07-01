-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2024 at 02:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `content`) VALUES
(1, '<!DOCTYPE html>\r\n<html lang=\"en\">\r\n<head>\r\n    <meta charset=\"UTF-8\">\r\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n    <title>Welcome to [Your Company Name]</title>\r\n    <style>\r\n        body {\r\n            font-family: Arial, sans-serif;\r\n            line-height: 1.6;\r\n            margin: 0;\r\n            padding: 20px;\r\n            background-color: #f0f0f0; /* Light gray background */\r\n        }\r\n        .container {\r\n            max-width: 800px;\r\n            margin: auto;\r\n            background: #ffffff; /* White background for content */\r\n            padding: 30px;\r\n            border-radius: 8px;\r\n            box-shadow: 0 0 10px rgba(0,0,0,0.1);\r\n        }\r\n        h1, h2, h3 {\r\n            color: #333333; /* Dark gray headings */\r\n            margin-bottom: 15px;\r\n            text-align: center; /* Center-align headings */\r\n        }\r\n        p {\r\n            color: #666666; /* Medium gray text */\r\n            margin-bottom: 20px;\r\n        }\r\n        blockquote {\r\n            color: #888888; /* Light gray for testimonials */\r\n            border-left: 5px solid #cccccc; /* Border color for testimonials */\r\n            padding-left: 15px;\r\n            margin: 20px 0;\r\n        }\r\n    </style>\r\n</head>\r\n<body>\r\n    <div class=\"container\">\r\n        <header>\r\n            <h1>Welcome to [Your Company Name]</h1>\r\n        </header>\r\n        \r\n        <section>\r\n            <h2>Introduction</h2>\r\n            <p>Welcome to [Your Company Name], where we specialize in seamless tour management solutions designed to elevate your travel experiences. Whether you\'re planning a corporate retreat, educational tour, or leisure getaway, we are committed to providing exceptional service.</p>\r\n        </section>\r\n        \r\n        <section>\r\n            <h2>Our Story</h2>\r\n            <p>Founded in [Year], [Your Company Name] has been at the forefront of the tour management industry, continuously striving for excellence and customer satisfaction.</p>\r\n        </section>\r\n        \r\n        <section>\r\n            <h2>What We Do</h2>\r\n            <p>At [Your Company Name], we offer comprehensive tour management services tailored to meet your every need. Our dedicated team ensures a smooth and unforgettable journey for corporate events, educational trips, and leisure vacations.</p>\r\n        </section>\r\n        \r\n        <section>\r\n            <h2>Meet Our Team</h2>\r\n            <p>Our team comprises passionate professionals with extensive experience in tour logistics and customer service. Together, we strive to deliver excellence in every aspect of your travel experience.</p>\r\n        </section>\r\n        \r\n        <section>\r\n            <h2>Client Testimonials</h2>\r\n            <blockquote>\r\n                <p>\"Don’t just take our word for it. Here’s what our clients have to say about us: [Include a testimonial or two highlighting client satisfaction and success stories].\"</p>\r\n            </blockquote>\r\n        </section>\r\n        \r\n        <section>\r\n            <h2>Our Values</h2>\r\n            <p>At [Your Company Name], integrity, innovation, and customer satisfaction are at the core of everything we do. We believe in creating meaningful connections and delivering exceptional service with every tour.</p>\r\n        </section>\r\n        \r\n    </div>\r\n</body>\r\n</html>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `nationalparkname` varchar(200) NOT NULL,
  `nationalparklocation` varchar(100) NOT NULL,
  `nationalparkdetails` varchar(200) NOT NULL,
  `nationalparktype` varchar(100) NOT NULL,
  `priceinusd` varchar(100) NOT NULL,
  `nationalparkfeatures` varchar(200) NOT NULL,
  `nationalparkimage` varchar(300) NOT NULL,
  `quantity` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `nationalparkname`, `nationalparklocation`, `nationalparkdetails`, `nationalparktype`, `priceinusd`, `nationalparkfeatures`, `nationalparkimage`, `quantity`) VALUES
(62, 'gddgdg', 'India', '1255', 'outdoor', '30', 'test', 'upload/download.jpg', '2'),
(63, 'gddgdg', 'India', '1255', 'outdoor', '30', 'test', 'upload/download.jpg', '2'),
(64, 'GagandeepTest', 'AFG', 'GaganTesting', 'TestingByGagan', '40', 'Testinggagan', 'upload/download.jpg', '2'),
(65, 'XZXZX', 'XZXZX', 'XZXZX', 'XZXZX', '50', 'XZXZ', 'upload/favicon.ico', '2'),
(66, 'smartwatch', 'BHS', 'good quality', 'indoor', '60', 'handling and pickup', 'upload/peak.jpg', '2'),
(67, 'smartwatch', 'BHS', 'good quality', 'indoor', '60', 'handling and pickup', 'upload/peak.jpg', '2'),
(68, 'forest', 'India', 'tesshjd', 'ghghh', '10', 'zzxxz', 'upload/download.jpg', ''),
(69, 'forest', 'India', 'tesshjd', 'ghghh', '10', 'zzxxz', 'upload/download.jpg', ''),
(71, 'forest', 'India', 'tesshjd', 'ghghh', '10', 'zzxxz', 'upload/download.jpg', ''),
(72, 'Corbett', 'AUS', 'dynamic', 'outdoor', '100', 'free pickup', 'upload/peak.jpg', ''),
(75, 'forest', 'India', 'tesshjd', 'ghghh', '10', 'zzxxz', 'upload/download.jpg', ''),
(76, 'SAJAN', 'USA', 'India', 'good', '25', 'XZXXZ', 'upload/download (1).jpg', ''),
(77, 'gddgdg', 'India', '1255', 'outdoor', '30', 'test', 'upload/download.jpg', ''),
(78, 'gddgdg', 'India', '1255', 'outdoor', '30', 'test', 'upload/download.jpg', ''),
(79, 'gddgdg', 'India', '1255', 'outdoor', '30', 'test', 'upload/download.jpg', ''),
(80, 'gddgdg', 'India', '1255', 'outdoor', '30', 'test', 'upload/download.jpg', ''),
(81, 'New Package', 'IND', ' It is good and cover.', 'indoor', '90', 'free pockup', 'upload/peak.jpg', ''),
(82, 'Corbett', 'AUS', 'dynamic', 'outdoor', '100', 'free pickup', 'upload/peak.jpg', ''),
(83, 'XZXZX', 'XZXZX', 'XZXZX', 'XZXZX', '50', 'XZXZ', 'upload/favicon.ico', '');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id` int(11) NOT NULL,
  `Firstname` varchar(100) NOT NULL,
  `Lastname` varchar(100) NOT NULL,
  `Country` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `City` varchar(100) NOT NULL,
  `State` varchar(100) NOT NULL,
  `Zipcode` varchar(100) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id`, `Firstname`, `Lastname`, `Country`, `Address`, `City`, `State`, `Zipcode`, `Email`, `Phone`) VALUES
(1, 'Sajan', 'chugh', 'india', 'house no824,agrawal street', 'jalalabad', 'punjab', '152024', 'kashish44@gmail.com', '8427254409'),
(8, 'Ankush', 'Chugh', 'India', 'cxcxc', 'jalalabad', 'punjab', '152024', 'anmol32@gmail.com', '8427254497'),
(9, 'surinder', 'kumar', 'india', 'xvxvfdf', 'jalalabad', 'punjab', '152024', 'anmol32@gmail.com', '70092666593'),
(10, 'surinder', 'kumar', 'india', 'xvxvfdf', 'jalalabad', 'punjab', '152024', 'anmol32@gmail.com', '70092666593'),
(11, 'surinder', 'kumar', 'india', 'xvxvfdf', 'jalalabad', 'punjab', '152024', 'anmol32@gmail.com', '70092666593'),
(12, 'sajan', 'chugh', 'india', 'house no824,agrawal street', 'jalalabad', 'punjab', '152024', 'kashish44@gmail.com', '8427254409'),
(13, 'sajan', 'chugh', 'india', 'house no824,agrawal street', 'jalalabad', 'punjab', '152024', 'kashish44@gmail.com', '8427254409'),
(14, 'sajan', 'chugh', 'india', 'house no824,agrawal street', 'jalalabad', 'punjab', '152024', 'kashish44@gmail.com', '8427254409');

-- --------------------------------------------------------

--
-- Table structure for table `crud`
--

CREATE TABLE `crud` (
  `id` int(11) NOT NULL,
  `nationalparkname` varchar(100) NOT NULL,
  `nationalparklocation` varchar(100) NOT NULL,
  `nationalparkdetails` varchar(100) NOT NULL,
  `nationalparktype` varchar(50) NOT NULL,
  `priceinusd` varchar(50) NOT NULL,
  `nationalparkfeatures` varchar(100) NOT NULL,
  `nationalparkimage` varchar(250) NOT NULL,
  `package` varchar(400) NOT NULL,
  `Bookpackage` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crud`
--

INSERT INTO `crud` (`id`, `nationalparkname`, `nationalparklocation`, `nationalparkdetails`, `nationalparktype`, `priceinusd`, `nationalparkfeatures`, `nationalparkimage`, `package`, `Bookpackage`) VALUES
(3, 'gddgdg', 'India', '1255', 'outdoor', '30', 'test', 'upload/download.jpg', '', 1),
(4, 'forest', 'India', 'tesshjd', 'ghghh', '10', 'zzxxz', 'upload/download.jpg', '', 0),
(14, 'XZXZX', 'XZXZX', 'XZXZX', 'XZXZX', '50', 'XZXZ', 'upload/favicon.ico', '', 0),
(18, 'GagandeepTest', 'AFG', 'GaganTesting', 'TestingByGagan', '40', 'Testinggagan', 'upload/download.jpg', '', 1),
(20, 'SAJAN', 'USA', 'India', 'good', '25', 'XZXXZ', 'upload/download (1).jpg', '', 1),
(22, 'multinational park', 'ALB', 'Good', 'OUTDOOR', '45', 'Free pickup', 'upload/peak.jpg', '', 0),
(23, 'Animal park', 'India', 'Good', 'Outdoor', '55', 'Multinational', 'upload/peak.jpg', '', 0),
(24, 'smartwatch', 'BHS', 'good quality', 'indoor', '60', 'handling and pickup', 'upload/peak.jpg', '', 0),
(27, 'Corbett', 'AUS', 'dynamic', 'outdoor', '100', 'free pickup', 'upload/peak.jpg', '', 0),
(28, 'New Package', 'IND', ' It is good and cover.', 'indoor', '90', 'free pockup', 'upload/peak.jpg', '', 0),
(29, ' Leisure Valley', 'IND', 'It is properly built.', 'outdoor', '90', 'drop and pickup facility', 'upload/pic.jfif', '', 0),
(30, 'New park', 'AUS', 'Park is Good', 'outdoor', '20', 'facility for parking ', 'upload/peak.jpg', '', 0),
(31, 'Silent Valley', 'IND', 'Silent Valley is specific for the outsider.', 'outdoor', '80', 'Good Facility and Work Area', 'upload/download (1).jfif', '', 0),
(32, 'Chandelier Park', 'AUS', 'Park is situated in good area.', 'outdoor', '100', 'Free pickup', 'upload/images.jfif', '', 0),
(33, 'Kaziranga National Park', 'IND', 'Kaziranga National Park is a national park in the Golaghat and Nagaon districts of the state of Assa', 'outdoor', '200', 'Free pickup', 'upload/th.jfif', '', 0),
(34, 'Manas National Park', 'IND', 'Manas National Park is a national park, Project Tiger reserve, and an elephant reserve in Assam, Ind', 'outdoor', '60', 'Free pickup', 'upload/Manas_National_Park.jpg', '', 0),
(35, 'Tadoba National Park', 'IND', 'Park is Good For Entertainment and Adventure.', 'outdoor', '200', 'Free pickup', 'upload/download (2).jfif', '', 0),
(36, 'Kanha National Park', 'IND', 'kanha is national park located in india,', 'outdoor', '90', 'Free pickup', 'upload/download (2).jfif', '', 0),
(37, 'Gir National Park', 'IND', 'Gir Is situated in Gujrat.', 'outdoor', '50', 'free delivery', 'upload/th (1).jfif', '', 0),
(38, 'Gir National Park', 'IND', 'Gir Is situated in Gujrat.', 'outdoor', '50', 'free delivery', 'upload/th (1).jfif', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phonenumber` varchar(12) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Reason` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id`, `Name`, `Email`, `Phonenumber`, `Address`, `Reason`) VALUES
(1, 'Gagan', 'gagandeepattri8@gmail.com', '9872114521', 'Mohali', 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `sender_type` varchar(100) NOT NULL,
  `message_content` varchar(400) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `sender_type`, `message_content`, `created_at`) VALUES
(1, 'admin', 'bcvvc', '2024-06-12 09:11:22'),
(2, 'admin', 'this is not good for the package', '2024-06-12 09:12:49'),
(3, 'admin', 'not good the package', '2024-06-12 09:14:08'),
(4, 'admin', 'not good for the package', '2024-06-12 09:14:28'),
(5, 'admin', 'xxdvvv', '2024-06-12 09:15:02'),
(6, 'admin', 'thisn is bjkdkdl', '2024-06-12 09:15:59'),
(7, 'admin', 'nnmxzndxnn', '2024-06-12 09:18:51'),
(8, 'admin', 'xbvgbb', '2024-06-12 09:19:03'),
(9, 'admin', 'sajan', '2024-06-12 09:19:13'),
(10, 'admin', 'fggfgfg', '2024-06-12 09:37:31'),
(11, 'admin', 'xcxcxc', '2024-06-12 09:37:46'),
(12, 'admin', 'cxcxcxc', '2024-06-12 09:43:15'),
(13, 'admin', 'gagan', '2024-06-12 09:52:52'),
(14, 'admin', 'zsczczc', '2024-06-13 08:19:44'),
(15, 'admin', 'dsfdgfdfd', '2024-06-13 08:20:11'),
(16, 'admin', 'hlo', '2024-06-13 08:21:02'),
(17, 'admin', 'this us he customer', '2024-06-13 08:43:51'),
(18, 'admin', 'czczcz', '2024-06-14 05:23:28');

-- --------------------------------------------------------

--
-- Table structure for table `policy`
--

CREATE TABLE `policy` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `policy`
--

INSERT INTO `policy` (`id`, `content`) VALUES
(1, '<!DOCTYPE html>\r\n<html lang=\"en\">\r\n<head>\r\n    <meta charset=\"UTF-8\">\r\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n    <title>Privacy Policy - [Your Company Name]</title>\r\n    <style>\r\n        body {\r\n            font-family: Arial, sans-serif;\r\n            line-height: 1.6;\r\n            margin: 0;\r\n            padding: 20px;\r\n            background-color: #f0f0f0; /* Light gray background */\r\n        }\r\n        .container {\r\n            max-width: 800px;\r\n            margin: auto;\r\n            background: #ffffff; /* White background for content */\r\n            padding: 30px;\r\n            border-radius: 8px;\r\n            box-shadow: 0 0 10px rgba(0,0,0,0.1);\r\n        }\r\n        h1 {\r\n            color: #333333; /* Dark gray headings */\r\n            text-align: center; /* Center-align headings */\r\n        }\r\n        h2 {\r\n            color: #333333; /* Dark gray headings */\r\n            margin-top: 30px;\r\n        }\r\n        p {\r\n            color: #666666; /* Medium gray text */\r\n            margin-bottom: 20px;\r\n        }\r\n        ul {\r\n            margin-bottom: 20px;\r\n        }\r\n        li {\r\n            margin-bottom: 10px;\r\n        }\r\n    </style>\r\n</head>\r\n<body>\r\n    <div class=\"container\">\r\n        <h1>Privacy Policy</h1>\r\n        \r\n        <p>This privacy policy outlines how [Your Company Name] collects, uses, maintains, and discloses information collected from users (each, a \"User\") of the [Your Website URL] website (\"Site\"). This privacy policy applies to the Site and all products and services offered by [Your Company Name].</p>\r\n        \r\n        <h2>Personal Identification Information</h2>\r\n        <p>We may collect personal identification information from Users in a variety of ways, including, but not limited to, when Users visit our site, register on the site, place an order, subscribe to the newsletter, fill out a form, and in connection with other activities, services, features or resources we make available on our Site.</p>\r\n        \r\n        <h2>Non-personal Identification Information</h2>\r\n        <p>We may collect non-personal identification information about Users whenever they interact with our Site. Non-personal identification information may include the browser name, the type of computer and technical information about Users means of connection to our Site, such as the operating system and the Internet service providers utilized and other similar information.</p>\r\n        \r\n        <h2>Web Browser Cookies</h2>\r\n        <p>Our Site may use \"cookies\" to enhance User experience. User\'s web browser places cookies on their hard drive for record-keeping purposes and sometimes to track information about them. Users may choose to set their web browser to refuse cookies or to alert you when cookies are being sent. If they do so, note that some parts of the Site may not function properly.</p>\r\n        \r\n        <h2>How We Use Collected Information</h2>\r\n        <p>[Your Company Name] may collect and use Users personal information for the following purposes:</p>\r\n        <ul>\r\n            <li>- To improve customer service</li>\r\n            <li>- To personalize user experience</li>\r\n            <li>- To improve our Site</li>\r\n            <li>- To process payments</li>\r\n            <li>- To send periodic emails</li>\r\n        </ul>\r\n        \r\n        <h2>How We Protect Your Information</h2>\r\n        <p>We adopt appropriate data collection, storage, and processing practices and security measures to protect against unauthorized access, alteration, disclosure, or destruction of your personal information, username, password, transaction information, and data stored on our Site.</p>\r\n        \r\n        <h2>Changes to This Privacy Policy</h2>\r\n        <p>[Your Company Name] has the discretion to update this privacy policy at any time. We encourage Users to frequently check this page for any changes. You acknowledge and agree that it is your responsibility to review this privacy policy periodically and become aware of modifications.</p>\r\n        \r\n        <h2>Your Acceptance of These Terms</h2>\r\n        <p>By using this Site, you signify your acceptance of this policy. If you do not agree to this policy, please do not use our Site. Your continued use of the Site following the posting of changes to this policy will be deemed your acceptance of those changes.</p>\r\n        \r\n        <h2>Contacting Us</h2>\r\n        <p>If you have any questions about this Privacy Policy, the practices of this site, or your dealings with this site, please contact us at:</p>\r\n      <p>[Your Company Name]</p>\r\n        <p>[Address]</p>\r\n        <p>[Email Address]</p>\r\n        <p>[Phone Number]</p>\r\n        \r\n    </div>\r\n</body>\r\n</html>\r\n'),
(6, '<!DOCTYPE html>\r\n<html lang=\"en\">\r\n<head>\r\n    <meta charset=\"UTF-8\">\r\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n    <title>Privacy Policy - [Your Company Name]</title>\r\n    <style>\r\n        body {\r\n            font-family: Arial, sans-serif;\r\n            line-height: 1.6;\r\n            margin: 0;\r\n            padding: 20px;\r\n            background-color: #f0f0f0; /* Light gray background */\r\n        }\r\n        .container {\r\n            max-width: 800px;\r\n            margin: auto;\r\n            background: #ffffff; /* White background for content */\r\n            padding: 30px;\r\n            border-radius: 8px;\r\n            box-shadow: 0 0 10px rgba(0,0,0,0.1);\r\n        }\r\n        h1 {\r\n            color: #333333; /* Dark gray headings */\r\n            text-align: center; /* Center-align headings */\r\n        }\r\n        h2 {\r\n            color: #333333; /* Dark gray headings */\r\n            margin-top: 30px;\r\n        }\r\n        p {\r\n            color: #666666; /* Medium gray text */\r\n            margin-bottom: 20px;\r\n        }\r\n        ul {\r\n            margin-bottom: 20px;\r\n        }\r\n        li {\r\n            margin-bottom: 10px;\r\n        }\r\n    </style>\r\n</head>\r\n<body>\r\n    <div class=\"container\">\r\n        <h1>Privacy Policy</h1>\r\n        \r\n        <p>This privacy policy outlines how [Your Company Name] collects, uses, maintains, and discloses information collected from users (each, a \"User\") of the [Your Website URL] website (\"Site\"). This privacy policy applies to the Site and all products and services offered by [Your Company Name].</p>\r\n        \r\n        <h2>Personal Identification Information</h2>\r\n        <p>We may collect personal identification information from Users in a variety of ways, including, but not limited to, when Users visit our site, register on the site, place an order, subscribe to the newsletter, fill out a form, and in connection with other activities, services, features or resources we make available on our Site.</p>\r\n        \r\n        <h2>Non-personal Identification Information</h2>\r\n        <p>We may collect non-personal identification information about Users whenever they interact with our Site. Non-personal identification information may include the browser name, the type of computer and technical information about Users means of connection to our Site, such as the operating system and the Internet service providers utilized and other similar information.</p>\r\n        \r\n        <h2>Web Browser Cookies</h2>\r\n        <p>Our Site may use \"cookies\" to enhance User experience. User\'s web browser places cookies on their hard drive for record-keeping purposes and sometimes to track information about them. Users may choose to set their web browser to refuse cookies or to alert you when cookies are being sent. If they do so, note that some parts of the Site may not function properly.</p>\r\n        \r\n        <h2>How We Use Collected Information</h2>\r\n        <p>[Your Company Name] may collect and use Users personal information for the following purposes:</p>\r\n        <ul>\r\n            <li>- To improve customer service</li>\r\n            <li>- To personalize user experience</li>\r\n            <li>- To improve our Site</li>\r\n            <li>- To process payments</li>\r\n            <li>- To send periodic emails</li>\r\n        </ul>\r\n        \r\n        <h2>How We Protect Your Information</h2>\r\n        <p>We adopt appropriate data collection, storage, and processing practices and security measures to protect against unauthorized access, alteration, disclosure, or destruction of your personal information, username, password, transaction information, and data stored on our Site.</p>\r\n        \r\n        <h2>Changes to This Privacy Policy</h2>\r\n        <p>[Your Company Name] has the discretion to update this privacy policy at any time. We encourage Users to frequently check this page for any changes. You acknowledge and agree that it is your responsibility to review this privacy policy periodically and become aware of modifications.</p>\r\n        \r\n        <h2>Your Acceptance of These Terms</h2>\r\n        <p>By using this Site, you signify your acceptance of this policy. If you do not agree to this policy, please do not use our Site. Your continued use of the Site following the posting of changes to this policy will be deemed your acceptance of those changes.</p>\r\n        \r\n        <h2>Contacting Us</h2>\r\n        <p>If you have any questions about this Privacy Policy, the practices of this site, or your dealings with this site, please contact us at:</p>\r\n      <p>[Your Company Name]</p>\r\n        <p>[Address]</p>\r\n        <p>[Email Address]</p>\r\n        <p>[Phone Number]</p>\r\n        \r\n    </div>\r\n</body>\r\n</html>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `nationalparkname` varchar(100) NOT NULL,
  `nationalparklocation` varchar(100) NOT NULL,
  `nationalparkdetails` varchar(100) NOT NULL,
  `nationalparktype` varchar(100) NOT NULL,
  `priceinusd` varchar(100) NOT NULL,
  `nationalparkfeatures` varchar(100) NOT NULL,
  `nationalparkimage` varchar(250) NOT NULL,
  `notes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `notification` int(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`id`, `user_id`, `package_id`, `nationalparkname`, `nationalparklocation`, `nationalparkdetails`, `nationalparktype`, `priceinusd`, `nationalparkfeatures`, `nationalparkimage`, `notes`, `notification`, `created_at`) VALUES
(1, 9, 20, 'SAJAN', 'USA', 'India', 'good', '25', 'XZXXZ', 'upload/download (1).jpg', '[{\"note\":\"hii\",\"key\":\"Customer\",\"user_id\":\"9\",\"package_id\":\"20\",\"time\":\"27-06-2024 07:28:21\"},{\"note\":\"hlo\",\"key\":\"Customer\",\"user_id\":\"9\",\"package_id\":\"20\",\"time\":\"27-06-2024 09:43:58\"},{\"note\":\"yes \",\"key\":\"Admin\",\"time\":\"27-06-2024:09:44:40\"},{\"key\":\"Admin\",\"note\":\"what you want to ask\",\"time\":\"28-06-2024:08:38:32\"},{\"key\":\"Admin\",\"note\":\"hlo\",\"time\":\"01-07-2024:11:42:35\"},{\"key\":\"Admin\",\"note\":\"hlo\",\"time\":\"01-07-2024:11:42:35\"},{\"key\":\"Admin\",\"note\":\"xcxc\",\"time\":\"01-07-2024:11:42:45\"},{\"key\":\"Admin\",\"note\":\"ok done\",\"time\":\"01-07-2024:11:42:57\"}]', 0, '2024-07-01 09:42:57'),
(2, 9, 4, 'forest', 'India', 'tesshjd', 'ghghh', '10', 'zzxxz', 'upload/download.jpg', '[{\"note\":\"yes sure\",\"key\":\"Customer\",\"user_id\":\"9\",\"package_id\":\"4\",\"time\":\"27-06-2024 07:29:06\"},{\"note\":\"hii\",\"key\":\"Customer\",\"user_id\":\"9\",\"package_id\":\"4\",\"time\":\"27-06-2024 07:32:44\"},{\"note\":\"hlo\",\"key\":\"Admin\",\"time\":\"27-06-2024:09:46:30\"},{\"note\":\"done\",\"key\":\"Customer\",\"user_id\":\"9\",\"package_id\":\"4\",\"time\":\"27-06-2024 09:47:14\"}]', 0, '2024-06-27 07:47:14'),
(3, 9, 28, 'New Package', 'IND', ' It is good and cover.', 'indoor', '90', 'free pockup', 'upload/peak.jpg', '[{\"key\":\"customer\",\"note\":null,\"user_id\":\"9\"},{\"key\":\"customer\",\"notes\":\"hlo\",\"user_id\":\"9\"},{\"note\":\"HII\",\"key\":\"Customer\",\"time\":\"26-06-2024 08:59:24\"},{\"note\":\"\",\"key\":\"Customer\",\"user_id\":\"9\",\"package_id\":\"28\",\"time\":\"27-06-2024 07:18:54\"},{\"note\":\"hlo\",\"key\":\"Customer\",\"user_id\":\"9\",\"package_id\":\"28\",\"time\":\"27-06-2024 08:43:59\"},{\"key\":\"Admin\",\"note\":\"hlo\",\"time\":\"28-06-2024:08:39:05\"}]', 0, '2024-06-28 06:39:05'),
(4, 9, 3, 'gddgdg', 'India', '1255', 'outdoor', '30', 'test', 'upload/download.jpg', '{\"note\":\"hlo\",\"key\":\"Customer\",\"0\":{\"note\":\"hlo\",\"key\":\"Admin\",\"time\":\"27-06-2024:03:43:09\"},\"1\":{\"note\":\"hii\",\"key\":\"Customer\",\"user_id\":\"9\",\"package_id\":\"3\",\"time\":\"27-06-2024 07:35:22\"},\"2\":{\"note\":\"xcxc\",\"key\":\"Customer\",\"user_id\":\"9\",\"time\":\"27-06-2024 08:53:07\"},\"3\":{\"note\":\"hlo\",\"key\":\"Customer\",\"user_id\":\"9\",\"time\":\"27-06-2024 08:53:13\"},\"4\":{\"note\":\"hlo\",\"key\":\"Customer\",\"user_id\":\"9\",\"time\":\"27-06-2024 08:54:00\"},\"5\":{\"note\":\"testing\",\"key\":\"Customer\",\"user_id\":\"9\",\"package_id\":\"3\",\"time\":\"27-06-2024 09:37:29\"},\"6\":{\"note\":\"hlo\",\"key\":\"Customer\",\"user_id\":\"9\",\"package_id\":\"3\",\"time\":\"27-06-2024 09:40:15\"}}', 0, '2024-06-27 07:40:15'),
(12, 9, 27, 'Corbett', 'AUS', 'dynamic', 'outdoor', '100', 'free pickup', 'upload/peak.jpg', '[{\"note\":\"\",\"key\":\"Customer\",\"user_id\":\"9\",\"package_id\":\"27\",\"time\":\"27-06-2024 07:21:06\"},{\"note\":\"\",\"key\":\"Customer\",\"user_id\":\"9\",\"package_id\":\"27\",\"time\":\"27-06-2024 07:22:24\"},{\"note\":null,\"key\":\"Customer\",\"user_id\":\"9\",\"package_id\":\"27\",\"time\":\"27-06-2024 07:22:49\"},{\"note\":\"hii\",\"key\":\"Customer\",\"user_id\":\"9\",\"package_id\":\"27\",\"time\":\"27-06-2024 07:26:09\"},{\"note\":\"hlo\",\"key\":\"Customer\",\"user_id\":\"9\",\"package_id\":\"27\",\"time\":\"27-06-2024 07:28:03\"},{\"note\":\"hlo\",\"key\":\"Customer\",\"user_id\":null,\"package_id\":\"27\",\"time\":\"27-06-2024 08:34:46\"},{\"note\":\"hii\",\"key\":\"Customer\",\"user_id\":null,\"package_id\":\"27\",\"time\":\"27-06-2024 08:35:30\"},{\"note\":\"hlo\",\"key\":\"Customer\",\"user_id\":null,\"package_id\":\"27\",\"time\":\"27-06-2024 08:36:54\"},{\"note\":\"hii\",\"key\":\"Customer\",\"user_id\":\"9\",\"package_id\":\"27\",\"time\":\"27-06-2024 08:39:03\"},{\"note\":\"hlo\",\"key\":\"Customer\",\"user_id\":\"9\",\"package_id\":\"27\",\"time\":\"27-06-2024 08:40:43\"},{\"note\":\"yess done\",\"key\":\"Admin\",\"time\":\"27-06-2024:08:41:17\"},{\"note\":\"hlo\",\"key\":\"Customer\",\"user_id\":\"9\",\"package_id\":\"27\",\"time\":\"27-06-2024 08:49:33\"},{\"note\":\"hlo\",\"key\":\"Customer\",\"user_id\":\"9\",\"package_id\":\"27\",\"time\":\"27-06-2024 08:49:42\"},{\"note\":\"hlo\",\"key\":\"Customer\",\"user_id\":\"9\",\"package_id\":\"27\",\"time\":\"27-06-2024 08:49:51\"}]', 0, '2024-06-27 06:49:51'),
(14, 9, 22, 'multinational park', 'ALB', 'Good', 'OUTDOOR', '45', 'Free pickup', 'upload/peak.jpg', '{\"note\":\"new one\",\"key\":\"Customer\",\"user_id\":\"9\",\"package_id\":\"22\",\"0\":{\"note\":\"whtsup\",\"key\":\"Admin\",\"time\":\"26-06-2024 07:00:56\"},\"1\":{\"key\":\"admin\",\"note\":\"nthng\"},\"2\":{\"note\":\"ok\",\"key\":\"Admin\",\"time\":\"27-06-2024:06:16:42\"},\"3\":{\"note\":\"hlo\",\"key\":\"Customer\",\"user_id\":\"9\",\"package_id\":\"22\",\"time\":\"27-06-2024 09:00:22\"},\"4\":{\"note\":\"hlo\",\"key\":\"Customer\",\"user_id\":\"9\",\"package_id\":\"22\",\"time\":\"27-06-2024 09:05:33\"},\"5\":{\"note\":\"hlo\",\"key\":\"Customer\",\"user_id\":\"9\",\"package_id\":\"22\",\"time\":\"27-06-2024 09:28:07\"},\"6\":{\"note\":\"hlo\",\"key\":\"Customer\",\"user_id\":\"9\",\"package_id\":\"22\",\"time\":\"27-06-2024 09:33:45\"},\"7\":{\"note\":\"hlo\",\"key\":\"Customer\",\"user_id\":\"9\",\"package_id\":\"22\",\"time\":\"27-06-2024 09:33:50\"},\"8\":{\"note\":\"hii\",\"key\":\"Customer\",\"user_id\":\"9\",\"package_id\":\"22\",\"time\":\"27-06-2024 09:34:17\"},\"9\":{\"note\":\"xcxc\",\"key\":\"Customer\",\"user_id\":\"9\",\"package_id\":\"22\",\"time\":\"27-06-2024 09:35:24\"},\"10\":{\"note\":\"hlo\",\"key\":\"Customer\",\"user_id\":\"9\",\"package_id\":\"22\",\"time\":\"27-06-2024 09:36:52\"}}', 0, '2024-06-27 09:12:45'),
(15, 9, 14, 'XZXZX', 'XZXZX', 'XZXZX', 'XZXZX', '50', 'XZXZ', 'upload/favicon.ico', '{\"note\":\"new added\",\"key\":\"Customer\",\"0\":{\"note\":\"no found\",\"key\":\"Customer\",\"time\":\"26-06-2024 07:06:50\"}}', 0, '2024-06-26 05:06:50'),
(20, 12, 33, 'Kaziranga National Park', 'IND', 'Kaziranga National Park is a national park in the Golaghat and Nagaon districts of the state of Assa', 'outdoor', '200', 'Free pickup', 'upload/th.jfif', '{\"note\":\"hlo\",\"key\":\"Customer\",\"user_id\":\"12\",\"package_id\":\"33\",\"time\":\"27-06-2024 10:34:46\",\"0\":{\"note\":\"hlo\",\"key\":\"Admin\",\"time\":\"27-06-2024:10:36:33\"},\"1\":{\"note\":\"i have enquiry about this \",\"key\":\"Customer\",\"user_id\":\"12\",\"package_id\":\"33\",\"time\":\"27-06-2024 10:43:55\"}}', 0, '2024-06-27 08:43:55'),
(21, 12, 20, 'SAJAN', 'USA', 'India', 'good', '25', 'XZXXZ', 'upload/download (1).jpg', '{\"note\":\"testing\",\"key\":\"Customer\",\"user_id\":\"12\",\"package_id\":\"20\",\"time\":\"27-06-2024 10:46:01\",\"0\":{\"note\":\"hlo\",\"key\":\"Admin\",\"time\":\"27-06-2024:10:48:22\"},\"1\":{\"note\":\"yes\",\"key\":\"Admin\",\"time\":\"27-06-2024:11:39:26\"},\"2\":{\"note\":\"yes\",\"key\":\"Admin\",\"time\":\"27-06-2024:11:41:32\"}}', 0, '2024-06-27 09:41:32'),
(22, 12, 3, 'gddgdg', 'India', '1255', 'outdoor', '30', 'test', 'upload/download.jpg', '{\"note\":\"hlo\",\"key\":\"Customer\",\"user_id\":\"12\",\"package_id\":\"3\",\"time\":\"27-06-2024 12:40:35\",\"0\":{\"note\":\"hlo\",\"key\":\"Customer\",\"user_id\":\"12\",\"package_id\":\"3\",\"time\":\"27-06-2024 12:42:03\"},\"1\":{\"note\":\"yes\",\"key\":\"Admin\",\"time\":\"28-06-2024:04:36:43\"},\"2\":{\"note\":\"hlo\",\"key\":\"Customer\",\"user_id\":\"12\",\"package_id\":\"3\",\"time\":\"28-06-2024 04:41:55\"},\"3\":{\"note\":\"ok\",\"key\":\"Admin\",\"time\":\"28-06-2024:04:45:50\"},\"4\":{\"note\":\"i want to ask a question?\",\"key\":\"Customer\",\"user_id\":\"12\",\"package_id\":\"3\",\"time\":\"28-06-2024 04:46:23\"},\"5\":{\"note\":\"ok sure\",\"key\":\"Admin\",\"time\":\"28-06-2024:05:20:15\"},\"6\":{\"note\":\"yes i want to concern the issue\",\"key\":\"Customer\",\"user_id\":\"12\",\"package_id\":\"3\",\"time\":\"28-06-2024 05:21:49\"},\"7\":{\"note\":\"yes u r free to ask\",\"key\":\"Admin\",\"time\":\"28-06-2024:05:28:08\"},\"8\":{\"note\":\"ok sure\",\"key\":\"Customer\",\"package_id\":\"3\",\"time\":\"28-06-2024 06:48:41\"},\"9\":{\"note\":\"yes sir\",\"key\":\"Admin\",\"time\":\"28-06-2024:06:51:09\"},\"10\":{\"note\":\"test\",\"key\":\"Admin\",\"time\":\"28-06-2024:06:54:22\"},\"11\":{\"note\":\"ok \",\"key\":\"Customer\",\"package_id\":\"3\",\"time\":\"28-06-2024 06:55:07\"},\"12\":{\"key\":\"Admin\",\"note\":\"ok\",\"time\":\"28-06-2024:07:14:46\"},\"13\":{\"key\":\"Admin\",\"note\":\"hlo\",\"time\":\"28-06-2024:07:41:33\"},\"14\":{\"note\":\"hmm\",\"key\":\"Customer\",\"package_id\":\"3\",\"time\":\"28-06-2024 09:03:43\"},\"15\":{\"key\":\"Admin\",\"note\":\"done\",\"time\":\"28-06-2024:09:04:41\"},\"16\":{\"key\":\"Admin\",\"note\":\"test\",\"time\":\"28-06-2024:09:06:41\"},\"17\":{\"note\":\"okk\",\"key\":\"Customer\",\"package_id\":\"3\",\"time\":\"28-06-2024 09:18:13\"}}', 0, '2024-06-28 07:18:13'),
(23, 12, 24, 'smartwatch', 'BHS', 'good quality', 'indoor', '60', 'handling and pickup', 'upload/peak.jpg', '', 0, '2024-06-27 11:08:13'),
(24, 12, 23, 'Animal park', 'India', 'Good', 'Outdoor', '55', 'Multinational', 'upload/peak.jpg', '{\"note\":\"yes\",\"key\":\"Customer\",\"user_id\":\"12\",\"package_id\":\"23\",\"time\":\"27-06-2024 01:15:40\",\"0\":{\"note\":\"yes\",\"key\":\"Customer\",\"user_id\":\"12\",\"package_id\":\"23\",\"time\":\"27-06-2024 01:16:43\"}}', 0, '2024-06-27 11:16:43'),
(25, 12, 27, 'Corbett', 'AUS', 'dynamic', 'outdoor', '100', 'free pickup', 'upload/peak.jpg', '{\"note\":\"idd\",\"key\":\"Customer\",\"user_id\":\"12\",\"package_id\":\"27\",\"time\":\"27-06-2024 01:39:52\",\"0\":{\"note\":\"hlo\",\"key\":\"Customer\",\"user_id\":\"12\",\"package_id\":\"27\",\"time\":\"27-06-2024 01:45:20\"},\"1\":{\"note\":\"yes\",\"key\":\"Customer\",\"user_id\":\"12\",\"package_id\":\"27\",\"time\":\"28-06-2024 04:43:22\"}}', 0, '2024-06-28 02:43:22'),
(26, 12, 34, 'Manas National Park', 'IND', 'Manas National Park is a national park, Project Tiger reserve, and an elephant reserve in Assam, Ind', 'outdoor', '60', 'Free pickup', 'upload/Manas_National_Park.jpg', '{\"note\":\"hlo\",\"key\":\"Customer\",\"user_id\":\"12\",\"package_id\":\"34\",\"time\":\"27-06-2024 01:45:45\",\"0\":{\"note\":\"hlo\",\"key\":\"Customer\",\"user_id\":\"12\",\"package_id\":\"34\",\"time\":\"27-06-2024 01:46:33\"},\"1\":{\"note\":\"hii new testing\",\"key\":\"Customer\",\"user_id\":\"12\",\"package_id\":\"34\",\"time\":\"28-06-2024 04:00:31\"},\"2\":{\"note\":\"yes tell me\",\"key\":\"Admin\",\"time\":\"28-06-2024:04:01:26\"}}', 0, '2024-06-28 02:01:26'),
(27, 12, 32, 'Chandelier Park', 'AUS', 'Park is situated in good area.', 'outdoor', '100', 'Free pickup', 'upload/images.jfif', '{\"note\":\"hlo\",\"key\":\"Customer\",\"user_id\":\"12\",\"package_id\":\"32\",\"time\":\"27-06-2024 01:46:49\",\"0\":{\"note\":\"hlo\",\"key\":\"Customer\",\"user_id\":\"12\",\"package_id\":\"32\",\"time\":\"27-06-2024 01:48:04\"},\"1\":{\"key\":\"Admin\",\"note\":\"test\",\"time\":\"28-06-2024:08:39:42\"}}', 0, '2024-06-28 06:39:42'),
(28, 12, 31, 'Silent Valley', 'IND', 'Silent Valley is specific for the outsider.', 'outdoor', '80', 'Good Facility and Work Area', 'upload/download (1).jfif', '{\"note\":\"hlo\",\"key\":\"Customer\",\"user_id\":\"12\",\"package_id\":\"31\",\"time\":\"28-06-2024 03:48:52\",\"0\":{\"note\":\"hlo\",\"key\":\"Admin\",\"time\":\"28-06-2024:03:51:03\"},\"1\":{\"note\":\"I have a doubt on this package\",\"key\":\"Customer\",\"user_id\":\"12\",\"package_id\":\"31\",\"time\":\"28-06-2024 03:52:10\"},\"2\":{\"note\":\"which type of doubt u have?\",\"key\":\"Admin\",\"time\":\"28-06-2024:04:08:33\"},\"3\":{\"note\":\"yes plz tell\",\"key\":\"Admin\",\"time\":\"28-06-2024:04:24:19\"}}', 1, '2024-06-28 02:24:19'),
(29, 12, 29, ' Leisure Valley', 'IND', 'It is properly built.', 'outdoor', '90', 'drop and pickup facility', 'upload/pic.jfif', '{\"note\":\"hii\",\"key\":\"Customer\",\"user_id\":\"12\",\"package_id\":\"29\",\"time\":\"28-06-2024 04:39:53\",\"0\":{\"note\":\"hlo\",\"key\":\"Customer\",\"user_id\":\"12\",\"package_id\":\"29\",\"time\":\"28-06-2024 04:40:44\"},\"1\":{\"note\":\"hii\",\"key\":\"Customer\",\"user_id\":\"12\",\"package_id\":\"29\",\"time\":\"28-06-2024 04:40:58\"},\"2\":{\"key\":\"Admin\",\"note\":\"tour package\",\"time\":\"28-06-2024:08:41:06\"},\"3\":{\"note\":\"gud\",\"key\":\"Customer\",\"package_id\":\"29\",\"time\":\"28-06-2024 08:41:43\"}}', 0, '2024-06-28 06:41:43'),
(30, 12, 18, 'GagandeepTest', 'AFG', 'GaganTesting', 'TestingByGagan', '40', 'Testinggagan', 'upload/download.jpg', '{\"note\":\"yes\",\"key\":\"Customer\",\"package_id\":\"18\",\"time\":\"28-06-2024 06:50:09\",\"0\":{\"note\":\"testtest\",\"key\":\"Customer\",\"package_id\":\"18\",\"time\":\"28-06-2024 06:50:21\"},\"1\":{\"key\":\"Admin\",\"note\":\"yes\",\"time\":\"28-06-2024:08:39:54\"},\"2\":{\"note\":\"ok\",\"key\":\"Customer\",\"package_id\":\"18\",\"time\":\"28-06-2024 08:41:24\"}}', 0, '2024-06-28 06:41:24');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `packageid` int(11) NOT NULL,
  `packagename` varchar(100) NOT NULL,
  `packageprice` varchar(100) NOT NULL,
  `customerid` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `Firstname` varchar(100) NOT NULL,
  `Lastname` varchar(100) NOT NULL,
  `Country` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `City` varchar(100) NOT NULL,
  `State` varchar(100) NOT NULL,
  `Zipcode` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `orderid` varchar(200) NOT NULL,
  `payerid` varchar(200) NOT NULL,
  `paymentid` varchar(50) NOT NULL,
  `Enquiry` varchar(200) NOT NULL,
  `Note` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`packageid`, `packagename`, `packageprice`, `customerid`, `status`, `id`, `Firstname`, `Lastname`, `Country`, `Address`, `City`, `State`, `Zipcode`, `Email`, `phone`, `orderid`, `payerid`, `paymentid`, `Enquiry`, `Note`) VALUES
(23, 'Animal park', '55', 9, 'confirmed', 1, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 'forest', '10', 9, 'confirmed', 2, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(20, 'SAJAN', '25', 9, 'confirmed', 3, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'gddgdg', '30', 9, 'confirmed', 4, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(22, 'multinational park', '45', 9, 'confirmed', 5, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(23, 'Animal park', '55', 2, 'confirmed', 6, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(23, 'Animal park', '55', 2, 'confirmed', 7, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(14, 'XZXZX', '50', 9, 'confirmed', 8, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(18, 'GagandeepTest', '40', 9, 'confirmed', 9, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'gddgdg', '30', 23, 'confirmed', 12, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 'forest', '10', 23, 'confirmed', 13, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(0, 'Your Package Name', '', 0, 'confirmed', 27, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(0, 'Package Purchase', '', 0, 'confirmed', 28, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(0, 'Package Purchase', '', 0, 'confirmed', 29, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(0, 'Package Purchase', '', 0, 'confirmed', 30, 'yASH', 'Gupta', 'india', 'adffv', 'jalalabad', 'punjab', '152024', 'sajanchugh08@gmail.com', '8427354497', '', '', '', '', ''),
(0, 'Package Purchase', '', 0, 'confirmed', 31, 'Ankkool', 'xzxx', 'xzxcc', 'czcv', 'jalalabad', 'punjab', '152024', 'sajanchugh08@gmail.com', '8427354497', '', '', '', '', ''),
(0, 'Package Purchase', '', 0, 'confirmed', 32, 'aman', 'kumar', 'india', 'mohali', 'jalalabad', 'punjab', '152024', 'sajanchugh08@gmail.com', '8427354497', '', '', '', '', ''),
(0, 'Package Purchase', '', 0, 'confirmed', 33, 'Mohit', 'kukar', 'india', 'agarwal street', 'jalalabad', 'punjab', '152024', 'sajanchugh08@gmail.com', '8427354497', '', '', '', '', ''),
(0, 'Package Purchase', '', 0, 'confirmed', 34, 'Mohit', 'kukar', 'india', 'agarwal street', 'jalalabad', 'punjab', '152024', 'sajanchugh08@gmail.com', '8427354497', '', '', '', '', ''),
(0, 'Package Purchase', '', 0, 'confirmed', 35, 'Mohit', 'kukar', 'india', 'agarwal street', 'jalalabad', 'punjab', '152024', 'sajanchugh08@gmail.com', '8427354497', '', '', '', '', ''),
(12345, 'Package Purchase', '20', 67890, 'confirmed', 36, 'mnnn', 'nnmmn', 'xxnajjs', 'xbhxb', 'xzxx', 'sqwr', '152024', 'sajanchugh08@gmail.com', '8427354497', '', '', '', '', ''),
(12345, 'Package Purchase', '20', 67890, 'confirmed', 37, 'kumar', 'rohit', 'indian', 'jalala', 'jldlkss', 'punjab', 'dzfsf', 'sahilj12@gmail.com', '8427354497', '', '', '', '', ''),
(12345, 'Package Purchase', '20', 67890, 'confirmed', 38, 'kumar', 'rohit', 'indian', 'jalala', 'jldlkss', 'punjab', 'dzfsf', 'sahilj12@gmail.com', '8427354497', '', '', '', '', ''),
(12345, 'Package Purchase', '20', 67890, 'confirmed', 39, 'kumar', 'rohit', 'indian', 'jalala', 'jldlkss', 'punjab', 'dzfsf', 'sahilj12@gmail.com', '8427354497', '', '', '', '', ''),
(0, 'Package Purchase', '50', 0, 'confirmed', 40, 'mnsmc', 'cscsvd', 'xvxvv', 'vxv xvxvv', 'x vxvv xcxc', 'cxxcxc', 'ccxcc', 'czccc@gmail.com', '8427354497', '', '', '', '', ''),
(0, 'Package Purchase', '80', 0, 'confirmed', 41, 'Sushant', 'Dhawan', 'India', '3b1 phase60,janta market', 'mohali', 'punjab', '152024', 'unique12@gmail.com', '8427354497', '', '', '', '', ''),
(0, 'Package Purchase', '80', 0, 'confirmed', 42, 'Sushant', 'Dhawan', 'India', '3b1 phase60,janta market', 'mohali', 'punjab', '152024', 'unique12@gmail.com', '8427354497', '', '', '', '', ''),
(0, 'Package Purchase', '100', 0, 'confirmed', 43, 'xcxzc', 'kumar', 'India', '3b1 phase60,janta market', 'mohali', 'punjab', '1529223', 'abhi123@gmail.com', '8427354497', '', '', '', '', ''),
(0, 'Package Purchase', '80', 0, 'confirmed', 44, 'Aman', 'kumar', 'India', 'agarwal street', 'jalalabad', 'punjab', '152024', 'sajanchugh08@gmail.com', '8427354497', '', '', '', '', ''),
(0, 'Package Purchase', '99', 0, 'confirmed', 45, 'xaaaad', 'asasas', 'xdaxaasa', 'xaxsa', 'asasada', 'dxasasa', '152024', 'sajanchugh08@gmail.com', '8427354497', '', '', '', '', ''),
(0, 'Package Purchase', '100', 0, 'confirmed', 46, 'xzxxad', 'asdcdcsc', 'cscszcscs', 'dcscss', 'dcsdss', 'zxcszsz', 'dsdsa', 'karun@gmail.com', '8427354497', '', '', '', '', ''),
(0, 'Package Purchase', '100', 0, 'confirmed', 47, 'Sushant', 'Dhawan', 'India', 'agarwal street', 'jalalabad', 'punjab', '1529223', 'sajanchugh08@gmail.com', '8427354497', '', '', '', '', ''),
(0, 'Package Purchase', '23', 0, 'confirmed', 48, 'xxax', 'xcadadxcascscz', 'xzzczc', 'xazxxaa', 'xzxzxzx', 'zxzzx', 'xzxzx', 'sajanchugh001@gmail.com', '8427354497', '', '', '', '', ''),
(0, 'Package Purchase', '80', 0, 'confirmed', 49, 'Sajan', 'Chugh', 'India', 'house no824,agrawal street', 'jalalabad', 'punjab', '152024', 'sajanchugh08@gmail.com', '8427254409', '', '', '', '', ''),
(0, 'Package Purchase', '80', 0, 'confirmed', 50, 'Sajan', 'Chugh', 'India', 'house no824,agrawal street', 'jalalabad', 'punjab', '152024', 'sajanchugh08@gmail.com', '8427254409', '', '', '', '', ''),
(0, 'Package Purchase', '70', 0, 'confirmed', 51, 'Sajan', 'chugh', 'india', 'house no824,agrawal street', 'jalalabad', 'punjab', '152024', 'sajanchugh08@gmail.com', '8427254409', '', '', '', '', ''),
(0, 'Package Purchase', '70', 0, 'confirmed', 52, 'Sajan', 'chugh', 'india', 'house no824,agrawal street', 'jalalabad', 'punjab', '152024', 'sajanchugh08@gmail.com', '8427254409', '', '', '', '', ''),
(0, 'Package Purchase', '$100', 0, 'confirmed', 53, 'sajan', 'chugh', 'india', 'house no824,agrawal street', 'jalalabad', 'punjab', '152024', 'sajanchugh08@gmail.com', '8427254409', '', '', '', '', ''),
(0, 'Package Purchase', '$100', 0, 'confirmed', 54, 'sajan', 'chugh', 'india', 'house no824,agrawal street', 'jalalabad', 'punjab', '152024', 'sajanchugh08@gmail.com', '8427254409', '', '', '', '', ''),
(0, 'Package Purchase', '$100', 0, 'confirmed', 55, 'sajan', 'chugh', 'india', 'house no824,agrawal street', 'jalalabad', 'punjab', '152024', 'sajanchugh08@gmail.com', '8427254409', '', '', '', '', ''),
(0, 'Package Purchase', '100', 0, 'confirmed', 56, 'sajan', 'chugh', 'india', 'house no824,agrawal street', 'jalalabad', 'punjab', '152024', 'sajanchugh08@gmail.com', '8427254409', '', '', '', '', ''),
(0, 'Package Purchase', '100', 0, 'confirmed', 57, 'Sahil', 'Kumar', 'india', 'house no824,agrawal street', 'jalalabad', 'punjab', '152024', 'sajanchugh08@gmail.com', '8427254409', '', '', '', '', ''),
(0, 'Package Purchase', '50', 0, 'confirmed', 58, 'Aman', 'kamboj', 'India', 'dashmesh nagar', 'jalalabad', 'punjab', '152024', 'sajanchugh08@gmail.com', '8427254409', '', '', '', '', ''),
(0, 'Package Purchase', '80', 0, 'confirmed', 59, 'sajan', 'chugh', 'India', 'house no824,agrawal street', 'jalalabad', 'punjab', '152024', 'manik22@gmail.com', '8427254409', '', '', '', '', ''),
(22, 'multinational park', '45', 2, 'pending', 60, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(22, 'multinational park', '45', 2, 'pending', 61, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(22, 'multinational park', '45', 2, 'pending', 62, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(22, 'multinational park', '45', 2, 'pending', 63, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(24, 'smartwatch', '60', 2, 'confirmed', 64, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(27, 'Corbett', '100', 2, 'confirmed', 65, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(18, 'GagandeepTest', '40', 2, 'confirmed', 66, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(14, 'XZXZX', '50', 2, 'confirmed', 67, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(20, 'SAJAN', '25', 2, 'confirmed', 68, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(0, 'Package Purchase', '100', 0, 'confirmed', 69, 'Krish', 'kakkar', 'india', 'dashmesh nagar', 'jalalabad', 'punjab', '152024', 'krish44@gmail.com', '8427254409', '', '', '', '', ''),
(24, 'smartwatch', '60', 9, 'confirmed', 70, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(24, 'smartwatch', '60', 9, 'confirmed', 71, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(27, 'Corbett', '100', 9, 'confirmed', 72, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(0, '', '', 0, 'confirmed', 73, '', '', '', '', '', '', '', '', '', '', '', '', '', 'package is notb ggod'),
(0, 'Package Purchase', '505.00', 0, 'confirmed', 74, 'sajan', 'chugh', 'India', 'house no824,agrawal street', 'jalalabad', 'punjab', '152024', 'sajanchugh08@gmail.com', '8427254409', '', '', '', '', ''),
(0, 'Package Purchase', '505.00', 0, 'confirmed', 75, 'sajan', 'chugh', 'India', 'house no824,agrawal street', 'jalalabad', 'punjab', '152024', 'sajanchugh08@gmail.com', '8427254409', '', '', '', '', ''),
(0, 'Package Purchase', '610.00', 0, 'confirmed', 76, 'sajan', 'chugh', 'dgdgdg', 'xvxvfdf', 'jalalabad', 'punjab', '152024', 'anmol32@gmail.com', '8427254409', '', '', '', '', ''),
(0, 'Package Purchase', '245.00', 0, 'confirmed', 77, 'sasas', 'chugh', 'India', 'house no824,agrawal street', 'jalalabad', 'punjab', '152024', 'sajanchugh08@gmail.com', '8427254409', '', '', '', '', ''),
(0, '', '270.00', 0, 'confirmed', 78, 'Karan', 'makkar', 'India', 'house no824,agrawal street', 'jalalabad', 'punjab', '152024', 'sajanchugh08@gmail.com', '8427254409', '', '', '', '', ''),
(0, '', '270.00', 0, 'confirmed', 79, 'Karan', 'makkar', 'India', 'house no824,agrawal street', 'jalalabad', 'punjab', '152024', 'sajanchugh08@gmail.com', '8427254409', '', '', '', '', ''),
(0, '', '270.00', 0, 'confirmed', 80, 'Karan', 'makkar', 'India', 'house no824,agrawal street', 'jalalabad', 'punjab', '152024', 'sajanchugh08@gmail.com', '8427254409', '', '', '', '', ''),
(0, '', '270.00', 0, 'confirmed', 81, 'Karan', 'makkar', 'India', 'house no824,agrawal street', 'jalalabad', 'punjab', '152024', 'sajanchugh08@gmail.com', '8427254409', '', '', '', '', ''),
(0, '', '270.00', 0, 'confirmed', 82, 'Karan', 'makkar', 'India', 'house no824,agrawal street', 'jalalabad', 'punjab', '152024', 'sajanchugh08@gmail.com', '8427254409', '', '', '', '', ''),
(0, '', '270.00', 0, 'confirmed', 83, 'karun', 'mautneja', 'india', 'house no824,agrawal street', 'jalalabad', 'punjab', '152024', 'sajanchugh08@gmail.com', '8427254409', '', '', '', '', ''),
(0, '', '270.00', 0, 'confirmed', 84, 'karun', 'mautneja', 'india', 'house no824,agrawal street', 'jalalabad', 'punjab', '152024', 'sajanchugh08@gmail.com', '8427254409', '', '', '', '', ''),
(0, 'Package Purchase', '270.00', 0, 'confirmed', 85, 'karan', 'makkar', 'india', 'dashmesh nagar', 'jalalabad', 'punjab', '152024', 'sajanchugh08@gmail.com', '8427254409', '', '', '', '', ''),
(4, 'forest', '10', 12, 'pending', 86, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(14, 'XZXZX', '50', 12, 'pending', 87, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(14, 'XZXZX', '50', 12, 'pending', 88, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(28, 'New Package', '90', 12, 'pending', 89, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(28, 'New Package', '90', 9, 'Approved', 90, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(28, 'New Package', '90', 9, 'Approved', 91, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(27, 'Corbett', '100', 12, 'confirmed', 92, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(24, 'smartwatch', '60', 12, 'pending', 93, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(18, 'GagandeepTest', '40', 12, 'Approved', 94, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(20, 'SAJAN', '25', 12, 'pending', 95, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(0, 'Package Purchase', '525.00', 0, 'confirmed', 96, 'sajan', 'chugh', 'India', 'dashmesh nagar', 'jalalabad', 'punjab', '152024', 'sajanchugh08@gmail.com', '8427254409', '', '', '', '', ''),
(0, 'Package Purchase', '525.00', 0, 'confirmed', 97, 'sajan', 'chugh', 'India', 'dashmesh nagar', 'jalalabad', 'punjab', '152024', 'sajanchugh08@gmail.com', '8427254409', '', '', '', '', ''),
(0, 'Package Purchase', '525.00', 0, 'confirmed', 98, 'sajan', 'chugh', 'India', 'house no824,agrawal street', 'jalalabad', 'punjab', '152024', 'sajanchugh08@gmail.com', '70092666593', '', '', '', '', ''),
(4, 'forest', '10', 2, 'pending', 99, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'gddgdg', '30', 2, 'confirmed', 100, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(0, '', '', 0, 'pending', 101, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(0, '', '', 0, 'pending', 102, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(0, '', '', 0, 'pending', 103, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(36, 'Kanha National Park', '90', 9, 'pending', 104, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(35, 'Tadoba National Park', '200', 9, 'pending', 105, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(34, 'Manas National Park', '60', 9, 'pending', 106, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(33, 'Kaziranga National Park', '200', 9, 'pending', 107, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(33, 'Kaziranga National Park', '200', 9, 'pending', 108, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(33, 'Kaziranga National Park', '200', 9, 'pending', 109, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(33, 'Kaziranga National Park', '200', 9, 'pending', 110, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(33, 'Kaziranga National Park', '200', 9, 'pending', 111, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(32, 'Chandelier Park', '100', 9, 'pending', 112, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(31, 'Silent Valley', '80', 9, 'pending', 113, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(30, 'New park', '20', 9, 'pending', 114, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(30, 'New park', '20', 9, 'pending', 115, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(30, 'New park', '20', 9, 'pending', 116, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(38, 'Gir National Park', '50', 9, 'pending', 117, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(37, 'Gir National Park', '50', 9, 'pending', 118, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(29, ' Leisure Valley', '90', 9, 'pending', 119, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(0, '\" . $row[', '\" . $row[', 0, 'pending', 120, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(0, '\" . $row[', '\" . $row[', 0, 'pending', 121, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(28, 'New Package', '90', 9, 'pending', 122, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(27, 'Corbett', '100', 9, 'pending', 123, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(24, 'smartwatch', '60', 9, 'pending', 124, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(14, 'XZXZX', '50', 9, 'pending', 125, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(18, 'GagandeepTest', '40', 9, 'pending', 126, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 'forest', '10', 9, 'pending', 127, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(14, 'XZXZX', '50', 9, 'pending', 128, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 'forest', '10', 9, 'pending', 129, '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phonenumber` varchar(10) NOT NULL,
  `image` varchar(250) NOT NULL,
  `is_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phonenumber`, `image`, `is_admin`) VALUES
(2, 'Surinder Arora', 'Surinder12@gmail.com', 'a88d776346f715318aa08273941c5b94', '8427354496', 'upload/favicon.ico', 1),
(4, 'GaganSingh', 'gagandeepattri8@gmail.com', 'ce34a164455404b14b2c95d7c1ca8a82', '9875441516', 'upload/logo512.png', 1),
(5, 'SAJAN', 'Kumar@gmail.com', 'a88d776346f715318aa08273941c5b94', '9875441521', 'upload/logo192.png', 0),
(6, 'Sahil', 'jalhotra@gmail.com', 'a88d776346f715318aa08273941c5b94', '8427354495', 'upload/logo512.png', 0),
(8, 'Sajan', 'kamboj12@gmail.com', 'a88d776346f715318aa08273941c5b94', '9875441520', 'upload/download.jpg', 0),
(9, 'Ankush', 'anku33@gmail.com', 'a88d776346f715318aa08273941c5b94', '876543214', 'upload/peak.jpg', 0),
(12, 'MANIK', 'MANIK12@gmail.com', 'a88d776346f715318aa08273941c5b94', '9872441301', 'upload/download (1).jpg', 0),
(13, 'Sahil', 'Sahil23@gmail.com', 'a88d776346f715318aa08273941c5b94', '9878734901', 'upload/download (1).jfif', 0),
(14, 'sam', 'sam22@gmail.com', 'a88d776346f715318aa08273941c5b94', '9872441301', 'upload/download (1).jfif', 0),
(15, 'Mohit', 'Mohit33@gmail.com', '50372c6709c206797b9a24875f02b620', '9872441301', 'upload/download (1).jfif', 0),
(16, 'Sahil', 'sahil12@gmail.com', 'a88d776346f715318aa08273941c5b94', '7009266593', 'upload/peak.jpg', 0),
(17, 'Samir', 'Samir43@gmail.com', 'a88d776346f715318aa08273941c5b94', '7009266593', 'upload/peak.jpg', 0),
(18, 'Husan', 'Husan24@gmail.com', 'a88d776346f715318aa08273941c5b94', '8427832345', 'upload/peak.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `policy`
--
ALTER TABLE `policy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `crud`
--
ALTER TABLE `crud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `policy`
--
ALTER TABLE `policy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
