<?php
class Student
{
    public $name = "帅比";
    public $age = 21;
}
$obj1 = new Student();
$obj2 = $obj1;
$obj1->name = "佳明";
$obj1->age = 22;

print_r($obj1);
echo "<br />";
print_r($obj2);
echo "<hr />";




$arr1 = ['10010','张三丰',24];
$school1 = "南昌大学";

function ADD(&$arr2,$scjool2)
{
    $arr2[]  = $scjool2;
    print_r($arr2);
}

ADD($arr1,$school1);
echo "<br />";
print_r($arr1);
