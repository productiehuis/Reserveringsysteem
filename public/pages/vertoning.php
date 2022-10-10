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
                <input type="text" name="title">
            </td>
        </tr>
        <tr>
            <td>
                Locatie:
            </td>
            <td>
                <input type="text" name="location">
            </td>
        </tr>
        <tr>
            <td>
                Tijd:
            </td>
            <td>
                <input type="time" name="time">
            </td>
        </tr>
        <tr>
            <td>
                Datum:
            </td>
            <td>
                <input type="date">
            </td>
        </tr>
        <tr>
            <td>
                Maximum aantal zitplaatsen:
            </td>
            <td>
                <input type="text">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input class="btn-primary btn" type="submit" value="Toevoegen">
            </td>
        </tr>

    </table>
</form>
