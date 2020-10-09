<?
header("refresh:5; /");
include 'temp/templates_stand/header.php';
tmpheader('thx_for_feedback.css');
?>
<main>
  <div class="wrapper">
    <div class="thx">Thank you for the feedback!</div>
    <div class="ull">You will be redirected to the main page in 5 seconds</div>
  </div>
</main>
<div style="height: 350px"></div>
<?
include "temp/templates_stand/footer.php";
tmpfooter();
?>