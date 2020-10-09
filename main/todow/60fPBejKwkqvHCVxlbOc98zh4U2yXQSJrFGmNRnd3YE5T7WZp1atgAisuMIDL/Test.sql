
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

	
CREATE TABLE `Test` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` text COLLATE utf8mb4_general_ci NOT NULL,
  `adres` text COLLATE utf8mb4_general_ci NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
		
INSERT INTO `Test` (`id`, `name`, `email`, `password`, `adres`) VALUES
('1', 'Sjoberg Hashim', 'ac98696aa7ebafb@pekaby_develop.com', '8f53c000540f786', '38.964951, -92.336029');



			
INSERT INTO `Test` (`id`, `name`, `email`, `password`, `adres`) VALUES
('2', 'Carisa Pooh', 'c2400d129e3e3e4@pekaby.com', 'ccfe56368d50fe8', '57.7521388, 40.949144');



			
INSERT INTO `Test` (`id`, `name`, `email`, `password`, `adres`) VALUES
('3', 'Martina Mickie', 'a7eb3bd43a3eab6', '24fc84fa238babf', '37.537415, 126.998000');



			
INSERT INTO `Test` (`id`, `name`, `email`, `password`, `adres`) VALUES
('4', 'Terza Sherman', '38797fbb286aadb@pekaby_develop.com', '68f5fa7fb4d1b43', '40.760641, -73.981286');



			
INSERT INTO `Test` (`id`, `name`, `email`, `password`, `adres`) VALUES
('5', 'Neau Demetri', '82cd91333424b37@pepipost.com', 'a5ad777fd1dbe58', '41.880333, -87.631812');



			
INSERT INTO `Test` (`id`, `name`, `email`, `password`, `adres`) VALUES
('6', 'Lear Silvano', 'f9bc0ff8374338e@pekaby.com', 'ad6956bbfbbbeb5', '57.762346, 40.953012');



			
INSERT INTO `Test` (`id`, `name`, `email`, `password`, `adres`) VALUES
('7', 'Brathwaite ', '27e7a900c7a57d4@outlook.com', 'f493d08564b9400', '57.762346, 40.953012');



			
INSERT INTO `Test` (`id`, `name`, `email`, `password`, `adres`) VALUES
('8', 'Scheers Kahlil', 'ae14cbfd13c8026@mail.nz', '439cead1bfe5312', '43.081587, 141.360131');



			
INSERT INTO `Test` (`id`, `name`, `email`, `password`, `adres`) VALUES
('9', 'Zerelda Ali', '82f58bfd127300c@aol.com', 'b0a715a79c8eb39', '51.522719, -0.106369');



			
INSERT INTO `Test` (`id`, `name`, `email`, `password`, `adres`) VALUES
('10', 'Regen Claudian', '35c93eac55e7662@zohomail.com', 'aad9604314259bf', '40.757825, -73.974893');



			
ALTER TABLE `Test`
  ADD PRIMARY KEY (`id`);

 ALTER TABLE `Test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
		