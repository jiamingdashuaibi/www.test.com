<?php
//定义最终的单例的数据库工具类
class Db
{
    //私有的静态的保存对象的属性
    private static $obj = null;

    //私有的数据库配置信息
    private $db_host;//主机名
    private $db_user;//用户名
    private $db_pass;//密码
    private $db_name;//数据库名
    private $charset;//字符集
    private $link;//链接对象

    //私有的构造方法：阻止类外new对象
    private function __construct($config = array())
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
    //私有的克隆方法：阻止类外克隆
    private function __clone()
    {

    }
    //公共的静态的创建对象的方法
    public static function getInstance($config = array())
    {
        //判断当前对象是否存在
        if (!self::$obj instanceof self)
        {
            //如果对象不存在，创建并保存
            self::$obj = new self($config);
        }
        //返回对象
        return self::$obj;
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

    //设置字符集
    private function setCharset()
    {
        mysqli_set_charset($this->link,$this->charset);
    }


    //执行非select语句
    private function exec($sql)
    {
        $sql = strtolower($sql);

        if (substr($sql,0,6) == 'select')
        {
            echo "不能执行SELECT语句";
            die();
        }
        return mysqli_query($this->link,$sql);
    }

    //执行select语句
    private function query($sql)
    {
        $sql = strtolower($sql);

        if (substr($sql,0,6) != 'select')
        {
            echo "不能执行非SELECT语句";
            die();
        }
        return mysqli_query($this->link,$sql);
    }

    //公共的获取一条数据的方法
    public function fetchOne($sql,$type = 3)
    {
        //执行sql语句，并返回结果集对象
        $result = $this->query($sql);
        //定义返回数组类型的常量
        $types = array(
            1 =>MYSQLI_NUM,
            2 =>MYSQLI_BOTH,
            3 =>MYSQLI_ASSOC,
        );
        //返回一维数组
        return mysqli_fetch_array($result,$types[$type]);

    }

    //公共的获取多行数据的方法
    public function fetchAll($sql,$type=3)
    {
        //执行sql语句，并返回结果集对象
        $result = $this->query($sql);
        //定义返回数组类型的常量
        $types = array(
            1 =>MYSQLI_NUM,
            2 =>MYSQLI_BOTH,
            3 =>MYSQLI_ASSOC,
        );
        //返回二维数据  多行数组
        return mysqli_fetch_all($result,$types[$type]);

    }


    //获取记录数
    public function rowCount($sql)
    {
        //执行sql语句，并返回结果集对象
        $result =$this->query($sql);
        //返回结果集
        return mysqli_num_rows($result);
    }



    public function __destruct()
    {
        mysqli_close($this->link);//断开链接
    }

}

