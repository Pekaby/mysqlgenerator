<?
require 'authorisation/connect.php';
require 'engine/modules/get_user_files.php';

$path_to_standart = 'standart/';
$standart = ['bender.png','darth-vader.png','homer-simpson.png','iron-man.png','iwalterwhite.png','jake.png', 'mummy.png', 'r2-d2.png'];
if (isset($_GET['event'])) {
  if ($_GET['event'] == 'leave') {
    setcookie("UNID", '1', time()-9999);
    setcookie("SSID", '1', time()-9999);
    setcookie("hash_e", '1', time()-9999);
    setcookie("pswd" , "DELETED", time()-9999);
    header("Location: /");
  }
}
if (isset($_POST['finish_reg'])) {
    require_once 'engine/modules/upload_file.php';
      $upload_image = new upload_image;
      $check = $upload_image->accept();
      if (!$check) {
        $int = random_int(0, count($standart));
        $file_name = $path_to_standart.$standart[$int];
      }else{
          $file_name = $_COOKIE['UNID'].'.png';
      }



    $hash_email = $_COOKIE['hash_e'];
    $UNID = $_COOKIE['UNID'];
    $name = htmlspecialchars($_POST['name']);
    if ($name === '') {
        header("Location: /account?error=emptn1");
    }
    $stmt = $connect->prepare("UPDATE `users` SET `img` = ('$file_name') WHERE `un_id` = ('$UNID')");
    $stmt->execute();
    $stmt = $connect->prepare("UPDATE `users` SET `name` = :name WHERE `un_id` = ('$UNID')");
    $stmt->bindParam(':name', $name);
    $stmt->execute();
    unset($_COOKIE['is_registered']);
    setcookie("is_registered", '-1', time()-9999);
}
if (isset($_COOKIE['is_registered'])) {
    include 'temp/finish_register.php';
    exit();
}
require_once 'engine/modules/delete.php';
$start = new delete;

//=====================================


$stmt = $connect->prepare("SELECT * FROM `users` WHERE `un_id` = :unid AND `SSID` = :ssid AND `hash_email` = :hash_e AND `password` = :pswd");
$stmt->bindParam(':unid', $_COOKIE['UNID']);
$stmt->bindParam(':ssid', $_COOKIE['SSID']);
$stmt->bindParam(':hash_e', $_COOKIE['hash_e']);
$stmt->bindParam(':pswd', $_COOKIE['pswd']);
$stmt->execute();

$count = $stmt->rowCount();
if ($count > 0) {
  $decrypt_profile = $stmt->fetch();
    if ($decrypt_profile['email_vac'] == true) {
      $_SESSION['em_vac'] = true;
    }
    else{
      $_SESSION['em_vac'] = false;
    }
}else{
  setcookie("UNID", '1', time()-9999);
  setcookie("SSID", '1', time()-9999);
  setcookie("hash_e", '1', time()-9999);
  setcookie("pswd" , "DELETED", time()-9999);
  header("Location: /login");
}
include 'temp/templates_stand/header.php';
tmpheader('prof.css');
?>


<body>
    <main>
        <div class="container">
            <div class="account">
                <a href="/account/settings" class="link_prof">
                <img src="/engine/users/user_data/images/<?=$decrypt_profile['img'];?>" alt="" class="avatar">
                </a>
                <div class="bbb">
                <div class="nickname"><a href="/account/settings" class="link_prof"><?=$decrypt_profile['name']?></a></div>
                <div class="total"><?=$decrypt_profile['total_file_gen'];?></div>
              </div>
            </div>

            <div class="files">
                <div class="header_file">
                    <div class="logo_file">FILES</div>
                    <!-- /.logo -->
                    <button class="btn_new" id="new">New</button>
                </div>
<?
$f= new get_user_files;
$count = $f->count();
$array = array();
for ($i=0; $i < $count; $i++) { 
    $array[] = $f->get_name_file($i);
}
//$array = array_reverse($array);
foreach ($array as $key => $val) {
    if ($val == '.' || $val == '..') {
    }else{
      if ($val == '') {?>
        
      <?}else{
        ?>


                <div class="body_files">
                    <div class="obrt">
                        <div class="image_dwnl" id="<?=$key?>" onclick="download(<?=$key?>)"></div>
                        <div class="obrt2">
                            <div class="name_file"><?=$val?></div>
                            <div class="delete" onclick="man_delete(<?=$key?>)">Delete</div>
                        </div>
                    </div>
                    <hr class="files_hr">
                </div>
                <!-- /.body_files -->
                <?
              }
      }
    }

?>

            </div>
            <!-- /.files -->
        </div>
        <!-- /.container -->

<div class="ad" style="z-index: 0; height: 280px; margin-top: 15px;">
<!-- Yandex.RTB R-A-571623-8 -->
 <div id="yandex_rtb_R-A-571623-8"></div>
<script type="text/javascript">
    (function(w, d, n, s, t) {
        w[n] = w[n] || [];
        w[n].push(function() {
            Ya.Context.AdvManager.render({
                blockId: "R-A-571623-8",
                renderTo: "yandex_rtb_R-A-571623-8",
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
</script></div>

<div id="myModal" class="modal" style="z-index: 9999;">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>

<form name="gen">
    <b class="b_form_gen" style="">Name table:</b><br>
    <input type="text" id="name" class="input_form" name="name_table" placeholder="Users" style=""><br><br>
    <b class="b_form_gen" style="">Theme:</b><br>
    <SELECT name="theme" onChange="placeholder()" class="select" style="">
      <option value="Users" class="opt">Users</option>
      <option value="Articles" class="opt">Articles</option>
      <option value="Comments" class="opt">Comments</option>
    </select><br><br>
    <b class="b_form_gen" id="seed_b" style="">Seed:</b>
    <div id="div1">
      <input type="text" class="input_form" name="seed" placeholder="Leave empty for random" style="">
    </div><br>
    <b class="b_form_gen" style="margin-top: 8px">How many records do you need?</b><br>
    <input list="many_stocks" style="" class="input_form"name="how_many", id="how_many">
    <datalist id="many_stocks">
      <option value="10" class="opt">
      <option value="30" class="opt">
      <option value="50" class="opt">
      <option value="100" class="opt">
      <option value="500" class="opt">
      <option value="1000" class="opt">
      <option value="5000" class="opt">
    </datalist><br><br>
    <div class="error" id="error"></div>
    <button type="submit" name="start_singl" class="btn">Generate!</button>
  </form>
  </div>

</div>
  </main>
  <div id="response"></div>
  <script src="engine/users/src/js/form.js"></script>
  <script src="engine/users/src/js/account_ajax.js"></script>
<? 
include 'temp/templates_stand/footer.php';
tmpfooter('tmp.css');
?>