<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page | Tutorial 04</title>
</head>

<body>
    <?php
    session_start();
    /**
     * checking the user is already login or not
     * showing home Page if you are already login
     */
    if (isset($_SESSION['auth'])) {
    ?>
        <h1>Welcome to Home Page</h1>
        <p>Congratulations <?= $_SESSION['id']; ?> , You are log in.</p>
        <a href="php/logout.php">Logout</a>
    <?php
    }
    /**
     * Redirecting Login Page if you are not login
     */
    else {
        header("location:php/login.php");
    }
    ?>
</body>

</html>