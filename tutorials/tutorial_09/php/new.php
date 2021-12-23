<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Page | Tutorial 09</title>
</head>

<body>
    <h1>New User</h1>
    <form action="add.php" method="POST">
        <label for="username">User Name</label><br>
        <input type="text" name="username" required><br><br>
        <label for="age">Age</label><br>
        <input type="number" name="age" required><br><br>
        <label for="phone">Phone Number</label><br>
        <input type="tel" name="phone" pattern="[0-9]{2}-[0-9]{9}" placeholder="09-123456789" required><br><br>
        <label for="address">Address</label><br>
        <input type="text" name="address" required><br><br>
        <label for="hobby">Hobby</label><br>
        <input type="text" name="hobby" required><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>

</html>