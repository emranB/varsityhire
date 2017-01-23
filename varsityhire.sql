-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2016 at 08:25 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `varsityhire`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `ID` varchar(10) NOT NULL,
  `UserType` varchar(50) NOT NULL,
  `Fname` varchar(100) NOT NULL,
  `Lname` varchar(100) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `PostalCode` varchar(7) NOT NULL,
  `RegistrationTime` datetime NOT NULL,
  `stripe_user_id` text NOT NULL,
  `account_status` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clients_additional_info`
--

CREATE TABLE `clients_additional_info` (
  `ID` varchar(10) NOT NULL,
  `Phone` text NOT NULL,
  `AdditionalComments` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clients_skills`
--

CREATE TABLE `clients_skills` (
  `ID` int(11) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Dog_Walking` int(11) NOT NULL,
  `Exterior_Window_Washing` int(11) NOT NULL,
  `Delivery` int(11) NOT NULL,
  `Garage_Shop_Shed_Cleaning` int(11) NOT NULL,
  `Gutter_Cleaning` int(11) NOT NULL,
  `House_Cleaning` int(11) NOT NULL,
  `International_Languages` int(11) NOT NULL,
  `Landscaping` int(11) NOT NULL,
  `Moving` int(11) NOT NULL,
  `Music_Lessons` int(11) NOT NULL,
  `Seasonal_Decoration` int(11) NOT NULL,
  `Painting` int(11) NOT NULL,
  `Pressure_Washing` int(11) NOT NULL,
  `Private_Event_Assistance` int(11) NOT NULL,
  `RV_Boat_Cleaning` int(11) NOT NULL,
  `Snow_Removal` int(11) NOT NULL,
  `Tutoring` int(11) NOT NULL,
  `Vehicle_Care` int(11) NOT NULL,
  `Yard_Care` int(11) NOT NULL,
  `Other` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `Job_ID` varchar(20) NOT NULL,
  `Client_ID` varchar(20) NOT NULL,
  `Date` text NOT NULL,
  `A1` varchar(20) NOT NULL,
  `A2` text NOT NULL,
  `A3` text NOT NULL,
  `A4` varchar(20) NOT NULL,
  `A5` varchar(20) NOT NULL,
  `A6` varchar(20) NOT NULL,
  `A7` text NOT NULL,
  `A8` varchar(20) NOT NULL,
  `A9` text NOT NULL,
  `A10` text NOT NULL,
  `A11` varchar(20) NOT NULL,
  `Address` text NOT NULL,
  `PostalCode` text NOT NULL,
  `Time` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dog_walking`
--

CREATE TABLE `dog_walking` (
  `Job_ID` varchar(20) NOT NULL,
  `Client_ID` varchar(20) NOT NULL,
  `Date` text NOT NULL,
  `A2` text NOT NULL,
  `A3` text NOT NULL,
  `A4` text NOT NULL,
  `A5` text NOT NULL,
  `A6` text NOT NULL,
  `A7` text NOT NULL,
  `A8` text NOT NULL,
  `A9` text NOT NULL,
  `Address` text NOT NULL,
  `PostalCode` text NOT NULL,
  `Time` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exterior_window_washing`
--

CREATE TABLE `exterior_window_washing` (
  `Job_ID` varchar(20) NOT NULL,
  `Client_ID` varchar(20) NOT NULL,
  `Date` text NOT NULL,
  `A1` text NOT NULL,
  `A2` text NOT NULL,
  `A3` text NOT NULL,
  `A4` text NOT NULL,
  `A5` text NOT NULL,
  `A6` text NOT NULL,
  `A7` text NOT NULL,
  `A8` text NOT NULL,
  `Address` text NOT NULL,
  `PostalCode` text NOT NULL,
  `Time` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `garage_shop_shed_cleaning`
--

CREATE TABLE `garage_shop_shed_cleaning` (
  `Job_ID` varchar(20) NOT NULL,
  `Client_ID` varchar(20) NOT NULL,
  `Date` text NOT NULL,
  `A1` text NOT NULL,
  `A2` text NOT NULL,
  `A3` text NOT NULL,
  `A4` text NOT NULL,
  `A5` text NOT NULL,
  `A6` text NOT NULL,
  `A7` text NOT NULL,
  `A8` text NOT NULL,
  `A9` text NOT NULL,
  `A10` text NOT NULL,
  `Address` text NOT NULL,
  `PostalCode` text NOT NULL,
  `Time` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gutter_cleaning`
--

CREATE TABLE `gutter_cleaning` (
  `Job_ID` varchar(20) NOT NULL,
  `Client_ID` varchar(20) NOT NULL,
  `Date` text NOT NULL,
  `A1` varchar(20) NOT NULL,
  `A2` varchar(20) NOT NULL,
  `A3` varchar(20) NOT NULL,
  `A4` varchar(20) NOT NULL,
  `A5` text NOT NULL,
  `A6` varchar(20) NOT NULL,
  `A7` text NOT NULL,
  `A8` varchar(20) NOT NULL,
  `A9` text NOT NULL,
  `Address` text NOT NULL,
  `PostalCode` text NOT NULL,
  `Time` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `house_cleaning`
--

CREATE TABLE `house_cleaning` (
  `Job_ID` varchar(20) NOT NULL,
  `Client_ID` varchar(20) NOT NULL,
  `Date` text NOT NULL,
  `A1` text NOT NULL,
  `A2` text NOT NULL,
  `A3` text NOT NULL,
  `A4` text NOT NULL,
  `A5` text NOT NULL,
  `A6` text NOT NULL,
  `A7` text NOT NULL,
  `A8` text NOT NULL,
  `A9` text NOT NULL,
  `A10` text NOT NULL,
  `A11` text NOT NULL,
  `A12` text NOT NULL,
  `A13` text NOT NULL,
  `A14` text NOT NULL,
  `A15` text NOT NULL,
  `A16` text NOT NULL,
  `A17` text NOT NULL,
  `A18` text NOT NULL,
  `A19` text NOT NULL,
  `Address` text NOT NULL,
  `PostalCode` text NOT NULL,
  `Time` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `international_languages`
--

CREATE TABLE `international_languages` (
  `Job_ID` varchar(20) NOT NULL,
  `Client_ID` varchar(20) NOT NULL,
  `Date` text NOT NULL,
  `A1` text NOT NULL,
  `A2` text NOT NULL,
  `A3` text NOT NULL,
  `A4` text NOT NULL,
  `A5` text NOT NULL,
  `A6` text NOT NULL,
  `A7` text NOT NULL,
  `A8` text NOT NULL,
  `A9` text NOT NULL,
  `Address` text NOT NULL,
  `PostalCode` text NOT NULL,
  `Time` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobs_bids`
--

CREATE TABLE `jobs_bids` (
  `job_Index` int(20) NOT NULL,
  `job_ID` varchar(20) NOT NULL,
  `job_Status` varchar(50) NOT NULL,
  `job_Bids_Count` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobs_bids_details`
--

CREATE TABLE `jobs_bids_details` (
  `bid_ID` varchar(20) NOT NULL,
  `job_ID` varchar(20) NOT NULL,
  `bid_Student_ID` varchar(20) NOT NULL,
  `bid_Amount` int(11) NOT NULL,
  `bid_Comments` text NOT NULL,
  `bid_Status` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobs_posts`
--

CREATE TABLE `jobs_posts` (
  `job_ID` varchar(20) NOT NULL,
  `client_ID` varchar(10) NOT NULL,
  `client_Email` text NOT NULL,
  `job_Category` text NOT NULL,
  `job_Title` varchar(150) NOT NULL,
  `job_Status` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `landscaping`
--

CREATE TABLE `landscaping` (
  `Job_ID` varchar(20) NOT NULL,
  `Client_ID` varchar(20) NOT NULL,
  `Date` text NOT NULL,
  `A1` text NOT NULL,
  `A2` text NOT NULL,
  `A3` text NOT NULL,
  `A4` text NOT NULL,
  `A5` text NOT NULL,
  `A6` text NOT NULL,
  `A7` text NOT NULL,
  `A8` text NOT NULL,
  `A9` text NOT NULL,
  `A10` text NOT NULL,
  `Address` text NOT NULL,
  `PostalCode` text NOT NULL,
  `Time` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `moving`
--

CREATE TABLE `moving` (
  `Job_ID` varchar(20) NOT NULL,
  `Client_ID` varchar(20) NOT NULL,
  `Date` text NOT NULL,
  `A1` varchar(20) NOT NULL,
  `A2` varchar(20) NOT NULL,
  `A3` varchar(20) NOT NULL,
  `A4` text NOT NULL,
  `A5` varchar(20) NOT NULL,
  `A6` text NOT NULL,
  `A7` varchar(20) NOT NULL,
  `A8` text NOT NULL,
  `Address` text NOT NULL,
  `PostalCode` text NOT NULL,
  `Time` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `music_lessons`
--

CREATE TABLE `music_lessons` (
  `Job_ID` varchar(20) NOT NULL,
  `Client_ID` varchar(20) NOT NULL,
  `Date` text NOT NULL,
  `A1` text NOT NULL,
  `A2` text NOT NULL,
  `A3` text NOT NULL,
  `A4` text NOT NULL,
  `A5` text NOT NULL,
  `A6` text NOT NULL,
  `Address` text NOT NULL,
  `PostalCode` text NOT NULL,
  `Time` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `other`
--

CREATE TABLE `other` (
  `Job_ID` varchar(20) NOT NULL,
  `Client_ID` varchar(20) NOT NULL,
  `Job_category_temporary` text NOT NULL,
  `A1` text NOT NULL,
  `A2` text NOT NULL,
  `A3` text NOT NULL,
  `A4` text NOT NULL,
  `Date` text NOT NULL,
  `Frequency_Of_Recurring_Dates` text NOT NULL,
  `Time` text NOT NULL,
  `A7` text NOT NULL,
  `Address` text NOT NULL,
  `PostalCode` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `outdoor_seasonal_decorations`
--

CREATE TABLE `outdoor_seasonal_decorations` (
  `Job_ID` varchar(20) NOT NULL,
  `Client_ID` varchar(20) NOT NULL,
  `Date` text NOT NULL,
  `A1` text NOT NULL,
  `A2` varchar(20) NOT NULL,
  `A3` varchar(20) NOT NULL,
  `A4` varchar(20) NOT NULL,
  `A5` varchar(20) NOT NULL,
  `A6` varchar(20) NOT NULL,
  `A7` text NOT NULL,
  `A8` varchar(20) NOT NULL,
  `A9` text NOT NULL,
  `A10` varchar(20) NOT NULL,
  `A11` text NOT NULL,
  `Address` text NOT NULL,
  `PostalCode` text NOT NULL,
  `Time` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `painting`
--

CREATE TABLE `painting` (
  `Job_ID` varchar(20) NOT NULL,
  `Client_ID` varchar(20) NOT NULL,
  `Date` text NOT NULL,
  `A1` text NOT NULL,
  `A2` text NOT NULL,
  `A3` text NOT NULL,
  `A4` text NOT NULL,
  `A5` text NOT NULL,
  `A6` text NOT NULL,
  `A7` text NOT NULL,
  `A8` text NOT NULL,
  `A9` text NOT NULL,
  `A10` text NOT NULL,
  `A11` text NOT NULL,
  `A12` text NOT NULL,
  `A13` text NOT NULL,
  `A14` text NOT NULL,
  `Address` text NOT NULL,
  `PostalCode` text NOT NULL,
  `Time` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pressure_washing`
--

CREATE TABLE `pressure_washing` (
  `Job_ID` varchar(20) NOT NULL,
  `Client_ID` varchar(20) NOT NULL,
  `Date` text NOT NULL,
  `A1` text NOT NULL,
  `A2` varchar(20) NOT NULL,
  `A3` varchar(20) NOT NULL,
  `A4` varchar(20) NOT NULL,
  `A5` varchar(20) NOT NULL,
  `A6` varchar(20) NOT NULL,
  `A7` varchar(20) NOT NULL,
  `A8` varchar(20) NOT NULL,
  `A9` varchar(20) NOT NULL,
  `A10` varchar(20) NOT NULL,
  `A11` text NOT NULL,
  `A12` varchar(20) NOT NULL,
  `A13` varchar(20) NOT NULL,
  `A14` text NOT NULL,
  `A15` varchar(20) NOT NULL,
  `A16` text NOT NULL,
  `A17` varchar(20) NOT NULL,
  `A18` text NOT NULL,
  `Address` text NOT NULL,
  `PostalCode` text NOT NULL,
  `Time` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `private_event_assistance`
--

CREATE TABLE `private_event_assistance` (
  `Job_ID` varchar(20) NOT NULL,
  `Client_ID` varchar(20) NOT NULL,
  `Date` text NOT NULL,
  `A1` text NOT NULL,
  `A2` varchar(20) NOT NULL,
  `A3` varchar(20) NOT NULL,
  `A4` varchar(20) NOT NULL,
  `A5` text NOT NULL,
  `A6` text NOT NULL,
  `A7` varchar(20) NOT NULL,
  `A8` text NOT NULL,
  `A9` varchar(20) NOT NULL,
  `A10` text NOT NULL,
  `Address` text NOT NULL,
  `PostalCode` text NOT NULL,
  `Time` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rv_boat_cleaning`
--

CREATE TABLE `rv_boat_cleaning` (
  `Job_ID` varchar(20) NOT NULL,
  `Client_ID` varchar(20) NOT NULL,
  `Date` text NOT NULL,
  `A1` text NOT NULL,
  `A2` varchar(20) NOT NULL,
  `A3` varchar(20) NOT NULL,
  `A4` text NOT NULL,
  `A5` varchar(20) NOT NULL,
  `A6` varchar(20) NOT NULL,
  `A7` text NOT NULL,
  `A8` varchar(20) NOT NULL,
  `A9` varchar(20) NOT NULL,
  `A10` varchar(20) NOT NULL,
  `A11` varchar(20) NOT NULL,
  `A12` text NOT NULL,
  `A13` varchar(20) NOT NULL,
  `A14` text NOT NULL,
  `A15` varchar(20) NOT NULL,
  `A16` text NOT NULL,
  `Address` text NOT NULL,
  `PostalCode` text NOT NULL,
  `Time` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `snow_removal`
--

CREATE TABLE `snow_removal` (
  `Job_ID` varchar(20) NOT NULL,
  `Client_ID` varchar(20) NOT NULL,
  `Date` text NOT NULL,
  `A1` text NOT NULL,
  `A2` text NOT NULL,
  `A3` text NOT NULL,
  `A4` text NOT NULL,
  `A5` text NOT NULL,
  `A6` text NOT NULL,
  `A7` text NOT NULL,
  `A8` text NOT NULL,
  `A9` text NOT NULL,
  `A10` text NOT NULL,
  `A11` text NOT NULL,
  `A12` text NOT NULL,
  `A13` text NOT NULL,
  `A14` text NOT NULL,
  `A15` text NOT NULL,
  `A16` text NOT NULL,
  `A17` text NOT NULL,
  `A18` text NOT NULL,
  `A19` text NOT NULL,
  `A20` text NOT NULL,
  `A21` text NOT NULL,
  `Address` text NOT NULL,
  `PostalCode` text NOT NULL,
  `Time` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `ID` varchar(20) NOT NULL,
  `UserType` varchar(50) NOT NULL,
  `Fname` varchar(50) NOT NULL,
  `Lname` varchar(50) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `PostalCode` varchar(100) NOT NULL,
  `RegistrationTime` datetime NOT NULL,
  `stripe_user_id` text NOT NULL,
  `account_status` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students_additional_info`
--

CREATE TABLE `students_additional_info` (
  `ID` varchar(20) NOT NULL,
  `Dob` date NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `School` varchar(100) NOT NULL,
  `Program` varchar(200) NOT NULL,
  `YearGrade` varchar(50) NOT NULL,
  `AdditionalComments` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students_reviews`
--

CREATE TABLE `students_reviews` (
  `index` int(11) NOT NULL,
  `client_ID` varchar(20) NOT NULL,
  `job_ID` varchar(20) NOT NULL,
  `student_ID` varchar(20) NOT NULL,
  `showed_up` varchar(5) NOT NULL,
  `timing` int(3) NOT NULL,
  `cleanliness` int(3) NOT NULL,
  `quality_of_work` int(3) NOT NULL,
  `knowledge_of_activity` int(3) NOT NULL,
  `average` int(5) NOT NULL,
  `additional_comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students_skills`
--

CREATE TABLE `students_skills` (
  `ID` varchar(20) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Dog_Walking` int(1) NOT NULL,
  `Exterior_Window_Washing` int(1) NOT NULL,
  `Delivery` int(1) NOT NULL,
  `Garage_Shop_Shed_Cleaning` int(1) NOT NULL,
  `Gutter_Cleaning` int(1) NOT NULL,
  `House_Cleaning` int(1) NOT NULL,
  `International_Languages` int(1) NOT NULL,
  `Landscaping` int(1) NOT NULL,
  `Moving` int(1) NOT NULL,
  `Music_Lessons` int(1) NOT NULL,
  `Seasonal_Decoration` int(1) NOT NULL,
  `Painting` int(1) NOT NULL,
  `Pressure_Washing` int(1) NOT NULL,
  `Private_Event_Assistance` int(1) NOT NULL,
  `RV_Boat_Cleaning` int(11) NOT NULL,
  `Snow_Removal` int(11) NOT NULL,
  `Tutoring` int(11) NOT NULL,
  `Vehicle_Care` int(11) NOT NULL,
  `Yard_Care` int(11) NOT NULL,
  `Other` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_id_card`
--

CREATE TABLE `student_id_card` (
  `ID` varchar(20) NOT NULL,
  `Photo_Name` longblob NOT NULL,
  `student_ID_card_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tutoring`
--

CREATE TABLE `tutoring` (
  `Job_ID` varchar(20) NOT NULL,
  `Client_ID` varchar(20) NOT NULL,
  `Date` text NOT NULL,
  `A1` varchar(20) NOT NULL,
  `A2` varchar(20) NOT NULL,
  `A3` varchar(20) NOT NULL,
  `A4` varchar(20) NOT NULL,
  `A5` text NOT NULL,
  `A6` varchar(20) NOT NULL,
  `A7` text NOT NULL,
  `A8` varchar(20) NOT NULL,
  `A9` text NOT NULL,
  `Address` text NOT NULL,
  `PostalCode` text NOT NULL,
  `Time` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_photos`
--

CREATE TABLE `user_photos` (
  `UserType` varchar(20) NOT NULL,
  `ID` varchar(20) NOT NULL,
  `Photo_Name` longblob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_care`
--

CREATE TABLE `vehicle_care` (
  `Job_ID` varchar(20) NOT NULL,
  `Client_ID` varchar(20) NOT NULL,
  `Date` text NOT NULL,
  `A1` text NOT NULL,
  `A2` text NOT NULL,
  `A3` text NOT NULL,
  `A4` text NOT NULL,
  `A5` text NOT NULL,
  `A6` text NOT NULL,
  `A7` text NOT NULL,
  `A8` text NOT NULL,
  `A9` text NOT NULL,
  `Address` text NOT NULL,
  `PostalCode` text NOT NULL,
  `Time` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `yard_care`
--

CREATE TABLE `yard_care` (
  `Job_ID` int(11) NOT NULL,
  `Client_ID` varchar(20) NOT NULL,
  `A1` text NOT NULL,
  `A2` text NOT NULL,
  `A3` text NOT NULL,
  `A4` text NOT NULL,
  `A5` text NOT NULL,
  `A6` int(11) NOT NULL,
  `A7` int(11) NOT NULL,
  `A8` int(11) NOT NULL,
  `A9` int(11) NOT NULL,
  `A10` int(11) NOT NULL,
  `A11` int(11) NOT NULL,
  `A12` int(11) NOT NULL,
  `A13` int(11) NOT NULL,
  `A14` int(11) NOT NULL,
  `A15` int(11) NOT NULL,
  `A16` int(11) NOT NULL,
  `A17` int(11) NOT NULL,
  `A18` int(11) NOT NULL,
  `A19` int(11) NOT NULL,
  `A20` int(11) NOT NULL,
  `A21` int(11) NOT NULL,
  `A22` int(11) NOT NULL,
  `A23` int(11) NOT NULL,
  `A24` int(11) NOT NULL,
  `A25` int(11) NOT NULL,
  `A26` int(11) NOT NULL,
  `A27` int(11) NOT NULL,
  `A28` int(11) NOT NULL,
  `A29` int(11) NOT NULL,
  `A30` int(11) NOT NULL,
  `A31` int(11) NOT NULL,
  `A32` int(11) NOT NULL,
  `A33` int(11) NOT NULL,
  `A34` int(11) NOT NULL,
  `A35` int(11) NOT NULL,
  `A36` int(11) NOT NULL,
  `A37` int(11) NOT NULL,
  `A38` int(11) NOT NULL,
  `A39` int(11) NOT NULL,
  `A40` int(11) NOT NULL,
  `A41` int(11) NOT NULL,
  `A42` int(11) NOT NULL,
  `A43` int(11) NOT NULL,
  `A44` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `clients_additional_info`
--
ALTER TABLE `clients_additional_info`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `clients_skills`
--
ALTER TABLE `clients_skills`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`Job_ID`);

--
-- Indexes for table `dog_walking`
--
ALTER TABLE `dog_walking`
  ADD PRIMARY KEY (`Job_ID`);

--
-- Indexes for table `gutter_cleaning`
--
ALTER TABLE `gutter_cleaning`
  ADD PRIMARY KEY (`Job_ID`);

--
-- Indexes for table `jobs_bids`
--
ALTER TABLE `jobs_bids`
  ADD PRIMARY KEY (`job_Index`);

--
-- Indexes for table `jobs_bids_details`
--
ALTER TABLE `jobs_bids_details`
  ADD UNIQUE KEY `bid_ID` (`bid_ID`);

--
-- Indexes for table `jobs_posts`
--
ALTER TABLE `jobs_posts`
  ADD PRIMARY KEY (`job_ID`),
  ADD UNIQUE KEY `job_Title` (`job_Title`);

--
-- Indexes for table `other`
--
ALTER TABLE `other`
  ADD PRIMARY KEY (`Job_ID`);

--
-- Indexes for table `painting`
--
ALTER TABLE `painting`
  ADD PRIMARY KEY (`Job_ID`);

--
-- Indexes for table `rv_boat_cleaning`
--
ALTER TABLE `rv_boat_cleaning`
  ADD PRIMARY KEY (`Job_ID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`ID`,`Email`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `PostalCode` (`PostalCode`);

--
-- Indexes for table `students_additional_info`
--
ALTER TABLE `students_additional_info`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `students_reviews`
--
ALTER TABLE `students_reviews`
  ADD PRIMARY KEY (`index`);

--
-- Indexes for table `students_skills`
--
ALTER TABLE `students_skills`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `student_id_card`
--
ALTER TABLE `student_id_card`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tutoring`
--
ALTER TABLE `tutoring`
  ADD PRIMARY KEY (`Job_ID`);

--
-- Indexes for table `user_photos`
--
ALTER TABLE `user_photos`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients_skills`
--
ALTER TABLE `clients_skills`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jobs_bids`
--
ALTER TABLE `jobs_bids`
  MODIFY `job_Index` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `students_reviews`
--
ALTER TABLE `students_reviews`
  MODIFY `index` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
