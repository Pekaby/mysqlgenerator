<?
include 'temp/templates_stand/header.php';
require 'authorisation/connect.php';
require 'engine/modules/system.php';
$system = new system;
if (isset($_COOKIE['UNID']) && isset($_COOKIE['SSID']) && isset($_COOKIE['hash_e']) && isset($_COOKIE['pswd'])) {
    $stmt = $connect->prepare("SELECT * FROM `users` WHERE `un_id` = :un_id AND `ssid` = :ssid AND `hash_email` = :hash_e AND `password` = :pswd");
    $stmt->bindParam(':un_id', $param_un_id);
    $stmt->bindParam(':ssid', $param_ssid);
    $stmt->bindParam(':hash_e', $param_hash_e);
    $stmt->bindParam(':pswd', $param_pswd);

    $param_un_id = $_COOKIE['UNID'];
    $param_ssid = $_COOKIE['SSID'];
    $param_hash_e = $_COOKIE['hash_e'];
    $param_pswd = $_COOKIE['pswd'];

    $stmt->execute();
    $count = $stmt->rowCount();
    if ($count > 0) {
        $dcs = $stmt->fetch();
        if (!isset($_SESSION['em_vac'])) {
            if ($dcs['email_vac'] == true) {
                $_SESSION['em_vac'] = true;
            }else{
                $_SESSION['em_vac'] = false;
            }
        }
    }
    else {
        header("Location: /login");
        unset($_COOKIE['UNID']);
        unset($_COOKIE['hash_e']);
        unset($_COOKIE['SSID']);
        unset($_COOKIE['pswd']);
        setcookie("UNID", "DELETED", time()-9999);
        setcookie("hash_e", "DELETED", time()-9999);
        setcookie("SSID", "DELETED", time()-9999);
        setcookie("pswd", "DELETED", time()-9999);
    }
    if (isset($_POST['change_settings'])) {
        $errors = array();
        require 'engine/modules/upload_file.php';
        $image = new upload_image;
        $img = $image->accept();
        if ($img == true) {
            $unid = $_COOKIE['UNID'];
            $image_prof = $_COOKIE['UNID'] . '.png';
            $stmt = $connect->query("UPDATE `users` SET `img` = ('$image_prof') WHERE `un_id` = ('$unid')");
        }
        $email = $_POST['email'];
        $name = $_POST['name'];
        $name = htmlspecialchars($name);
        $email = htmlspecialchars($email);
        $hash_email = md5($email);
        if ($name === '') {
            $errors[] = 'Name cannot be empty';
        }
        if ($email === '') {
            $errors[] = 'Email cannot be empty';
        }
        $un_link = $hash_email . $system->random_str(15);
        if ($_POST['cur_password'] != '') {
            $current_pas = md5(htmlspecialchars($_POST['cur_password']));
            $new_password = $_POST['n_password'];
            $repeat_password = $_POST['r_password'];
            if ($new_password === '') {
                $errors[] = 'New password cannot be empty';
            }
            if ($new_password !== $repeat_password) {
                $errors[] = 'Password do not match';
            }
            if ($current_pas != $dcs['password']) {
                $errors[] = "Current password is wrong!";
            }
            if (empty($errors)) {
                $SSID = $_COOKIE['SSID'];
                $UNID = $_COOKIE['UNID'];
                $n_password = md5($new_password);
                $stmt = $connect->prepare("UPDATE `users` SET `name` = :name WHERE `un_id` = :UNID AND `ssid` = :ssid");

                $stmt->bindParam(':name', $name);
                // $stmt->bindParam(':pswd', $n_password);
                $stmt->bindParam(':UNID', $_COOKIE['UNID']);
                $stmt->bindParam(':ssid', $_COOKIE['SSID']);
//                $stmt = $connect->prepare("UPDATE `users` SET `name` = :name AND `password` = :pswd WHERE `un_id` = :UNID AND `ssid` = :ssid");
                $stmt->execute();

                $stmt = $connect->prepare("UPDATE `users` SET `password` = :pswd WHERE `un_id` = :UNID AND `ssid` = :ssid");
                $stmt->bindParam(':pswd', $n_password);
                $stmt->bindParam(':UNID', $_COOKIE['UNID']);
                $stmt->bindParam(':ssid', $_COOKIE['SSID']);
                $stmt->execute();

                if ($email != $dcs['email']) {
                $stmt = $connect->prepare("UPDATE `users` SET `email` = :email WHERE `un_id` = :UNID AND `ssid` = :ssid");
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':UNID', $_COOKIE['UNID']);
                $stmt->bindParam(':ssid', $_COOKIE['SSID']);
                $stmt->execute();
                $stmt = $connect->prepare("UPDATE `users` SET `hash_email` = :email WHERE `un_id` = :UNID AND `ssid` = :ssid");
                $stmt->bindParam(':email', $hash_email);
                $stmt->bindParam(':UNID', $_COOKIE['UNID']);
                $stmt->bindParam(':ssid', $_COOKIE['SSID']);
                $stmt->execute();
                $stmt = $connect->prepare("UPDATE `users` SET `email_vac` = :email WHERE `un_id` = :UNID AND `ssid` = :ssid");
                $stmt->bindParam(':email', $vc);
                $stmt->bindParam(':UNID', $_COOKIE['UNID']);
                $stmt->bindParam(':ssid', $_COOKIE['SSID']);
                $vc = 0;
                $stmt->execute();

                }
                $stmt = $connect->prepare("UPDATE `users` SET `email_key` = :unlink WHERE `un_id` = :unid AND `ssid` = :ssid");
                $stmt->bindParam(':unlink', $un_link);
                $stmt->bindParam(':unid', $_COOKIE['UNID']);
                $stmt->bindParam(':ssid', $_COOKIE['SSID']);
                $stmt->execute();
                $_SESSION['em_vac'] = false;
                mail($email, "Changing email", "Hello, {$name}!
To confirm your email please follow this link:

https://mysqlgenerator.pw/confirm/{$un_link}

© MySQL Gemerator
", "From: no-reply@mysqlgenerator.pw");
                setcookie("hash_e", "DELETED", time()-9999);
                setcookie("pswd", "DELETED", time()-9999);
                setcookie("hash_e", $hash_email,   time()+60*60*24*365*10, '/');
                setcookie("pswd",  $n_password,     time()+60*60*24*365*10, '/');
                header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
                header("Cache-Control: post-check=0, pre-check=0", false);
                header("Pragma: no-cache");
                header("Location: /account/settings");
            }
        }else{
            if ($email != $dcs['email']) {
                $stmt = $connect->prepare("UPDATE `users` SET `email` = :email WHERE `un_id` = :UNID AND `ssid` = :ssid");
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':UNID', $_COOKIE['UNID']);
                $stmt->bindParam(':ssid', $_COOKIE['SSID']);
                $stmt->execute();
                $stmt = $connect->prepare("UPDATE `users` SET `hash_email` = :email WHERE `un_id` = :UNID AND `ssid` = :ssid");
                $stmt->bindParam(':email', $hash_email);
                $stmt->bindParam(':UNID', $_COOKIE['UNID']);
                $stmt->bindParam(':ssid', $_COOKIE['SSID']);
                $stmt->execute();
                $stmt = $connect->prepare("UPDATE `users` SET `email_vac` = :email WHERE `un_id` = :UNID AND `ssid` = :ssid");
                $stmt->bindParam(':email', $vc);
                $stmt->bindParam(':UNID', $_COOKIE['UNID']);
                $stmt->bindParam(':ssid', $_COOKIE['SSID']);
                $vc = 0;
                $stmt->execute();
                $_SESSION['em_vac'] = false;
                $stmt = $connect->prepare("UPDATE `users` SET `email_key` = :unlink WHERE `un_id` = :unid AND `ssid` = :ssid");
                $stmt->bindParam(':unlink', $un_link);
                $stmt->bindParam(':unid', $_COOKIE['UNID']);
                $stmt->bindParam(':ssid', $_COOKIE['SSID']);
                $stmt->execute();
                setcookie("hash_e", "DELETED", time()-9999);
                setcookie("hash_e", $hash_email,   time()+60*60*24*365*10, '/');
                mail($email, "Changing email", "Hello, {$name}!
To confirm your email please follow this link:

https://mysqlgenerator.pw/confirm/{$un_link}

© MySQL Gemerator
", "From: no-reply@mysqlgenerator.pw");
            }
            if ($name != $dcs['name']) {
                $stmt = $connect->prepare("UPDATE `users` SET `name` = :name WHERE `un_id` = :UNID AND `ssid` = :ssid");
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':UNID', $_COOKIE['UNID']);
                $stmt->bindParam(':ssid', $_COOKIE['SSID']);
                $stmt->execute();
            }
            header("Location: /account/settings");
        }
    }
}else{
    header("Location: /login");
}
tmpheader("settings.css");
    
