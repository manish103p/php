-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2020 at 05:31 PM
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
-- Database: `book_turf`
--

-- --------------------------------------------------------

--
-- Table structure for table `trip`
--

CREATE TABLE `trip` (
  `tripId` int(11) NOT NULL,
  `trip_name` varchar(255) NOT NULL,
  `height` float NOT NULL,
  `days` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `description` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trip`
--

INSERT INTO `trip` (`tripId`, `trip_name`, `height`, `days`, `price`, `description`) VALUES
(1, 'Kalsubai', 5400, '6 days', 1500, 'Also known as Mount Everest of Maharashtra !Kalsubai Peak Trek with a height of 1646 meters or 5400 Feet is famous as the highest peaks in Maharashtra. Kalsubai Mountain lies in the Sahyadri mountain range falling under Kalsubai Harishchandragad Wildlife '),
(2, 'Peb Fort', 1624, '6 Days', 800, 'Hilltop fort structure reachable by a popular monsoon trek through lush greenery & waterfalls.Trekking near Mumbai to Peb Fort or Vikatgad around 4 km from Neral Station a very enjoyable trek in Monsoon season passing through a local village, waterfalls this trek offers all ladders, rock patches, caves, dense forest, ridge walking. Trek can be combined with Matheran visit or you can trek till Panorama point Matheran till here. Excellent for new trekkers a village guide or guided tour will make the trek more enjoyable.'),
(3, 'Irshalgad', 1242, '4 days', 800, 'Irshalgad derived its name from Irshal that means the top and \'gad\' means the fort. This fort served as a watchtower in previous times due to its pinnacle. It was easy to keep a check over enemy movements around the fort. This trek to Irshalgad fort will test your endurance all through the trek putting forth various inclines and flat trails.'),
(4, 'Visapur', 1780, '7 days', 2000, 'Maharashtra is home to a number of spectacular monsoon destinations. While some of these are great places for family vacations and treat you to beautiful views without you having to make any effort, there are some which are ideal for trekkers who like to earn their views. Trekking is not just great for fitness, it is also one of the most refreshing activities one can indulge in. Be it a solo trek or one with a group, trekking is a rewarding experience. As you make the climb to reach your destination, every nook and corner of the hills presents you with a unique challenge, adventure, view and unspoiled piece of nature. Maharashtra has some excellent trekking destinations for all kinds of trekkers. One such destination which is perfect for beginners is the Visapur fort'),
(5, 'Dhak Bahiri', 1950, '9 days', 6000, 'The earth has music for those who listen and this time the melodious symphony of mother Earth took me to one of the cave trek in the Sahyadri hill range. A trek that is definitely not for the fainthearted person. A trek where one needs an assistance of a rope to make it through. A trek where one mistake and you’re dead. Any guesses? Yes, I am talking about the “Dhak Bahiri Cave Trek”. Located on the Dhak peak in the Jambhavali region, to reach the Dhak Bahiri cave, one needs to ascend a col, walk along a scarp and finally a vertical ascent of almost 70-degree gradient. A small mistake and you will find yourself somewhere deep in the valleys of Sahayadri’s. Despite being so risky, the trek is quite popular among the Mumbaikar’s and the Punker’s who are looking to experience something extraordinary.');

-- --------------------------------------------------------

--
-- Table structure for table `trip_user`
--

CREATE TABLE `trip_user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `trip_id` int(11) DEFAULT NULL,
  `booking_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trip_user`
--

INSERT INTO `trip_user` (`id`, `email`, `trip_id`, `booking_time`) VALUES
(31, 'abc@gmail.com', 2, '2020-11-23 18:34:23'),
(36, 'abc@gmail.com', 3, '2020-11-23 19:59:16'),
(37, 'abc@gmail.com', 1, '2020-11-23 20:10:02'),
(38, 'yash@gmail.com', 2, '2020-11-23 20:11:30'),
(39, 'yash@gmail.com', 3, '2020-11-24 22:54:10'),
(40, 'abc@gmail.com', 5, '2020-11-25 22:42:59'),
(0, 'admin@xyz.com', 2, '2020-11-26 23:02:21'),
(0, 'manish@gmail.com', 1, '2020-11-27 00:44:03'),
(0, 'manish@gmail.com', 1, '2020-11-27 00:44:17'),
(0, 'manish@gmail.com', 1, '2020-11-27 00:44:27'),
(0, 'manish@gmail.com', 123, '2020-11-27 00:46:58');

-- --------------------------------------------------------

--
-- Table structure for table `turf`
--

CREATE TABLE `turf` (
  `id` int(11) NOT NULL,
  `turf_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `turf_address` varchar(255) NOT NULL,
  `timeslot_start` datetime NOT NULL,
  `timeslot_end` datetime NOT NULL,
  `price` varchar(255) NOT NULL,
  `refreshments` varchar(255) NOT NULL,
  `changingRoom` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `seating` varchar(255) NOT NULL,
  `booked` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `turf`
--

INSERT INTO `turf` (`id`, `turf_name`, `email`, `contact_number`, `turf_address`, `timeslot_start`, `timeslot_end`, `price`, `refreshments`, `changingRoom`, `size`, `seating`, `booked`) VALUES
(124, 'NMSA', 'pariharmanish10@gmail.com', '9029043112', 'B-1, F-12, LOKMANYA TILAK MARKET, SECTOR-1, VASHI', '2020-11-26 23:43:00', '2020-11-30 23:43:00', '9000', '1', '1', '8000', '1', 1),
(126, 'vashi', 'vashi@vashi.com', '0987654321', 'B-1, F-12, LOKMANYA TILAK MARKET, SECTOR-1, VASHI', '2020-11-27 02:51:00', '2020-11-28 02:51:00', '1300', '1', '1', '8000', '1', 0),
(128, 'mulund', 'mulund@mulund.com', '0123456789', 'thanee se right where you reach thane', '2020-12-09 02:52:00', '2020-12-12 02:52:00', '6000', '1', '1', '5000', '1', 1),
(129, 'Tilak', 'tilak@tilak.com', '0987654321', 'B-1, F-12, LOKMANYA TILAK MARKET, SECTOR-1, VASHI', '2020-11-10 20:57:00', '2020-11-27 20:57:00', '7000', '1', '1', '7000', '1', 1),
(130, 'mumbai', 'mumbai@m.com', '0123456789', 'thanee se right where you reach thane', '2020-11-24 21:46:00', '2020-11-30 21:46:00', '9000', '1', '1', '7000', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `turf_user`
--

CREATE TABLE `turf_user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `turf_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `turf_user`
--

INSERT INTO `turf_user` (`id`, `email`, `turf_id`) VALUES
(15, 'manish@gmail.com', 123),
(16, 'manish@gmail.com', 123),
(17, 'manish@gmail.com', 124),
(18, 'manish@gmail.com', 124),
(19, 'manish@gmail.com', 123),
(20, 'manish@gmail.com', 124),
(21, 'manish@gmail.com', 128),
(22, 'manish@gmail.com', 129),
(23, 'manish@gmail.com', 130),
(24, 'manish@gmail.com', 128);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `confirm_password` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`full_name`, `email`, `user_password`, `confirm_password`, `age`, `contact_number`, `gender`) VALUES
('MANISH INDRAJEET PARIHAR', 'manish.parihar@somaiya.edu', 'c4856cf1461643aff4074c95d6b2905a', 'c4856cf1461643aff4074c95d6b2905a', 19, '9029043112', 'Male'),
('MANISH INDRAJEET PARIHAR', 'manish@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 'fcea920f7412b5da7be0cf42b8c93759', 89, '9029043112', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `turf`
--
ALTER TABLE `turf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `turf_user`
--
ALTER TABLE `turf_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `turf`
--
ALTER TABLE `turf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `turf_user`
--
ALTER TABLE `turf_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
