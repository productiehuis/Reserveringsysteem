<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    require_once "selectQuery.php";
    $select = new selectQuery;

    $usernameInput = $_POST['username'];
    $passwordInput = $_POST['password'];

    $result = $select->selectAccount($usernameInput);

    if (!empty($result))
    {
        if (password_verify($result[2], $passwordInput))
        {
            echo "VERIFIED";
        }
        else
        {
            echo "WRONG PASSWORD OR NAME";
        }
    }


    var_dump($result);

        /*if (password_verify($passwordInput, $userData[2]))
        {
            session_start();
            $_SESSION["Username"] = $userData[1];
            $_SESSION["Level"] = $userData[3];
            header("Location: ../index.php");
        }
        else
        {
            echo "WACHTWOORD FOUT";
        }*/

}
else
{
    echo "404";
}
