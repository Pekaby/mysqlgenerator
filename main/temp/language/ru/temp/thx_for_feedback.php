<?
header("refresh:5; /");
include 'temp/templates_stand/header.php';
tmpheader('thx_for_feedback.css');
?>
<main>
  <div class="wrapper">
    <div class="thx">Спасибо за обратный отзыв!</div>
    <div class="ull">Вы будете перенаправлены на главную страницу через 5 секунд.</div>
  </div>
</main>
<div style="height: 350px"></div>
<?
include "temp/templates_stand/footer.php";
tmpfooter();
?>