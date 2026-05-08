-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220501.46b7525c53
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2022 at 12:24 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itsm`
--

-- --------------------------------------------------------

--
-- Table structure for table `compliants`
--

CREATE TABLE `compliants` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `subject` varchar(30) DEFAULT NULL,
  `message` varchar(160) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `compliants`
--

INSERT INTO `compliants` (`id`, `name`, `email`, `subject`, `message`, `date`) VALUES
(1, 'Tech Masters company', 'husssam@tech.com', 'delay on service', 'there was a delay that affected the work', '2022-04-03 02:00:00'),
(2, 'Gulf Company', 'samer@gulf.net', 'job isn\'t completed', 'We didn\'t receive the final report and the job not accomplished ', '2022-06-01 23:15:35');

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `id` int(6) UNSIGNED NOT NULL,
  `t_id` int(6) DEFAULT NULL,
  `company` varchar(30) DEFAULT NULL,
  `service` varchar(30) NOT NULL,
  `star` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`id`, `t_id`, `company`, `service`, `star`) VALUES
(2, 17, 'Computer Center', 'technical support', 5),
(5, 11, 'f.black066@gmail.com', 'network security', 2),
(6, 10, 'fashion company', 'web development', 5);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(6) UNSIGNED NOT NULL,
  `t_id` int(6) DEFAULT NULL,
  `details` varchar(160) DEFAULT NULL,
  `file` varchar(160) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `t_id`, `details`, `file`) VALUES
(3, 8, 'Report of Cloud Service', '//localhost/itsm/sys/upload/banner-construction-1.jpg'),
(4, 18, 'Report of mointroing test ', '//localhost/itsm/sys/upload/Context Diagram V2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(6) UNSIGNED NOT NULL,
  `t_id` int(6) DEFAULT NULL,
  `u_id` int(6) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `service` varchar(30) DEFAULT NULL,
  `info` varchar(160) DEFAULT NULL,
  `t_st` int(2) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `t_id`, `u_id`, `email`, `phone`, `service`, `info`, `t_st`) VALUES
(5, 8, 4, 'f.black066@gmail.com ', '0797287267 ', 'monitoring systems ', 'Hi Bashar ', 2),
(6, 9, 7, 'f.black066@gmail.com ', '0797287267 ', 'network services ', ' ', 0),
(11, 8, 9, 'f.black066@gmail.com ', '0797287267 ', 'monitoring systems ', 'Hi Bashar ', 2),
(13, 13, 4, 'wajdi@outlook.com ', '+962 5465897987 ', 'cloud services ', 'Irbid ', 1),
(15, 18, 11, 'wise@gmail.com ', '+962 796362565 ', 'web development ', ' Amman	 ', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `company` varchar(50) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `service` varchar(30) DEFAULT NULL,
  `location` varchar(30) DEFAULT NULL,
  `info` varchar(160) DEFAULT NULL,
  `t_status` int(1) DEFAULT NULL,
  `ticket_code` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `name`, `company`, `email`, `phone`, `service`, `location`, `info`, `t_status`, `ticket_code`) VALUES
(8, 'Hazem', 'test it', 'f.black066@gmail.com', '0797287267', 'monitoring systems', NULL, 'version number is 1564', 2, '342MEFEIF'),
(10, 'al mahseri', 'fashion company', 'Test@Gmail.Com', '+962 4568879', 'web development', NULL, 'i want to ......', 0, '888MENEIB'),
(11, 'Adham', 'f.black066@gmail.com', 'f.black066@gmail.com', '0797287267', 'network security', NULL, 'asdassssss', 0, '869MENEIB'),
(13, 'Wajdi ramadan', 'Wajdi Ramadan for contracting', 'wajdi@outlook.com', '+962 5465897987', 'cloud services', 'Irbid', 'Congress leader Rahul Gandhi\'s visit Nepal has become a topic of discussion on social media. While the BJP slammed the visit, Congress is defending it. Sources ', 1, '569HENEIB'),
(15, 'Osama', 'Al Manaser', 'manser@hotmail.com', '+962 79832156', 'Jarash', NULL, 'The Grand Finale of Kangana Ranaut\'s show Lock Upp took place yesterday. It was Munawar Faruqui who won the show. Payal Rohatgi turned out to be the runner-up w', 0, '404MCNEIB'),
(16, 'Huda', 'Industrail company', 'Indu_co@gmail.com', '+962 567987632', ' Amman	', NULL, 'ssadasdasdasdasas', 2, '479BAOKLI'),
(17, 'Hamed Ayham', 'Computer Center', 'center2346@hotmail.com', '+962 794687999', 'technical support', 'Aqaba', 'sadsaadfdsfvcx', 0, '113DMBFGA'),
(18, 'shimaa', 'Mercedes Company', 'shim@mercedes.com', '+962 796362565', 'web development', ' Amman	', 'test ', 2, '241EIPMJN'),
(19, 'Test11', 'test11', 'test11@gmascas.com', '+962 46548947898', 'web development', ' Amman	', 'teeeeeeeeeeeeeeeeeeest', 0, '476JAKGLI');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(4) UNSIGNED NOT NULL,
  `u_role` int(2) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `u_role`, `username`, `email`, `user_password`) VALUES
(1, 70, 'admin', 'admin@gmail.com', 'admin'),
(2, 80, 'Hamza Damra', 'hamza@gmail.com', '123'),
(3, 80, 'Bashar Al Haj', 'bashar@gmail.com', '123'),
(4, 90, 'lotfi', 'lotfi@yahoo.com', '123'),
(5, 90, 'Bashar', 'Bashar@yahoo.com', '321'),
(6, 90, 'Hamed', 'hamed@yahoo.com', '321'),
(7, 90, 'Tamer', 'tamer@yahoo.com', '321'),
(11, 90, 'Ahmad Samer', 'ahmad_samer@yahoo.com', 'ahmad18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `compliants`
--
ALTER TABLE `compliants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `t_id` (`t_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ticket_code` (`ticket_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `compliants`
--
ALTER TABLE `compliants`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



