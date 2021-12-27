<?php
include("../php/config.php");
/**
 * Import PHPMailer classes into the global namespace
 * These must be at the top of your script, not inside a function
 * 
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
/**
 * Validate email from FORM
 */
if (isset($_POST['email'])) {
    $emailTo = $_POST['email'];
    $code = uniqid(true);
    /**
     * Insert email and code to database
     */
    $sql = "INSERT INTO resetpasswords (code, email) VALUES (:code, :email)";
    $statement = $db->prepare($sql);
    $statement->execute([
        ':code' => $code,
        ':email' => $emailTo,
    ]);
    /**
     * If the INSERT statement is error, show error message
     */
    if (!$statement) {
        exit("Error");
    }
    /**
     * Create an instance; passing `true` enables exceptions
     */
    $mail = new PHPMailer(true);
    /**
     * Configuration to use PHPMailer library
     */
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'mgmg243444@gmail.com';
        $mail->Password   = 'brnyrbrnyr123';
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;

        $mail->setFrom('mgmg243444@gmail.com', 'Reset Password');
        $mail->addAddress("$emailTo");
        $mail->addReplyTo('no-reply@mgmg243444.com', 'No reply');

        $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/resetPassword.php?code=$code";
        $mail->isHTML(true);
        $mail->Subject = 'Your Password Reset Link';
        $mail->Body    = "<h1>You requested a password reset</h1>
                            Click <a href='$url'>this link</a> to do so";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Reset Password link had been sent to your email';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password Page | Tutorial 10</title>
</head>

<body>
    <form action="" method="POST">
        <input type="text" name="email" placeholder="email" autocomplete="off">
        <br><br>
        <input type="submit" name="submit" value="Reset Password">
    </form>
</body>

</html>