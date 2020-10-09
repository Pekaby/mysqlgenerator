<?
require '../../modules/generate.php';
require '../authorisation/connect.php';
if (isset($_POST['start'])) {
    $filename = $_POST['filename'];
    $filename .= '.sql';
    $theme = $_POST['theme'];
    $seed = $_POST['seed'];
    $many_stocks = $_POST['how_many'];
    if ($many_stocks > 15000) {
        $many_stocks = 15000;
    }
    $stmt = $connect->prepare("SELECT `total_file_gen` FROM `users` WHERE `un_id` = :unid");
    $stmt->bindParam(':unid', $_COOKIE['UNID']);
    $stmt->execute();
    $ds = $stmt->fetch();
    $count = $ds['total_file_gen'];
    $count = $count +1;
    $UNID = $_COOKIE['UNID'];
    $stmt = $connect->query("UPDATE `users` SET `total_file_gen` = ('$count') WHERE `un_id` = ('$UNID')");
    var_dump($seed);
    $generate = new generate($filename, $theme, $seed, $many_stocks);
}

?>
