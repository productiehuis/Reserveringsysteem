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
