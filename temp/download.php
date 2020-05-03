<?
if (isset($_GET)) {
    if ($_GET['repeat'] == 'true') {
    }else{
      if($_GET['id_download'] == $_COOKIE['id_usr']) {
      header("refresh:3; /tousr.php");
    }else{
      header("Location: /");
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

  <div class="lang-switcher" style="float: right; padding-top: 15px; text-align: right;">
  <? 

  if ($_SESSION['http_lang'] == 'english'):?>
    <h6>Language</h6>
    <a href="<?=$_SERVER['REQUEST_URI'].'&lang=ru&repeat=true'?>">RU</a>
    <a href="/" style="color: #333;">EN</a>
  <?endif;
  if ($_SESSION['http_lang'] == 'russian'): ?>
    <h6>Язык</h6>
    <a href="/" style="color: #333;">RU</a>
    <a href="<?=$_SERVER['REQUEST_URI'].'&lang=en&repeat=true'?>">EN</a>

<? endif;?>

</div>

  <div class="top_paddint" style="padding-top: 15px;"></div>
  <div id="container">
  <? $another = $_COOKIE['id_usr']; ?>
  <h2><?=$thanks?></h2><br>
  <h4><p><?=$ps?><a href="download?id_download=<?=$another?>" style="color:#213740;">click here.</a></p></h4>
  </div>
  <h6>> <a href="/">Main page</a></<h6></h6>
  <div class="bloack_ads" style="width: 728px;height: 90px; margin-top: 50px;">
  
</div>
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