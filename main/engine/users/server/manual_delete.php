<?
require '../../modules/delete.php';
if (count($_POST)) {
    $id = $_POST['file_id'];
    $file = new delete;
    $file->delete($id);
}