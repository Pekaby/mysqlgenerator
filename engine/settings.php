<?
$default_site_name = 'SQL Generator';
$url = 'http://qq';
$path = 'todow/';
//database
$host = '127.0.0.1';
$user = 'root';
$password = '';
$database = 'qq';
$feedback_db = 'feed_back';
$message_db = 'messages';

$database_json = '_db_github/feedback.json';
//feedback
$email = "worked_by_pekaby@outlook.com";
$email_conf_settings = "worked_by_pekaby@outlook.com";


$connect = mysqli_connect($host, $user, $password, $database);

if (!$connect) {
	exit('Database does not working!');
}
function random_str($value=30){
	return substr(str_shuffle('0123456789abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, $value);
}