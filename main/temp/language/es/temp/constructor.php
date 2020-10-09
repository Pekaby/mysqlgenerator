<?
include 'temp/templates_stand/header.php';
tmpheader('constructor.css');
?>
<main>
    <div class="wrapper">
        <div class="about">
            <p class="aob"><b>MySQL Generator</b> Allows you to generate data in a pre-prepared database</p>
            <div class="lang_switch">
                <a href="?lang=en" class="switch_to">EN</a>
                <a href="#" class="active">ES</a>
                <a href="?lang=ru" class="switch_to">RU</a>
                <a href="?lang=ja" class="switch_to">JA</a>
            </div>
        </div>
        <p class="aob"><b>Notice: </b>Esta es la traducción automática! <br>
          Si desea ayudar con la traducción, comuníquese con: <a href="mailto:support@mysqlgenerator.pw" class="link">support@mysqlgenerator.pw</a></p>
        <div class="forma">
            <form action="/constructor" method="get" name="gen" class="form_gen">
                <b class="b_form_gen">Tabla de nombres:</b><br>
    <input type="text" id="name" class="input_form" name="name_table" placeholder="Users"><br><br>
    <b class="b_form_gen">Tema:</b><br>
    <SELECT name="theme" onChange="placeholder()" class="select">
      <option value="Users" class="opt">Users</option>
      <option value="Articles" class="opt">Articles</option>
      <option value="Comments" class="opt">Comments</option>
    </select><br><br>
    <b class="b_form_gen" id="seed_b">Seed:</b>
    <div id="div1">
      <input type="text" class="input_form" name="seed" placeholder="Dejar en blanco al azar" style="margin-bottom: 15px;">
    </div>
    <b class="b_form_gen">¿Cuántos registros necesitas?</b><br>
    <select name="many_stocks" id="man" class="select">
      <option value="10" class="opt">10</option>
      <option value="20" class="opt">20</option>
      <option value="30" class="opt">30</option>
      <option value="40" class="opt">40</option>
      <option value="50" class="opt">50</option>
      <option value="100" class="opt">100</option>
      <option value="200" class="opt">200</option>
      <option value="300" class="opt">300</option>
      <option value="400" class="opt">400</option>
      <option value="500" class="opt">500</option>
      <option value="1000" class="opt">1000</option>
      <option value="5000" class="opt">5000</option>
    </select><br>
        <?
    if (!isset($_COOKIE['UNID']) && !isset($_COOKIE['SSID']) && !isset($_COOKIE['pswd'])) {?>
    <div class="for_more">*Para más registros, por favor <a href="/login">iniciar sesión o registrarse</a></div>
    <?}?>
    <br>
    <div class="capcha">
      <div class="g-recaptcha" data-sitekey="6LehzvEUAAAAAIZjO-bRE0-61JICcTyDR2r2BLOJ"></div>
    </div>
    <?
    if (isset($_COOKIE['UNID']) && isset($_COOKIE['SSID']) && isset($_COOKIE['pswd'])) {?>
    <div class="warning">
        <b>Aviso:</b> ¡Este archivo no se guardará!
    </div>
    <?}?>

  <?
  if (isset($_GET['error'])) {
    if ($_GET['error'] == 'recapcha') {
      echo "<script>alert(\"Capcha needed!\")</script>";
    }
  }
  ?>
    <button type="submit" name="start_singl" class="btn">Generar!</button>
            </form>
            <div class="ad_block">
                <!-- Yandex.RTB R-A-571623-5 -->
<div id="yandex_rtb_R-A-571623-5"></div>
<script type="text/javascript">
    (function(w, d, n, s, t) {
        w[n] = w[n] || [];
        w[n].push(function() {
            Ya.Context.AdvManager.render({
                blockId: "R-A-571623-5",
                renderTo: "yandex_rtb_R-A-571623-5",
                async: true
            });
        });
        t = d.getElementsByTagName("script")[0];
        s = d.createElement("script");
        s.type = "text/javascript";
        s.src = "//an.yandex.ru/system/context.js";
        s.async = true;
        t.parentNode.insertBefore(s, t);
    })(this, this.document, "yandexContextAsyncCallbacks");
</script>
            </div>
        </div>
        <div class="block_ad_fbk">
            <!-- Yandex.RTB R-A-571623-9 -->
<div id="yandex_rtb_R-A-571623-9"></div>
<script type="text/javascript">
    (function(w, d, n, s, t) {
        w[n] = w[n] || [];
        w[n].push(function() {
            Ya.Context.AdvManager.render({
                blockId: "R-A-571623-9",
                renderTo: "yandex_rtb_R-A-571623-9",
                async: true
            });
        });
        t = d.getElementsByTagName("script")[0];
        s = d.createElement("script");
        s.type = "text/javascript";
        s.src = "//an.yandex.ru/system/context.js";
        s.async = true;
        t.parentNode.insertBefore(s, t);
    })(this, this.document, "yandexContextAsyncCallbacks");
</script>
        </div>
        <div class="block_feedback">
    <h1 class="fbk">Dar opinion</h1>
    <form action="/feedback" method="POST">
      <input type="email" name="email" class="input_form" placeholder="Email" style="margin-right: 850px;"><br><br>
      <textarea name="feed_back" id="" cols="45" rows="10" class="txt_fbk" placeholder="Tu retroalimentación"></textarea>
      <button type="submit" name="dofeed" class="btn" style="margin-right: 965px;">Enviar!</button>
    </form>
  </div>
    </div>
</main>
            <?if (!isset($_COOKIE['cookie_usr_accept'])) {?>
    <div class="bottom__cookie-block" id="qq">
    <p class="p_cook"><span class="qq">> </span>El sitio usa cookies</p>
    <a onclick="cook_accept()" href="#" class="out">Bueno</a>
    <a href="/privacy-policy" class="out">Aprende más</a>
</div>
    <?}?>
<script type="text/javascript">

function placeholder(){
  var f=document.gen.theme

  var a=f.options[f.selectedIndex].value

  let doubleElement = document.getElementById('div1')
  let b_double = document.getElementById('seed_b')

  if(a === 'Users'){
    b_double.innerHTML='Seed:'
    b_double.setAttribute('style', 'margin-top: 15px; margin-right: 300px;')
    doubleElement.innerHTML='<input type="text" class="input_form" name="seed" placeholder="Leave empty for random">'
    doubleElement.setAttribute('style', 'margin-bottom: 15px; margin-right: 115px;')
  }else{
    doubleElement.innerHTML = ""
    b_double.innerHTML = ""
    doubleElement.setAttribute('style', '')
    b_double.setAttribute('style', '')
  }

  document.all.name.placeholder = a

};

function cook_accept(){
  document.cookie = "cookie_usr_accept=1; expires=Tue, 19 Jan 2038 03:14:07 GMT"
  let q = document.getElementById('qq');
  q.innerHTML =""
  q.setAttribute('style', 'display: none;')
}
</script>
<?
include "temp/templates_stand/footer.php";
tmpfooter();