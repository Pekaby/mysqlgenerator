<?
/**
 * Get_files
 */

class get_user_files
{
    private $user_id;
    private $count;
    private $dir;

    public $open_dir;

    static private $count_files;
    function __construct()
    {
        $this->user_id = $_COOKIE['UNID'];
        $this->dir = 'engine/users/user_data/files/';

    }
    private function files()
    {
        $ex_dir = false;
        if (is_dir('engine/users/user_data/files/'.$this->user_id)) {
            $ex_dir = true;
            $dir = 'engine/users/user_data/files/'.$this->user_id;
        }else{
            //$dir = 'engine/users/user_data/files/'. $this->user_id;
            $dir = 'engine/users/user_data/files/'.$this->user_id;
            mkdir($dir);
            return [];
        }
        if ($ex_dir == true) {
            return array_diff(scandir($dir), array('..', '.'));
        }
    }
    public function count()
    {
        if (empty($this->files())) {
            self::$count_files = 0;
            return self::$count_files;
        }else{
            foreach ($this->files() as $val) {
            self::$count_files ++;
            }
            return self::$count_files;
        }
    }
    public function get_name_file($count = 1)
    {
        $files = $this->files();
        $count = $count + 2;
        return $files[$count];
    }

}
?>