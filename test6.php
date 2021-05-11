<?php
class Student
{
    protected $name = "大帅比";
    private $age = 23;
    public $edu = "本科";

    public function showInfo()
    {
        foreach ($this as $key => $value)
        {
            echo "\$this->$key = $value <br >";
        }
    }
}


$obj =new Student();

