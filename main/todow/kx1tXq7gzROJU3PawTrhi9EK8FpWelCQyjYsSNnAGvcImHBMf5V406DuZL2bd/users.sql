
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
('1', 'Follmer Gun', '1cc44f16b796d2e', 'dd489ecfa71e675', '41.888929, -87.680983');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('2', 'Flossi Stern', 'e1b98438c09a662@pekaby_develop.com', '416afc118fcd5eb', '43.649852, -79.381708');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('3', 'Tecu Jerrold', 'fcc88176fb57597@mysqlgenerator.com', '89e88ac6f9bcb7f', '59.939628, 30.313354');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('4', 'Merete Biron', 'ae040614648a258@gmx.com', '8fea77b8ff5e3d6', '41.888929, -87.680983');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('5', 'Khan Fremont', '9a2c35620952fc9@pekaby.com', '5e4644a7f49b0fb', '36.799920, 10.181012');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('6', 'Burbank Maurise', '1be672cc9798a7f@pekaby.com', 'bcab6ec1a2fe63f', '57.763930, 40.963142');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('7', 'Yeh Leonerd', '49649549a547774@pepipost.com', '166a01bc83db4ff', '35.693629, 139.688160');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('8', 'Arvo Mendie', '6feec30fcac72d6@outlook.com', '61367b3b52fec1c', '52.530130, 13.387374');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('9', 'Pax Dillon', '7d8c7591c0ff8d7@gmail.com', 'f2c3f74af1bdb23', '43.649852, -79.381708');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('10', 'Bevon Tarrance', 'f3936c56404f7ef@pekaby_develop.com', '5d6a1b73386608e', '57.767769, 40.926856');



			
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

 ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
		