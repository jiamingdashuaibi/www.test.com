<?php

//定义一个学生类
class Student
{
    //声明一个最终的方法：该方法只能继承，不能重写
    final public function showInfo()
    {

    }
}

//定义一个南昌学生类，并继承学生类
class ItcastStudent extends Student
{

}http://www.neea.edu.cn/