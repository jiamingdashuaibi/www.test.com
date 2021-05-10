<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>你号</title>
</head>
<body>
    <?php
        $n1 = "";
        $n2 = "";
        $result = '';
        if (isset($_REQUEST['num1']))
        {
            $n1 = $_REQUEST['num1'];
            $n2 = $_REQUEST['num2'];
            $result = $n1+$n2;

            echo "<br > 用户名：".$_REQUEST['username'];
            echo "<br>你的账户余额为 0,请充值";
        }
    ?>
    <form action="1.php?id=10&username=zhangsan" method="post">
        数字1：<input type="text" name="num1" value="<?php echo $n1?>">
        +
        数字2：<input type="text" name="num2" value="<?php echo $n2?>">
        <input type="submit" value="=">
        <input type="text" name="result" value="<?php echo $result?>">
    </form>
</body>
</html>