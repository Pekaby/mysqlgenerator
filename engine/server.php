<?

$emails = array(
	"@gmail.com",
	"@hotmail.com",
	"@yahoo.com",
	"@mail.com",
	"@mail.ru",
	"@mail.de",
	"@mail.nz",
	"@mail.me",
	"@pekaby.com",
	"@outlook.com",
	"@pekaby_develop.com",
	"@pepipost.com",
	"@zohomail.com",
	"@aol.com",
	"@gmx.com",
	"@mail.qq.com"	
);
$rand_emails = count($emails);
$addresses = array(
	"37.760364, -122.425158",
	"38.759960, -92.794537",
	"38.964951, -92.336029",
	"38.908306, -92.344270",
	"38.604353, -90.230299",
	"35.272867, -111.226313",
	"48.401713, -89.247511",
	"43.688225, -79.476638",
	"43.649852, -79.381708",
	"40.760641, -73.981286",
	"40.757825, -73.974893",
	"40.775855, -73.972428",
	"41.891502, -87.626283",
	"41.888929, -87.680983",
	"41.880333, -87.631812",
	"35.693629, 139.688160",
	"35.663634, 139.741945",
	"51.3231871, -116.1860489",
	"46.3458001, 10.0488688",
	"-41.4446548, 175.2182396",

	//important / Memorable places with my ex
	"57.767769, 40.926856",
	"57.763930, 40.963142",
	"57.7521388, 40.949144",
	"57.762371, 40.952407",
	"57.762346, 40.953012",
	"57.763118, 40.967871",
	"57.756968, 40.939743",
	"57.765652, 40.926815",
	"57.746002, 40.987304",
	"57.743712, 41.012697",
	"36.799920, 10.181012",
	// end
	"55.748222, 37.537172",
	"59.939628, 30.313354",
	"-43.532013, 172.675008",
	"30.617640, 114.261709"
);
$rand_adresses = count($addresses);

$theme = $_GET['theme'];

if (isset($_GET['start_singl'])) {
	
	if ($_GET['g-recaptcha-response'] == "") {
		header("Location: /?error=recapcha");
	}
	
// STAT FILES
$file_name = $_COOKIE['id_usr'];
$time = time();
$insetrt_to_stat = mysqli_query($connect, "INSERT INTO `statistics_of_files` (`file_name`, `time`) VALUES ('$file_name', '$time')");
unset($file_name);
unset($time);

//===========

	$many_stocks = $_GET['many_stocks'];
	if ($_GET['name_table'] == '') {
		$name_table = $_GET['theme'];
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
	$file_id = $path . $file_id;
	$file_id .= ".sql";

// [=====================================]

	$fp = fopen($file_id, 'w');
	fwrite($fp, $sql);
	fclose($fp);
	$fp = fopen($file_id, 'a');


//  [====================================]
	if ($_GET['theme'] == 'users') {		

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

		for ($i=0; $i <= $many_stocks; $i++) { 
			$first_name = rand(0, 21900);
			$middle_name = rand(0, 4000);
			$data_email = random_str(10);
			$email_rand = rand(0, $rand_emails);
			$data_adress = rand(0, $rand_adresses);


			$email = $data_email . $emails[$email_rand];
			$name = $data_names[$first_name] . ' ' . $data_midle[$middle_name];
			$password = random_str(15);
			$adress = $addresses[$data_adress]; 

			$sql = "
INSERT INTO `$name_table` (`id`, `name`, `email`, `password`, `adres`) VALUES
('$i', '$name', '$email', '$password', '$adress');



			";
			fwrite($fp, $sql);

			//echo $data_names[$first_name] . ' ' . $data_midle[$middle_name];
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

	}elseif($_GET['theme'] == 'articles'){
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

		for ($i=0; $i <= $many_stocks ; $i++) { 
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
	}else{
		$errors = array();
		$email = htmlspecialchars($_POST['email']);
		$text = $_POST['feed_back'];
		$text = htmlspecialchars($text);
		$text = str_replace("'", "^", $text);
		$lang = $_SESSION['http_lang'];
		$request = mysqli_query($connect, "INSERT INTO `$feedback_db` (`email`, `text`, `lang`) VALUES ('$email','$text', '$lang')");

		if (!$request) {
			$errors[] = 'Something went wrong. Try again later.';
			header("Location: /?ef=0x00001fx");
		}else{
			unset($_POST);
			if ($_SESSION['http_lang'] == 'english') {
				include 'temp/language/en/temp/thx_feedback.php';
			}elseif($_SESSION['http_lang'] == 'russian'){
				include 'temp/language/ru/temp/thx_feedback.php';
			}else{
				include 'temp/language/en/temp/thx_feedback.php';
			}
			
		}
	}
}
// if (isset($_POST['dofeed'])) {
// 	if (empty($_POST['email'])) {
// 		header("Location: /");
// 	}elseif (empty($_POST['feed_back'])) {
// 		header("Location: /");
// 	}else{
// 		$errors = array();
// 		$email = strip_tags($_POST['email']);
// 		$text = strip_tags($_POST['feed_back']);

// 		$lang = $_SESSION['http_lang'];
// 		$user_id = $_COOKIE['id_usr'];

// 		$fp = fopen($database_json, 'a');

// 		$array_json = array(
// 			"$user_id" => array(
// 				'email' => "$email",
// 				'text' => "$text",
// 				'language' => "$lang"
// 			)
// 		);

// 		$json = json_encode($array_json);
// 		fwrite($fp, $json);
// 		fclose($fp);
// 		if ($_SESSION['http_lang'] == 'english') {
// 				include 'temp/language/en/temp/thx_feedback.php';
// 			}elseif($_SESSION['http_lang'] == 'russian'){
// 				include 'temp/language/ru/temp/thx_feedback.php';
// 			}else{
// 				include 'temp/language/en/temp/thx_feedback.php';
// 			}	
// 	}
// }
