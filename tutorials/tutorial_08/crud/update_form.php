<?php
include("config.php");
/**
 * Pull data from Database with selected ID
 */
$id = $_GET['id'];
$sql = "SELECT * FROM user where id = $id";
$statement = $db->query($sql);
$data = $statement->fetch();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Update Form Page | Tutorial 08</title>
</head>

<body>
    <h1>Update User</h1>
    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?= $data->id; ?>">
        <label for="username">User Name</label><br>
        <input type="text" name="username" value="<?= $data->name; ?>" required><br><br>
        <label for="age">Age</label><br>
        <input type="number" name="age" value="<?= $data->age; ?>" required><br><br>
        <label for="phone">Phone Number</label><br>
        <input type="tel" name="phone" value="<?= $data->phone; ?>" required><br><br>
        <label for="address">Address</label><br>
        <input type="text" name="address" value="<?= $data->address; ?>" required><br><br>
        <label for="hobby">Hobby</label><br>
        <input type="text" name="hobby" value="<?= $data->hobby; ?>" required><br><br>
        <input type="submit" name="submit" value="Submit">
    </form><br>
    <a href="../index.php">Back to Home Page</a>
</body>

</html>