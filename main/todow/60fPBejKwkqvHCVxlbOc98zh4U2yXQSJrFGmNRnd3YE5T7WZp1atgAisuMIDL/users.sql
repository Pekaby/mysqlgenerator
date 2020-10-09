
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
('1', 'Rizzo Adan', '70e4b96e4a40bbe@mail.qq.com', '9ea6f4cd8fab45d', '40.760641, -73.981286');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('2', 'Winikka Renaud', '8b0e60eb8efeab6@mail.me', '1bd46a5e869d818', '35.272867, -111.226313');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('3', 'Reggi Costa', 'e98c3df666fc0bd@outlook.com', '608a458a0f9ae3a', '41.891502, -87.626283');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('4', 'Brooks Syman', '21fea5352458e9c@mail.qq.com', '19d309374325330', '43.081587, 141.360131');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('5', 'Story Beck', '3c1d36c9617d4f9@pekaby_develop.com', '9a766a8f986289a', '38.964951, -92.336029');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('6', 'Cummins Ingra', 'b51072679c35922@mail.com', '918bb72a9493c59', '36.799920, 10.181012');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('7', 'Ezekiel Osmond', 'de3386472b7e5d2@aol.com', '4e11374e5cd13d1', '38.908306, -92.344270');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('8', 'Ramsden Claybourne', '3764cf02352ba4c@aol.com', 'c42667bb4f5bc07', '48.847906, 2.375181');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('9', 'Carmela Augustine', '6293df3b6107c4c@yahoo.com', '96affca59fe90e1', '36.799920, 10.181012');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('10', 'Kramlich Clint', '0bc10cf38c63235@gmx.com', '282ce05d0ae8dff', '37.537415, 126.998000');



			
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

 ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
		