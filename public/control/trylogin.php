<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "selectQuery.php";
    $select = new selectQuery;

    $usernameInput = $_POST['username'];
    $passwordInput = $_POST['password'];

    $result = $select->selectAccount($usernameInput);

    if (!empty($result))
    {
        if (password_verify($passwordInput, $result["userHashedPassword"]))
        {
            $_SESSION["Username"] = $result["userName"];
            $_SESSION["Level"] = $result["userLevel"];
            header("Location: ../index.php");
            exit();
        }
        else
        {
            header("Location: ../login.php?s=0");
        }
    }
    else
    {
        header("Location: ../login.php?s=0");
    }
}
else
{
    header("Location: ../login.php?s=0");
}
