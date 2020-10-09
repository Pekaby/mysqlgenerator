
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `Excel` (
  `id` int NOT NULL,
  `id_creator` int NOT NULL,
  `id_article` int NOT NULL,
  `text` text COLLATE utf8mb4_general_ci NOT NULL,
  `likes` int NOT NULL DEFAULT '0',
  `pub_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `Excel` (`id`, `id_creator`, `id_article`, `text`, `likes`) VALUES ('1', '646', '347', '', '1156');
        
INSERT INTO `Excel` (`id`, `id_creator`, `id_article`, `text`, `likes`) VALUES ('2', '933', '989', '', '280');
        
INSERT INTO `Excel` (`id`, `id_creator`, `id_article`, `text`, `likes`) VALUES ('3', '860', '281', '', '1213');
        
INSERT INTO `Excel` (`id`, `id_creator`, `id_article`, `text`, `likes`) VALUES ('4', '991', '483', '', '710');
        
INSERT INTO `Excel` (`id`, `id_creator`, `id_article`, `text`, `likes`) VALUES ('5', '869', '550', '', '1797');
        
INSERT INTO `Excel` (`id`, `id_creator`, `id_article`, `text`, `likes`) VALUES ('6', '295', '801', '', '431');
        
INSERT INTO `Excel` (`id`, `id_creator`, `id_article`, `text`, `likes`) VALUES ('7', '132', '934', '', '421');
        
INSERT INTO `Excel` (`id`, `id_creator`, `id_article`, `text`, `likes`) VALUES ('8', '865', '640', '', '2442');
        
INSERT INTO `Excel` (`id`, `id_creator`, `id_article`, `text`, `likes`) VALUES ('9', '451', '34', '', '744');
        
INSERT INTO `Excel` (`id`, `id_creator`, `id_article`, `text`, `likes`) VALUES ('10', '505', '105', '', '4059');
        
ALTER TABLE `Excel`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `Excel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
        