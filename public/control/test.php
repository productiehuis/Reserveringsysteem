<?php
include "../includes/database.php";

$stmt = $con->prepare("INSERT INTO account(`userName`, `userHashedPassword`, `userLevel`) VALUES(?, ?, ?)");

$stmt->bind_param("ssi", $username, $hashedpassword, $userlevel);

$username = "admin";
$password = "password";
$hashedpassword = password_hash($password, PASSWORD_BCRYPT );
$userlevel = 1;

//$stmt->execute();

$stmt->close();
