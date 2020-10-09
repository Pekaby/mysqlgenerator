
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
('1', 'Vasili Hyman', '20620beb43855ab@gmail.com', 'e6528768a5bc1ba', '43.649852, -79.381708');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('2', 'Wren Morton', 'ea745c70b029e09@mail.com', '3da4c6b7028518a', '41.880333, -87.631812');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('3', 'Alberik Fair', '5ea3091939eeaac@pepipost.com', 'f5c5c178415881a', '');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('4', 'Allerie Carey', '337825f4c2e01f0@yahoo.com', '96b8d5a262267e3', '43.688225, -79.476638');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('5', 'Luke Kin', 'f8217cc96bc587d@mail.de', '548102679c7ecc6', '37.537415, 126.998000');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('6', 'Musa Brocky', '9bbfb042302f46e', '4c83df538aebc6b', '57.762371, 40.952407');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('7', 'Devon Rowen', '367f581c80aab90@hotmail.com', 'fa0bc512710117a', '57.746002, 40.987304');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('8', 'Bakerman Freeman', 'e0ea8b32ebd8056@zohomail.com', 'e830fdddbcf69b4', '37.760364, -122.425158');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('9', 'Kevin Burk', '7e024c6203a1956@aol.com', '52ab86b39651686', '38.759960, -92.794537');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('10', 'Collar Rikki', '85354ab96fa5685@zohomail.com', '6a37ca59ac7b235', '57.746002, 40.987304');



			
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

 ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
		