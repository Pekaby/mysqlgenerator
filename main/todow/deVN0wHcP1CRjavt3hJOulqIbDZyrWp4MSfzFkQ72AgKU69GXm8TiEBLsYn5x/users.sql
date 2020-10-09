
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

	
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` text COLLATE utf8mb4_general_ci NOT NULL,
  `adres` text COLLATE utf8mb4_general_ci NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
		
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('1', 'Linneman Bob', 'b4c5b05cff106c5@mysqlgenerator.com', 'b07de6b3f1362c6', '52.530130, 13.387374');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('2', 'Dougie Dani', 'd0d57333e0aa593@aol.com', '21300247d1a7417', '43.688225, -79.476638');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('3', 'Randolf Jere', 'abb73d90ccebde3@yahoo.com', 'c23409e88e9bf66', '55.748222, 37.537172');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('4', 'Seibold Bary', '2011af0988f81c3@hotmail.com', 'c1ad83b7efa0a10', '52.502292, 13.418064');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('5', 'Martina Bartholomeo', '9ec56fcc4565ab5@gmx.com', 'f57185dc242eade', '57.762346, 40.953012');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('6', 'Epstein Roddie', '69e4e55716fda65@zohomail.com', 'b3db29106fd4c73', '48.401713, -89.247511');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('7', 'Eugenio Saundra', '390174e04b525b1@mail.ru', '4fe2933c97c5209', '41.880333, -87.631812');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('8', 'Lotta Parrnell', '3df787f78862b99@gmx.com', 'a536f19358b5831', '-41.4446548, 175.2182396');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('9', 'Henrion Jedd', '44ca9da8e1cd2d0@zohomail.com', '41d4dceaa38d170', '43.649852, -79.381708');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('10', 'Domela Clark', '70147f6b77cde08@mysqlgenerator.com', 'cb0e90df8c8240f', '-33.899084, 151.193212');



			
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

 ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
		