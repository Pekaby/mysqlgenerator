
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
('1', 'Hoffmann Jacobo', '30c3402b6b572b6@zohomail.com', '5ea7725ef5c42c0', '40.760641, -73.981286');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('2', 'Burley Konstantine', '0b075532a4d3130@hotmail.com', 'b9fd8ea4d1efe83', '41.891502, -87.626283');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('3', 'Boser Talbot', 'd5316abe2195091@gmail.com', 'a20f0b483e70281', '38.604353, -90.230299');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('4', 'Barta Percy', '7240d854d1f08f4@hotmail.com', '34e385e4adec007', '57.763118, 40.967871');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('5', 'Dav Isac', 'a42b8686b61aa1b@mail.qq.com', '39013af7c0093af', '40.757825, -73.974893');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('6', 'Anson Charley', '68e3fc4de0c0786@zohomail.com', 'e84b9af88005d7a', '40.760641, -73.981286');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('7', 'Rabkin Ky', '2612f2db57b495d@outlook.com', '35d98a6877fbd14', '35.663634, 139.741945');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('8', 'Dasya Randal', '4dfed9e32621aa2@yahoo.com', '2827d01e6c221a0', '36.799920, 10.181012');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('9', 'Norri Ange', '91867441f352b1d@mail.qq.com', '98c814fa2250196', '41.888929, -87.680983');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('10', 'Patsy Ansel', '2f88cd91ef93ac8@pepipost.com', '661b01c6564f351', '57.762371, 40.952407');



			
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

 ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
		