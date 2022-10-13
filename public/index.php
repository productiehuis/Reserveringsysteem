<?php include "./includes/header.php"; ?>
        <main>
            <?php

            if (isset($_SESSION["Username"]))
            {
                echo "Welcome " . $_SESSION["Username"] . "!";
            }
            else
            {
                echo "NOT SET";
            }
            ?>
        </main>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Homepagina</a></li>
                <li class="breadcrumb-item active" aria-current="page">Overzicht pagina</li>
            </ol>
        </nav>
        <div class="container">
            <div class="row">
                <?php include "./includes/card.php"?>
                <?php include "./includes/card.php"?>
                <?php include "./includes/card.php"?>
                <?php include "./includes/card.php"?>
                <?php include "./includes/card.php"?>
                <?php include "./includes/card.php"?>
                <?php include "./includes/card.php"?>
                <?php include "./includes/card.php"?>
            </div>
        </div>
<?php include "./includes/footer.php"?>