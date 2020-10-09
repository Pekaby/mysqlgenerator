<?
require 'connect.php';
require '../../modules/system.php';
$system = new system;

if (isset($_POST['send_em'])) {
    $email = htmlspecialchars($_POST['email']);
    $stmt = $connect->prepare("SELECT `email_key`, `name`, `email`, `un_id` FROM `users` WHERE `email` = :email AND `hash_email` = :hs_email");

    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':hs_email', md5($email));

    $stmt->execute();
    $count = $stmt->rowCount();
    if ($count > 0) {
        $decrypt = $stmt->fetch();
        $un_id = $decrypt['un_id'];
        $ip = $_SERVER['REMOTE_ADDR'];
        $email = $decrypt['email'];
        $name = $decrypt['name'];
        mail("$email", "Password Recovery Request | MySQL Generator", "Hello, {$name}!
 
IP: {$ip} 

To change your password, please follow this link:
https://mysqlgenerator.pw/forgot/{$decrypt['email_key']}
 
Notice: this link is available only for 2 hours!
 
If that was not you, just ignore this email.
 
© MySQL Generator", "From: no-reply@mysqlgenerator.pw");

$pswd_recover_session = $system->random_str(150);
setcookie("pswd_recover", "$pswd_recover_session", time()+60*60*2, '/');
$connect->query("UPDATE `users` SET `recover_session` = ('$pswd_recover_session') WHERE `un_id` = ('$un_id')");
echo "DONE";
exit();
    }else{
        echo "Account not found";
        exit();
    }
    
}
if (isset($_POST['recover'])) {
    $password = htmlspecialchars($_POST['password']);
    $password = md5($_POST['password']);

    $recover = $_COOKIE['pswd_recover'];

    $stmt = $connect->prepare("SELECT `hash_email`, `un_id`, `password`, `ssid` FROM `users` WHERE `recover_session` = :recover");
    $stmt->bindParam(':recover', $recover);
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($count >0) {
        $ds = $stmt->fetch();
        $unid = $ds['un_id'];
    }else{
        echo "Invalid Session. Please, try again";
        exit();
    }

    $stmt = $connect->prepare("UPDATE `users` SET `password` = :pswd WHERE `un_id` = :unid");

    $stmt->bindParam(':pswd', $password);
    $stmt->bindParam(':unid', $unid);
    $stmt->execute();

    $stmt = $connect->query("UPDATE `users` SET `recover_session` = NULL WHERE `un_id` = ('$unid')");

    setcookie("pswd_recover", "DELETED", time()-9999);
    $_SESSION['recover_session'] = false;
    setcookie("UNID",   $ds['un_id'],        time()+60*60*24*365*10, '/');
    setcookie("SSID",   $ds['ssid'],         time()+60*60*24*365*10, '/');
    setcookie("hash_e", $ds['hash_email'],   time()+60*60*24*365*10, '/');
    setcookie("pswd",   $ds['password'],     time()+60*60*24*365*10, '/');
    echo "DONE";

}