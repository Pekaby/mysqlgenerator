<?
/**
 * pekaby
 */
class delete
{
    private $un_id;

    function __construct()
    {
        $this->un_id = $_COOKIE['UNID'];
        $this->auto_delete();
    }
    private function auto_delete()
    {
        $dir = "engine/users/user_data/files/" . $this->un_id;
        
        $all_files = array_diff(scandir($dir), array('..', '.'));
        //$array = array_reverse($array);
        foreach ($all_files as $key => $value) {
            $fll_path_file = $dir."/".$value;
            $usr_filetime = filemtime($fll_path_file);
            if (time()-$usr_filetime > 432000) {
                unlink($fll_path_file);
            }
        }
    }
    private function files()
    {
        $dir = '/home/n65331/public_html/mysqlgenerator.pw/engine/users/user_data/files/' . $this->un_id;
        
        return array_diff(scandir($dir), array('..', '.'));
    }
    public function delete($fileid)
    {
        /*
WWARNING!
NEED TO FIX PATH
        */
        $files = $this->files();
        $dir = '/home/n65331/public_html/mysqlgenerator.pw/engine/users/user_data/files/' . $this->un_id;
        $fileid = $fileid + 2;
        $file = $dir.'/'.$files[$fileid];
        unlink($file);
    }
    public function deleting_account()
    {
        $dir = "/home/n65331/public_html/mysqlgenerator.pw/engine/users/user_data/files/" . $this->un_id;
        
        $all_files = array_diff(scandir($dir), array('..', '.'));
        //$array = array_reverse($array);
        foreach ($all_files as $key => $value) {
            $fll_path_file = $dir."/".$value;
            unlink($fll_path_file);
        }
        $dir .= "/";
        rmdir($dir);
    }
}
