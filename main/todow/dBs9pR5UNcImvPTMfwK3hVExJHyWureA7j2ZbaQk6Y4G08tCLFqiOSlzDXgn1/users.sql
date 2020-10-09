
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
('1', 'Kutchins Ludwig', '67be28138069865@mysqlgenerator.pw', '6b4a8fb2c884f38', '57.762346, 40.953012');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('2', 'Marice Putnam', 'a166d36def9022d@mail.com', 'd2cecbcc5c7c376', '55.748222, 37.537172');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('3', 'Twila Brewster', 'aa3b215493c33fd@gmx.com', '916377762973f7d', '-41.4446548, 175.2182396');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('4', 'Karine Cesare', '952927ea74ceb52@outlook.com', '5dda4d739a51e38', '35.693629, 139.688160');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('5', 'Kenzie Ody', 'b7df75fb6262f82@gmx.com', 'b1626cdda4042d4', '40.775855, -73.972428');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('6', 'Jonette Jody', 'bfb37957bd30404@mail.me', 'edb1f95d0fe2eb5', '38.604353, -90.230299');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('7', 'Lisbeth Gordie', '150a0c0fb53641e@gmx.com', '08cb6ede5a24551', '30.617640, 114.261709');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('8', 'Bambi Forbes', '1a4cead60e8c4bc@pepipost.com', '48aa11143ee30aa', '43.081587, 141.360131');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('9', 'Roderich Grantham', '33d5cdaab48a175@mail.com', '55ab2959cd02e16', '-41.4446548, 175.2182396');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('10', 'Maximilian Ky', '17f09fa5f02497e@mail.de', 'fdfdc6fc9a121fe', '40.757825, -73.974893');



			
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

 ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
		