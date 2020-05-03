<?
//dc76e9f0c0006e8f919e0c515c66dbba3982f785
$adm_id = $_COOKIE['adm_id'];
$key = $_COOKIE['key'];
$usrid = $_COOKIE['_USRID'];
$ssid = $_COOKIE['_SSID'];

$request = mysqli_query($connect, "SELECT * FROM `admins` WHERE `adm_id` = ('$adm_id') AND `hash_email` = ('$key') AND `usr_id` = ('$usrid') AND `ssid` = ('$ssid')");
unset($decrypt);
$decrypt = mysqli_fetch_assoc($request);
$id_usr_adm = $decrypt['id']; 
$adm_lvl_msn_delete = $decrypt['adm_lvl'];
$settings_email = $decrypt['email'];
$settings_password = $decrypt['password'];
if (isset($_POST['inv_adm'])) {
	unset($errors);
	$errors = array();
	if (empty($_POST['email'])) {
		$errors[] = 'Please, enter email';
	}
	if (empty($errors)) {
		$email_inv = $_POST['email'];
		$adm_lvl_inv = $_POST['adm_lvl'];
		$inv_code = random_str(300);
		$sha_email = sha1($email_inv);
		$request = mysqli_query($connect, "INSERT INTO `inv` (`inv_code`,`adm_inv_id`,`lvl`, `sha_email`) VALUES ('$inv_code', '$adm_id', '$adm_lvl_inv', '$sha_email')");
		mail($email_inv, "Invite | {$default_site_name}", "<b>Hello!</b><br><br>You have invited to admin composition.<br>For registert, please <b>follow this link<b>: {$url}/register?inv_code=$inv_code<br><br>-{$default_site_name}");
	}
}
if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
	mysqli_query($connect, "DELETE FROM `$feedback_db` WHERE `$feedback_db`.`id` = '$id'");
	header("Location: /admin#v-pills-profile");
}
if (isset($_GET['delete_msn'])) {
	$id_msn = $_GET['delete_msn'];
	$check_msn = mysqli_query($connect, "SELECT `to_msn` FROM `$message_db` WHERE `id` = '$id_msn'");
	$decm = mysqli_fetch_assoc($check_msn);
	if ($adm_lvl_msn_delete=='root') {
		mysqli_query($connect, "DELETE FROM `$message_db` WHERE `$message_db`.`id` = '$id_msn'");
	}
	elseif ($decm['to_msn'] == 'all') {
		header("Location: /admin");
	}else{
		mysqli_query($connect, "DELETE FROM `$message_db` WHERE `$message_db`.`id` = '$id_msn'");
	}

}
if (isset($_POST['st_em_ch'])) {
	if ($_POST['settings_email_new'] == 0) {
		header("Location: /admin");
	}
	if ($_POST['settings_email'] != $settings_email) {
		header("Location: /admin");
	}
	$key = $_COOKIE['key'];
	$settings_new_email = $_POST['settings_email_new'];
	$settings_code_conf = random_str(5);
	mail($settings_new_email, "Email change request | $default_site_name", "<b>Hello, {$decrypt['name']}!</b><br><br> You requested a change of email address. To confirm the change of email, enter this code:<br><b>$settings_code_conf</b><br><br> If you do not know what this message is, just delete it. <br><br>-{$default_site_name}.");
	$request = mysqli_query($connect, "SELECT `email` FROM `admins` WHERE `adm_id` = ('$adm_id') AND `hash_email` = ('$key') AND `usr_id` = ('$usrid') AND `ssid` = ('$ssid')");
	$em = mysqli_fetch_assoc($request);
	$email_secur = $em['email'];
	mail($email_secur, "Security Alert | Email change request", "<b>Hello, {$decrypt['name']}!</b> <br><br>A request was sent to change your email address. <br><br><b>IP:</b>{$ip}<br><br> If it wasn't you, change your password urgently:<br>{$url}/admin?event=cancelrequest <br><br> -{$default_site_name}");
	mysqli_query($connect, "UPDATE `admins` SET `code` = '$settings_code_conf' WHERE `admins`.`id` = '$id_usr_adm'");
	header("Location: /settings?st_id_adm=$id_usr_adm&email=$settings_new_email&key=$key&start=true");
}
if (isset($_POST['rs_ps'])) {
	$errors = array();
	$pas_check = $_POST['cur_pas'];
	$pas_check = sha1($pas_check);
	$request = mysqli_query($connect, "SELECT `id` FROM `admins` WHERE `password` = '$pas_check' AND `adm_id` = '$adm_id' AND `hash_email` = '$key' AND `usr_id` = '$usrid' AND `ssid` = '$ssid'");
	$st_dec = mysqli_fetch_assoc($request);
	$st_id = $st_dec['id'];
	// unset($request);
	unset($st_dec);
	if ($_POST['password'] != $_POST['password1']) {
		$errors[] = 'Password do not match';
	}
	if ($_POST['password'] AND $_POST['password1'] == '') {
		$errors[] = 'You have not entered a password';
	}
	if (empty($errors)) {
		$pas_check = $_POST['password'];
		$pas_check = sha1($pas_check);
		$q = mysqli_query($connect, "UPDATE `admins` SET `password` = '$pas_check' WHERE `admins`.`id`='$st_id'");
		unset($errors);
		header("Lcation: /admin");
	}
}
if (isset($_GET['event'])) {
	if ($_GET['event'] == 'leave') {
			unset($_COOKIE);
			setcookie("_USRID", "0", time()-9999);
			setcookie("adm_id", "0", time()-9999);
			setcookie("key", "0", time()-9999);
			setcookie("_SSID", "0", time()-9999);
			header("Location: /");
	}
	if ($_GET['event'] == 'cancelrequest') {
		$code = random_str(5);
		mysqli_query($connect, "UPDATE `admins` SET `code` = '$code' WHERE `admins`.`id` = '$id_usr_adm'");
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$name_site?></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<style>
		.feedback {
			width: 85%;
		}
	</style>
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
            <li><a href="mailto:<?=$email_conf_settings?>" class="text-white">Email me</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container d-flex justify-content-between">
      <a href="/admin" class="navbar-brand d-flex align-items-center">
        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="mr-2" viewBox="0 0 24 24" focusable="false"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg> -->
        <strong><?=$name_site?> | <span class="test" style="color: #007bff;">Admin</span></strong>
      </a>

      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>
<main role="main" class="container">
	<a href="/" style="float: right; padding-top: 15px;">Main page</a>
	<h1 style="padding-bottom: 10px; ">Hello, <?=$dec['name']?>!</h1>


<div class="" style="float: left; padding-right: 10px; margin-bottom: 100%; ">
	<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
	  <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
	  <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Feedbacks</a>
	  <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
	  <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
	</div>
</div>
	<div class="tab-content" id="v-pills-tabContent">
	  <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
		

		<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
  </li>
  <?if ($decrypt['adm_lvl'] >= '3' or $decrypt['adm_lvl']=='root' ):?>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Invite</a>
  </li>
<? endif;?>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
	<h5>Statistics:</h5>
<?
$request_stat = mysqli_query($connect, "SELECT * FROM `statistic_of_usr`");
$request_file = mysqli_query($connect, "SELECT * FROM `statistics_of_files`");
$int_files = mysqli_num_rows($request_file);
$int_stat = mysqli_num_rows($request_stat);
unset($request_stat);
unset($request_file);
?>
	<p>Total Unique Users: <?=$int_stat?></p>
	<p>Total Files Generated: <?=$int_files?></p>
	
 <?if ($decrypt['adm_lvl'] == '1' or $decrypt['adm_lvl'] == '2'){
echo "</div>";
}
?>
</div>
  <?if ($decrypt['adm_lvl'] >= '3' or $decrypt['adm_lvl']=='root' ):?>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

	<form action="/admin" method="POST">
		<label for="">Email:</label><br>
		<input type="email" name="email">
		<br><br>
		<label for="">Admin lvl</label><br>
		<select name="adm_lvl" id="">
			<option value="1">1 LVL</option>
			<option value="2">2LVL</option>
			<option value="3">3LVL</option>
		</select><br><br>
		<input type="submit" name="inv_adm" value="Send invite"><br><br>
		<span>1 lvl - only statistic and feedbacks without email</span><br>
		<span>2 lvl - can view email of feedbacks</span><br>
		<span>3 lvl - full acces</span><br>
	</form>

  </div>
</div>
<?endif;?>
		
	  </div>
	  <!-- FEEDBACKS======================================== -->
	  <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
	  	<h5>Feedbacks</h5>
	  	<div class="feedback">
	  	<?
	  	$request_f = mysqli_query($connect, "SELECT * FROM `feed_back`");
	  	if ($request_f) {
	  		$count_f = mysqli_num_rows($request_f); 
	  		if ($count_f == 0) {
	  			echo "<h6> Feedbacks is empty! </h6><br><br><br><br>";
	  		}
	  		for ($i=0; $i < $count_f; $i++) { 
	  			$dec = mysqli_fetch_assoc($request_f);
	  			?>
	  	<div class="media text-muted pt-3">
	  		<?if ($decrypt['adm_lvl'] >= '2' or $decrypt['adm_lvl']=='root' ):?>
	  		<a href="?delete=<?=$dec['id']?>">
          <img src="temp/images/icons/tick.png" style="width: 32px; height: 25px; padding-right:10px;	padding-top: 5px;"></a>
      <? endif;?>
          <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <div class="d-flex justify-content-between align-items-center w-100">
              <strong class="text-gray-dark"><?=$dec['text']?></strong>
              <?if ($decrypt['adm_lvl'] >= '2' or $decrypt['adm_lvl']=='root' ):?>
              <a href="/message?id=<?=$dec['id']?>">Message</a>
              <?endif;?>
            </div>
            <?if ($decrypt['adm_lvl'] >= '2' or $decrypt['adm_lvl']=='root' ):?>
            <span class="d-block"><?=$dec['email']?></span>
        <? endif;?>
          </div>
        </div>
        <?
	  		}
	  	}
	  	?>

	  	</div>
	  </div>

	  <!-- ================================================ -->
	  <!-- MESSAGES======================================= -->
	  <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
	  	
		<h5>Messages</h5>
		<a href="/message">Write message</a>
	  	<div class="feedback">
	  	<?
	  	$request_m = mysqli_query($connect, "SELECT * FROM `messages` WHERE `to_msn` = '$id_usr_adm' OR `to_msn` = 'all' ORDER BY `id` DESC");
	  	if ($request_m) {
	  		$count_m = mysqli_num_rows($request_m); 
	  		if ($count_m == 0) {
	  			echo "<h6 style=\"padding-top: 10px;\"> Messages is empty! </h6><br><br><br><br>";
	  		}
	  		for ($i=0; $i < $count_m; $i++) { 
	  			$decm = mysqli_fetch_assoc($request_m);
	  			?>
	  	<div class="media text-muted pt-3">
          <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <div class="d-flex justify-content-between align-items-center w-100">
              <strong class="text-gray-dark"><?=$decm['msn']?></strong>
              
            <?php if ($decm['to_msn'] != 'all' || $adm_lvl_msn_delete=='root'): ?>
            	
              <a href="?delete_msn=<?=$decm['id']?>">
          <img src="temp/images/icons/cross.png" style="width: 32px; height: 25px; padding-right:10px;	padding-top: 5px;"></a>
   			<?php endif ?>
            </div>
            
            <span class="d-block">From: <?=$decm['from_msn']?></span>

          </div>
        </div>
        <?
	  		}
	  	}
	  	?>
	  </div>
	</div>
	  <!-- ================================================== -->
	  <!-- SETTINGS ========================================== -->
	  <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
	  	<div class="set"><h5>Settings</h5></div>
	  	<div class="log" style="float: right;"><a href="?event=leave">Log out</a></div>
	  	<h6>Email changer:</h6>
		<form action="/admin" method="POST">
			<label for="">Registered email:</label><br>
			<input class="form-control" type="text" name="settings_email" style="width: 30%;" value="<?=$settings_email?>" readonly><br>
			<label for="">New Email:</label><br>
			<input type="email" name="settings_email_new" style="width: 30%"><br><br>
			<button name="st_em_ch">Change!</button>
		</form>
		<br>
		<h6>Password changer:</h6><br>
		<form action="/admin" method="POST">
			<label for="">Currect password:</label><br>
			<input type="password" name="cur_pas" style="width: 30%"><br><br>
			<label for="">New password:</label><br>
			<input type="password" name="password" style="width: 30%"><br><br>
			<label for="">Repeat password:</label><br>
			<input type="password" name="password1" style="width: 30%">
			<br><br>
			<?
				if (!empty($errors)) {
					echo "<div class=\"error\" style=\"color: red\">".array_shift($errors)."</div>";
				}
			?>
			<input type="submit" name="rs_ps" value="Change password!">
		</form>

	  </div>
	</div>
</div>

	<!-- ========================================================= -->


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
