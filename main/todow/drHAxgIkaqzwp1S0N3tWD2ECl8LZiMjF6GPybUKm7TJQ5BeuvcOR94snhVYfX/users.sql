
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
('1', 'Lustig Haydon', '6cc16084130f12f@gmail.com', '3d8d85bbbba6b5e', '22.322352, 114.166872');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('2', 'Sheline Maxy', '5d0c878d196fa89@yahoo.com', 'a8e9c77a57b6fbd', '35.693629, 139.688160');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('3', 'Burkhart Cory', 'e3cfb79c7c5064e@gmx.com', '69a667f62d199e8', '35.693629, 139.688160');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('4', 'Jaret Jozef', '4c574cc1fea5476@mysqlgenerator.com', '9bab6bd09340ebe', '37.537415, 126.998000');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('5', 'Nataline Gerard', '0ff8256fd21bd9a@mail.com', '257db88b737f9c5', '59.939628, 30.313354');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('6', 'Bostow Jake', '4f440b64367536a@mysqlgenerator.pw', 'e30a4cf48fbf6b8', '40.760641, -73.981286');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('7', 'Ebner Georgie', 'b728a6e7f529b85@pekaby.com', 'bf65a3cf94e51ed', '52.502292, 13.418064');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('8', 'Malkin Darrel', '2b480197b405221@yahoo.com', 'a6a03d0e46fa8a8', '57.767769, 40.926856');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('9', 'Braynard Avram', '856cb806c71e861@mail.de', 'bdd9fc3ff855ef2', '48.401713, -89.247511');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('10', 'Photina Rriocard', 'e1a3fe57b17bdec@aol.com', 'f6684cd7780c541', '52.502292, 13.418064');



			
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

 ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
		