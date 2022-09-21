<?php
include "../includes/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usernameInput = $con->real_escape_string(trim(strip_tags($_POST['username'])));
    $passwordInput = $con->real_escape_string(trim(strip_tags($_POST['password'])));

    $QueryCheckName = "SELECT * FROM account WHERE UserName = '$usernameInput'";


    $result = mysqli_query($con, $QueryCheckName);

    if (mysqli_num_rows($result) === 1)
    {
        // Query current hashed password

        $result = mysqli_query($con, $QueryCheckPassword);


        {
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
