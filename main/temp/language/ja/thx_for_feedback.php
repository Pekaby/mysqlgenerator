<?
header("refresh:5; /");
include 'temp/templates_stand/header.php';
tmpheader('thx_for_feedback.css');
?>
<main>
  <div class="wrapper">
    <div class="thx">フィードバックありがとうございます！</div>
    <div class="ull">5秒後にメインページにリダイレクトされます</div>
  </div>
</main>
<div style="height: 350px"></div>
<?
include "temp/templates_stand/footer.php";
tmpfooter();
?>