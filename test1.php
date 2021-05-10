<?php
//定义一个抽象接口interA

interface InterA
{
    const TITLE = '佳明大帅比';
    //定义一个成员抽象方法
    public function showInfo($a,$b);
}

//定义第二个接口 InterB
interface InterB
{
//    const TITLE = "佳明小帅比";  //不允许常量重写  A，b接口的常量都继承到下面 就会被重写 所以冲突了
    //定义一个静态抽象方法
    public static function readMe();
}
//定义学生类，并实现接口
class Stufent implements InterA,InterB
{
    //重写shouwInfo抽象方法
    public function showInfo($a, $b)
    {
        // TODO: Implement showInfo() method.
        echo "{$a}的年级是{$b}岁！";
    }

    public static function readMe()
    {
        // TODO: Implement readMe() method.
        echo self::TITLE;
    }
}
$obj = new Stufent();
$obj->showInfo('佳明',20);
$obj->readMe();