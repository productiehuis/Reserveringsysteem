<?php
class trylogin extends query
{

}
?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $usernameInput = $con->real_escape_string(trim(strip_tags($_POST['username'])));
    $passwordInput = $con->real_escape_string(trim(strip_tags($_POST['password'])));

    $QueryCheckName = "SELECT * FROM account WHERE UserName = '$usernameInput'";


    $result = mysqli_query($con, $QueryCheckName);

    if (mysqli_num_rows($result) === 1)
    {
        // Query current hashed password
        $QueryCheckPassword = "SELECT * FROM account WHERE UserName = '$usernameInput'";

        $result = mysqli_query($con, $QueryCheckPassword);

        $userData = mysqli_fetch_row($result);

        if (password_verify($passwordInput, $userData[2]))
        {
            session_start();
            $_SESSION["Username"] = $userData[1];
            $_SESSION["Level"] = $userData[3];
            header("Location: ../index.php");
        }
        else
        {
            echo "WACHTWOORD FOUT";
        }
    }
    else
    {
        echo "USERNAME BESTAAT NIET";
    }

}
else
{
    echo "404";
}
