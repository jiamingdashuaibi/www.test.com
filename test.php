<?php
class DB
{
    private $db_host;//主机名
    private $db_user;//用户名
    private $db_pass;//密码
    private $db_name;//数据库名
    private $charset;//字符集
    private $link;//链接对象

    //公共的构造方法：数据库对象初始化

    public function __construct( $config = array() )
    {
        $this->db_host = $config['db_host'];
        $this->db_user = $config['db_user'];
        $this->db_pass = $config['db_pass'];
        $this->db_name = $config['db_name'];
        $this->charset = $config['charset'];

        $this->connecDb();//链接Mysql服务器
        $this->selectDb();//选择数据库
        $this->setCharset();//选择字符集

    }

    //连接数据库
    private function connecDb()
    {
        if (!$this->link = @mysqli_connect($this->db_host,$this->db_user,$this->db_pass))
        {
            echo "服务器连接失败!";
            die();
        }
    }


    private function selectDb()
    {
        if (!mysqli_select_db($this->link,$this->db_name))
        {
            echo "链接数据库{$this->db_name}失败！";
        }
    }


    private function setCharset()
    {
        mysqli_set_charset($this->link,$this->charset);
    }


    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        mysqli_close($this->link);//断开链接
    }

}



$arr = array(
    'db_host'=>'localhost',
    'db_user'=>'root',
    'db_pass'=>'jm123123',
    'db_name'=>'blog',
    'charset'=>'utf8'
);
$obj = new Db($arr);
//$con = mysqli_connect("localhost" ,"root" ,"jm123123");
////检查连接
//if($con)
//{
//   echo 1;
//}
