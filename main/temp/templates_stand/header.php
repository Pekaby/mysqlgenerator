<?
 require 'engine/users/authorisation/connect.php';
if (isset($_COOKIE['UNID']) && isset($_COOKIE['SSID']) && isset($_COOKIE['hash_e'])){
  $stmt = $connect->prepare("SELECT `img`, `email_vac` FROM `users` WHERE `un_id` = :unid AND `ssid` = :ssid AND `password` = :pswd");
  $stmt->bindParam(':unid', $_COOKIE['UNID']);
  $stmt->bindParam(':ssid', $_COOKIE['SSID']);
  $stmt->bindParam(':pswd', $_COOKIE['pswd']);
  $stmt->execute();
  $dcs = $stmt->fetch();
  if ($dcs['email_vac'] == true) {
    $_SESSION['em_vac'] = true;
  }

}

$page1 = $_SERVER['REQUEST_URI'];
$page1 = explode("?", $page1);
function tmpheader($link='', $title = "MySQL Generator")
{
  global $dcs;?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?=$title?></title>
  <link rel="stylesheet" href="css/tmp.css">
  <style type="text/css"><?php 
  include("temp/templates_stand/css/tmp.css"); 
  if (!include("engine/users/src/css/$link")) {
    include "temp/css/$link";
  };
  

  ?></style>

  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"></link>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
  <header class="header">
    <div class="cont">
      <div class="logo_dv">
        <a href="/" class="logo">MySQL Generator</a>
      </div>
    <? if (isset($_COOKIE['UNID']) && isset($_COOKIE['SSID']) && isset($_COOKIE['pswd'])) {
      if ($_SERVER['REQUEST_URI'] == '/account' || $_SERVER['REQUEST_URI'] == '/account/settings') {?>
<nav class="menu" style="padding-top: 20px">
  <a href="/account?event=leave" class="nav_link">Log out </a>
</nav>
      <?}else{?>
<nav class="menu">
  <a href="/account"><img src="/engine/users/user_data/images/<?=$dcs['img']?>" alt="profile" class="avatar_header"></a>
</nav>
      <?}
    }else{?>
<nav class="menu" style="padding-top: 20px">
  <a href="/login" class="nav_link">Login or Sign up</a>
</nav>
    <?}?>

    </div>
  </header>
  <?
  if (isset($_COOKIE['UNID']) && isset($_COOKIE['SSID']) && isset($_COOKIE['pswd'])) {?>
    <?php if ($_SESSION['em_vac'] == false && $page1[0] != '/constructor'){ ?>
  <div class="email_vac">
    <div class="vc_wrapper">
      <h1 class="h1_ev">Confirm your Email</h1>
      <h2 class="h2_ev">Check your inbox for message with magic link</h2>
    </div>
</div>
  <?php } ?>
  <?}?>
  <?
  if ($_SESSION['confirmed_em'] == true) {?>
  <div class="email_vac">
    <div class="vc_wrapper">
      <h1 class="h1_ev">Thank you</h1>
      <h2 class="h2_ev">Your email was confirmed</h2>
    </div>
</div>
    

    <?
$_SESSION['confirmed_em'] = false;
  }?>





<? }  ?>
