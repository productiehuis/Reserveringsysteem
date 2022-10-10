<?php include "../includes/header.php"; ?>
<main class="text-center mt-5">
    <form method="post" action="../control/trylogin.php">
        <label>
            <input name="username" type="text" placeholder="Gebruikersnaam">
        </label>
        <label>
            <input name="password" type="password" placeholder="Wachtwoord">
        </label>
        <button class="btn btn-primary mb-2" type="submit">Log in</button>
    </form>
</main>