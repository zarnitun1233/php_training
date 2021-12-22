<?php
session_start();
include("config.php");
/**
 * Receive Form Data
 */
$id = $_POST['id'];
$userName = $_POST['username'];
$age = $_POST['age'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$hobby = $_POST['hobby'];
/**
 * Update Data to Database
 */
$sql = "UPDATE user SET name = :name, age = :age, phone = :phone, address = :address, hobby = :hobby WHERE id = $id";
$statement = $db->prepare($sql);
$statement->execute([
    ':name' => $userName,
    ':age' => $age,
    ':phone' => $phone,
    ':address' => $address,
    ':hobby' => $hobby
]);
/**
 * session['update'] is true and redirect to Home Page
 */
$_SESSION['update'] = true;
header("location:../index.php");
