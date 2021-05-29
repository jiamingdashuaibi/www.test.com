<?php
require_once ("./namespace.php");

class student
{
    private $name = "APP";
    private $age  = 23;

    public function __construct()
    {
        echo "{$this->name}今年{$this->age}岁！";
    }
}
use shao\jia\ming\student as s;

//$obj = new shao\jia\ming\student();

$obj = new s();

$obj = new student();