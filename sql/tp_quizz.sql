-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 26, 2023 at 02:26 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tp_quizz`
--

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int NOT NULL,
  `question` varchar(255) NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `question`, `user_id`) VALUES
(1, 'Quelle est la capitale de la France ?', 1),
(2, 'Quelle est la capitale de Italie ?', 2),
(3, 'Quelle est la capitale du Japon ?', 3),
(4, 'Quelle est la capitale du Brésil ?', 4),
(5, 'Quelle est la capitale du Canada ?', 5),
(6, 'Quelle est la capitale de l\'Australie ?', 6),
(7, 'Quelle est la capitale de l\'Inde ?', 7),
(8, 'Quelle est la capitale de l\'Allemagne ?', 8),
(9, 'Quelle est la capitale de l\'Argentine ?', 9),
(10, 'Quelle est la capitale de l\'Égypte ?', 10),
(11, 'Quelle est la capitale de l\'Espagne ?', 11),
(12, 'Quelle est la capitale de la Russie ?', 12),
(13, ' Quelle est la capitale du Mexique ?', 13),
(14, 'Quelle est la capitale de l\'Afrique du Sud ?', 14),
(15, 'Quelle est la capitale de l\'Indonésie ?', 15),
(16, 'Quelle est la capitale de la Turquie ?', 16);

-- --------------------------------------------------------

--
-- Table structure for table `response`
--

CREATE TABLE `response` (
  `id` int NOT NULL,
  `response` varchar(255) NOT NULL,
  `response_true` tinyint(1) NOT NULL,
  `question_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `response`
--

INSERT INTO `response` (`id`, `response`, `response_true`, `question_id`) VALUES
(1, 'Paris', 1, 1),
(2, 'marseille', 0, 1),
(3, 'Saint-Etienne', 0, 1),
(4, 'Madrid', 0, 2),
(5, 'Rome', 1, 2),
(6, 'Turrin', 0, 2),
(7, 'Pékin', 0, 3),
(8, 'Tokyo', 1, 3),
(9, 'Bangkok', 0, 3),
(10, 'Rio de Janeiro', 0, 4),
(11, 'Brasilia', 1, 4),
(12, 'São Paulo', 0, 4),
(13, 'Ottawa', 1, 5),
(14, 'Toronto', 0, 5),
(15, 'Vancouver', 0, 5),
(16, 'Sydney', 0, 6),
(17, 'Canberra', 1, 6),
(18, 'Melbourne', 0, 6),
(19, 'Bangalore', 0, 7),
(20, 'Delhi', 1, 7),
(21, 'Mumbai', 0, 7),
(22, 'Vienne', 0, 8),
(23, 'Amsterdam', 0, 8),
(24, 'Berlin', 1, 8),
(25, 'Santiago', 0, 9),
(26, 'Buenos Aires', 1, 9),
(27, 'Bogota', 0, 9),
(30, 'Le Caire', 1, 10),
(31, 'Alexandrie', 0, 10),
(32, 'Nairobi', 0, 10),
(33, 'Madrid', 1, 11),
(34, 'Barcelone', 0, 11),
(35, 'Lisbonne', 0, 11),
(36, 'Istanbul', 0, 16),
(37, 'Izmir', 0, 16),
(38, 'Ankara', 1, 16),
(39, 'Saint-Pétersbourg', 0, 12),
(40, 'Moscou', 1, 12),
(41, 'Kiev', 0, 12),
(42, 'Mexico', 1, 13),
(43, 'Cancún', 0, 13),
(44, 'Monterrey', 0, 13),
(45, 'Pretoria', 1, 14),
(46, 'Johannesburg', 0, 14),
(47, 'Le Cap', 0, 14),
(48, 'Jakarta', 1, 15),
(49, 'Bangkok', 0, 15),
(50, 'Kuala Lumpur', 0, 15);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `score` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `score`) VALUES
(85, 'chicorer', 10),
(86, 'gilou', 0),
(87, 'joan', 25),
(88, 'david', 0),
(89, 'kiko', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `response`
--
ALTER TABLE `response`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `response`
--
ALTER TABLE `response`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
