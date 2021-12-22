<?php
session_start();
include("config.php");
/**
 * Receive User ID
 */
$id = $_GET['id'];
/**
 *  Delete data according to User ID
 */
$sql = "DELETE FROM user WHERE id = $id";
$statement = $db->prepare($sql);
$statement->execute();
/**
 * session['delete'] is true and redirect to Home Page
 */
$_SESSION['delete'] = true;
header("location:../index.php");
