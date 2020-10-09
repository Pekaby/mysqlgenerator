<?
require 'connect.php';
require '../../modules/system.php';
$system = new system;
if(isset($_POST['signup_start'])){
    $password   = $_POST['password'];
    $email      = htmlspecialchars($_POST['email']);

    $ssid       = $system->random_str(150);
    $hash_email = md5($email);
    $password   = md5($password);

    $stmt = $connect->prepare("SELECT `id` FROM `users` WHERE `email` = :email AND `hash_email` = :hash_email");

    $stmt->bindParam(':email', $param_email);
    $stmt->bindParam(':hash_email', $param_hashemail);

    $param_email     = $email;
    $param_hashemail = $hash_email;

    $stmt->execute();

    $count = $stmt->rowCount();
    if ($count>0) {

        echo "This email already registered";
        exit();

    }
    $stmt = $connect->prepare("INSERT INTO `users` (`email`,`hash_email`,`password`, `ssid`, `join_date`, `ip_reg`) VALUES (:email , :hash_email , :password , :ssid , :join_date , :ip_reg)");

    $stmt->bindParam(':email', $param_email);
    $stmt->bindParam(':hash_email', $param_hashemail);
    $stmt->bindParam(':password', $param_password);
    $stmt->bindParam(':ssid', $param_ssid);
    $stmt->bindParam(':join_date', $param_joindate);
    $stmt->bindParam(':ip_reg', $ip_reg);

    $param_email     = $email;
    $param_hashemail = $hash_email;
    $param_password  = $password;
    $param_ssid      = $ssid;
    $param_joindate  = time();
    $ip_reg          = $_SERVER['REMOTE_ADDR'];

    $stmt->execute();

    $stmt = $connect->prepare("SELECT `id` FROM `users` WHERE `email` = :email AND `hash_email` = :hash_email AND `password` = :password");

    $stmt->bindParam(':email', $param_email);
    $stmt->bindParam(':hash_email', $param_hashemail);
    $stmt->bindParam(':password', $param_password);

    $param_email     = $email;
    $param_hashemail = $hash_email;
    $param_password  = $password;

    $stmt->execute();
    $count = $stmt->rowCount();
    if ($count <= 0) {
        echo "Something went wrong. Try again later";
        exit();
    }
    $ds = $stmt->fetch();

    $un_id = md5($ds['id']);
    $id    = $ds['id'];
    $stmt  = $connect->query("UPDATE `users` SET `un_id` = ('$un_id') WHERE `id` = ('$id')");

    $email_key = $hash_email . $system->random_str(15);
    $stmt = $connect->query("UPDATE `users` SET `email_key` = ('$email_key') WHERE `id` = ('$id')");

    mail($email, "Confirm your Email", "Thank you for registration on MySQL Generator!

To confirm your email please follow this lik:
https://mysqlgenerator.pw/confirm/{$email_key} 

© MySQL Gemerator", "From: no-reply@mysqlgenerator.pw");

    // setcookie("UNID",   $un_id,        time()+60*60*24*365*10, '/', '.', true);
    // setcookie("SSID",   $ds['ssid'],         time()+60*60*24*365*10, '/', '.', true);
    // setcookie("hash_e", $ds['hash_email'],   time()+60*60*24*365*10, '/', '.', true);
    // setcookie("pswd",   $ds['password'],     time()+60*60*24*365*10, '/', '.', true);

    setcookie("UNID",   $un_id,        time()+60*60*24*365*10, '/');
    setcookie("SSID",   $ssid,         time()+60*60*24*365*10, '/');
    setcookie("hash_e", $hash_email,   time()+60*60*24*365*10, '/');
    setcookie("pswd",   $password,     time()+60*60*24*365*10, '/');
    setcookie("is_registered", "1",    time()+60*60*24*365*10, '/');
    $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];


    echo "DONE";

}

if (isset($_POST['login_start'])) {
    $email      = htmlspecialchars($_POST['email']);
    $password   = md5($_POST['password']);
    $hash_email = md5($email);

    $stmt = $connect->prepare("SELECT * FROM `users` WHERE `email` = :email AND `hash_email` = :hash_email AND `password` = :password");

    $stmt->bindParam(':email', $param_email);
    $stmt->bindParam(':hash_email', $param_hashemail);
    $stmt->bindParam(':password', $param_password);

    $param_email           = $email;
    $param_hashemail       = $hash_email;
    $param_password        = $password;

    $stmt->execute();

    $count = $stmt->rowCount();
    if ($count > 0) {
        $ds = $stmt->fetch();

    // setcookie("UNID",   $ds['un_id'],        time()+60*60*24*365*10, '/', '.', true);
    // setcookie("SSID",   $ds['ssid'],         time()+60*60*24*365*10, '/', '.', true);
    // setcookie("hash_e", $ds['hash_email'],   time()+60*60*24*365*10, '/', '.', true);
    // setcookie("pswd",   $ds['password'],     time()+60*60*24*365*10, '/', '.', true);

    setcookie("UNID",   $ds['un_id'],        time()+60*60*24*365*10, '/');
    setcookie("SSID",   $ds['ssid'],         time()+60*60*24*365*10, '/');
    setcookie("hash_e", $ds['hash_email'],   time()+60*60*24*365*10, '/');
    setcookie("pswd",   $ds['password'],     time()+60*60*24*365*10, '/');

        $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];

        echo "DONE";
    }else{
        echo "Account do not found";
    }
}
