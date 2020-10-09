
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

	
CREATE TABLE `comments` (
  `id` int NOT NULL,
  `id_creator` int NOT NULL,
  `id_article` int NOT NULL,
  `text` text COLLATE utf8mb4_general_ci NOT NULL,
  `likes` int NOT NULL DEFAULT '0',
  `pub_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `comments` (`id`, `id_creator`, `id_article`, `text`, `likes`) VALUES ('1', '512', '829', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Illis videtur, qui illud non dubitant bonum dicere -; Quia, si mala sunt, is, qui erit in iis, beatus non erit. 

Quid loquor de nobis, qui ad laudem et ad decus nati, suscepti, instituti sumus? Tria genera bonorum; Sint modo partes vitae beat', '1376');
		
INSERT INTO `comments` (`id`, `id_creator`, `id_article`, `text`, `likes`) VALUES ('2', '691', '698', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Rhetorice igitur, inquam, nos mavis quam dialectice disputare? Illa argumenta propria videamus, cur omnia sint paria peccata. Eorum enim omnium multa praetermittentium, dum eligant aliquid, quod sequantur, quasi curta sententia; Te ipsum, dign', '1745');
		
INSERT INTO `comments` (`id`, `id_creator`, `id_article`, `text`, `likes`) VALUES ('3', '241', '460', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Id enim volumus, id contendimus, ut officii fructus sit ipsum officium. Tubulum fuisse, qua illum, cuius is condemnatus est rogatione, P. Apparet statim, quae sint officia, quae actiones. Videmusne ut pueri ne verberibus quidem a contemplandis', '4741');
		
INSERT INTO `comments` (`id`, `id_creator`, `id_article`, `text`, `likes`) VALUES ('4', '272', '30', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quid minus probandum quam esse aliquem beatum nec satis beatum? Non est enim vitium in oratione solum, sed etiam in moribus. Certe, nisi voluptatem tanti aestimaretis. Quaesita enim virtus est, non quae relinqueret naturam, sed quae tueret', '3697');
		
INSERT INTO `comments` (`id`, `id_creator`, `id_article`, `text`, `likes`) VALUES ('5', '182', '549', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Multa sunt dicta ab antiquis de contemnendis ac despiciendis rebus humanis; Id quaeris, inquam, in quo, utrum respondero, verses te huc atque illuc necesse est. Vestri haec verecundius, illi fortasse constantius. Duo Reges: constructio interre', '334');
		
INSERT INTO `comments` (`id`, `id_creator`, `id_article`, `text`, `likes`) VALUES ('6', '298', '941', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Incommoda autem et commoda-ita enim estmata et dustmata appello-communia esse voluerunt, paria noluerunt. Tu vero, inquam, ducas licet, si sequetur; An hoc usque quaque, aliter in vita? Non est igitur summum malum dolor. Duo Reges: constructio', '4091');
		
INSERT INTO `comments` (`id`, `id_creator`, `id_article`, `text`, `likes`) VALUES ('7', '651', '929', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ad rem redeamus; Cum id fugiunt, re eadem defendunt, quae Peripatetici, verba. Praeclare hoc quidem. Si enim ita est, vide ne facinus facias, cum mori suadeas. Duo Reges: constructio interrete. Qui non moveatur et offensione turpitudinis e', '875');
		
INSERT INTO `comments` (`id`, `id_creator`, `id_article`, `text`, `likes`) VALUES ('8', '429', '162', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nimis multa. At ille pellit, qui permulcet sensum voluptate. Ergo infelix una molestia, fellx rursus, cum is ipse anulus in praecordiis piscis inventus est? Atque haec ita iustitiae propria sunt, ut sint virtutum reliquarum communia. Duo R', '1924');
		
INSERT INTO `comments` (`id`, `id_creator`, `id_article`, `text`, `likes`) VALUES ('9', '38', '933', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dicam, inquam, et quidem discendi causa magis, quam quo te aut Epicurum reprehensum velim. Hoc est dicere: Non reprehenderem asotos, si non essent asoti. 

Sint ista Graecorum; Dat enim intervalla et relaxat. Et non ex maxima parte de tota iud', '3500');
		
INSERT INTO `comments` (`id`, `id_creator`, `id_article`, `text`, `likes`) VALUES ('10', '347', '394', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Septem autem illi non suo, sed populorum suffragio omnium nominati sunt. Virtutis, magnitudinis animi, patientiae, fortitudinis fomentis dolor mitigari solet. Non quam nostram quidem, inquit Pomponius iocans; Duo Reges: constructio interrete. ', '4852');
		
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
		