<?php
namespace shao\jia\ming;

class student
{
    private $name = "佳明";
    private $age  = 23;

    public function __construct()
    {
        echo "{$this->name}今年{$this->age}岁！";
    }
}



namespace shao\jia;
class student
{
    private $name = "帅比";
    private $age  = 22;

    public function __construct()
    {
        echo "{$this->name}今年{$this->age}岁！";
    }
}

