<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page | Tutorial 04</title>
</head>

<body>
    <h1>You need to login</h1>
    <form action="login.php" method="POST">
        <label for="username">Username</label><br>
        <input type="text" name="username"><br><br>
        <label for="password">Password</label><br>
        <input type="password" name="password"><br><br>
        <input type="submit" value="login" name="submit"><br><br>
    </form>
    <?php
    /**
     * Validate login form data
     */
    if (isset($_POST['submit'])) {
        session_start();
        $username = $_POST['username'];
        $password = $_POST['password'];
        if ($username && $password) {
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $username;
            header("location:../index.php");
        } else {
            echo "Please Fill Username and Password Completely";
        }
    }
    ?>
</body>

</html>