?>

<main>
    <div class="mainbox">
        <div class="main_wrapper">
            <div class="avatar">
                <div class="bk">
                    <a href="/account" class="go_back"><span class="spgb"><</span> Back</a>
                </div>
                <img src="/engine/users/user_data/images/<?=$dcs['img']?>" class="ava" alt="">
                <form method="post" action="/account/settings" class="av_change" enctype="multipart/form-data">
                    <input type="file" name="image" id="file" class="inputfile" />
                    <label for="file">Change avatar</label>
                
            </div>
            <!-- /.avatar -->
            <div class="settings">
                    <label for="" class="label_form">Name</label><br>
                    <input type="text" class="set_input" size="40" name="name" value="<?=$dcs['name'];?>"><br>
                    <label for="" class="label_form">Email</label><br>
                    <input type="email" class="set_input" size="40" name="email" value="<?=$dcs['email']?>"><br>
                    <label for="" class="label_form">Current Password</label><br>
                    <input type="password" class="set_input" size="40" name="cur_password"><br>
                    <label for="" class="label_form">New Password</label><br>
                    <input type="password" class="set_input" size="40" name="n_password"><br>
                    <label for="" class="label_form">Repeat Password</label><br>
                    <input type="password" class="set_input" size="40" name="r_password"><br>
                    <?
