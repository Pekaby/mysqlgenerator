<?
include 'temp/templates_stand/header.php';
tmpheader('404.css');
?>
<main>
  <div class="wrapper">
        <div class="about">
            <p class="aob"></p>
            <div class="lang_switch">
                <a href="?lang=en" class="active">EN</a>
                <a href="#" class="switch_to">ES</a>
                <a href="?lang=ru" class="switch_to">RU</a>
                <a href="?lang=ja" class="switch_to">JA</a>
            </div>
        </div>
        <div class="sorry">
          404.
        </div>
        <div class="error">
          Page not found.
        </div>
  </div>
</main>
<div style="height: 300px"></div>
            <?if (!isset($_COOKIE['cookie_usr_accept'])) {?>
    <div class="bottom__cookie-block" id="qq">
    <p class="p_cook"><span class="qq">> </span>We use cookies</p>
    <a onclick="cook_accept()" href="#" class="out">Okay</a>
    <a href="/privacy-policy" class="out">Learn more</a>
</div>
    <?}?>
<?
include "temp/templates_stand/footer.php";
tmpfooter();