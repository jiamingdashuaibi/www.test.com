<?php
//类的自动加载
spl_autoload_register(function ($classname){
    //构建所有不同规格类文件路径
    $arr = array(
        "./public/$classname.class.php",
        "./libs/$classname.class.php"
    );
    //循环一下
    foreach ($arr as $filename)
    {
        if (file_exists($filename)) require_once ($filename);
    }

});

$obj = new Student();
$obj1 = new Teacher();