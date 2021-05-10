<?php
//定义一个学生类
class Student
{
    private $name = "佳明";
    private $age = 23;
    public function __construct()
    {
        echo "{$this->name}他的年龄是{$this->age}岁！<br>";
    }
}