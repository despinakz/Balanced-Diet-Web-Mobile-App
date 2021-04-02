-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 02, 2021 at 04:39 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diet`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `messageID` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`messageID`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Kate Bloom', 'bloomKate@gmail.com', 'Diet Program', 'Hi! I would like to know what diet would be best 4 me!'),
(2, 'Mary McCoy', 'marymary@gmail.com', 'Nutritious Meal Ideas', 'Hello! I would like to tell me some nutritious meals for breakfast as I need to lose weight... \nThan'),
(29, 'John Doe', 'jDoe@gmail.com', 'Diet program', 'Melissa is the best coach she saved my life'),
(30, 'Hanna Marrin ', 'hannaM@gmail.com', 'Nutrition meal', 'I would like to speak to Cheri expert about giving me some advice for a nutrition meal '),
(31, 'Ian Hardi', 'ianh@yahoo.com', 'Diet tips', 'Could you give me some advice about a healthy diet? Thanks'),
(32, 'Mary Pop', 'mary@gmail.com', 'Diet ', 'Hello'),
(33, 'Hanna Marrin ', 'hannaM@gmail.com', 'Best diet center', 'This is the best diet center ever'),
(34, 'Mary Eldow', 'eldow@gmail.com', 'Another center', 'When will you open a new center in Chicago?'),
(35, 'Jason Walker', 'walkerJ@yahoo.com', 'Melissa\'s Diet', 'I would like to send me Melissa\'s Diet. I heard so much good word about it!');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `name`, `email`) VALUES
('cdr', '202cb962ac59075b964b07152d234b70', 'Cece Drake ', 'cecedrake@gmail.com'),
('dk', '99e0c3d8668c64794370d5965799f826', 'Despina Koz', 'kozdeppy@gmail.com'),
('drose', 'b2157e7b2ae716a747597717f1efb7a0', 'Daniel Rosedoll', 'drose@gmail.com'),
('emily_f', '323c2d713e2093b957fe06ced9fbfbf3', 'Emily Fields', 'emilyFields@yahoo.com'),
('hannaM', '28b574a014d3d9d5fe016e67ac8da88d', 'Hanna Marrin ', 'hannaM@gmail.com'),
('ianMc', '435b6c271791f23696ad1761f4675553', 'Ian McCoy', 'mcIan@gmail.com'),
('jason_Q', '8ed490f34d390940a9ae300d10b51cbe', 'Jason McQueen', 'McJason@yahoo.com'),
('jdoe', '99e0c3d8668c64794370d5965799f826', 'John Doe', 'jDoe@gmail.com'),
('jdoee', '81dc9bdb52d04dc20036dbd8313ed055', 'John Doe', 'jjdoe@gmail.com'),
('mariadb', '202cb962ac59075b964b07152d234b70', 'Maria DB', 'mariadb@gmail.com'),
('maryJ', 'c1ff7242f4dd7e1a27026d500db21208', 'Mary Johnson', 'maryMary@hotmail.com'),
('mjonson', '827ccb0eea8a706c4c34a16891f84e7b', 'Mary Jonson', 'mjonson@gmail.com'),
('steven1', '202cb962ac59075b964b07152d234b70', 'Steven Hops', 'stevhops@gmail.com'),
('thomas1', '827ccb0eea8a706c4c34a16891f84e7b', 'Thomas Garret', 'garret_th@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`messageID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `messageID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
