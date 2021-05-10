<?php
class Student
{
    private $name = "大帅比";
    private $age = 22;

    public function __clone()
    {
        $this->name = "小可爱";
        $this->age = 21;
    }
}

$obj = new Student();
//克隆对象

$obj1 = clone $obj;
var_dump($obj,$obj1);
//堆内存