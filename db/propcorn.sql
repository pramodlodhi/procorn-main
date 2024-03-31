-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2024 at 01:52 PM
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
-- Database: `propcorn`
--

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `name`) VALUES
(2, 'Balcony'),
(3, 'Deck'),
(4, 'Parking'),
(5, 'Outdoor Kitchen'),
(6, 'Tennis Courts'),
(7, 'Sun Room'),
(8, 'Cable Tv'),
(9, 'Internet'),
(10, 'Concrete Flooring');

-- --------------------------------------------------------

--
-- Table structure for table `career`
--

CREATE TABLE `career` (
  `id` int(10) NOT NULL,
  `jobId` varchar(7) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `city` varchar(50) NOT NULL,
  `exprience` varchar(20) DEFAULT NULL,
  `qualific` varchar(50) DEFAULT NULL,
  `jobPosition` varchar(100) DEFAULT NULL,
  `ctc` varchar(20) DEFAULT NULL,
  `resume` varchar(100) NOT NULL,
  `date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `career`
--

INSERT INTO `career` (`id`, `jobId`, `firstName`, `lastName`, `email`, `contact`, `city`, `exprience`, `qualific`, `jobPosition`, `ctc`, `resume`, `date`) VALUES
(16, 'J002', 'NITIN', 'LODHI', 'test@gmail.com', '7024314731', 'bhopal', '4 year', '12th', '', '4lpa', 'NITIN28122023032302.pdf', '28-12-2023'),
(29, 'J002', '', '', '', '', '', 'Select', ' ', 'Job Position', '', '29122023013946.pdf', '29-12-2023'),
(30, 'J002', 'NITIN', 'LODHI', 'lodhipramod321@gmail.com', '7024447774', 'bhopal', 'Less Than Year', '10th', 'Backend Developer', '4lpa', 'NITIN29122023040712.pdf', '29-12-2023');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `message` text NOT NULL,
  `date` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `contact`, `email`, `subject`, `message`, `date`) VALUES
(4, 'pramod', '7024314731', 'test@gmail.com', 'pramod lodhi ', 'msssg....', '30-03-2024');

-- --------------------------------------------------------

--
-- Table structure for table `jobopenings`
--

CREATE TABLE `jobopenings` (
  `id` int(5) NOT NULL,
  `jobId` varchar(5) NOT NULL,
  `jobTitle` varchar(100) NOT NULL,
  `jobLocation` varchar(20) NOT NULL,
  `jobType` varchar(50) DEFAULT NULL,
  `salary` varchar(20) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `lastDate` varchar(30) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobopenings`
--

INSERT INTO `jobopenings` (`id`, `jobId`, `jobTitle`, `jobLocation`, `jobType`, `salary`, `status`, `lastDate`, `date`) VALUES
(3, 'J001', 'Software Developer', 'Bhopal', 'Permanenet', '2000 per month', 'Open', '2023-12-21', '18-12-2023'),
(4, 'J002', 'UI/Ux Developer', 'Bhopal', 'Permanenet', '2000 per month', 'Closed', '2023-12-31', '18-12-2023'),
(5, 'J003', '', '', '', '', 'Open', '', '30-03-2024');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(10) NOT NULL,
  `userName` varchar(50) DEFAULT NULL,
  `userRole` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `date` varchar(20) DEFAULT NULL,
  `loginStatus` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `userName`, `userRole`, `email`, `pass`, `date`, `loginStatus`) VALUES
