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
    /**
     * For Loop for star triangle
     */
    for ($start = 1; $start <= 11; $start++) {
        if ($start % 2 != 0) {
            for ($space = $start; $space < 11; $space += 2) {
                echo "&nbsp;&nbsp;&nbsp;";
            }
            for ($star = 1; $star <= $start; $star++) {
                echo "*&nbsp;";
            }
        }
        echo "<br>";
    }
    echo "<br>";
    for ($start = 9; $start >= 1; $start--) {
        if ($start % 2  != 0) {
            for ($space = $start; $space < 11; $space += 2) {
                echo "&nbsp;&nbsp;&nbsp;";
            }
            for ($star = 1; $star <= $start; $star++) {
                echo "*&nbsp;";
            }
        }
        echo "<br>";
    }
    ?>
</body>

</html>