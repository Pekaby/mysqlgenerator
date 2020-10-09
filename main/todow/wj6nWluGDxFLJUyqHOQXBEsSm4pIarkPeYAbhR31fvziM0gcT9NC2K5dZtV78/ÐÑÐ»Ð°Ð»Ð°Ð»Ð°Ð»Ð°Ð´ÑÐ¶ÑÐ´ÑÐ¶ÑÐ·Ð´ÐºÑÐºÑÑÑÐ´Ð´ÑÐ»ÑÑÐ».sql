
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

	
CREATE TABLE `ÐÑÐ»Ð°Ð»Ð°Ð»Ð°Ð»Ð°Ð´ÑÐ¶ÑÐ´ÑÐ¶ÑÐ·Ð´ÐºÑÐºÑÑÑÐ´Ð´ÑÐ»ÑÑÐ»` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` text COLLATE utf8mb4_general_ci NOT NULL,
  `adres` text COLLATE utf8mb4_general_ci NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
		
INSERT INTO `ÐÑÐ»Ð°Ð»Ð°Ð»Ð°Ð»Ð°Ð´ÑÐ¶ÑÐ´ÑÐ¶ÑÐ·Ð´ÐºÑÐºÑÑÑÐ´Ð´ÑÐ»ÑÑÐ»` (`id`, `name`, `email`, `password`, `adres`) VALUES
('1', 'Loni Cary', '47b6b9bda0670d6@mail.ru', '4519708fde1d7b7', '43.649852, -79.381708');



			
INSERT INTO `ÐÑÐ»Ð°Ð»Ð°Ð»Ð°Ð»Ð°Ð´ÑÐ¶ÑÐ´ÑÐ¶ÑÐ·Ð´ÐºÑÐºÑÑÑÐ´Ð´ÑÐ»ÑÑÐ»` (`id`, `name`, `email`, `password`, `adres`) VALUES
('2', 'Moffitt Jamaal', 'd2a34ba507259c6@mysqlgenerator.com', 'c491076ec323e96', '-43.532013, 172.675008');



			
INSERT INTO `ÐÑÐ»Ð°Ð»Ð°Ð»Ð°Ð»Ð°Ð´ÑÐ¶ÑÐ´ÑÐ¶ÑÐ·Ð´ÐºÑÐºÑÑÑÐ´Ð´ÑÐ»ÑÑÐ»` (`id`, `name`, `email`, `password`, `adres`) VALUES
('3', 'Bertie Mile', '0fa85c1ad93725c@zohomail.com', '845438fc848506a', '51.522719, -0.106369');



			
INSERT INTO `ÐÑÐ»Ð°Ð»Ð°Ð»Ð°Ð»Ð°Ð´ÑÐ¶ÑÐ´ÑÐ¶ÑÐ·Ð´ÐºÑÐºÑÑÑÐ´Ð´ÑÐ»ÑÑÐ»` (`id`, `name`, `email`, `password`, `adres`) VALUES
('4', 'Stoat Stirling', 'c0d02e40043499a@hotmail.com', 'a0475e8a8cb221b', '41.880333, -87.631812');



			
INSERT INTO `ÐÑÐ»Ð°Ð»Ð°Ð»Ð°Ð»Ð°Ð´ÑÐ¶ÑÐ´ÑÐ¶ÑÐ·Ð´ÐºÑÐºÑÑÑÐ´Ð´ÑÐ»ÑÑÐ»` (`id`, `name`, `email`, `password`, `adres`) VALUES
('5', 'Tarsus Even', '2d178425264d82e@pepipost.com', 'f0153a5656d8a11', '43.081587, 141.360131');



			
INSERT INTO `ÐÑÐ»Ð°Ð»Ð°Ð»Ð°Ð»Ð°Ð´ÑÐ¶ÑÐ´ÑÐ¶ÑÐ·Ð´ÐºÑÐºÑÑÑÐ´Ð´ÑÐ»ÑÑÐ»` (`id`, `name`, `email`, `password`, `adres`) VALUES
('6', 'Adaminah Loydie', '6b189286e3c63a5@mail.ru', '4a32bc3c57ea263', '-43.532013, 172.675008');



			
INSERT INTO `ÐÑÐ»Ð°Ð»Ð°Ð»Ð°Ð»Ð°Ð´ÑÐ¶ÑÐ´ÑÐ¶ÑÐ·Ð´ÐºÑÐºÑÑÑÐ´Ð´ÑÐ»ÑÑÐ»` (`id`, `name`, `email`, `password`, `adres`) VALUES
('7', 'Moina Worden', 'de3eb6c5079aa4b@mail.com', 'b258df1d400e343', '35.689315, 139.777822');



			
INSERT INTO `ÐÑÐ»Ð°Ð»Ð°Ð»Ð°Ð»Ð°Ð´ÑÐ¶ÑÐ´ÑÐ¶ÑÐ·Ð´ÐºÑÐºÑÑÑÐ´Ð´ÑÐ»ÑÑÐ»` (`id`, `name`, `email`, `password`, `adres`) VALUES
('8', 'Bryant Darius', '47ac4189ef45349@mail.qq.com', 'b9e074275f67217', '51.522719, -0.106369');



			
INSERT INTO `ÐÑÐ»Ð°Ð»Ð°Ð»Ð°Ð»Ð°Ð´ÑÐ¶ÑÐ´ÑÐ¶ÑÐ·Ð´ÐºÑÐºÑÑÑÐ´Ð´ÑÐ»ÑÑÐ»` (`id`, `name`, `email`, `password`, `adres`) VALUES
('9', 'Gannes Claybourne', '18ae97045e5d6c1@mail.nz', '9d7e2ed3f61fdb0', '57.762371, 40.952407');



			
INSERT INTO `ÐÑÐ»Ð°Ð»Ð°Ð»Ð°Ð»Ð°Ð´ÑÐ¶ÑÐ´ÑÐ¶ÑÐ·Ð´ÐºÑÐºÑÑÑÐ´Ð´ÑÐ»ÑÑÐ»` (`id`, `name`, `email`, `password`, `adres`) VALUES
('10', 'Purpura Manny', '5803f20b974d3ee@mysqlgenerator.pw', '8b59d48a62c7fe5', '41.891502, -87.626283');



			
ALTER TABLE `ÐÑÐ»Ð°Ð»Ð°Ð»Ð°Ð»Ð°Ð´ÑÐ¶ÑÐ´ÑÐ¶ÑÐ·Ð´ÐºÑÐºÑÑÑÐ´Ð´ÑÐ»ÑÑÐ»`
  ADD PRIMARY KEY (`id`);

 ALTER TABLE `ÐÑÐ»Ð°Ð»Ð°Ð»Ð°Ð»Ð°Ð´ÑÐ¶ÑÐ´ÑÐ¶ÑÐ·Ð´ÐºÑÐºÑÑÑÐ´Ð´ÑÐ»ÑÑÐ»`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
		