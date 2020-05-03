<?
  if ( isset($_COOKIE['_USRID']) AND isset($_COOKIE['adm_id']) AND isset($_COOKIE['key']) ) {
    
    $usrid = $_COOKIE['_USRID'];
    $adm_id = $_COOKIE['adm_id'];
    $key = $_COOKIE['key'];

    $request = mysqli_query($connect, "SELECT * FROM `admins` WHERE `hash_email` = ('$key') AND `adm_id` = ('$adm_id') AND `usr_id` = ('$usrid')");
    $count = mysqli_num_rows($request);
    $ds = mysqli_fetch_assoc($request);
    $from = $ds['id'];
    if (!$count > 0) {
      header("Location: /");
    }
}
if (isset($_GET['id'])){
  $id = $_GET['id'];
  $require = mysqli_query($connect, "SELECT * FROM `$feedback_db` WHERE `$feedback_db`.`id` = '$id'");
  if (mysqli_num_rows($require)>0) {
    $decc = mysqli_fetch_assoc($require);
  }else{
    header("Location: /admin");
  }
}
if(isset($_POST['msm'])){
    $id = $_POST['id'];
    $email_to = $_POST['email_to'];
    $message = $_POST['message'];
    if (empty($_POST['message'])) {
      header("Location: /message?id=$id");
    }
    if (empty($_POST['email_to'])) {
      header("Location: /admin");
    }
    mail($email_to, "Admin answer to feedback", $message);
    mysqli_query($connect, "DELETE FROM `$feedback_db` WHERE `$feedback_db`.`id`='$id'");
    header("Location: /admin");
  }
if (isset($_POST['msm_adm'])) {
  if (empty($_POST['message'])) {
    header("Location: /message");
  }
  $to = $_POST['to'];
  $message = $_POST['message'];
  $message = htmlspecialchars($message);
  mysqli_query($connect, "INSERT INTO `$message_db` (`from_msn`,`to_msn`,`msn`) VALUES ('$from','$to','$message')");
  header("Location: /admin");
}
?>
    <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?=$name_site?></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  
  <script
  src="https://code.jquery.com/jquery-1.12.4.js"
  integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
  crossorigin="anonymous"></script>
</head>
<body>
<header id="to_remove">
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
<main role="main" class="container" id="to_remove#2">
  <?
  if (isset($_GET['id'])){ ?>
  <h2 style="margin-bottom: 20px;">Answer to Feedback</h2>
  <?}else{?>

  <h2 style="margin-bottom: 20px;">Message for admin(s)</h2>
  <?}?>
  <form action="/message" method="POST">
     <? if (isset($_GET['id'])){ ?>
    <input type="hidden" name="id" value="<?=$id?>">
    <label for="">Email:</label><br>
    <input class="form-control" type="text" name="email_to" style="width: 55%;" value="<?=$decc['email']?>" readonly>
    <!-- <input type="email" name="email_to" value="<?=$decc['email']?>"> --><br><br>
    <label for="">Message:</label><br>
    <textarea name="message" id="" cols="100" rows="15"></textarea><br><br>
  <?}else{?>
    <label for="">To:</label><br>
    <select name="to" id="">
      <option value="all">All</option>
      <?
        $get_adms = mysqli_query($connect, "SELECT * FROM `admins`");
        $cucc = mysqli_num_rows($get_adms);
        var_dump($cucc);
        for ($i=0; $i <= $cucc; $i++) { 
          $decode_adms = mysqli_fetch_assoc($get_adms);
          if ($decode_adms['name'] != $ds['name']) {
            echo "<option value=\"{$decode_adms['id']}\">{$decode_adms['name']}</option>";
          }
        }
      ?>
    </select><br><br>
    <label for="">Message:</label><br>
    <textarea name="message" id="" cols="100" rows="15"></textarea><br><br>
    <?}?>
    <?if (isset($_GET['id'])) {?>
      <input type="submit" value="Send!" name="msm">
   <? }else{?>
    <input type="submit" value="Send!" name="msm_adm">
    <?}?>
  </form>

</main>
<footer id="to_remove#3">
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