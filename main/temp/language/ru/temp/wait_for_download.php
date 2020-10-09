<?  
  $name_table = $_GET['name_table'];
  $theme = $_GET['theme'];
  $many_stocks = $_GET['many_stocks'];
  $seed = $_GET['seed'];
  $start_singl = $_GET['start_singl'];
  if ($many_stocks > 5000) {
    header("Location: /?error=stocks");
  }
  $captcha=$_GET['g-recaptcha-response'];
  $secretKey = "6LehzvEUAAAAALMMbXFLHGip8InIbr4d0am9-mYT";
  $ip = $_SERVER['REMOTE_ADDR'];
  $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey .  '&response=' . $captcha . '&remoteip=' . $ip;
  $response = file_get_contents($url);
  $responseKeys = json_decode($response,true);
  if ($responseKeys["success"]) {
    header("refresh:3; /generation?name_table=$name_table&theme=$theme&many_stocks=$many_stocks&seed=$seed&start_singl=$start_singl");
  }else{
    header("Location: /?error=recapcha");
  }
include 'temp/templates_stand/header.php';
tmpheader('wait_for_download.css');
?>
<main>
  <div class="wrapper">
    <div class="prepare">
      <h1 class="pls_h1">Ваш файл готовится к скачиванию</h1>
      <p class="pls_p">Пожалуйста, подождите пару секунд</p>
    </div>
    <!-- /.prepare -->
    <div class="gooey">
  <span class="dot"></span>
  <div class="dots">
    <span></span>
    <span></span>
    <span></span>
  </div>
</div>
  </div>
  <!-- /.wrapper -->
</main>
<div style="height: 300px"></div>
            <?if (!isset($_COOKIE['cookie_usr_accept'])) {?>
    <div class="bottom__cookie-block" id="qq">
    <p class="p_cook"><span class="qq">> </span>Мы используем файлы куки</p>
    <a onclick="cook_accept()" href="#" class="out">Хорошо</a>
    <a href="/privacy-policy" class="out">Узнать больше</a>
</div>
    <?}?>
<?
include "temp/templates_stand/footer.php";
tmpfooter();