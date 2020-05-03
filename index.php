<?
require 'engine/settings.php';
require_once 'src/autoload.php';

$page = $_SERVER['REQUEST_URI'];
$page = explode("?", $page);
$ip = $_SERVER['REMOTE_ADDR'];
//set lang of user

$http_lang = substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2);


if (!isset($_COOKIE['id_usr'])) {
	$usr_id = random_str(150);
	setcookie("id_usr", $usr_id, time()+9999);
}


session_start();
if (empty($_SESSION['http_lang'])) {
	switch ($http_lang) {
		case 'en':
			$_SESSION['http_lang'] = 'english';
			break;
		case 'ru':
			$_SESSION['http_lang'] = 'russian';
			break;
		default:
			$_SESSION['http_lang'] = 'english';
			break;
	}
}

// LANG SWITCHER 

if (isset($_GET['lang'])) {
	if ($_GET['lang'] == 'en') {
		$_SESSION['http_lang'] = 'english';
	}elseif($_GET['lang'] == 'ru'){
		$_SESSION['http_lang'] = 'russian';
	}
}

//==========================

// STATISTIC
$request = mysqli_query($connect, "SELECT `id` FROM `statistic_of_usr` WHERE `ip` = ('$ip')");
$count = mysqli_num_rows($request);
unset($request);
if ($count == 0) {
	$request = mysqli_query($connect, "INSERT INTO `statistic_of_usr` (`ip`,`lang`) VALUES ('$ip', '$http_lang')");
}
unset($count);
//===========================
if (isset($_COOKIE['_USRID']) AND isset($_COOKIE['adm_id']) AND isset($_COOKIE['key'])) {
	require 'temp/language/en/config.php';
}else{
	if ($_SESSION['http_lang'] == 'english') {
		require 'temp/language/en/config.php';
	}elseif($_SESSION['http_lang'] == 'russian'){
		require 'temp/language/ru/config.php';
	}else{
		require 'temp/language/en/config.php';
	}
}


