<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$name_site?></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<style>
@media only screen and (max-width: 767px ) {
.bloack_ad {display: none;}
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

		<h6>Язык</h6>
		<a href="/" style="color: #333;">RU</a>
		<a href="/?lang=en">EN</a>

</div>

	<div id="container">
		<h3><?=$h1_main?></h3>
		<h6><p><?=$h3_p?></p></h6>

	</div>

	<div class="bloack_ad" style="width: 336px; height: 280px; float: right;">
		
	</div>

<form action="/constructor" method="get" class="needs-validation">

	<label for="">Имя таблицы:</label><br>
	<input type="text" name="name_table" placeholder=" default: theme name">
	<br><br>

	<label for="">Тема</label><br>
	<select name="theme" id="theme">
		<option value="users">Пользователи</option>
		<!-- <option value="categories">categories</option> -->
		<option value="articles">Записи</option>
	</select>

	<br><br>
	<label for="">Сколько записей вам нужно?</label><br>
	<select name="many_stocks" id="how_many">
		<option value="5">5</option>
		<option value="10">10</option>
		<option value="20">20</option>
		<option value="30">30</option>
		<option value="40">40</option>
		<option value="50">50</option>
		<option value="100">100</option>
		<option value="200">200</option>
		<option value="500">500</option>
		<option value="1000">1000</option>
	</select><br><br>
	<h6>Предупреждение: Если вы выбираете 500 записей или больше, генерация может длиться до 2-ух минут.<h6><br>
	<div class="g-recaptcha" data-sitekey="6Ld-8OsUAAAAAJj4U9IZq4qcTSSH2gzQk6KaMl84"></div>
	<?
	if (isset($_GET['error'])) {
		if ($_GET['error'] == 'recapcha') {
			echo "<div class=\"error\" style=\"color:red;\">*Capcha needed</div><br>";
		}
	}else{
		echo "<br>";
	}
	?>
		<div class="bloack_ad" style="width: 336px; height: 280px; float: right;">
		
	</div>	
	<button type="submit" name="start_singl" сlass="btn btn-primary btn-lg btn-block">Старт</button>

</form>
<br><br>
<h3>Форма жалоб и предложений</h3>
<form action="/feedback" method="post">
	<label for="">Ваш Email:</label><br>
	<input type="email" placeholder=" you@example.com" name="email">
	<br><br>
	<textarea name="feed_back" id="" cols="50" rows="5" placeholder=" Обратная связь..."></textarea><br><br>
	<button type="submit" name="dofeed">Отправить</button>
</form>
<br><br>
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