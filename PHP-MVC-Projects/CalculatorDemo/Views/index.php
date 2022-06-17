<?php
    declare(strict_types = 1);
    //require_once '../Includes/class-autoloader.inc.php';
    require_once '../Classes/Calculation.class.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo Calculator</title>
</head>
<body>
    <div>
        <h1>Simple Calculator</h1>
        <form action="../Includes/cal.inc.php" method="post">
            <input type="text" name="num1" id="num1" placeholder="Input number 1">
            <select name="operator" id="operator">
                <option value="add">Add</option>
                <option value="minus">Minus</option>
                <option value="divide">Divide</option>
                <option value="multiply">Multiply</option>
            </select>
            <input type="text" name="num2" id="num2" placeholder="Input number 2">
            <button type="submit">Submit</button>
        </form>
    </div>
    <div>
        <?php
        echo Calculation::$testnum;
        ?>
    </div>
</body>
</html>