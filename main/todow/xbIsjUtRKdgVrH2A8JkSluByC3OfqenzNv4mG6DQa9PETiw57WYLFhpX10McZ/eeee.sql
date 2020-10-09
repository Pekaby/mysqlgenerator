
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

	
CREATE TABLE `eeee` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` text COLLATE utf8mb4_general_ci NOT NULL,
  `adres` text COLLATE utf8mb4_general_ci NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
		
INSERT INTO `eeee` (`id`, `name`, `email`, `password`, `adres`) VALUES
('1', 'Olmsted Ali', '4ac78632d65a64b@pekaby.com', '1e5ec781daf55cf', '57.746002, 40.987304');



			
INSERT INTO `eeee` (`id`, `name`, `email`, `password`, `adres`) VALUES
('2', 'Munford Michael', '284fd431e19cf79', '5e315c462960bec', '55.748222, 37.537172');



			
INSERT INTO `eeee` (`id`, `name`, `email`, `password`, `adres`) VALUES
('3', 'Merissa Dag', '9b382d51c5b40f6@mail.qq.com', '4f44989b22a7926', '43.081587, 141.360131');



			
INSERT INTO `eeee` (`id`, `name`, `email`, `password`, `adres`) VALUES
('4', 'Hernardo Chrisy', '7f9d5ac733576e5@zohomail.com', 'db3eddb11ee4c0b', '43.649852, -79.381708');



			
INSERT INTO `eeee` (`id`, `name`, `email`, `password`, `adres`) VALUES
('5', 'Major Chevalier', '7e7a85a89861552@outlook.com', 'e72b00eaebe6ad9', '38.908306, -92.344270');



			
INSERT INTO `eeee` (`id`, `name`, `email`, `password`, `adres`) VALUES
('6', 'Collum Giordano', '7a96201115e659d@mail.nz', '0c795c02ecd6fe2', '38.908306, -92.344270');



			
INSERT INTO `eeee` (`id`, `name`, `email`, `password`, `adres`) VALUES
('7', 'Tubb Nehemiah', '2a46afbe936bb44@mail.ru', '509ddd32447b2b7', '48.847906, 2.375181');



			
INSERT INTO `eeee` (`id`, `name`, `email`, `password`, `adres`) VALUES
('8', 'Gipps Correy', '479837da540aa23@pekaby_develop.com', 'b7a3ba670b93ab4', '57.765652, 40.926815');



			
INSERT INTO `eeee` (`id`, `name`, `email`, `password`, `adres`) VALUES
('9', 'Cecilio Otis', '970f2e879e7231a@mail.de', 'af78f58ef5f0cf8', '43.081587, 141.360131');



			
INSERT INTO `eeee` (`id`, `name`, `email`, `password`, `adres`) VALUES
('10', 'Zena Nelson', '931ee2154ac3a8e@gmx.com', '7d222a3ed11a53b', '51.522719, -0.106369');



			
ALTER TABLE `eeee`
  ADD PRIMARY KEY (`id`);

 ALTER TABLE `eeee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
		