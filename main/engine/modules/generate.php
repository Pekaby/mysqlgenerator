<?
/**
 * generate.php Pekaby
 */
class generate
{
    private $fp;
    private $unid;

    private $data = [];
    private $path = "/home/n65331/public_html/mysqlgenerator.pw/engine/users/user_data/files/";

    public $file_name;
    public $path_to_first_json = "/home/n65331/public_html/mysqlgenerator.pw/temp/json/users/names.json";
    public $path_to_midle_json = "/home/n65331/public_html/mysqlgenerator.pw/temp/json/users/middle-names.json";
    public $name_table;
    public $seed;
    public $many_stocks;
    function __construct($filename, $theme, $seed, $many_stocks)
    {
        $this->path = $this->path.$_COOKIE['UNID'];
        $this->many_stocks = $many_stocks;
        $ff = str_replace(' ', '', $filename);
        //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        $this->file_name = $this->path.'/'.$filename;
        $this->seed = $seed;
        $tmp_name = explode('.', $ff);
        $this->name_table = $tmp_name[0];
        $this->unid = $_COOKIE['UNID'];

        $this->fp = fopen($this->file_name, 'wb');
        print_r($this->fp);
        fwrite($this->fp, $this->filestart_template());
        fclose($this->fp);
        
        $theme = strtolower($theme);
        if ($theme == 'users') {
            $this->users();
        }elseif($theme == 'articles'){
            $this->articles();
        }elseif($theme == 'comments'){
            $this->comments();
        }

    }
    private function users()
    {
        //!!!
        require '/home/n65331/public_html/mysqlgenerator.pw/engine/arrays_db.php';
        $this->fp = fopen($this->file_name, 'a');
        $name_table = $this->name_table;
        $sql = "
CREATE TABLE `$name_table` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` text COLLATE utf8mb4_general_ci NOT NULL,
  `address` text COLLATE utf8mb4_general_ci NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
";
            fwrite($this->fp, $sql);
            $data_names = $this->get_first_name($this->path_to_first_json);
            $data_midle = $this->get_middle_name($this->path_to_midle_json);

            $seed = $this->hashCode($this->seed);
            echo var_dump($seed);
            for ($i=1; $i <= $this->many_stocks; $i++) {
            mt_srand($seed);
            $first_name = mt_rand(0, 21900);
            $middle_name = mt_rand(0, 4000);

            $data_email = md5($seed);
            $data_email = substr($data_email, 0, 15);
            $email_rand = mt_rand(0, $rand_emails);
            $data_adress = mt_rand(0, $rand_adresses);

            $email = $data_email . $emails[$email_rand];
            $name = str_replace("'", "\'", $data_names[$first_name]) . ' ' . str_replace("'", "\'", $data_midle[$middle_name]);
            $password = $seed*15;
            $password = sha1($password);
            $password = substr($password, 0, 15);
            $adress = $addresses[$data_adress]; 

            $sql = "
INSERT INTO `$name_table` (`id`, `name`, `email`, `password`, `address`) VALUES
('$i', '$name', '$email', '$password', '$adress');

            ";
            fwrite($this->fp, $sql);

            //echo $data_names[$first_name] . ' ' . $data_midle[$middle_name];
            $seed++;
        }
        $sql = "
ALTER TABLE `$name_table`
  ADD PRIMARY KEY (`id`);

 ALTER TABLE `$name_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
        ";
        fwrite($this->fp, $sql);
        fclose($this->fp);
        return true;
    }
    private function articles()
    {
        $this->fp = fopen($this->file_name, 'a');
        $name_table = $this->name_table;
        $sql = "
CREATE TABLE `$name_table` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_creator` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `text` text COLLATE utf8mb4_general_ci NOT NULL,
  `pub_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `views` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
        ";
        fwrite($this->fp, $sql);
        for ($i=1; $i <= $this->many_stocks ; $i++) { 
            $content = file_get_contents('http://loripsum.net/api');
            $title = mb_substr($content, 0, 255);
            $id_category = random_int(1, 25);
            $id_creator = random_int(1, 1000);
            $views = random_int(0, 500000);
            $content = str_replace("<p>", '', $content);
            $content = str_replace("</p>", '', $content);
            $title = str_replace("<p>", '', $title);
            $title = str_replace("</p>", '', $title);
            $sql = "
INSERT INTO `$name_table` (`id`, `id_category`, `id_creator`, `title`, `text`, `views`) VALUES
('$i', '$id_category', '$id_creator', '$title', '$content', '$views');
            ";
            fwrite($this->fp, $sql);

        }
        $sql = "
ALTER TABLE `$name_table`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `$name_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
        ";
        fwrite($this->fp, $sql);
    }
    private function comments()
    {
        $this->fp = fopen($this->file_name, 'a');
        $name_table = $this->name_table;
        $sql = "
CREATE TABLE `$name_table` (
  `id` int NOT NULL,
  `id_creator` int NOT NULL,
  `id_article` int NOT NULL,
  `text` text COLLATE utf8mb4_general_ci NOT NULL,
  `likes` int NOT NULL DEFAULT '0',
  `pub_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
";
    fwrite($this->fp, $sql);

    for ($i=1; $i <= $this->many_stocks; $i++) { 
        $content = file_get_contents('http://loripsum.net/api');
        $content = str_replace("<p>", '', $content);
        $content = str_replace("</p>", '', $content);
        $content = mb_substr($content, 0, 300);
        $id_creator = random_int(0, 1000);
        $id_article = random_int(0, 1000);
        $likes = random_int(0, 5000);
        $sql = "
INSERT INTO `$name_table` (`id`, `id_creator`, `id_article`, `text`, `likes`) VALUES ('$i', '$id_creator', '$id_article', '$content', '$likes');
        ";
        fwrite($this->fp, $sql);
    }
        $sql = "
ALTER TABLE `$name_table`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `$name_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
        ";

        fwrite($this->fp, $sql);  
    }
    private function get_first_name($path)
    {
        $buffer = file_get_contents($path);

        return json_decode($buffer);
    }
    private function get_middle_name($path)
    {
        $buffer = file_get_contents($path);

        return json_decode($buffer);
    }
    private function hashCode($str) {
        $str = (string)$str;
        $hash = 0;
        $len = strlen($str);
        if ($len == 0 )
            return $hash;

        for ($i = 0; $i < $len; $i++) {
            $h = $hash << 5;
            $h -= $hash;
            $h += ord($str[$i]);
            $hash = $h;
            $hash &= 0xFFFFFFFF;
        }
        return $hash;
    }
    private function filestart_template()
    {
        $sql = "
SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = \"+00:00\";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

";
        return $sql;
    }

}
?>
