<? 
$ip = $_SERVER['REMOTE_ADDR'];

if (isset($_POST['login'])) {
  $errors = array();
  if (empty($_POST['email'])) {
    $errors[] = 'Enter the email';
  }elseif(empty($_POST['password'])){
    $errors[] = 'Enter the password';
  }
  if (empty($errors)) {
    $email =& $_POST['email'];
    $password = sha1($_POST['password']);
    $request = mysqli_query($connect, "SELECT * FROM `admins` WHERE `email` = ('$email') AND `password` = ('$password')");
    $count = mysqli_num_rows($request);
    if ($count > 0){
      if (empty($errors)) {
        $dec = mysqli_fetch_assoc($request);
        if ($ip != $dec['ip_last']) {
          $hash_adm_id = $dec['ip_last'];
          header("Location: /confirm?id=$hash_adm_id");
        }
        $ssid = random_str(150);
        $id = $dec['id'];
        $hash_email = $dec['hash_email'];
        $email = $dec['email'];
        $name = $dec['name'];
        $adm_id = $dec['adm_id'];
        $usr_id = $dec['usr_id'];
        $key_adm = $dec['key_adm'];
        $code = random_str(5);
        mysqli_query($connect, "UPDATE `admins` SET `ssid` = ('$ssid') WHERE `admins`.`id` = $id");
        mysqli_query($connect, "UPDATE `admins` SET `code` = ('$code') WHERE `admins`.`id` = $id");
        mail($email, "Confirm your login", "<b>Hello, {$name}!</b><br><br>Your verification code: <br><b>$code</b>");
        if ($_POST['remember'] =='on') {
          setcookie("key", $hash_email, time()+9999);
          setcookie("_USRID", $usr_id, time()+9999);
          setcookie("adm_id", $adm_id, time()+9999);
          header("Location: /confirm?id=$key_adm");
        }else{
          setcookie("key", $hash_email);
          setcookie("_USRID", $usr_id);
          setcookie("adm_id", $adm_id);
          header("Location: /confirm?id=$key_adm");
        }
        
      }
    }else{
      $errors[] = 'account do not found!';
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Download | <?=$name_site?></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<!--  <style>
    body{
      background: #333;
      color: #fff;
    }
  </style> -->
  <script
  src="https://code.jquery.com/jquery-1.12.4.js"
  integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
  crossorigin="anonymous"></script>
</head>
<body>
<header>
  <div class="bg-dark collapse" id="navbarHeader" style="">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">About</h4>
          <p class="text-muted"><?=$text_muted?></p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Contact</h4>
          <ul class="list-unstyled">
            <li><a href="mailto:<?=$email?>" class="text-white">Email me</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container d-flex justify-content-between">
      <a href="/" class="navbar-brand d-flex align-items-center">
        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="mr-2" viewBox="0 0 24 24" focusable="false"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg> -->
        <strong><?=$name_site?></strong>
      </a>
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>
<main role="main" class="container">
  <h2>Welcome to admin panel!</h2>
	<form action="/admin" method="POST">
		<label for="">Email:</label><br>
    <input type="email" name="email"><br><br>
    <label for="">Password</label><br>
    <input type="password" name="password"><br><br>
    <input type="submit" value="Login" name="login"> <input type="checkbox" name="remember"> remember me   
	</form>
  <? if (!empty($errors)){
    echo "<div class=\"error\">".array_shift($errors)."</div>";
  }

  ?>
</main>
<br><br><br><br><br>  
<footer>
  <div class="container">
      <p><?=$warning?></p>
    <hr id="featurette-divider"> 
    <p>© <?=$name_site?></p>
    <p>Pekaby.</p>
  </div>
</footer>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>