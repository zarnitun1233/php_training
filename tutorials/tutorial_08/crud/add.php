<?php
session_start();
include("config.php");
/**
 * Receive values from Form Input
 */
$userName = $_POST['username'];
$age = $_POST['age'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$hobby = $_POST['hobby'];
/**
 * INSERT data to Database
 */
$sql = "INSERT INTO user (name, age, phone, address, hobby) VALUES (:name, :age, :phone, :address, :hobby)";
$statement = $db->prepare($sql);
$statement->execute([
    ':name' => $userName,
    ':age' => $age,
    ':phone' => $phone,
    ':address' => $address,
    ':hobby' => $hobby,
]);
/**
 * session['add'] is true and redirect to Home Page
 */
$_SESSION['add'] = true;
header("location:../index.php");
