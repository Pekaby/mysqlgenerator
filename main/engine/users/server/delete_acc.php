<?
require '../../modules/upload_file.php';
require '../../modules/delete.php';
require '../authorisation/connect.php';
if (isset($_POST['deleting'])) {
    $un_id = $_COOKIE['UNID'];
    $ssid = $_COOKIE['SSID'];
    $pswd = $_COOKIE['pswd'];
    $hash_e = $_COOKIE['hash_e'];

    $stmt = $connect->prepare("DELETE FROM `users` WHERE `users`.`un_id` = :un_id");
    $stmt->bindParam(':un_id', $un_id);
    $stmt->execute();

    $delete = new delete;
    $delete->deleting_account();

    $delete_image = new upload_image;
    $delete_image->delete();

    setcookie("UNID", "DELETED", time()-9999, '/');
    setcookie("SSID", "DELETED", time()-9999, '/');
    setcookie("pswd", "DELETED", time()-9999, '/');
    setcookie("hash_e", "DELETED", time()-9999, '/');
}