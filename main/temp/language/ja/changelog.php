<?
include 'temp/templates_stand/header.php';
tmpheader('changelog.css');
?>
<main>
  <div class="wrapper">
    <div class="container">
      <div class="title">Update from 01.06.2020</div>
      <div class="body_cont">
        <p class="sc">-New Design.</p>
        <p class="sc">-Generator redesigned, seed field added.</p>
        <p class="sc">-The Spanish language added.</p>
        <p class="sc">-Stroked the cat.</p>
      </div>
      <hr class="hr_chng">
    </div>

    <div class="container">
      <div class="title">Update from 09.05.2020</div>
      <div class="body_cont">
        <p class="sc">-Added a new theme for the generator: comments.</p>
        <p class="sc">-Added section "Changelog" in which you read it.</p>
        <p class="sc">-Added a button (pointer down) for quick scrolling to the generator.</p>
        <p class="sc">-Bug fixes.</p>
        <p class="sc">-Fed the cat.</p>
      </div>
    </div>
  </div>
</main>
<!-- <div style="height: 350px"></div> -->
            <?if (!isset($_COOKIE['cookie_usr_accept'])) {?>
    <div class="bottom__cookie-block" id="qq">
    <p class="p_cook"><span class="qq">> </span>We use cookies</p>
    <a onclick="cook_accept()" href="#" class="out">Okay</a>
    <a href="/privacy-policy" class="out">Learn more</a>
</div>
    <?}?>
<script type="text/javascript">

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
?>