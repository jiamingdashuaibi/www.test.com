<?php


class app
{
    private $name = "jiaming";
    private $n = "123";
    private $age = 23;

    public function __set($q,$b)
    {
        $this->$q = $b;
    }
}
$obj = new app();
$obj->name = "大帅比";
$obj->n = 234;

var_dump($obj);