(1, 'Chandan Kumar', 'Super admin', 'test@gmail.com', 'test', '30-03-2024 17:50:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `propertydetails`
--

CREATE TABLE `propertydetails` (
  `id` int(10) NOT NULL,
  `property_id` varchar(10) NOT NULL,
  `location` varchar(100) NOT NULL,
  `property_type` varchar(50) NOT NULL,
  `property_Status` varchar(30) NOT NULL,
  `area_in_meter` varchar(20) NOT NULL,
  `area_in_sqfeet` varchar(20) NOT NULL,
  `beds` int(5) NOT NULL DEFAULT 0,
  `baths` int(5) NOT NULL,
  `garage` int(5) NOT NULL DEFAULT 0,
  `property_descp` text NOT NULL,
  `property_amount` varchar(30) NOT NULL,
  `property_video` varchar(50) DEFAULT NULL,
  `property_map` text NOT NULL,
  `property_CoverImage` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `propertydetails`
--

INSERT INTO `propertydetails` (`id`, `property_id`, `location`, `property_type`, `property_Status`, `area_in_meter`, `area_in_sqfeet`, `beds`, `baths`, `garage`, `property_descp`, `property_amount`, `property_video`, `property_map`, `property_CoverImage`) VALUES
(6, '1101', 'test', 'rent', 'sale', '555', '555', 4, 5, 6, '', '234', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `property_amenities`
--

CREATE TABLE `property_amenities` (
  `id` int(5) NOT NULL,
  `property_id` varchar(15) NOT NULL,
  `amenities_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property_amenities`
--

INSERT INTO `property_amenities` (`id`, `property_id`, `amenities_name`) VALUES
(26, '1102', 'Internet'),
(27, '1102', 'Cable Tv'),
(28, '1102', 'Sun Room'),
(29, '1102', 'Outdoor Kitchen'),
(30, '1101', 'Concrete Flooring'),
(31, '1101', 'Internet'),
(32, '1101', 'Cable Tv'),
(33, '1101', 'Sun Room'),
(34, '1101', 'Tennis Courts'),
(35, '1101', 'Outdoor Kitchen'),
(36, '1101', 'Parking'),
(37, '1101', 'Deck'),
(38, '1101', 'Balcony'),
(39, '1101', 'Cable Tv'),
(40, '1101', 'Tennis Courts');

-- --------------------------------------------------------

--
-- Table structure for table `property_enq`
--

CREATE TABLE `property_enq` (
  `id` int(5) NOT NULL,
  `property_id` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(225) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property_galllery`
--

CREATE TABLE `property_galllery` (
  `id` int(10) NOT NULL,
  `property_id` varchar(15) NOT NULL,
  `property_img` varchar(100) NOT NULL,
  `date` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property_galllery`
--

INSERT INTO `property_galllery` (`id`, `property_id`, `property_img`, `date`) VALUES
(2, '1101', '1101_22122023042901.webp', '22-12-2023'),
(3, '1101', '1101_22122023042910.webp', '22-12-2023'),
(4, '1101', '1101_22122023043105.webp', '22-12-2023'),
(5, '1101', '1101_22122023043111.webp', '22-12-2023'),
(6, '1101', '1101_22122023043123.webp', '22-12-2023'),
(7, '1101', '1101_22122023062223.webp', '22-12-2023');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) NOT NULL,
  `sliderImg` varchar(225) DEFAULT NULL,
  `deleteSliderLink` varchar(225) DEFAULT NULL,
  `btnText` varchar(30) DEFAULT NULL,
  `btnLink` varchar(225) DEFAULT NULL,
  `sliderText` varchar(100) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `sliderImg`, `deleteSliderLink`, `btnText`, `btnLink`, `sliderText`, `date`) VALUES
(18, 'sliderImg30032024043329.jpg', '', 'sale', '', '', '30-03-2024'),
(19, 'sliderImg30032024043348.avif', '', 'rent', '', '', '30-03-2024');

-- --------------------------------------------------------

--
-- Table structure for table `termsconditions`
--

CREATE TABLE `termsconditions` (
  `id` int(3) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `termsconditions`
--

INSERT INTO `termsconditions` (`id`, `content`) VALUES
(1, '<ul>\r\n	<li>its a good butding materiat and book your house in this new new year.</li>\r\n	<li>my name is a pramod lodhi and i am a dveloper in this company.</li>\r\n</ul>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `profession` varchar(30) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `feedback` varchar(100) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `profession`, `img`, `feedback`, `date`) VALUES
(3, 'Chandan Kumar', 'Software Developer', 'Chandan_Kumar27122023050208.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis,\r\n                        cupiditate', '27-12-2023'),
(4, 'Avinash kumar', 'Software Developer', 'Avinash_kumar27122023050219.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis,\r\n                        cupiditate', '27-12-2023');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career`
--
ALTER TABLE `career`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobopenings`
--
ALTER TABLE `jobopenings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `propertydetails`
--
ALTER TABLE `propertydetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_amenities`
--
ALTER TABLE `property_amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_enq`
--
ALTER TABLE `property_enq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_galllery`
--
ALTER TABLE `property_galllery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `termsconditions`
--
ALTER TABLE `termsconditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `career`
--
ALTER TABLE `career`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobopenings`
--
ALTER TABLE `jobopenings`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `propertydetails`
--
ALTER TABLE `propertydetails`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `property_amenities`
--
ALTER TABLE `property_amenities`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `property_enq`
--
ALTER TABLE `property_enq`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `property_galllery`
--
ALTER TABLE `property_galllery`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `termsconditions`
--
ALTER TABLE `termsconditions`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
