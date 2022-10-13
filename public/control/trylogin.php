<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    require_once "../control/class/selectQuery.php";
    $select = new selectQuery;

    $usernameInput = $_POST['username'];
    $passwordInput = $_POST['password'];

    $result = $select->selectAccount($usernameInput);

    $select = null;

    if (!empty($result))
    {
        if (password_verify($passwordInput, $result["userHashedPassword"]))
        {
            $_SESSION["Username"] = $result["userName"];
            $_SESSION["Level"] = $result["userLevel"];
            header("Location: ../pages/overzicht.php");
            exit("Login succes");
        }
        else
        {
            header("Location: ../pages/login.php?s=0");
            exit("Login error");
        }
    }
    else
    {
        header("Location: ../pages/login.php?s=0");
        exit("Login error");
    }
}
else
{
    header("Location: ../pages/login.php?s=0");
    exit("Login error");
}
