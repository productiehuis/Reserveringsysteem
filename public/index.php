<?php include "./includes/header.php"?>
<main>
    <table class="table">
        <thead>
            <th scope="col">Lorem</th>
            <th scope="col">ipsum</th>
        </thead>
        <tbody>
            <tr class="table-default">
                <th scope="row">1</th>
                <td>Kaine</td>
            </tr>
            <tr class="table-info">
                <th scope="row">2</th>
                <td>Kaine</td>
            </tr>
        </tbody>
    </table>
    <a href="login.php">Log in</a><br>
    <a href="logout.php">Log uit</a><br>

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
<?php include "./includes/footer.php"?>
