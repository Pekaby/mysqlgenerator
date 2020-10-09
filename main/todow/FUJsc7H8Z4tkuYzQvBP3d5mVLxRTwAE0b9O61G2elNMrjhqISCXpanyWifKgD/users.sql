
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
('1', 'Dorelia Brandtr', '0d7b0ba9af442b4@mail.me', 'f98bcf77c23646c', '57.765652, 40.926815');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('2', 'Orsino Urbain', '44baace0d1f34c2@gmx.com', 'cf96dc222d79239', '57.765652, 40.926815');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('3', 'Tufts Edgard', '5f638a31ec42ddd@aol.com', '44f1fbaae2f094d', '52.530130, 13.387374');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('4', 'Redmer Skip', '3c1316796242f05@mail.ru', '806b6166864fc77', '57.763930, 40.963142');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('5', 'Floridia Kylie', '451daa1fc2bb2a2@aol.com', '3f25784c6410b4d', '22.322352, 114.166872');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('6', 'Vary Odie', '8b3d845cf37af42@gmail.com', '1ec0e1a26e172a0', '37.760364, -122.425158');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('7', 'Estell Zackariah', '141ddb4fa2f8c05@mysqlgenerator.com', 'b2fd4a4825c5495', '59.939628, 30.313354');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('8', 'Tutankhamen ', '6d6df504c92dd9a@gmail.com', '958fc8343500a87', '59.939628, 30.313354');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('9', 'Jordon Jae', '6e43ae9e8117ac4@hotmail.com', '375c66b2f80c7db', '-43.532013, 172.675008');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('10', 'Mikes Halsy', 'e97aa83b280dca6', '256cc52e9cc71f7', '37.760364, -122.425158');



			
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

 ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
		