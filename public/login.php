<?php
include "includes/database.php";
?>

<form method="post" action="control/trylogin.php">
    <input name="username" type="text" placeholder="Gebruikersnaam">
    <input name="password" type="password" placeholder="Wachtwoord">
    <button type="submit">Log in</button>
</form>
