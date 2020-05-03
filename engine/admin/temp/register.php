<?
if (isset($_GET['inv_code'])) {
	$code = $_GET['inv_code'];
	$req = mysqli_query($connect, "SELECT * FROM `inv` WHERE `inv_code` = ('$code')");
	$count = mysqli_num_rows($req);
	if ($count > 0) {
		$dec = mysqli_fetch_assoc($req);
		$adm_inv = $dec['adm_inv_id'];
		$inv_code = $_GET['inv_code'];
		$usr_id = random_str(100);

	}else{
		header("Location: /");
	}
}elseif(isset($_POST['reg'])){
	$email = $_POST['email'];
	$usr_id = $_POST['usrid'];
	$sha_email = sha1($email);
	$password = $_POST['password'];
	$password = sha1($password);
	$name = $_POST['name'];
	$adm_id = random_str(50);
	$inv_code = $_POST['inv_code'];
	$key_adm = sha1($adm_id);
	$check1 = mysqli_query($connect, "SELECT * FROM `inv` WHERE `inv_code` = ('$inv_code') ");
	if (!$check1) {
		header("Location: /");
	}
	unset($check);
	$check = mysqli_query($connect, "SELECT `id` FROM `admins` WHERE `usr_id` = ('$usr_id')");
	$count = mysqli_num_rows($check);
	if($count > 0){
		$usr_id = random_str(100);
	}

	$dec = mysqli_fetch_assoc($check1);
	$adm_lvl =& $dec['lvl'];
	$ssid = random_str(150);
	$adm_id_invited = $_POST['adm_inv'];
	unset($errors);
	$errors = array();
	if ($_POST['password'] != $_POST['password1']) {
		$errord[] = 'password do not match';
	}
	if (empty($errors)) {
		$request = mysqli_query($connect, "INSERT INTO `admins` (`email`, `hash_email`, `adm_id`, `key_adm`, `adm_lvl`, `ssid`, `ip_last`, `ip_reg`, `password`, `usr_id`, `name`, `code`, `adm_id_invited`) VALUES ('$email', '$sha_email', '$adm_id', '$key_adm', '$adm_lvl', '$ssid', '$ip', '$ip', '$password', '$usr_id', '$name', 'null','$adm_id_invited')");
		setcookie("_SSID", $ssid);
		setcookie("_USRID", $usr_id, time()+9999);
		setcookie("adm_id", $adm_id, time()+9999);
		setcookie("key", $sha_email, time()+9999);
		mysqli_query($connect, "DELETE FROM `inv` WHERE `inv`.`inv_code` = '$inv_code'");
	}
}else{
	header("location: /");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$name_site?></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<!-- 	<style>
		body{
			background: #333;
			color: #fff;
		}
	</style> -->
	<script
  src="https://code.jquery.com/jquery-1.12.4.js"
  integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
  crossorigin="anonymous"></script>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
	<h2 style="padding-top: 10px;">Welcome!</h2><br>
	<div class="block"></div>
	<form action="/register" method="POST">
		<input type="hidden" name="adm_inv" value="<?=$adm_inv?>">
		<input type="hidden" name="usrid" value="<?=$usr_id?>">
		<input type="hidden" name="inv_code" value="<?=$inv_code?>">
		<label for="">Name:</label><br>
		<input type="text" name="name" id=""><br><br>
		<label for="">Email:</label><br>
		<input type="email" name="email"><br><br>
		<label for="">Password:</label><br>
		<input type="password" name="password"><br><br>
		<label for="">Repeat password</label><br>
		<input type="password" name="password1"><br><br>
		<button name="reg">Register</button>
	</form>
</main>
<br><br>
<footer>
	<div class="container">
		<p><?=$warning?></p>
		<hr id="featurette-divider"> 
    <p class="float-right">
      <a href="#">Back to top</a>
    </p>
    <p>© <?=$name_site?></p>
    <p>Pekaby.</p>
  </div>
</footer>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>