if (!empty($errors)) {
    echo "<div class=\"errors\">*".array_shift($errors)."</div>";
}
                    ?>
                    <button class="btn_form" name="change_settings">Save</button>
                    <a class="link" id="delete">Delete your account</a>
                </form>
            </div>
            <!-- /.settings -->
            <div class="adblock">
                
            </div>
            <!-- /.adblock -->
        </div>
        <!-- /.main_wrapper -->
    </div>
    <!-- /.mainbox -->
    <div id="myModal" class="modal">

  <!-- Modal content -->
<!-- Modal content -->
<div class="modal-content">
  <div class="modal-header">
    <span class="close">&times;</span>
    <h5 class="h5_header">Deleting account</h5>
  </div>
  <div class="modal-body">
    <p class="preheader">Are you sure?</p>
    <p class="modal_body_warning">This action will delete all your data, including generated files.</p>
    <p class="modal_body_warning">Continue?</p>
    <button class="yes" id="Yes">Yes</button>
    <button class="no" id="No">No</button>
  </div>
  <div class="modal-footer">
    
  </div>
    
    

  </div>

</div>
</main>
<script>
    function CreateRequest()
{
    let Request = false

    if (window.XMLHttpRequest)
    {
        Request = new XMLHttpRequest()
    }
    else if (window.ActiveXObject)
    {
        try
        {
             Request = new ActiveXObject("Microsoft.XMLHTTP")
        }    
        catch (CatchException)
        {
             Request = new ActiveXObject("Msxml2.XMLHTTP")
        }
    }
 
    if (!Request)
    {
        alert("Please, use another browser!")
    }
    
    return Request
} 

    var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("delete");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
let no = document.getElementById("No");
let yes = document.getElementById("Yes");
// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}
no.onclick = function() {
  modal.style.display = "none";
}
yes.onclick = function() {
  
    xhr = CreateRequest()

    xhr.open('POST', '/engine/users/server/delete_acc.php')

      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

      xhr.onreadystatechange = function(){
            if (xhr.readyState === 4 && xhr.status === 200) {
                  if (xhr.responseText == 'This Email already registered') {
                        error_log.innerHTML = xhr.responseText
                        return
                  }
                  if(xhr.responseText == 'DONE'){
                        document.location.href = "/login"
                  }else{
                        document.location.href = "/login"
                  }
            }
      }

      xhr.send('deleting=start')

}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
<?
include 'temp/templates_stand/footer.php';
tmpfooter();
