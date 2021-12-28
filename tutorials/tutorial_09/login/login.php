<?php
session_start();
include("../php/config.php");
/**
 * Pull out data from database, useraccount table
 */
$query = "SELECT email, password FROM useraccount";
$queryResult = $db->query($query);
$result = $queryResult->fetchAll();
/**
 * If there is no user account in database, show error message
 */
if (!$result) {
    exit("No user account in database!");
}
/**
 * Receive email, password from Form
 */
$emailForm = $_POST['email'];
$passwordForm = $_POST['password'];
$passwordForm = md5($passwordForm);
/**
 * 
 */
foreach ($result as $data) {
    if ($emailForm == $data->email) {
        if ($passwordForm == $data->password) {
            echo "Login Succeed";
            $_SESSION['auth'] = true;
?>
            <a href="../index.php">Go to Home Page</a>
<?php
        } else {
            echo "Invalid email and password";
        }
    } else {
        echo "Invalid email and password";
    }
}
