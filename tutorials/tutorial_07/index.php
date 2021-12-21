<?php
include("phpqrcode/qrlib.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial 07</title>
</head>

<body>
    <h1>QR Code Generator</h1>
    <form action="index.php" method="GET">
        <label for="text">Type something to generate QR Code</label><br>
        <input type="text" name="txt"><br><br>
        <input type="submit" name="submit" value="Generate">
    </form><br>
    <?php
    /**
     * Validate User Input and generate QR Code
     */
    if (isset($_GET['submit'])) {
        if ($_GET['txt']) {
            $text = $_GET['txt'];
            $folderName = "images/";
            /**
             * Create folder if folder doesn't exist
             */
            if (!is_dir($folderName)) {
                mkdir($folderName);
            }
            $file = $folderName . uniqid() . ".png";
            /**
             * Generate QR Code
             */
            QRcode::png($text, $file);
            /**
             * Output the generated QR Code
             */
            echo "<img src='" . $file . "'>";
        } else {
            echo "Input Text cannot be empty!";
        }
    }
    ?>
</body>

</html>