<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    require_once 'class/accountDL.php';
    $accountDL = new accountDL();

    $accountobj = new account();
    $accountobj->userName = $_POST['username'];
    $accountobj->userPassword = $_POST['password'];

    $result = $accountDL->readAccount($accountobj->userName);

    if (empty($result))
    {
        header("Location: ../pages/login.php?s=0");
        exit("Login error");
    }

    if (!password_verify($accountobj->userPassword, $result->userPassword))
    {
        header("Location: ../pages/login.php?s=0");
        exit("Login error");
    }

    $_SESSION["Username"] = $result->userName;
    $_SESSION["Level"] = $result->userLevel;
    header("Location: ../pages/overzicht.php");
    exit("Login succes");
}
else
{
    header("Location: ../pages/login.php?s=0");
    return false;
}
