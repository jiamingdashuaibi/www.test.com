<?php
class DB
{
    private static $obj = null;
    private $db_host;
    private $db_user;
    private $db_pass;
    private $db_name;
    private $charset;
    private $link;

    private function __construct($config = array())
    {
        $this->db_host = $config['db_host'];
        $this->db_user = $config['db_user'];
        $this->db_pass = $config['db_pass'];
        $this->db_name = $config['db_name'];
        $this->charset = $config['charset'];

        $this ->connecDB();
        $this ->selectDB();
        $this ->setCharset();
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public static function getInstance($config = array())
    {
        if (!self::$obj instanceof self)
        {
            self::$obj = new self($config);
        }

        return self::$obj;
    }

    private function connecDB()
    {
        if (!$this->link = @mysqli_connect($this->db_host,$this->db_user,$this->db_pass))
        {
            echo "链接服务器失败";
            die();
        }
    }

    private function selectDB()
    {
        if (!mysqli_select_db($this->link,$this->db_name))
        {
            echo "链接数据库{$this->db_name}失败";
            die();
        }
    }

    private function setCharset()
    {
        mysqli_set_charset($this->link,$this->charset);
    }


    private function exec($sql)
    {
        $sql = strtolower($sql);

        if (substr($sql,0,6) == 'select')
        {
            echo "不执行select语句";
            die();
        }

        return mysqli_query($this->link,$sql);
    }

    private function query($sql)
    {
        $sql = strtolower($sql);

        if (substr($sql,0,6) != 'select')
        {
            echo "不执行非select语句";
            die();
        }

        return mysqli_query($this->link,$sql);
    }


    public function fetchAll($sql,$type = 3)
    {
        $result = $this->query($sql);

        $types = array(
            1=>MYSQLI_NUM,
            2=>MYSQLI_BOTH,
            3=>MYSQLI_ASSOC
        );

        return mysqli_fetch_all($result,$types[$type]);
    }

    public function fetchOne($sql,$type = 3)
    {
        $result = $this->query($sql);


        $types = array(
            1 =>MYSQLI_NUM,
            2 =>MYSQLI_BOTH,
            3 =>MYSQLI_ASSOC,
        );
        return mysqli_fetch_array($result,$types[$type]);
    }

    

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        mysqli_close($this->link);
    }


}

$arr = array(
    'db_host'=>'localhost',
    'db_user'=>'root',
    'db_pass'=>'jm123123',
    'db_name'=>'test',
    'charset'=>'utf8'
);

$obj = DB::getInstance($arr);

$a = $obj->fetchOne("select * from test where id = 1");
var_dump($a);