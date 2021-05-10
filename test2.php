<?php
//定义小灵通的接口
interface Xiaolingtong
{
    //定义打电话的抽象方法
    public function Tel();
}

//定义Mp3接口
interface Mp3{
    //定义听音乐的抽象方法
    public function music();
}

//定义Mp4接口。并继承Mp3接口
interface Mp4 extends Mp3
{
    //定义看电影的方法
    public function vudeo();
}


//定义手机类，并实现以上所有的接口功能
class Moblie implements Xiaolingtong,Mp4
{
    //重写Tel()抽象方法
    public function Tel()
    {
        // TODO: Implement Tel() method.
        echo "正在打电话<br>";
    }

    //重写music方法
    public function music()
    {
        // TODO: Implement music() method.
        echo "正在听歌<br >";
    }

    //重写vudeo方法
    public function vudeo()
    {
        // TODO: Implement vudeo() method.
        echo "正在看电影<br >";
    }

    //添加打游戏的方法
    public function game()
    {
        echo "正在打游戏";
    }
}
$obj = new Moblie();
$obj->Tel();
$obj->music();
$obj->vudeo();
$obj->game();