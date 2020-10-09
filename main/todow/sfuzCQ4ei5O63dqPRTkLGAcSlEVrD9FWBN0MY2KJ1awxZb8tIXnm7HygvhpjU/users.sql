
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
('1', 'Gora Elijah', '72bb0fc3636fbaa@mail.de', '27e45f531b4f0de', '51.3231871, -116.1860489');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('2', 'Maxfield Everard', 'e307f24e187f1c0@mail.qq.com', '416ae8522537818', '38.964951, -92.336029');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('3', 'Kentigera Wolfie', '9703be71cb9b71b@mysqlgenerator.com', '606a76b18eab853', '-41.4446548, 175.2182396');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('4', 'Hooker Clarence', '7552ea6881b7f91@pepipost.com', '1c223c61e1a4da4', '48.401713, -89.247511');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('5', 'Joktan Boote', '87ad35d92904a47@outlook.com', 'd4126f07b9ad9b1', '30.617640, 114.261709');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('6', 'Rafaellle Wilton', '2ce155b9e548c8a@pepipost.com', '360e15966c5b408', '22.322352, 114.166872');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('7', 'Phenica Barbabas', '7f26c204e9c8182@hotmail.com', '39c36129eed6bff', '40.775855, -73.972428');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('8', 'Battiste Shayne', '3aa4441d8f32abc@outlook.com', '27d1e709555066c', '57.7521388, 40.949144');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('9', 'Sewellyn Giselbert', 'c505a54a82fce5c@aol.com', 'bf713ea59eef1ac', '22.322352, 114.166872');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('10', 'Mather Mark', 'da9cbd4034eca88@mysqlgenerator.pw', '56a9adeabc7827d', '-41.4446548, 175.2182396');



			
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

 ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
		