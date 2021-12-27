<?php
include("../php/config.php");
/**
 * Check the code exist or not
 */
if (!isset($_GET['code'])) {
    exit("Can't find page");
}
/**
 * Pull out email from database with the specified code
 */
$code = $_GET['code'];
$query = "SELECT email FROM resetpasswords WHERE code = '$code'";
$queryResult = $db->query($query);
$result = $queryResult->fetch();
$email = $result->email;
/**
 * If any data is not found in database, show error message
 */
if ($result == 0) {
    exit("Can't find page");
}
/**
 * Validate password from FORM
 */
if (isset($_POST['password']) and isset($_POST['confirmPassword'])) {
    if ($_POST['password'] == $_POST['confirmPassword']) {
        $password = $_POST['password'];
        $password = md5($password);
        /**
         * Check User Account is already done or not
         */
        $sqlSelect = "SELECT * FROM useraccount";
        $querySelect = $db->query($sqlSelect);
        $resultSelect = $querySelect->fetch();
        /**
         * If user account is not being, create email and password to database
         */
        if (!$resultSelect) {
            /**
             * Delete one time code sent from email when no data exist in database
             */
            $sqlDelete = "DELETE FROM resetpasswords WHERE code = '$code'";
            $statementDelete = $db->prepare($sqlDelete);
            $statementDelete->execute();
            echo "No user account exists!";
?>
            <a href="login_form.php">Go to login Page</a>
            <?php
            exit();
        }
        /**
         * If user account is being, update password to database
         */
        else {
            $sqlUpdate = "UPDATE useraccount SET password = :password WHERE email = '$email'";
            $statementUpdate = $db->prepare($sqlUpdate);
            $statementUpdate->execute([
                ':password' => $password
            ]);
            if ($statementUpdate) {
                /**
                 * Delete one time code sent from email after password updated
                 */
                $sqlDelete = "DELETE FROM resetpasswords WHERE code = '$code'";
                $statementDelete = $db->prepare($sqlDelete);
                $statementDelete->execute();
                echo "Password Updated";
            ?>
                <a href="login_form.php">Go to login Page</a>
<?php
                exit();
            } else {
                exit("Something Went Wrong");
            }
        }
    } else {
        echo "Password must be the same";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password Page | Tutorial 10</title>
</head>

<body>
    <form action="" method="POST">
        <input type="password" name="password" placeholder="New Password"><br><br>
        <input type="password" name="confirmPassword" placeholder="Confirm Password"><br><br>
        <input type="submit" name="submit" value="Change Password">
    </form>
</body>

</html>