if ($page[0] == '/') {
	if ($_SESSION['http_lang'] == 'english') {
		include 'temp/language/en/temp/constructor.php';	
	}elseif($_SESSION['http_lang'] == 'russian'){
		include 'temp/language/ru/temp/constructor.php';
	}
}elseif ($page[0] == '/constructor') {
	// include 'engine/server.php';
		if ($_SESSION['http_lang'] == 'english') {
		include 'temp/language/en/temp/wait_download.php';	
	}elseif($_SESSION['http_lang'] == 'russian'){
		include 'temp/language/ru/temp/wait_download.php';
	}

}elseif($page[0] == '/generation'){
	include 'engine/server.php';
}
elseif($page[0] == '/download'){
	$file = $path . $_COOKIE['id_usr'] . '.sql';
	if ($_GET['id_download'] == $_COOKIE['id_usr']) {
		include 'temp/download.php';
	}else{
		header("Location: /");
	}
}elseif ($page[0] == '/feedback') {
	include 'engine/server.php';
}elseif($page[0] == '/develop'){
	//var_dump($_SERVER);
	phpinfo();

}elseif ($page[0] == '/admin') {
	if ( isset($_COOKIE['_USRID']) AND isset($_COOKIE['adm_id']) AND isset($_COOKIE['key']) ) {
		
		$usrid = $_COOKIE['_USRID'];
		$adm_id = $_COOKIE['adm_id'];
		$key = $_COOKIE['key'];

		$request = mysqli_query($connect, "SELECT * FROM `admins` WHERE `hash_email` = ('$key') AND `adm_id` = ('$adm_id') AND `usr_id` = ('$usrid')");
		$count = mysqli_num_rows($request);
		$dec = mysqli_fetch_assoc($request);
		$key_adm = $dec['key_adm'];
		$id_ip = $dec['id'];
		$email = $dec['email'];
		$code_accept = random_str(5);
		unset($request);
		if ($count > 0) {
			$id_conf = $dec['key_adm'];
			if (isset($_COOKIE['_SSID'])) {
				if ($dec['ssid'] == $_COOKIE['_SSID']) {
					if ($ip == $dec['ip_last']) {
						include 'engine/admin/temp/admin.php';
					}else{
						mysqli_query($connect, "UPDATE `admins` SET `ip_last` = ('$ip') WHERE `admins`.`id` = '$id_ip'");
						mysqli_query($connect, "UPDATE `admins` SET `code` = ('$code_accept') WHERE `admins`.`id` = '$id_ip'");
						 mail($email, "Verification code", "Hello, {$name}!<br><br>Your verification code: <br><b>$code_accept</b>");
						header("location: /confirm?id=$key_adm");
					}
					
				}else{
					mysqli_query($connect, "UPDATE `admins` SET `code` = ('$code_accept') WHERE `admins`.`id` = '$id_ip'");
					mysqli_query($connect, "UPDATE `admins` SET `ip_last` = ('$ip') WHERE `admins`.`id` = '$id_ip'");
					mail($email, "Verification code", "Hello, {$name}!<br><br>Your verification code: <br><b>$code_accept</b>");
					header("location: /confirm?id=$key_adm");
				}
			}else{
				mysqli_query($connect, "UPDATE `admins` SET `code` = ('$code_accept') WHERE `admins`.`id` = '$id_ip'");
				mysqli_query($connect, "UPDATE `admins` SET `ip_last` = ('$ip') WHERE `admins`.`id` = '$id_ip'");
				mail($email, "Verification code", "Hello, {$name}!<br><br>Your verification code: <br><b>$code_accept</b>");
				header("location: /confirm?id=$key_adm");
			}
		}else{
			unset($_COOKIE);
			setcookie("_USRID", "0", time()-9999);
			setcookie("adm_id", "0", time()-9999);
			setcookie("key", "0", time()-9999);
			setcookie("_SSID", "0", time()-9999);
			header("Location: /admin");
		}
	}else{
		include 'engine/admin/temp/login.php';
	}
	
}elseif($page[0] == '/confirm'){
	include 'engine/admin/temp/confirm.php';
}elseif($page[0] == '/register'){
	include 'engine/admin/temp/register.php';
}elseif($page[0] == '/message'){
	if (isset($_COOKIE['_SSID']) AND isset($_COOKIE['_USRID'])) {
		include 'engine/admin/temp/message.php';
	}else{
		if ($_SESSION['http_lang'] == 'english') {
		include 'temp/language/en/temp/404.php';	
	}elseif($_SESSION['http_lang'] == 'russian'){
		include 'temp/language/ru/temp/404.php';
	}
	}
	
}elseif($page[0] == '/settings'){
	if ( isset($_COOKIE['_USRID']) AND isset($_COOKIE['adm_id']) AND isset($_COOKIE['key']) ) {
		
		$usrid = $_COOKIE['_USRID'];
		$adm_id = $_COOKIE['adm_id'];
		$key = $_COOKIE['key'];

		$request = mysqli_query($connect, "SELECT * FROM `admins` WHERE `hash_email` = ('$key') AND `adm_id` = ('$adm_id') AND `usr_id` = ('$usrid')");
		$count = mysqli_num_rows($request);
		if ($count > 0) {
			include 'engine/admin/temp/em_change.php';
		}else{
			unset($_COOKIE);
			setcookie("_SSID", "0", time()-9999);
			setcookie("_USRID", "0", time()-9999);
			setcookie("adm_id", "0", time()-9999);
			setcookie("key", "0", time()-9999);
			header("Location: /");
		}
	
}
}
else{
	if ($_SESSION['http_lang'] == 'english') {
		include 'temp/language/en/temp/404.php';	
	}elseif($_SESSION['http_lang'] == 'russian'){
		include 'temp/language/ru/temp/404.php';
	}
}

