-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2021 at 06:19 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kyb`
--

-- --------------------------------------------------------

--
-- Table structure for table `like_songs`
--

CREATE TABLE `like_songs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `like_songs`
--

INSERT INTO `like_songs` (`id`, `user_id`, `song_id`) VALUES
(20, 19, 2),
(22, 19, 3),
(26, 19, 4),
(27, 19, 1),
(29, 19, 6),
(30, 3, 3),
(37, 3, 2),
(38, 3, 5),
(42, 3, 1),
(46, 5, 5),
(47, 5, 4),
(59, 19, 5),
(61, 1, 6),
(62, 18, 6),
(63, 42, 6),
(64, 43, 6),
(65, 43, 7);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `image_id`) VALUES
(1, 'admin@Kyb', 'admin123', 9),
(2, 'Arijit Singh', 'arijit@123', 10),
(3, 'Darshan Raval', 'darshan@123', 8),
(5, 'Guru Randhva', 'guru@123', 11),
(8, 'Badshah', '123', 12),
(11, 'Tulsi Kumar', 'tulsi@123', 13),
(13, 'Ed Sheeram', 'ed@123', 14),
(14, 'Alan Walker', 'alan@123', 15),
(16, 'Justin Bieber', 'justin@123', 16),
(17, 'parangi_rathod', 'parangi@123', 17),
(18, 'Dhruvi_Sherathiya', 'dhruvi@123', 25),
(19, 'princy bhalu', '1234', 3),
(23, 'nisha_patel', 'nishi', 19),
(33, 'Aesha_Vakhariya', 'arti', 20),
(34, 'harshilbhalu', '1111', 1),
(35, 'u6', 'u6', 26),
(37, 'u8', 'u8', 1),
(41, 'Demo', 'demo', 24),
(43, 'B_Praak', 'praak@123', 24);

-- --------------------------------------------------------

--
-- Table structure for table `profile_images`
--

CREATE TABLE `profile_images` (
  `id` int(11) NOT NULL,
  `profile_image` varchar(100) NOT NULL DEFAULT 'd.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_images`
--

INSERT INTO `profile_images` (`id`, `profile_image`) VALUES
(1, 'd.png'),
(3, 'princy.png'),
(8, 'DarshanRaval.jpg'),
(9, 'logo.png'),
(10, 'ArijitSingh.jpg'),
(11, 'GuruRandhawa.jpg'),
(12, 'Badshah.jpeg'),
(13, 'TulsiKumar.png'),
(14, 'ed.png'),
(15, 'alan.jpg'),
(16, 'justin.webp'),
(17, 'PR.png'),
(18, 'DR.png'),
(19, 'NP.png'),
(20, 'AV.PNG'),
(21, '1616476353731-removebg-preview.jpg'),
(22, 'pic.jpg'),
(23, 'icon.jpg'),
(24, 'profile_pic.jpg'),
(25, 'profilepic.PNG'),
(26, 'white.png'),
(27, 'profile_pic.jpg'),
(28, 'back.jfif'),
(29, 'profile_pic.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rolename` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `rolename`) VALUES
(1, 'user'),
(2, 'artist'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `songs_audio`
--

CREATE TABLE `songs_audio` (
  `id` int(11) NOT NULL,
  `song_audio` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `songs_audio`
--

INSERT INTO `songs_audio` (`id`, `song_audio`) VALUES
(3, 'Doob Gaye.mp3'),
(4, 'Is Qadar.mp3'),
(5, 'Ek Tarfa.mp3'),
(6, 'pachtaoge.mp3'),
(7, 'naach meri rani.mp3'),
(8, 'Peaches.mp3'),
(9, 'Baarish-Ki-Jaaye.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `songs_image`
--

CREATE TABLE `songs_image` (
  `id` int(11) NOT NULL,
  `song_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `songs_image`
--

INSERT INTO `songs_image` (`id`, `song_image`) VALUES
(3, 'Doob Gaye.png'),
(4, 'Is Qadar.png'),
(5, 'Ek Tarfa.png'),
(6, 'pachtaoge.png'),
(7, 'naach meri rani.png'),
(8, 'peaches.png'),
(9, 'Baarish-Ki-Jaaye.png');

-- --------------------------------------------------------

--
-- Table structure for table `upload_songs`
--

CREATE TABLE `upload_songs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `song_name` varchar(100) NOT NULL,
  `song_audio_id` int(11) NOT NULL,
  `song_image_id` int(11) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload_songs`
--

INSERT INTO `upload_songs` (`id`, `user_id`, `song_name`, `song_audio_id`, `song_image_id`, `year`) VALUES
(1, 5, 'doob gaye', 3, 3, 2021),
(2, 3, 'Is Qadar', 4, 4, 2021),
(3, 3, 'Ek Tarfa', 5, 5, 2020),
(4, 2, 'Pachtaoge', 6, 6, 2020),
(5, 5, 'Naach Meri Rani', 7, 7, 2020),
(6, 16, 'Peaches', 8, 8, 2021),
(7, 43, 'Baarish Ki Jaye', 9, 9, 2021);

-- --------------------------------------------------------

--
-- Table structure for table `user_in_role`
--

CREATE TABLE `user_in_role` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_in_role`
--

INSERT INTO `user_in_role` (`id`, `user_id`, `role_id`) VALUES
(1, 1, 3),
(2, 2, 2),
(3, 3, 2),
(5, 5, 2),
(8, 8, 2),
(11, 11, 2),
(13, 13, 2),
(14, 14, 2),
(16, 16, 2),
(17, 17, 1),
(18, 18, 1),
(19, 19, 1),
(22, 23, 1),
(25, 33, 1),
(26, 34, 1),
(27, 35, 1),
(29, 37, 1),
(34, 41, 1),
(36, 43, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `like_songs`
--
ALTER TABLE `like_songs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_images`
--
ALTER TABLE `profile_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `songs_audio`
--
ALTER TABLE `songs_audio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `songs_image`
--
ALTER TABLE `songs_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload_songs`
--
ALTER TABLE `upload_songs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_in_role`
--
ALTER TABLE `user_in_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `like_songs`
--
ALTER TABLE `like_songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `profile_images`
--
ALTER TABLE `profile_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `songs_audio`
--
ALTER TABLE `songs_audio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `songs_image`
--
ALTER TABLE `songs_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `upload_songs`
--
ALTER TABLE `upload_songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_in_role`
--
ALTER TABLE `user_in_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_in_role`
--
ALTER TABLE `user_in_role`
  ADD CONSTRAINT `user_in_role_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `login` (`id`),
  ADD CONSTRAINT `user_in_role_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
