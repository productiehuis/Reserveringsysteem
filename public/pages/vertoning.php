<?php include "../includes/header.php"; ?>
<a href="/reserveringsysteem/public/index.php">Home</a> > <a href="#">Vertoningen toevoegen</a>
<h1>Vertoningen toevoegen</h1>
<form method="POST" action="/reserveringsysteem/public/control/addVertoning.php">
    <table>
        <tr>
            <td>
                Vertoningen titel:
            </td>
            <td>
                <input type="text" name="title" required>
            </td>
        </tr>
        <tr>
            <td>
                Locatie:
            </td>
            <td>
                <input type="text" name="location" required>
            </td>
        </tr>
        <tr>
            <td>
                Tijd:
            </td>
            <td>
                <input type="time" name="time" required>
            </td>
        </tr>
        <tr>
            <td>
                Datum:
            </td>
            <td>
                <input type="date" name="date" required>
            </td>
        </tr>
        <tr>
            <td>
                Maximum aantal zitplaatsen:
            </td>
            <td>
                <input type="number" name="max" required>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input class="btn-primary btn" type="submit" value="Toevoegen">
            </td>
        </tr>
        <?php

        if ($_GET["s"] == 0)
        {
            echo "<tr><td><p class='error'>Er is iets fout gegaan.</p></td></tr>";
        }
        else if($_GET["s"] == 1)
        {
            echo "<tr><td><p class='succes'>Vertoning succesvol toegevoegd.</p></td></tr>";
        }

        ?>
    </table>
</form>
