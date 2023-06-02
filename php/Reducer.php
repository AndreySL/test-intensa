<?php
require_once('config.php');

class Reducer
{
    protected $db;

    public function __construct()
    {
        $this->db = connectDB();
    }

    public function generateCode()
    {
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = '';

        for ($i = 0; $i < 6; $i++) {
            $code .= $chars[mt_rand(0, strlen($chars) - 1)];
        }
        return $code;
    }

    public function getOriginalURL($code)
    {
        $row = $this->db->query("SELECT url FROM links WHERE code = '$code'");
        if($row->num_rows) {
            return $row->fetch_object()->url;
        }
    }

    public function getUrlAndReturnCode($originalUrl)
    {
        $originalUrl = $this->db->real_escape_string(trim($originalUrl));
        $existInDB = $this->db->query("SELECT * FROM links WHERE url ='$originalUrl'");

        if ($existInDB->num_rows) {
            return $code = $existInDB->fetch_object()->code;
        }

        $code = $this->generateCode();
        $this->db->query("INSERT INTO links (url, code) VALUES ('$originalUrl', '$code')");
        return $code;
    }

    public function generateLink($code)
    {
        $url = $this->getOriginalUrl($code);
        return '<a target=_blank href="https://' . $url . '">' . 'click.ru/' . $code . '</a>';
    }
}
?>