<?php
//类的自动加载
spl_autoload_register(function ($classname){
    //构建类文件的路径
    $filename = "./libs/$classname.class.php";

    //如果类文件存在，则包含
    if (file_exists($filename)) require_once ($filename);
});

//创建数据库类的对象
$arr = array(
    'db_host'=>'localhost',
    'db_user'=>'root',
    'db_pass'=>'jm123123',
    'db_name'=>'blog',
    'charset'=>'utf8'
);
$db = Db::getInstance($arr);
$a = $db->fetchOne("select * from `table` where id = 50");
var_dump($a);