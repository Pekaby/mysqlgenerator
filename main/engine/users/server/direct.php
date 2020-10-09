<?
require 'engine/modules/download_file.php';

function file_force_download($file) {
  if (file_exists($file)) {

    if (ob_get_level()) {
      ob_end_clean();
    }
    
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . basename($file));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    
    readfile($file);
    exit;
  }
}

if (isset($_GET['fileid'])) {
    $fileid = $_GET['fileid'];
    $class_download = new download($fileid);
    $name = $class_download->name();
    file_force_download('engine/users/user_data/files/' .$_COOKIE['UNID']. '/'. $name);
    header("Location: /account");
}
header("Location: /account");