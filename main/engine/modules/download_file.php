<?
/**
 * For downloading files
 * Pekaby.
 */

class download
{
    public $file_id;
    private $class_get_user_files;
    private $dir;
    private $unid;

    static private $files_count;
    function __construct($file_id)
    {
        $this->file_id = $file_id;
        $this->unid = $_COOKIE['UNID'];
        // $this->dir = '../../users/user_data/files/'.$this->unid;
        $this->dir = 'engine/users/user_data/files/'.$this->unid;
    }
    private function files()
    {
        $dir = $this->dir;
        return array_diff(scandir($dir), array('..', '.'));

    }
    private function count()
    {
        if (empty($this->files())) {
            self::$files_count = 0;
            return self::$files_count;
        }else{
            foreach ($this->files() as $val) {
            self::$files_count ++;
            }
            return self::$files_count;
        }
    }
    private function get_name_file($count = 1)
    {
        $files = $this->files();
        //return $files;
        $count = $count + 2;
        return $files[$count];
    }
    public function name()
    {
        $count = $this->count();
        $array = array();
        for ($i=0; $i < $count; $i++) { 
            $array[] = $this->get_name_file($i);
        }
        //$array = array_reverse($array);
        return $array[$this->file_id];
    }
}