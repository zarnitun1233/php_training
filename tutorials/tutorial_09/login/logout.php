<?php
session_start();
include("../php/config.php");
/**
 * Unset session'auth' and go back to login page
 */
unset($_SESSION['auth']);
header("location: login_form.php");
