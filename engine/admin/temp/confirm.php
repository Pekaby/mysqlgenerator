<?
if (isset($_GET['id'])) {
	$id_conf = $_GET['id'];
	$req = mysqli_query($connect, "SELECT * FROM `admins` WHERE `key_adm` = ('$id_conf')");
	$count = mysqli_num_rows($req);
	$dec = mysqli_fetch_assoc($req);
	$_SESSION['name'] = $dec['name'];
	unset($req);
	if ($count > 0) {

	}else{
		if ( isset($_COOKIE['_USRID']) OR isset($_COOKIE['adm_id']) OR isset($_COOKIE['key']) ) {
			unset($_COOKIE);
			setcookie("_USRID", "0", time()-9999);
			setcookie("adm_id", "0", time()-9999);
			setcookie("key", "0", time()-9999);
			setcookie("_SSID", "0", time()-9999);
		}
		header("Location: /admin");
	}
}elseif(isset($_POST['conf'])){
	
	unset($errors);
	$errors = array();
	if ($_POST['code'] == '') {
		$errors[] = 'Code is empty!';
	}
	if ($_POST['id'] == '') {
		$errors[] = 'Unable to determine id';
	}
	if (empty($errors)) {
		$code = $_POST['code'];
		$id = $_POST['id'];
		$find = mysqli_query($connect, "SELECT `ssid` FROM `admins` WHERE `code` = ('$code') AND `key_adm` = ('$id')");
		$decrypt = mysqli_fetch_assoc($find);
		if (!$find) {
			$errors[] = 'Code is wrong';
		}else{
			mysqli_query($connect, "UPDATE `admins` SET `ip_last` = ('$ip') WHERE `admins`.`key_adm` = $id");
			$ssid = $decrypt['ssid'];
			setcookie("_SSID", $ssid);
			unset($find);
			unset($id);
			unset($code);
			unset($decrypt);
			header("Location: /admin");
		}

	}
}elseif(isset($_COOKIE['_SSID'])){
	if ( isset($_COOKIE['_USRID']) AND isset($_COOKIE['adm_id']) AND isset($_COOKIE['key'])) {
		# code...
	
		$usrid = $_COOKIE['_USRID'];
		$adm_id = $_COOKIE['adm_id'];
		$key = $_COOKIE['key'];

		$request = mysqli_query($connect, "SELECT * FROM `admins` WHERE `hash_email` = ('$key') AND `adm_id` = ('$adm_id') AND `usr_id` = ('$usrid')");
		$count = mysqli_num_rows($request);
		$decode =  mysqli_fetch_assoc($request);
		unset($request);
		if ($count > 0) {
			unset($count);
			$id = $decode['id'];
			if ($ip != $decode['ip_last']) {
				mysqli_query($connect, "UPDATE `admins` SET `last_ip`=('$ip') WHERE `admins`.`id`='$id'");
			}
			header("Location: /admin");
		}else{
			unset($_COOKIE);
			unset($count);
			setcookie("_USRID", '0', time()-9999);
			setcookie("adm_id", "0", time()-9999);
			setcookie("key", "0", time()-9999);
			setcookie("_SSID", "0", time()-9999);
		}

	}else{
		header("Location: /");
		setcookie("_SSID", "0", time()-9999);
	}
}else{
	if ( isset($_COOKIE['_USRID']) AND isset($_COOKIE['adm_id']) AND isset($_COOKIE['key'])) {
		setcookie("_USRID", '0', time()-9999);
		setcookie("adm_id", "0", time()-9999);
		setcookie("key", "0", time()-9999);
	}
	header("Location: /");
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
	
	<h1>Welcome, <?=$_SESSION['name']?>!</h1>

	<span>Almost everything is ready!</span><br>
	<span>In order to verify that it’s you, we sent a one-time code to your email</span><br>
	<span>please enter the code below</span>
	<br><br>
	<form action="/confirm" method="POST">
		<label for="">Enter the code:</label><br>
		<input type="text" name="code">
		<input type="hidden" name="id" value="<?=$id_conf?>">
		<br><br>
		<input type="submit" name="conf" value="confirm"><br>
		<?
		if (!empty($errors)) {
			echo "<div class =\"error\">".array_shift($errors)."</div>";
		}
		?>
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