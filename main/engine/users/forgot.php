<?
include 'temp/templates_stand/header.php';
tmpheader('recover.css');

?>
<main>
  <div class="wrapper">
    <?php if ($_SESSION['recover_session'] != true): ?>
        
    <?php endif ?>
    <?php if ($_SESSION['recover_session'] == true): ?>
        <div class="box_first">
            <div class="header_box_first">Password recovery</div>
            <div class="body_box_first">
                <p class="text_first">Forgot your password?</p>
                <p class="text_first">–Just enter the email in the box below and we will restore it!</p>
            </div>
        </div>
    <?php endif ?>
    <div id="notice">
    </div>
    <form name="pswd_form" <?php if ($_SESSION['recover_session'] == true): ?>
        style="display: none;"
    <?php endif ?>>
        <input type="password" name="password" class="input_form"><br><br>
        <input type="password" name="password1" class="input_form"><br><br>
        <br>
        <div id="error_pswd"></div>
        <button type="submit" class="btn">Save</button>
    </form>
    <form name="form_forgot" <?php if ($_SESSION['recover_session'] != true): ?>
        style="display: none;"
    <?php endif ?>>
        <input type="email" name="email_to_ch" class="input_form"><br>
        <div id="error"></div>
        <button type="submit" class="btn">Recover</button>
    </form>
    <div class="questions">Something went wrong? - <a href="mailto:support@mysqlgenerator.pw">support@mysqlgenerator.pw</a></div>
  </div>
  <script src="/engine/users/src/js/forgot.js"></script>
</main>
<div style="height: 150px"></div>
<?
include 'temp/templates_stand/footer.php';
tmpfooter();