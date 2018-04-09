-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 09, 2018 at 04:12 AM
-- Server version: 5.7.21
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `games`
--

-- --------------------------------------------------------

--
-- Table structure for table `COLLECTION`
--

CREATE TABLE `COLLECTION` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `COLLECTION`
--

INSERT INTO `COLLECTION` (`ID`, `name`) VALUES
(1, 'Super Mario'),
(2, 'The Legend of Zelda'),
(3, 'Final Fantasy');

-- --------------------------------------------------------

--
-- Table structure for table `DEVELOPER`
--

CREATE TABLE `DEVELOPER` (
  `dev_name` varchar(255) NOT NULL,
  `lead` varchar(255) DEFAULT NULL,
  `team_size` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `DEVELOPER`
--

INSERT INTO `DEVELOPER` (`dev_name`, `lead`, `team_size`, `region`) VALUES
('Nintendo', NULL, NULL, 'Japan'),
('Square Enix', NULL, NULL, 'Japan');

-- --------------------------------------------------------

--
-- Table structure for table `GAME`
--

CREATE TABLE `GAME` (
  `ID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `copies_sold` int(11) DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `collection_id` int(11) DEFAULT NULL,
  `dev_name` varchar(255) DEFAULT NULL,
  `pub_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `GAME`
--

INSERT INTO `GAME` (`ID`, `title`, `copies_sold`, `release_date`, `collection_id`, `dev_name`, `pub_name`) VALUES
(1, 'Super Mario Bros.', 40240000, '1985-09-13', 1, 'Nintendo', 'Nintendo'),
(2, 'Super Mario Bros.: The Lost Levels', 2500000, '1986-06-03', 1, 'Nintendo', 'Nintendo'),
(3, 'Super Mario Bros. 3', NULL, '1990-02-12', 1, 'Nintendo', 'Nintendo'),
(4, 'Super Mario World', 20610000, '1991-08-13', 1, 'Nintendo', 'Nintendo'),
(5, 'The Legend of Zelda', NULL, '1986-02-21', 2, 'Nintendo', 'Nintendo'),
(6, 'Zelda II: The Adventure of Link', NULL, '1987-01-14', 2, 'Nintendo', 'Nintendo'),
(7, 'The Legend of Zelda: Ocarina of Time', NULL, '1998-11-21', 2, 'Nintendo', 'Nintendo'),
(8, 'The Legend of Zelda: Twilight Princess', NULL, '2006-11-19', 2, 'Nintendo', 'Nintendo'),
(9, 'Final Fantasy', 1990000, '1987-12-18', 3, 'Square Enix', 'Square Enix'),
(10, 'Final Fantasy II', 1280000, '1988-12-17', 3, 'Square Enix', 'Square Enix'),
(11, 'Final Fantasy III', 3330000, '1990-04-27', 3, 'Square Enix', 'Square Enix'),
(12, 'Final Fantasy IV', 4000000, '1991-07-19', 3, 'Square Enix', 'Square Enix'),
(13, 'Final Fantasy V', 3450000, '1992-12-06', 3, 'Square Enix', 'Square Enix'),
(14, 'Final Fantasy VI', 4890000, '1994-04-02', 3, 'Square Enix', 'Square Enix');

-- --------------------------------------------------------

--
-- Table structure for table `PLATFORM`
--

CREATE TABLE `PLATFORM` (
  `plat_name` varchar(255) NOT NULL,
  `release_date` date NOT NULL,
  `company` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PLATFORM`
--

INSERT INTO `PLATFORM` (`plat_name`, `release_date`, `company`) VALUES
('Family Computer Disk System', '1986-02-21', 'Nintendo'),
('Nintendo 64', '1996-09-26', 'Nintendo'),
('Nintendo Entertainment System', '1985-10-18', 'Nintendo'),
('Nintendo GameCube', '2001-11-18', 'Nintendo'),
('Nintendo Switch', '2017-03-17', 'Nintendo'),
('Playstation', '1994-12-03', 'Sony'),
('Playstation 2', '2000-03-04', 'Sony'),
('Playstation 3', '2006-11-11', 'Sony'),
('Playstation 4', '2014-02-22', 'Sony'),
('Super Nintendo Entertainment System', '1991-08-23', 'Nintendo'),
('Wii', '2006-11-19', 'Nintendo'),
('Wii U', '2012-11-18', 'Nintendo');

-- --------------------------------------------------------

--
-- Table structure for table `PLAYABLE_CHARACTER`
--

CREATE TABLE `PLAYABLE_CHARACTER` (
  `character_name` varchar(255) NOT NULL,
  `game_id` int(11) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PLAYABLE_CHARACTER`
--

INSERT INTO `PLAYABLE_CHARACTER` (`character_name`, `game_id`, `age`, `type`) VALUES
('Link', 5, NULL, 'Human'),
('Link', 6, NULL, 'Human'),
('Link', 7, NULL, 'Human'),
('Link', 8, NULL, 'Human');

-- --------------------------------------------------------

--
-- Table structure for table `PLAYED_BY`
--

CREATE TABLE `PLAYED_BY` (
  `game_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PLAYED_BY`
--

INSERT INTO `PLAYED_BY` (`game_id`, `username`) VALUES
(1, 'admin'),
(5, 'admin'),
(7, 'admin'),
(9, 'admin'),
(11, 'admin'),
(9, 'new'),
(8, 'user1'),
(1, 'user2'),
(3, 'user2'),
(9, 'user2');

-- --------------------------------------------------------

--
-- Table structure for table `PLAYED_ON`
--

CREATE TABLE `PLAYED_ON` (
  `ID` int(11) NOT NULL,
  `platform` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PLAYED_ON`
--

INSERT INTO `PLAYED_ON` (`ID`, `platform`) VALUES
(5, 'Family Computer Disk System'),
(6, 'Family Computer Disk System'),
(5, 'Nintendo Entertainment System'),
(6, 'Nintendo Entertainment System');

-- --------------------------------------------------------

--
-- Table structure for table `PUBLISHER`
--

CREATE TABLE `PUBLISHER` (
  `pub_name` varchar(255) NOT NULL,
  `region` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PUBLISHER`
--

INSERT INTO `PUBLISHER` (`pub_name`, `region`) VALUES
('Nintendo', 'Japan'),
('Square Enix', 'Japan');

-- --------------------------------------------------------

--
-- Table structure for table `REVIEW`
--

CREATE TABLE `REVIEW` (
  `game_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `text` longtext,
  `score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `TAG`
--

CREATE TABLE `TAG` (
  `game_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `TAG_TYPE`
--

CREATE TABLE `TAG_TYPE` (
  `game_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `username` varchar(255) NOT NULL,
  `join_date` date NOT NULL,
  `community_score` int(11) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`username`, `join_date`, `community_score`, `password`, `email`, `isAdmin`) VALUES
('admin', '2018-04-07', 900, 'admin', 'admin@test.com', 1),
('james', '2018-04-08', 0, 'paste', 'fake', 0),
('new', '2018-04-07', 0, 'potatoe', 'newemail', 0),
('root', '2018-04-07', 0, 'cpsc471', '45678ui9', 0),
('user1', '2018-04-03', 4, 'user1', 'user1@test.com', 0),
('user2', '2018-04-07', 0, 'testing', 'testing', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `COLLECTION`
--
ALTER TABLE `COLLECTION`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `DEVELOPER`
--
ALTER TABLE `DEVELOPER`
  ADD PRIMARY KEY (`dev_name`);

--
-- Indexes for table `GAME`
--
ALTER TABLE `GAME`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `collection_constraint` (`collection_id`),
  ADD KEY `dev_constraint` (`dev_name`),
  ADD KEY `pub_constraint` (`pub_name`);

--
-- Indexes for table `PLATFORM`
--
ALTER TABLE `PLATFORM`
  ADD PRIMARY KEY (`plat_name`);

--
-- Indexes for table `PLAYABLE_CHARACTER`
--
ALTER TABLE `PLAYABLE_CHARACTER`
  ADD PRIMARY KEY (`character_name`,`game_id`),
  ADD KEY `game_owner` (`game_id`);

--
-- Indexes for table `PLAYED_BY`
--
ALTER TABLE `PLAYED_BY`
  ADD PRIMARY KEY (`game_id`,`username`),
  ADD KEY `played_by` (`username`);

--
-- Indexes for table `PLAYED_ON`
--
ALTER TABLE `PLAYED_ON`
  ADD PRIMARY KEY (`ID`,`platform`) USING BTREE,
  ADD KEY `platform_constraint` (`platform`);

--
-- Indexes for table `PUBLISHER`
--
ALTER TABLE `PUBLISHER`
  ADD PRIMARY KEY (`pub_name`);

--
-- Indexes for table `REVIEW`
--
ALTER TABLE `REVIEW`
  ADD UNIQUE KEY `played` (`game_id`,`username`) USING BTREE,
  ADD KEY `user` (`username`);

--
-- Indexes for table `TAG`
--
ALTER TABLE `TAG`
  ADD PRIMARY KEY (`game_id`,`username`),
  ADD KEY `tagger` (`username`);

--
-- Indexes for table `TAG_TYPE`
--
ALTER TABLE `TAG_TYPE`
  ADD PRIMARY KEY (`game_id`,`username`,`type`),
  ADD KEY `user_tag` (`username`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `COLLECTION`
--
ALTER TABLE `COLLECTION`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `GAME`
--
ALTER TABLE `GAME`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `GAME`
--
ALTER TABLE `GAME`
  ADD CONSTRAINT `collection_constraint` FOREIGN KEY (`collection_id`) REFERENCES `COLLECTION` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `dev_constraint` FOREIGN KEY (`dev_name`) REFERENCES `DEVELOPER` (`dev_name`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `pub_constraint` FOREIGN KEY (`pub_name`) REFERENCES `PUBLISHER` (`pub_name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `PLAYABLE_CHARACTER`
--
ALTER TABLE `PLAYABLE_CHARACTER`
  ADD CONSTRAINT `game_owner` FOREIGN KEY (`game_id`) REFERENCES `GAME` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `PLAYED_BY`
--
ALTER TABLE `PLAYED_BY`
  ADD CONSTRAINT `game_played` FOREIGN KEY (`game_id`) REFERENCES `GAME` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `played_by` FOREIGN KEY (`username`) REFERENCES `Users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `PLAYED_ON`
--
ALTER TABLE `PLAYED_ON`
  ADD CONSTRAINT `game_id` FOREIGN KEY (`ID`) REFERENCES `GAME` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `platform_constraint` FOREIGN KEY (`platform`) REFERENCES `PLATFORM` (`plat_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `REVIEW`
--
ALTER TABLE `REVIEW`
  ADD CONSTRAINT `game` FOREIGN KEY (`game_id`) REFERENCES `GAME` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user` FOREIGN KEY (`username`) REFERENCES `Users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `TAG`
--
ALTER TABLE `TAG`
  ADD CONSTRAINT `game_tagged` FOREIGN KEY (`game_id`) REFERENCES `GAME` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tagger` FOREIGN KEY (`username`) REFERENCES `Users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `TAG_TYPE`
--
ALTER TABLE `TAG_TYPE`
  ADD CONSTRAINT `game_tag` FOREIGN KEY (`game_id`) REFERENCES `GAME` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_tag` FOREIGN KEY (`username`) REFERENCES `Users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;