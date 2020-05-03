<?
if (isset($_GET['start'])) {
	$input_email = $_GET['email'];
	$input_id = $_GET['st_id_adm'];
	$input_key = $_GET['key'];
}elseif(isset($_POST['st_btn'])){

	$email = $_POST['email'];
	$id = $_POST['id'];
	$key = $_COOKIE['key'];
	$request = mysqli_query($connect, "SELECT `code` FROM `admins` WHERE `hash_email` = ('$key') AND `id` = ('$id')");
	$d = mysqli_fetch_assoc($request);

	if ($_POST['code'] == $d['code']) {
		$q = mysqli_query($connect, "UPDATE `admins` SET `email` = ('$email') WHERE `admins`.`id` = '$id'");
		$email = sha1($email);
		mysqli_query($connect, "UPDATE `admins` SET `hash_email` = ('$email') WHERE `admins`.`id` = '$id'");
		setcookie("key", $email, time()+9999);
		header("Location: /admin");
	}

}else{
	header("Location: /admin");
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
	
	<h1>Hey, <?=$_SESSION['name']?>!</h1>

	<span>Almost everything is ready!</span><br>
	<span>In order to verify that your Email, we sent a one-time code to your email</span><br>
	<span>please enter the code below</span>
	<br><br>
	<form action="/settings" method="POST">
<input type="hidden" name="email" value="<?=$input_email?>">
<input type="hidden" name="id" value="<?=$input_id?>">
<input type="hidden" name="key" value="<?=$input_key?>">
<label for="">Code:</label><br>
<input type="text" name="code"><br><br>
<button name="st_btn">Enter</button>
</form>
	<br><br><br>
</main>
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