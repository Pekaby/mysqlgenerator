
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
('1', 'Tadich Abey', 'd339973b0899e23@zohomail.com', 'fa206719c1a7271', '57.765652, 40.926815');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('2', 'Scurlock Hadrian', '41772ac62393ddf@mail.qq.com', '7312164d9bfcd9e', '');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('3', 'Koerner Shannon', 'ae67a16e1b9d411@pekaby.com', 'b08dd0300dbc680', '43.688225, -79.476638');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('4', 'Dunson Gilburt', '86c4d801d0586dd@zohomail.com', '38491917a62caf9', '52.530130, 13.387374');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('5', 'Thurber ', 'e76a01abdf5243a@gmx.com', 'b08a4d55edf065c', '59.939628, 30.313354');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('6', 'Jude Swen', 'e2631f523cc4933@gmx.com', 'cff5fe0e429be07', '55.748222, 37.537172');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('7', 'Azelea Damian', 'a03fcfb6338181f@gmx.com', '8c8b82d249ff7f0', '48.401713, -89.247511');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('8', 'Griffie Ignaz', '403459142d6dff0@gmail.com', '513c06ed93174d4', '38.759960, -92.794537');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('9', 'Laraine Dall', '05fef5e9eb9fe97@mysqlgenerator.com', 'd97eee2b571b0b7', '38.604353, -90.230299');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('10', 'Wahlstrom Sansone', '99ea4a2045bf268@yahoo.com', '163e3ee4c8c6110', '48.401713, -89.247511');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('11', 'Mettah Conan', '6240359bd39cac7@outlook.com', 'e0f3cab09370bcc', '22.322352, 114.166872');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('12', 'Bettina Maynard', '133e197e2622f46@aol.com', '9a68a050b4894d2', '52.530130, 13.387374');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('13', 'Linehan Norman', '68a9152bdfdbb78@mail.com', '47ed2bd296a9d44', '37.537415, 126.998000');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('14', 'Madelyn Dev', '804ea0048b3cd4f@outlook.com', '054675be02347c8', '57.763930, 40.963142');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('15', 'Boggs Forster', 'fbf3a7f8cc234da@yahoo.com', 'aa4a3fd83dbab89', '57.762371, 40.952407');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('16', 'Barnie Willis', 'cfd1f409bb79aca', '091bb5fe92242f1', '41.880333, -87.631812');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('17', 'Grissom Ogden', '0a1f9d9ab4c9798@aol.com', '768984522acb808', '46.3458001, 10.0488688');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('18', 'Morena Lyn', '2a5a674424846e6@zohomail.com', '2cc0b30de2c20d3', '57.762371, 40.952407');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('19', 'Friend Perry', '35e16ced2f997d8@gmail.com', '5ea7d64b4a545f3', '51.3231871, -116.1860489');



			
INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`) VALUES
('20', 'Giusto Henry', 'f55ee979c33bdc6@aol.com', '323c2689593e3e8', '35.663634, 139.741945');



			
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

 ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
		