<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Tutorial 02</title>
</head>

<body>
    <?php
    for ($a = 1; $a <= 11; $a++) {
        if ($a % 2 != 0) {
            for ($b = $a; $b < 11; $b += 2) {
                echo "&nbsp;&nbsp;&nbsp;";
            }
            for ($c = 1; $c <= $a; $c++) {
                echo "*&nbsp;";
            }
        }
        echo "<br>";
    }
    echo "<br>";
    for ($i = 9; $i >= 1; $i--) {
        if ($i % 2  != 0) {
            for ($j = $i; $j < 11; $j += 2) {
                echo "&nbsp;&nbsp;&nbsp;";
            }
            for ($k = 1; $k <= $i; $k++) {
                echo "*&nbsp;";
            }
        }
        echo "<br>";
    }
    ?>
</body>

</html>