

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE DATABASE IF NOT EXISTS `4272332_9454454744` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `4272332_9454454744`;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int NOT NULL,
  `room_code` varchar(255) NOT NULL,
  `player_id` varchar(255) DEFAULT NULL,
  `score` int DEFAULT NULL,
  `game_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_code`, `player_id`, `score`, `game_status`) VALUES
(155, '12628', '8', 1, '1'),
(156, '12628', '14', 11, '1'),
(157, '70629', '15', 9, '0'),
(158, '98454', '15', 9, '1'),
(159, '98454', '18', 2, '1'),
(160, '57457', '15', 9, '1'),
(161, '57457', '8', 1, '1'),
(162, '86851', '8', 1, '1'),
(163, '86851', '15', 9, '1'),
(164, '58177', '8', 1, '1'),
(165, '58177', '15', 9, '1'),
(166, '46071', '8', 1, '1'),
(167, '46071', '18', 2, '1'),
(168, '31307', '8', 1, '1'),
(169, '31307', '18', 2, '1'),
(170, '78413', '19', NULL, '1'),
(171, '78413', '20', 8, '1'),
(172, '22674', '21', 9, '1'),
(173, '22674', '22', 9, '1'),
(174, '96848', '23', 11, '1'),
(175, '96848', '24', 0, '1'),
(176, '12860', '26', 8, '1'),
(177, '12860', '27', 4, '1'),
(178, '20744', '27', 4, '1'),
(179, '20744', '26', 8, '1'),
(180, '92391', '27', NULL, '0'),
(181, '69812', '30', 5, '1'),
(182, '69812', '31', 9, '1'),
(183, '63144', '31', 9, '1'),
(184, '63144', '30', 5, '1'),
(185, '31399', '26', 8, '1'),
(186, '31399', '32', 9, '1'),
(187, '78625', '32', 9, '1'),
(188, '78625', '33', 2, '1'),
(189, '50866', '26', 8, '0'),
(190, '88150', '34', 7, '1'),
(191, '88150', '26', 8, '1'),
(192, '24771', '26', 8, '1'),
(193, '24771', '34', 7, '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `middle_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `age` int NOT NULL,
  `username` varchar(200) NOT NULL,
  `passwords` varchar(255) NOT NULL,
  `account_type` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `middle_name`, `last_name`, `age`, `username`, `passwords`, `account_type`) VALUES
(7, 'joshua', '', 'padilla', 21, 'pads', 'pads', 0),
(8, 'angela', 'denise', 'flores', 21, 'denise', 'denise', 0),
(9, 'zyrine', '', 'alcarez', 23, 'zyrine', 'zyrine', 0),
(10, 'joshua', 'raymundo', 'padilla', 22, 'padila', 'padilla', 0),
(11, 'online', '', 'Test', 25, 'online', 'online', 0),
(12, 'online', '', 'Test', 25, 'online', 'online', 0),
(13, 'Joshua', '', 'Cellphone', 25, 'cellphone', 'cellphone', 0),
(14, 'Mike', 'Rogers', 'Michaels', 19, 'Mike', '4koSiMike', 0),
(15, 'lexi', '', 'lore', 25, 'lexi', 'lexi', 0),
(16, 'mike', 'n', 'nierva', 21, 'mike', '123', 0),
(17, 'mike', 'nagrampa', 'niervw', 22, 'Mike', '12345', 0),
(18, 'Johnmike', 'Nagrampa', 'Nierva', 22, 'Johnmike14', '12345', 0),
(19, 'iuyg', 'hgf', 'hfh', 45, 'te@gmail.com', '123', 0),
(20, 'Nz', 'Nj', 'Nr', 56, 'Gh', '123', 0),
(21, 'Utot', 'M.', 'Baho', 23, 'Utotbaho', 'password', 0),
(22, 'luffy', 'd', 'monkey', 19, 'monkeydluffy', 'password', 0),
(23, 'Love', 'Rogers', 'Alcain', 19, 'Alcain123', '1234', 0),
(24, 'Arnold', 'Swors', 'Rogers', 19, 'arnold', '1234', 0),
(25, 'Juliana', 'Diaz', 'Padrigon', 22, 'Irapad', 'padrigon05', 0),
(26, 'Joshua Anderson', 'Raymundo', 'Padilla', 23, 'Joshua', 'joshua', 0),
(27, 'Ira', 'Diaz', 'Padrigon', 22, 'Ira', 'padrigon', 0),
(28, 'Angela denise', '', 'Flores', 22, 'Angela123', 'Angela123', 0),
(29, 'joshua', 'raymundo', 'padilla', 22, 'joshua2022', 'joshua2022', 0),
(30, 'joshua', 'raymundo', 'padilla', 23, 'joshua anderson2023', 'joshua anderson2023', 0),
(31, 'Joan', '', 'Panimbangon', 25, 'Joan', 'joan', 0),
(32, 'Dave', '', 'Rosero', 20, 'shingie', 'fear1995', 0),
(33, 'aaaaaaaa', 'a', 'aaaaaaaaa', 69, 'a', 'a', 0),
(34, 'hatdog', 'hatdog', 'hatdog', 21, 'hatdog', 'hatdog', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
