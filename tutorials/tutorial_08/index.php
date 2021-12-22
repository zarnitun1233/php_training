<?php
session_start();
include("php/config.php");
/**
 * Pull data from Database
 */
$sql = "SELECT * FROM user";
$statement = $db->query($sql);
$data = $statement->fetchAll();
/**
 * Show Message "Added" when one user is added
 */
if ($_SESSION['add']) {
    echo "New User Added";
    $_SESSION['add'] = false;
}
/**
 * Show Message "Updated" when one user is Updated
 */
if ($_SESSION['update']) {
    echo "Updated";
    $_SESSION['update'] = false;
}
/**
 * Show Message "Deleted" when one user is deleted
 */
if ($_SESSION['delete']) {
    echo "Deleted";
    $_SESSION['delete'] = false;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Index Page | Tutorial 08</title>
</head>

<body>
    <table>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Hobby</th>
            <th>Actions</th>
        </tr>
        <?php
        /**
         * Show data from User Table
         */
        foreach ($data as $result) {
        ?>
            <tr>
                <?php
                echo "<td>$result->name</td>";
                echo "<td>$result->age</td>";
                echo "<td>$result->phone</td>";
                echo "<td>$result->address</td>";
                echo "<td>$result->hobby</td>";
                ?>
                <td>
                    <a href="php/update_form.php?id=<?= $result->id; ?>">Update</a> |
                    <a href="php/delete.php?id=<?= $result->id; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table><br>
    <a href="php/new.php">Create New User</a>
</body>

</html>