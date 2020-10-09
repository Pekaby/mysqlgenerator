<?
//GJeP2FI!UE1dE3PG
require 'engine/settings.php';
require_once 'src/autoload.php';
require 'engine/arrays_db.php';

$connect = mysqli_connect($host, $user, $password, $database);

if (!$connect) {
    exit('Database does not working!');
}
function random_str_old($value=30){
    return substr(str_shuffle('0123456789abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, $value);
}

$page = $_SERVER['REQUEST_URI'];
$page = explode("?", $page);
$ip = $_SERVER['REMOTE_ADDR'];
//set lang of user

$http_lang = substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2);


if (!isset($_COOKIE['id_usr'])) {
    $usr_id = random_str_old(150);
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
        case 'es':
            $_SESSION['http_lang'] = 'spanish';
            break;
        case 'ja':
            $_SESSION['http_lang'] = 'japanese';
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
    }elseif($_GET['lang'] == 'es'){
        $_SESSION['http_lang'] = 'spanish';
    }elseif($_GET['lang'] == 'ja'){
        $_SESSION['http_lang'] = 'japanese';
    }
}

//==========================

// STATISTIC
$request = mysqli_query($connect, "SELECT `id` FROM `statistic_of_usr` WHERE `ip` = ('$ip')");
$count = mysqli_num_rows($request);
unset($request);
if ($count == 0) {
    if ($_GET['from'] == 'vk') {
        $from = 'vk';
    }elseif($_GET['from'] == 'ds'){
        $from = 'ds';
    }elseif($_GET['from'] == 'fb'){
        $from = 'fb';
    }elseif($_GET['from'] == 'tg'){
        $form = 'tg';
    }else{
        $from = 'null';
    }
    $request = mysqli_query($connect, "INSERT INTO `statistic_of_usr` (`ip`,`lang`, `_from`) VALUES ('$ip', '$http_lang', '$from')");
}
unset($count);

$e_conf = explode("/", $_SERVER['REQUEST_URI']);

if ($e_conf[1] == 'confirm') {
    require 'engine/users/authorisation/connect.php';
    $email_vac = $e_conf['2'];
    $stmt = $connect->prepare("UPDATE `users` SET `email_vac` = true WHERE `email_key` = :key");
    $stmt->bindParam(':key', $email_vac);
    $stmt->execute();
    $_SESSION['em_vac'] = true;
    $_SESSION['confirmed_em'] = true;
    header("Location: /account");
}elseif($e_conf[1] == 'forgot'){
    require 'engine/users/authorisation/connect.php';
    unset($_GET);
    $_SESSION['recover_session'] = true;
    if (isset($e_conf[2])) {
        $recover_SSID = $_COOKIE['pswd_recover'];
        $email_key = $e_conf[2];
        $stmt = $connect->prepare("SELECT * FROM `users` WHERE `email_key` = :email_key");
        $stmt->bindParam(':email_key', $email_key);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count > 0) {
            $dds = $stmt->fetch();
            if ($dds['recover_session'] != $recover_SSID) {
                die("Invalid Session. <a href=\"/\">Main page</a>.");
            }else{
                $_SESSION['recover_session'] = false;
                include 'engine/users/forgot.php';
            }
        }else{
            header("Location: /login");
        }
    }else{
        include 'engine/users/forgot.php';
    }
    exit();
}

if ($page[0] == '/') {

    if ($_SESSION['http_lang'] == 'english') {
        include 'temp/language/en/temp/constructor.php';    
    }elseif($_SESSION['http_lang'] == 'russian'){
        include 'temp/language/ru/temp/constructor.php';
    }elseif($_SESSION['http_lang'] == 'spanish'){
        include 'temp/language/es/temp/constructor.php';
    }elseif($_SESSION['http_lang'] == 'japanese'){
        include 'temp/language/ja/constructor.php';
    }
}elseif ($page[0] == '/constructor') {
    $_SESSION['em_vac'] = true;
    if ($_SESSION['http_lang'] == 'english') {
        include 'temp/language/en/temp/wait_for_download.php';  
    }elseif($_SESSION['http_lang'] == 'russian'){
        include 'temp/language/ru/temp/wait_for_download.php';
    }elseif($_SESSION['http_lang'] == 'spanish'){
        include 'temp/language/es/temp/wait_for_download.php';
    }elseif($_SESSION['http_lang'] == 'japanese'){
        include 'temp/language/ja/wait_for_download.php';
    }

}elseif($page[0] == '/generation'){
    include 'engine/server.php';
}
elseif($page[0] == '/download'){
    $file = $path . $_COOKIE['id_usr'] . '.sql';
    if ($_GET['id_download'] == $_COOKIE['id_usr']) {
    if ($_SESSION['http_lang'] == 'english') {
        include 'temp/language/en/temp/download.php';  
    }elseif($_SESSION['http_lang'] == 'russian'){
        include 'temp/language/ru/temp/download.php';
    }elseif($_SESSION['http_lang'] == 'spanish'){
        include 'temp/language/es/temp/download.php';
    }elseif($_SESSION['http_lang'] == 'japanese'){
        include 'temp/language/ja/download.php';
    }
    }else{
        header("Location: /");
    }
}elseif ($page[0] == '/feedback') {
    include 'engine/server.php';
}elseif($page[0] == '/changelog'){
    include 'temp/language/en/temp/changelog.php';
}elseif($page[0] == '/privacy-policy'){
    if ($_SESSION['http_lang'] == 'english') {
        include 'temp/language/en/temp/privacy-policy.php';  
    }elseif($_SESSION['http_lang'] == 'russian'){
        include 'temp/language/ru/temp/privacy-policy.php';
    }elseif($_SESSION['http_lang'] == 'spanish'){
        include 'temp/language/es/temp/privacy-policy.php';
    }elseif($_SESSION['http_lang'] == 'japanese'){
        include 'temp/language/ja/privacy-policy.php';
    }
}elseif ($page[0] == '/login') {
    include 'engine/users/index.php';
}elseif($page[0] == '/account'){
    include 'engine/users/profile.php';
}elseif($page[0] == '/direct'){
    include 'engine/users/server/direct.php';
}elseif($page[0] == '/account/settings'){
    include 'engine/users/settings.php';
//elseif($page[0] == '/forgot'){
//     include 'engine/users/forgot.php';
}elseif($page[0] == '/develop'){
    include 'engine/users/server/generating.php';
}elseif($page[0] == '/tousr'){
    include 'tousr.php';
}elseif($page[0] == '/support'){
    // header("Location: http://support.mysqlgenerator.pw");
    include 'engine/support/index.php';
}
else{
    if ($_SESSION['http_lang'] == 'english') {
        include 'temp/language/en/temp/404.php';    
    }elseif($_SESSION['http_lang'] == 'russian'){
        include 'temp/language/ru/temp/404.php';
    }elseif($_SESSION['http_lang'] == 'spanish'){
        include 'temp/language/es/temp/404.php';
    }elseif($_SESSION['http_lang'] == 'japanese'){
        include 'temp/language/ja/404.php';
    }
}

