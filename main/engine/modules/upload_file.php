<?
/**
 * load image
 */
class upload_image
{
    private $file;
    private $path;
    private $un_id;
    private $png_img;
    //private $standart = ['bender.png','darth-vader.png','homer-simpson.png','iron-man.png','iwalterwhite.png','jake.png', 'mummy.png', 'r2-d2.png'];
    private $expansion = array('image/png', 'image/gif', 'image/jpeg', 'image/jpg');
    function __construct()
    {
        $this->un_id = $_COOKIE['UNID'];
        $this->file = $_FILES;
        $this->path = 'engine/users/user_data/images/';
    }
    function __destruct()
    {
        unset($_FILES);
    }
    public function echo($text)
    {
        echo "<div class=\"error\">".$text."</div>";
    }
    public function get_file_name()
    {
        return $this->un_id.'.png';
    }
    private function check()
    {
        $exp_check = false;
        $size_check = false;
        if (in_array($this->file['image']['type'], $this->expansion)) {
            $exp_check = true;
        }else{
            return false;
        }
        if ($this->file['image']['size'] < 400000) {
            $size_check = true;
        }else{
            $this->echo('File too big');
        }
        if ($size_check == true && $exp_check == true) {
            return true;
        }
    }
    public function accept()
    {
        $can_upload = false;
        if ($this->check() == true) {
            $can_upload = true;
        }
        if ($can_upload == true) {
            $q = move_uploaded_file($this->file['image']['tmp_name'], $this->path.$this->un_id.'.png');
            if (!$q) {
                unlink($this->path.$this->un_id.'.png');
                $q = move_uploaded_file($this->file['image']['tmp_name'], $this->path.$this->un_id.'.png');
            }
            return true;
        }else{
            return false;
        }
    }
    public function delete()
    {
        $file = $this->path . $this->un_id .'.png';

        unlink($file);
        
    }
}