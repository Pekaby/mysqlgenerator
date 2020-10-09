<?
//http://qq/constructor?name_table=&theme=Articles&seed=&many_stocks=300&g-recaptcha-response=&start_singl=
$theme = $_GET['theme'];
$theme = strtolower($theme);
function hashCode($str) {
    $str = (string)$str;
    $hash = 0;
    $len = strlen($str);
    if ($len == 0 )
        return $hash;

    for ($i = 0; $i < $len; $i++) {
        $h = $hash << 5;
        $h -= $hash;
        $h += ord($str[$i]);
        $hash = $h;
        $hash &= 0xFFFFFFFF;
    }
    return $hash;
};
if (isset($_GET['start_singl'])) {

	
// STAT FILES
$file_name = $_COOKIE['id_usr'];
$time = time();
$insetrt_to_stat = mysqli_query($connect, "INSERT INTO `statistics_of_files` (`file_name`, `time`) VALUES ('$file_name', '$time')");
unset($file_name);
unset($time);

//===========

	$many_stocks = $_GET['many_stocks'];
	if ($_GET['name_table'] === '') {
		$name_table = $theme;
	}else{
		$name_table = $_GET['name_table'];
		$name_table = str_replace(' ', '', $name_table);
	}

	$sql = "
SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = \"+00:00\";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

	";
// [=====================================]

	$file_id = $_COOKIE['id_usr'];
	$mkdir = $path.$file_id;
	$isdir = is_dir($mkdir);
	if (!$isdir) {
		mkdir($mkdir);
	}
	$file_id = $path.$file_id."/".$name_table.".sql";
	setcookie("fname", $file_id, time()+9999);

// [=====================================]

	$fp = fopen($file_id, 'w');
	fwrite($fp, $sql);
	fclose($fp);
	$fp = fopen($file_id, 'a');


//  [====================================]
	if ($theme == 'users') {		

		$buffer = file_get_contents("temp/json/users/names.json");
		$buffer_middle = file_get_contents("temp/json/users/middle-names.json");

		$data_names = json_decode($buffer);
		$data_midle = json_decode($buffer_middle);

		// $first_name = rand(0, 21900);
		// $middle_name = rand(0, 4000);


		$sql = "
CREATE TABLE `$name_table` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` text COLLATE utf8mb4_general_ci NOT NULL,
  `adres` text COLLATE utf8mb4_general_ci NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
		";
		fwrite($fp, $sql);
//		==================================================================

		if ($_GET['seed'] == '') {
			$seed = random_int(0, 9999999999999);
		}else{
			$seed = $_GET['seed'];
		}
		for ($i=1; $i <= $many_stocks; $i++) {
			$seed = hashCode($seed);
			mt_srand($seed);
			$first_name = mt_rand(0, 21900);
			$middle_name = mt_rand(0, 4000);
			// $first_name = rand(0, 21900);
			// $middle_name = rand(0, 4000);
			$data_email = md5($seed);
			$data_email = substr($data_email, 0, 15);
			$email_rand = mt_rand(0, $rand_emails);
			$data_adress = mt_rand(0, $rand_adresses);
			// $email_rand = rand(0, $rand_emails);
			// $data_adress = rand(0, $rand_adresses);


			$email = $data_email . $emails[$email_rand];
			$name = $data_names[$first_name] . ' ' . $data_midle[$middle_name];
			$password = $seed*15;
			$password = sha1($password);
			$password = substr($password, 0, 15);
			$adress = $addresses[$data_adress]; 

			$sql = "
INSERT INTO `$name_table` (`id`, `name`, `email`, `password`, `adres`) VALUES
('$i', '$name', '$email', '$password', '$adress');



			";
			fwrite($fp, $sql);

			//echo $data_names[$first_name] . ' ' . $data_midle[$middle_name];
			$seed++;
		}
		$sql = "
ALTER TABLE `$name_table`
  ADD PRIMARY KEY (`id`);

 ALTER TABLE `$name_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
		";
		fwrite($fp, $sql);
		fclose($fp);
		$_SESSION['download'] = 'ready';
		$download = $_COOKIE['id_usr'];
		header("Location: /download?id_download=$download");

	}elseif($theme == 'articles'){
		$sql = "
CREATE TABLE `$name_table` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_creator` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `text` text COLLATE utf8mb4_general_ci NOT NULL,
  `pub_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `views` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
		";
		fwrite($fp, $sql);

		for ($i=1; $i <= $many_stocks ; $i++) { 
			$content = file_get_contents('http://loripsum.net/api');
			$title = mb_substr($content, 0, 255);
			$id_category = rand(1, 25);
			$id_creator = rand(1, 1000);
			$views = rand(0, 500000);
			$content = str_replace("<p>", '', $content);
			$content = str_replace("</p>", '', $content);
			$title = str_replace("<p>", '', $title);
			$title = str_replace("</p>", '', $title);
			$sql = "
INSERT INTO `$name_table` (`id`, `id_category`, `id_creator`, `title`, `text`, `views`) VALUES
('$i', '$id_category', '$id_creator', '$title', '$content', '$views');
			";
			fwrite($fp, $sql);

		}

		$sql = "
ALTER TABLE `$name_table`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `$name_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
		";
		fwrite($fp, $sql);		
	}elseif($theme == 'comments'){
		$sql = "
CREATE TABLE `$name_table` (
  `id` int NOT NULL,
  `id_creator` int NOT NULL,
  `id_article` int NOT NULL,
  `text` text COLLATE utf8mb4_general_ci NOT NULL,
  `likes` int NOT NULL DEFAULT '0',
  `pub_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
";
	fwrite($fp, $sql);

	for ($i=1; $i <= $many_stocks; $i++) { 
		$content = file_get_contents('http://loripsum.net/api');
		$content = str_replace("<p>", '', $content);
		$content = str_replace("</p>", '', $content);
		$content = mb_substr($content, 0, 300);
		$id_creator = rand(0, 1000);
		$id_article = rand(0, 1000);
		$likes = rand(0, 5000);
		$sql = "
INSERT INTO `$name_table` (`id`, `id_creator`, `id_article`, `text`, `likes`) VALUES ('$i', '$id_creator', '$id_article', '$content', '$likes');
		";
		fwrite($fp, $sql);
	}
		$sql = "
ALTER TABLE `$name_table`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `$name_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
		";

		fwrite($fp, $sql);	
	}

	$download = $_COOKIE['id_usr'];
	header("Location: /download?id_download=$download");
	// echo "<script>self.location='/download?id_download=$download';</script>";
	// echo "<script>document.location.href='/download?id_download=$download';</script>";
	// echo "<script>window.location.href='/download?id_download=$download';</script>";
	// echo "<script>window.location.replace('/download?id_download=$download');</script>";

}


// [====FEEED BACK=====]

if (isset($_POST['dofeed'])) {
	if (empty($_POST['email'])) {
		header("Location: /");
	}elseif (empty($_POST['feed_back'])) {
		header("Location: /");
	}

        $email = $_POST['email'];
        $text = $_POST['feed_back'];
        mail("11gavegames11@gmail.com", "MySQL Generator | Feedback from {$email}", "$text", "From: feedback@mysqlgenerator.pw");
			unset($_POST);
			if ($_SESSION['http_lang'] == 'english') {
				include 'temp/language/en/temp/thx_for_feedback.php';
			}elseif($_SESSION['http_lang'] == 'russian'){
				include 'temp/language/ru/temp/thx_for_feedback.php';
			}elseif($_SESSION['http_lang'] == 'spanish'){
				include 'temp/language/es/temp/thx_for_feedback.php';
			}
			else{
				include 'temp/language/en/temp/thx_for_feedback.php';
			}
}
