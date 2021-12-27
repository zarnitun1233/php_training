<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form | Tutorial 10</title>
</head>

<body>
    <h1>Login Form</h1>
    <form action="login.php" method="POST">
        <label for="email">Email</label><br>
        <input type="email" id="email" name="email"><br><br>
        <label for="pwd">Password</label><br>
        <input type="password" name="password" id="pwd"><br><br>
        <input type="submit" name="submit" value="login">
        <a href="request_reset.php">reset password</a>
    </form>
</body>

</html>