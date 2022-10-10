<?php
if (isset($_SESSION["Username"]))
{
    unset($_SESSION["Username"]);
    unset($_SESSION["Level"]);
}

$_SESSION = array();

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_destroy();

header('Location: index.php');

include "../includes/header.php"; ?>
<main class="text-center mt-5">
    <form method="post" action="/reserveringsysteem/public/control/trylogin.php">
        <label>
            <input name="username" type="text" placeholder="Gebruikersnaam">
        </label>
        <label>
            <input name="password" type="password" placeholder="Wachtwoord">
        </label>
        <button class="btn btn-primary mb-2" type="submit">Log in</button>
    </form>
</main>
