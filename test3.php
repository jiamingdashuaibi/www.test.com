<?php
abstract class Student
{
    const TITLE = "帅比";
    abstract protected function showInfo($a,$b);
    abstract static public function readMe();
}

final class ItcastStudent extends Student
{
    //重写
    public function showInfo($name, $age)
    {
        echo "{$name}的年龄是{$age}岁！<br >";
    }

    //重写
    public static function readMe()
    {
        echo self::TITLE;
    }
}
$obj = new ItcastStudent();
$obj -> showInfo('张三','21');
$obj -> readMe();

