<?php
session_start();

if (isset($_SESSION["Username"]))
{
    header("Location: ../index.php");
    exit("Redirecting to index.");
}
;?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/index-addon.css" rel="stylesheet">
    <script src="/js/bootstrap.bundle.js" defer></script>
    <script src="/js/header.js" defer></script>
    <title>KW1C Reserveringssysteem</title>
</head>
<body>
    <header>
        <nav class="kw1c-blue nav navbar navbar-expand-lg p-2">
            <div class="container-fluid">
                <!-- KW1C LOGO-->
                <a class="navbar-brand" href="/index.php">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100" height="100" viewBox="0 0 145 134">
                        <image id="Image_3" data-name="Image 3" width="100" height="100" xlink:href="data:image/png;base64,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"/>
                    </svg>
                </a>
                <!-- NAVBAR MOBILE -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- NAVBAR DESKTOP -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-center">
                        <li class="nav-item">
                            <a class="nav-link active m-3 border border-light rounded bg-white hover-button" aria-current="page" href="../index.php">Agenda</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="text-center mt-5">
            <form method="POST" action="/control/trylogin.php">
                <table class="logInBackground center">
                    <tbody>
                    <tr>
                        <td>
                            <label>
                                <input class="radius-input" name="username" type="text" placeholder="Gebruikersnaam">
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>
                                <input class="radius-input" name="password" type="password" placeholder="Wachtwoord">
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button class="btn btn-primary mb-2 radius-button" type="submit">Log in</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <?php
                if (isset($_GET["s"]) && $_GET["s"] == 0)
                {
                    echo "<p class='error'>Log in niet gelukt</p>";
                }
                ?>
        </form>
    </main>
<?php include "../includes/footer.php" ?>
