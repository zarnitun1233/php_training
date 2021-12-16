<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial 03</title>
</head>

<body>
    <h1>Birthday Date Calculator</h1>
    <h3>Choose your birth date</h3>
    <form action="index.php" method="GET">
        <input type="date" name="date">
        <input type="submit" name="submit">
    </form>
    <?php
    /**
     * Checking Form Submission and calcutate the user's birthday
     */
    if (isset($_GET['submit'])) {
        $date = $_GET['date'];
        $birthDate = strtotime($date);
        $todayDate = time();
        $birthdayDate = $todayDate - $birthDate;
        echo "<br>Your age is " . floor($birthdayDate / (60 * 60 * 24 * 365)) . " years old.";
    }
    ?>
</body>

</html>