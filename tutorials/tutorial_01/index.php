<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Tutorial 01</title>
    <style>
        body {
            background-color: #808080;
        }

        table {
            border: 2px solid #333;
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
    <table cellpadding=0px cellspacing=0px>
        <?php
        for ($row = 1; $row <= 8; $row++) {
            echo "<tr>";
            for ($col = 1; $col <= 8; $col++) {
                $total = $row + $col;
                if ($total % 2 == 0) {
                    echo "<td width=30px height=30px bgcolor=#FFF></td>";
                } else {
                    echo "<td width=30px height=30px bgcolor=#000></td>";
                }
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>